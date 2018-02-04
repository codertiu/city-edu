<?php

use yii\db\Migration;

/**
 * Handles the creation of table `edu_center`.
 */
class m180204_125701_create_edu_center_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('edu_center', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'address' => $this->string(255)->notNull(),
            'tel' => $this->string(35)->notNull(),
            'director' => $this->string(255)->notNull(),
            'inn' => $this->string(35)->notNull(),
            'checking_account' => $this->string(255)->notNull(),
            'mfo' => $this->string(35)->notNull(),
            'oked' => $this->string(35)->notNull(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('edu_center');
    }
}
