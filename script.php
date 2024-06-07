<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "teste";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// Setting the start from, value
$start = 0;

// Setting the number of rows to display in a page
$rows_per_page = 4;

// Total number of rows (produtos)
$records = $conn->query("SELECT * FROM produtos");
$number_of_rows = $records->num_rows;
// Calculando numero de páginas
$pages = ceil($number_of_rows / $rows_per_page);

// If the user clicks on the pagination buttons we set a new starting point.
if(isset($_GET['page-number'])) {
	$page = $_GET['page-number'] - 1;
	$start = $page * $rows_per_page;
}

// Products per page
$result = $conn->query("SELECT * FROM produtos LIMIT $start, $rows_per_page");
?>