
# Namsor PHP Client
[![Join the chat at https://gitter.im/smochin/namsor-php-client](https://badges.gitter.im/smochin/namsor-php-client.svg)](https://gitter.im/smochin/namsor-php-client?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Total Downloads](https://img.shields.io/packagist/dt/smochin/namsor-php-client.svg?style=flat-square)](https://packagist.org/packages/smochin/namsor-php-client)
[![Latest Stable Version](https://img.shields.io/packagist/v/smochin/namsor-php-client.svg?style=flat-square)](https://packagist.org/packages/smochin/namsor-php-client)
![Branch master](https://img.shields.io/badge/branch-master-brightgreen.svg?style=flat-square)
[![Build Status](https://img.shields.io/travis/smochin/namsor-php-client/master.svg?style=flat-square)](http://travis-ci.org/#!/smochin/namsor-php-client)

A simple PHP Client for [http://www.namsor.com](http://www.namsor.com).

## Installation
Package is available on [Packagist](http://packagist.org/packages/smochin/namsor-php-client),
you can install it using [Composer](http://getcomposer.org).

```shell
composer require smochin/namsor-php-client
```

### Dependencies
- PHP 7
- json extension
- cURL extension

## Get started

### Initialize the Crawler
```php
$client = new Smochin\Namsor\Client();
```

### Recognize by first and last name
```php
$gender = $client->recognize('Jamerson', 'Silva');
```
