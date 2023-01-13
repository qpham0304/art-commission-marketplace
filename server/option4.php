<!-- option4.php to control and send request to controller -->
<html>
    <head>
        <title> Access Market database </title>
    </head>

    <body>
        <p>Display the aggregation result from commission table: <br></p>
		<form action = "http://css1.seattleu.edu/~qpham2/dbtest/db.php" method = "post">
		    Sort commission that has price lower than: <input type = "number" name = "option"/>
			<input type = "submit" value = "sort"/> Sort commission by price<br>
		</form>
    </body>
</html>
