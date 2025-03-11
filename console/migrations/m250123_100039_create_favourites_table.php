<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favourites}}`.
 */
class m250123_100039_create_favourites_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favourites}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'style' => $this->string(),
            'price' => $this->integer(),
            'image' => $this->string(),
            'status' => $this->integer(),
            'order' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createTable('{{%favourites_text}}', [
            'id' => $this->primaryKey(),
            'favourite_id' => $this->integer()->notNull(),
            'language' => $this->string(10)->notNull(),
            'name' => $this->string(),
            'style' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-favourites_text-favourite_id',
            '{{%favourites_text}}',
            'favourite_id',
            '{{%favourites}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-favourites_text-favourite_id', '{{%favourites_text}}');
        $this->dropTable('{{%favourites_text}}');
        $this->dropTable('{{%favourites}}');
    }
}
