<?php 
$conn = mysqli_connect("localhost","root","","info");

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['login'])){
    $StudentID = $_POST['StudentID'];
    $password = $_POST['password'];
    
    // Prepare SQL query
    $sql = "SELECT * FROM csv WHERE StudentID = '$StudentID'";
    $result = mysqli_query($conn, $sql);
    
    // Check if query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch data from the result
    if ($row = mysqli_fetch_assoc($result)) {
        // Make sure to use the correct column name 'Password'
        $pass = $row['Password'];

        // Compare passwords
        if ($pass == $password) {
            header('Location: third.php');
            exit();
        } else {
            echo "<script>
                alert('Login Unsuccessful: Incorrect password.');
                </script>";
        }
    } else {
        echo "<script>
            alert('Login Unsuccessful: StudentID not found.');
            </script>";
    }
} 
?>
<html>
<head>
<title>Student Login</title>
<script>
function auth(input) {
    var a = input.value.trim();
    if (isNaN(a)) {
        alert("Enter Number");
        input.value = '';
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
</style>
</head>
<body>
<div>
<form action="" method="post">
<fieldset>
<legend>Student Login</legend>
<table border="0">
<tr></tr>
<tr>
<td>ID:</td> 
<td><input type="text" name="StudentID" id="id" oninput="auth(this)" required></td>
</tr>
<tr>
<td><br>Password:</td>
<td><br><input type="password" name="password" required><br></td>
</tr>
</table><br>
<input type="button" value="Change Password" onclick="window.location.href='sp.php'">&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="login" value="Login">
</fieldset>
</form>
</div>
</body>
</html>


