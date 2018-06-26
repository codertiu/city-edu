<?php

use yii\db\Migration;

/**
 * Class m180623_201537_add_contract_table
 */
class m180623_201537_add_contract_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('contract', 'bux', $this->string()->null());
        $this->addColumn('contract', 'bring_date', $this->string()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180623_201537_add_contract_table cannot be reverted.\n";
        $this->dropColumn('contract', 'bux');
        $this->dropColumn('contract', 'bring_date');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180623_201537_add_contract_table cannot be reverted.\n";

        return false;
    }
    */
}
