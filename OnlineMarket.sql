DROP DATABASE IF EXISTS `OnlineMarket`;
CREATE DATABASE IF NOT EXISTS OnlineMarket;
use OnlineMarket;

DROP TABLE IF EXISTS `Users`;

CREATE TABLE Users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, 
    address VARCHAR(255) NOT NULL, 
    email VARCHAR(255) NOT NULL UNIQUE, 
    username VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, 
    createdDate TIMESTAMP
);

DROP TABLE IF EXISTS `Products`;

CREATE TABLE Products (
    productID INT AUTO_INCREMENT PRIMARY KEY, 
    sellerID INT  NOT NULL,
    productName VARCHAR (255) NOT NULL, 
    description VARCHAR(256) NOT NULL, 
    category VARCHAR(60) NOT NULL, 
    qty INT, 
    price DOUBLE, 
    image VARCHAR (255) NOT NULL, 
    createdDate TIMESTAMP,
    CHECK (qty > 0), 
    CHECK (price > 0), 
    FOREIGN KEY (sellerID) REFERENCES Users (userID)
);

DROP TABLE IF EXISTS `Carts`;

CREATE TABLE Carts (
orderID INT AUTO_INCREMENT PRIMARY KEY, 
productID INT NOT NULL UNIQUE, 
qty INT NOT NULL, 
CHECK (qty > 0), 
FOREIGN KEY (orderID) REFERENCES Users (userID),
FOREIGN KEY (productID) REFERENCES Products (productID)
);

DROP TABLE IF EXISTS `Wishlist`;

