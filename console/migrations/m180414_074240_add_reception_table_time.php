<?php

use yii\db\Migration;

/**
 * Class m180414_074240_add_reception_table_time
 */
class m180414_074240_add_reception_table_time extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('reception', 'time', $this->string()->null());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180414_074240_add_reception_table_time cannot be reverted.\n";
        $this->dropColumn('reception', 'time');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180414_074240_add_reception_table_time cannot be reverted.\n";

        return false;
    }
    */
}
