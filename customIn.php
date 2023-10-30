<!DOCTYPE html>
<html>
    <head>
        <title>Flight Database</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="fdb.css">
        
    </head>
    <style>
        table {border: 5px solid black; background-color: lightblue; color: black; border-radius: 10px; font-size: 12px; font-family: 'Times New Roman', serif; text-align: center; margin: 25px; padding: 5px;}
    </style>

<body style="background-color: lightgray">
    <h1 class="tClass">Flight Database</h1>
    
<ul>
    <li><a href="./create.php">Create</a></li>
    <li><a href="./insert.php">Populate</a></li>
    <li><a href="./baseView.php">View</a></li>
    <li><a class="active" href="./manualIn.php">Insert</a></li>
    <li><a href="./delete.php">Delete</a></li>
</ul>
    
<div class="con"> 
    <h2>Enter Insert Statement (Oracle SQL Syntax)</h2>
    <form action="manualIn.php" method="post">
        <input class="text" type="text" name="table" placeholder="Data (Seperated with Commas for Multiple Values" required/><br>
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
        <input type="submit" value="Submit"/>
    </form>
    </div>
    <div class="conOut">
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

$selected = $_POST['in'];
$q = $_POST['table'];
$stmt = oci_parse($conn, "INSERT INTO $selected VALUES($q)");
oci_execute($stmt);

$stmt = oci_parse($conn, "SELECT table_name, column_name, data_type, data_length FROM USER_TAB_COLUMNS");
$tab = oci_execute($stmt);
if($tab) {
	echo "<table border=\"1\" align=\"center\">";
	echo "<tr><th>Table</th><th>Variable Name</th><th>Variable Type</th><th>Max Length</th></tr>";
   while ($row = oci_fetch_array($stmt, OCI_RETURN_NULLS+OCI_ASSOC)) {
   print '<tr>';
   foreach ($row as $item) {
       print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
   }
   print '</tr>';
	} 
	echo "</table>";
} else {
	echo "No Results";
}

?>
</div>


</body>
</html>
