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
$_lang['fu_uploaded']='[[+filename]] was successfully uploaded.';
$_lang['fu_input_caption'] = 'File ';
$_lang['fu_upload_button_caption'] = 'Upload File(s)';
$_lang['fu_error']='An error occurred when uploading the file.';
$_lang['fu_error_no_outer_tpl']='The outer template for the form could not be loaded. Check the &amp;outertpl setting.';
$_lang['fu_error_no_message_tpl']='The message template for the form could not be loaded. Check the &amp;messagetpl setting.';
$_lang['fu_error_no_inner_tpl']='The inner template for the form could no be loaded. Check the &amp;innertpl setting.';
$_lang['fu_error_file']='[[+filename]] is invalid.'; // Size is 0 bytes
$_lang['fu_error_name']='A file with the name [[+filename]] already exists.';
$_lang['fu_error_no_path']='No path to store the files was given.';
$_lang['fu_error_permission_denied']='You do not have permission to upload files.';
$_lang['fu_error_create_path']='could not create path to upload directory.';
$_lang['fu_error_1']= '[[+filename]] is too big, the size must be smaller than the PHP limit: [[+phpmaxsize]] bytes.'; // Bigger than upload_max_filesize directive in php.ini
$_lang['fu_error_2']= '[[+filename]] is larger than the allowed FileUpload limit: [[+maxsize]] bytes.'; // Bigger than specified by $maxsize setting
$_lang['fu_error_3']= '[[+filename]] was only partially uploaded';
$_lang['fu_error_4']= 'No file was uploaded';
$_lang['fu_error_6']= 'Missing a temporary folder';
$_lang['fu_error_extension'] = '[[+filename]]: Disallowed Extension.';
$_lang['fu_error_no_extensions'] = 'You have to specify what file extensions are allowed to be uploaded';
$_lang['fu_error_invalid_path'] = 'The provided path is invalid';


