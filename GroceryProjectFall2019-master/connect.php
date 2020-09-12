<?php

require('server_config.php');

$myusername = filter_input(INPUT_POST, 'username');
$mypassword = filter_input(INPUT_POST, 'password');


if (!empty($myusername)) {
    if (!empty($mypassword)) {
        // Create connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {

            $query = "SELECT * FROM Users WHERE username='$myusername' and password='$mypassword'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);


            $conn->close();

            if ($count == 1) {

                header('Location: http://groceryproject.dx.am/productPage.php');
                exit();


            } elseif($count == 0){

                header( "refresh:5;url=http://groceryproject.dx.am/index.html" );
                echo("Incorrect username or password, try again!\n");
                echo ('Redirecting in 5 secs to sign in page.');


            }
        }
    } else {
        echo "Password should not be empty";
        die();
    }

} else {
    echo "Username should not be empty";
    die();
}
?>