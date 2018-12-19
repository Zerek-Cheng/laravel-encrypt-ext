# laravel-encrypt-ext
对Laravel 5.7版本提供更多加密支持
安装方法
```
composer require 0myun/laravel-encrypt-ext
composer加载后释放配置文件
php artisan vendor:publish
```
拓展方法参考Laravel自带的其他组件,本拓展的Crypts门面提供了extend方法

### 默认配置文件
```
<?php

return [

    'driver' => 'aes',

    'aes' => [
        'key' => app()['config']['app.key'],
        'cipher' => app()['config']['app.cipher'],
    ],

    'rsa' => [
        'priKey' => '-----BEGIN PRIVATE KEY-----
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
-----END PRIVATE KEY-----',
        'pubKey' => '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCdeHAKViZ8o+Z+eYZZ65zcd+In
nQaseBERfwTxMiQXwQCUgz5PWDqbht+7w5L5pdNL/uG65ZbHOPz/vtVyLeq4O6/z
X/s6MjIeT4LBGTEQCCbMaVPOU9i8g780PgtmS3AzN8+b7hEowqJQ1JzYnxINMLkq
G86zbBTjZL5LmcaA7wIDAQAB
-----END PUBLIC KEY-----',
    ],
];
```

代码里的调用方法也参考框架自带组件
例如
```
\Crypts::driver('rsa')->encrypt('aaaa', false)
\Crypts::encrypt('aaaa', false)
```




# :)
