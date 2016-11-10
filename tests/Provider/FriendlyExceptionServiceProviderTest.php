<?php

namespace Sergiors\Silex\Tests\Provider;

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Doctrine\Common\Cache\ApcuCache;
use Sergiors\Silex\Provider\FriendlyExceptionServiceProvider;

class FriendlyExceptionServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function register()
    {
        $app = $this->createApplication();
        $app->register(new TwigServiceProvider());
        $app->register(new FriendlyExceptionServiceProvider());

        $this->assertArrayHasKey('friendly_exception.notfound', $app);
        $this->assertArrayHasKey('friendly_exception.exception', $app);
    }

    public function createApplication()
    {
        return new Application();
    }
}
