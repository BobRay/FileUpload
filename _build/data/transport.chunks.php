<?php
/**
 * FileUpload transport chunks
 * @author Bob Ray <https://bobsguides.com>
 * 3/15/11
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
 * Description: Array of chunk objects for MyComponent package
 * @package fileupload
 * @subpackage build
 */

$chunks = array();

$chunks[1]= $modx->newObject('modChunk');
$chunks[1]->fromArray(array(
    'id' => 1,
    'name' => 'fuInnerTpl',
    'description' => 'FileUpload inner Tpl chunk',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/fuinner.chunk.tpl'),
    'properties' => '',
),'',true,true);

$chunks[2]= $modx->newObject('modChunk');
$chunks[2]->fromArray(array(
    'id' => 2,
    'name' => 'fuOuterTpl',
    'description' => 'FileUpload outer Tpl chunk',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/fuouter.chunk.tpl'),
    'properties' => '',
),'',true,true);
$chunks[3]= $modx->newObject('modChunk');
$chunks[3]->fromArray(array(
    'id' => 3,
    'name' => 'fuMessageTpl',
    'description' => 'FileUpload feedback message Tpl chunk',
    'snippet' => file_get_contents($sources['source_core'].'/elements/chunks/fumessage.chunk.tpl'),
    'properties' => '',
),'',true,true);
return $chunks;