<?php

use yii\db\Migration;

/**
 * Handles the creation of table `students_info`.
 */
class m180508_121521_create_students_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('students_info', [
            'id' => $this->primaryKey(),
            'students_id'=>$this->integer()->notNull(),
            'language'=>$this->integer(2)->notNull(),
            'lavel'=>$this->integer(1)->notNull(),
            'time'=>$this->string(100)->notNull(),
            'study_type'=>$this->integer(1)->notNull(),
            'comfortable_time'=>$this->integer(1)->notNull(),
            'type_edu_id'=>$this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('students_info');
    }
}
