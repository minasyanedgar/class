<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%schedule}}`.
 */
class m190307_123753_create_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%schedule}}', [
            'id' => $this->primaryKey(),
            'day_1_start' => $this->string(6),
            'day_1_end' => $this->string(6),
            'day_2_start' => $this->string(6),
            'day_2_end' => $this->string(6),
            'day_3_start' => $this->string(6),
            'day_3_end' => $this->string(6),
            'day_4_start' => $this->string(6),
            'day_4_end' => $this->string(6),
            'day_5_start' => $this->string(6),
            'day_5_end' => $this->string(6)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%schedule}}');
    }
}
