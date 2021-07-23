CREATE TABLE BubbleTeaShop (
	Location CHAR(75) PRIMARY KEY,
	PhoneNumber BIGINT
);

INSERT INTO BubbleTeaShop VALUES ('1527 Main Mall, Vancouver', 7780000000), 
('1369 W Broadway, Vancouver', 7780000000), 
('7328 Macdonald St, Vancouver', 7780000000), 
('3597 Canada Way, Burnaby', 7780000000), 
('6198 No. 3 Rd, Richmond', 7780000000);



CREATE TABLE ApplicantForFranchising (
    A_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    Name CHAR(50),
	Phone BIGINT,
    PersonalStatement TEXT
);

INSERT INTO ApplicantForFranchising (Name, Phone, PersonalStatement) VALUES ('Amy Smith', 6040000001, NULL), 
('John Lee', 6040000002, 'Quick learner; Active student leader; National Honors Society officer'), 
('Michael Brown', 6040000003, NULL), 
('Joanna Wilson', 6040000004, 'Known for building and maintaining productive client relationships. Great communication skills.'), 
('Kimberly Kwan', 6040000005, '2019-2020 Boba Tea Company. 2020-2021 Subway.');



CREATE TABLE Employee (
	E_ID INT AUTO_INCREMENT NOT NULL,
    Location CHAR(75),
	Name CHAR(50),
	JobTitle CHAR(25),
	Salary REAL,
    PRIMARY KEY(E_ID, Location),
	FOREIGN KEY (Location) REFERENCES BubbleTeaShop(Location) 
        ON DELETE CASCADE
);

INSERT INTO Employee(Location, Name, JobTitle, Salary) VALUES ('1527 Main Mall, Vancouver', 'Anna Choi', 'Brista', 15.85),
('1369 W Broadway, Vancouver', 'Summer Yu', 'Manager', 20.83),
('7328 Macdonald St, Vancouver', 'Janice Zhen', 'Cashier', 14.50),
('3597 Canada Way, Burnaby', 'Cathy Blake', 'Brista', 15.85),
('6198 No. 3 Rd, Richmond', 'Jack Smith', 'Brista', 15.85);



CREATE TABLE Drink (
	D_Name CHAR(50) PRIMARY KEY,
	Type CHAR(25),
	Price REAL
);

INSERT INTO Drink VALUES ('Ceylon Milk Tea', 'Milk Tea Series', 4.99),
('Earl Grey Tea', 'Original Taste Tea Series', 3.49),
('Jasmine Green Tea', 'Original Taste Tea Series', 3.49),
('Lemon Black Tea', 'Fruit Tea Series', 4.49),
('Lemon Yakult Tea', 'Fruit Tea Series', 4.49),
('Milk Tea', 'Milk Tea Series', 4.99),
('Old Fashioned Black Tea', 'Original Taste Tea Series', 3.49),
('Oolong Tea', 'Original Taste Tea Series', 3.79),
('Orange Jasmine Green Tea', 'Fruit Tea Series', 4.79),
('Ovaltine Milk Tea', 'Milk Tea Series', 5.49),
('Passion Fruit Green Tea', 'Fruit Tea Series', 4.79),
('Plum Lemon Tea', 'Fruit Tea Series', 4.49),
('Rose Milk Tea', 'Milk Tea Series', 5.49),
('Tie Kuan Yin Milk Tea', 'Milk Tea Series', 5.49),
('White Tea', 'Original Taste Tea Series', 3.79);



CREATE TABLE Make (
	Location CHAR(75),
	E_ID INT,
	D_Name CHAR(50),
	PRIMARY KEY (Location, E_ID, D_Name),
    FOREIGN KEY (Location, E_ID) REFERENCES Employee (Location, E_ID) 
		ON DELETE CASCADE,
	FOREIGN KEY (D_Name) REFERENCES Drink (D_Name)
        ON DELETE CASCADE
);

INSERT INTO Make VALUES ('1527 Main Mall, Vancouver', 1, 'Rose Milk Tea'),
('1527 Main Mall, Vancouver', 1, 'Plum Lemon Tea'),
('3597 Canada Way, Burnaby', 4, 'Ovaltine Milk Tea'),
('6198 No. 3 Rd, Richmond', 5, 'Earl Grey Tea'),
('6198 No. 3 Rd, Richmond', 5, 'Jasmine Green Tea');



CREATE TABLE UseRecipe(
	R_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    D_Name CHAR(50) UNIQUE NOT NULL,
    FOREIGN KEY (D_Name) REFERENCES Drink (D_Name)
        ON DELETE CASCADE
);

INSERT INTO UseRecipe(D_Name) VALUES ('Milk Tea'),
('Rose Milk Tea'),
('Ovaltine Milk Tea'),
('Tie Kuan Yin Milk Tea'),
('Ceylon Milk Tea');



CREATE TABLE Ingredient(
	I_Name CHAR(25) PRIMARY KEY
);

INSERT INTO Ingredient VALUES ('Milk'),('Black Tea'),('Rose Syrup'),('Ovaltine'),('Honey');



CREATE TABLE Contain (
    R_ID INT,
    I_Name CHAR(25),
    Quantity CHAR(25) NOT NULL,
    PRIMARY KEY (R_ID, I_Name),
    FOREIGN KEY (R_ID) REFERENCES UseRecipe (R_ID)
        ON DELETE CASCADE,
    FOREIGN KEY (I_Name) REFERENCES Ingredient (I_Name)
        ON DELETE CASCADE
);

