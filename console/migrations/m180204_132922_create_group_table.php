<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group`.
 */
class m180204_132922_create_group_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'edu_center_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull()->unique(),
            'member_id' => $this->integer()->notNull(),
            'begin_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'group_status_id' => $this->integer()->notNull(),
            'comment' => $this->text()->null(),
            'since_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('group');
    }
}
