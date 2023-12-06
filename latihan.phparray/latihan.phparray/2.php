
<?php
$mahasiswa = ["Joni","123456"."Sistem informasi","dyangmail.com"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body>
        <h1>Daftar mahasiswa </h1>
        <ul>
            <?php foreach ($mahsiswa as $mhs):?>
                <l1><?=$mhs ; ?></l1>
                <?php endforeach ; ?>
        </ul>
    </body>
</html>