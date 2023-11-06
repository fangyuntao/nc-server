<?php
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
namespace OCA\DAV\Tests\unit\CalDAV\Status;

use OCA\DAV\CalDAV\CalendarHome;
use OCA\DAV\CalDAV\FreeBusy\FreeBusyGenerator;
use OCA\DAV\CalDAV\InvitationResponse\InvitationResponseServer;
use OCA\DAV\CalDAV\Schedule\Plugin;
use OCA\DAV\CalDAV\Search\SearchPlugin;
use OCA\DAV\CalDAV\Search\Xml\Request\CalendarSearchReport;
use OCA\DAV\CalDAV\Status\StatusService;
use OCA\DAV\Connector\Sabre\Server;
use OCP\AppFramework\Utility\ITimeFactory;
use OCP\Calendar\IManager;
use OCP\IL10N;
use OCP\IUser;
use phpDocumentor\Reflection\Types\Self_;
use PHPUnit\Framework\MockObject\MockObject;
use Sabre\DAV\Exception\NotAuthenticated;
use Sabre\DAV\Xml\Property\LocalHref;
use Sabre\DAVACL\Exception\NeedPrivileges;
use Sabre\Xml\Service;
use Test\TestCase;

class StatusServiceTest extends TestCase {
	private ITimeFactory|MockObject $timeFactory;
	private IManager|MockObject $calendarManager;
	private InvitationResponseServer|MockObject $server;
	private IL10N|MockObject $l10n;
	private FreeBusyGenerator|MockObject $generator;

	protected function setUp(): void {
		parent::setUp();

		$this->timeFactory = $this->createMock(ITimeFactory::class);
		$this->calendarManager = $this->createMock(IManager::class);
		$this->server = $this->createMock(InvitationResponseServer::class);
		$this->l10n = $this->createMock(IL10N::class);
		$this->generator = $this->createMock(FreeBusyGenerator::class);

		$this->service = new StatusService($this->timeFactory,
			$this->calendarManager,
			$this->server,
			$this->l10n,
			$this->generator);
	}

	public function testNoEmail(): void {
		$user = $this->createConfiguredMock(IUser::class, [
			'getUID' => 'admin',
			'getEMailAddress' => null,
		]);
		$availability = '';

		$user->expects(self::once())
			->method('getUID')
			->willReturn('admin');
		$user->expects(self::once())
			->method('getEMailAddress')
			->willReturn(null);
		$this->server->expects(self::never())
			->method('getServer');
		$this->timeFactory->expects(self::never())
			->method('now');
		$this->timeFactory->expects(self::never())
			->method('getDateTime');
		$this->calendarManager->expects(self::never())
			->method('getCalendarsForPrincipal');
		$this->calendarManager->expects(self::never())
			->method('newQuery');
		$this->calendarManager->expects(self::never())
			->method('searchForPrincipal');
		$this->generator->expects(self::never())
			->method('getVCalendar');
		$this->generator->expects(self::never())
			->method('setBaseObject');
		$this->generator->expects(self::never())
			->method('setObjects');
		$this->generator->expects(self::never())
			->method('setTimeRange');
		$this->generator->expects(self::never())
			->method('setTimeZone');
		$this->generator->expects(self::never())
			->method('setVAvailability');
		$this->generator->expects(self::never())
			->method('getResult');

		$this->service->processCalendarAvailability($user, $availability);
	}

	public function testNoAcl(): void {
		$user = $this->createConfiguredMock(IUser::class, [
			'getUID' => 'admin',
			'getEMailAddress' => 'test@test.com',
		]);
		$availability = '';
		$server = $this->createMock(Server::class);
		$schedulingPlugin = $this->createMock(Plugin::class);
		$aclPlugin = $this->createMock(\Sabre\DAVACL\Plugin::class);

		$user->expects(self::once())
			->method('getUID')
			->willReturn('admin');
		$user->expects(self::once())
			->method('getEMailAddress')
			->willReturn('test@test.com');
		$this->server->expects(self::once())
			->method('getServer')
			->willReturn($server);
		$server->expects(self::exactly(2))
			->method('getPlugin')
			->withConsecutive(
				['caldav-schedule'],
				['acl'],
			)->willReturnOnConsecutiveCalls($schedulingPlugin, $aclPlugin);
		$aclPlugin->expects(self::once())
			->method('principalSearch')
			->with([ '{http://sabredav.org/ns}email-address' => 'test@test.com'])
			->willReturn([]);
		$aclPlugin->expects(self::never())
			->method('checkPrivileges');
		$this->timeFactory->expects(self::never())
			->method('now');
		$this->timeFactory->expects(self::never())
			->method('getDateTime');
		$this->calendarManager->expects(self::never())
			->method('getCalendarsForPrincipal');
		$this->calendarManager->expects(self::never())
			->method('newQuery');
		$this->calendarManager->expects(self::never())
			->method('searchForPrincipal');
		$this->generator->expects(self::never())
			->method('getVCalendar');
		$this->generator->expects(self::never())
			->method('setBaseObject');
		$this->generator->expects(self::never())
			->method('setObjects');
		$this->generator->expects(self::never())
			->method('setTimeRange');
		$this->generator->expects(self::never())
			->method('setTimeZone');
		$this->generator->expects(self::never())
			->method('setVAvailability');
		$this->generator->expects(self::never())
			->method('getResult');

		$this->service->processCalendarAvailability($user, $availability);
	}

