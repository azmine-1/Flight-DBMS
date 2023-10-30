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
	
<?php
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

function create_tables($conn){
	$stmt = oci_parse($conn, "create table office(officeNum INT NOT NULL, locations VARCHAR2(25), PRIMARY KEY(officeNum))");
	oci_execute($stmt);
	echo "Created Office Table<br>\n";
	$stmt = oci_parse($conn, "create table department(DepartNum INT NOT NULL, DepartmentName VARCHAR2(20), officeNum INT, PRIMARY KEY(DepartNum), FOREIGN KEY(officeNum) REFERENCES office(officeNum))");
	oci_execute($stmt);
	echo "Created Department Table<br>\n";
	$stmt = oci_parse($conn, "create table address(postalCode VARCHAR2(6), streetAddress VARCHAR2(40), city VARCHAR2(25), province VARCHAR2(25), PRIMARY KEY(postalCode))");
	oci_execute($stmt);
	echo "Created Address Table<br>\n";
	$stmt = oci_parse($conn, "create table employee(ENumber INT NOT NULL, EName VARCHAR2(25) NOT NULL, Birth VARCHAR2(6) NOT NULL, EPostalCode VARCHAR(6), DepartNum INT NOT NULL, PRIMARY KEY(ENumber), FOREIGN KEY (DepartNum) REFERENCES department(DepartNum))");
	oci_execute($stmt);
	echo "Created Employee Table<br>\n";
	$stmt = oci_parse($conn, "create table flight(flightNum INT NOT NULL, Destination VARCHAR2(30) NOT NULL, NumSeats INT NOT NULL, DepartTime VARCHAR2(5) NOT NULL, ArrivalTime VARCHAR2(5), FlightClass VARCHAR2(10), Terminal INT, SeatPrice FLOAT, Status VARCHAR2(20), PRIMARY KEY(FlightNum, Destination))");
	oci_execute($stmt);
	echo "Created Flight Table<br>\n";
	$stmt = oci_parse($conn, "create table client(ClientNum INT NOT NULL, CPassportNum VARCHAR2(8) NOT NULL, CPostalCode VARCHAR2(6), PRIMARY KEY(CPassportNum))");
	oci_execute($stmt);
	echo "Created Clients Table<br>\n";
	$stmt = oci_parse($conn, "create table passport(ClientName VARCHAR2(25) NOT NULL, CPassportNum VARCHAR2(8), CPostalCode VARCHAR2(6), PRIMARY KEY(CPassportNum))");
	oci_execute($stmt);
	echo "Created Passport Table<br>\n";
	$stmt = oci_parse($conn, "create table ticket (TicketNum INT NOT NULL, FlightNum INT NOT NULL, SeatNumber INT NOT NULL, Destination VARCHAR2(30) NOT NULL, PRIMARY KEY(TicketNum), FOREIGN KEY(FlightNum, Destination) REFERENCES flight(FlightNum, Destination))");
	oci_execute($stmt);
	echo "Created Ticket Table<br>\n";
	$stmt = oci_parse($conn, "create table fullTime(ENumber INT NOT NULL, Salary FLOAT NOT NULL, UnionName VARCHAR2(20), PRIMARY KEY(ENumber), FOREIGN KEY(Enumber) REFERENCES employee(ENumber))");
	oci_execute($stmt);
	echo "Created fullTime Table<br>\n";
	$stmt = oci_parse($conn, "create table partTime(ENumber INT NOT NULL, Wage FLOAT NOT NULL, HoursWorked FLOAT, PRIMARY KEY(ENumber), FOREIGN KEY(Enumber) REFERENCES employee(ENumber))");
	oci_execute($stmt);
	echo "Created partTime Table<br>\n";
}

