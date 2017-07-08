<?php
/**
 *
 * Copyright 2015-2017 Bob Ray <https://bobsguides.com>
 * @author Bob Ray
 *
 * FileUpload is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * FileUpload is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * FileUpload; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package fileupload
 */
/**
 * Description:  Array of plugin objects for MyComponent package
 * @package fileupload
 * @subpackage build
 */

if (! function_exists('getPluginContent')) {
    function getPluginContent($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<?php','',$o);
        $o = str_replace('?>','',$o);
        $o = trim($o);
        return $o;
    }
}
$plugins = array();

$plugins[1]= $modx->newObject('modPlugin');
$plugins[1]->fromArray(array(
    'id' => 1,
    'name' => 'FileUploadPlugin',
    'disabled' => '1',
    'description' => 'FileUpload Plugin.',
    'plugincode' => getPluginContent($sources['source_core'].'/elements/plugins/fileupload.plugin.php'),
),'',true,true);


return $plugins;