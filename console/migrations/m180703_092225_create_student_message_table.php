<?php

use yii\db\Migration;

/**
 * Handles the creation of table `student_message`.
 */
class m180703_092225_create_student_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('student_message', [
            'id' => $this->primaryKey(),
            'student_id'=>$this->integer()->notNull(),
            'content'=>$this->text()->notNull(),
            'type_message'=>$this->integer(1)->notNull(),
            'create_date'=>$this->dateTime(),
            'status'=>$this->integer(1)->notNull(),
            'answer'=>$this->text()->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('student_message');
    }
}
