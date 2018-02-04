<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sub_std_status`.
 */
class m180204_134110_create_sub_std_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sub_std_status', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('sub_std_status');
    }
}