	public function testNoInbox(): void {
		$user = $this->createConfiguredMock(IUser::class, [
			'getUID' => 'admin',
			'getEMailAddress' => 'test@test.com',
		]);
		$availability = '';
		$server = $this->createMock(Server::class);
		$schedulingPlugin = $this->createMock(Plugin::class);
		$aclPlugin = $this->createMock(\Sabre\DAVACL\Plugin::class);

		$user->expects(self::once())
			->method('getUID')
			->willReturn('admin');
		$user->expects(self::once())
			->method('getEMailAddress')
			->willReturn('test@test.com');
		$this->server->expects(self::once())
			->method('getServer')
			->willReturn($server);
		$server->expects(self::exactly(2))
			->method('getPlugin')
			->withConsecutive(
				['caldav-schedule'],
				['acl'],
			)->willReturnOnConsecutiveCalls($schedulingPlugin, $aclPlugin);
		$aclPlugin->expects(self::once())
			->method('principalSearch')
			->with([ '{http://sabredav.org/ns}email-address' => 'test@test.com'])
			->willReturn([]);
		$aclPlugin->expects(self::never())
			->method('checkPrivileges');
		$this->timeFactory->expects(self::never())
			->method('now');
		$this->timeFactory->expects(self::never())
			->method('getDateTime');
		$this->calendarManager->expects(self::never())
			->method('getCalendarsForPrincipal');
		$this->calendarManager->expects(self::never())
			->method('newQuery');
		$this->calendarManager->expects(self::never())
			->method('searchForPrincipal');
		$this->generator->expects(self::never())
			->method('getVCalendar');
		$this->generator->expects(self::never())
			->method('setBaseObject');
		$this->generator->expects(self::never())
			->method('setObjects');
		$this->generator->expects(self::never())
			->method('setTimeRange');
		$this->generator->expects(self::never())
			->method('setTimeZone');
		$this->generator->expects(self::never())
			->method('setVAvailability');
		$this->generator->expects(self::never())
			->method('getResult');

		$this->service->processCalendarAvailability($user, $availability);
	}

	public function testNoPrivilegesAcl(): void {
		$user = $this->createConfiguredMock(IUser::class, [
			'getUID' => 'admin',
			'getEMailAddress' => 'test@test.com',
		]);
		$availability = '';
		$server = $this->createMock(Server::class);
		$schedulingPlugin = $this->createMock(Plugin::class);
		$aclPlugin = $this->createMock(\Sabre\DAVACL\Plugin::class);
		$principal = 'principals/users/admin';
		$calendarHome = $this->createMock(LocalHref::class);
		$acl = [[200 => ['{urn:ietf:params:xml:ns:caldav}schedule-inbox-URL' => $calendarHome]]];

		$user->expects(self::once())
			->method('getUID')
			->willReturn('admin');
		$user->expects(self::once())
			->method('getEMailAddress')
			->willReturn('test@test.com');
		$this->server->expects(self::once())
			->method('getServer')
			->willReturn($server);
		$server->expects(self::exactly(2))
			->method('getPlugin')
			->withConsecutive(
				['caldav-schedule'],
				['acl'],
			)->willReturnOnConsecutiveCalls($schedulingPlugin, $aclPlugin);
		$aclPlugin->expects(self::once())
			->method('principalSearch')
			->with([ '{http://sabredav.org/ns}email-address' => 'test@test.com'])
			->willReturn($acl);
		$calendarHome->expects(self::once())
			->method('getHref')
			->willReturn('calendars/admin/inbox/');
		$aclPlugin->expects(self::once())
			->method('checkPrivileges')
			->willThrowException(new NeedPrivileges($principal, ['{DAV:}all']));
		$this->timeFactory->expects(self::never())
			->method('now');
		$this->timeFactory->expects(self::never())
			->method('getDateTime');
		$this->calendarManager->expects(self::never())
			->method('getCalendarsForPrincipal');
		$this->calendarManager->expects(self::never())
			->method('newQuery');
		$this->calendarManager->expects(self::never())
			->method('searchForPrincipal');
		$this->generator->expects(self::never())
			->method('getVCalendar');
		$this->generator->expects(self::never())
			->method('setBaseObject');
		$this->generator->expects(self::never())
			->method('setObjects');
		$this->generator->expects(self::never())
			->method('setTimeRange');
		$this->generator->expects(self::never())
			->method('setTimeZone');
		$this->generator->expects(self::never())
			->method('setVAvailability');
		$this->generator->expects(self::never())
			->method('getResult');

		$this->service->processCalendarAvailability($user, $availability);
	}

