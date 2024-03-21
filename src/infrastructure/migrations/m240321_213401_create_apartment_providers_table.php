<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartment_providers}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%providers}}`
 * - `{{%apartments}}`
 */
class m240321_213401_create_apartment_providers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apartment_providers}}', [
            'id' => $this->primaryKey(),
            'apartment_id' => $this->integer()->notNull(),
            'provider_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `provider_id`
        $this->createIndex(
            '{{%idx-apartment_providers-provider_id}}',
            '{{%apartment_providers}}',
            'provider_id'
        );

        // add foreign key for table `{{%providers}}`
        $this->addForeignKey(
            '{{%fk-apartment_providers-provider_id}}',
            '{{%apartment_providers}}',
            'provider_id',
            '{{%providers}}',
            'id',
            'CASCADE'
        );

        // creates index for column `apartment_id`
        $this->createIndex(
            '{{%idx-apartment_providers-apartment_id}}',
            '{{%apartment_providers}}',
            'apartment_id'
        );

        // add foreign key for table `{{%apartments}}`
        $this->addForeignKey(
            '{{%fk-apartment_providers-apartment_id}}',
            '{{%apartment_providers}}',
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
        // drops foreign key for table `{{%providers}}`
        $this->dropForeignKey(
            '{{%fk-apartment_providers-provider_id}}',
            '{{%apartment_providers}}'
        );

        // drops index for column `provider_id`
        $this->dropIndex(
            '{{%idx-apartment_providers-provider_id}}',
            '{{%apartment_providers}}'
        );

        // drops foreign key for table `{{%apartments}}`
        $this->dropForeignKey(
            '{{%fk-apartment_providers-apartment_id}}',
            '{{%apartment_providers}}'
        );

        // drops index for column `apartment_id`
        $this->dropIndex(
            '{{%idx-apartment_providers-apartment_id}}',
            '{{%apartment_providers}}'
        );

        $this->dropTable('{{%apartment_providers}}');
    }
}
