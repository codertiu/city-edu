<?php

use yii\db\Migration;

/**
 * Handles the creation of table `first_cancel`.
 */
class m180701_065055_create_first_cancel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('first_cancel', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255)->notNull(),
            'phone'=>$this->string(15)->notNull(),
            'instance_id'=>$this->integer()->notNull(),
            'creator_id'=>$this->integer()->notNull(),
            'create_date'=>$this->dateTime(),
            'update_date'=>$this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('first_cancel');
    }
}
