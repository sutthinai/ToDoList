<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 30px;
        }
        .todo-card {
            margin: 5px;
            padding-left: 10px;
            padding-right: 10px;
            overflow: hidden;
            align-content: center;
        }
        #new_todo {
            color: white;
        }
        .btn-success {
            background-color: #c3f584
        }
        .todo-card .btn-del {
            background-color: #faa29b;
            color: white;
            float: right;
            margin: 3px;
        }
        .todo-card a {
            font-size: 20px;
            align-content: center;
        }
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

        function clickDelete(id) {
            if (confirm("Do you want to delete this Task?")) {
                var xmlHttp = new XMLHttpRequest();
                xmlHttp.open("DELETE", "DataController.php?id="+id, false);
                xmlHttp.send(null);
                location.reload();
                return xmlHttp.responseText;
            }
        }

        function createToDoList() {
            var resp = JSON.parse(getData());
            
            for (let index = 0; index < resp.length; index++) {
                const element = resp[resp.length - index - 1];
                console.log(element["t_subject"]);
                console.log(element["t_date"]);

                var toDoCard = document.createElement("div");
                toDoCard.className = "todo-card rounded border border-primary";
                toDoCard.align = "left";
                
                var link = document.createElement("a");
                link.setAttribute('href', '#');
                link.onclick = function () {
                    console.log(element["t_subject"]);
                    console.log(element["t_date"]);
                    var xmlHttp = new XMLHttpRequest();
                    xmlHttp.open("PUT", "addnewtask.php", false);
                    xmlHttp.send(null);
                    window.location.href = "addnewtask.php?id=" + element["id"];
                    return xmlHttp.responseText;
                };
                link.innerHTML = element["t_date"] + " ___ " 
                                + element["t_subject"] + " - " 
                                + element["t_description"];
                toDoCard.appendChild(link);

                var btn = document.createElement("button");
                btn.innerHTML = "delete";
                btn.type = "button";
                btn.className = "btn btn-del";
                btn.onclick = function() {
                    clickDelete(element["id"]);
                };
                toDoCard.appendChild(btn)

                var toDoDiv = document.getElementById("todoList");
                toDoDiv.appendChild(toDoCard);
            }
            console.log(resp);
        }
    </script>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8" id="todoList" align="center">
            <h1>To DO List</h1>
        <button type="button" class="btn btn-success btn-lg btn-block" >
            <a href="addnewtask.php" id="new_todo">Add new task</a></button>
        </div>
        <div class="col-sm-2"></div>
    </div>
</body>

</html>