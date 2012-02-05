<?php

/**
 * @package r47SensioConnectProfile
 */
/*
  Plugin Name: r47SensioConnectProfile
  Plugin URI: http://github.com/robo47/r47SensioConnectProfile
  Description: A simple Plugin for fetching data from SensioConnect
  Version: 0.3.0
  Author: Benjamin Steininger
  Author URI: http://www.benjamin-steininger.de
  License: GPLv2 or later
 */

/*
  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

define('R47SENSIOCONNECTPROFILE_VERSION', '0.3.0');
define('R47SENSIOCONNECTPROFILE_PLUGIN_URL', plugin_dir_url(__FILE__));
// include version to be able to change what form of data is actually saved
define('R47SENSIOCONNECTPROFILE_TRANSIENT_PREFIX', 'r47sensioconnectprofile_' . R47SENSIOCONNECTPROFILE_VERSION . '_');

require_once 'autoload.php';

function r47SensioConnect_register_widgets() {
    register_widget('Robo47_Widget_SensioConnectProfileWidget');
    register_widget('Robo47_Widget_SensioConnectBadgesWidget');
}

add_action('widgets_init', 'r47SensioConnect_register_widgets');