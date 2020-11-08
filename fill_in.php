<?php
require_once'connection.php';

	$name ="";
	$surname ="";
	$contact ="";
	$date ="";
	$age ="";
	$food ="";
	$eatout ="";
	$movies ="";
	$tv ="";
	$radio ="";

if(isset($_POST['submit_btn']))
{
	
	if(empty($_POST['firstnames'])||empty($_POST['surname'])||empty($_POST['contact'])||empty($_POST['date'])||empty($_POST['age'])||empty($_POST['food'])||empty($_POST['eatout'])||
	empty($_POST['movies'])||empty($_POST['tv'])||empty($_POST['radio1']))
	{
		echo 'Error, fill up all entries!!!';
	}else{
		
		$name =$_POST['firstnames'];
		$surname =$_POST['surname'];
		$contact =$_POST['contact'];
		$date =$_POST['date'];
		$age =$_POST['age'];
		$food =$_POST['food'];
		$favfood = implode(' ',$food);
		
		if(!isset($_POST['eatout'])||!isset($_POST['movies'])||!isset($_POST['tv'])||!isset($_POST['radio1'])){
			echo "All rating must be checked!!!";
		}else{
			$eatout =$_POST['eatout'];
			$movies =$_POST['movies'];
			$tv =$_POST['tv'];
			$radio =$_POST['radio1'];
		}
		
		
		
		$sql_insert = mysqli_query($con,"INSERT INTO details(name,surname,contact,date,age,food,eatout,movies,tv,radio)VALUES('$name','$surname','$contact','$date','$age','$favfood','$eatout','$movies','$tv','$radio')");
	
		if($sql_insert)
		{
			echo"Success!!!!!!!!!";
			header('location:index.php'); 
		}else{
			echo"Fail!!!!!!!!!";
			header('location:fill_in.php');
		}
	}
	
	

}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<link rel="stylesheet" type="text/css" href="own_styles.css">
<link rel="stylesheet" href="bootstrap.css">
<style>
</style>
<head>
<body>
<header>
<h1>Moekesti's Surveys</h1>
</header>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-5">	
				<h3>Take Our Survey</h3>
				</br>
				<h6>Personal Details</h6>
				<form method="post">
					<div class="form-group">
					<input type="text" class="form-control" id="surname" name="surname" aria-describeby="surname" placeholder="Surname">
					<span id="surname_error" class="ch_error"></span>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="firstnames" name="firstnames" aria-describeby="firstnames" placeholder="First Names">
						<span id="firstnames_error" class="ch_error"></span>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Number">	
						<span id="contact_error" class="ch_error"></span>
					</div>
					<div class="form-group">
						<input type="date" class="form-control" id="date" name="date" placeholder="Date">	
						<span id="date_error" class="ch_error"></span>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="age" name="age" aria-describeby="firstnames" placeholder="Age" min="5" max="120">
						<span id="age_error" class="ch_error"></span>
					</div>
					
					<br>
					<div>
					</div>
					
					<div class="form-group">
						<h6>What is your favourite food?(You can choose more than one answer)</h6>
						<p><input type="checkbox" name="food[]" value="pizza"> Pizza</p>
						<p><input type="checkbox" name="food[]" value="pasta"> Pasta</p>
						<p><input type="checkbox" name="food[]" value="pap"> Pap and wors</p>
						<p><input type="checkbox" name="food[]" value="chicken"> Chicken stir fry</p>
						<p><input type="checkbox" name="food[]" value="beef"> Beef stir fry</p>
						<p><input type="checkbox" name="food[]" value="other"> other</p>
						
					</div>
					<table id="t01">
					<caption >On a scale of 1 to 5 indicate whether you strongly agree to strongly disagree</caption>
					  <tr>
						<th ></th>
						<th nowrap>Strongly Agree(1)</th>		
						<th>Agree(1)</th>
						<th>Neutral(1)</th>		
						<th>Disagree(1)</th>
						<th nowrap>Strongly Disgree(1)</th>
					  </tr>
					  <tr>
						<td nowrap>I like to eat out</td>
						<td><input type="radio" name="eatout" value="stronglyagree"></td>
						<td><input type="radio" name="eatout" value="agree"></td>
						<td><input type="radio" name="eatout" value="neutral"></td>
						<td><input type="radio" name="eatout" value="disagree"></td>
						<td><input type="radio" name="eatout" value="stronglydisagree"> </td>
					  </tr>
					  <tr>
						<td nowrap>I like to watch movies</td>
						<td><input type="radio" name="movies" value="stronglyagree"></td>
						<td><input type="radio" name="movies" value="agree"></td>
						<td><input type="radio" name="movies" value="neutral"> </td>
						<td><input type="radio" name="movies" value="disagree"></td>
						<td><input type="radio" name="movies" value="stronglydisagree"> </td>
					  </tr>
					  <tr>
						<td nowrap>I like to watch TV</td>
						<td><input type="radio" name="tv" value="stronglyagree"></td>
						<td><input type="radio" name="tv" value="agree"></td>
						<td><input type="radio" name="tv" value="neutral"> </td>
						<td><input type="radio" name="tv" value="disagree"></td>
						<td><input type="radio" name="tv" value="stronglydisagree"> </td>
					  </tr>
					  <tr>
						<td nowrap>I like to listen to the radio</td>
						<td><input type="radio" name="radio1" value="stronglyagree"></td>
						<td><input type="radio" name="radio1" value="agree"></td>
						<td><input type="radio" name="radio1" value="neutral"> </td>
						<td><input type="radio" name="radio1" value="disagree"></td>
						<td><input type="radio" name="radio1" value="stronglydisagree"> </td>
					  </tr>
					</table>
					<br>
					<button type="submit" class="btn grey btn-block" id="submit_btn" name="submit_btn">OK</button>
				</form>	
			</div>
		</div>
	</div>
	<br>
	<footer>
	Copyright © MoeketsiRaboroko.com
	</footer>
</section>
<script src="bootstrap.js"></script>
</body>
</html>