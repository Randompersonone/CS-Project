<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>bmi</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<style>
		
		#transbox {
		  margin: 30px;
		  background-color: #eee;
		  border-radius: 15px;
		  opacity: 1;
		  filter: alpha(opacity=60);
		}

		</style>	
		</head>
		<body>
			<div class="container">
				<h2 style="font-family: Josefin Sans;color: #39b54a;">BMI(Body Mass Index)</h2>
				<hr color="#39b54a" size="5">

				<p style="font-size:16px;">Use this BMI calculator tool to work out your body mass index and get an indication of whether your weight may be affecting your health. This metric and imperial BMI tool is intended for men and women of 18 years and over.</p><br><br><br><br>

				<h2 style="background: white;font-family: Josefin Sans;color: #39b54a;">BMI Calculator</h2>
				<hr color="#39b54a" size="5">

				<div class="col-xs-12 col-sm-6 col-md-12">
					

					<div class="col-xs-12 col-sm-12 col-md-6" id="transbox"><br><br>
					<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" align="center">
					<input style="border: solid;border-color: green;   width: 200px;height: 50px;" type="number" step="0.01"name="height" placeholder="Enter height in metres"><br><br>
					<input style="border: solid;border-color: green;width: 200px;height: 50px;" type="number" name="weight" placeholder="Enter weight in kg"><br><br>

					<select align="middle" style="border: solid;border-color: green;width: 200px;height: 50px">
						<option>Select Gender</option>
						<option>Male</option>
						<option>Female</option>
						<option>Others</option>
					</select>
					<br><br><br>
					<div style="text-align:center;font-size: 20px;">  
					    <button style="color:#ffffff;background-color: #39b54a">Calculate BMI</button>  
					</div><br><br>
					</form>
					</div>
					



					<div class="col-xs-12 col-sm-12 col-md-4">
						<p style="font-size:20px;">
							<br><br>
							<b style="color:#39b54a;">BMI Categories:</b><br>
							Underweight = 18.5 or lesser<br>
							Normal weight = 18.5–24.9<br> 
							Overweight = 25–29.9 <br>
							Obesity = BMI of 30 or greater<br>
							<br><br><br>
						</p>
					</div>
				</div>


					
					


				<?php
					if($_SERVER["REQUEST_METHOD"]=="POST"){
						$height=htmlspecialchars($_REQUEST["height"]);
						$weight=htmlspecialchars($_REQUEST["weight"]);
						if(empty($height)&&empty($weight))
						{
							echo "invalid input";
						}
						else
						{
							$bmi=$weight/$height/$height;
							echo "<center>Your BMI is $bmi <br>" ;

							if($bmi<=18.5)
							{
								echo "Underweight";
							}
							else if($bmi>18.5 && $bmi<=24.9)
							{
								echo "Normal weight";
							}
							else if($bmi>25 && $bmi<=29.9)
							{
								echo "Overweight";
							}
							else
							{
								echo "Obese";
							}
						}
					}
					?>
					<br><br>

</form>
</body>
</html>