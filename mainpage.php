<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        .todo-card {}
    </style>
</head>

<body>
    <script>
        window.onload = function() {
            createToDoList();
        };

        function getData() {
            var xmlHttp = new XMLHttpRequest();
            xmlHttp.open("GET", "DataController.php", false);
            xmlHttp.send(null);
            return xmlHttp.responseText;
        }

        function createToDoList() {
            var resp = JSON.parse(getData());
        
            console.log(resp);
            var todoList = ["slide 1", "slide 2", "slide 3", "slide 4", "slide 5"]

            for (let index = 0; index < todoList.length; index++) {
                const todo = todoList[index];

                var toDoCard = document.createElement("div");
                toDoCard.innerHTML = todo;
                toDoCard.className = "todo-card"

                var btn = document.createElement("button");
                btn.innerHTML = "delete";
                btn.type = "button";
                btn.className = "btn btn-primary btn-lg";
                btn.onclick = function() {
                    alert("blabla");
                };

                toDoCard.appendChild(btn)

                var toDoDiv = document.getElementById("todoList");
                toDoDiv.appendChild(toDoCard);
            }
        }
    </script>

    <div class="row">
        <div class="col-sm-2">.col-sm-3</div>
        <div class="col-sm-8" id="todoList">
        <button type="button" class="btn btn-primary btn-lg btn-block">Add new task</button>
        </div>
        <div class="col-sm-2">.col-sm-3</div>
    </div>
</body>

</html>