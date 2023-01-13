<!-- option1.php to control and send request to controller -->
<html>
    <head>
        <title> Access Market database </title>
    </head>

    <body>
        <p>Choose one of the following options to perform the task: </p>
		<form action = "http://css1.seattleu.edu/~qpham2/dbtest/db.php" method = "post">
			<input type = "radio" value = "desc customer" name = "option"/>Get description of customer table<br>
			<input type = "radio" value = "desc artist" name = "option"/>Get description of artist table<br>
			<input type = "radio" value = "desc orders" name = "option"/>Get description of orders table<br>
			<input type = "radio" value = "desc commission" name = "option"/>Get description of commission table<br>
			<input type = "submit"  value = "Submit request" />
		</form>
    </body>
</html>
