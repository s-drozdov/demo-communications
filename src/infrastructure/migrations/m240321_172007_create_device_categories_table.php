<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device_categories}}`.
 */
class m240321_172007_create_device_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device_categories}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull()->unique(),
            'title' => $this->string()->notNull(),
            'is_network_hardware' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%device_categories}}');
    }
}
