<?php
require '../db.php';
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
		$lot = R::load('lots', $input['id']);
		$item = R::load('item', $input['item']);
		$seller = R::load('peoples', $input['seller']);
		$buyer = R::load('peoples', $input['buyer']);
		$status = R::load('peoples', $input['status']);
		$auction = R::load('auction', $input['auction']);
		$lot->number = $input['num'];
		$lot->start_date = $input['start_date'];
		$lot->start_price = $input['start_price'];
		if( $input['final_price'] != '') {
			$lot->final_price = $input['final_price'];
		}
		$lot->item = $item;
		$lot->seller = $seller;
		$lot->buyer = $buyer;
		$lot->status = $status;
		$lot->auction = $auction;
		R::store($lot);

} else if ($input['action'] === 'delete') {
    $lot = R::load('lots', $input['id']);
    R::trash( $lot );
}

echo json_encode($input);