<?php
require '../db.php';
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
		$item = R::load('item', $input['id']);
		$item->title = $input['title'];
		$item->description = $input['desc'];
		R::store($item);

} else if ($input['action'] === 'delete') {
    $item = R::load('item', $input['id']);
    R::trash( $item );
}

echo json_encode($input);