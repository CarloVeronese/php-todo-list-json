<?php
$task_index = $_POST['index'] ?? '';
$response = [];
$todos_json = file_get_contents('./todos.json');
$todosArray = json_decode($todos_json, true);
$todosArray[$task_index]['done'] = !$todosArray[$task_index]['done'];
$todos_json = json_encode($todosArray);
file_put_contents('./todos.json', $todos_json);
$response = [
    'success' => true,
    'results' => $todosArray
];
header('Content-Type: application/json');
echo json_encode($response);