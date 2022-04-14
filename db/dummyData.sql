-- username: user, password: asd
INSERT INTO users(userName, passwordHash, sessionId) VALUES ('user', '7815696ecbf1c96e6894b779456d330e', '0');
-- username: user2, password: asd
INSERT INTO users(userName, passwordHash, sessionId) VALUES ('user2', '7815696ecbf1c96e6894b779456d330e', '0');

-- example categories
INSERT INTO categories(name) VALUES ('Laptop');
INSERT INTO categories(name) VALUES ('PC');
INSERT INTO categories(name) VALUES ('Mouse');
INSERT INTO categories(name) VALUES ('Keyboard');

-- example products
INSERT INTO products(name, description, categoryId) VALUES ('Apple MacBook Air', 'M1 Chip, 8GB RAM, 256GB SSD', '1');
INSERT INTO products(name, description, categoryId) VALUES ('ASUS X409FA-BV643', 'Intel Core i3, 8GB RAM, 256GB SSD', '1');
INSERT INTO products(name, description, categoryId) VALUES ('ASUS ROG Strix G15DH-HU005T', 'AMD Picasso, 8GB RAM, 512GB SSD', '2');
INSERT INTO products(name, description, categoryId) VALUES ('Cooler Master MasterMouse MM531', 'Optikai, USB', '3');
INSERT INTO products(name, description, categoryId) VALUES ('Logitech G305', 'Optikai, USB', '3');
INSERT INTO products(name, description, categoryId) VALUES ('Cooler Master CK350 ', 'Outemu kapcsolók, LED: RGB', '4');
INSERT INTO products(name, description, categoryId) VALUES ('White Shark GK-2022', '50 millió garantált leütés, Mechanikus', '4');
