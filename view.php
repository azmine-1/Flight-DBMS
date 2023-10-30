<!DOCTYPE html>
<html>
	<head>
		<title>Flight Database</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" href="fdb.css">
		
	</head>
	<style>
		table {border: 5px solid black; background-color: lightblue; color: black; border-radius: 10px; font-size: 30px; font-family: 'Times New Roman', serif; text-align: center; margin: 25px; padding: 5px;}
	</style>

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
	<div class="conOut">
<?php
// Create connection to Oracle
$conn = oci_connect('wsferraz', 'VGY7bhu822',
'(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle.scs.ryerson.ca)(Port=1521))(CONNECT_DATA=(SID=orcl)))');
if (!$conn) {
$m = oci_error();
echo $m['message'];
}


$q = $_POST['table'];
$stmt = oci_parse($conn, $q);
$tab = oci_execute($stmt);
if($tab) {
	echo "<table border=\"1\" align=\"center\">";
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


