<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sub_students`.
 */
class m180204_133723_create_sub_students_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sub_students', [
            'id' => $this->primaryKey(),
            'students_id' => $this->integer()->notNull(),
            'begin_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notull(),
            'group_id' => $this->integer()->notNull(),
            'sub_std_status_id' => $this->integer()->notNull(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sub_students');
    }
}
