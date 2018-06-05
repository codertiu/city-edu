<?php

use yii\db\Migration;

/**
 * Class m180601_115545_add_students_pay_table
 */
class m180601_115545_add_students_pay_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('students_pay', 'user_id', $this->integer()->notNull());
        $this->addColumn('students_pay', 'type_pay_id', $this->integer()->notNull());
        $this->addColumn('students_pay', 'currency_id', $this->integer()->notNull());
        $this->addColumn('students_pay', 'create_date', $this->timestamp()->null());
        $this->addColumn('students_pay', 'update_date', $this->timestamp()->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180601_115545_add_students_pay_table cannot be reverted.\n";
        $this->dropColumn('students_pay', 'user_id');
        $this->dropColumn('students_pay', 'type_pay_id');
        $this->dropColumn('students_pay', 'currency_id');
        $this->dropColumn('students_pay', 'create_date');
        $this->dropColumn('students_pay', 'update_date');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180601_115545_add_students_pay_table cannot be reverted.\n";

        return false;
    }
    */
}
