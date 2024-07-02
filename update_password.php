<?php 
$con = new mysqli("localhost", "root", "", "info");

if (isset($_POST['verify_cc_name'])) {
    $id = $_POST['id'];
    $cc_name = $_POST['cc_name'];

    if ($cc_name == "Harendra Singh Negi") {
        echo '
        <form method="post" action="update_password.php">
            <label for="new_password">Enter Your New Password</label>
            <input type="password" id="new_password" name="new_password" required>
            <input type="hidden" name="id" value="' . htmlspecialchars($id) . '">
            <input type="submit" name="update_password" value="Update Password">
        </form>';
    } else {
        echo "<script>
        alert('Incorrect');
        </script>";
    }
}

if (isset($_POST['update_password'])) {
    $id = $_POST['id'];
    $new_password = $_POST['new_password'];

    $sql1 = "UPDATE csv SET Password = '$new_password' WHERE StudentID = '$id'";
    if (mysqli_query($con, $sql1)) {
        echo "<script>
        alert('Password updated successfully');
        </script>";
    } else {
        echo "<script>
        alert('Error updating password');
        </script>";
    }
}
?>
