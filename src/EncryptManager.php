<?php

namespace Lmyun\Laravel\Encrypts;

use Illuminate\Support\Manager;
use InvalidArgumentException;
use Illuminate\Encryption\Encrypter as AesEncryptDriver;
use Illuminate\Support\Str;

class EncryptManager extends Manager
{
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->app['config']['crypts.driver'] ?? 'aes';
    }

    public function driver($name = null, $config = null)
    {
        $name = is_null($name) ? $this->getDefaultDriver() : $name;
        $name = is_null($name) ? 'aes' : $name;
        $config = $config ?? $this->getConfig($name);
        if (isset($this->customCreators[$name])) {
            return $this->callCustomCreatorConfig($name, $config);
        }

        $driverMethod = 'create' . ucfirst($name) . 'Driver';

        if (method_exists($this, $driverMethod)) {
            return $this->{$driverMethod}($name, $config);
        }

        throw new InvalidArgumentException("Crypt Driver [$name}] for guard [{$name}] is not defined.");
    }


    protected function getConfig($name)
    {
        return $this->app['config']["crypts.{$name}"] ?? [];
    }

    protected function callCustomCreatorConfig($name, array $config)
    {
        return $this->customCreators[$name]($this->app, $config);
    }


    public function createAesDriver($name, $config)
    {
        $key = $config['key'];
        if (Str::startsWith($key, 'base64:')) {
            $key = base64_decode(substr($key, 7));
        }
        return new AesEncryptDriver($key, $config['cipher']);
    }
}