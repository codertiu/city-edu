<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reception`.
 */
class m180204_120838_create_reception_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('reception', [
            'id' => $this->primaryKey(),
            'edu_center_id' => $this->integer()->notNull(),
            'name' => $this->string(255)->notNull(),
            'tel' => $this->string(35)->unique()->notNull(),
            'coming_id' => $this->integer()->notNull(),
            'type_edu_id' => $this->integer()->notNull(),
            'date_coming' => $this->dateTime()->notNull(),
            'creater' => $this->integer()->notNull(),
            'create_date' => $this->integer()->notNull(),
            'update_date' => $this->integer()->notNull(),
            'instance_id' => $this->integer()->notNull(),
            'comment_id' => $this->integer()->Null(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('reception');
    }
}
