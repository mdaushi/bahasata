<h1 align="center">muhfirdaus19/bahasata</h1>

<p align="center">
    <strong>text processing bahasa indonesia PHP</strong>
</p>

<!--
TODO: Make sure the following URLs are correct and working for your project.
      Then, remove these comments to display the badges, giving users a quick
      overview of your package.

<p align="center">
    <a href="https://github.com/muhfirdaus19/bahasata"><img src="http://img.shields.io/badge/source-muhfirdaus19/bahasata-blue.svg?style=flat-square" alt="Source Code"></a>
    <a href="https://packagist.org/packages/muhfirdaus19/bahasata"><img src="https://img.shields.io/packagist/v/muhfirdaus19/bahasata.svg?style=flat-square&label=release" alt="Download Package"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/muhfirdaus19/bahasata.svg?style=flat-square&colorB=%238892BF" alt="PHP Programming Language"></a>
    <a href="https://github.com/muhfirdaus19/bahasata/blob/master/LICENSE"><img src="https://img.shields.io/packagist/l/muhfirdaus19/bahasata.svg?style=flat-square&colorB=darkcyan" alt="Read License"></a>
    <a href="https://github.com/muhfirdaus19/bahasata/actions/workflows/continuous-integration.yml"><img src="https://img.shields.io/github/workflow/status/muhfirdaus19/bahasata/build/main?style=flat-square&logo=github" alt="Build Status"></a>
    <a href="https://codecov.io/gh/muhfirdaus19/bahasata"><img src="https://img.shields.io/codecov/c/gh/muhfirdaus19/bahasata?label=codecov&logo=codecov&style=flat-square" alt="Codecov Code Coverage"></a>
    <a href="https://shepherd.dev/github/muhfirdaus19/bahasata"><img src="https://img.shields.io/endpoint?style=flat-square&url=https%3A%2F%2Fshepherd.dev%2Fgithub%2Fmuhfirdaus19%2Fbahasata%2Fcoverage" alt="Psalm Type Coverage"></a>
</p>
-->


## About

<!--
TODO: Use this space to provide more details about your package. Try to be
      concise. This is the introduction to your package. Let others know what
      your package does and how it can help them build applications.
-->


Bahasata is Example Text Processing for bahasa indonesia written in PHP. \
for now only can stemmer and tokenizer 


## Cara Install

Bahasata dapat diinstall melalui [Composer](https://getcomposer.org).

``` bash
composer require muhfirdaus19/bahasata:dev-main
```


## Penggunaan
## Text tokenization
memisahkan kata, kalimat

``` php

use Bahasata\Bahasata;

// include autoloader
require './vendor/autoload.php';

$bahasata = new Bahasata();
$write = $bahasata->write('tetap bersama, jaga kesehatan!');

$result = $write->get();
// tetap bersama, jaga kesehatan!

$result = $write->wordsTokenizer()->get();
// ['tetap' ,'bersama' ,'jaga' ,'kesehatan']

$result = $write->sentencesTokenizer()->get();
// ['tetap bersama' ,'jaga kesehatan']

print_r($result);
```
## Stemmer
mencari kata dasar dari sebuat kalimat/kata. contoh : memakan -> makan

``` php
use Bahasata\Bahasata;

// include autoloader
require './vendor/autoload.php';

$bahasata = new Bahasata();
$result = $bahasata->stem('merekomendasikan');
// rekomendasi

$write = $bahasata->write('saya rekomendasikan untuk memakan sayur');
$result = $write->wordsTokenizer()->stem()->get();
// ['saya', 'rekomendasi', 'untuk', 'makan', 'sayur']

print_r($result);

```


<!-- ## Contributing

Contributions are welcome! To contribute, please familiarize yourself with
[CONTRIBUTING.md](CONTRIBUTING.md). -->





## Copyright and License

The muhfirdaus19/bahasata library is copyright © Muhammad Firdaus
and licensed for use under the terms of the
MIT License (MIT). Please see [LICENSE](LICENSE) for more information.


