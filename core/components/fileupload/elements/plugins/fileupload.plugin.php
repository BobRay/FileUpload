<?php
/**
 *  Copyright 2015-2017 Bob Ray <https://bobsguides.com>
 *
 * fileupload plugin
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
 *
 */

/* Connected to OnFileManagerUpload Event */

if (! isset($fromfileupload)) {
    /* Event not fired by FileUpload snippet */
    return '';

}

/** @var  $path string */
/** @var $modx modX */

$directory = $path;

foreach($files as $file) {
    $name = $file['name'];
    $type = $file['type'];
    $extension = $file['extension'];
    $size = $file['size'];
    $tmp_name = $file['tmp_name'];
    $error = $file['error'];

    /* Your code below. This is an example that writes results to the MODX error log.

     * Note: Since $file is an associative array, you can have a Tpl chunk with
     * placeholders and use $msg .= $modx->getChunk('MyChunk', $file) for sending
     * emails or making your own upload log;
     */

    if (empty($error)) {
        /* Success */
        $modx->log(modX::LOG_LEVEL_ERROR, 'Success: ' . $name);
    } else {
        /* Failure -- $error contains the error message */
        $modx->log(modX::LOG_LEVEL_ERROR, 'ERROR: ' . $name . ' -- ' . $error);
    }
}

return '';