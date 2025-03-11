<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%counter}}`.
 */
class m250123_115020_create_counter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%counter}}', [
            'id' => $this->primaryKey(),
            'users' => $this->string(),
            'period' => $this->string(),
            'count' => $this->integer(),
            'status' => $this->integer(),
            'order' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%counter_text}}', [
            'id' => $this->primaryKey(),
            'counter_id' => $this->integer()->notNull(),
            'language' => $this->string(10)->notNull(),
            'users' => $this->string(),
            'period' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-counter_text-counter_id',
            '{{%counter_text}}',
            'counter_id',
            '{{%counter}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-counter_text-counter_id', '{{%counter_text}}');
        $this->dropTable('{{%counter_text}}');
        $this->dropTable('{{%counter}}');
    }
}
