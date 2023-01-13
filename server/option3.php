<!-- option3.php to control and send request to controller -->
<html>
    <head>
        <title> Access Market database </title>
    </head>

    <body>
        <p>Choose one of the following options to perform the task: </p>

        <?php
            $customer_order_join = "select C.cid, O.orderNumber, O.shipDate
                                    from customer C, orders O
                                    where O.cid = C.cid
                                    LIMIT 50;";
            $orders_commission_join = "select O.orderNumber, O.commissionID, C.price, O.shipDate, C.request
                                    from orders O, commission C
                                    where O.commissionID = C.commissionID
                                    LIMIT 50;";
            $artist_commission_join = "select A.email, A.experience, C.commissionID, C.request
                                    from artist A, commission C
                                    where A.email = C.email
                                    LIMIT 50;";
            $customer_artist_commission_join = "SELECT C1.cid, A.email, C2.commissionID, C2.request
                                    FROM orders O, customer C1, commission C2, artist A
                                    WHERE O.cid = C1.cid
                                    AND O.commissionID = C2.commissionID
                                    AND A.email = C2.email
                                    LIMIT 10;";
        ?>

		<form action = "http://css1.seattleu.edu/~qpham2/dbtest/db.php" method = "post">
			<input type = "radio" value = "<?php echo $customer_order_join; ?>" name = "option"/>
			Display join result of customer and orders<br>
			<input type = "radio" value = "<?php echo $orders_commission_join; ?>" name = "option"/>
			Display join result of orders and commission<br>
			<input type = "radio" value = "<?php echo $artist_commission_join; ?>" name = "option"/>
			Display join result of artist and commission<br>
			<input type = "radio" value = "<?php echo $customer_artist_commission_join; ?>" name = "option"/>
			Display join result of customer, artist and commission<br>
			<input type = "submit"  value = "Submit request" />
		</form>
    </body>
</html>
