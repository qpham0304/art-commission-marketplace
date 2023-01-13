<!-- option2.php to control and send request to controller -->
<html>
    <head>
        <title> Access Market database </title>
    </head>

    <body>
        <p>Choose one of the following options to perform the task: </p>
		<form action = "http://css1.seattleu.edu/~qpham2/dbtest/db.php" method = "post">
			<input type = "radio" value = "select * from customer" name = "option"/>Display data from customer table<br>
			<input type = "radio" value = "select * from artist" name = "option"/>Display data from artist table<br>
			<input type = "radio" value = "select * from orders" name = "option"/>Display data from orders table<br>
			<input type = "radio" value = "select * from commission" name = "option"/>Display data from commission table<br>
			<input type = "submit"  value = "Submit request" />
		</form>
    </body>
</html>
