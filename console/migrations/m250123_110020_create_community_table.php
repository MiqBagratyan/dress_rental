<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%community}}`.
 */
class m250123_110020_create_community_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%community}}', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
            'image' => $this->string(),
            'status' => $this->integer(),
            'order' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%community_text}}', [
            'id' => $this->primaryKey(),
            'community_id' => $this->integer()->notNull(),
            'language' => $this->string(10)->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey(
            'fk-community_text-community_id',
            '{{%community_text}}',
            'community_id',
            '{{%community}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-community_text-community_id', '{{%community_text}}');
        $this->dropTable('{{%community_text}}');
        $this->dropTable('{{%community}}');
    }
}
