<?php

namespace Lmyun\Laravel\Encrypts;

use Illuminate\Support\ServiceProvider;

class EncryptionServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('encrypters', function ($app) {
            return new EncryptManager($app);
        });

        $this->app->singleton('encrypters.driver', function ($app) {
            return $app['encrypters']->driver();
        });

        Crypts::extend('base64', function ($app, $config) {
            return new Base64Encrypter($config);
        });

        Crypts::extend('rsa', function ($app, $config) {
            return new RSAEncrypter($config);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/crypts.php' => config_path('crypts.php'),
        ]);
    }

}
