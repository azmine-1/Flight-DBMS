<!DOCTYPE html>
<html>
	<head>
		<title>Flight Database</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="fdb.css">
	</head>

<body style="background-color: lightgray">
	<h1 class="tClass">Flight Database</h1>
	
<ul>
	<li><a href="./create.php">Create</a></li>
	<li><a href="./insert.php">Populate</a></li>
	<li><a class="active" href="./baseView.php">View</a></li>
	<li><a href="./manualIn.php">Insert</a></li>
	<li><a href="./delete.php">Delete</a></li>
</ul>
	
<div class="con"> 
	<h2>Enter Select Statement (Oracle SQL Syntax)</h2>
	<form action="view.php" method="post">
		<input class="text" type="text" name="table" placeholder="Ex: SELECT * FROM office" required/>
		<input type="submit" value="Submit"/>
	</form>
	</div>

</body>
</html>
