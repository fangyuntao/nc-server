<?php

declare(strict_types=1);
/**
 * @copyright 2023 Maxence Lange <maxence@artificial-owl.com>
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OC\FilesMetadata\Model;

use OC\FilesMetadata\Service\IndexRequestService;
use OC\FilesMetadata\Service\MetadataRequestService;
use OCP\DB\QueryBuilder\IQueryBuilder;
use OCP\FilesMetadata\Exceptions\FilesMetadataNotFoundException;
use OCP\FilesMetadata\Model\IFilesMetadata;
use OCP\FilesMetadata\Model\IMetadataQuery;

/**
 * @inheritDoc
 * @since 28.0.0
 */
class MetadataQuery implements IMetadataQuery {
	private int $aliasIndexCount = 0;
	public function __construct(
		private IQueryBuilder $queryBuilder,
		private string $fileTableAlias = 'fc',
		private string $fileIdField = 'fileid',
		private string $alias = 'meta',
		private string $aliasIndexPrefix = 'meta_index'
	) {
	}

	/**
	 * @inheritDoc
	 * @see self::extractMetadata()
	 * @since 28.0.0
	 */
	public function retrieveMetadata(): void {
		$this->queryBuilder->selectAlias($this->alias . '.json', 'meta_json');
		$this->queryBuilder->leftJoin(
			$this->fileTableAlias, MetadataRequestService::TABLE_METADATA, $this->alias,
			$this->queryBuilder->expr()->eq($this->fileTableAlias . '.' . $this->fileIdField, $this->alias . '.file_id')
		);
	}

	/**
	 * @param array $row result row
	 *
	 * @inheritDoc
	 * @return IFilesMetadata metadata
	 * @see self::retrieveMetadata()
	 * @since 28.0.0
	 */
	public function extractMetadata(array $row): IFilesMetadata {
		$fileId = (array_key_exists($this->fileIdField, $row)) ? $row[$this->fileIdField] : 0;
		$metadata = new FilesMetadata((int)$fileId);
		try {
			$metadata->importFromDatabase($row, $this->alias . '_');
		} catch (FilesMetadataNotFoundException) {
			// can be ignored as files' metadata are optional and might not exist in database
		}

		return $metadata;
	}

	/**
	 * @param string $metadataKey metadata key
	 * @param bool $enforce limit the request only to existing metadata
	 *
	 * @inheritDoc
	 * @since 28.0.0
	 */
	public function joinIndex(string $metadataKey, bool $enforce = false): string {
		$expr = $this->queryBuilder->expr();
		$aliasIndex = $this->aliasIndexPrefix . '_' . $this->aliasIndexCount++;
		$andX = $expr->andX($expr->eq($aliasIndex . '.file_id', $this->fileTableAlias . '.' . $this->fileIdField));
		$andX->add($expr->eq($this->getMetadataKeyField($aliasIndex), $this->queryBuilder->createNamedParameter($metadataKey)));

		if ($enforce) {
			$this->queryBuilder->rightJoin(
				$this->fileTableAlias,
				IndexRequestService::TABLE_METADATA_INDEX,
				$aliasIndex,
				$andX
			);
		} else {
			$this->queryBuilder->leftJoin(
				$this->fileTableAlias,
				IndexRequestService::TABLE_METADATA_INDEX,
				$aliasIndex,
				$andX
			);
		}

		return $aliasIndex;
	}

	/**
	 * @param string $value metadata value
	 * @inheritDoc
	 * @since 28.0.0
	 */
	public function enforceMetadataValue(string $aliasIndex, string $value): void {
		$expr = $this->queryBuilder->expr();
		$this->queryBuilder->andWhere(
			$expr->eq(
				$this->getMetadataValueField($aliasIndex),
				$this->queryBuilder->createNamedParameter($value)
			)
		);
	}

	/**
	 * @param int $value metadata value
	 * @inheritDoc
	 * @since 28.0.0
	 */
	public function enforceMetadataValueInt(string $aliasIndex, int $value): void {
		$expr = $this->queryBuilder->expr();
		$this->queryBuilder->andWhere(
			$expr->eq(
				$this->getMetadataValueIntField($aliasIndex),
				$this->queryBuilder->createNamedParameter($value, IQueryBuilder::PARAM_INT)
			)
		);
	}

	/**
	 * @inheritDoc
	 * @return string table field
	 * @since 28.0.0
	 */
	public function getMetadataKeyField(string $aliasIndex): string {
		return $aliasIndex . '.meta_key';
	}

	/**
	 * @inheritDoc
	 * @return string table field
	 * @since 28.0.0
	 */
	public function getMetadataValueField(string $aliasIndex): string {
		return $aliasIndex . '.meta_value_string';
	}

	/**
	 * @inheritDoc
	 * @return string table field
	 * @since 28.0.0
	 */
	public function getMetadataValueIntField(string $aliasIndex): string {
		return $aliasIndex . '.meta_value_int';
	}
}
