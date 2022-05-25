<?php

    include "../db/index.php";

    $email = $_POST["email"];
    $newpassword = $_POST["newpsw"];
    $cpassword = $_POST["cpsw"];

    if ($email && $newpassword && $cpassword) {

        if ($newpassword == $cpassword) {
            
            $database = new Database();

            $updatepass = $database->insertQuery("UPDATE Users SET Pswrd = '$newpassword' WHERE Email = '$email';");

            echo "Password updated";
            echo "<br>";
            echo "<a href='../../index.html'>Go to login page!</a>";

        }

        else {
            echo "Your passwords are not matching";
            echo "<br>";
            echo "<a href='../../resetpass.html'>Go back!</a>";
        }
       
    }
    else if ($email == "") {
        echo "Email field is empty!";
        echo "<br>";
        echo "<a href='../../resetpass.html'>Go back!</a>";
    }

    else if ($newpassword == "") {
        echo "Password field is empty!";
        echo "<br>";
        echo "<a href='../../resetpass.html'>Go back!</a>";
    }

    else if ($cpassword == "") {
        echo "You have to confirm your password!";
        echo "<br>";
        echo "<a href='../../resetpass.html'>Go back!</a>";
    }