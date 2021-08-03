<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%plan_features}}".
 *
 * @property int $id
 * @property int $plan_id
 * @property int $feature_id
 *
 * @property Feature $feature
 * @property Plan $plan
 */
class PlanFeature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%plan_features}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id', 'feature_id'], 'integer'],
            [['feature_id'], 'exist', 'skipOnError' => true, 'targetClass' => Feature::class, 'targetAttribute' => ['feature_id' => 'id']],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::class, 'targetAttribute' => ['plan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plan_id' => 'Plan ID',
            'feature_id' => 'Feature ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeature()
    {
        return $this->hasOne(Feature::class, ['id' => 'feature_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::class, ['id' => 'plan_id']);
    }
}
