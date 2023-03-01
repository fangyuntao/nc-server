<?php
/**
 * @copyright Copyright (c) 2016, ownCloud, Inc.
 *
 * @author Arthur Schiwon <blizzz@arthur-schiwon.de>
 * @author Christoph Wurst <christoph@winzerhof-wurst.at>
 * @author Joas Schilling <coding@schilljs.com>
 *
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\User_LDAP\User;

use OCA\User_LDAP\Mapping\UserMapping;
use OCP\Share\IManager;

/**
 * Class DeletedUsersIndex
 * @package OCA\User_LDAP
 */
class DeletedUsersIndex {
	/**
	 * @var \OCP\IConfig $config
	 */
	protected $config;

	/**
	 * @var \OCA\User_LDAP\Mapping\UserMapping $mapping
	 */
	protected $mapping;

	/**
	 * @var array $deletedUsers
	 */
	protected $deletedUsers;
	/** @var IManager */
	private $shareManager;

	public function __construct(\OCP\IConfig $config, UserMapping $mapping, IManager $shareManager) {
		$this->config = $config;
		$this->mapping = $mapping;
		$this->shareManager = $shareManager;
	}

	/**
	 * reads LDAP users marked as deleted from the database
	 * @return \OCA\User_LDAP\User\OfflineUser[]
	 */
	private function fetchDeletedUsers() {
		$deletedUsers = $this->config->getUsersForUserValue(
			'user_ldap', 'isDeleted', '1');

		$userObjects = [];
		foreach ($deletedUsers as $user) {
			$userObject = new OfflineUser($user, $this->config, $this->mapping, $this->shareManager);;
			if ($userObject->getLastLogin() > $userObject->getDetectedOn()) {
				$userObject->unmark();
			} else {
				$userObjects[] = $userObject;
			}
		}
		$this->deletedUsers = $userObjects;

		return $this->deletedUsers;
	}

	/**
	 * returns all LDAP users that are marked as deleted
	 * @return \OCA\User_LDAP\User\OfflineUser[]
	 */
	public function getUsers() {
		if (is_array($this->deletedUsers)) {
			return $this->deletedUsers;
		}
		return $this->fetchDeletedUsers();
	}

	/**
	 * whether at least one user was detected as deleted
	 * @return bool
	 */
	public function hasUsers() {
		if (!is_array($this->deletedUsers)) {
			$this->fetchDeletedUsers();
		}
		return is_array($this->deletedUsers) && (count($this->deletedUsers) > 0);
	}

	/**
	 * marks a user as deleted
	 *
	 * @param string $ocName
	 * @throws \OCP\PreConditionNotMetException
	 */
	public function markUser($ocName) {
		$curValue = $this->config->getUserValue($ocName, 'user_ldap', 'isDeleted', '0');
		if ($curValue === '1') {
			// the user is already marked, do not write to DB again
			return;
		}
		$this->config->setUserValue($ocName, 'user_ldap', 'isDeleted', '1');
		$this->config->setUserValue($ocName, 'user_ldap', 'foundDeleted', (string)time());
		$this->deletedUsers = null;
	}
}
