<?php

use yii\db\Migration;

/**
 * Handles the creation of table `coming`.
 */
class m180204_123758_create_coming_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('coming', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('coming');
    }
}
