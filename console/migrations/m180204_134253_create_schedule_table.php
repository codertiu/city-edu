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
            'edu_center_id' => $this->integer()->notNull(),
            'group_id' => $this->integer()->notNull(),
            'day_id' => $this->integer()->notNull(),
            'time' => $this->string()->notNull(),
            'room_id' => $this->integer()->notNull(),
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
