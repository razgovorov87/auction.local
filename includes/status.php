<?php
require '../db.php';
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
		$status = R::load('status', $input['id']);
		$status->title = $input['title'];
		R::store($status);

} else if ($input['action'] === 'delete') {
    $status = R::load('status', $input['id']);
    R::trash( $status );
}

echo json_encode($input);