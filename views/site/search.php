<?php

use yii\helpers\Url;

use yii\widgets\LinkPager;

?>

<div class="col-md-8">

    <div style="text-align: center" >

        <h2>Search by tag (<?= $search ?>)</h2>

    </div>

    <?php foreach ($articles as $article): ?>

        <article class="post">

            <div class="post-thumb">

                <a href="<?= Url::toRoute(['/view', 'id'=>$article->id]) ?>"><img class="img-index" src="<?= $article->getImage() ?>" alt=""></a>

            </div>

            <div class="post-content">

                <header class="entry-header text-center text-uppercase">

                    <h6><a href="<?= Url::toRoute(['/topic', 'id'=>$article->topic->id]) ?>"> <?= $article->topic->name; ?></a></h6>

                    <h1 class="entry-title"><a href="<?= Url::toRoute(['/view', 'id'=>$article->id]) ?>"><?= $article->title; ?></a></h1>

                </header>

                <div class="entry-content">

                    <p><?= mb_strimwidth($article->description,0, 360, "..."); ?>

                    </p>

                    <div class="btn-continue-reading text-center text-uppercase">

                        <a href="<?= Url::toRoute(['/view', 'id'=>$article->id]) ?>" class="more-link">Continue Reading</a>

                    </div>

                </div>

                <div class="social-share">

                    <span class="social-share-title pull-left text-capitalize">By <?= $article->user->name; ?> On <?= $article->getDate(); ?></span>

                    <ul class="text-center pull-right">

                        <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li>

                        <?= (int)$article->viewed; ?>

                    </ul>

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