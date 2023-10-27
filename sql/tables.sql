CREATE DATABASE apartamentsfiguerencs;
USE apartamentsfiguerencs;

CREATE TABLE apartments (
    price_off_season DECIMAL(10, 2),
    price_peak_season DECIMAL(10, 2),
    rooms INT,
    square_meters DECIMAL(8, 2),
    longitude DECIMAL(10, 6),
    latitude DECIMAL(10, 6),
    date1_peak_season DATE,
    date2_peak_season DATE,
    services VARCHAR(255),
    postal_address VARCHAR(255),
    title VARCHAR(255),
    short_description TEXT,
    code INT AUTO_INCREMENT,
    capacity INT,
    PRIMARY KEY (code)
);

CREATE TABLE images (
    url VARCHAR(255),
    code INT AUTO_INCREMENT,
    apartment_code INT,
    PRIMARY KEY (code),
    FOREIGN KEY (apartment_code) REFERENCES apartments(code)
);

CREATE TABLE statuses (
    status TEXT,
    comment TEXT,
    date1 DATE,
    date2 DATE,
    code INT AUTO_INCREMENT,
    apartment_code INT,
    PRIMARY KEY (code),
    FOREIGN KEY (apartment_code) REFERENCES apartments(code)
);

CREATE TABLE bookings (
    booking_date DATE,
    date1 DATE,
    date2 DATE,
    code INT AUTO_INCREMENT,
    cancelled BOOLEAN,
    apartment_code INT,
    PRIMARY KEY (code),
    FOREIGN KEY (apartment_code) REFERENCES apartments(code)
);

CREATE TABLE roles (
    name VARCHAR(255),
    code INT AUTO_INCREMENT,
    PRIMARY KEY (code)
);

CREATE TABLE permissions (
    name VARCHAR(255),
    description TEXT,
    code INT AUTO_INCREMENT,
    PRIMARY KEY (code)
);

CREATE TABLE roles_permissions (
    role_code INT,
    permission_code INT,
    FOREIGN KEY (role_code) REFERENCES roles(code),
    FOREIGN KEY (permission_code) REFERENCES permissions(code)
);

CREATE TABLE users (
    name VARCHAR(255),
    surname VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(255),
    password VARCHAR(255),
    code INT AUTO_INCREMENT,
    role_code INT,
    PRIMARY KEY (code),
    FOREIGN KEY (role_code) REFERENCES roles(code)
);

CREATE TABLE seasons (
    type VARCHAR(255),
    date1 DATE,
    date2 DATE,
    code INT AUTO_INCREMENT,
    apartment_code INT,
    PRIMARY KEY (code),
    FOREIGN KEY (apartment_code) REFERENCES apartments(code)
);

