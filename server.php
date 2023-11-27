<?php

$todos = file_get_contents('./todos.json');
$todosArray = json_decode($todos, true);

$response = [
    'success' => true,
    'results' => $todosArray
];

header('Content-Type: application/json');
echo json_encode($response);