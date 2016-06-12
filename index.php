<?php
include('func.php');
?>
<!DOCTYPE html>
<html> 
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>I244 eksam - Rain Elken</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="function.js"></script>
	</head>
	<body>
	<div class="container">
		<h1>Enimmüüdud raamatud aastal 2012</h1>
		<h3>Need raamatud meeldivad niipaljudele kasutajatele:</h3>
			<ul>
			<?php 
			$sql = "SELECT * FROM rain_items ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($query)) {
			?>
			<li>
			<a href="javascript:void();" class="like" id="<?php echo htmlspecialchars($row['id']); ?>">Like <span><?php echo likes(htmlspecialchars($row['id'])); ?></span></a>
			<?php echo htmlspecialchars($row['item']); ?></li>
			<?php
			}
			?>
			</ul>
			<h3 id="vasak">Kui sulle endale ka meeldib, vajuta "Like" nupule</h3>
	</div>
	</body>
</html>