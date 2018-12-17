<?php

namespace Lmyun\Laravel\Encrypts;

use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;

class Base64Encrypter implements EncrypterContract
{

    /**
     * Encrypt the given value.
     *
     * @param  mixed $value
     * @param  bool $serialize
     * @return mixed
     */
    public function encrypt($value, $serialize = true)
    {
        return base64_encode($value);
    }

    /**
     * Decrypt the given value.
     *
     * @param  mixed $payload
     * @param  bool $unserialize
     * @return mixed
     */
    public function decrypt($payload, $unserialize = true)
    {
        return base64_decode($payload);
    }
}