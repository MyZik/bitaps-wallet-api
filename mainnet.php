<?php

declare(strict_types=1);

use Bitaps\WalletAPI\WalletAPI;

require_once './vendor/autoload.php';

$endpoint = "https://api.bitaps.com/btc/v1";
$walletId = "BTCvZdpWKEHuCCjj5j8TR8sFmhq3Bo2ZUoxYh75W3Kv2b4ZYAdvgW";
$password = "689247";

$wallet = new WalletAPI($endpoint, $walletId, $password);

$address = "1CNQYeotFecxZPRsUdZhchf9BRu27wuXbZ";

dd($wallet->sendAllAvailableBalance($address));

