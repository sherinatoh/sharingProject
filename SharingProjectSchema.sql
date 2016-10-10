//POSTGRESQL: working sql code 
CREATE TABLE "user" (
	email VARCHAR(64) PRIMARY KEY,
	username VARCHAR(16) NOT NULL UNIQUE,  
	password VARCHAR(16) NOT NULL, 
	location VARCHAR(64) NOT NULL
); 

CREATE TABLE object (
	productID INT PRIMARY KEY, 
        owner VARCHAR(64) REFERENCES "user" (email), 
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

insert into "user" values ('abc@gmail.com', 'abc', '123', 'CCK');
insert into "user" values ('Harken@gmail.com', 'har', '123', 'Yishun');
insert into "user" values ('chicken@gmail.com', 'chicken', '123', 'Woodlands');
insert into "user" values ('alphabet@gmail.com', 'alphabet', '123', 'Sembawang');
insert into "user" values ('random@gmail.com', 'random', '123', 'CCK');
insert into "user" values ('test@gmail.com', 'test', '123', 'Clementi');
insert into "user" values ('mchen@gmail.com', 'mchen', '123', 'Punggol');
insert into "user" values ('vesaliE@gmail.com', 'vesaliE', '123', 'CCK');
insert into "user" values ('yeli@gmail.com', 'yeli', '123', 'CCK');
insert into "user" values ('turtle@gmail.com', 'turtle', '123', 'Queensway');
insert into "user" values ('moon@gmail.com', 'moon', '123', 'Redhill');
insert into "user" values ('waow@gmail.com', 'waow', '123', 'CCK');
/*
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
  owner VARCHAR(64) REFERENCES "user" (email), 
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
