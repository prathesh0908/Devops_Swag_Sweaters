CREATE DATABASE sweaters_raincoats;
USE sweaters_raincoats;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2),
    image VARCHAR(255),
    category ENUM('sweater', 'raincoat'),
    stock INT
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100),
    email VARCHAR(100),
    product_id INT,
    quantity INT,
    total DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (name, price, image, category, stock) VALUES
('Cozy Wool Sweater', 49.99, 'images/sweater-men.jpg', 'sweater', 50),
('Waterproof Raincoat', 79.99, 'images/raincoat-men.jpg', 'raincoat', 30),
('Cashmere Sweater', 89.99, 'images/sweater-women.jpg', 'sweater', 20),
('Hooded Raincoat', 59.99, 'images/raincoat-women.jpg', 'raincoat', 40);
