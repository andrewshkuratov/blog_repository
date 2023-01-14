<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $date
 * @property string|null $image
 * @property string|null $tag
 * @property int|null $viewed
 * @property int|null $topic_id
 * @property int|null $user_id
 *
 * @property Comment[] $comments
 * @property Topic $topic
 * @property User $user
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','description','tag','topic_id','user_id'], 'required'],
            [['title','description'], 'string'],
            [['date'], 'date', 'format'=>'php:Y-m-d'],
            [['date'], 'default', 'value'=>date('Y-m-d')],
            [['viewed'], 'default', 'value'=>0],
            [['viewed', 'topic_id', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['topic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Topic::className(), 'targetAttribute' => ['topic_id' => 'id']],
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
            'date' => 'Date',
            'image' => 'Image',
            'tag' => 'Tag',
            'viewed' => 'Viewed',
            'topic_id' => 'Topic ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['article_id' => 'id']);
    }

    /**
     * Gets query for [[Topic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTopic()
    {
        return $this->hasOne(Topic::class, ['id' => 'topic_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function saveImage($filename){

        $this->image = $filename;
    
        return $this->save(false);
    
    }

    public function deleteImage() {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }
    
    public function beforeDelete() {
        $this->deleteImage();
        return parent::beforeDelete();
    }

    public function getImage() {
        if($this->image) {
            return '/uploads/' . $this->image;
        }
        return '../no_image.png';
    }

    public function getDate(){

        return Yii::$app->formatter->asDate($this->date);
        
    }

    public function saveArticle()
{

    $this->user_id = Yii::$app->user->id;
    
    return $this->save();

}

public function viewedCounter()
{

    $this->viewed +=1;

    return $this->save(false);

}
}
