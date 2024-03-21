<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartments}}`.
 */
class m240321_212038_create_apartments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartments}}', [
            'id' => $this->primaryKey(),
            'address' => $this->string()->unique()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apartments}}');
    }
}
