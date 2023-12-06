<?php
$mahasiwa =
[[
    "nama"=>"joni",
    "nim"=>"123456",
    "jurusan"=>"Sistem informasi",
    "email"=>"joni@gmail.com",
    "gambar"=>"gambar1.jpg"
],
[
"nama"=>"Budi",
"nim"=>"321654",
"jurusan"=>"Sistem informasi",
"email"=>"budi@gmail.com",
"gambar"=>"gambar2.jpg"
]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Document</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li>
                <img src="img/<?= $mhs["gambar"];?>">
            </li>
            <li>Nama : <?=$mhs["nama"];?></li?>
            <li>Nim  : <?=$mhs["nim"];?></li?>
            <li>Jurusan : <?=$mhs["jurusan"];?></li?>
            <li>Email : <?=$mhs["email"];?></li?>
        </ul>
        <?php endforeach;?>
    
</body>
</html>