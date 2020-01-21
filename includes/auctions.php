<?php
require '../db.php';
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
		$auction = R::load('auction', $input['id']);
		$specification = R::load('specification', $input['specification']);
		$item = R::load('item', $input['item']);
		$auction->title = $input['title'];
		$auction->start_date = $input['start_date'];
		$auction->specification = $specification;
		R::store($auction);

} else if ($input['action'] === 'delete') {
   	$auction = R::load('auction', $input['id']);
    R::trash( $auction );
}

echo json_encode($input);