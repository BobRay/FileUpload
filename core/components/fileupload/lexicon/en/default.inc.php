<?php
/**
 * FileUpload
 *
 * 
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
 * FileUpload; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package fileupload
 */
/**
 * Default Lexicon Topic
 *
 * @package fileupload
 * @subpackage lexicon
 */

// Language specific messages
$_lang['fu_uploaded']='<strong>[[+filename]] was successfully uploaded.</strong><br />';
$_lang['fu_input_caption'] = 'File ';
$_lang['fu_upload_button_caption'] = 'Upload File(s)';
$_lang['fu_error']='<strong>An error occured when uploading the file.</strong><br />';
$_lang['fu_error_no_outer_tpl']='<strong>The outer template for the form could no be loaded. Check the &amp;outertpl setting.</strong><br />';
$_lang['fu_error_no_inner_tpl']='<strong>The inner template for the form could no be loaded. Check the &amp;innertpl setting.</strong><br />';
$_lang['fu_error_file']='<strong>[+filename+] is invalid.</strong><br />'; // Size is 0 bytes
$_lang['fu_error_name']='<strong>A file with the name [[+filename]] already exists.</strong><br />';
$_lang['fu_error_no_path']='<strong>No path to store the files was given.</strong><br />';
$_lang['fu_error_permission_denied']='<strong>You do not have permission to upload files.</strong><br />';
$_lang['fu_error_create_path']='<strong>could not create path to upload directory.</strong><br />';
$_lang['fu_error_1']= '<strong>[[+filename]] is too big, the size must be smaller than the PHP limit: [[+phpmaxsize]].</strong><br />'; // Bigger than upload_max_filesize directive in php.ini
$_lang['fu_error_2']= '<strong>[[+filename]] is larger thant the allowed FileUpload limit: [+maxsize+].</strong><br />'; // Bigger than specified by $maxsize setting
$_lang['fu_error_3']= '<strong>[[+filename]] was only partially uploaded</strong><br />';
$_lang['fu_error_4']= '<strong>No file was uploaded</strong><br />';
$_lang['fu_error_6']= '<strong>Missing a temporary folder</strong><br />';
$_lang['fu_error_extension'] = '<strong>Only files with extension(s) "[[+extensions]]" are allowed.</strong><br />';
$_lang['fu_error_no_extensions'] = '<strong>You have to specify what file extensions are allowed to be uploaded</strong>';
$_lang['fu_error_invalid_path'] = '<strong>The provided path is invalid</strong>';


