<?php
$conn = new mysqli("localhost", "root", "", "pendaftaran_lomba");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pendaftar WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $email = $row['email'];
        $nomor = $row['nomor'];
        $usia = $row['usia'];
        $jenis_kelamin = $row['jenis_kelamin'];
        $cabang_olahraga= $row['cabang_olahraga'];
        $alamat = $row['alamat'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor = $_POST['nomor'];
    $usia = $_POST['usia'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $cabang_olahraga = $_POST['cabang_olahraga'];
    $alamat = $_POST['alamat'];
    

    $sql = "UPDATE pendaftar SET nama='$nama', email='$email', nomor='$nomor', usia='$usia', jenis_kelamin='$jenis_kelamin', cabang_olahraga='$cabang_olahraga', alamat='$alamat' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengguna</title>
    <style>
        /* Mengatur gaya umum untuk body */
        body {
            font-family: Arial, sans-serif;
            background-color: #D2B48C;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Mengatur gaya container form */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        /* Mengatur label input dan spasi antar elemen */
        form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Mengatur gaya tombol submit */
        form button {
            width: 100%;
            padding: 10px;
            background-color: #A0522D;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Mengatur gaya tombol submit saat di-hover */
        form button:hover {
            background-color: #8B4513;
        }

        /* Mengatur gaya teks label */
        form label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>" required><br>
    Email: <input type="email" name="email" value="<?php echo $email; ?>" required><br>
    Nomor: <input type="text" name="nomor" value="<?php echo $nomor; ?>" required><br>
    Usia: <input type="text" name="usia" value="<?php echo $usia; ?>" required><br>
    jenis_kelamin: <input type="text" name="jenis_kelamin" value="<?php echo $jenis_kelamin; ?>" required><br>
    cabang_olahraga: <input type="text" name="cabang_olahraga" value="<?php echo $cabang_olahraga; ?>" required><br>
    Alamat: <input type="text" name="alamat" value="<?php echo $alamat; ?>" required><br>
    <button type="submit">Update</button>
</form>

</body>
</html>