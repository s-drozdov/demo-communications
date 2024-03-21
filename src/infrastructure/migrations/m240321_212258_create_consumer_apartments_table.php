<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%consumer_apartments}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%consumers}}`
 * - `{{%apartments}}`
 */
class m240321_212258_create_consumer_apartments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%consumer_apartments}}', [
            'id' => $this->primaryKey(),
            'consumer_id' => $this->integer()->notNull(),
            'apartment_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `consumer_id`
        $this->createIndex(
            '{{%idx-consumer_apartments-consumer_id}}',
            '{{%consumer_apartments}}',
            'consumer_id'
        );

        // add foreign key for table `{{%consumers}}`
        $this->addForeignKey(
            '{{%fk-consumer_apartments-consumer_id}}',
            '{{%consumer_apartments}}',
            'consumer_id',
            '{{%consumers}}',
            'id',
            'CASCADE'
        );

        // creates index for column `apartment_id`
        $this->createIndex(
            '{{%idx-consumer_apartments-apartment_id}}',
            '{{%consumer_apartments}}',
            'apartment_id'
        );

        // add foreign key for table `{{%apartments}}`
        $this->addForeignKey(
            '{{%fk-consumer_apartments-apartment_id}}',
            '{{%consumer_apartments}}',
            'apartment_id',
            '{{%apartments}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%consumers}}`
        $this->dropForeignKey(
            '{{%fk-consumer_apartments-consumer_id}}',
            '{{%consumer_apartments}}'
        );

        // drops index for column `consumer_id`
        $this->dropIndex(
            '{{%idx-consumer_apartments-consumer_id}}',
            '{{%consumer_apartments}}'
        );

        // drops foreign key for table `{{%apartments}}`
        $this->dropForeignKey(
            '{{%fk-consumer_apartments-apartment_id}}',
            '{{%consumer_apartments}}'
        );

        // drops index for column `apartment_id`
        $this->dropIndex(
            '{{%idx-consumer_apartments-apartment_id}}',
            '{{%consumer_apartments}}'
        );

        $this->dropTable('{{%consumer_apartments}}');
    }
}
