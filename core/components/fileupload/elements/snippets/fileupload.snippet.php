<?php

/**
 * FileUpload
 *
 * @author Michel van de Wetering
 * @author Bob Ray <http://bobsguides.com>
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
 * MODx FileUpload Snippet
 *
 * Description: Allows upload of multiple files
  *
 * @package fileUpload
 *
 */
// return include "c:/xampp/htdocs/addons/assets/mycomponents/fileupload/core/components/fileupload/elements/snippets/fileupload.snippet.php";
/*
 * FileUpload snippet - Version 1.0.2
 * Original snippet by Michel van de Wetering
 * Refactored for MODx Revolution by Bob Ray
 *
 * targetfile property and Dutch translation contributed by Jeroen Hegeman
 *
 * This snippet allows users to upload files to the web server. See the
 * instructions for the parameters needed to set it up. You can translate the
 * error messages by altering the lexicon files in the
 * core/components/fileupload/lexicon directory or by editing the
 * language strings in the Manager.
 */
/**
 Properties:

 @property outertpl (string) - Name of outer Tpl chunk; default: fuOuterTpl.

 @property messagetpl (string) - Name of message Tpl chunk; default: fuMessageTpl.

 @property innertpl (string) - Name of inner Tpl chunk; default: fuInnerTpl.

 @property path (string) - Path to the directory for uploaded files;
    required if &uploadTV is empty; will be appended to the base_path
    system setting; should not start with a slash.

    Example: &path=`assets/uploads/`

 @property uploadtv (string) - Name of a TV holding the upload path; required
    if &path is empty. ; path in the TV will be appended to the base_path
    system setting and should not start with a slash.

 @property maxsize (int) - Maximum file upload size; defaults to the
    upload_maxsize system setting.  Note that the maximum filesize can
    also be limited by the upload_max_filesize setting in php.ini

 @property extensions (string) - comma-separated list of allowed
    file extensions; defaults to upload_files system setting.

 @property uploadgroups (string) - Comma-separated list of user groups
    that can upload files; default ''  (anyone can upload).

 @property createpath (boolean) - Create path for upload directory if it
   does not exist. Default: false.

 @property filefields (int) - Number of file input fields to show; default: 5.

 @property cssfile (string) - Name of css file to use; default: fileupload.css.

 @property allowoverwrite (boolean) - Set to `1` to allow overwriting existing files.

 @property targetfile (string) - Name of the target file for the upload; default: ''

 */

/* Setup the defaults */
/* @var $modx modX */
$sp =& $scriptProperties;

$language = $modx->getOption('language',$sp,'');
$language = !empty($language) ? $language . ':' : '';
$modx->getService('lexicon','modLexicon');

$modx->lexicon->load($language . 'fileupload:default');

$outertpl = $modx->getOption('outertpl',$sp,'');
if (empty($outertpl)) {
    return $modx->lexicon('fu_error_no_outer_tpl');
}
$innertpl = $modx->getOption('innertpl',$sp,'');
if (empty($innertpl)) {
    return $modx->lexicon('fu_error_no_inner_tpl');
}
$messagetpl = $modx->getOption('messagetpl',$sp,'');
if (empty($messagetpl)) {
    return $modx->lexicon('fu_error_no_message_tpl');
}
$maxsize = $modx->getOption('maxsize',$sp,'');
if (empty($maxsize)) {
    $maxsize = $modx->getOption('upload_maxsize',null,'');
}
$uploadgroups = $modx->getOption('uploadgroups',$sp,'');

if (strstr($uploadgroups, ',')) {
    $uploadgroups = explode(',',$uploadgroups);
}

$extensions = $modx->getOption('extensions', $sp, '');
if (empty($extensions)) {
    $extensions = $modx->getOption('upload_files',null,'');
}
$createpath = $modx->getOption('createpath',$sp,'');
if (empty($createpath))   $createpath = false;


$filefields = $modx->getOption('filefields',$sp,'');
$filefields = $filefields == 0 ? 5 : $filefields;


$allowoverwrite = $modx->getOption('allowoverwrite', $sp,'');

// Function taken from php.net
if (!function_exists('RecursiveMkdir'))
{
   function RecursiveMkdir($path)
   {
       // This function creates the specified directory using mkdir().  Note
       // that the recursive feature on mkdir() is broken with PHP 5.0.4 for
       // Windows, so we have to do the recursion here.
       if (!file_exists($path))
       {
           // The directory doesn't exist.  Recurse, passing in the parent
           // directory so that it gets created.
           RecursiveMkdir(dirname($path));

           mkdir($path, 0777);
       }
   }
}

function setError($msg, &$presubmitError) {
    global $modx;
    $modx->setPlaceholder('fu.message',$modx->lexicon($msg));
    $modx->setPlaceholder('fu.class','fu-error-presubmit');
    $presubmitError = true;
}

$output = '';
$presubmitError = false;


//$canupload = $uploadgroups=='' || $modx->isMemberOfWebGroup(explode(",", $uploadgroups));
$canupload = empty($uploadgroups) || $modx->user->isMember($uploadgroups);


if (!$canupload) {
  setError('fu_error_permission_denied',$presubmitError);
}

