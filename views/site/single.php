<?php use yii\helpers\Url; ?>
<div class="col-md-8">
    <article class="post">

    <div class="post-thumb">
        <a href="blog.html"><?= $article->title; ?></a>
            </a>
        </div>

        <div class="post-content">
            <header class="entry-header text-center text-uppercase">
                <h6>
                <a href="<?= Url::toRoute(['/topic', 'id' => $article->topic->id]) ?>"> <?= $article->topic->name; ?></a>
                </h6>
                <h1 class="entry-title"><a href="blog.html"><?= $article->title; ?></a></h1>
            </header>

            <div class="entry-content">
                <?= $article->description; ?>
            </div>

            <div class="decoration">
                <?php foreach (preg_split("/[\s,]+/", $article->tag) as $tag): ?>
                    <a href="/search?SearchForm[text]=<?= str_replace('#', '', $tag) ?>"
                    class="btn btn-default"><?= $tag ?></a>
                <?php endforeach; ?>
            </div>

            <div class="social-share">
                <span class="social-share-title pull-left text-capitalize">By <?= $article->user->name; ?> On <?= $article->getDate(); ?></span>
                <ul class="text-center pull-right">
                    <li><a class="s-facebook"
                    href="https://www.facebook.com/sharer/sharer.php?u=<?= Url::base('http'); ?>"><i
                    class="fa fa-facebook"></i></a></li>

                    <li><a class="s-twitter" href="https://twitter.com/intent/tweet?url=<?= Url::base('http'); ?>"><i
                    class="fa fa-twitter"></i></a></li>
                        
                    <li><a class="s-google-plus" href="https://plus.google.com/share?url=<?= Url::base('http'); ?>"><i
                    class="fa fa-google-plus"></i></a></li>

                    <li><a class="s-linkedin"
                    href="http://www.linkedin.com/shareArticle?mini=true&url=<?= Url::base('http'); ?>"><i
                    class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="leave-comment"><!--leave comment-->
            <h4>Leave a reply</h4>
            <form class="form-horizontal contact-form" role="form" method="post" action="#">
                <div class="form-group">
                    <div class="col-md-12"> <textarea rows="3" cols="90" name="text"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn send-btn">Post Comment</button>
            </form>
        </div><!--end leave comment-->
        <div class="comments-block">
            <div class="comment-block">
                <div class="comment">
                    <a href="#" class="comment-img">
                        <img class="img-round" src="" alt="image">
                    </a>
                    <div class="comment-body">
                        <div class="comment-top">
                            <button class="replay btn pull-right" onclick=""> Replay
                            </button>
                            <h5>Stas 2</h5>
                            <p class="comment-date">
                                20-09-06
                            </p>
                        </div>
                        <div class="comment-text">
                            Text
                        </div>
                        <div class="comment-delete">
                            <button type="submit">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="replay-comment" hidden>
                    <div class="leave-comment-child"><!--leave comment-->
                        <h4>Leave a reply for Іефі</h4>
                        <div class="form-group">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Post Comment</button>
                    </div><!--end leave comment-->
                </div>
                <div class="comment-childs-container">
                    <div class="comment-childs">
                        <div class="comment-block">
                            <div class="comment">
                                <a href="#" class="comment-img">
                                    <img class="img-round" src="" alt="image">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-top">
                                        <h5>Stas</h5>
                                        <p class="comment-date">
                                            2020-08-09
                                        </p>
                                    </div>
                                    <div class="comment-text">
                                        Text
                                    </div>
                                    <div class="comment-delete">
                                        <button type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>

<?php echo \Yii::$app->view->renderFile('@app/views/site/right.php', compact('popular','recent','topics'));?>