<?php
$host = "localhost";
$dbname = "bus";
$name = "root";
$pass = "";
$con = new mysqli($host, $name, $pass, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['Submit'])) {
    $ID = $_POST['ID'];
    $sql = "SELECT * FROM businfo WHERE Destination = '$ID'"; 
    if ($result = mysqli_query($con, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border=1 class='b'>";
            echo "<tr>";
            echo "<th>Destination</th>";
            echo "<th>Time</th>";
            echo "<th>Bus Number</th>";
            echo "<th>Parking Area</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['Destination'] . "</td>";
                echo "<td>" . $row['Time'] . "</td>";
                echo "<td>" . $row['busno'] . "</td>";
                echo "<td>" . $row['Parking'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($con);
    }
}
mysqli_close($con);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Bus Info</title>
    <style>
        body {
            background-image: url("g.jpg");
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
        form {
            background-color: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
            padding: 20px;
            border-radius: 10px;
            color: white;
            font-size: 16px;
        }
        table.a, table.b {
            color: white;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5); /* Black with 50% opacity */
            padding: 20px;
            border-radius: 10px;
            font-size: 16px;
        }
        legend {
            color: white;
        }
        input[type="submit"] {
            margin-top: 10px;
            padding: 5px 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div>
        <form action="third.php" method="POST">
            <fieldset>
                <legend>Destination</legend>
                <table border="0" class="a">
                    <tr>
                        <td>Enter Location:</td>
                        <td><input type="text" name="ID" required></td>
                    </tr>
                </table>
                <input type="submit" name="Submit" value="Submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
