<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%consumers}}`.
 */
class m240321_143804_create_consumers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%consumers}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%consumers}}');
    }
}
