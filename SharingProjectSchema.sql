CREATE TABLE user(
	email VARCHAR(64) PRIMARY KEY,
	username VARCHAR(16) NOT NULL UNIQUE,  
	password VARCHAR(16) NOT NULL, 
	location VARCHAR(64) NOT NULL
); 
CREATE TABLE object(
	productID INT PRIMARY KEY, 
	category VARCHAR(64) (CHECK category='Electronics' OR category='Book' OR category='Clothing', category='Services') NOT NULL, 
	itemName VARCHAR(64) NOT NULL,
	price  FLOAT (CHECK price >=0) NOT NULL, 
	description VARCHAR(256), 
	availability BOOLEAN NOT NULL, 
	date DATE,
	owner VARCHAR(64) REFERENCES user(email)
); 
CREATE TABLE loan(
	loanID VARCHAR(256) PRIMARY KEY, 
	borrowDate DATE NOT NULL, 
	returnDate DATE NOT NULL, 
	owner VARCHAR(64) REFERENCES user(email), 
	borrower VARCHAR(64) REFERENCES user(email) CHECK(borrower <> owner), 
	productID VARCHAR(64) REFERENCES object(productID), 
	UPDATE ON CASCADE, 
	DELETE ON CASCADE
); 

CREATE TABLE auction(
	auctionID VARCHAR(256) PRIMARY KEY, 
	deadline DATE NOT NULL,
	winner VARCHAR(64) REFERENCES user(email), 
	owner VARCHAR(64) REFERENCES object(owner)
);

CREATE TABLE bid(
	price FLOAT NOT NULL, 
	user REFERENCES user(email), 
	auctionID VARCHAR(256) REFERENCES auction(auctionID),
	PRIMARY KEY(price, user, auctionID)
);

<<<<<<< HEAD
/*
//POSTGRESQL: working sql code 
CREATE TABLE "user" (
	email VARCHAR(64) PRIMARY KEY,
	username VARCHAR(16) NOT NULL UNIQUE,  
	password VARCHAR(16) NOT NULL, 
	location VARCHAR(64) NOT NULL
); 

CREATE TABLE object (
	productID INT PRIMARY KEY, 
  owner VARCHAR(64) REFERENCES "user" (email) UNIQUE , 
	category VARCHAR(64) NOT NULL, CHECK (category='Electronics' OR category='Book' OR category='Clothing' OR category='Services'), 
	itemName VARCHAR(64) NOT NULL,
	price  FLOAT NOT NULL, CHECK (price >=0), 
	description VARCHAR(256), 
	availability BOOLEAN NOT NULL, 
	date DATE
); 

CREATE TABLE loan (
	loanID VARCHAR(256) PRIMARY KEY, 
	borrowDate DATE NOT NULL, 
	returnDate DATE NOT NULL, 
	owner VARCHAR(64) REFERENCES "user" (email), 
	borrower VARCHAR(64) REFERENCES "user" (email) ON UPDATE CASCADE ON DELETE CASCADE,  CHECK(borrower <> owner), 
	productID INT REFERENCES object(productID) ON UPDATE CASCADE ON DELETE CASCADE 
); 

CREATE TABLE auction (
	auctionID VARCHAR(256) PRIMARY KEY, 
	deadline DATE NOT NULL,
	winner VARCHAR(64) REFERENCES "user" (email), 
	owner VARCHAR(64) REFERENCES object(owner)
);

CREATE TABLE bid (
	price FLOAT NOT NULL, 
	userID VARCHAR(64) REFERENCES "user" (email), 
	auctionID VARCHAR(256) REFERENCES auction(auctionID),
	PRIMARY KEY(price, userID, auctionID)
);
*/


=======
>>>>>>> 3501ef001ceac9024f6284d48dea4a3f8072b00d
