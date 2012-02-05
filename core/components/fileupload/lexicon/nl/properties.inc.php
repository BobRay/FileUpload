<?php
/**
 * FileUpload
 *
 * Contributed by Jeroen Hegeman
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
 * Properties (property descriptions) Lexicon Topic
 *
 * @package fileupload
 * @subpackage lexicon
 */

/* FileUpload Property Description strings */

$_lang['fu_outertpl_desc'] = 'Naam van de FileUpload buiten-template chunk; default: fuOuterTpl';
$_lang['fu_innertpl_desc'] = 'Naam van de FileUpload binnen-template chunk; default: fuInnerTpl';
$_lang['fu_messagetpl_desc'] = 'Naam van de FileUpload bericht-template chunk; default: fuMessageTpl';
$_lang['fu_maxsize_desc'] = 'Maximum bestandsgrootte (in bytes); default: upload_maxsize systeem parameter (1048576 bytes - one megabyte)';
$_lang['fu_uploadgroups_desc'] = "(optioneel) Comma-gescheiden lijst van gebruikersgroepen met permissies om bestanden te uploaden; default: '' (iedereen)";
$_lang['fu_extensions_desc'] = '(optioneel) Comma-gescheiden lijst van toegestane bestandsextensies; default: upload_files systeem parameter';
$_lang['fu_createpath_desc'] = "(optioneel) Maak &amp;path aan indien het niet bestaat; default: 'No'";
$_lang['fu_path_desc'] = "(vereist indien &amp;uploadtv niet is gespecificeerd) pad naar de directory voor ge-uploaded bestanden; default: ''";
$_lang['fu_targetfile_desc'] = "(optioneel) Naam van het doelbestand op de server, wordt toegevoegd aan &amp;path; default: '' (gebruik de originele bestandsnaam)";
$_lang['fu_uploadtv_desc'] = '(vereist als &amp;path niet is gespecificeerd) Naam van de TV met het upload pad';
$_lang['fu_filefields_desc'] = '(optioneel) Aantal naamvelden voor bestanden om te uploaden; default: 5';