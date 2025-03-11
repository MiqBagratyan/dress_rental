<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%slider}}`.
 */
class m250122_105643_create_slider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%slider}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
            'image' => $this->string(),
            'sale_price' => $this->integer(),
            'status' => $this->integer(),
            'order' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%slider_text}}', [
            'id' => $this->primaryKey(),
            'slider_id' => $this->integer()->notNull(),
            'language' => $this->string(10)->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-slider_text-slider_id',
            '{{%slider_text}}',
            'slider_id',
            '{{%slider}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-slider_text-slider_id', '{{%slider_text}}');
        $this->dropTable('{{%slider_text}}');
        $this->dropTable('{{%slider}}');
    }
}
