<?php

use yii\db\Migration;

/**
 * Handles the creation of table `instance`.
 */
class m180204_124525_create_instance_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('instance', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('instance');
    }
}
