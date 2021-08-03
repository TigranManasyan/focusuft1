<?php

namespace app\models;;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%videos}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $video_url
 * @property int $created_at
 * @property int $updated_at
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%videos}}';
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
            [['title', 'description', 'video_url'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
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
            'video_url' => 'Video Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getYoutubeId()
    {
        $url = $this->video_url;
        $url_string = parse_url($url, PHP_URL_QUERY);
        parse_str($url_string, $args);

        return isset($args['v']) ? $args['v'] : false;

    }
}
