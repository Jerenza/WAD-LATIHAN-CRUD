<?php
include_once("config.php");

if (!isset($_GET['id'])) {
    die("<p style='color:red;'>Error: ID tidak ditemukan!</p>");
}

$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE id=$id");

$user_data = mysqli_fetch_array($result);
$nama = $user_data['nama'];
$email = $user_data['email'];
$nim = $user_data['nim'];

if (isset($_POST['update'])) {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $nim = trim($_POST['nim']);

    if (empty($nama) || empty($email) || empty($nim)) {
        echo "<p style='color:red;'>* Semua field harus diisi!</p>";
    }
    elseif (!ctype_digit($nim)) {
        echo "<p style='color:red;'>* NIM harus berupa angka!</p>";
    } 
    else {
        $result = mysqli_query($mysqli, "UPDATE mahasiswa SET nama='$nama', email='$email', nim='$nim' WHERE id=$id");

        header("Location: index.php");
        exit();
    }
}
?>

<html>
<head>  
    <title>Edit User Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form name="update_user" method="post" action="">
        <table border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"></td>
            </tr>
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="nim" value="<?php echo htmlspecialchars($nim); ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
