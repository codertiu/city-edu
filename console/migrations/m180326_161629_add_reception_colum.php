<?php

use yii\db\Migration;

/**
 * Class m180326_161629_add_reception_colum
 */
class m180326_161629_add_reception_colum extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('reception', 'comment', $this->string()->null());

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180326_161629_add_reception_colum cannot be reverted.\n";
        $this->dropColumn('reception', 'comment');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180326_161629_add_reception_colum cannot be reverted.\n";

        return false;
    }
    */
}
