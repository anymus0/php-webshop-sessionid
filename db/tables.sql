CREATE TABLE users (
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    userName varchar(255) NOT NULL UNIQUE,
    passwordHash varchar(255) NOT NULL
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