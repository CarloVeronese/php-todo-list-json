<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div id="app">
        <section>
            <div class="container">
                <h1>To Do List</h1>
                <input type="text">
            </div>
        </section>
        <section>
            <div class="container">
                <ul>
                    <li v-for="todo in todos">{{ todo.text }}</li>
                </ul>
            </div>
        </section>
    </div>
    <script src="./js/app.js"></script>
</body>
</html>