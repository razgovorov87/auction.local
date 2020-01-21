<?php
require '../db.php';
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
		$specification = R::load('specification', $input['id']);
		$specification->title = $input['title'];
		R::store($specification);

} else if ($input['action'] === 'delete') {
    $specification = R::load('specification', $input['id']);
    R::trash( $specification );
}

echo json_encode($input);