if (empty($extensions)) {
  setError('fu_error_no_extensions',$presubmitError);
}


// Initialise

$cssFile = $modx->getOption('cssfile', $sp,'fileupload.css');
$cssPath = MODX_ASSETS_URL . 'components/fileupload/css/' . $cssFile;
$modx->regClientCSS($cssPath);

$this->targetfile = empty ($sp['targetfile'])? '' : $sp['targetfile'];

if (empty($path) and !empty($targetfile)) {
    $path = dirname($targetfile) . '/';
}
if (empty($path) and empty($sp['uploadtv'])) {
    setError('fu_error_no_path',$presubmitError);
}

if (!empty($sp['uploadtv'])) {
    $tvObj = $modx->getobject('modTemplateVar',array('name'=>$sp['uploadtv']));
    $path = $modx->getOption('base_path',null,'') . $tvObj->getValue();
} else {
    $path = $modx->config['base_path'].$path;
}


// Check if the path exists
if (!is_dir($path)) {
  if ($createpath) {
    RecursiveMkdir($path);
  } else {
    setError('fu_error_invalid_path',$presubmitError);
  }
}

if (!is_dir($path)) {
    setError('fu_error_create_path', $presubmitError);
}


if ($presubmitError) {
    return $modx->getChunk($messagetpl);
}


// Generate a unique code for this form so if there are multiple
// FileUpload snippets used on one page we know if it was our form that was submitted
$hash = md5($maxsize.$uploadgroup.$extensions.$path);

// Check if something was uploaded and move it to the correct place.
if (isset($_FILES['userfile']) && $_POST['formid'] == $hash) {

  $fileoutput = '';
  $ext_array = explode(',', $extensions);

  // Handle all uploaded files
  for ($i=0; $i<count($_FILES['userfile']['name']); $i++)  {
    // Skip "empty" files
    if ($_FILES['userfile']['name'][$i] == '') {
      continue;
    }
    $success = false;
    if ($_FILES['userfile']['error'][$i] != 0) {
      // An error occurred
      $fileoutput = $modx->lexicon("fu_error_{$_FILES['userfile']['error'][$i]}");
    } else {
      //Handle the uploaded file
    if ($this->targetfile == '') {
        $uploadfile = $path.basename($_FILES['userfile']['name'][$i]);
    } else {
        $uploadfile = $path.basename($this->targetfile);
    }

      if ($extensions!='' && !in_array(pathinfo($uploadfile, PATHINFO_EXTENSION), $ext_array)) {
        // Extension is not allowed
        $fileoutput = $modx->lexicon('fu_error_extension');
      } else if ($_FILES['userfile']['size'][$i] > $maxsize) {
        // File is too big
        $fileoutput = $modx->lexicon('fu_error_2');
      } else if ($_FILES['userfile']['size'][$i] == 0) {
        // Invalid filesize
        $fileoutput = $modx->lexicon('fu_error_file');
      } else if (file_exists($uploadfile) && empty($allowoverwrite)) {
        // Destination file already exists
        $fileoutput = $modx->lexicon('fu_error_name');
      } else if (move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $uploadfile)) {
        // Moved the uploaded file to the upload folder
        $fileoutput = $modx->lexicon('fu_uploaded');
        $success = true;
      } else {
        // Something unexpected happened
        $fileoutput = $modx->lexicon('fu_error');
      }
    }

    $fields = array('[[+filename]]', '[[+maxsize]]', '[[+phpmaxsize]]', '[[+extensions]]' );
    $values = array($_FILES['userfile']['name'][$i], $maxsize, ini_get('upload_max_filesize').'B', $extensions);
    $fileoutput = str_replace($fields, $values, $fileoutput);
    $tpl = $modx->getChunk($messagetpl);
    $msg = str_replace('[[+fu.message]]',$fileoutput, $tpl);
    if ($success) {
        $msg = str_replace('[[+fu.class]]','fu-success',$msg);
    } else {
        $msg = str_replace('[[+fu.class]]','fu-error',$msg);
    }
    $output .= $msg;
  }
}

// Show the upload form
$formtpl = $modx->getChunk($outertpl);

$formtpl = str_replace('[[+fu_upload_button_caption]]',$modx->lexicon('fu_upload_button_caption'),$formtpl);

$innertpl = $modx->getChunk($innertpl);
$caption = $modx->lexicon('fu_input_caption');
$inner = '';
for ($i=1;$i<= $filefields;$i++) {
    $s = str_replace('[[+fu-caption]]', $caption, $innertpl);
    $s = str_replace('[[+fu-number]]',$i,$s);
    $inner .= "\n" . $s;
}

//$formtpl = str_replace('[[+fu-inner]]',$inner, $formtpl);

// Stop if no template is loaded
if (empty($formtpl)) {
  $output .= $modx->lexicon('error_no_tpl');
  return $output;
}

// Replace the placeholders and add the form to the output
$fields = array('[[+fileupload.maxsize]]', '[[+fileupload.formid]]', '[[+fileupload.extensions]]','[[+fu-inner]]','[[+fu-message]]');
$values = array($maxsize, $hash, $extensions, $inner, $output);

$output = str_replace($fields, $values, $formtpl);

return $output;
