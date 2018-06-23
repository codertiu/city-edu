<?php

use yii\db\Migration;

/**
 * Class m180623_175723_add_mark_table
 */
class m180623_175723_add_mark_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('mark', 'absent', $this->integer(1)->null());
        $this->addColumn('mark', 'mark_type', $this->integer(1)->notNull());
        $this->addColumn('mark', 'dislike', $this->integer()->null());
        $this->addColumn('mark', 'group_id', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180623_175723_add_mark_table cannot be reverted.\n";
        $this->dropColumn('mark', 'absent');
        $this->dropColumn('mark', 'mark_type');
        $this->dropColumn('mark', 'dislike');
        $this->dropColumn('mark', 'group_id');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180623_175723_add_mark_table cannot be reverted.\n";

        return false;
    }
    */
}
