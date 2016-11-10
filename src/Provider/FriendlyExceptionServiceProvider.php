<?php

namespace Sergiors\Silex\Provider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @author Sérgio Rafael Siqueira <sergio@inbep.com.br>
 */
final class FriendlyExceptionServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        if ($app['debug']) {
            return;
        }

        if (!isset($app['twig'])) {
            throw new \LogicException(
                'You must register the TwigServiceProvider to use the FriendlyExceptionServiceProvider.'
            );
        }

        $app->error(function (NotFoundHttpException $e) use ($app) {
            return $app['twig']->render($app['friendly_exception.notfound']);
        });

        $app->error(function (\Exception $e) use ($app) {
            return $app['twig']->render($app['friendly_exception.exception']);
        });

        $app['friendly_exception.notfound'] = 'notfound.html.twig';
        $app['friendly_exception.exception'] = 'exception.html.twig';
    }
}
