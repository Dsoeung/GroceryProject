<?php

require('server_config.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

$email = filter_input(INPUT_POST, 'email');
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$phonenumber = filter_input(INPUT_POST, 'phonenumber');
$streetaddress = filter_input(INPUT_POST, 'streetaddress');
$state = filter_input(INPUT_POST, 'state');
$zipcode = filter_input(INPUT_POST, 'zipcode');

if (!empty($username)) {
    if (!empty($password)) {
        if(!empty($email))
        {
            if (!empty($firstname)) {
                if (!empty($lastname)) {
                    if (!empty($phonenumber)) {
                        if (!empty($streetaddress)) {
                            if (!empty($state)) {
                                if (!empty($zipcode)) {
// Create connection
                                    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


                                    if (mysqli_connect_error()) {
                                        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
                                    } else {
                                        $sql = "INSERT INTO Users (username, password, email, firstname, lastname, phonenumber, streetaddress, state, zipcode)
values ('$username','$password', '$email','$firstname','$lastname','$phonenumber','$streetaddress','$state','$zipcode')";
                                        if ($conn->query($sql)) {

                                            header( "refresh:5;url=http://groceryproject.dx.am/index.html" );
                                            echo("Registration was successful!\n");
                                            echo ('Redirecting in 8 secs to sign page.');

                                        } else {
                                            echo "Error: " . $sql . "" . $conn->error;
                                        }
                                        $conn->close();
                                    }
                                } else {
                                    echo "Zip code should not be empty";
                                    die();
                                }
                            } else {
                                echo "State should not be empty";
                                die();
                            }
                        } else {
                            echo "Street address should not be empty";
                            die();
                        }
                    } else {
                        echo "Phone number should not be empty";
                        die();
                    }
                } else {
                    echo "Last name should not be empty";
                    die();
                }
            } else {
                echo "First name should not be empty";
                die();
            }
        }else
        {
            echo "Email should not be empty";
            die();
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