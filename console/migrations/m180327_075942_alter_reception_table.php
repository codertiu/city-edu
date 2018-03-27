<?php

use yii\db\Migration;

/**
 * Class m180327_075942_alter_reception_table
 */
class m180327_075942_alter_reception_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->alterColumn('reception', 'create_date', $this->dateTime());
        $this->alterColumn('reception', 'update_date', $this->dateTime());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180327_075942_alter_reception_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180327_075942_alter_reception_table cannot be reverted.\n";

        return false;
    }
    */
}
