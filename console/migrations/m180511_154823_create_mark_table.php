<?php

use yii\db\Migration;

/**
 * Handles the creation of table `mark`.
 */
class m180511_154823_create_mark_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('mark', [
            'id' => $this->primaryKey(),
            'date'=>$this->dateTime()->notNull(),
            'mark_status'=>$this->integer(2)->notNull(),
            'mark'=>$this->decimal(2,2)->notNull(),
            'member_id'=>$this->integer()->notNull(),
            'students_id'=>$this->integer()->notNull(),
            'comment'=>$this->string(150)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('mark');
    }
}
