<?php

use yii\db\Migration;

/**
 * Handles the creation of table `students_pay`.
 */
class m180429_052237_create_students_pay_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('students_pay', [
            'id' => $this->primaryKey(),
            'pay_date'=>$this->date()->notNull(),
            'contract_id'=>$this->integer()->notNull(),
            'students_id'=>$this->integer()->notNull(),
            'sum'=>$this->decimal(10,2)->notNull(),
            'for_month'=>$this->integer(2)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('students_pay');
    }
}
