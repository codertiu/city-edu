<?php

use yii\db\Migration;

/**
 * Class m180326_151424_add_reception
 */
class m180326_151424_add_reception extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('reception', 'phone2', $this->string()->null());
        $this->addColumn('reception', 'phone3', $this->string()->null());
        $this->addColumn('reception', 'phone4', $this->string()->null());
        $this->addColumn('reception', 'surname', $this->string()->null());
        $this->addColumn('reception', 'language', $this->integer(1)->defaultValue('1')->null());
        $this->addColumn('reception', 'lavel', $this->string()->null());
        $this->addColumn('reception', 'dob', $this->date()->null());
        $this->addColumn('reception', 'comfortable_time', $this->string()->null());

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180326_151424_add_reception cannot be reverted.\n";
        $this->dropColumn('reception', 'phone2');
        $this->dropColumn('reception', 'phone3');
        $this->dropColumn('reception', 'phone4');
        $this->dropColumn('reception', 'surname');
        $this->dropColumn('reception', 'language');
        $this->dropColumn('reception', 'lavel');
        $this->dropColumn('reception', 'dob');
        $this->dropColumn('reception', 'comfortable_time');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180326_151424_add_reception cannot be reverted.\n";

        return false;
    }
    */
}
