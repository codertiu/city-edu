<?php

use yii\db\Migration;

/**
 * Class m180508_065536_add_students_table
 */
class m180508_065536_add_students_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('students', 'reception_id', $this->integer()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180508_065536_add_students_table cannot be reverted.\n";
        $this->dropColumn('students', 'reception_id');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180508_065536_add_students_table cannot be reverted.\n";

        return false;
    }
    */
}
