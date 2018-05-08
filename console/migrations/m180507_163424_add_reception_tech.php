<?php

use yii\db\Migration;

/**
 * Class m180507_163424_add_reception_tech
 */
class m180507_163424_add_reception_tech extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('reception_tech', 'ban', $this->integer(1)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180507_163424_add_reception_tech cannot be reverted.\n";
        $this->dropColumn('reception', 'ban');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180507_163424_add_reception_tech cannot be reverted.\n";

        return false;
    }
    */
}
