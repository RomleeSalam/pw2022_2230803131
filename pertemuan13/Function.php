<?php
//koneksi ke dbms
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;


    //ambil data dari tiap elemen dalam form
    $nrp    = htmlspecialchars($data["nrp"]);
    $nama    = htmlspecialchars($data["nama"]);
    $email    = htmlspecialchars($data["email"]);
    $jurusan    = htmlspecialchars($data["jurusan"]);

    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }


    //query insert data
    $query = "INSERT INTO mahasiswa
                VALUES
                ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar di upload
    if ($error === 4) {
        echo "<script>
        alert ('Upload dulu gambarnya Abangku');
        </script>";
        return false;
    }

    //cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert ('Yang Anda Upload Bukan Gambar Saudaraku');
        </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert ('Ukurannya Terlalu Besar, Aku Ra' Kuat');
        </script>";
        return false;
    }

    //lolos pengecekan gampar siap di upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;


    //ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nrp    = htmlspecialchars($data["nrp"]);
    $nama    = htmlspecialchars($data["nama"]);
    $email    = htmlspecialchars($data["email"]);
    $jurusan    = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }



    //query insert data
    $query = "UPDATE mahasiswa SET
                nrp = '$nrp',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'

                WHERE id = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa
    WHERE
    nama LIKE '%$keyword%' OR
    nrp LIKE '%$keyword%' OR
    email LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%'
    ";

    return query($query);
}