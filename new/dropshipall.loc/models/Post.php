<?php

namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%posts}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Category $category
 * @property  $viewUrl
 */
class Post extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%posts}}';
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
            [['category_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'content'], 'string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }


    public static function getOtherPosts()
    {
        $otherPosts = self::find()->where(['IS', 'category_id', null])->all();
        $items = [];
        foreach ($otherPosts as $otherPost) {
            $items[] = [
                'label' => $otherPost->title,
                'icon' => 'circle-o',
                'url' => ['site/post/'.$otherPost->id]
            ];
        }
        return $items;
    }

    public function getViewUrl()
    {
        return Url::toRoute([
            '/faq/post',
            'category' => $this->category_id,
            'id' => $this->id
        ]);
    }

}
