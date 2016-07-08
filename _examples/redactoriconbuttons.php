<?php

/**
 * craft/config/redactoriconbuttons.php
 *
 * The google-material.svg example SVG sprite contains Google Material Icons
 * created with the Icomoon App https://icomoon.io/app
 */
return [
    // Maps buttons to icons. The setting expects an array of key-value pairs
    // that map a button's index (inspect the "rel" attribute in the toolbar!)
    // to the symbol ID of an icon in the SVG sprite.
    'iconMapping' => [
        'html' => 'settings',
        'format' => 'format_size',
        'bold' => 'format_bold',
        'italic' => 'format_italic',
        'lists' => 'format_list_bulleted',
        'table' => 'border_all',
        'image' => 'crop_original',
        'video' => 'ondemand_video',
        'file' => 'attach_file',
        'link' => 'insert_link',
        'horizontalrule' => 'remove',
        'fullscreen' => 'fullscreen',
    ],

    // The path to a SVG sprite containing icons for the toolbar. You can use
    // environment variables.
    'iconFile' => '/assets/icons/google-material.svg',

    // Adds external spritemap support for IE9+ and Edge 12.
    'ieShim' => true,
];
