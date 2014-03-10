<?php

namespace Pagekit\System\Event;

use Pagekit\Framework\Event\EventSubscriber;

class FrontpageListener extends EventSubscriber
{
    /**
     * Registers frontpage route
     */
    public function onBoot()
    {
        if ($frontpage = $this('option')->get('system:app.frontpage')) {
            $this('router')->getUrlAliases()->register('/', $this('url')->to($frontpage));
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'boot' => array('onBoot', 8)
        );
    }
}
