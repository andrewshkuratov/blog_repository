<?php

use yii\helpers\Url;

use yii\widgets\LinkPager;

?>

<div class="col-md-8">

    <?php foreach ($articles as $article): ?>

        <article class="post post-list">

            <div class="row">

                <div class="col-md-6">

                    <div class="post-thumb">

                        <a href="<?= Url::toRoute(['/view', 'id'=>$article->id]) ?>">
<img class="img-topic" src="<?= $article->getImage() ?>" alt="" class="pull-left"></a>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="post-content">

                        <header class="entry-header text-uppercase">

                            <h6><a href="<?= Url::toRoute(['/topic', 'id'=>$article->topic->id]) ?>"> 
<?= $article->topic->name; ?></a></h6>

                            <h1 class="entry-title"><a href="<?= Url::toRoute(['/view', 'id'=>$article->id]) ?>">
<?= $article->title; ?></a></h1>

                        </header>

                        <div class="entry-content">

                            <p><?= substr($article->description,0, 360) . '...'; ?>

                            </p>

                        </div>

                        <div class="social-share">

                            <span class="social-share-title pull-left text-capitalize">By <?= $article->user->name; ?> On 
<?= $article->getDate(); ?></span>

                        </div>

                    </div>

                </div>

            </div>

        </article>

    <?php endforeach; ?>

    <?php

    echo LinkPager::widget([

        'pagination' => $pagination,

    ]);

    ?>

</div>

<?php

echo \Yii::$app->view->renderFile('@app/views/site/right.php', compact('popular','recent','topics'));

?>