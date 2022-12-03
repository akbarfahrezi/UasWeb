<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Register</title>
    <link rel="stylesheet" href="css/play.css">
</head>
<body>
    <div class="container regis">

        <div class="judul">
            <h2>Registrasi</h2>
        </div>
        
        <div class="form">
            <form action="" method="post">

                <label for="username">Username</label><br>
                <input type="text" name="username" class="input" placeholder="Masukkan username"><br>

                <label for="password">Password</label><br>
                <input type="password" name="password" class="input" placeholder="Password"><br>

                <label for="konfirmasi">Konfirmasi Password</label><br>
                <input type="password" name="konfirm" class="input" placeholder="Konfirmasi password"><br>

                <input type="submit" name="regis" class="submit" value="Registrasi"><br><br>
            </form>

            <p>Sudah punya akun?
                <a href="login.php">Login</a>
            </p>
        
        </div>
    </div>
</body>
</html>

<?php
    require 'config.php';
    if(isset($_POST['regis'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $konfirmasi = $_POST['konfirm'];

        $user = $db->query("SELECT * FROM user WHERE username='$username'");
        $num_user = mysqli_num_rows($user);

        if($num_user > 0){
            echo"
                <script>
                    alert('username telah digunakan');
                </script>
            ";
        }else{
            if($password == $konfirmasi){
                $password = password_hash($password, PASSWORD_DEFAULT);

                echo"
                <script>
                    alert('password : $password');
                </script>
                ";
                $query = "INSERT INTO user (username,password)
                            VALUES ('$username','$password')";
                $result = $db->query($query);

                if($result){
                    echo"
                        <script>
                            alert('registrasi berhasil');
                            document.location.href = 'index.php';
                        </script>
                        ";
                }else{
                    echo"
                        <script>
                            alert('regis gagal');
                        </script>
                        ";
                }
            }else{
                echo"
                <script>
                    alert('Konfirmasi Password Salah');
                </script>
            ";
            }
        }
    }