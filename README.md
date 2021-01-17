[![License](https://poser.pugx.org/eldarqa/bitaps-wallet-api/license)](//packagist.org/packages/eldarqa/bitaps-wallet-api)
![Scrutinizer code quality (GitHub/Bitbucket)](https://img.shields.io/scrutinizer/quality/g/MyZik/bitaps-wallet-api/master)
[![Build Status](https://scrutinizer-ci.com/g/MyZik/bitaps-wallet-api/badges/build.png?b=master)](https://scrutinizer-ci.com/g/MyZik/bitaps-wallet-api/build-status/master)
![GitHub release (latest SemVer)](https://img.shields.io/github/v/release/MyZik/bitaps-wallet-api)

# Bitaps Wallet API

This repository provides the methods of Bitaps Wallet API (https://developer.bitaps.com/wallet) with PHP. This package
works with all available currencies of API (BTC, LTC, BHC, ETH) and supports all endpoints (Mainnet, Testner, TOR
Mainnet)

## Requirements:

- PHP 7.4 or higher
- cURL

## Installation

````bash
composer require eldarqa/bitaps-wallet-api
````

## How to use

Don't forget to set your endpoint :)
https://developer.bitaps.com/wallet#API_endpoint

### 1. Create wallet

```php
// use Bitaps\WalletAPI\WalletAPI;

$endpoint = "https://api.bitaps.com/btc/testnet/v1/";

$api = new WalletAPI($endpoint);
$create = $api->createWallet(); 
// it's recommended to set the password, just use: $api->createWallet($callbackLink, $password);

// $create->getWalletId();
```

### 2. Create wallet payment address

```php
// use Bitaps\WalletAPI\WalletAPI;

$endpoint = "https://api.bitaps.com/btc/testnet/v1/";
$walletId = "your wallet ID";
$password = "your password (if requires)"; 

$api = new WalletAPI($endpoint, $walletId, $password);
$address = $api->addAddress();

//$address->getAddress(); 
```

### 3. Send payment

```php
// use Bitaps\WalletAPI\WalletAPI;

$endpoint = "https://api.bitaps.com/btc/testnet/v1/";
$walletId = "your wallet ID";
$password = "your password (if requires)"; 

$api = new WalletAPI($endpoint, $walletId, $password);

$receiverAddress = "abcdefg123456xxxx";
$receiverAmount = 30000; // In Satoshi

$payment = $api->addPayment($receiverAddress, $receiverAmount)->pay();

//$receivers = $payment->getTxList();
//
//foreach ($receivers as $receiver) {
//    var_dump($receiver->getTxHash());
//}
```

You cann add more receivers:

```php
$receiverAddress = "abcdefg123456xxxx";
$receiverAmount = 30000; // In Satoshi

$secondReceiverAddress = "qwerty25525woo";
$secondReceiverAmount = 40000; // In Satoshi

$thirdReceiverAddress = "zyxwe135679zzz";
$thirdReceiverAmount = 50000; // In Satoshi


$payment = $api->addPayment($receiverAddress, $receiverAmount)
               ->addPayment($secondReceiverAddress, $secondReceiverAmount)
               ->addPayment($thirdReceiverAddress, $thirdReceiverAmount)
               ->pay();
```

## 4. Wallet state

```php
// use Bitaps\WalletAPI\WalletAPI;

$endpoint = "https://api.bitaps.com/btc/testnet/v1/";
$walletId = "your wallet ID";
$password = "your password (if requires)"; 

$api = new WalletAPI($endpoint, $walletId, $password);

$state = $api->getWalletState();

//$state->getBalanceAmount();
```

## 5. Wallet transaction list

```php
// use Bitaps\WalletAPI\WalletAPI;

$endpoint = "https://api.bitaps.com/btc/testnet/v1/";
$walletId = "your wallet ID";
$password = "your password (if requires)"; 

$api = new WalletAPI($endpoint, $walletId, $password);

$transactions = $api->getTransactions();

//$transactions->getTransactions();
//$transactions->getPendingTransactions();
```

## 6. Wallet addresses list

```php
// use Bitaps\WalletAPI\WalletAPI;

$endpoint = "https://api.bitaps.com/btc/testnet/v1/";
$walletId = "your wallet ID";
$password = "your password (if requires)"; 

$api = new WalletAPI($endpoint, $walletId, $password);

$addresses = $api->getAddresses();

//foreach ($addresses->getTxList() as $address)
//{
//    $address->getReceivedAmount();
//}
```

## 7. Wallet address transaction list

```php
// use Bitaps\WalletAPI\WalletAPI;

$endpoint = "https://api.bitaps.com/btc/testnet/v1/";
$walletId = "your wallet ID";
$password = "your password (if requires)"; 

$api = new WalletAPI($endpoint, $walletId, $password);

$address = "abcde123456789fghijkl";
$transactions = $api->getAddressTransactions($address);

//$transactions->getTransactions();
//$transactions->getPendingTransactions();
```

## 8. Daily wallet statistics

```php
// use Bitaps\WalletAPI\WalletAPI;

$endpoint = "https://api.bitaps.com/btc/testnet/v1/";
$walletId = "your wallet ID";
$password = "your password (if requires)"; 

$api = new WalletAPI($endpoint, $walletId, $password);

$statistics = $api->getDailyStatistics();

//foreach ($statistics->getDayList() as $data)
//{
//    $data->getBalanceAmount();
//}
```
