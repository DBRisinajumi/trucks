<?php

class m140805_184401_alter_vtdc extends CDbMigration
{

	/**
	 * Creates initial version of the table
	 */
	public function up()
	{
		$this->execute("
            ALTER TABLE `vtdc_truck_doc`   
            DROP COLUMN `vtdc_deleted`;


        ");
	}

	/**
	 * Drops the table
	 */
	public function down()
	{
	
	}

	/**
	 * Creates initial version of the table in a transaction-safe way.
	 * Uses $this->up to not duplicate code.
	 */
	public function safeUp()
	{
		$this->up();
	}

	/**
	 * Drops the table in a transaction-safe way.
	 * Uses $this->down to not duplicate code.
	 */
	public function safeDown()
	{
		$this->down();
	}
}
