CREATE DATABASE `database_test`

USE `database_test`

CREATE TABLE products (
	id INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(70),
	reference VARCHAR(40),
	price INT(11),
	weigth INT(11),
	category VARCHAR(50),
	stock INT(11),
	created_at DATETIME DEFAULT NOW(),
	updated_at DATETIME DEFAULT NOW(),
	deleted_at DATETIME,
	last_user VARCHAR(50),
    PRIMARY KEY (id)
);

CREATE TABLE sales (
	id INT AUTO_INCREMENT NOT NULL,
	product_id INT,
	quantity INT,
	total INT NOT NULL,
	salesman VARCHAR(50),
	customer VARCHAR(50),
	updated_at DATETIME DEFAULT NOW(),
	created_at DATETIME DEFAULT NOW(),
	deleted_at DATETIME DEFAULT NOW(),
	last_user_at DATETIME DEFAULT NOW(),
	PRIMARY KEY (id),
	FOREIGN KEY (product_id) REFERENCES products(id)
);