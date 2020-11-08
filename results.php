<?php
require_once'connection.php';
?>
<?php

if(isset($_POST['ok_btn']))
{
	header('location:index.php'); 
}

$ages = 0;
$oldest = 0;
$youngest = 0;
$totalsurveys = 0;
$averageage = 0;

$eatoutavg = 0;
$eatavg = 0;
$moviesavg = 0;
$movieavg = 0;
$tvavg = 0;
$tavg = 0;
$radioavg = 0;
$radavg = 0;

$pizzapercentage = 0;
$pastapercentage = 0;
$pappercentage = 0;


$query = $con->query("SELECT * FROM details") or die(mysqli_error());
	while($fetch = $query->fetch_array()){
		
		
		
		$surveys = $fetch['id'];
		$name=$fetch['name'];
		$surname=$fetch['surname'];
		$contact=$fetch['contact'];
		$date=$fetch['date'];
		$age=$fetch['age'];
		$food=$fetch['food'];
		$eatout=$fetch['eatout'];
		$movies=$fetch['movies'];
		$tv=$fetch['tv'];
		$radio=$fetch['radio'];
	
		
		$totalsurveys = mysqli_num_rows($query);
		$result = mysqli_query($con,"SELECT SUM(age) AS value_sum FROM details");
		$row = mysqli_fetch_assoc($result);
	
		
		for( $x=0; $x <= $totalsurveys;$x++){
			$old = $age;
			$young = $age;
			
			$ages = $row['value_sum'];
			$averageage = $ages/$totalsurveys;
			
			$query = $con->query("SELECT max(age) AS max, min(age) AS min FROM details");
			$result = mysqli_fetch_array($query);
			
			$oldest = $result['max'];
			$youngest = $result['min'];
			
			if($old > $oldest){
				$oldest = $old;
			}
			
			if($young < $youngest){
				$youngest = $young;
			}
			
			$pizza = 0;
			$pasta = 0;
			$pap = 0;
			$chicken = 0;
			$beef = 0;
			$other = 0;
			
			if($food == "pizza"){
				$pizza++;
			}
			
			if($food == "pasta"){
				$pasta++;
			}
			
			if($food == "pap"){
				$pap++;
			}
			
			if($food == "chicken"){
				$chicken++;
			}
			
			if($food == "beef"){
				$beef++;
			}
			if($food == "other"){
				$other++;
			}
			
			$pizzapercentage = round($pizza / $totalsurveys * 100,1);
			$pastapercentage = round($pasta/ $totalsurveys * 100,1);
			$pappercentage = round($pap/ $totalsurveys * 100,1);
			
			
			if($eatout == "stronglyagree"||$eatout == "agree"||$eatout == "neutral"){
				$eatoutavg++;
				$sql = "SELECT eatout FROM details";
				if($result=mysqli_query($con,$sql)){
					$rowcount=mysqli_num_rows($result);
					$eatavg = $eatoutavg/$rowcount;
				}
			}else {
				$eatoutavg--;
			}
			
			if($movies == "stronglyagree"||$movies =="agree"||$movies =="neutral"){
				$moviesavg++;
				$sql = "SELECT movies FROM details";
				if($result=mysqli_query($con,$sql)){
					$rowcount=mysqli_num_rows($result);
					$movieavg = $moviesavg/$rowcount;
				}
			}else{
				$moviesavg--;
			}
			
			if($tv == "stronglyagree"||$tv == "agree"||$tv == "neutral"){
				$tvavg++;
				$sql = "SELECT tv FROM details";
				if($result=mysqli_query($con,$sql)){
					$rowcount=mysqli_num_rows($result);
					$tavg = $tvavg/$rowcount;
				}
			}else{
				$tvavg--;
			}
			
			if($radio== "stronglyagree"||$radio=="agree"||$radio=="neutral"){
				$radioavg++;
				$sql = "SELECT radio FROM details";
				if($result=mysqli_query($con,$sql)){
					$rowcount=mysqli_num_rows($result);
					$radavg = $radioavg/$rowcount;
				}
			}else{
				$radioavg--;
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
#header{
    background-color:grey;
    color:white;
    text-align:center;
    padding:5px;
}
</style>
</head>
<body>
<header>
<h1>Moekesti's Surveys</h1>
</header>
<section>
	<div class="container left">
		<div class="row">
			<div class="col-sm-5">	
				<h3>Survey Results</h3>
				<br>
				<form method="post">
					<ul style="">
						<li>Total number of surveys:    <?php echo $totalsurveys?></li><br>
						<li>Average age:                <?php echo $averageage?></li><br>
						<li>Oldest person who participated in the survey: <?php echo $oldest?></li><br>
						<li>Youngest person who participated in the survey: <?php echo $youngest?></li><br>
					
						<br>
					
						<li>Percentage of people who like Pizza: <?php echo $pizzapercentage?></li><br>
						<li>Percentage of people who like Pasta: <?php echo $pastapercentage?></li><br>
						<li>Percentage of people who like Pap and Wors: <?php echo $pappercentage?></li><br>
						
						<br>
						
						<li>People who like to eat out: <?php echo round($eatavg,1)?><br></li>
						<li>People who like to watch movies: <?php echo round($movieavg,1)?><br></li>
						<li>People who like to watch TV: <?php echo round($tavg,1)?><br></li>
						<li>People who like to listan to the radio: <?php echo round($radavg,1)?><br></li>
					</ul>
					<br>
					<button type="submit" class="btn grey btn-block" id="ok_btn" name="ok_btn">OK</button>
				</form>
			</div>
		</div>
	</div>
</section>	

<br>
<footer>
Copyright © MoeketsiRaboroko.com
</footer>
</body>
</html>