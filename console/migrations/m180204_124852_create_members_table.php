<?php

use yii\db\Migration;

/**
 * Handles the creation of table `members`.
 */
class m180204_124852_create_members_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('members', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(255)->notNull(),
            'tel' => $this->string(35)->unique()->notNull(),
            'address' => $this->string(255)->notNull(),
            'about' => $this->text()->Null(),
            'gendar' => $this->integer(1)->notNull(),
            'edu_center_id' => $this->integer()->notNull(),
            'active' => $this->integer()->defaultValue('1')->notNull(),
            'img' => $this->string(255)->notNull(),
            'file' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('members');
    }
}
