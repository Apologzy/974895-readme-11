<article class="popular__post post post-text">
    <header class="post__header">
        <h2><a href="/post.php?post_id=<?=$post_card['id']; ?>"><?=$post_card['title'];?></a></h2>
    </header>
    <div class="post__main">
        <p>
            <?=getContent($post_card['content'], 300) ?>
        </p>
        <?php if (mb_strlen($post_card['content']) > 300): ?>
            <div class="post-text__more-link-wrapper">
                <a class="post-text__more-link" href="#">Читать далее</a>
            </div>
        <?php endif; ?>
    </div>
    <footer class="post__footer">
        <div class="post__author">
            <a class="post__author-link" href="#" title="Автор">
                <div class="post__avatar-wrapper">
                    <img class="post__author-avatar" src="img/<?=$post_card['avatar'];?>"
                         alt="Аватар пользователя">
                </div>
                <div class="post__info">
                    <b class="post__author-name"><?=$post_card['login'];?></b>
                    <time class="post__time" datetime="<?= $post_card['dt_create']; ?>" title="<?= $post_card['dt_create']; ?>"><?= $post_card['dt_create']; ?></time>
                </div>
            </a>
        </div>
        <div class="post__indicators">
            <div class="post__buttons">
                <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                    <svg class="post__indicator-icon" width="20" height="17">
                        <use xlink:href="#icon-heart"></use>
                    </svg>
                    <svg class="post__indicator-icon post__indicator-icon--like-active" width="20"
                         height="17">
                        <use xlink:href="#icon-heart-active"></use>
                    </svg>
                    <span>250</span>
                    <span class="visually-hidden">количество лайков</span>
                </a>
                <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                    <svg class="post__indicator-icon" width="19" height="17">
                        <use xlink:href="#icon-comment"></use>
                    </svg>
                    <span>25</span>
                    <span class="visually-hidden">количество комментариев</span>
                </a>
            </div>
        </div>
    </footer>
</article>
