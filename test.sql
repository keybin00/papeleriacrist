CREATE TABLE devices (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	category VARCHAR(255),
	is_complete INT(1),
	status ENUM('active','deleted','inuse'),
	rented INT(1),
	rate FLOAT(7,2),
	minimum INT(10) default 15,
	created_at TIMESTAMP,
	updated_at DATETIME
);

CREATE TABLE rents (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	is_complete INT(1),
	status ENUM('active','deleted'),
	started VARCHAR(255),
	stimated VARCHAR(255),
	ended VARCHAR(255),
	equipment INT(11) NOT NULL,
	created_at TIMESTAMP,
	updated_at DATETIME	
);