
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- article
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(20) DEFAULT 'Default title' NOT NULL,
    `abstract` VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    `text` VARCHAR(1000) NOT NULL,
    `activity` TINYINT(1) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
