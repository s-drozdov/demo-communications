<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%owners}}`.
 */
class m240321_143804_create_owners_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%owners}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%owners}}');
    }
}