$selected = $_POST['in'];
switch ($selected){
	case 'all':
	create_tables($conn);
	break;
	case 'office':
	$stmt = oci_parse($conn, "SELECT * FROM office");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
	} else {
		echo "Created Office Table<br>\n";
		$stmt = oci_parse($conn, "create table office(officeNum INT NOT NULL, locations VARCHAR2(25), PRIMARY KEY(officeNum))");
		oci_execute($stmt);
	}
	break;
	case 'department':
	$stmt = oci_parse($conn, "SELECT * FROM department");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
	} else {
		echo "Created Department Table<br>\n";
		$stmt = oci_parse($conn, "create table department(DepartNum INT NOT NULL, DepartmentName VARCHAR2(20), officeNum INT, PRIMARY KEY(DepartNum), FOREIGN KEY(officeNum) REFERENCES office(officeNum))");
		oci_execute($stmt);
	}
	break;
	case 'address':
	$stmt = oci_parse($conn, "SELECT * FROM address");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
	} else {
		echo "Created Address Table<br>\n";
		$stmt = oci_parse($conn, "create table address(postalCode VARCHAR2(6), streetAddress VARCHAR2(40), city VARCHAR2(25), province VARCHAR2(25), PRIMARY KEY(postalCode))");
		oci_execute($stmt);
	}
	break;
	case 'employee':
	$stmt = oci_parse($conn, "SELECT * FROM employee");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
	} else {
		echo "Created Employee Table<br>\n";
		$stmt = oci_parse($conn, "create table employee(ENumber INT NOT NULL, EName VARCHAR2(25) NOT NULL, Birth VARCHAR2(6) NOT NULL, EPostalCode VARCHAR(6), DepartNum INT NOT NULL, PRIMARY KEY(ENumber), FOREIGN KEY (DepartNum) REFERENCES department(DepartNum))");
		oci_execute($stmt);
	}
	break;
	case 'flight':
	$stmt = oci_parse($conn, "SELECT * FROM flight");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
		
	} else {
		echo "Created Flight Table<br>\n";
		$stmt = oci_parse($conn, "create table flight(flightNum INT NOT NULL, Destination VARCHAR2(30) NOT NULL, NumSeats INT NOT NULL, DepartTime VARCHAR2(5) NOT NULL, ArrivalTime VARCHAR2(5), FlightClass VARCHAR2(10), Terminal INT, SeatPrice FLOAT, Status VARCHAR2(20), PRIMARY KEY(FlightNum, Destination))");
		oci_execute($stmt);
	}
	break;
	case 'client':
	$stmt = oci_parse($conn, "SELECT * FROM client");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
	} else {
		echo "Created Client Table<br>\n";
		$stmt = oci_parse($conn, "create table client(ClientNum INT NOT NULL, CPassportNum VARCHAR2(8) NOT NULL, CPostalCode VARCHAR2(6), PRIMARY KEY(CPassportNum))");
		oci_execute($stmt);
	}
	break;
	case 'passport':
	$stmt = oci_parse($conn, "SELECT * FROM passport");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
	} else {
		echo "Created Passport Table<br>\n";
		$stmt = oci_parse($conn, "create table passport(ClientName VARCHAR2(25) NOT NULL, CPassportNum VARCHAR2(8), CPostalCode VARCHAR2(6), PRIMARY KEY(CPassportNum))");
		oci_execute($stmt);
	}
	break;
	case 'ticket':
	$stmt = oci_parse($conn, "SELECT * FROM ticket");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
	} else {
		echo "Created Ticket Table<br>\n";
		$stmt = oci_parse($conn, "create table ticket (TicketNum INT NOT NULL, FlightNum INT NOT NULL, SeatNumber INT NOT NULL, Destination VARCHAR2(30) NOT NULL, PRIMARY KEY(TicketNum), FOREIGN KEY(FlightNum, Destination) REFERENCES flight(FlightNum, Destination))");
		oci_execute($stmt);
	}
	break;
	case 'fullTime':
	$stmt = oci_parse($conn, "SELECT * FROM fullTime");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
	} else {
		echo "Created fullTime Table<br>\n";
		$stmt = oci_parse($conn, "create table fullTime(ENumber INT NOT NULL, Salary FLOAT NOT NULL, UnionName VARCHAR2(20), PRIMARY KEY(ENumber), FOREIGN KEY(Enumber) REFERENCES employee(ENumber))");
		oci_execute($stmt);
	}
	break;
	case 'partTime':
	$stmt = oci_parse($conn, "SELECT * FROM fullTime");
	$check = oci_execute($stmt);
	if ($check){
		echo "Table Already Exists<br>\n";
	} else {
		echo "Created fullTime Table<br>\n";
		$stmt = oci_parse($conn, "create table partTime(ENumber INT NOT NULL, Wage FLOAT NOT NULL, HoursWorked FLOAT, PRIMARY KEY(ENumber), FOREIGN KEY(Enumber) REFERENCES employee(ENumber))");
		oci_execute($stmt);
	}
	break;
}

?>
</div>



</body>
</html>
