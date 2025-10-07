-- Create database if needed (don't drop existing!)
CREATE DATABASE IF NOT EXISTS `bird_gang`;
USE `bird_gang`;

-- Drop and recreate table (this is fine for dev)
DROP TABLE IF EXISTS `birds`;

CREATE TABLE `birds` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `common_name` VARCHAR(100) NOT NULL,
  `habitat` VARCHAR(100) NOT NULL,
  `food` VARCHAR(100) NOT NULL,
  `conservation_id` TINYINT NOT NULL,
  `backyard_tips` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data with proper values
INSERT INTO `birds` (`common_name`, `habitat`, `food`, `conservation_id`, `backyard_tips`) VALUES
('Carolina Wren', 'Open woodlands', 'Insects', 1, 'Carolina Wrens visit suet-filled feeders during winter.'),
('Tufted Titmouse', 'Forests', 'Insects', 1, 'Tufted Titmouse are regulars at backyard bird feeders, especially in winter. They prefer sunflower seeds but will eat suet, peanuts, and other seeds as well.'),
('Ruby-Throated Hummingbird', 'Open woodlands', 'Nectar', 1, 'You can attract Ruby-throated Hummingbirds to your backyard by setting up hummingbird feeders or by planting tubular flowers.'),
('Eastern Towhee', 'Scrub', 'Omnivore', 1, 'Eastern Towhees are likely to visit – or perhaps live in – your yard if you've got brushy, shrubby, or overgrown borders.'),
('Indigo Bunting', 'Open woodlands', 'Insects', 1, 'You can attract Indigo Buntings to your yard with feeders, particularly with small seeds such as thistle or nyjer.');
