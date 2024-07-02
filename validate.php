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

if (isset($_POST['validate'])) {
    $cc_name = $_POST['cc_name'];

    if ($cc_name == "Harendra Singh Negi") {
        header("Location: reset_password1.php?id=" . $id);
        exit();
    } else {
        echo "<script>
        alert('Incorrect CC Name');
        window.location.href = 'validate.php?id=" . $id . "';
        </script>";
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>CC Name Validation</title>
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
legend
{
color : white;
}
font
{
color: white;
}
</style>
</head>
<body>
    <form method="post" action="validate.php?id=<?php echo htmlspecialchars($id); ?>">
        <fieldset>
            <legend>Validate CC Name</legend><font>
            What is Your CC Name?: <input type="text" name="cc_name" required></font>
            <input type="submit" name="validate" value="Submit">
        </fieldset>
    </form>
</body>
</html>
