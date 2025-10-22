# WT JSwiper Joomla web asset plugin
This plugin is for Joomla developers. The plugin registers **Swiper.js** package in Joomla Web Assets Manager.

Plugin for Joomla developers. It allows you to use Swiper.js anywhere in Joomla 4+: in modules, components, plugins.

To do this in your code, use:
```php
use Joomla\CMS\Factory;

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->useScript('swiper-bundle')->useStyle('swiper-bundle'); // Use local file
$wa->usePreset('swiper-bundle-remote'); // Connect from CDN
```
At the moment, only the swiper-bundle is connected with this plugin.

The plugin can be used as a dependency when developing your own extensions for Joomla 4+. The plugin uses the Joomla 4+ update system.
