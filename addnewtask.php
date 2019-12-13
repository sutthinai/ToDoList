<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
		form .btn {
			width: 150px;
		}
	</style>
</head>

<body>
	<?php
	if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
		$fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = parse_url($fullURL);
        parse_str($parts['query'], $query);
		$inputId = $query['id'];
		$inputSubject = 
        deleteToDo($inputId);
	}
	?>
	<div class="form-group" align="center">
		<p>
			<H1>Add Subject</H1>
		</p>

		<form action="DataController.php" method="post">
			Subject: <input type="data" value='' name="subject" class="form-control">
			<br>
			Day: <input type="date" value='' name="date" class="form-control">
			<br>
			Description:
			<br>
			<input type="textbox" name="description" class="form-control">
			<br>
			<input type="submit" class="btn btn-primary" value="save">
			<input type="button" value='cancel' onclick="location.href = 'mainpage.php';" class="btn btn-secondary">
		</form>
	</div>
</body>

</html>