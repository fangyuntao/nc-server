<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2016 Lukas Reschke <lukas@statuscode.ch>
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace Test\Search;

use DateTimeImmutable;
use OCP\IGroup;
use OCP\IGroupManager;
use OCP\IUser;
use OCP\IUserManager;
use OCP\Search\FilterDefinition;
use OC\Search\FilterFactory;
use OC\Search\Filter\BooleanFilter;
use OC\Search\Filter\DateTimeFilter;
use OC\Search\Filter\FloatFilter;
use OC\Search\Filter\GroupFilter;
use OC\Search\Filter\IntegerFilter;
use OC\Search\Filter\StringFilter;
use OC\Search\Filter\StringsFilter;
use OC\Search\Filter\UserFilter;
use Test\TestCase;

class FiltersTest extends TestCase {
	private $user;
	private $userManager;
	private $group;
	private $groupManager;

	public function setUp(): void {
		$this->user = $this->createMock(IUser::class);
		$this->userManager = $this->createMock(IUserManager::class);
		$this->userManager->expects($this->any())->method('get')->willReturn($this->user);
		\OC::$server->registerService(IUserManager::class, fn () => $this->userManager);

		$this->group = $this->createMock(IGroup::class);
		$this->groupManager = $this->createMock(IGroupManager::class);
		$this->groupManager->expects($this->any())->method('get')->willReturn($this->group);
		\OC::$server->registerService(IGroupManager::class, fn () => $this->groupManager);
	}

	public function validFilters(): array {
		return [
			[FilterDefinition::TYPE_BOOL, 'yes', BooleanFilter::class, true],
			[FilterDefinition::TYPE_BOOL, '1', BooleanFilter::class, true],
			[FilterDefinition::TYPE_BOOL, '', BooleanFilter::class, false],
			[FilterDefinition::TYPE_BOOL, 'n', BooleanFilter::class, false],
			[FilterDefinition::TYPE_DATETIME, '1699264290', DateTimeFilter::class, new DateTimeImmutable('@1699264290')],
			[FilterDefinition::TYPE_DATETIME, '2023-06-25 00:11:22', DateTimeFilter::class, new DateTimeImmutable('2023-06-25 00:11:22')],
			[FilterDefinition::TYPE_FLOAT, '0', FloatFilter::class, .0],
			[FilterDefinition::TYPE_FLOAT, '49.3', FloatFilter::class, 49.3],
			[FilterDefinition::TYPE_GROUP, 'admin', GroupFilter::class, $this->group],
			[FilterDefinition::TYPE_INT, '0', IntegerFilter::class, 0],
			[FilterDefinition::TYPE_INT, (string) PHP_INT_MIN, IntegerFilter::class, PHP_INT_MIN],
			[FilterDefinition::TYPE_PERSON, 'admin', UserFilter::class, $this->user],
			[FilterDefinition::TYPE_PERSON, 'user_admin', UserFilter::class, $this->user],
			[FilterDefinition::TYPE_PERSON, 'group_admin', GroupFilter::class, $this->group],
			[FilterDefinition::TYPE_STRING, 'Nextcloud', StringFilter::class, 'Nextcloud'],
			[FilterDefinition::TYPE_STRINGS, ['Hello', 'World'], StringsFilter::class, ['Hello', 'World']],
			[FilterDefinition::TYPE_STRINGS, 'Nextcloud', StringsFilter::class, ['Nextcloud']],
			[FilterDefinition::TYPE_USER, 'admin', UserFilter::class, $this->user],
		];
	}

	/**
	 * @dataProvider validFilters
	 */
	public function testBuildValid(string $type, string|array $filterValue, string $expectedClass, $expectedValue): void {
		$filter = FilterFactory::get($type, $filterValue);
		$value = $filter->get();

		$this->assertInstanceOf($expectedClass, $filter);
		$this->assertEquals($expectedValue, $expectedValue);
	}
}
