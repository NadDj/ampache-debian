<?php
/* vim:set softtabstop=4 shiftwidth=4 expandtab: */
/**
 *
 * LICENSE: GNU Affero General Public License, version 3 (AGPLv3)
 * Copyright 2001 - 2015 Ampache.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
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

class scrobbler_async extends Thread
{
    public function __construct($user, $song_info)
    {
        $this->user      = $user;
        $this->song_info = $song_info;
    }

    public function run()
    {
        spl_autoload_register(array('Core', 'autoload'), true, true);
        Requests::register_autoloader();
        if ($this->song_info) {
            User::save_mediaplay($this->user, $this->song_info);
        }
    }
}
