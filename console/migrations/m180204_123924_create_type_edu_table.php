<?php

use yii\db\Migration;

/**
 * Handles the creation of table `type_edu`.
 */
class m180204_123924_create_type_edu_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('type_edu', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('type_edu');
    }
}