CREATE TABLE Wishlist (
userID INT, 
productID INT,
FOREIGN KEY (productID) REFERENCES Products (productID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (userID) REFERENCES Users (userID),
PRIMARY KEY (userID, productID)
);

DROP TABLE IF EXISTS `CustomerReview`;

CREATE TABLE CustomerReview (
messageID INT AUTO_INCREMENT PRIMARY KEY, 
sellerID INT, 
message VARCHAR(255),
FOREIGN KEY (sellerID) REFERENCES Users (userID)
);

DROP TABLE IF EXISTS `Orders`;

CREATE TABLE Orders (
    orderID INT AUTO_INCREMENT PRIMARY KEY, 
    userID INT UNIQUE NOT NULL, 
    paymentMode VARCHAR(60) NOT NULL, 
    status VARCHAR(20) NOT NULL, 
    createDate TIMESTAMP, 
    FOREIGN KEY (userID) REFERENCES Users (userID)
);

DROP TABLE IF EXISTS `OrderDetails`;

CREATE TABLE OrderDetails (
    productID INT, 
    orderID INT, 
    qty INT NOT NULL, 
    CHECK (qty > 0), 
    FOREIGN KEY (productID) REFERENCES Products(productID),
    FOREIGN KEY (orderID) REFERENCES Orders(orderID),
    PRIMARY KEY (productID, orderID)
);

INSERT INTO Users VALUES (
1,
'R2D2',
'Naboo',
'r2d2@starwars.com',
'r2d2',
'r2d2r2d2',
'2019-10-01'
);

INSERT INTO Users VALUES (
2,
'Amee',
'Tatooine',
'amee@starwars.com',
'amee',
'ameeamee',
'2019-10-01'
);

INSERT INTO Users VALUES (
3,
'Padme Amidala',
'Naboo',
'padme_amidala@starwars.com',
'padme',
'padmepadme',
'2019-10-01'
);

INSERT INTO Users VALUES (
4,
'Jar Jar Binks',
'Naboo',
'jar_jar_binks@starwars.com',
'jarjar',
'jarjarjarjar',
'2019-10-03'
);

INSERT INTO Users VALUES (
5,
'C3PO',
'Tatooine',
'c3po@starwars.com',
'c3po',
'c3poc3po',
'2019-10-04'
);

INSERT INTO Users VALUES (
6,
'Chewbacca',
'Kashyyyk',
'chewbacca@starwars.com',
'chewbacca',
'chewbacca',
'2019-10-04'
);

INSERT INTO Users VALUES (
7,
'Count Dooku',
'Serenno',
'count_dooku@starwars.com',
'dooku',
'dookudooku',
'2019-10-04'
);

INSERT INTO Users VALUES (
8,
'Boba Fett',
'Kamino',
'boba_fett@starwars.com',
'bobafett',
'bobafettbobafett',
'2019-10-04'
);

INSERT INTO Users VALUES (
9,
'Qui-Gon Jinn',
'Coruscant',
'qui-gon_jinn@starwars.com',
'quigon',
'quigonquigon',
'2019-10-04'
);

INSERT INTO Users VALUES (
10,
'Obi-Wan Kenobi',
'Stewjon',
'obi-wan_kenobi@starwars.com',
'obiwan',
'obiwanobiwan',
'2019-10-04'
);

INSERT INTO Users VALUES (
11,
'Darth Maul',
'Dathomir',
'darth_maul@starwars.com',
'darthmaul',
'darthmauldarthmaul',
'2019-10-04'
);

INSERT INTO Users VALUES (
12,
'Leia Organa',
'Polis Massa',
'leia_organa@starwars.com',
'leia',
'leialeia',
'2019-10-05'
);

INSERT INTO Users VALUES (
13,
'Anakin Skywalker',
'Tatooine',
'anakin_skywalker@starwars.com',
'anakin',
'anakinanakin',
'2019-10-05'
);

INSERT INTO Users VALUES (
14,
'Luke Skywalker',
'Polis Massa',
'luke_skywalker@starwars.com',
'luke',
'lukeluke',
'2019-10-05'
);

INSERT INTO Users VALUES (
15,
'Han Solo',
'Corellia',
'han_solo@starwars.com',
'hansolo',
'hansolohansolo',
'2019-10-05'
);

INSERT INTO Users VALUES (
16,
'Yoda',
'unknown',
'yoda@starwars.com',
'yoda',
'yodayoda',
'2019-10-05'
);

/*insert into products table*/
INSERT INTO Products VALUES (
1,
2,
'MenShoes',
'MenShoes',
'MSh',
35,
80.00,
'To be imaged',
'2019-10-01'
);

INSERT INTO Products VALUES (
2,
3,
'LadiesTop',
'LadiesTop',
'LT',
20,
19.00,
'To be imaged',
'2019-10-02'
);

INSERT INTO Products VALUES (
3,
3,
'Golf bag',
'Golf bag',
'Sp',
2,
345.75,
'To be imaged',
'2019-10-02'
);

INSERT INTO Products VALUES (
4,
1,
'LadiesBottom',
'LadiesBottom',
'LB',
34,
46.00,
'To be imaged',
'2019-10-03'
);

INSERT INTO Products VALUES (
5,
5,
'Flask',
'Flask',
'HK',
21,
76.00,
'To be imaged',
'2019-10-03'
);

INSERT INTO Products VALUES (
6,
4,
'Hand soap',
'Hand soap',
'HG',
73,
24.46,
'To be imaged',
'2019-10-03'
);

INSERT INTO Products VALUES (
7,
7,
'KidsTop',
'KidsTop',
'KT',
30,
37.00,
'To be imaged',
'2019-10-04'
);

INSERT INTO Products VALUES (
8,
8,
'KidsBottom',
'KidsBottom',
'KB',
15,
13.00,
'To be imaged',
'2019-10-04'
);

INSERT INTO Products VALUES (
9,
6,
'Iron',
'Iron',
'HF',
5,
97.32,
'To be imaged',
'2019-10-04'
);

INSERT INTO Products VALUES (
10,
10,
'Bluetooth speakers',
'Bluetooth speakers',
'E',
63,
259.90,
'To be imaged',
'2019-10-04'
);


INSERT INTO Products VALUES (
11,
9,
'Running shoes',
'Running shoes',
'Sp',
9,
142.97,
'To be imaged',
'2019-10-04'
);

INSERT INTO Products VALUES (
12,
13,
'MenTop',
'MenTop',
'MT',
10,
30.80,
'To be imaged',
'2019-10-05'
);

INSERT INTO Products VALUES (
13,
15,
'MenBottom',
'MenBottom',
'MB',
45,
55.50,
'To be imaged',
'2019-10-05'
);

INSERT INTO Products VALUES (
14,
1,
'LadiesShoes',
'LadiesShoes',
'LSh',
42,
16.00,
'To be imaged',
'2019-10-05'
);

INSERT INTO Products VALUES (
15,
8,
'Electric Kettle',
'Electric Kettle',
'HK',
74,
145.00,
'To be imaged',
'2019-10-05'
);

INSERT INTO Products VALUES (
16,
15,
'Detergent',
'Detergent',
'HG',
62,
12.99,
'To be imaged',
'2019-10-05'
);

INSERT INTO Products VALUES (
17,
12,
'USB C to HDMI adaptor',
'USB C to HDMI adaptor',
'E',
25,
45.67,
'To be imaged',
'2019-10-05'
);

INSERT INTO Products VALUES (
18,
16,
'Tennis racket',
'Tennis racket',
'Sp',
10,
123.67,
'To be imaged',
'2019-10-05'
);

INSERT INTO Products VALUES (
19,
13,
'KidsShoes',
'KidsShoes',
'KSh',
62,
46.00,
'To be imaged',
'2019-10-06'
);

INSERT INTO Products VALUES (
20,
7,
'Dining Table',
'Dining Table',
'HF',
13,
134.90,
'To be imaged',
'2019-10-06'
);

INSERT INTO Products VALUES (
21,
14,
'VGA cable',
'VGA cable',
'E',
36,
34.46,
'To be imaged',
'2019-10-06'
);

INSERT INTO Products VALUES (
22,
12,
'Accessories',
'Accessories',
'Ac',
64,
15.00,
'To be imaged',
'2019-10-07'
);

INSERT INTO Products VALUES (
23,
11,
'Chairs',
'Chairs',
'HF',
63,
57.98,
'To be imaged',
'2019-10-07'
);

