<?php
    
    $sql = "SELECT * FROM Users;";
    session_start();

    //$activeuser = $_SESSION['username'];

    include "../../db/index.php";

    $email = $_POST["email"];
    // $cemail = $_POST["cemail"];
    $password = $_POST["psw"];
    $cpassword = $_POST["cpsw"];
    $password = hash('sha3-512' , $password);
    $cpassword = hash('sha3-512' , $cpassword);
    $userinfo = array();

    if ($email && $password && $cpassword) {
        
        if ($password === $cpassword) {

            $database = new Database();

            // Check if email already exist in the database

            // $userexists = 0;
            $emailexists = 0;

            $checkuser = $database->selectQuery("SELECT * FROM Users;");

            // foreach($checkuser as $user) {
            //     if ($user['Username'] == $username) {
            //         $userexists++;
            //     }
            // }

            foreach($checkuser as $user) {
                if ($user['Email'] == $email) {
                    $emailexists++;
                    $userinfo = array(
                        'username' => $user['Username'],
                        'email' => $user['Email'],
                        'password' => $user['Pswrd']
                    );
                }
            }
            
            if ( $emailexists == 0) {// $userexists == 0 && $emailexists == 0) {
                // email doesn't exist
                echo "<div class='error-message'>";
                    echo "Please signup! <br> Email address isn't in use!";
                    echo "<br>";
                    echo "<a class='link-message' href='../../signup.html'>Go Back</a>";
                echo "</div>";
            }
            else if ($emailexists > 1){
                // email exists more than once
                echo "<div class='error-message'>";
                    echo "We are sorry something went wrong";
                    echo "<br>";
                    echo "<a class='link-message' href='../../signup.html'>Go Back</a>";
                echo "</div>";
            }
            else if ($emailexists == 1) {
                if ($userinfo['password'] === $password){
                    echo "<div class='error-message'>";
                    echo "The password cannot be the same as the last one.";
                    echo "<br>";
                    echo "<a class='link-message' href='../../index.html'>Go Back</a>";
                    echo "</div>";
                }
                else{
                    // Change password
                    $username = $userinfo['username'];
                    $_SESSION['username'] = $username;
                    $sql = "CALL Reset_Password('$username', '$password');";
                    $database->insertQuery($sql);
                    
                    include "../components/navbar.php";
                    echo "<div class='approved-message'>";
                        echo "<a class='link-message' href='../../calendar.php'>Go to Calendar</a>";
                    echo "</div>";
                }

            } 

        }

        else {

            echo "<div class='error-message'>";
                echo "Passwords entered are not matching!";
                echo "<br>";
                echo "<a class='link-message' href='../../resetpass.html'>Go Back</a>";
            echo "</div>";

        }

    }

    else {

        echo "<div class='error-message'>";
            echo "You have to fill up all the fields!";
            echo "<br>";
            echo "<a class='link-message' href='../../signup.html'>Go Back</a>";
        echo "</div>";

    }
?>