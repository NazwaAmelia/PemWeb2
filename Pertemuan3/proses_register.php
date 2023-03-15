<?php
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$prodi = $_POST['prodi'];
$gender = $_POST['gender'];
$skill = $_POST['skill'];
$domisili = $_POST['domisili'];
$email = $_POST['email'];

function skor_skill($skills)
{
    $skill_list = [
    'HTML' => 10,
    'CSS' => 10,
    'JavaScript' => 20,
    'RWD Bootstrap' => 20,
    'PHP' => 30,
    'Python' => 30,
    'Java' => 50,
    ];
    $result = 0;
    foreach ($skills as $skill) {
        $result = $result + $skill_list[$skill];
    }

    return $result;
}
$skor = skor_skill($skill);

function kategori_skill($kategori){
    $kategori_skill ="";
    if ($kategori == 0) {
        $kategori_skill = "Tidak Memadai";
    } else if ($kategori <= 40) {
        $kategori_skill = "Kurang";
    }else if ($kategori <= 60) {
        $kategori_skill = "cukup";
    }else if ($kategori <= 100) {
        $kategori_skill = "baik";
    }else if ($kategori <= 170) {
        $kategori_skill = "sangat bailk";
    }else {
        $kategori_skill = "Invalid";
    }

    return $kategori_skill;
}
$Kategori = kategori_skill($skor);


echo "NIM: $nim";
echo "<br> Nama: $nama";
echo "<br> Program Studi: $prodi";
echo "<br> Jenis Kelamin: $gender";
echo "<br> Skill Programming: ";
foreach ($skill as $skil){
    echo $skil . ", ";
}
echo "<br> Tempat Domisili: $domisili";
echo "<br> Email: $email";
echo "<br> Skor Skill: " . skor_skill($skill);
echo "<br> Kategori Skill:   $Kategori";
?>