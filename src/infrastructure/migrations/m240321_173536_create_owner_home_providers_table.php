<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%owner_home_providers}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%owners}}`
 * - `{{%providers}}`
 */
class m240321_173536_create_owner_home_providers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%owner_home_providers}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'provider_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `owner_id`
        $this->createIndex(
            '{{%idx-owner_home_providers-owner_id}}',
            '{{%owner_home_providers}}',
            'owner_id'
        );

        // add foreign key for table `{{%owners}}`
        $this->addForeignKey(
            '{{%fk-owner_home_providers-owner_id}}',
            '{{%owner_home_providers}}',
            'owner_id',
            '{{%owners}}',
            'id',
            'CASCADE'
        );

        // creates index for column `provider_id`
        $this->createIndex(
            '{{%idx-owner_home_providers-provider_id}}',
            '{{%owner_home_providers}}',
            'provider_id'
        );

        // add foreign key for table `{{%providers}}`
        $this->addForeignKey(
            '{{%fk-owner_home_providers-provider_id}}',
            '{{%owner_home_providers}}',
            'provider_id',
            '{{%providers}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%owners}}`
        $this->dropForeignKey(
            '{{%fk-owner_home_providers-owner_id}}',
            '{{%owner_home_providers}}'
        );

        // drops index for column `owner_id`
        $this->dropIndex(
            '{{%idx-owner_home_providers-owner_id}}',
            '{{%owner_home_providers}}'
        );

        // drops foreign key for table `{{%providers}}`
        $this->dropForeignKey(
            '{{%fk-owner_home_providers-provider_id}}',
            '{{%owner_home_providers}}'
        );

        // drops index for column `provider_id`
        $this->dropIndex(
            '{{%idx-owner_home_providers-provider_id}}',
            '{{%owner_home_providers}}'
        );

        $this->dropTable('{{%owner_home_providers}}');
    }
}
