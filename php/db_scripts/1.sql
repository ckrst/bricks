ALTER TABLE `brix`.`objeto` 
ADD COLUMN `app_id` BIGINT NOT NULL AFTER `nome`,
ADD INDEX `fk_objeto_app_idx` (`app_id` ASC);
ALTER TABLE `brix`.`objeto` 
ADD CONSTRAINT `fk_objeto_app`
  FOREIGN KEY (`app_id`)
  REFERENCES `brix`.`app` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;