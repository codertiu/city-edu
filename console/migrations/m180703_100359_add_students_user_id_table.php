<?php

use yii\db\Migration;

/**
 * Class m180703_100359_add_students_user_id_table
 */
class m180703_100359_add_students_user_id_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('students', 'user_id', $this->integer()->null());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180703_100359_add_students_user_id_table cannot be reverted.\n";
        $this->dropColumn('students', 'user_id');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180703_100359_add_students_user_id_table cannot be reverted.\n";

        return false;
    }
    */
}
