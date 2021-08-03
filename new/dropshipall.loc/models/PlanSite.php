<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%plan_sites}}".
 *
 * @property int $id
 * @property int $plan_id
 * @property int $site_id
 *
 * @property Plan $plan
 * @property AvailableSite $site
 */
class PlanSite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%plan_sites}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plan_id', 'site_id'], 'integer'],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Plan::class, 'targetAttribute' => ['plan_id' => 'id']],
            [['site_id'], 'exist', 'skipOnError' => true, 'targetClass' => AvailableSite::class, 'targetAttribute' => ['site_id' => 'id']],
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
            'site_id' => 'Site ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(Plan::class, ['id' => 'plan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSite()
    {
        return $this->hasOne(AvailableSite::class, ['id' => 'site_id']);
    }
}
