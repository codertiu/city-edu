<?php

use yii\db\Migration;

/**
 * Class m180701_061313_table_profit_table
 */
class m180701_061313_table_profit_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profit', [
            'id' => $this->primaryKey(),
            'date'=>$this->date()->notNull(),
            'students_id'=>$this->integer()->notNull(),
            'profit_category_id'=>$this->integer()->notNull(),
            'sum'=>$this->decimal(10,2)->notNull(),
            'type_pay_id'=>$this->integer()->notNull(),
            'comment'=>$this->string(255)->notNull(),
            'create_date'=>$this->dateTime(),
            'update_date'=>$this->dateTime()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180701_061313_table_profit_table cannot be reverted.\n";
        $this->dropTable('profit');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180701_061313_table_profit_table cannot be reverted.\n";

        return false;
    }
    */
}
