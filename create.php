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
	<li><a class="active" href="./create.php">Create</a></li>
	<li><a href="./insert.php">Populate</a></li>
	<li><a href="./baseView.php">View</a></li>
	<li><a href="./manualIn.php">Insert</a></li>
	<li><a href="./delete.php">Delete</a></li>
</ul>

<div class="con"> 
<form action="manCreate.php" method="post">
<input type="radio" id="o1" name="in" value="office">
  <label for="o1">Office</label><br>
  <input type="radio" id="o2" name="in" value="department">
  <label for="o2">Department</label><br>  
  <input type="radio" id="o3" name="in" value="employee">
  <label for="o3">Employee</label><br>
  <input type="radio" id="o4" name="in" value="address">
  <label for="o4">Address</label><br>
  <input type="radio" id="o5" name="in" value="flight">
  <label for="o5">Flight</label><br>  
  <input type="radio" id="o6" name="in" value="client">
  <label for="o6">Client</label><br>
  <input type="radio" id="o7" name="in" value="passport">
  <label for="o7">Passport</label><br>
  <input type="radio" id="o8" name="in" value="ticket">
  <label for="o8">Ticket</label><br>  
  <input type="radio" id="o9" name="in" value="fullTime">
  <label for="o9">fullTime</label><br>
  <input type="radio" id="o0" name="in" value="partTime">
  <label for="o0">partTime</label><br>
  <input type="radio" id="o10" name="in" value="all">
  <label for="10">All</label><br>
  <input type="submit" value="Submit" onSubmit=>
 </form>
	
</div>



</body>
</html>
