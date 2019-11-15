<?php
try {
	$dsn = "mysql:host=localhost;dbname=Visitas";
	$conn = new PDO($dsn, 'root', 'root');
	$conn->setAttribute(PDO::ATTR_ERRMODE,
	PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
	echo $e->getMessage();
}