INSERT INTO Contain VALUES (1, 'Milk', '350 g'),
(1, 'Black Tea', '350 g'),
(3, 'Milk', '400 g'),
(3, 'Ovaltine', '3 tbsp'),
(3, 'Black Tea', '300 g');



CREATE TABLE DeliveryMan (
	Location CHAR(75),
	DM_ID INT AUTO_INCREMENT NOT NULL,
	Name CHAR(50),
	PRIMARY KEY(Location, DM_ID),
	FOREIGN KEY (Location) REFERENCES BubbleTeaShop (Location)
		ON DELETE CASCADE
);

insert into DeliveryMan(Location, Name) VALUES ('1527 Main Mall, Vancouver',  'Jack Li'),
('1527 Main Mall, Vancouver',  'John Chen'),
('1527 Main Mall, Vancouver',  'Amy Brown'),
('1369 W Broadway, Vancouver',  'John Jones'),
('1369 W Broadway, Vancouver',  'Krystal Brown');



CREATE TABLE DeliveryStatus(
	DS_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	CurrentStatus CHAR(25),
	EstimateTime CHAR(10)
);

INSERT INTO DeliveryStatus(CurrentStatus, EstimateTime) VALUES ('Preparing', '20 min'),
('Preparing', '20 min'),
('Preparing', '20 min'),
('En Route', '13 min'),
('En Route', '13 min');



CREATE TABLE Updates (
    Location CHAR(75),
    DM_ID INT,
    DS_ID INT,
    PRIMARY KEY (Location, DM_ID, DS_ID),
    FOREIGN KEY (DM_ID) REFERENCES DeliveryMan(DM_ID) 
        ON DELETE CASCADE,
    FOREIGN KEY (DS_ID) REFERENCES DeliveryStatus(DS_ID) 
        ON DELETE CASCADE
);

INSERT INTO Updates VALUES ('1527 Main Mall, Vancouver', 1, 1),
('1527 Main Mall, Vancouver', 2, 2),
('1527 Main Mall, Vancouver', 3, 3),
('1369 W Broadway, Vancouver', 4, 4),
('1369 W Broadway, Vancouver', 5, 5);



CREATE TABLE Customer(
	C_ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	Name CHAR(50) NOT NULL,
	Birthdate DATE NOT NULL,
	PhoneNumber BIGINT UNIQUE NOT NULL,
	Address CHAR(100) NOT NULL
	Password CHAR(255) NOT NULL
);

INSERT INTO Customer(Name, Birthdate, PhoneNumber, Address, Password) VALUES ('Zhang',  STR_TO_DATE('2000,01,01', '%Y, %m, %d'),  7780000001, '122 Walter Hardwick Ave 305 Vancouver BC V5Y 0C9, Vancouver, British Columbia', '000000'),
('Lee',  STR_TO_DATE('2000,02,02', '%Y, %m, %d'),  7780000002, '3308 Ash St Vancouver BC V5Z 3E3, Vancouver, British Columbia', '000000'),
('Wong',  STR_TO_DATE('2000,03,03', '%Y, %m, %d'),  7780000003, '2485 Broadway W 414 Vancouver BC V6K 2E8, Vancouver, British Columbia', '000000');



CREATE TABLE Orders (
    Order_ID  BIGINT PRIMARY KEY,
    PhoneNumber BIGINT,
    D_Name CHAR(50) DEFAULT NULL,
    Quantity int(11) DEFAULT NULL,
    Date Date,
    FOREIGN KEY (PhoneNumber) REFERENCES Customer(PhoneNumber) 
        ON DELETE CASCADE,
    FOREIGN KEY (D_Name) REFERENCES Drink(D_Name) 
        ON DELETE CASCADE
) ;

INSERT INTO `Orders`(`Order_ID`, `PhoneNumber`, `D_Name`, `Quantity`, `Date`) VALUES (615193000, 7780000001, 'Milk Tea', 3,STR_TO_DATE('2000,02,03', '%Y, %m, %d')),
(615193001,7780000001,'Old Fashioned Black Tea',3, STR_TO_DATE('2000,02,02', '%Y, %m, %d')),
(615193002,7780000001, 'Oolong Tea',2, STR_TO_DATE('2000,02,04', '%Y, %m, %d')),
(615193003,7780000002,'Passion Fruit Green Tea', 1, STR_TO_DATE('2000,02,05', '%Y, %m, %d')),
(615193004,7780000003,'Rose Milk Tea', 5, STR_TO_DATE('2000,02,02', '%Y, %m, %d'));



CREATE TABLE Track (
	C_ID INT,
	DS_ID INT,
	PRIMARY KEY(C_ID, DS_ID),
	FOREIGN KEY(C_ID) REFERENCES Customer(C_ID) 
		ON DELETE CASCADE,
	FOREIGN KEY(DS_ID) REFERENCES DeliveryStatus(DS_ID)
		ON DELETE CASCADE
);

INSERT INTO Track VALUES (1, 1),(2, 2),(3, 3),(1, 4),(2, 5);



CREATE TABLE Toppings(
	T_Name CHAR(25) PRIMARY KEY,
    Price Double
);

INSERT INTO Toppings VALUES ('Coconut Jelly', 0.50),('Pearl', 0.75),('Grass Jelly', 0.50),('Pudding', 1.00),('Aloe', 0.75);