/**
 * @copyright Copyright (c) 2023 Louis Chmn <louis@chmn.me>
 *
 * @author Louis Chmn <louis@chmn.me>
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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */
import { Node, registerDavProperty } from '@nextcloud/files'

/**
 *
 */
export function initLivePhotos(): void {
	registerDavProperty('nc:metadata-files-live-photo', { nc: 'http://nextcloud.org/ns' })
}

/**
 * If the node is a .mov file and has a associated live_photo, then it should not be displayed.
 *
 * @param {Node} node - The node
 * @return {boolean} Whether the node should be displayed of not.
 */
export function filterOutLivePhotosMov(node: Node) {
	return !(isLivePhoto(node) && node.mime === 'video/quicktime')
}

/**
 * @param {Node} node - The node
 */
export function isLivePhoto(node: Node): boolean {
	return node.attributes['metadata-files-live-photo'] !== null
}