	public function testNotAuthenticated(): void {
		$user = $this->createConfiguredMock(IUser::class, [
			'getUID' => 'admin',
			'getEMailAddress' => 'test@test.com',
		]);
		$availability = '';
		$server = $this->createMock(Server::class);
		$schedulingPlugin = $this->createMock(Plugin::class);
		$aclPlugin = $this->createMock(\Sabre\DAVACL\Plugin::class);
		$calendarHome = $this->createMock(LocalHref::class);
		$acl = [[200 => ['{urn:ietf:params:xml:ns:caldav}schedule-inbox-URL' => $calendarHome]]];

		$user->expects(self::once())
			->method('getUID')
			->willReturn('admin');
		$user->expects(self::once())
			->method('getEMailAddress')
			->willReturn('test@test.com');
		$this->server->expects(self::once())
			->method('getServer')
			->willReturn($server);
		$server->expects(self::exactly(2))
			->method('getPlugin')
			->withConsecutive(
				['caldav-schedule'],
				['acl'],
			)->willReturnOnConsecutiveCalls($schedulingPlugin, $aclPlugin);
		$aclPlugin->expects(self::once())
			->method('principalSearch')
			->with([ '{http://sabredav.org/ns}email-address' => 'test@test.com'])
			->willReturn($acl);
		$calendarHome->expects(self::once())
			->method('getHref')
			->willReturn('calendars/admin/inbox/');
		$aclPlugin->expects(self::once())
			->method('checkPrivileges')
			->willThrowException(new NotAuthenticated());
		$this->timeFactory->expects(self::never())
			->method('now');
		$this->timeFactory->expects(self::never())
			->method('getDateTime');
		$this->calendarManager->expects(self::never())
			->method('getCalendarsForPrincipal');
		$this->calendarManager->expects(self::never())
			->method('newQuery');
		$this->calendarManager->expects(self::never())
			->method('searchForPrincipal');
		$this->generator->expects(self::never())
			->method('getVCalendar');
		$this->generator->expects(self::never())
			->method('setBaseObject');
		$this->generator->expects(self::never())
			->method('setObjects');
		$this->generator->expects(self::never())
			->method('setTimeRange');
		$this->generator->expects(self::never())
			->method('setTimeZone');
		$this->generator->expects(self::never())
			->method('setVAvailability');
		$this->generator->expects(self::never())
			->method('getResult');

		$this->service->processCalendarAvailability($user, $availability);
	}

