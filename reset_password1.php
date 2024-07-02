<?php 
$con = new mysqli("localhost", "root", "", "inf");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>
    alert('No ID provided');
    window.location.href = 'ap.php';
    </script>";
    exit();
}

if (isset($_POST['reset_password'])) {
    $new_password = $_POST['new_password'];
    $sql1 = "UPDATE admin SET Password = '$new_password' WHERE id = '$id'";

    if (mysqli_query($con, $sql1)) {
        echo "<script>
        alert('Password updated successfully');
        window.location.href = 'ap.php';
        </script>";
    } else {
        echo "<script>
        alert('Error updating password');
        window.location.href = 'reset_password1.php?id=" . $id . "';
        </script>";
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Reset Password</title>
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
color: white;
}
</style>
</head>
<body><font>
    <form method="post" action="reset_password1.php?id=<?php echo htmlspecialchars($id); ?>">
        <fieldset>
            <legend>Reset Password</legend>
            Enter Your New Password: <input type="password" name="new_password" required>
            <input type="submit" name="reset_password" value="Update Password">
        </fieldset>
    </form></font>
</body>
</html>
