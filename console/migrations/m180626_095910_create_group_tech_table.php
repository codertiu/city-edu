<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group_tech`.
 */
class m180626_095910_create_group_tech_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group_tech', [
            'id' => $this->primaryKey(),
            'teacher_id'=>$this->integer()->notNull(),
            'group_id'=>$this->integer()->notNull(),
            'type_of_studay'=>$this->integer()->notNull(),
            'status'=>$this->integer(1)->notNull(),
            'create_date'=>$this->dateTime(),
            'update_date'=>$this->dateTime()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('group_tech');
    }
}
