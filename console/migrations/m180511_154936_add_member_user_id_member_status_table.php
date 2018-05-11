<?php

use yii\db\Migration;

/**
 * Class m180511_154936_add_member_user_id_member_status_table
 */
class m180511_154936_add_member_user_id_member_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('members', 'user_id', $this->integer()->null());
        $this->addColumn('members', 'members_status', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180511_154936_add_member_user_id_member_status_table cannot be reverted.\n";
        $this->dropColumn('members', 'user_id');
        $this->dropColumn('members', 'members_status');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180511_154936_add_member_user_id_member_status_table cannot be reverted.\n";

        return false;
    }
    */
}
