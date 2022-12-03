<?php
    session_start();
    require 'dbcon.php';
?>
<?php

require 'dbcon.php';

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $read_select_sql = "SELECT * FROM rental WHERE nama LIKE '%$keyword%'";
    $result = mysqli_query($con, $read_select_sql);
} else {
    $read_sql = "SELECT * FROM rental";
    $result = mysqli_query($con, $read_sql);
}

$rental = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rental[] = $row;
}
?>
<?php 
if(isset($_GET['search'])){
     $keyword = $_GET['keyword'];
     $result = mysqli_query($con, "SELECT * FROM rental WHERE nama LIKE '%$keyword%' ");
}else { 
     $result = mysqli_query($con, "SELECT * FROM rental");
   }
                                        
     $rental = [];
     while($row = mysqli_fetch_assoc($result)){
     $rental[] = $row;
      }
?>  
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Mobil CRUD</title>
    <link rel="stylesheet" href="index6.css">
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Rental
                        </a>
                            <a href="create.php" class="btn btn-primary float-end">Tambah Rental</a>
                            <a href="index1.php" class="btn btn-danger float-end">Kembali</a>
                            <a class="input-group"> 
                        </a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pemesan</th>
                                    <th>Lama sewa</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Waktu Diinput</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM rental";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $rental)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $rental['id']; ?></td>
                                                <td><?= $rental['nama']; ?></td>
                                                <td><?= $rental['lama']; ?></td>
                                                <td><?= $rental['tanggal']; ?></td>
                                                <td><?= $rental['waktu']; ?></td>
                                                <td>
                                                    <a href="mobil-view.php?id=<?= $rental['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>