<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table_expense_category`.
 */
class m180623_054737_create_table_expense_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('expense_category', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(255)->notNull(),
            'status'=>$this->integer(1)->notNull(),
            'create_date'=>$this->dateTime(),
            'update_date'=>$this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('table_expense_category');
    }
}
