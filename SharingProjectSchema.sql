CREATE TABLE member (
	email VARCHAR(64) PRIMARY KEY,
	username VARCHAR(16) NOT NULL UNIQUE,
	password VARCHAR(16) NOT NULL,
	location VARCHAR(64) NOT NULL
);

CREATE TABLE object (
	productID INT PRIMARY KEY,
	category VARCHAR(64) NOT NULL, CHECK (category='Electronics' OR category='Book' OR category='Clothing' OR category='Services'),
	itemName VARCHAR(64) NOT NULL,
	description VARCHAR(256),
	price FLOAT NOT NULL, CHECK (price >=0),
	date DATE,
	availability BOOLEAN NOT NULL,
	owner VARCHAR(64) REFERENCES member(email) UNIQUE
);
/*remove unique constraints directly from object-constraints tab */

CREATE TABLE loan (
	loanID VARCHAR(256) PRIMARY KEY,
	borrowDate DATE NOT NULL,
	returnDate DATE NOT NULL,
	owner VARCHAR(64) REFERENCES member(email),
	borrower VARCHAR(64) REFERENCES member (email) ON UPDATE CASCADE ON DELETE CASCADE,  CHECK(borrower <> owner),
	productID INT REFERENCES object(productID) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE auction (
	auctionID VARCHAR(256) PRIMARY KEY,
	deadline DATE NOT NULL,
	winner VARCHAR(64) REFERENCES member(email),
	objectID  INT REFERENCES object(productID),
	owner VARCHAR(64) REFERENCES object(owner)
);

CREATE TABLE bid (
	price FLOAT NOT NULL,
	memberEmail VARCHAR(64) REFERENCES member(email),
	auctionID VARCHAR(256) REFERENCES auction(auctionID),
	PRIMARY KEY(price, memberEmail, auctionID)
);

insert into member values ('abc@gmail.com', 'abc', '123', 'CCK');
insert into member values ('Harken@gmail.com', 'har', '123', 'Yishun');
insert into member values ('chicken@gmail.com', 'chicken', '123', 'Woodlands');
insert into member values ('alphabet@gmail.com', 'alphabet', '123', 'Sembawang');
insert into member values ('random@gmail.com', 'random', '123', 'CCK');
insert into member values ('test@gmail.com', 'test', '123', 'Clementi');
insert into member values ('mchen@gmail.com', 'mchen', '123', 'Punggol');
insert into member values ('vesaliE@gmail.com', 'vesaliE', '123', 'CCK');
insert into member values ('yeli@gmail.com', 'yeli', '123', 'CCK');
insert into member values ('turtle@gmail.com', 'turtle', '123', 'Queensway');
insert into member values ('moon@gmail.com', 'moon', '123', 'Redhill');
insert into member values ('waow@gmail.com', 'waow', '123', 'CCK');

insert into object values ('012', 'Electronics', 'IPhone 6', 'Awesome phone!', '700', '2016-2-22', 'TRUE', 'abc@gmail.com');
insert into object values ('011', 'Electronics', 'Samsung Galaxy 7', 'Awesome phone!', '655', '2016-2-22', 'TRUE', 'test@gmail.com');
insert into object values ('010', 'Electronics', 'Nokia', 'Brick', '200',  '2016-2-22', 'TRUE', 'vesaliE@gmail.com');
insert into object values ('009', 'Electronics', 'Nexus 6P', 'Awesome phone! Very big.', '450', '2016-2-22', 'TRUE', 'turtle@gmail.com');
insert into object values ('008', 'Electronics', 'IPhone 7', 'Awesome phone! No headphone jack.', '900', '2016-2-22', 'TRUE', 'moon@gmail.com');
insert into object values ('007', 'Electronics', 'Blackberry', 'Crappy phone!', '100',  '2016-2-22', 'TRUE', 'waow@gmail.com');
insert into object values ('006', 'Electronics', 'Toy Electric Car', 'Awesome car!', '70',  '2016-2-22', 'TRUE', 'abc@gmail.com');
insert into object values ('005', 'Electronics', 'Raspberry Pi', '', '30',  '2016-2-22', 'TRUE', 'abc@gmail.com');

insert into object values ('101', 'Book', 'Adventures of Huckleberry Finn', 'Great book', '20', '2016-11-2', 'TRUE', 'mchen@gmail.com');
insert into object values ('102', 'Book', 'Great Expectations', 'Bad book', '5', '2016-11-9', 'TRUE', 'alphabet@gmail.com');
insert into object values ('103', 'Book', 'Lord of the Rings', 'Classic trilogy', '10', '2015-08-20', 'TRUE', 'mchen@gmail.com');
insert into object values ('104', 'Book', 'The Martian', 'Made into a movie', '9.99', '2016-10-27', 'TRUE', 'turtle@gmail.com');
insert into object values ('105', 'Book', 'Art of War', 'By Sun Tzu', '5', '2015-01-16', 'TRUE', 'moon@gmail.com');
insert into object values ('106', 'Book', 'Chicken Little', 'Not sure if this is a book', '1.99', '2016-02-11', 'TRUE', 'yeli@gmail.com');

insert into object values ('201', 'Clothing', 'Turtleneck sweater', 'dont wear in singapore', '20.99', '2015-01-20', 'TRUE', 'turtle@gmail.com');
insert into object values ('202', 'Clothing', 'warm sweater', 'dont wear in singapore', '20.99', '2015-01-20', 'TRUE', 'turtle@gmail.com');
insert into object values ('203', 'Clothing', 'white T-shirt', 'very plain', '9.99', '2015-01-27', 'TRUE', 'waow@gmail.com');
insert into object values ('204', 'Clothing', 'Graphic Tee', 'very interesting graphics', '5.99', '2016-07-20', 'TRUE', 'chicken@gmail.com');
insert into object values ('205', 'Clothing', 'V-neck T-shirt', 'Plain but Ok.', '11.99', '2016-05-20', 'TRUE', 'moon@gmail.com');
insert into object values ('206', 'Clothing', 'Winter coat', 'no need for this in singapore', '80.99', '2016-09-25', 'TRUE', 'mchen@gmail.com');

insert into auction values('01', '2016-12-25', null, '005', 'abc@gmail.com');

insert into auction values ('02', '2016-12-31', null, '012', 'abc@gmail.com');
insert into auction values ('03',  '2016-12-31', null, '011', 'test@gmail.com');
insert into auction values ('04',   '2016-12-31', null, '010', 'vesaliE@gmail.com');
insert into auction values ('05',  '2016-12-31', null, '009', 'turtle@gmail.com');
insert into auction values ('06',  '2016-12-31', null, '008', 'moon@gmail.com');
insert into auction values ('07',  '2016-12-31', null, '007', 'waow@gmail.com');
insert into auction values ('08', '2016-12-31', null, '006', 'abc@gmail.com');

insert into auction values ('09', '2016-12-31', null, '101', 'mchen@gmail.com');
insert into auction values ('10',  '2016-12-31', null, '102', 'alphabet@gmail.com');
insert into auction values ('11',   '2016-12-31', null, '103', 'mchen@gmail.com');
insert into auction values ('12',  '2016-12-31', null, '104', 'turtle@gmail.com');
insert into auction values ('13',  '2016-12-31', null, '105', 'moon@gmail.com');
insert into auction values ('14',  '2016-12-31', null, '106', 'yeli@gmail.com');

insert into auction values ('15', '2016-12-31', null, '201', 'turtle@gmail.com');
insert into auction values ('16',  '2016-12-31', null, '202', 'turtle@gmail.com');
insert into auction values ('17',   '2016-12-31', null, '203', 'waow@gmail.com');
insert into auction values ('18',  '2016-12-31', null, '204', 'chicken@gmail.com');
insert into auction values ('19',  '2016-12-31', null, '205', 'moon@gmail.com');
insert into auction values ('20',  '2016-12-31', null, '206', 'mchen@gmail.com');


insert into auction values ('201', 'Clothing', 'Turtleneck sweater', 'dont wear in singapore', '20.99', '2015-01-20', 'TRUE', 'turtle@gmail.com');
insert into auction values ('202', 'Clothing', 'warm sweater', 'dont wear in singapore', '20.99', '2015-01-20', 'TRUE', 'turtle@gmail.com');
insert into auction values ('203', 'Clothing', 'white T-shirt', 'very plain', '9.99', '2015-01-27', 'TRUE', 'waow@gmail.com');
insert into auction values ('204', 'Clothing', 'Graphic Tee', 'very interesting graphics', '5.99', '2016-07-20', 'TRUE', 'chicken@gmail.com');
insert into auction values ('205', 'Clothing', 'V-neck T-shirt', 'Plain but Ok.', '11.99', '2016-05-20', 'TRUE', 'moon@gmail.com');
insert into auction values ('206', 'Clothing', 'Winter coat', 'no need for this in singapore', '80.99', '2016-09-25', 'TRUE', 'mchen@gmail.com');

insert into loan values ('L0001', '2016-2-26', '2016-3-29', 'yeli@gmail.com', 'test@gmail.com', '011');
insert into loan values ('L0002', '2016-2-29', '2016-7-9', 'mchen@gmail.com', 'moon@gmail.com', '008' );
