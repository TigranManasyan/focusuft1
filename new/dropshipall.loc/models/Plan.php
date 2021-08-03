<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "plans".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property double $price
 * @property int $trial_days
 * @property int $created_at
 * @property int $updated_at
 * @property array $featureIds
 * @property array $siteIds
 * @property array $product_limit
 * @property array $variant_limit
 * @property array $review_limit
 * @property PlanFeature[] $planFeatures
 * @property PlanSite[] $planSites
 * @property Feature[] $features
 * @property AvailableSite[] $sites
 *
 */
class Plan extends \yii\db\ActiveRecord
{
    public $featureIds;
    public $siteIds;

    const PLAN_ACTIVE = 1;
    const PLAN_INACTIVE = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%plans}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trial_days', 'created_at', 'updated_at', 'product_limit', 'variant_limit', 'review_limit'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['featureIds', 'siteIds'], 'safe'],
            [['price'], 'number'],
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
            'description' => 'Description',
            'price' => 'Price',
            'trial_days' => 'Trial Days',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getPlans()
    {
        return self::find()->select(['name','id'])->indexBy('id')->column();
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanFeatures()
    {
        return $this->hasMany(PlanFeature::class, ['plan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeatures()
    {
        return $this->hasMany(Feature::class, ['id' => 'feature_id'])->via('planFeatures')->orderBy('sort');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeaturesIds()
    {
        return $this->hasMany(Feature::class, ['id' => 'feature_id'])->via('planFeatures')
            ->orderBy('sort')->select('id')->indexBy('id')->column();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['plan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanSites()
    {
        return $this->hasMany(PlanSite::class, ['plan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSites()
    {
        return $this->hasMany(AvailableSite::class, ['id' => 'site_id'])->via('planSites');
    }

    public function getSiteNames()
    {
        return implode(', ',$this->getSites()->select(['name'])->column());
    }

}
