<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_rental']))
{
    $rental_id = mysqli_real_escape_string($con, $_POST['delete_rental']);

    $query = "DELETE FROM rental WHERE id='$rental_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "rental Deleted Successfully";
        header("Location: index6.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "rental Not Deleted";
        header("Location: index6.php");
        exit(0);
    }
}

if(isset($_POST['update_rental']))
{
    $rental_id = mysqli_real_escape_string($con, $_POST['rental_id']);

    $name = mysqli_real_escape_string($con, $_POST['nama']);
    $lama = mysqli_real_escape_string($con, $_POST['lama']);
    $tanggal = mysqli_real_escape_string($con, $_POST['tanggal']);

    $query = "UPDATE rental SET name='$nama', lama='$lama', tanggal='$tanggal' WHERE id='$rental_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "rental Updated Successfully";
        header("Location: index7.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "rental Not Updated";
        header("Location: index7.php");
        exit(0);
    }

}


if(isset($_POST['save_rental']))
{
    $nama = mysqli_real_escape_string($con, $_POST['nama']);
    $lama = mysqli_real_escape_string($con, $_POST['lama']);
    $tanggal= mysqli_real_escape_string($con, $_POST['tanggal']);
    date_default_timezone_set("Asia/Makassar");
    $waktu = date("Y-m-d H:i:s");
    $ekstensi_diperbolehkan	= array('PNG','JPG','JPEG','png','jpg','jpeg');
     // $tanggal = $_POST['tanggal];
   
    $gambar = $_FILES['gambar']['name'];
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    
    $ukuran	= $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];	
    $query = "INSERT INTO rental (nama,lama,tanggal,gambar,waktu) VALUES ('$nama','$lama','$tanggal','$gambar','$waktu')";
    
   
    if(in_array($ekstensi, $ekstensi_diperbolehkan) ===  true){
        if($ukuran < 1044070){			
            move_uploaded_file($file_tmp, 'img/'.$nama_gambar_baru);
            $query = "INSERT INTO rental (nama,lama,tanggal,gambar,waktu) VALUES ('$nama','$lama','$tanggal','$nama_gambar_baru','$waktu')";

            $query_run = mysqli_query($con, $query);
                if($query_run)
                {
                    $_SESSION['message'] = "rental Created Successfully";
                    header("Location: create.php");
                    exit(0);
                }
                else
                {
                    $_SESSION['message'  ] = "rental Not Created";
                    header("Location: create.php");
                    exit(0);
                }
                }else{
            $_SESSION['message'] = 'UKURAN FILE TERLALU BESAR';
            header("Location: create.php");
            exit(0);
            }
        }else{
            $_SESSION['message'] = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN ';
            header("Location: create.php");
            exit(0);
        }
}

    
?>