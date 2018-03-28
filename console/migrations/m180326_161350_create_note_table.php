<?php

use yii\db\Migration;

/**
 * Handles the creation of table `note`.
 */
class m180326_161350_create_note_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('note', [
            'id' => $this->primaryKey(),
            'reception_id'=>$this->integer()->notNull(),
            'create_date'=>$this->dateTime()->notNull(),
            'creator'=>$this->integer()->notNull(),
            'text'=>$this->string()->notNull(),
            'admin_name'=>$this->string()->notNull()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('note');
    }
}
