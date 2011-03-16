<?php

/**
 * Default properties for the FileUpload snippet
 * @author Bob Ray <http://bobsguides.com>
 * 1/1/11
 *
 * @package fileupload
 * @subpackage build
 */



$properties = array(
    array(
        'name' => 'outertpl',
        'desc' => 'fu_outertpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'fuOuterTpl',
        'lexicon' => 'fileupload:properties',
    ),
    array(
        'name' => 'innertpl',
        'desc' => 'fu_innertpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'fuInnerTpl',
        'lexicon' => 'fileupload:properties',
    ),
     array(
        'name' => 'maxsize',
        'desc' => 'fu_maxsize_desc',
        'type' => 'intfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'fileupload:properties',
    ),
    array(
        'name' => 'uploadgroups',
        'desc' => 'fu_uploadgroups_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'fileupload:properties',
    ),
    array(
        'name' => 'extensions',
        'desc' => 'fu_extensions_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'fileupload:properties',
    ),
    array(
        'name' => 'createpath',
        'desc' => 'fu_createpath_desc',
        'type' => 'combo-boolean',
        'options' => '',
        'value' => false,
        'lexicon' => 'fileupload:properties',
    ),
    array(
        'name' => 'filefields',
        'desc' => 'fu_filefields_desc',
        'type' => 'intfield',
        'options' => '',
        'value' => '5',
        'lexicon' => 'fileupload:properties',
    ),
    array(
        'name' => 'path',
        'desc' => 'fu_path_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'fileupload:properties',
    ),
    array(
        'name' => 'uploadtv',
        'desc' => 'fu_uploadtv_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'fileupload:properties',
    ),
 );

return $properties;