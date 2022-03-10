<?php
/**
 * @copyright 2022 Carl Schwan <carl@carlschwan.eu>
 *
 * @license AGPL-3.0-or-later
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

namespace OCP\Validator\Constraints;

use OC\Validator\IConstraintValidator;
use OCP\IL10N;
use OCP\L10N\IFactory;

/**
 * Abstract class for validation constraint.
 *
 * For the moment, you must not extends this class inside your Nextcloud application.
 * Instead use the already existing public constraints or contribute new constraints
 * to Nextcloud core.
 */
abstract class Constraint {
	protected IL10N $l10n;

	public function __construct() {
		$this->l10n = \OC::$server->get(IFactory::class)->get('core');
	}

	/**
	 * @return class-string<IConstraintValidator>
	 */
	public function validatedBy(): string {
		return str_replace('Constraints\\', '', str_replace('OCP', 'OC', static::class)) . 'Validator';
	}
}
