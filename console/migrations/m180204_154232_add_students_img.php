<?php

use yii\db\Migration;

/**
 * Class m180204_154232_add_students_img
 */
class m180204_154232_add_students_img extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('students', 'image', $this->string(255)->null());
        $this->addColumn('students', 'file', $this->string(255)->null());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180204_154232_add_students_img cannot be reverted.\n";
        $this->dropColumn('students', 'image');
        $this->dropColumn('students', 'file');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180204_154232_add_students_img cannot be reverted.\n";

        return false;
    }
    */
}
