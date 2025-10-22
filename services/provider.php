<?php

/**
 *  @package   WT Masonry.js
 *  @copyright Copyright Sergey Tolkachyov, <https://web-tolk.ru>
 *  @license   GNU General Public License version 3, or later
 */

defined('_JEXEC') || die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Joomla\Plugin\System\Wtjswiper\Extension\Wtjswiper;

return new class () implements ServiceProviderInterface {
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 *
	 * @since   4.0.0
	 */
	public function register(Container $container)
	{
		$container->set(
			PluginInterface::class,
			function (Container $container) {
				$dispatcher = $container->get(DispatcherInterface::class);
                $plugin     = new Wtjswiper(
                    $dispatcher,
                    (array) PluginHelper::getPlugin('system', 'wtjswiper')
                );
				$plugin->setApplication(Factory::getApplication());
                return $plugin;
			}
		);
	}
};