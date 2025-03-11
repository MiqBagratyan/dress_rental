<?php

use yii\db\Migration;

/**
 * Class m250124_095525_add_multilingual_to_product
 */
class m250124_095525_add_multilingual_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
        ]);

        $this->createTable('{{%product_lang}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'language' => $this->string(10)->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);

        $this->addForeignKey(
            'fk-product_lang-product_id',
            '{{%product_lang}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product_lang-product_id', '{{%product_lang}}');
        $this->dropTable('{{%product_lang}}');
        $this->dropTable('{{%product}}');
    }
}
