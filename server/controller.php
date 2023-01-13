<!-- controller.php A PHP script to control user request -->
<html>
    <head>
        <title> Access Market database </title>
    </head>

    <body>
        <?php
            $selection = $_POST['option'];
            print "you choose option $selection";
            $action = "option$selection.php";
        ?>

        <p>Please, click submit to start the query request</p>

        <form action = "<?php echo $action; ?>" method = "post">
            <input type = "submit"  value = "Submit request" />
        </form>
    </body>
</html>
