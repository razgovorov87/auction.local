<?php 
require '../db.php';

$specification = R::dispense('specification');
$specification->title = 'Машины';

$auction = R::dispense('auctions');
$auction->title = 'Gosdirect';
$auction->start_date = "2019-10-10";
$auction->specification = $specification;
R::store($auction);

$item = R::dispense('item');
$item->title = 'BMW M5';
$item->description = 'Машина';

$peoples = R::dispense('peoples');
$peoples->name = 'Оливер';
$peoples->surname = 'Ковальчук';
$peoples->birthday = "1982-07-21";

$status = R::dispense('status');
$status->title = 'Продано';

$lot = R::dispense('lots');
$lot->number = 'RA4723';
$lot->item = $item;
$lot->start_price = '50000';
$lot->final_price = '0';
$lot->seller = $peoples;
$lot->buyer = $peoples;
$lot->auction = $auction;
$lot->status = $status;

R::store($lot);

header('Location: ../panel.php');
 ?>