-- username: user, password: asd
INSERT INTO users(userName, passwordHash, sessionId) VALUES ('user', '7815696ecbf1c96e6894b779456d330e', '0');
-- username: user2, password: asd
INSERT INTO users(userName, passwordHash, sessionId) VALUES ('user2', '7815696ecbf1c96e6894b779456d330e', '0');

-- example categories
INSERT INTO categories(name) VALUES ('Laptop');
INSERT INTO categories(name) VALUES ('PC');
INSERT INTO categories(name) VALUES ('Mouse');
INSERT INTO categories(name) VALUES ('Keyboard');

-- example sub-categories
INSERT INTO subcategories(name) VALUES ('Apple');
INSERT INTO subcategories(name) VALUES ('Gamer');
INSERT INTO subcategories(name) VALUES ('Budget');

-- example products
INSERT INTO products(name, description, price, categoryId) VALUES ('Apple MacBook Air', 'M1 Chip, 8GB RAM, 256GB SSD', '500000', '1');
INSERT INTO products(name, description, price, categoryId) VALUES ('ASUS X409FA-BV643', 'Intel Core i3, 8GB RAM, 256GB SSD', '200000', '1');
INSERT INTO products(name, description, price, categoryId) VALUES ('ASUS ROG Strix G15DH-HU005T', 'AMD Picasso, 8GB RAM, 512GB SSD', '350000', '2');
INSERT INTO products(name, description, price, categoryId) VALUES ('Cooler Master MasterMouse MM531', 'Optikai, USB', '32000', '3');
INSERT INTO products(name, description, price, categoryId) VALUES ('Logitech G305', 'Optikai, USB', '40000', '3');
INSERT INTO products(name, description, price, categoryId) VALUES ('Cooler Master CK350 ', 'Outemu kapcsolók, LED: RGB', '42000', '4');
INSERT INTO products(name, description, price, categoryId) VALUES ('White Shark GK-2022', '50 millió garantált leütés, Mechanikus', '29000', '4');
INSERT INTO products(name, description, price, categoryId) VALUES ('Apple Magic Mouse', 'Wireless', '30000', '3');
INSERT INTO products(name, description, price, categoryId) VALUES ('HP HyperX Alloy Core', 'RGB, US layout', '9999', '4');


INSERT INTO product_category(subCategoryId, ProductId) VALUES ('1', '1');
INSERT INTO product_category(subCategoryId, ProductId) VALUES ('1', '8');
INSERT INTO product_category(subCategoryId, ProductId) VALUES ('2', '3');
INSERT INTO product_category(subCategoryId, ProductId) VALUES ('2', '4');
INSERT INTO product_category(subCategoryId, ProductId) VALUES ('2', '5');
INSERT INTO product_category(subCategoryId, ProductId) VALUES ('2', '6');
INSERT INTO product_category(subCategoryId, ProductId) VALUES ('2', '7');
INSERT INTO product_category(subCategoryId, ProductId) VALUES ('2', '9');
INSERT INTO product_category(subCategoryId, ProductId) VALUES ('3', '2');
INSERT INTO product_category(subCategoryId, ProductId) VALUES ('3', '9');