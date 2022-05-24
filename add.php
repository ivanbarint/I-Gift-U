<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/style.css">

</head>
<body>

    <?php

        session_start();

        $active_user = $_SESSION['username'];

        if(isset($active_user)) {

            echo "<div class='welcome-message'>";
            echo "Hi, " . $active_user;
            echo "</div>";
            echo "<div class='logout-button'>";
            echo "<a href='api/endpoints/logout.php'>Logout</a>";
            echo "<div>";
            }         

            else {

            echo "<div class='error-message'>";
            echo "You are not logged in!";
            echo "<br>";
            echo "<a class='link-message' href='../../index.html'>Login</a>";
            echo "</div>";

            }

    ?>

    <h1>Add Something to the Calendar</h1>

    <button id="add-person">Add Person</button>

    <div id="person-modal">

        <button id="close-person">x</button>

        <p>Add Person</p>

        <form method="POST" action="api/endpoints/addperson.php">

            <div class='form-part'>
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname">
            </div>

            <div class='form-part'>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname">
            </div>

            <div class='form-part'>
                <label for="age">Age</label>
                <input type="number" id="age" name="age">
            </div>

            <div class='form-part'>
                <label for="gender">Gender</label>
                <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class='form-part'>
                <input type="submit" value="Add Person">
            </div>

        </form>

    </div>

    <button id="add-event">Add Event</button>

    <div id="event-modal">

        <button id="close-event">x</button>

        <p>Add Event</p>

        <form method="POST" action="api/endpoints/addevent.php">

            <div class='form-part'>
                <label for="person">Person</label>
                <input type="text" name="person" id="person">
            </div>

            <div class='form-part'>
                <label for="eventtype">Event Type</label>
                <select name="eventtype" id="eventtype">
                    <option value="birthday">Birthday</option>
                    <option value="wedding">Wedding</option>
                    <option value="anniversery">Anniversery</option>
                    <option value="engagement">Engagement</option>
                    <option value="baby">Baby</option>
                    <option value="private">Private</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class='form-part'>
                <label for="eventdate">Date</label>
                <input type="date" name="eventdate" id="eventdate">
            </div>

            <div class='form-part'>
                <input type="submit" value="Add Event">
            </div>

        </form>

    </div>

    <p><a href="calendar.php">Check Calendar!</a></p>

    <script src="assets/script/script.js"></script>
    
</body>
</html>