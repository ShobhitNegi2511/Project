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

if (isset($_POST['validate_cc'])) {
    $cc_name = $_POST['cc_name'];

    if ($cc_name == "Harendra Singh Negi") {
        header("Location: reset_password.php?id=" . $id);
        exit();
    } else {
        echo "<script>
        alert('Incorrect CC Name');
        window.location.href = 'validate_cc.php?id=" . $id . "';
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
font
{
color: white;
}
</style>
</head>
<body><font>
    <form method="post" action="validate_cc.php?id=<?php echo htmlspecialchars($id); ?>">
        <fieldset>
            <legend>Validate CC Name</legend>
            What is Your CC Name?: <input type="text" name="cc_name" required>
            <input type="submit" name="validate_cc" value="Submit">
        </fieldset>
    </form></font>
</body>
</html>
