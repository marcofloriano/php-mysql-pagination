<?php 
include "script.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css.css">
	<title>Paginação Com PHP e MySQL</title>
</head>
<body>

	<h2 class="center">Paginação Com PHP e MySQL</h2>

	<div class="center">
		<div class="content">
			<?php while( $row = $result->fetch_assoc() ) { ?>
				<p>
					<?php echo $row["id"] . ' - ' . $row['titulo'] ?>
				</p>
			<?php } ?>
		</div>
		<div class="page-info">
			<?php
				if(!isset($_GET['page-number'])) {
					$page = 1;
				} else {
					$page = $_GET['page-number'];
				}
			?>
			Showing <?php echo $page ?> of <?php echo $pages ?> pages
		</div>
	 	<div class="pagination">
	 		<!-- Primeira Página -->
			<a href="?page-number=1">&laquo;</a>
			<!-- Página Anterior -->
			<?php if( isset($_GET['page-number']) && $_GET['page-number'] > 1 ) { ?>
				<a href="?page-number=<?php echo $_GET['page-number'] - 1 ?>">&lt;</a>
			<?php } else { ?>
				<a>&lt;</a>
			<?php } ?>
			<!-- Número da Página -->
			<?php for ($i=1; $i <= $pages ; $i++) { ?>
				<?php if(!isset($_GET['page-number'])) { $_GET['page-number'] = 1; } ?>
				<a href="?page-number=<?php echo $i ?>" <?php if( $_GET['page-number'] == $i ) { echo 'class=active'; } ?> ><?php echo $i ?></a>
			<?php } ?>
			<!-- Próxima Página -->
			<?php if(!isset($_GET['page-number'])) {  // Se for a primeira página ?>
				<a href="?page-number=2">&gt;</a>	
			<?php } else { ?>
				<?php if($_GET['page-number'] >= $pages ) { // Se gor a última página ?>
					<a>&gt;</a>
				<?php } else { ?>
					<a href="?page-number=<?php echo $_GET['page-number'] + 1 ?>">&gt;</a>	
				<?php } ?>
			<?php } ?>
			<!-- Última Página -->
			<a href="?page-number=<?php echo $pages ?>">&raquo;</a>
	  </div>
	</div>

</body>
</html>