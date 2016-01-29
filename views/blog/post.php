<?php $view->script('post', 'blog:app/bundle/post.js', 'vue') ?>

<article class="uk-article tm-container-small">

    <?php

        // Todo
        $params['blog_alignment'] = true;

    ?>
    <div class="tm-article-border">

        <h1 class="uk-article-title uk-margin-small-bottom <?= ($params['blog_alignment']) ? 'uk-text-center' : '' ?>"><?= $post->title ?></h1>

        <p class="uk-article-meta uk-margin-small-top <?= ($params['blog_alignment']) ? 'uk-text-center' : '' ?>">
            <time datetime="<?=$post->date->format(\DateTime::W3C)?>" v-cloak>{{ "<?=$post->date->format(\DateTime::W3C)?>" | date "longDate" }}</time>
        </p>

    </div>

    <?php if ($image = $post->get('image.src')): ?>
    <img src="<?= $image ?>" alt="<?= $post->get('image.alt') ?>">
    <?php endif ?>

    <div class="uk-margin-large-top tm-container-mini">

        <?= $post->content ?>

        <p class="uk-article-meta">
            <?= __('Written by %name% on %date%', ['%name%' => $post->user->name, '%date%' => '<time datetime="'.$post->date->format(\DateTime::W3C).'" v-cloak>{{ "'.$post->date->format(\DateTime::W3C).'" | date "longDate" }}</time>' ]) ?>
        </p>

        <?= $view->render('blog/comments.php') ?>

    </div>

</article>
