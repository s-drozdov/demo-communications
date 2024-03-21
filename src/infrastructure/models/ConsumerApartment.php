<?php

namespace app\src\infrastructure\models;

use Yii;

/**
 * This is the model class for table "consumer_apartments".
 *
 * @property int $id
 * @property int $consumer_id
 * @property int $apartment_id
 *
 * @property Apartment $apartment
 * @property Consumer $consumer
 */
class ConsumerApartment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consumer_apartments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['consumer_id', 'apartment_id'], 'required'],
            [['consumer_id', 'apartment_id'], 'default', 'value' => null],
            [['consumer_id', 'apartment_id'], 'integer'],
            [['apartment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apartment::class, 'targetAttribute' => ['apartment_id' => 'id']],
            [['consumer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consumer::class, 'targetAttribute' => ['consumer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'consumer_id' => 'Consumer ID',
            'apartment_id' => 'Apartment ID',
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
     * Gets query for [[Consumer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConsumer()
    {
        return $this->hasOne(Consumer::class, ['id' => 'consumer_id']);
    }
}
