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
            'name' => $this->string(255)->notNull(),
            'surname'=>$this->string(255)->notNull(),
            'tel' => $this->string(35)->unique()->notNull(),
            'phone2'=>$this->string(25)->null(),
            'phone3'=>$this->string(25)->null(),
            'phone4'=>$this->string(25)->null(),
            'gendar' => $this->integer()->notNull(),
            'address' => $this->string(255)->notNull(),
            'member_id' => $this->integer()->null(),
            'reg_date' => $this->dateTime()->notNull(),
            'edu_center_id' => $this->integer()->notNull(),
            'image' => $this->string(255)->null(),
            'file' => $this->string(255)->null(),
            'pass_file' => $this->string(255)->null(),
            'email' => $this->string(255)->Null(),
            'dob'=>$this->date()->notNull(),
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
