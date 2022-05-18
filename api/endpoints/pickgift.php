<?php

    session_start();

    include "../components/navbar.php";

    $date = $_SESSION['date'];

    $personname = $_SESSION['personname'];
    $eventtype = $_SESSION['eventtype'];

    include "../../db/index.php";

    $database = new Database();

    $checkeventid = $database->selectQuery("SELECT EventID FROM Events WHERE EventDate = '$date';");

    $eventid = $checkeventid[0]['EventID'];

    echo "You are picking a gift for " . $personname . "'s ". $eventtype . ".";

    echo "<form method='POST' action='giftlist.php'>";

    echo "<div class='form-part'>";
        echo "<label class='form-label' for='interest'>Interest</label>";
        echo "<br>";
        echo "<input class='form-input' type='text' name='interest' id='interest'>";
    echo "</div>";

    echo "<div class='form-part'>";
        echo "<input type='submit' value='Pick'>";
    echo "</div>";

    echo "<br>";

    echo "</form>";
?>