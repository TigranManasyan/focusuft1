<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%features}}".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 * @property string $icon
 * @property integer $sort
 * @property string $description
 * @property string $setting_key
 *
 * @property PlanFeature[] $planFeatures
 */
class Feature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%features}}';
    }

    public static function getFeauturesDescriptions()
    {
        return Feature::find()->select(['description', 'setting_key'])
            ->where(['NOT', ['setting_key' => null]])
            ->indexBy('setting_key')->column();

    }

    public static function getPlanSettingkeys($user)
    {
        if ($user->plan) {
            return $user->plan->getFeatures()
                ->where(['NOT', ['setting_key' => null]])
                ->select(['setting_key'])
                ->indexBy('setting_key')
                ->column();
        }
        return [];

    }

    public static function getAllFeatures()
    {
        return Feature::find()->all();
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['sort'], 'safe'],
            [['name', 'icon', 'description', 'setting_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanFeatures()
    {
        return $this->hasMany(PlanFeature::class, ['feature_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::class, ['id' => 'plan_id'])->via('planFeatures');
    }
}
