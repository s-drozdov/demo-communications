<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "apartment_providers".
 *
 * @property int $id
 * @property int $apartment_id
 * @property int $provider_id
 *
 * @property Apartment $apartment
 * @property Provider $provider
 */
class ApartmentProvider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartment_providers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apartment_id', 'provider_id'], 'required'],
            [['apartment_id', 'provider_id'], 'default', 'value' => null],
            [['apartment_id', 'provider_id'], 'integer'],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::class, 'targetAttribute' => ['apartment_id' => 'id']],
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
            'apartment_id' => 'Apartment ID',
            'provider_id' => 'Provider ID',
        ];
    }

    /**
     * Gets query for [[Apartment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartment()
    {
        return $this->hasOne(Apartment::class, ['id' => 'apartment_id']);
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
