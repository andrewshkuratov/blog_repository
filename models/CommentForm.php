<?php

namespace app\models;

use Yii;

use yii\base\Model;

class CommentForm extends Model

{

    public $comment;

    public function rules()

    {

        return [

            [['comment'], 'required']

        ];

    }

    public function saveComment($article_id, $comment_id)

    {

        $comment = new Comment;

        $comment->text = $this->comment;

        $comment->user_id = Yii::$app->user->id;

        $comment->article_id = $article_id;

        if($comment_id != null){

            $comment->comment_id = $comment_id;

        }

        $comment->date = date('Y-m-d');

        return $comment->save();

    }

}