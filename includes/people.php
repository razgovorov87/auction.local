<?php
require '../db.php';
// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

header('Content-Type: application/json');

$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
		$people = R::load('peoples', $input['id']);
		$people->name = $input['name'];
		$people->surname = $input['surname'];
		$people->birthday = $input['bday'];
		R::store($people);

} else if ($input['action'] === 'delete') {
    $people = R::load('peoples', $input['id']);
    R::trash( $people );
}

echo json_encode($input);