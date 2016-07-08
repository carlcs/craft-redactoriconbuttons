<?php
namespace Craft;

class RedactorIconButtonsPlugin extends BasePlugin
{
    public function getName()
    {
        return 'Redactor Icon Buttons';
    }

    public function getVersion()
    {
        return '1.0.0';
    }

    public function getSchemaVersion()
    {
        return '1.0.0';
    }

    public function getDeveloper()
    {
        return 'carlcs';
    }

    public function getDeveloperUrl()
    {
        return 'https://github.com/carlcs';
    }

    public function getDocumentationUrl()
    {
        return 'https://github.com/carlcs/craft-redactoriconbuttons';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://github.com/carlcs/craft-redactoriconbuttons/raw/master/releases.json';
    }

    // Public Methods
    // =========================================================================

    /**
     * Initializes the plugin.
     */
    public function init()
    {
        if (craft()->request->isCpRequest()) {
            $this->includeCpResources();
        }
    }

    /**
     * Make sure requirements are met before installation.
     *
     * @throws Exception
     */
    public function onBeforeInstall()
    {
        if (!defined('PHP_VERSION') || version_compare(PHP_VERSION, '5.4', '<')) {
            throw new Exception($this->getName().' plugin requires PHP 5.4 or later.');
        }
    }

    // Protected Methods
    // =========================================================================

    /**
     * Includes the plugin's resources for the Control Panel.
     */
    protected function includeCpResources()
    {
        // Prepare config
        $config = [];

        $config['iconMapping'] = craft()->config->get('iconMapping', 'redactoriconbuttons');

        if (craft()->config->get('iconFile', 'redactoriconbuttons')) {
            $url = craft()->config->get('iconFile', 'redactoriconbuttons');
            $config['iconFile'] = craft()->config->parseEnvironmentString($url);
        } else {
            $config['iconFile'] = UrlHelper::getResourceUrl('redactoriconbuttons/icons/redactor-i.svg');
        }

        // Include JS
        $config = JsonHelper::encode($config);

        $js = "var RedactorIconButtons = {}; RedactorIconButtons.config = {$config};";

        craft()->templates->includeJs($js);
        craft()->templates->includeJsResource('redactoriconbuttons/redactoriconbuttons.js');

        // Include CSS
        craft()->templates->includeCssResource('redactoriconbuttons/redactoriconbuttons.css');

        // Add external spritemap support for IE9+ and Edge 12
        $ieShim = craft()->config->get('ieShim', 'redactoriconbuttons');
        if (filter_var($ieShim, FILTER_VALIDATE_BOOLEAN)) {
            craft()->templates->includeJsResource('redactoriconbuttons/lib/svg4everybody.min.js');
            craft()->templates->includeJs('svg4everybody();');
        }
    }
}
