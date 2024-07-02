<?php 
$con = new mysqli("localhost", "root", "", "info");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>
    alert('No ID provided');
    window.location.href = 'sp.php';
    </script>";
    exit();
}

if (isset($_POST['reset_password'])) {
    $new_password = $_POST['new_password'];
    $sql1 = "UPDATE csv SET Password = '$new_password' WHERE StudentID = '$id'";

    if (mysqli_query($con, $sql1)) {
        echo "<script>
        alert('Password updated successfully');
        window.location.href = 'sp.php';
        </script>";
    } else {
        echo "<script>
        alert('Error updating password');
        window.location.href = 'reset_password.php?id=" . $id . "';
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
    <form method="post" action="reset_password.php?id=<?php echo htmlspecialchars($id); ?>">
        <fieldset>
            <legend>Reset Password</legend>
            Enter Your New Password: <input type="password" name="new_password" required>
            <input type="submit" name="reset_password" value="Update Password">
        </fieldset>
    </form></font>
</body>
</html>
