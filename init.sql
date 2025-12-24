-- Create database
CREATE DATABASE IF NOT EXISTS carbooking;

-- Use the database
USE carbooking;

-- Create users table
CREATE TABLE users (
    username VARCHAR(10) PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
-- Optional: create a secure user for PHP scripts (recommended)
CREATE USER IF NOT EXISTS 'car_user'@'localhost' IDENTIFIED BY 'car_pass';
GRANT ALL PRIVILEGES ON carbooking.* TO 'car_user'@'localhost';
FLUSH PRIVILEGES;

INSERT INTO users (username, email, password) VALUES
('admin', 'admin@luxride.com', '$2y$12$p86p221RIB/i.bUwcmqHeuGQVSDFjFMNh7UZbm8MbI3M7orc06MNC');
