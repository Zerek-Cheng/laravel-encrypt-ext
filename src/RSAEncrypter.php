<?php
/**
 * Created by PhpStorm.
 * User: 13321
 * Date: 2018/12/17
 * Time: 14:24
 */

namespace Lmyun\Laravel\Encrypts;

use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;

class RSAEncrypter implements EncrypterContract
{
    protected $priKey = "-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAJ14cApWJnyj5n55
hlnrnNx34iedBqx4ERF/BPEyJBfBAJSDPk9YOpuG37vDkvml00v+4brllsc4/P++
1XIt6rg7r/Nf+zoyMh5PgsEZMRAIJsxpU85T2LyDvzQ+C2ZLcDM3z5vuESjColDU
nNifEg0wuSobzrNsFONkvkuZxoDvAgMBAAECgYAgKKB4++8QNUi1O4w8gOmf/Luq
616ZikuyDwarW1oTn87GhacL/TC64mh+qAo0AbGNK5hd2tVYCkNg11Av6UCt3T6q
aJnIQZJh8rydneRszSfipQiT4/l+JDHq68DA7CE5TYcoaZRsegoPMszu+CEcsNdx
BQXtc8GsP9/ha2qBQQJBAMuO4HiG4GLQe+IDMgaexPUcngWX0ceJDEje602UPjQz
I40Ad3VhAxL0pytGyrdhlDI4dYYcQno9ul4aauTYFRUCQQDGCfmEXxCaYvG/FanN
hWNfw/MTzAkpW7yEBJE1aBJEzAeUxALyPswzJje5BJ1W7qiy1SLTYjZObvRbo7My
fAbzAkEAsiqiSpwzNgopBE+rr6Oz3J5pqZeSo8VOnVGQPtzr/SBtk3K/HFwHJsZA
s15I/G1KGxLTushtXzU8NDWHLjn7aQJAaJu4O53jrUl6nQ8aZL+C4IEnE1wBsuEM
UUgAVA+nJsQHdSOc0s0tHA+h+49edR8X6W8AOFx2hzPAy+9Kpu4w1QJBALqRWSHN
GBLkAP/dgzfYXANKr6+H2STlmxxsRFT9lWIEqj9uHIZlw88hnNjeXqHNOGs8j+wk
hqnzZMHrqJQ/+Eg=
-----END PRIVATE KEY-----
";
    protected $pubKey = "-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCdeHAKViZ8o+Z+eYZZ65zcd+In
nQaseBERfwTxMiQXwQCUgz5PWDqbht+7w5L5pdNL/uG65ZbHOPz/vtVyLeq4O6/z
X/s6MjIeT4LBGTEQCCbMaVPOU9i8g780PgtmS3AzN8+b7hEowqJQ1JzYnxINMLkq
G86zbBTjZL5LmcaA7wIDAQAB
-----END PUBLIC KEY-----
";

    public function __construct($config = null)
    {
        if (empty($config)) {
            return;
        }
        $this->priKey = $config['priKey'];
        $this->pubKey = $config['pubKey'];
    }

    /**
     * Encrypt the given value.
     *
     * @param  mixed $value
     * @param  bool $serialize
     * @return mixed
     */
    public function encrypt($value, $serialize = true)
    {
        $tmp = "";
        if ($serialize) {
            openssl_public_encrypt($value, $tmp, $this->pubKey);
        } else {
            openssl_private_encrypt($value, $tmp, $this->priKey);
        }

        return base64_encode($tmp);
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
        $tmp = "";
        if ($unserialize) {
            openssl_private_decrypt(base64_decode($payload), $tmp, $this->priKey);
        } else {
            openssl_public_decrypt(base64_decode($payload), $tmp, $this->pubKey);
        }
        return $tmp;
    }
}