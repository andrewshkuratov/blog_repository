<?php

namespace app\models;

use Yii;

use yii\base\Model;

use yii\data\Pagination;

class SearchForm extends Model

{

    public $text;

    public function rules()

    {

        return [

            [['text'], 'required']

        ];

    }

    public function SearchAtricle($pageSize = 5){

        $query = Article::find()->andWhere(['like', 'tag','%' . $this->text . '%', false]);

        $count = $query->count();

// create a pagination object with the total count

        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);

// limit the query using the pagination and retrieve the articles

        $articles = $query->offset($pagination->offset)

            ->limit($pagination->limit)

            ->all();

        $data['articles'] = $articles;

        $data['pagination'] = $pagination;

        return $data;

    }

}