<?php

use yii\db\Migration;

/**
 * Class m180701_061333_table_profit_category_table
 */
class m180701_061333_table_profit_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('profit_category', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(150)->notNull(),
            'status'=>$this->integer(1)->defaultValue(1)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180701_061333_table_profit_category_table cannot be reverted.\n";
        $this->dropTable('profit_category');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180701_061333_table_profit_category_table cannot be reverted.\n";

        return false;
    }
    */
}
