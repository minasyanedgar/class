<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 */
class m190307_080234_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'schedule_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%course}}');
    }
}
