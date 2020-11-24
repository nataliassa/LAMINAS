<?php
namespace Users;

use Laminas\ApiTools\Provider\ApiToolsProviderInterface;

class Module implements ApiToolsProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap($e)

    {
        $app = $e->getTarget();
        $services = $app->getServiceManager();
        $helpers  = $services->get('ViewHelperManager');
//        $hal      = $helpers->get('Hal');

        // The HAL plugin's EventManager instance does not compose a SharedEventManager,
        // so you must attach directly to it.
       // $hal->getEventManager()->attach('renderEntity', [$this, 'onRenderEntity']);
    }
    public function onRenderEntity($e)
    {
//        $entity = $e->getParam('entity');
//        if (! $entity->getEntity() instanceof \Users\V1\Entity\User) {
//            // do nothing
//            return;
//        }

        // Add a "describedBy" relational link
//        $entity->getLinks()->add(\Laminas\ApiTools\Hal\Link\Link::factory([
//            'rel' => 'emails',
//            'route' => [
//                'name' => 'users.rest.doctrine.emails',
//            ],
//        ]));
    }
    public function getAutoloaderConfig()
    {
        return [
            'Laminas\ApiTools\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
