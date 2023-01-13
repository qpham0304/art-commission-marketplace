<!-- option4.php to control and send request to controller -->
<html>
    <head>
        <title> Access Market database </title>
    </head>

    <body>

        <p>Enter the information below to modify the customer table: <br></p>

		<form action = "http://css1.seattleu.edu/~qpham2/dbtest/db.php" method = "post">
		    <input type = "text" name = "cid"> placeholder = "cid"<br>
		    <input type = "text" name = "phoneNum"> placeholder = "phoneNum"<br>
		    <input type = "text" name = "shippingInfo"> placeholder = "shippingInfo"<br>
		    <input type = "text" name = "email"> placeholder = "email"<br>
		    <input type = "text" name = "cname"> placeholder = "cname"<br>

		    <input type = "radio"  name = "option" value = "insert" />Insert<br>
		    <input type = "radio"  name = "option" value = "update" />Update<br>
		    <input type = "radio"  name = "option" value = "delete" />Delete<br>

		    <input type = "submit" value = "modify" />
		</form>
    </body>
</html>
