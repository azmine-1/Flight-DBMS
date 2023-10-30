CREATE TABLE department (
    DepartNum INT NOT NULL,
    DepartmentName VARCHAR2(20),
    Locations VARCHAR2(30),
    PRIMARY KEY(DepartNum)
);

CREATE TABLE employee (
    ENumber INT NOT NULL,
    EName VARCHAR2 (25) NOT NULL,
    Birth VARCHAR2(6) NOT NULL,
    EStreetAddress VARCHAR2(40),
    EPostalCode VARCHAR2(6),
    ECity VARCHAR2 (25),
    EProvince VARCHAR2 (26),
    DepartNum INT NOT NULL,
    PRIMARY KEY (ENumber, EName),
    FOREIGN KEY (DepartNum) REFERENCES department(DepartNum)
);

CREATE TABLE flight (
    FlightNum INT NOT NULL,
    Destination VARCHAR2(30) NOT NULL,
    NumSeats INT NOT NULL,
    DepartTime VARCHAR2(5) NOT NULL,
    ArrivalTime VARCHAR2(5),
    FlightClass VARCHAR2(10),
    Terminal INT,
    SeatPrice FLOAT,
    Status VARCHAR(20),
    PRIMARY KEY(FlightNum)
);


CREATE TABLE clients(
    ClientNum INT NOT NULL,
    ClientName VARCHAR2(25) NOT NULL,
    CPassportNum VARCHAR2(8) NOT NULL,
    CStreetAddress VARCHAR2(40),
    CPostalCode VARCHAR2(6),
    CCity VARCHAR2 (25),
    CProvince VARCHAR2 (26),
    PRIMARY KEY(ClientNum, ClientName)
);

CREATE TABLE ticket(
    TicketNum INT NOT NULL,
    Price FLOAT NOT NULL,
    FlightNum INT NOT NULL,
    SeatNumber INT NOT NULL, 
    PRIMARY KEY(TicketNum),
    FOREIGN KEY(FlightNum) REFERENCES flight(FlightNum)
);

CREATE TABLE fullTime(
    ENumber INT,
    EName VARCHAR2(25),
    Salary FLOAT NOT NULL,
    UnionName VARCHAR2(20),
    PRIMARY KEY(ENumber, EName, Salary),
    FOREIGN KEY(ENumber, EName) REFERENCES employee(ENumber, EName)
);

CREATE TABLE partTime(
    ENumber INT,
    EName VARCHAR2(25),
    Wage FLOAT NOT NULL,
    HoursWorked FLOAT,
    PRIMARY KEY(ENumber, EName, Wage),
    FOREIGN KEY(ENumber, EName) REFERENCES employee(ENumber, EName)
);

INSERT INTO department(DepartNum, DepartmentName, Locations)
    VALUES(3, 'Sales', 'Toronto');
INSERT INTO department(DepartNum, DepartmentName, Locations)
    VALUES(13, 'Management', 'Toronto');
INSERT INTO employee(ENumber, EName, EStreetAddress, Birth, EPostalCode, ECity, EProvince, DepartNum) 
    VALUES(12,'Wyatt Sferrazza', 'Street St','052100', 'A1B2C3', 'Ottawa', 'Ontario', 3);
INSERT INTO employee(ENumber, EName, EStreetAddress, Birth, EPostalCode, ECity, EProvince, DepartNum) 
    VALUES(7,'Jay Wright', 'Crescent Ave.', '021199', 'Z9X8Y7', 'Vancouver', 'Quebec', 13);
INSERT INTO employee(ENumber, EName, EStreetAddress, Birth, EPostalCode, ECity, EProvince, DepartNum) 
    VALUES(14,'Jane Doe', 'Address St.', '071294', 'T6Y8B9', 'Montreal', 'Quebec', 13);
INSERT INTO employee(ENumber, EName, EStreetAddress, Birth, EPostalCode, ECity, EProvince, DepartNum) 
    VALUES(15,'John Doe', 'Address St.', '071294', 'T6Y8B9', 'Montreal', 'Quebec', 3);
