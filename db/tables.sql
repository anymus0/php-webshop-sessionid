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
    sessionId varchar(255) NOT NULL UNIQUE,
    FOREIGN KEY (sessionId) REFERENCES userSessions(id)
);

CREATE TABLE categories (
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL UNIQUE
);

CREATE TABLE products (
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    description varchar(255) NOT NULL,
	categoryId int,
    FOREIGN KEY (categoryId) REFERENCES categories(id)
);