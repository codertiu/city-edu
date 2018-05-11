<?php

use yii\db\Migration;

/**
 * Handles the creation of table `member_salary`.
 */
class m180511_154840_create_member_salary_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('member_salary', [
            'id' => $this->primaryKey(),
            'member_id'=>$this->integer()->notNull(),
            'aum'=>$this->decimal(10,2)->notNull(),
            'date'=>$this->date()->notNull(),
            'comment'=>$this->string(150)->null(),
            'create_date'=>$this->dateTime()->notNull(),
            'update_date'=>$this->dateTime()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('member_salary');
    }
}
