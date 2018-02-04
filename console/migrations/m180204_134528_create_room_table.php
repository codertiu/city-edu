<?php

use yii\db\Migration;

/**
 * Handles the creation of table `room`.
 */
class m180204_134528_create_room_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('room', [
            'id' => $this->primaryKey(),
            'edu_center_id' => $this->integer()->notNull(),
            'room' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('room');
    }
}
