<?php 
$con = new mysqli("localhost", "root", "", "info");

if (isset($_POST['sub'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM csv WHERE StudentID = '$id'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) < 1) {
        echo "<script>
        alert('Incorrect ID');
        window.location.href = 'sp.php';
        </script>";
    } else {
        header("Location: validate_cc.php?id=" . $id);
        exit();
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Password Recovery</title>
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
    <form method="post" action="sp.php">
        <fieldset>
            <legend>Password Recovery</legend>
            Enter Your ID: <input type="number" name="id">
            <input type="submit" name="sub" value="Submit">
        </fieldset>
    </form></font>
</body>
</html>
