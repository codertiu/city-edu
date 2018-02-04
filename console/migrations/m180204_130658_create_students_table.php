<?php

use yii\db\Migration;

/**
 * Handles the creation of table `students`.
 */
class m180204_130658_create_students_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('students', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(255)->notNull(),
            'tel' => $this->string(35)->unique()->notNull(),
            'gendar' => $this->integer()->notNull(),
            'address' => $this->string(255)->notNull(),
            'member_id' => $this->integer()->null(),
            'reg_date' => $this->integer()->notNull(),
            'edu_center_id' => $this->integer()->notNull(),
            'active' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('students');
    }
}
