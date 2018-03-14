# cUrl

[ru](#ru) [en](#en)

# ru

Класс для более удобного использования curl

* установка:
<pre>
composer require shopnagru/php-curl
</pre>

* пример:
<pre>
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
* пример:
<pre>
use SNR\cUrl;
...
$curl = new cUrl();
$curl->setUrl('https://google.com');
$curl->setReturnHeader(false);
$response = $curl->execute();
</pre>