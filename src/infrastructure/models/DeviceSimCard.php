<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "device_sim_cards".
 *
 * @property int $id
 * @property int $device_id
 * @property int $sim_card_id
 *
 * @property Device $device
 * @property SimCard $simCard
 */
class DeviceSimCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device_sim_cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['device_id', 'sim_card_id'], 'required'],
            [['device_id', 'sim_card_id'], 'default', 'value' => null],
            [['device_id', 'sim_card_id'], 'integer'],
            [['device_id'], 'exist', 'skipOnError' => true, 'targetClass' => Device::class, 'targetAttribute' => ['device_id' => 'id']],
            [['sim_card_id'], 'exist', 'skipOnError' => true, 'targetClass' => SimCard::class, 'targetAttribute' => ['sim_card_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'device_id' => 'Device ID',
            'sim_card_id' => 'Sim Card ID',
        ];
    }

    /**
     * Gets query for [[Device]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDevice()
    {
        return $this->hasOne(Device::class, ['id' => 'device_id']);
    }

    /**
     * Gets query for [[SimCard]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSimCard()
    {
        return $this->hasOne(SimCard::class, ['id' => 'sim_card_id']);
    }
}
