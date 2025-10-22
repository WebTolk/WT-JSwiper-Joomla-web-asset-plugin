<?php
/**
 * @package     WT Swiper.js
 * @copyright   (C) 2023 Sergey Tolkachyov <https://web-tolk.ru>
 * @link
 * @license     GNU General Public License version 3 or later
 */
namespace Joomla\Plugin\System\Wtjswiper\Extension;

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\SubscriberInterface;
use Joomla\CMS\WebAsset\WebAssetRegistry;
use Joomla\CMS\Factory;

class Wtjswiper extends CMSPlugin implements SubscriberInterface
{
    /**
     * Load the language file on instantiation.
     *
     * @var    boolean
     *
     * @since  3.9.0
     */
    protected $autoloadLanguage = true;

    protected $allowLegacyListeners = false;

    /**
     * @inheritDoc
     *
     * @return array
     *
     * @since 4.1.0
     *
     * @throws Exception
     */
    public static function getSubscribedEvents(): array
    {

       //@todo Change event to onAfterInitialiseDocument when remove Joomla 4 support and add check of document type via $app->getDocument() instance of HtmlDocument
        return $mapping  = [
            'onAfterRoute' => 'addSwiperPreset'
        ];
    }


    public function addSwiperPreset() : void
    {
        $app = $this->getApplication();
        // Only trigger in frontend
        if ($app->isClient('site'))
        {
            /** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
            $wa = Factory::getContainer()->get(WebAssetRegistry::class);
            $wa->addRegistryFile('media/plg_system_wtjswiper/joomla.asset.json');
        }
    }
}
