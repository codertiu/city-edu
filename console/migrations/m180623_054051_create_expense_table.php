<?php

use yii\db\Migration;

/**
 * Handles the creation of table `expense`.
 */
class m180623_054051_create_expense_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('expense', [
            'id' => $this->primaryKey(),
            'speciality'=>$this->string()->notNull(),
            'sum'=>$this->decimal(10,2)->notNull(),
            'date'=>$this->date()->notNull(),
            'comment'=>$this->string()->null(),
            'type_pay_id'=>$this->integer(1)->notNull(),
            'expense_category_id'=>$this->integer()->notNull(),
            'create_date'=>$this->dateTime(),
            'update_date'=>$this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('expense');
    }
}
