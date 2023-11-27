<?php
// insert in variable new task from user
$new_todo = $_POST['text'] ?? '';
$response = [];
if($new_todo) {
    // save the json array in variable
    $todos_json = file_get_contents('./todos.json');
    // translate the array from json to php
    $todosArray = json_decode($todos_json, true);
    // create new object
    $new_task = [
        'text' => $new_todo,
        'done' => false
    ];
    // push new object in todos array
    $todosArray[] = $new_task;
    // translate array in json format
    $todos_json = json_encode($todosArray);
    // put in json updated array
    file_put_contents('./todos.json', $todos_json);
    $response = [
        'success' => true,
        'results' => $todosArray
    ];
}else {
    $response = [
        'success' => false,
        'message' => 'New Todo can not be empty'
    ];
}
header('Content-Type: application/json');
echo json_encode($response);


