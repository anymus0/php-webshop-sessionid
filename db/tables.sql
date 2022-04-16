CREATE TABLE cartitems (
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    productId int,
    FOREIGN KEY (productId) REFERENCES products(id),
    quantity int NOT NULL,
    sessionId varchar(255) NOT NULL,
    FOREIGN KEY (sessionId) REFERENCES userSessions(id)
);

CREATE TABLE usersessions (
	id varchar(255) PRIMARY KEY NOT NULL
);

CREATE TABLE users (
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    userName varchar(255) NOT NULL UNIQUE,
    passwordHash varchar(255) NOT NULL,
    sessionId varchar(255) NOT NULL,
    FOREIGN KEY (sessionId) REFERENCES userSessions(id)
);

CREATE TABLE categories (
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL UNIQUE
);

CREATE TABLE subcategories
(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(255) UNIQUE
);

CREATE TABLE products (
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
    price int NOT NULL,
	categoryId int,
    FOREIGN KEY (categoryId) REFERENCES categories(id)
);

CREATE TABLE Product_Category
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    subCategoryId INT,
    ProductId INT,
    FOREIGN KEY (subCategoryId) REFERENCES subcategories(id),
    FOREIGN KEY (ProductId) REFERENCES products(id)
);