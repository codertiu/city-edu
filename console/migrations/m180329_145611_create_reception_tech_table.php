<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reception_tech`.
 */
class m180329_145611_create_reception_tech_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reception_tech', [
            'id' => $this->primaryKey(),
            'reception_id'=>$this->integer()->notNull(),
            'date'=>$this->dateTime()->notNull(),
            'member_id'=>$this->integer()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('reception_tech');
    }
}
