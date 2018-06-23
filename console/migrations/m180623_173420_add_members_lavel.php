<?php

use yii\db\Migration;

/**
 * Class m180623_173420_add_members_lavel
 */
class m180623_173420_add_members_lavel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('group', 'lavel', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180623_173420_add_members_lavel cannot be reverted.\n";
        $this->dropColumn('group', 'lavel');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180623_173420_add_members_lavel cannot be reverted.\n";

        return false;
    }
    */
}
