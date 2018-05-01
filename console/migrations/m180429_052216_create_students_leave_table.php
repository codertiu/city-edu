<?php

use yii\db\Migration;

/**
 * Handles the creation of table `students_leave`.
 */
class m180429_052216_create_students_leave_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('students_leave', [
            'id' => $this->primaryKey(),
            'students_is'=>$this->integer()->notNull(),
            'comment_id'=>$this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('students_leave');
    }
}
