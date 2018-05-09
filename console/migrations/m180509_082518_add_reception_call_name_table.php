<?php

use yii\db\Migration;

/**
 * Class m180509_082518_add_reception_call_name_table
 */
class m180509_082518_add_reception_call_name_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->addColumn('reception','call_name',$this->string(32)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180509_082518_add_reception_call_name_table cannot be reverted.\n";
            $this->dropColumn('reception','call_name');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180509_082518_add_reception_call_name_table cannot be reverted.\n";

        return false;
    }
    */
}
