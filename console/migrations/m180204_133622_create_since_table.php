<?php

use yii\db\Migration;

/**
 * Handles the creation of table `since`.
 */
class m180204_133622_create_since_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('since', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('since');
    }
}