	public function testNoCalendars(): void {
		$user = $this->createConfiguredMock(IUser::class, [
			'getUID' => 'admin',
			'getEMailAddress' => 'test@test.com',
		]);
		$availability = '';
		$server = $this->createMock(Server::class);
		$schedulingPlugin = $this->createMock(Plugin::class);
		$aclPlugin = $this->createMock(\Sabre\DAVACL\Plugin::class);
		$calendarHome = $this->createMock(LocalHref::class);
		$acl = [[200 => ['{urn:ietf:params:xml:ns:caldav}schedule-inbox-URL' => $calendarHome]]];
		$now = new \DateTimeImmutable('1970-1-1', new \DateTimeZone('UTC'));
		$principal = 'principals/users/admin';

		$user->expects(self::once())
			->method('getUID')
			->willReturn('admin');
		$user->expects(self::once())
			->method('getEMailAddress')
			->willReturn('test@test.com');
		$this->server->expects(self::once())
			->method('getServer')
			->willReturn($server);
		$server->expects(self::exactly(2))
			->method('getPlugin')
			->withConsecutive(
				['caldav-schedule'],
				['acl'],
			)->willReturnOnConsecutiveCalls($schedulingPlugin, $aclPlugin);
		$aclPlugin->expects(self::once())
			->method('principalSearch')
			->with([ '{http://sabredav.org/ns}email-address' => 'test@test.com'])
			->willReturn($acl);
		$calendarHome->expects(self::once())
			->method('getHref')
			->willReturn('calendars/admin/inbox/');
		$aclPlugin->expects(self::once())
			->method('checkPrivileges')
			->willReturn(true);
		$this->timeFactory->expects(self::once())
			->method('now')
			->willReturn($now);
		$this->calendarManager->expects(self::once())
			->method('getCalendarsForPrincipal')
			->with($principal)
			->willReturn([]);
		$this->timeFactory->expects(self::never())
			->method('getDateTime');
		$this->calendarManager->expects(self::never())
			->method('newQuery');
		$this->calendarManager->expects(self::never())
			->method('searchForPrincipal');
		$this->generator->expects(self::never())
			->method('getVCalendar');
		$this->generator->expects(self::never())
			->method('setBaseObject');
		$this->generator->expects(self::never())
			->method('setObjects');
		$this->generator->expects(self::never())
			->method('setTimeRange');
		$this->generator->expects(self::never())
			->method('setTimeZone');
		$this->generator->expects(self::never())
			->method('setVAvailability');
		$this->generator->expects(self::never())
			->method('getResult');

		$this->service->processCalendarAvailability($user, $availability);
	}

	public function testEmptyAvailabilityAndCalendarEvents(): void {
		$user = $this->createConfiguredMock(IUser::class, [
			'getUID' => 'admin',
			'getEMailAddress' => 'test@test.com',
		]);
		$availability = '';
		$server = $this->createMock(Server::class);
		$schedulingPlugin = $this->createMock(Plugin::class);
		$aclPlugin = $this->createMock(\Sabre\DAVACL\Plugin::class);
		$calendarHome = $this->createMock(LocalHref::class);
		$acl = [[200 => ['{urn:ietf:params:xml:ns:caldav}schedule-inbox-URL' => $calendarHome]]];
		$now = new \DateTimeImmutable('1970-1-1', new \DateTimeZone('UTC'));
		$principal = 'principals/users/admin';

		$user->expects(self::once())
			->method('getUID')
			->willReturn('admin');
		$user->expects(self::once())
			->method('getEMailAddress')
			->willReturn('test@test.com');
		$this->server->expects(self::once())
			->method('getServer')
			->willReturn($server);
		$server->expects(self::exactly(2))
			->method('getPlugin')
			->withConsecutive(
				['caldav-schedule'],
				['acl'],
			)->willReturnOnConsecutiveCalls($schedulingPlugin, $aclPlugin);
		$aclPlugin->expects(self::once())
			->method('principalSearch')
			->with([ '{http://sabredav.org/ns}email-address' => 'test@test.com'])
			->willReturn($acl);
		$calendarHome->expects(self::once())
			->method('getHref')
			->willReturn('calendars/admin/inbox/');
		$aclPlugin->expects(self::once())
			->method('checkPrivileges')
			->willReturn(true);
		$this->timeFactory->expects(self::once())
			->method('now')
			->willReturn($now);
		$this->calendarManager->expects(self::once())
			->method('getCalendarsForPrincipal')
			->with($principal)
			->willReturn([]);
		$this->timeFactory->expects(self::never())
			->method('getDateTime');
		$this->calendarManager->expects(self::never())
			->method('newQuery');
		$this->calendarManager->expects(self::never())
			->method('searchForPrincipal');
		$this->generator->expects(self::never())
			->method('getVCalendar');
		$this->generator->expects(self::never())
			->method('setBaseObject');
		$this->generator->expects(self::never())
			->method('setObjects');
		$this->generator->expects(self::never())
			->method('setTimeRange');
		$this->generator->expects(self::never())
			->method('setTimeZone');
		$this->generator->expects(self::never())
			->method('setVAvailability');
		$this->generator->expects(self::never())
			->method('getResult');

		$this->service->processCalendarAvailability($user, $availability);
	}

}
