<!-- db.php A PHP script to access my database through MySQL -->
<html>
    <head>
        <title> Access Market database </title>
    </head>

    <body>

        <form action = "" method = "post">
        </form>
        <form action = "http://css1.seattleu.edu/~qpham2/dbtest/web.html" method = "post">
            <input type = "submit"  value = "Done, back to main menu" />
        </form>

        <?php

            // Connect to MySQL
            $servername = "cssql.servername.edu";
            $username = "userabc";
            $password = "123456";

            print $servername;

            $conn = mysql_connect($servername, $username, $password);

            if (!$conn) {
                 print "Error - Could not connect to MySQL";
                 exit;
            }

            // select the database
            $db = mysql_select_db("bw_db20", $conn);
            if (!$db) {
                print "Error - Could not select the database";
                exit;
            }

            // retrieves the query option
            $selection = $_POST['option'];

            // handle aggregation option
            if(is_numeric($selection)){
                $aggregate_commission = "SELECT *, count(*), avg(price)
                                         FROM commission
                                         where price < $selection
                                         GROUP BY email
                                         having count(*) > 1
                                         LIMIT 20;";
                $query = $aggregate_commission;
            }


            // handle modify options
            else if($selection == "insert"){
                $cid = $_POST["cid"];
                $phoneNum = $_POST["phoneNum"];
                $shippingInfo = $_POST["shippingInfo"];
                $email = $_POST["email"];
                $cname = $_POST["cname"];
                $insert = "insert into customer values('$cid', '$phoneNum', '$shippingInfo', '$email', '$cname');";
                $query = $insert;
                mysql_query($query);
                $query = "select * from customer";
            }

            else if($selection == "update"){
                $cid = $_POST["cid"];
                $phoneNum = $_POST["phoneNum"];
                $shippingInfo = $_POST["shippingInfo"];
                $email = $_POST["email"];
                $cname = $_POST["cname"];
                $update = "update customer
                           set phoneNum = '$phoneNum',
                               shippingInfo = '$shippingInfo',
                               email = '$email',
                               cname = '$cname'
                           where cid = '$cid';";
                $query = $update;
                mysql_query($query);
                $query = "select * from customer where cid = '$cid'";
            }

            else if($selection == "delete"){
                $cid = $_POST["cid"];
                $delete = "delete from customer where cid = '$cid';";
                $query = $delete;
                mysql_query($query);
                $query = "select * from customer";
            }

            else{
                $query = "$selection";
            }



            // Clean up the given query (delete leading and trailing whitespace)
            trim($query);

            // remove the extra slashes
            $query = stripslashes($query);


            // handle HTML special characters
            $query_html = htmlspecialchars($query);
            print "<p> <b> The query is: </b> " . $query_html . "</p>";

            // Execute the query
            $result = mysql_query($query);
            if (!$result) {
                print "Error - the query could not be executed";
                $error = mysql_error();
                print "<p>" . $error . "</p>";
                exit;
            }

            // Get the number of rows in the result
            $num_rows = mysql_num_rows($result);
            print "Number of rows = $num_rows <br />";

            // Get the number of fields in the rows
            $num_fields = mysql_num_fields($result);
            print "Number of fields = $num_fields <br />";

            // Get the first row
            $row = mysql_fetch_array($result);


            // Display the results in a table
            print "<table border='border'><caption> <h2> Query Results </h2> </caption>";
            print "<tr align = 'center'>";

            // Produce the column labels
            $keys = array_keys($row);


            for ($index = 0; $index < $num_fields; $index++)
                print "<th>" . $keys[2 * $index + 1] . "</th>";
            print "</tr>";

            // Output the values of the fields in the rows
            for ($row_num = 0; $row_num < $num_rows; $row_num++) {
                print "<tr align = 'center'>";
                $values = array_values($row);

                for ($index = 0; $index < $num_fields; $index++){
                    $value = htmlspecialchars($values[2 * $index + 1]);
                    print "<td>" . $value . "</td> ";
                }
                print "</tr>";
                $row = mysql_fetch_array($result);
            }
            print "</table>";
            mysql_close($conn);
        ?>

    </body>
</html>
