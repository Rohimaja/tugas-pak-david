<?php
include("config/koneksi.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['pasword'];

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "<script>alert('Please fill in all fields.');</script>";
        return;
    }

    // Cek apakah username ada di database
    $sql = "SELECT * FROM spp_petugas WHERE username = '$username' AND pasword = '$password'";
    $result = mysqli_query($koneksi, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username']=$row['username'];
        echo "<script>alert('Login successful!');</script>";
        header("Location: main.php");
    } else {
        // Jika username tidak ditemukan
        echo "<script>alert('Username not found. Please register first.');</script>";
    }
}
?>