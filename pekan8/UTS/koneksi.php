<?php
    $con = mysqli_connect("localhost","root","","ecommerce_data");

    if(mysqli_connect_errno()){
        echo "Gagal Menghubungkan Ke Database : ". mysqli_connect_error();
        exit();
    }
?>