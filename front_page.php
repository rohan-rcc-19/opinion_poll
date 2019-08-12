<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="front_page_css.css">

</head>
<body>

<div class="sidenav">
	<h2 id = "menu">Menu</h2>
  	<a href="graph_page.php">Result</a>
</div>

<div class="main" align="center">
  <h2>Welcome!</h2><h3> to Opinion Poll</h3>
</div>

<div id = "poll">
<form action="frontdb.php" method="post">

	<fieldset>
		<legend> Question: Should Act 370 be scraped or not?</legend>
		<label>
			<input type="radio" name="poll" id="opt" value="Yes" /> Yes<br>
		</label>
		<label>
			<input type="radio" name="poll" id="opt" value="No" /> No<br>
		</label>
		<label>
			<input type="radio" name="poll" id="opt" value="None" /> None<br>
		</label>
	</fieldset>
	
<button type="submit" id= "button" name="enter">Submit</button>
</form> 
</div>
</body>
</html> 
