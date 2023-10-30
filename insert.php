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
	<li><a class="active" href="./insert.php">Populate</a></li>
	<li><a href="./baseView.php">View</a></li>
	<li><a href="./manualIn.php">Insert</a></li>
	<li><a href="./delete.php">Delete</a></li>
</ul>
	
<div class="con"> 
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

function insert_table($conn){
	$stmt = oci_parse($conn, "insert into office(officeNum, locations) VALUES(1, 'Toronto')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into office(officeNum, locations) VALUES(2, 'Quebec')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into office(officeNum, locations) VALUES(3, 'Bahamas')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into office(officeNum, locations) VALUES(4, 'Brazil')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into department(DepartNum, DepartmentName, officeNum) VALUES(3, 'Sales', 1)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into department(DepartNum, DepartmentName, officeNum) VALUES(13, 'Management', 1)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into department(DepartNum, DepartmentName, officeNum) VALUES(12, 'Fraud', 4)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into department(DepartNum, DepartmentName, officeNum) VALUES(420, 'Entertainment', 2)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into employee(ENumber, EName, Birth, EPostalCode, DepartNum) VALUES(12, 'Wyatt Sferrazza', '052100', 'A1B2C3', 3)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into employee(ENumber, EName, Birth, EPostalCode, DepartNum) VALUES(7, 'Jay Wright', '052100', 'Z9X8Y7', 13)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into employee(ENumber, EName, Birth, EPostalCode, DepartNum) VALUES(8, 'Ttayw Azzarrefs', '052100', 'Z4X8Y7', 12)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into employee(ENumber, EName, Birth, EPostalCode, DepartNum) VALUES(6, 'Jay Wright', '052100', 'Z9X8Q7', 420)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into employee(ENumber, EName, Birth, EPostalCode, DepartNum) VALUES(0, 'Azmine Azzarrefs', '052100', 'A4X8Y7', 12)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into employee(ENumber, EName, Birth, EPostalCode, DepartNum) VALUES(5, 'Enimza Llama', '052100', 'Z9X8Y2', 420)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into address(postalCode, streetAddress, city, province) VALUES('A1B2C3', 'Street St', 'Ottawa', 'Ontario')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into address(postalCode, streetAddress, city, province) VALUES('M6R4S5', 'Location St', 'Ottawa', 'Ontario')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into address(postalCode, streetAddress, city, province) VALUES('M1Q4S5', 'Location Rd', 'Autowa', 'Manitoba')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into address(postalCode, streetAddress, city, province) VALUES('P4T4S5', 'Location Ct', 'Manuala', 'Texas')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into flight(FlightNum, Destination, NumSeats, DepartTime, ArrivalTime, FlightClass, Terminal, SeatPrice, Status) VALUES(113, 'New York', 190, '08:45', '12:30', 'Economy', 5, 59.99, 'Arriving')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into flight(FlightNum, Destination, NumSeats, DepartTime, ArrivalTime, FlightClass, Terminal, SeatPrice, Status) VALUES(117, 'Vancouver', 220, '06:00', '11:40', 'First', 2, 112.99, 'In Flight')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into flight(FlightNum, Destination, NumSeats, DepartTime, ArrivalTime, FlightClass, Terminal, SeatPrice, Status) VALUES(1, 'France', 190, '08:45', '12:30', 'Economy', 5, 259.99, 'Awaiting Departure')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into flight(FlightNum, Destination, NumSeats, DepartTime, ArrivalTime, FlightClass, Terminal, SeatPrice, Status) VALUES(420, 'Pacific Ocean', 1, '00:00', '00:30', 'Economy', 0, 19.99, 'Boarding')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into client(ClientNum, CPassportNum) VALUES(1, '11111111')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into client(ClientNum, CPassportNum) VALUES(2, '11111112')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into client(ClientNum, CPassportNum) VALUES(3, '11111123')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into client(ClientNum, CPassportNum) VALUES(4, '13111112')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into client(ClientNum, CPassportNum) VALUES(5, '11112111')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into client(ClientNum, CPassportNum) VALUES(6, '10100112')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into passport(ClientName, CPassportNum, CPostalCode) VALUES('Name Name', '11111111', 'T6Y7U8')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into passport(ClientName, CPassportNum, CPostalCode) VALUES('John Doe', '11111112', 'T6Y7U8')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into passport(ClientName, CPassportNum, CPostalCode) VALUES('Namaste Brother', '11111123', 'A1B2C3')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into passport(ClientName, CPassportNum, CPostalCode) VALUES('Marsupial Jim', '13111112', 'Q1B2E3')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into passport(ClientName, CPassportNum, CPostalCode) VALUES('Barloy Quincent', '11112111', 'L1K3M3')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into passport(ClientName, CPassportNum, CPostalCode) VALUES('Quincent Mallory', '10100112', 'M3L1K3')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into ticket(TicketNum, FlightNum, Destination, SeatNumber) VALUES(42, 113, 'New York', 162)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into ticket(TicketNum, FlightNum, Destination, SeatNumber) VALUES(119, 117, 'Vancouver', 41)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into ticket(TicketNum, FlightNum, Destination, SeatNumber) VALUES(1, 420, 'Pacific Ocean', 1)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into ticket(TicketNum, FlightNum, Destination, SeatNumber) VALUES(112, 117, 'Vancouver', 71)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into ticket(TicketNum, FlightNum, Destination, SeatNumber) VALUES(113, 117, 'Vancouver', 72)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into ticket(TicketNum, FlightNum, Destination, SeatNumber) VALUES(114, 117, 'Vancouver', 73)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into fullTime(ENumber, Salary, UnionName) VALUES(7, 18.00, 'RealUnion')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into fullTime(ENumber, Salary, UnionName) VALUES(12, 19.00, 'RealUnion')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into fullTime(ENumber, Salary, UnionName) VALUES(0, 59.00, 'Onion')");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into partTime(ENumber, Wage, HoursWorked) VALUES(5, 14.50, 82)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into partTime(ENumber, Wage, HoursWorked) VALUES(6, 4.50, 90)");
	oci_execute($stmt);
	$stmt = oci_parse($conn, "insert into partTime(ENumber, Wage, HoursWorked) VALUES(8, 2.50, 182)");
	oci_execute($stmt);
	echo "Inserted Data into all created Dummy Tables<br>\n";
}

insert_table($conn);
?>


</div>



</body>
</html>
