-- User Table: for managing user accounts
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,  -- Hashed password
    email VARCHAR(255) UNIQUE NOT NULL,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    account_status ENUM('Active', 'Inactive', 'Suspended') DEFAULT 'Active',
    role ENUM('Customer', 'Admin') DEFAULT 'Customer',
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP,
    phone_number VARCHAR(20),
    shipping_address_address_line1 VARCHAR(255),
    shipping_address_address_line2 VARCHAR(255),
    shipping_address_city VARCHAR(100),
    shipping_address_state VARCHAR(100),
    shipping_address_postal_code VARCHAR(20),
    shipping_address_country VARCHAR(100),
    profile_picture_url VARCHAR(255),
    social_links_facebook VARCHAR(255),
    social_links_twitter VARCHAR(255)
);

-- Product Table: to store flower products and bouquets
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    stock_quantity INT DEFAULT 0,
    image_url VARCHAR(255),
    floral_type VARCHAR(100),
    occasion JSON,  -- Can store a list of occasions like ["Anniversary", "Romantic"]
    size VARCHAR(50),
    discount DECIMAL(5, 2) DEFAULT 0,  -- Discount in percentage
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Order Table: to store customer orders
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    shipping_address_address_line1 VARCHAR(255),
    shipping_address_address_line2 VARCHAR(255),
    shipping_address_city VARCHAR(100),
    shipping_address_state VARCHAR(100),
    shipping_address_postal_code VARCHAR(20),
    shipping_address_country VARCHAR(100),
    order_status ENUM('Pending', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
    payment_status ENUM('Pending', 'Paid', 'Failed', 'Refunded') DEFAULT 'Pending',
    payment_method ENUM('Credit Card', 'PayPal', 'Bank Transfer') NOT NULL,
    tracking_number VARCHAR(100),
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Order Items Table: to store the details of products in an order
CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price_per_unit DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Payment Table: to store payment details
CREATE TABLE payments (
    payment_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_method ENUM('Credit Card', 'PayPal', 'Bank Transfer') NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    payment_status ENUM('Pending', 'Paid', 'Failed', 'Refunded') DEFAULT 'Pending',
    transaction_id VARCHAR(100),
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE
);

-- Cart Table: to store cart items for customers
CREATE TABLE carts (
    cart_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_amount DECIMAL(10, 2) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Cart Items Table: to store products in the user's cart
CREATE TABLE cart_items (
    cart_item_id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price_per_unit DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (cart_id) REFERENCES carts(cart_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Review Table: to store product reviews from customers
CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Inventory Table: to store product inventory details
CREATE TABLE inventory (
    product_id INT NOT NULL,
    stock_quantity INT DEFAULT 0,
    restock_threshold INT DEFAULT 10,
    supplier_name VARCHAR(255),
    supplier_contact_email VARCHAR(255),
    PRIMARY KEY (product_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Promotion Table: to store product promotions and discounts
CREATE TABLE promotions (
    promo_id INT AUTO_INCREMENT PRIMARY KEY,
    promo_code VARCHAR(100) UNIQUE NOT NULL,
    discount_percentage DECIMAL(5, 2) NOT NULL,
    valid_from DATE NOT NULL,
    valid_until DATE NOT NULL,
    applicable_on JSON,  -- Can store list of product IDs like [1, 2, 3]
    status ENUM('Active', 'Expired') DEFAULT 'Active'
);

-- Shipping Table: to track shipping details for each order
CREATE TABLE shipping (
    shipping_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    tracking_number VARCHAR(100),
    shipping_method VARCHAR(100),
    shipping_status ENUM('Pending', 'Shipped', 'Delivered') DEFAULT 'Pending',
    estimated_delivery DATE,
    carrier VARCHAR(100),
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE
);
