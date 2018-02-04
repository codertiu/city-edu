<?php

use yii\db\Migration;

/**
 * Handles the creation of table `group_status`.
 */
class m180204_133527_create_group_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('group_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('group_status');
    }
}
