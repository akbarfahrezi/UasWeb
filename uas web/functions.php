<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = "sql101.epizy.com";
    $DATABASE_USER = "epiz_33005978";
    $DATABASE_PASS = "VJ4vSxuqSPJ";
    $DATABASE_NAME = "epiz_33005978_crud";
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style9.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Admin</h1>
            <a href="index11.php"><i class="fas fa-home"></i>Home</a>
    		<a href="index7.php"><i></i>Kelola Pesanan</a>
			<a href="user.php"><i></i>Kelola Akun User</a>
            <a href="register-admin.php"><i></i>Tambah Admin</a>
			<a href="admin.php"><i></i>Kelola Akun Admin</a>
			<a href="logout.php"><i></i>Logout</a>
    	</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>