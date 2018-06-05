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
        $this->addColumn('contract', 'type_contract_id', $this->integer(1)->notNull());
        $this->addColumn('contract', 'fio', $this->string(150)->null());
        $this->addColumn('contract', 'pass_seria', $this->string(2)->null());
        $this->addColumn('contract', 'pass_number', $this->string(10)->null());
        $this->addColumn('contract', 'from', $this->string(150)->null());
        $this->addColumn('contract', 'address', $this->string(150)->null());
        $this->addColumn('contract', 'work', $this->string(150)->null());
        $this->addColumn('contract', 'phone1', $this->string(20)->notNull());
        $this->addColumn('contract', 'phone2', $this->string(20)->null());
        $this->addColumn('contract', 'phone3', $this->string(20)->null());
        $this->addColumn('contract', 'email', $this->string(50)->null());
        $this->addColumn('contract', 'title', $this->string(50)->null());
        $this->addColumn('contract', 'bill', $this->string(150)->null());
        $this->addColumn('contract', 'b', $this->string(150)->null());
        $this->addColumn('contract', 'inn', $this->string(20)->unique()->null());
        $this->addColumn('contract', 'okohx', $this->string(25)->unique()->null());
        $this->addColumn('contract', 'mfo', $this->string(50)->null());
        $this->addColumn('contract', 'license', $this->string(150)->null());
        $this->addColumn('contract', 'director', $this->string(150)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180530_051518_add_contract_table cannot be reverted.\n";
        $this->dropColumn('contract', 'type_contract_id');
        $this->dropColumn('contract', 'fio');
        $this->dropColumn('contract', 'pass_seria');
        $this->dropColumn('contract', 'pass_number');
        $this->dropColumn('contract', 'from');
        $this->dropColumn('contract', 'address');
        $this->dropColumn('contract', 'work');
        $this->dropColumn('contract', 'phone1');
        $this->dropColumn('contract', 'phone2');
        $this->dropColumn('contract', 'phone3');
        $this->dropColumn('contract', 'email');
        $this->dropColumn('contract', 'title');
        $this->dropColumn('contract', 'bill');
        $this->dropColumn('contract', 'b');
        $this->dropColumn('contract', 'inn');
        $this->dropColumn('contract', 'okohx');
        $this->dropColumn('contract', 'okohx');
        $this->dropColumn('contract', 'mfo');
        $this->dropColumn('contract', 'license');
        $this->dropColumn('contract', 'director');
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
