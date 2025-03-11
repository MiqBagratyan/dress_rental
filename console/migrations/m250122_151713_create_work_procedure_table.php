<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%work_procedure}}`.
 */
class m250122_151713_create_work_procedure_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%work_procedure}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'name' => $this->string(),
            'description' => $this->string(),
            'image' => $this->string(),
            'status' => $this->integer(),
            'order' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%work_procedure_text}}', [
            'id' => $this->primaryKey(),
            'work_procedure_id' => $this->integer()->notNull(),
            'language' => $this->string(10)->notNull(),
            'title' => $this->string(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-work_procedure_text-work_procedure_id',
            '{{%work_procedure_text}}',
            'work_procedure_id',
            '{{%work_procedure}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-work_procedure_text-work_procedure_id', '{{%work_procedure_text}}');
        $this->dropTable('{{%work_procedure_text}}');
        $this->dropTable('{{%work_procedure}}');
    }
}
