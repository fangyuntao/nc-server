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

namespace OCP\FilesMetadata\Model;

/**
 * Model that help building queries with metadata and metadata indexes
 *
 * @since 28.0.0
 */
interface IMetadataQuery {

	/**
	 * Add metadata linked to file id to the query
	 *
	 * @see self::extractMetadata()
	 * @since 28.0.0
	 */
	public function retrieveMetadata(): void;

	/**
	 * extract metadata from a result row
	 *
	 * @param array $row result row
	 *
	 * @return IFilesMetadata metadata
	 * @see self::retrieveMetadata()
	 * @since 28.0.0
	 */
	public function extractMetadata(array $row): IFilesMetadata;

	/**
	 * join the metadata_index table, based on a metadataKey.
	 * This will prep the query for condition based on this specific metadataKey
	 *
	 * @param string $metadataKey metadata key
	 * @param bool $enforce limit the request only to existing metadata
	 *
	 * @since 28.0.0
	 */
	public function joinIndex(string $metadataKey, bool $enforce = false): void;

	/**
	 * entry must have a specific metadata set
	 *
	 * @param string $metadataKey metadata key
	 *
	 * @since 28.0.0
	 */
	public function enforceMetadataKey(string $metadataKey): void;

	/**
	 * entry must have a specific value (string) for linked metadata
	 *
	 * @param string $value metadata value
	 *
	 * @since 28.0.0
	 */
	public function enforceMetadataValue(string $value): void;

	/**
	 * entry must have a specific value (int) for linked metadata
	 *
	 * @param int $value metadata value
	 *
	 * @since 28.0.0
	 */
	public function enforceMetadataValueInt(int $value): void;

	/**
	 * returns the name of the field for metadata key to be used in query expressions
	 *
	 * @return string
	 * @since 28.0.0
	 */
	public function getMetadataKeyField(): string;

	/**
	 * returns the name of the field for metadata string value to be used in query expressions
	 *
	 * @return string table field
	 * @since 28.0.0
	 */
	public function getMetadataValueField(): string;

	/**
	 * returns the name of the field for metadata int value to be used in query expressions
	 *
	 * @return string table field
	 * @since 28.0.0
	 */
	public function getMetadataValueIntField(): string;
}
