<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "consumers".
 *
 * @property int $id
 * @property string $full_name
 *
 * @property ConsumerApartment[] $consumerApartments
 * @property Device[] $devices
 * @property SimCard[] $simCards
 */
class Consumer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consumers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name'], 'required'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
        ];
    }

    /**
     * Gets query for [[ConsumerApartments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsumerApartments()
    {
        return $this->hasMany(ConsumerApartment::class, ['consumer_id' => 'id']);
    }

    /**
     * Gets query for [[Devices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDevices()
    {
        return $this->hasMany(Device::class, ['owner_id' => 'id']);
    }

    /**
     * Gets query for [[SimCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSimCards()
    {
        return $this->hasMany(SimCard::class, ['owner_id' => 'id']);
    }
}
