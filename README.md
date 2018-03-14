# cUrl

[![GitHub license](https://img.shields.io/github/license/shopnagru/PHPcUrl.svg)](https://github.com/shopnagru/PHPcUrl/blob/master/LICENSE)


[ru](#ru) [en](#en)

# ru

Класс для более удобного использования curl

* установка:
<pre>
composer require shopnagru/php-curl
</pre>

* пример:
<pre>
require_once __DIR__ . '/vendor/autoload.php';
use SNR\cUrl;
...
$curl = new cUrl();
$curl->setUrl('https://google.com');
$curl->setReturnHeader(false);
$response = $curl->execute();
</pre>

# en

Php class for easy cUrl

* installation:
<pre>
composer require shopnagru/php-curl
</pre>

* example:
<pre>
require_once __DIR__ . '/vendor/autoload.php';
use SNR\cUrl;
...
$curl = new cUrl();
$curl->setUrl('https://google.com');
$curl->setReturnHeader(false);
$response = $curl->execute();
</pre>