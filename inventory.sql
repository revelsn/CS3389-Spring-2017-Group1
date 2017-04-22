SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE IF NOT EXISTS `inventory` (
  `name` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `inventory` (`name`, `price`, `stock`, `category`) VALUES
('Oranges', 5.3, 162, 'Produce'),
('Apples', 3.02, 101, 'Produce'),
('Bananas', 7.2, 200, 'Produce'),
('Lettuce', 2.93, 116, 'Produce'),
('Tomatoes', 1.05, 161, 'Produce'),
('Squash', 4.48, 66, 'Produce'),
('Celery', 3.25, 28, 'Produce'),
('Cucumber', 2.79, 122, 'Produce'),
('Mushrooms', 4.2, 137, 'Produce'),
('Milk ', 4.64, 119, 'Dairy'),
('Cheese', 2.59, 172, 'Dairy'),
('Eggs', 7.05, 116, 'Dairy'),
('Cottage cheese', 3.46, 51, 'Dairy'),
('Sour cream', 4.16, 90, 'Dairy'),
('Yogurt', 2.42, 95, 'Dairy'),
('Beef', 7.61, 196, 'Meat'),
('Poultry', 6.81, 115, 'Meat'),
('Ham', 3.19, 166, 'Meat'),
('Seafood', 3.55, 98, 'Meat'),
('Lunch meat', 0.18, 169, 'Meat'),
('Soda', 6.24, 161, 'Drinks'),
('Juice', 6.67, 98, 'Drinks'),
('Coffee', 6.63, 188, 'Drinks'),
('Tea', 5.12, 67, 'Drinks'),
('Water', 5.72, 139, 'Drinks'),
('Noodles', 5.26, 103, 'Pasta'),
('Rice', 1.11, 88, 'Pasta'),
('Canned', 5.8, 120, 'Soup'),
('Dry mix', 1.66, 138, 'Soup'),
('Bread', 6.89, 129, 'Bakery'),
('Bagels', 5.46, 33, 'Bakery'),
('Muffins', 6.64, 147, 'Bakery'),
('Cake', 0.84, 55, 'Bakery'),
('Potato chips', 0.27, 15, 'Snacks'),
('Pretzels', 6.84, 89, 'Snacks'),
('Ice cream', 1.37, 12, 'Snacks'),
('Cookies', 2.32, 161, 'Snacks'),
('Paper plates', 7.5, 191, 'Supplies'),
('Napkins', 6.56, 83, 'Supplies'),
('Garbage bags', 2.28, 20, 'Supplies'),
('Detergent', 7.72, 30, 'Supplies'),
('', 7.76, 81, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
