<?php
$animals = ['Kambing', 'Kucing', 'ayang', 'Kelinci'];

//akses array
foreach($animals as $animal) {
    echo $animal . '<br>';
}

// Array assosiatif
$student = [
    'name' => 'Nazwa Amelia',
    'Major'=> 'Sistem Informasi',
    'age'=> 19
];
echo $student['name'];