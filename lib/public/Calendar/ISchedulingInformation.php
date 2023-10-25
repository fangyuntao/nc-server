<?php

declare(strict_types=1);
/**
 * @copyright 2023 Anna Larch <anna.larch@gmx.net>
 *
 * @author Anna Larch <anna.larch@gmx.net>
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
namespace OCP\Calendar;

use Sabre\CalDAV\Xml\Property\ScheduleCalendarTransp;
use Sabre\VObject\Component\VTimeZone;
use Sabre\VObject\Property;

/**
 *  Extends the ICalendar interface
 *  to expose scheduling information
 *
 * @since 28.0.0
 */
interface ISchedulingInformation extends ICalendar {
	/**
	 * @since 28.0.0
	 */
	public function getSchedulingTransparency(): ?ScheduleCalendarTransp;

	/**
	 * @since 28.0.0
	 */
	public function getSchedulingTimezone(): ?Property;

}
