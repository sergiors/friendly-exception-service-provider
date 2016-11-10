Friendly Exception Service Provider
-----------------------------------

Install
-------
```bash
composer require sergiors/friendly-exception-service-provider "dev-master"
```

```php
use Silex\Provider\TwigServiceProvider;
use Sergiors\Silex\Provider\FriendlyExceptionServiceProvider;

$app->register(new TwigServiceProvider());
$app->register(new FriendlyExceptionServiceProvider(), [
    'friendly_exception.notfound' => '404_notfound.html.twig',
    'friendly_exception.exception' => '5xx.html.twig',
]);
```

License
-------
MIT