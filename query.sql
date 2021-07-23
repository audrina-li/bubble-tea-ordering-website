INSERT INTO ApplicantForFranchising (Name, Phone, PersonalStatement) 
VALUES ('$a_name', $a_phone, '$a_personal_statement');

INSERT INTO customer(Name, Birthdate, PhoneNumber, Address) VALUES($Name, $Birthdate, $PhoneNumber, $Address);

DELETE FROM Orders 
WHERE PhoneNumber = $phone AND D_Name = '$d_name';

UPDATE customer
SET Name = $Name, Birthdate = $Birthdate, PhoneNumber = $PhoneNumber, Address = $Address
WHERE C_ID = $_SESSION[“customerid”];

SELECT D_Name, Type, Price 
FROM Drink 
WHERE Type = 'Milk Tea Series';

SELECT D_Name,Type,Price 
FROM Drink 
WHERE Type = 'Fruit Tea Series';

SELECT D_Name,Type,Price 
FROM Drink 
WHERE Type = 'Original Taste Tea Series';

SELECT * FROM customer where PhoneNumber = $PhoneNumber;

SELECT * FROM BubbleTeaShop;

SELECT * FROM Toppings;

SELECT DISTINCT Type FROM Drink;

SELECT o.Date, o.D_Name, o.Quantity, o.Quantity * d.Price AS Total 
FROM Orders o, Drink d 
WHERE o.D_Name = d.D_Name AND PhoneNumber = $phone 
ORDER BY o.Date;

SELECT D_Name, Sum(Quantity) AS Sum
FROM Orders 
GROUP BY D_Name 
ORDER BY Sum(Quantity) DESC 
LIMIT 3;

SELECT COUNT (DISTINCT PhoneNumber) AS NUM 
FROM Orders 
WHERE PhoneNumber IN 
(SELECT PhoneNumber 
FROM Orders 
WHERE Date = CURRENT_DATE() 
GROUP BY PhoneNumber 
HAVING COUNT(Order_ID) >= 1);

SELECT d.D_Name 
FROM Drink d 
WHERE NOT EXISTS 
((SELECT c.PhoneNumber 
FROM Customer c) 
EXCEPT 
(SELECT o.PhoneNumber 
From Orders o, Customer c 
WHERE d.D_Name = o.D_Name AND c.PhoneNumber = o.PhoneNumber));
