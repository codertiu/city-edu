<?php

use yii\db\Migration;

/**
 * Class m180507_151819_add_reception_table
 */
class m180507_151819_add_reception_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('reception', 'type_of_reg', $this->integer(1)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180507_151819_add_reception_table cannot be reverted.\n";
        $this->dropColumn('reception', 'type_of_reg');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180507_151819_add_reception_table cannot be reverted.\n";

        return false;
    }
    */
}
