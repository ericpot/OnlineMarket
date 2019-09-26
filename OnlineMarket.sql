create database OnlineMarket;
use OnlineMarket;

create table Users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, 
    address VARCHAR(255) NOT NULL, 
    email VARCHAR(255) NOT NULL UNIQUE, 
    username VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, 
    createdDate TIMESTAMP
);

CREATE TABLE Carts(
orderID INT AUTO_INCREMENT PRIMARY KEY, 
productID INT AUTO_INCREMENT NOT NULL UNIQUE, 
qty INT NOT NULL, 
CHECK (qty > 0), 
FOREIGN KEY (orderID) REFERENCES Users (userID)
FOREIGN KEY (productID) REFERENCES Products (productID)
);

CREATE TABLE Wishlist(
userID INT, 
productID INT,
FOREIGN KEY (productID) REFERENCES Products (productID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (userID) REFERENCES Users (UserID),
PRIMARY KEY (userID, productID)
);


CREATE TABLE CustomerReview(
messageID INT AUTO_INCREMENT PRIMARY KEY, 
sellerID INT AUTO_INCREMENT, 
message VARCHAR(255),
FOREIGN KEY (sellerID) REFERENCES Users (userID)
);

CREATE TABLE Products(
    productID INT AUTO_INCREMENT PRIMARY KEY, 
    sellerID INT AUTO_INCREMENT UNIQUE NOT NULL,
    productName VARCHAR (255) NOT NULL, 
    description VARCHAR(256) NOT NULL, 
    category VARCHAR(60) NOT NULL, 
    qty INT auto_increment, 
    price DOUBLE, 
    image VARCHAR (255) NOT NULL, 
    createdDate TIMESTAMP,
    CHECK (qty > 0), 
    CHECK (price > 0), 
    FOREIGN KEY (sellerID) REFERENCES Users (userID)
);

CREATE TABLE Orders(
    orderID INT AUTO_INCREMENT PRIMARY KEY, 
    userID INT UNIQUE NOT NULL, 
    paymentMode VARCHAR(60) NOT NULL, 
    status VARCHAR(20) NOT NULL, 
    createDate TIMESTAMP, 
    FOREIGN KEY (userID) REFERENCES Users (userID)
);

CREATE OrderDetails(
    productID INT, 
    orderID INT, 
    qty INT NOT NULL, 
    CHECK (qty > 0), 
    FOREIGN KEY (productID) REFERENCES Products(productID)
    FOREIGN KEY (orderID) REFERENCES Orders(orderID)
    PRIMARY KEY (productID, orderID)
);



