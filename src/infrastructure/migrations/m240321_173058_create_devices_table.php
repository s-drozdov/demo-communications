<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%devices}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%device_models}}`
 * - `{{%consumers}}`
 */
class m240321_173058_create_devices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%devices}}', [
            'id' => $this->primaryKey(),
            'device_model_id' => $this->integer()->notNull(),
            'consumer_id' => $this->integer(),
            'isOn' => $this->boolean()->notNull()->defaultValue(false),
        ]);

        // creates index for column `device_model_id`
        $this->createIndex(
            '{{%idx-devices-device_model_id}}',
            '{{%devices}}',
            'device_model_id'
        );

        // add foreign key for table `{{%device_models}}`
        $this->addForeignKey(
            '{{%fk-devices-device_model_id}}',
            '{{%devices}}',
            'device_model_id',
            '{{%device_models}}',
            'id',
            'CASCADE'
        );

        // creates index for column `consumer_id`
        $this->createIndex(
            '{{%idx-devices-consumer_id}}',
            '{{%devices}}',
            'consumer_id'
        );

        // add foreign key for table `{{%consumers}}`
        $this->addForeignKey(
            '{{%fk-devices-consumer_id}}',
            '{{%devices}}',
            'consumer_id',
            '{{%consumers}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%device_models}}`
        $this->dropForeignKey(
            '{{%fk-devices-device_model_id}}',
            '{{%devices}}'
        );

        // drops index for column `device_model_id`
        $this->dropIndex(
            '{{%idx-devices-device_model_id}}',
            '{{%devices}}'
        );

        // drops foreign key for table `{{%consumers}}`
        $this->dropForeignKey(
            '{{%fk-devices-consumer_id}}',
            '{{%devices}}'
        );

        // drops index for column `consumer_id`
        $this->dropIndex(
            '{{%idx-devices-consumer_id}}',
            '{{%devices}}'
        );

        $this->dropTable('{{%devices}}');
    }
}
