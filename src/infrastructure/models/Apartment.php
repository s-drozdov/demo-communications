<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "apartments".
 *
 * @property int $id
 * @property string $address
 *
 * @property ApartmentProvider[] $apartmentProviders
 * @property ConsumerApartment[] $consumerApartments
 */
class Apartment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apartments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'required'],
            [['address'], 'string', 'max' => 255],
            [['address'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[ApartmentProviders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApartmentProviders()
    {
        return $this->hasMany(ApartmentProvider::class, ['apartment_id' => 'id']);
    }

    /**
     * Gets query for [[ConsumerApartments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsumerApartments()
    {
        return $this->hasMany(ConsumerApartment::class, ['apartment_id' => 'id']);
    }
}
