<?php

use yii\db\Migration;

/**
 * Handles the creation of table `schedule`.
 */
class m180204_134253_create_schedule_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('schedule', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'day_id' => $this->integer()->notNull(),
            'teacher_id'=>$this->integer()->notNull(),
            'begin_time' => $this->time()->notNull(),
            'end_time'=>$this->time()->notNull(),
            'room_id' => $this->integer()->notNull(),
            'active'=>$this->integer(1)->defaultValue(1)->notNull(),
            'create_date'=>$this->dateTime()->notNull(),
            'update_date'=>$this->dateTime()->notNull(),
            'since_id'=>$this->integer()->notNull(),
            'type_of_study'=>$this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('schedule');
    }
}
