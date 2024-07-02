<?php 
$con = new mysqli("localhost", "root", "", "inf");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['sub'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE id = '$id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) < 1) {
        echo "<script>
        alert('Incorrect ID');
        window.location.href = 'admin.php';
        </script>";
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['Password']) {
            header("Location: second.php?id=" . $id);
            exit();
        } else {
            echo "<script>
            alert('Incorrect Password');
            window.location.href = 'admin.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <script>
        function auth(input) {
            var a = input.value.trim();
            if (isNaN(a)) {
                alert("Enter Number");
                input.value = ''; // Clear the input
                return false;
            }
        }
    </script>
    <style>
        div {
            margin-left: 550px;
            margin-top: 150px;
            width: 400px;
            height: 200px;
            padding: 20px;
            font-size: 30px;
            background-color: rgba(255, 255, 255, 0.5); 
            border-radius: 10px; 
        }
        body {
            background-image: url("a.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        font {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div>
        <form action="admin.php" method="post">
            <fieldset>
                <legend>Admin Login</legend>
                <font>
                    <table border="0">
                        <tr>
                            <td>ID:</td> 
                            <td><input type="text" name="id" id="id" oninput="auth(this)" required></td>
                        </tr>
                        <tr>
                            <td>Password:</td> 
                            <td><input type="password" name="password" required></td>
                        </tr>
                    </table>
                </font><br>
                <input type="button" value="Change Password" onclick="window.location.href='ap.php'">
                <input type="submit" name="sub" value="Login">
            </fieldset>
        </form>
    </div><br><br><br><br><br><br><br><br>
</body>
</html>
