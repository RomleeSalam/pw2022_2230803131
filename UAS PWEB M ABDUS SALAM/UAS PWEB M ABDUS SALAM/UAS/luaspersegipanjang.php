<NAMA   : M ABDUS SALAM>
<NIIM   : 2230803131>
<KELAS  : 2283D>
<?php
function hitungLuasPersegiPanjang($panjang, $lebar) {
    $luas = $panjang * $lebar;
    return $luas;
}

// Contoh penggunaan fungsi
$panjangA = 10;
$lebarA = 6.5;
$luasA = hitungLuasPersegiPanjang($panjangA, $lebarA);

echo "Luas persegi panjang dengan panjang $panjangA cm dan lebar $lebarA cm adalah $luasA cm<sup>2</sup>.";
?>
