<?php
    $header = '<p style="color:red";>Urutan Nama Buah :</p>'; 
    $tims = ["Semangka","Durian","Mengkudu","Salak","Rambutan"];


    echo $header;
    foreach($tims as $fruits){  
        echo $fruits."<br>";
    }
?>