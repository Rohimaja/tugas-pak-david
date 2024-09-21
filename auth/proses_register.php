<?php
include("config/koneksi.php");

if (isset($_POST['register'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pasword'];
    $confirm_password = $_POST['confirm_pasword'];

    // Validate input data
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('Please fill in all fields.');</script>";
        return;
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
        return;
    }

    // Insert user data into the database
    $sql = "INSERT INTO spp_petugas (username, email, pasword) VALUES ('$name', '$email', '$password')";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        echo "<script>alert('Registration successful!');</script>";
        header("Location: login.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>