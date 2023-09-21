<?php

declare(strict_types=1);

/**
 * @copyright 2023 Benjamin Gaussorgues <benjamin.gaussorgues@nextcloud.com>
 *
 * @author Benjamin Gaussorgues <benjamin.gaussorgues@nextcloud.com>
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
namespace OCP\Search;

use IteratorAggregate;

/**
 * Interface for search filters
 *
 * @since 28.0.0
 * @implements IteratorAggregate<string, \OCP\Search\IFilter>
 */
interface IFilterCollection extends IteratorAggregate {
	/**
	 * Check if a filter exits
	 *
	 * @since 28.0.0
	 */
	public function has(string $name): bool;

	/**
	 * Get a filter by name
	 *
	 * @since 28.0.0
	 */
	public function get(string $name): ?IFilter;

	/**
	 * Return Iterator of filters
	 *
	 * @since 28.0.0
	 */
	public function getIterator(): \Traversable;
}
