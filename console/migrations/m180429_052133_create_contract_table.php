<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contract`.
 */
class m180429_052133_create_contract_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contract', [
            'id' => $this->primaryKey(),
            'students_id'=>$this->integer()->notNull(),
            'contract'=>$this->string(150)->unique()->notNull(),
            'sum'=>$this->decimal(10,2)->notNull(),
            'date'=>$this->date()->notNull(),
            'type_edu_id'=>$this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('contract');
    }
}
