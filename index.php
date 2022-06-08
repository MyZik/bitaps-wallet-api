<?php

declare(strict_types=1);

use Bitaps\WalletAPI\WalletAPI;

require_once './vendor/autoload.php';

$endpoint = "https://api.bitaps.com/btc/testnet/v1";
$walletId = "BTCvtxG5PMVycYnnDSZsbrnW5ddH79N1w9zvGc9AaR9XM2W8geb7z";
$password = "7508233";

$invoice = "invQ3KmeyaHkvWJ5DeC3QRk8FwKrYJzbcahtWcyQgnF8acGoUKE1k";
$paymentCode = "PMTuKo9pU1HT29P6ujMr2z2Xxng9gsPdL3frZjzUWME6gB9Bg1s3w";
$address = "2NDrpK8VFhtouJLMqWuLcEDibBwBgWAgodm";

$walletId2 = "BTCvVyvE4BFTDAocnTYgsEzHwgzrmigKL9arfsdErVtaV6EUTG172";
$password2 = "123456";

$invoice2 = "invNzwk2YSk8MsMg1ZT4HMQi7XnGZGeNFCHE1kaNMKRe6HGZTG17v";
$paymentCode2 = "PMTu9TCXMyb6RGGAfVh2yScoGXXwE2FTkPa5bRPGkk2fwr6q5fADo";
$address2 = "2N7KveFLWMrRNEpSDGi1vG5k1FZoiQx4B8A";

$wallet1 = new WalletAPI($endpoint, $walletId, $password);
$wallet2 = new WalletAPI($endpoint, $walletId2, $password2);

dump($wallet1->getCommitments());
// $sendCommitment = $wallet->sendCommitmentPayment("2NEkvFqUuqQKi5nmJ5AyMfg1ynE3QBPJbzR", 10000);
// dump($sendCommitment);
// dump($wallet->getCommitments());
// dump($wallet->getWalletState()->getBalanceAmount());
//
// dump($wallet->getCommitments());
