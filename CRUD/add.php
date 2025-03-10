<html>
<head>
    <title>Add</title>
</head>

<body>
    <a href="index.php">Kembali</a>
    <br/><br/>

    <form action="add.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr> 
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <?php
    if(isset($_POST['Submit'])) {
        $nama = trim($_POST['nama']);
        $email = trim($_POST['email']);
        $nim = trim($_POST['nim']);

        if(empty($nama) || empty($email) || empty($nim)) {
            echo "<p style='color:red;'>* Semua field harus diisi!</p>";
        }
        elseif (!ctype_digit($nim)) {
            echo "<p style='color:red;'>* NIM harus berupa angka!</p>";
        }
        else {
            include_once("config.php");

            $result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nama,email,nim) VALUES('$nama','$email','$nim')");

            echo "<p style='color:green;'>Mahasiswa Berhasil Ditambahkan! <a href='index.php'>View</a></p>";
        }
    }
    ?>
</body>
</html>
