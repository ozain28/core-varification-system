CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    number VARCHAR(20),
    password VARCHAR(255),
    email_code VARCHAR(10),
    number_code VARCHAR(10),
    verified_email TINYINT(1),
    verified_number TINYINT(1)
);