INSERT INTO flight(FlightNum, Destination, NumSeats, DepartTime, ArrivalTime, FlightClass, Terminal, SeatPrice, Status)
    VALUES(113, 'New York', 190, '08:45', '12:30', 'Economy', 5, 59.99, 'Boarding');
INSERT INTO flight(FlightNum, Destination, NumSeats, DepartTime, ArrivalTime, FlightClass, Terminal, SeatPrice, Status)
    VALUES(117, 'Vancouver', 220, '06:00', '11:40', 'First', 2, 112.99, 'In Flight');  
INSERT INTO flight(FlightNum, Destination, NumSeats, DepartTime, ArrivalTime, FlightClass, Terminal, SeatPrice, Status)
    VALUES(245, 'Chicago', 140, '07:00', '3:20', 'First', 6, 134.99, 'Boarding');  
INSERT INTO flight(FlightNum, Destination, NumSeats, DepartTime, ArrivalTime, FlightClass, Terminal, SeatPrice, Status)
    VALUES(4, 'Ottawa', 200, '04:00', '6:00', 'Economy', 9, 62.99, 'Landed');
INSERT INTO clients(ClientNum, ClientName, CPassportNum, CStreetAddress, CPostalCode, CCity, CProvince) 
    VALUES(2087, 'Azmine Faik', '12ABCDEF','Location Blvd', 'T5F7H9', 'Vancouver', 'British Columbia');
INSERT INTO clients(ClientNum, ClientName, CPassportNum, CStreetAddress, CPostalCode, CCity, CProvince) 
    VALUES(657, 'John Smith','34FGHYTE', 'Street Name', 'P7T8Q2', 'Ottawa', 'Ontario');
INSERT INTO ticket(TicketNum, Price, FlightNum, SeatNumber)
    VALUES(13, 112.99, 117, 23);
INSERT INTO ticket(TicketNum, Price, FlightNum, SeatNumber)
    VALUES(42, 59.99, 113, 162);
INSERT INTO ticket(TicketNum, Price, FlightNum, SeatNumber)
    VALUES(119, 62.99, 4, 71);
INSERT INTO ticket(TicketNum, Price, FlightNum, SeatNumber)
    VALUES(123, 134.00, 245, 5);
INSERT INTO fullTime(ENumber, EName, Salary, UnionName)
    VALUES(7, 'Jay Wright', 18.00, 'RealUnion');
INSERT INTO fullTime(ENumber, EName, Salary, UnionName)
    VALUES(14, 'Jane Doe', 19.00, 'RealUnion');
INSERT INTO partTime(ENumber, EName, Wage, HoursWorked)
    VALUES(12, 'Wyatt Sferrazza', 14.50, 82);
INSERT INTO partTime(ENumber, EName, Wage, HoursWorked)
    VALUES(15, 'John Doe', 15.25, 65);

SELECT FlightNum, Destination
FROM flight
ORDER BY FlightNum ASC;

SELECT TicketNum, FlightNum
FROM ticket
WHERE FlightNum > 4
ORDER BY FlightNum ASC;

SELECT *
FROM fullTime
ORDER BY ENumber DESC;

SELECT EName, Wage
FROM partTime
ORDER BY Wage DESC;

SELECT Ename,ClientName,Ecity
FROM employee
INNER JOIN clients
ON employee.ECity = clients.CCity;

SELECT FlightNum,Ename,ClientName
FROM employee
INNER JOIN clients
ON employee.Ecity = clients.CCity
INNER JOIN flight 
ON CCity = flight.Destination
ORDER BY FlightNum DESC;

SELECT DepartNum, Locations
FROM department
ORDER BY DepartNum ASC;


DROP TABLE partTime;
DROP TABLE fullTime;
DROP TABLE ticket;
DROP TABLE clients;
DROP TABLE employee;
DROP TABLE department;
DROP TABLE flight;