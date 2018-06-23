<?php

use yii\db\Migration;

/**
 * Handles the creation of table `extra_mark`.
 */
class m180623_181634_create_extra_mark_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('extra_mark', [
            'id' => $this->primaryKey(),
            'member_id'=>$this->integer()->notNull(),
            'student_id'=>$this->integer()->notNull(),
            'date'=>$this->date()->notNull(),
            'mark'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('extra_mark');
    }
}
