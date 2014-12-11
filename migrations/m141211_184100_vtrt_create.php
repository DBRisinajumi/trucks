<?php

class m141211_184100_vtrt_create extends EDbMigration
{
	public function up()
	{
		$this->execute("
            CREATE TABLE `vtrt_trailer_type`(  
              `vtrt_id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
              `vtrt_name` VARCHAR(50) NOT NULL,
              PRIMARY KEY (`vtrt_id`)
            ) ENGINE=INNODB CHARSET=utf8;
            
            ALTER TABLE `vtrl_trailer`   
              ADD COLUMN `vtrl_vtrt_id` TINYINT UNSIGNED NULL  COMMENT 'Trailer type' AFTER `vtrl_ccmp_id`,
              ADD FOREIGN KEY (`vtrl_vtrt_id`) REFERENCES `vtrt_trailer_type`(vtrt_id);
              
            INSERT INTO `vtrt_trailer_type` (`vtrt_name`) VALUES ('Tents'); 
            INSERT INTO `vtrt_trailer_type` (`vtrt_name`) VALUES ('Konteineršasija'); 
            INSERT INTO `vtrt_trailer_type` (`vtrt_name`) VALUES ('Refs'); 
            INSERT INTO `vtrt_trailer_type` (`vtrt_name`) VALUES ('Megatreileris'); 

        ");        
	}

	public function down()
	{
		echo "m141211_184100_vtrt_create does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}