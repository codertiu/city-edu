<?php

use yii\db\Migration;

/**
 * Class m180419_174321_add_reception_table_study_type
 */
class m180419_174321_add_reception_table_study_type extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('reception', 'study_type', $this->integer(1)->null());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180419_174321_add_reception_table_study_type cannot be reverted.\n";
        $this->dropColumn('reception', 'study_type');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180419_174321_add_reception_table_study_type cannot be reverted.\n";

        return false;
    }
    */
}
