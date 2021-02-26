ALTER TABLE `autogestion`.`subscriptions` 
ADD COLUMN `Retry` BIT DEFAULT 0 AFTER `JsonRequest`;