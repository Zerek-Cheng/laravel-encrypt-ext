<?php

namespace Lmyun\Laravel\Encrypts;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string encrypt(string $value)
 * @method static string decrypt(string $payload)
 *
 * @see \Illuminate\Encryption\Encrypter
 */
class Crypts extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'encrypters';
    }
}
