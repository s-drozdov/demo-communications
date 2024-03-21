<?php

use yii\db\Migration;
use yii\helpers\ArrayHelper;

/**
 * Class m240321_173828_seed_providers_table
 */
class m240321_173828_seed_providers_table extends Migration
{
    private const TABLE_NAME = '{{%providers}}';

    private const BASIC_PROVIDERS = [
        [
            'code' => 'tele2',
            'title' => 'Теле2',
        ],
        [
            'code' => 'dream_sim',
            'title' => 'DreamSim',
        ],
        [
            'code' => 'global_sim',
            'title' => 'GlobalSim',
        ],
        [
            'code' => 'orange',
            'title' => 'Orange',
        ],
        [
            'code' => 'vodafone',
            'title' => 'Vodafone',
        ],
        [
            'code' => 'o2',
            'title' => 'O2',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach (self::BASIC_PROVIDERS as $value) {
            $this->insert(static::TABLE_NAME, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $codes = ArrayHelper::getColumn(self::BASIC_PROVIDERS, 'code');

        foreach ($codes as $code) {
            $this->delete(static::TABLE_NAME, ['code' => $code]);
        }

    }
}
