<?php

namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 * @property int $sort
 *
 * @property Category[] $childCategories
 * @property Post[] $posts
 * @property  $viewUrl
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    public static function allCategories()
    {
        return Category::find()->select(['title', 'id'])
            ->indexBy('id')->column();
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
            [['title', 'description'], 'string'],
            [['created_at', 'updated_at', 'parent_id', 'sort'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'parent_id' => 'Parent category',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getMenuPosts()
    {
        $items = [];
        foreach ($this->posts as $post) {
            $items[] = [
                'label' => $post->title,
                'icon' => 'circle-o',
                'url' => ['site/post/' . $post->id]
            ];
        }
        return $items;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['category_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentCategory()
    {
        return $this->hasOne(self::class, ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildCategories()
    {
        return $this->hasMany(self::class, ['parent_id' => 'id']);
    }

    public function getViewUrl()
    {
        return Url::toRoute(['/faq/category', 'id' => $this->id]);
    }

}
