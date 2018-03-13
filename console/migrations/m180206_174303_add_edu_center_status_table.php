<?php

use yii\db\Migration;

/**
 * Class m180206_174303_add_edu_center_status_table
 */
class m180206_174303_add_edu_center_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('edu_center', 'active', $this->integer(1)->defaultValue('1')->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180206_174303_add_edu_center_status_table cannot be reverted.\n";
        $this->dropColumn('edu_center', 'active');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180206_174303_add_edu_center_status_table cannot be reverted.\n";

        return false;
    }
    */
}
