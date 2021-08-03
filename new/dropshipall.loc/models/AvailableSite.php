<?php


namespace app\models;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%sites}}".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Product[] $products
 */
class AvailableSite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sites}}';
    }

    /**
     * {@inheritdoc}
     */
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
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
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
            'url' => 'Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getProducts()
    {
        return $this->hasMany(Product::class,['site_id' => 'id']);
    }

    public function getSiteProductsPercent($productsCount)
    {
        $siteProducts = $this->getProducts()->count();
        if(!$productsCount) {
            return 0;
        }
        $percent = round(100 * $siteProducts / $productsCount, 1);
        return $percent;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanSites()
    {
        return $this->hasMany(PlanSite::class, ['site_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::class, ['id' => 'plan_id'])->via('planSites');
    }
}
