<?php

use yii\helpers\Html;
use app\models\Topic;
use app\models\User;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Article $model */

$this->title = 'Update Article: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'topics' => ArrayHelper::map(Topic::find()->all(),'id','name'),
        'users' => ArrayHelper::map(User::find()->all(),'id','name')
    ]) ?>

</div>
