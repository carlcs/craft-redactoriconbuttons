# Redactor Icon Buttons plugin for Craft CMS

![Redactor Icon Buttons](https://github.com/carlcs/craft-redactoriconbuttons/blob/master/resources/screenshot.png)

This plugin allows to replace the text buttons with icons in the Redactor editor toolbar in Craft CMS.

## Installation

The plugin is available on Packagist and can be installed using Composer. You can also download the [latest release][0] and copy the files into craft/plugins/redactoriconbuttons/.

```
$ composer require carlcs/craft-redactoriconbuttons
```

Enable the plugin in your [Redactor config files][1] stored in craft/config/redactor/ by adding `iconbuttons` to the `plugins` setting. Make sure you have a config file in your Redactor field settings selected where the plugin is enabled.

## Icon Sets

The icon file the plugin uses by default contains a collection of icons from the (old) Redactor 10 editor and some handcrafted icons to complement the set.

Another icon file with icons from the [Google Material icon set][2] is included in the [_examples/][3] folder. Copy that file into a publicly accessible location and specify the path in the `iconFile` setting.

## Configuration

The plugin is pre-configured for Redactors default buttons. To customize it, create a new [plugin configuration file][4] in the craft/config/ folder called redactoriconbuttons.php, which returns an array of settings.

- **`iconMapping`** ([see defaults][5]) – Maps buttons to icons. The setting expects an array of key-value pairs that map a button’s index (inspect the “rel” attribute in the toolbar!) to the symbol ID of an icon in the SVG sprite.
- **`iconFile`** (default `null`) – The path to a SVG sprite containing icons for the toolbar. You can use [environment variables][6]. If this setting is set to `null`, the plugin falls back to the [default icons](#icon-sets).
- **`ieShim`** (default `true`) – Adds external spritemap support for IE9+ and Edge 12.

## Requirements

- PHP 5.4 or later
- Craft CMS 2.5 (including Redactor II) or later


  [0]: https://github.com/carlcs/craft-redactoriconbuttons/releases/latest
  [1]: https://craftcms.com/docs/rich-text-fields#redactor-configs
  [2]: https://design.google.com/icons/
  [3]: _examples/
  [4]: https://craftcms.com/docs/plugins/plugin-settings#config-file
  [5]: config.php
  [6]: https://craftcms.com/docs/multi-environment-configs#environment-specific-variables
