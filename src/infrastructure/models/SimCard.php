<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "sim_cards".
 *
 * @property int $id
 * @property string $mobile_number
 * @property int $provider_id
 * @property int|null $owner_id
 *
 * @property DeviceSimCard[] $deviceSimCards
 * @property Consumer $owner
 * @property Provider $provider
 */
class SimCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sim_cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mobile_number', 'provider_id'], 'required'],
            [['provider_id', 'owner_id'], 'default', 'value' => null],
            [['provider_id', 'owner_id'], 'integer'],
            [['mobile_number'], 'string', 'max' => 255],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consumer::class, 'targetAttribute' => ['owner_id' => 'id']],
            [['provider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provider::class, 'targetAttribute' => ['provider_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile_number' => 'Mobile Number',
            'provider_id' => 'Provider ID',
            'owner_id' => 'Owner ID',
        ];
    }

    /**
     * Gets query for [[DeviceSimCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeviceSimCards()
    {
        return $this->hasMany(DeviceSimCard::class, ['sim_card_id' => 'id']);
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Consumer::class, ['id' => 'owner_id']);
    }

    /**
     * Gets query for [[Provider]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(Provider::class, ['id' => 'provider_id']);
    }
}
