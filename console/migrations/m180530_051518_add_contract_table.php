<?php

use yii\db\Migration;

/**
 * Class m180530_051518_add_contract_table
 */
class m180530_051518_add_contract_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'fio', $this->string(150)->null());
        $this->addColumn('contract', 'pass_seria', $this->string(2)->null());
        $this->addColumn('contract', 'pass_number', $this->string(10)->null());
        $this->addColumn('contract', 'from', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());
        $this->addColumn('contract', 'type_contract_id', $this->integer()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180530_051518_add_contract_table cannot be reverted.\n";
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        $this->dropColumn('contract','type_contract_id');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180530_051518_add_contract_table cannot be reverted.\n";

        return false;
    }
    */
}
