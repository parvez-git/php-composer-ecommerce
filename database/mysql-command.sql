
CREATE DATABASE `php_ecommerce_llc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name CHAR(60) NOT NULL,
    email CHAR(60) NOT NULL UNIQUE,
    password CHAR(60) NOT NULL,
    active BOOLEAN NOT NULL,
    email_verified_at DATE,
    email_verification_token VARCHAR(255),
    PRIMARY KEY (id)
);