<?php

use Tuxxx128\G2aPay\G2aPayApi;
use Tuxxx128\G2aPay\G2aPayItem;

$g2aPayApi = new G2aPayApi('API HASH', 'SECRET KEY', true, 'EMAIL OF STORE');

// Order items

// item - 1
$itemOne = (new G2aPayItem)->itemTemplate();

$itemOne->name = "My item";
$itemOne->url = "http://google.com";
$itemOne->price = 10; // default currency is 'EUR'

$g2aPayApi->addItem($itemOne);

// item - 2
$itemTwo = (new G2aPayItem)->itemTemplate();

$itemTwo->name = "My item";
$itemTwo->url = "http://google.com";
$itemTwo->price = 25; // default currency is 'EUR'

$g2aPayApi->addItem($itemOne);

// Discount item
$itemDiscount = (new G2aPayItem)->itemTemplate();

$itemDiscount->name = "Discount";
$itemDiscount->url = "http://google.com";

$g2aPayApi->addPercentDiscountItem($itemDiscount, 25);

// Set required parameters and redirect to payment gateway

$g2aPayApi->setUrlFail("https://www.google.cz/?gfe_rd=cr&ei=98-bWN6ZDbGE8QfwhpnQCw&gws_rd=ssl#q=bad");
$g2aPayApi->setUrlSuccess("https://www.google.cz/?gfe_rd=cr&ei=98-bWN6ZDbGE8QfwhpnQCw&gws_rd=ssl#q=success");
$g2aPayApi->setOrderId(1234);
// $g2aPayApi->setEmail('user@server.tld');

header('Location: '.$g2aPayApi->getRedirectUrlOnGateway());