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
	<li><a href="./baseView.php">View</a></li>
	<li><a href="./manualIn.php">Insert</a></li>
	<li><a class="active" href="./delete.php">Delete</a></li>
</ul>


<div class="con"> 
<form action="manDelete.php" method="post">
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
  <input type="submit" value="Submit" onSubmit=>
 </form>
	
</div>
	
<div class="con"> 
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
// Create connection to Oracle
$conn = oci_connect('wsferraz', 'VGY7bhu822',
'(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl)))');
if (!$conn) {
$m = oci_error();
echo $m['message'];
}
else{
echo "successfully connected with oracle database<br>\n";
}
$selected = $_POST['in'];
switch ($selected){
	case 'partTime':
	$stmt = oci_parse($conn, "drop table partTime");
	oci_execute($stmt);
	echo "Dropped table: partTime (if it exists)<br>\n";
	break;
	case 'fullTime':
	$stmt = oci_parse($conn, "drop table fullTime");
	oci_execute($stmt);
	echo "Dropped table: fullTime (if it exists)<br>\n";
	break;
	case 'ticket':
	$stmt = oci_parse($conn, "drop table ticket");
	oci_execute($stmt);
	echo "Dropped table: Ticket (if it exists)<br>\n";
	break;
	case 'client':
	$stmt = oci_parse($conn, "drop table client");
	oci_execute($stmt);
	echo "Dropped table: Clients (if it exists)<br>\n";
	break;
	case 'employee':
	$stmt = oci_parse($conn, "drop table employee");
	oci_execute($stmt);
	echo "Dropped table: Employee (if it exists)<br>\n";
	break;
	case 'department':
	$stmt = oci_parse($conn, "drop table department");
	oci_execute($stmt);
	echo "Dropped table: Department (if it exists)<br>\n";
	break;
	case 'flight':
	$stmt = oci_parse($conn, "drop table flight");
	oci_execute($stmt);
	echo "Dropped table: Flight<br>\n";
	break;
	case 'passport':
	$stmt = oci_parse($conn, "drop table passport");
	oci_execute($stmt);
	echo "Dropped table: Passport (if it exists)<br>\n";
	break;
	case 'address':
	$stmt = oci_parse($conn, "drop table address");
	oci_execute($stmt);
	echo "Dropped table: Address (if it exists)<br>\n";
	break;
	case 'office':
	$stmt = oci_parse($conn, "drop table office");
	oci_execute($stmt);
	echo "Dropped table: Office (if it exists)<br>\n";
	break;
}

?>


</div>



</body>
</html>
