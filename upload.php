<?php
//terima file dari user
$fname = $_FILES['gambar']['name']; //nama filenya
$ftype = $_FILES['gambar']['type']; //tipe filenya
$fsize = $_FILES['gambar']['size']; //ukuran filenya
$ftemp = $_FILES['gambar']['tmp_name']; //direktori penyimpanan sementara file


$error = "";


if(empty($fname))
$error = "Nama file tidak boleh kosong. <br>";


if(!$ftype == "image/jpeg" OR !$ftype == "image/pjpeg" OR !$ftype == "image/x-png" OR !$ftype == "image/gif")
$error .= "File yang diupload harus berupa gambar dengan format JPEG/PJPEG/PNG/GIF.<br>";


@ $baca_dir = opendir('images/');
if(!$baca_dir)
{
mkdir('images/', 0777);
}


if(!copy($ftemp, "images/$fname"))
$error .= "Tidak bisa memindahkan file gambar ke direktori. <br>";


if($error == "")
echo "File berhasil diupload";
else
echo $error;
?>