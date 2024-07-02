<?php
// Connect to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bus";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        // Retrieve form data
        $location = $_POST['destination'];
        $time = $_POST['time'];
        $busno = $_POST['busno'];
        $parking = $_POST['parking'];

        // Insert data into database
        $sql = "INSERT INTO businfo (Destination, Time, busno, Parking) VALUES ('$location', '$time', '$busno', '$parking')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['delete'])) {
        // Retrieve form data for deletion
        $locationToDelete = $_POST['destinationToDelete'];

        // Delete data from database
        $sql = "DELETE FROM businfo WHERE Destination = '$locationToDelete'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['deleteAll'])) {
        // Delete all data from the database
        $sql = "DELETE FROM businfo";

        if ($conn->query($sql) === TRUE) {
            echo "All records deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close MySQL connection
$conn->close();
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Bus Information Form</title>
<style>
body {
  background-image: url("b.jpg");
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin: 0;
  padding: 0;
  background-color: #f5f6f9;
}
font
{
color:white;
}
</style>
</head>
<body>
<div><font>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend>Add Bus Information</legend>
            <table border="0">
                <tr>
                    <td>Select Bus Destinations</td>
                    <td>
                        <select name="destination">
                            <option value="ISBT">ISBT</option>
                            <option value="Rispina Pull">Rispina Pull</option>
                            <option value="IT Park">IT Park</option>
                            <option value="Kargi Chowk">Kargi Chowk</option>
                            <option value="Nehrugram">Nehrugram</option>
                            <option value="Dobhal Chowk">Dobhal Chowk</option>
                            <option value="Raipur">Raipur</option>
                            <option value="Do Naali">Do Naali</option>
                            <option value="Sahranpur Chowk">Sahranpur Chowk</option>
                            <option value="Doiwala">Doiwala</option>
                            <option value="Bhaniwala">Bhaniwala</option>
                            <option value="Rishikesh">Rishikesh</option>
                            <option value="Clock Tower">Clock Tower</option>
                            <option value="Garhikant">Garhikant</option>
                            <option value="Baluwala">Baluwala</option>
                            <option value="Balupur">Balupur</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Enter Departure Time</td>
                    <td><input type="time" name="time"></td>
                </tr>
                <tr>
                    <td>Enter Bus Number Available</td>
                    <td><input type="text" name="busno"></td>
                </tr>
                <tr>
                    <td>Enter Bus Location</td>
                    <td>
                        <select name="parking">
                            <option value="GEHU campus">GEHU campus</option>
                            <option value="GEU Gate No.2">GEU Gate No.2</option>
                            <option value="GEHU Bus Parking Area, opposite Boston School">GEHU Bus Parking Area, opposite Boston School</option>
                            <!-- Add more options -->
                        </select>
                    </td>
                </tr>
            </table>
        </fieldset>
        <input type="submit" name="submit" value="Submit">
    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend>Delete Bus Information</legend>
            <table border="0"> <font>
                <tr>
                   <td>Select Bus Destination to Delete</td>
                    <td>
                        <select name="destinationToDelete">
                            <option value="ISBT">ISBT</option>
                            <option value="Rispina Pull">Rispina Pull</option>
                            <option value="IT Park">IT Park</option>
                            <option value="Kargi Chowk">Kargi Chowk</option>
                            <option value="Nehrugram">Nehrugram</option>
                            <option value="Dobhal Chowk">Dobhal Chowk</option>
                            <option value="Raipur">Raipur</option>
                            <option value="Do Naali">Do Naali</option>
                            <option value="Sahranpur Chowk">Sahranpur Chowk</option>
                            <option value="Doiwala">Doiwala</option>
                            <option value="Bhaniwala">Bhaniwala</option>
                            <option value="Rishikesh">Rishikesh</option>
                            <option value="Clock Tower">Clock Tower</option>
                            <option value="Garhikant">Garhikant</option>
                            <option value="Baluwala">Baluwala</option>
                            <option value="Balupur">Balupur</option>
                        </select>
                    </td>
                </tr>
             </font></table>
        </fieldset>
        <input type="submit" name="delete" value="Delete">
    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend>Delete All Bus Information</legend>
            <input type="submit" name="deleteAll" value="Delete All">
        </fieldset>
    </form>
 </Zfont></div>
</body>
</html>
