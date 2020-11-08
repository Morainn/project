<?php 

if(isset($_POST['fill_btn'])){
	
	header('location:fill_in.php');

}else if(isset($_POST['results_btn'])){
	header('location:results.php');
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<link rel="stylesheet" type="text/css" href="own_styles.css">
<link rel="stylesheet" href="bootstrap.css">
<head>
<body>
<header>
<h1>Moekesti's Surveys</h1>
</header>
<section>
<div class="container text-center">
	<div class="row">
		<div class="col-sm-5 ch_position">	
			<h3>Survey</h3>
			<form method="post">
			<button type="submit" class="btn blue btn-block" id="fill_btn" name="fill_btn">Fill Out Survey</button>
			<button type="submit" class="btn blue btn-block" id="results_btn" name="results_btn">Survey Results</button>
			</form>
		</div>
	</div>
</div>
<br>
<br>
<br>
<footer id="foot">
Copyright © MoeketsiRaboroko.com
</footer>
</section>


<script src="bootstrap.js"></script>
<br>

</body>
</html>
