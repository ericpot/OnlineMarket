create database OnlineMarket;
use OnlineMarket;

create table Users (
    userID INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL, 
    address VARCHAR(255) NOT NULL, 
    email VARCHAR(255) not null UNIQUE, 
    username VARCHAR(60) not null UNIQUE, 
    password VARCHAR(255) not null  UNIQUE, 
    createdDate TIMESTAMP, 
);

CREATE TABLE Carts(
orderID INT auto_increment primary key, 
productID INT AUTO_INCREMENT not null unique, 
qty INT
FOREIGN KEY (orderID) REFERENCES Users (userID)
FOREIGN KEY (productID) REFERENCES Users (userID)
);

CREATE TABLE Wishlist(
userID INT, 
productID INT,
FOREIGN KEY (productID) REFERENCES Products (productID)
FOREIGN KEY (userID) REFERENCES Users (UserID),
PRIMARY KEY (userID, productID)
);


CREATE TABLE CustomerReview(
messageID INT auto_increment PRIMARY KEY, 
sellerID INT, 
message VARCHAR(255),
FOREIGN KEY (sellerID) REFERENCES Users (userID)
);

CREATE TABLE Products(
    productID INT auto_increment PRIMARY KEY, 
    sellerID INT auto_increment, 
    productName VARCHAR (255), 
    description VARCHAR(256), 
    category VARCHAR(60), 
    qty INT auto_increment, 
    price DOUBLE, 
    size_color VARCHAR(255), 
    image VARCHAR (255), 
    createdDate TIMESTAMP
    FOREIGN KEY (sellerID) REFERENCES Users (userID)
);

CREATE TABLE Orders(
    orderID INT PRIMARY KEY, 
    userID INT, 
    paymentMode VARCHAR(255), 
    status VARCHAR(20), 
    createDate TIMESTAMP, 
    FOREIGN KEY (userID) REFERENCES Users (userID)
);

CREATE OrderDetails(
    productID INT, 
    orderID INT, 
    qty INT, 
    FOREIGN KEY (userID) REFERENCES Orders(userID)
    FOREIGN KEY (orderID) REFERENCES Orders(orderID)
    PRIMARY KEY (productID, orderID)
);



