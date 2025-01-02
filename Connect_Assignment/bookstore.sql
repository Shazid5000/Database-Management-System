-- Create database
CREATE DATABASE IF NOT EXISTS `bookstore`;

-- Use database
USE `bookstore`;

-- Create table
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `published_year` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data
INSERT INTO `books` (`title`, `author`, `published_year`) VALUES
('the catcher', 'salinger', 1951),
('operational management', 'stallings', 1980),
('the catcher', 'salinger', 1951),
('operational management', 'stallings', 1980),
('abcd', 'gttgfhfg', 2000),
('himu', 'humayun ahmed', 1990),
('dsa', 'dfsaf', 2323);

-- Update record
UPDATE `books` SET `author` = 'Updated Author', `published_year` = 2025 WHERE `title` = 'the catcher';

-- Delete record
DELETE FROM `books` WHERE `title` = 'abcd';
