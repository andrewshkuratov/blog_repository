<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1 class="title"><?= Html::encode($this->title) ?></h1>

    <p>
        This website was made as a group project for Object-oriented Web Development course. </br>
        Project team:</br> 
        <p style="margin-left: 50px;">Bekker Dmytro;</br>Kiptenko Bogdan;</br>Shkuratov Andrew</p>
    </p>

</div>
