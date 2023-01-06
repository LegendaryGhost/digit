<p>
    <a href="?page=posts.add" class="btn btn-primary">Exprimez-vous ici</a>
</p>
<?php foreach($posts as $post): ?>
    <article>
        <h1><?= $post->user ?></h1>
        <p><em><?= $post->article_date . " " . $post->article_hour ?></em></p>
        <p><?= $post->content ?></p>
        <?php if(!is_null($post->image)): ?>
            <img src="<?= '..\\pictures\\' . $post->image ?>" alt="">
        <?php endif;  ?>
    </article>
<?php endforeach; ?>