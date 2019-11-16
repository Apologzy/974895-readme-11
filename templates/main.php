<div class="container">
    <h1 class="page__title page__title--popular">Популярное</h1>
</div>

<div class="popular container">
    <div class="popular__filters-wrapper">
        <div class="popular__sorting sorting">
            <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
            <ul class="popular__sorting-list sorting__list">
                <li class="sorting__item sorting__item--popular">
                    <a class="sorting__link sorting__link--active" href="#">
                        <span>Популярность</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Лайки</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Дата</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>

        <div class="popular__filters filters">
            <b class="popular__filters-caption filters__caption">Тип контента:</b>
            <ul class="popular__filters-list filters__list">
                <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
                    <a class="filters__button filters__button--ellipse filters__button--all filters__button--active" href="#">
                        <span>Все</span>
                    </a>
                </li>
                <?php foreach ($content_types as $content_type): ?>
                    <?php $content_id = $_GET['content_id'] ?? 'all'; ?>
                <li class="popular__filters-item filters__item">
                    <?php if($content_id == $content_type['id']) : ?>
                    <a class="filters__button filters__button--active filters__button--<?=$content_type['icon_class']; ?>button" href="/index.php?content_id=<?=$content_type['id']; ?>">
                        <?php else : ?>
                    <a class="filters__button filters__button--<?=$content_type['icon_class']; ?>button" href="/index.php?content_id=<?=$content_type['id']; ?>">
                        <?php endif; ?>
                        <span class="visually-hidden"><?=$content_type['field_name']; ?></span>
                        <svg class="filters__icon" width="22" height="18">
                            <use xlink:href="#icon-filter-<?=$content_type['icon_class']; ?>"></use>
                        </svg>
                    </a>
                </li>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>
        <?php if($content_id == 1) : ?>
        <?php $post_cards = get_post_assoc($con, $content_id); ?>
        <?php foreach ($post_cards as $post_card): ?>
        <div class="popular__posts">

            <article class="popular__post post post-text">
                <header class="post__header">
                    <h2><a href="/post.php?post_id=<?=$post_card['content_id']; ?>"><?=$post_card['title'];?></a></h2>
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
        </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if($content_id == 2) : ?>
         <?php $post_cards = get_post_assoc($con, $content_id); ?>
         <?php foreach ($post_cards as $post_card): ?>
            <article class="popular__post post post-photo">
                    <header class="post__header">
                        <h2><a href="/post.php?post_id=<?=$post_card['id']; ?>"><?=$post_card['title'];?></a></h2>
                    </header>
                    <div class="post__main">
                        <div class="post-photo__image-wrapper">
                            <img src="img/<?=$post_card['img'];?>" alt="Фото от пользователя" width="360" height="240">
                        </div>
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
         <?php endforeach; ?>
        <?php endif; ?>
        <?php if($content_id == 3) : ?>
        <?php $post_cards = get_post_assoc($con, $content_id); ?>
        <?php foreach ($post_cards as $post_card): ?>
            <article class="popular__post post post-quote">
                <header class="post__header">
                    <h2><a href="/post.php?post_id=<?=$post_card['id']; ?>"><?=$post_card['title'];?></a></h2>
                </header>
                <div class="post__main">
                    <blockquote>
                        <p>
                            <?=getContent($post_card['content'], 300) ?>
                        </p>
                        <?php if (mb_strlen($post_card['content']) > 300): ?>
                            <div class="post-quote__more-link-wrapper">
                                <a class="post-quote__more-link" href="#">Читать далее</a>
                            </div>
                        <?php endif; ?>
                        <cite><?=$post_card['autor'];?></cite>
                    </blockquote>
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
        <?php endforeach; ?>
    <?php endif; ?>
        <?php if($content_id == 5) : ?>
        <?php $post_cards = get_post_assoc($con, $content_id); ?>
        <?php foreach ($post_cards as $post_card): ?>
            <article class="popular__post post post-link">
                <header class="post__header">
                    <h2><a href="/post.php?post_id=<?=$post_card['id']; ?>"><?=$post_card['title'];?></a></h2>
                </header>
                <div class="post__main">
                    <div class="post-link__wrapper">
                        <a class="post-link__external" href="<?=$post_card['link'];?>" title="Перейти по ссылке">
                            <div class="post-link__info-wrapper">
                                <div class="post-link__info">
                                    <h3><?=$post_card['content'];?></h3>
                                </div>
                            </div>
                            <span><?=$post_card['link'];?></span>
                        </a>
                    </div>
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
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if ($content_id == null) : ?>
    <?php foreach ($cleaned_post as $post): ?>
        <div class="popular__posts">
            <?php if ($post['icon_class'] == 'text'): ?>
                <article class="popular__post post post-text">
                    <header class="post__header">
                        <h2><a href="/post.php?post_id=<?=$post['id']; ?>"><?=$post['title'];?></a></h2>
                    </header>
                    <div class="post__main">
                        <p>
                            <?=getContent($post['content'], 300) ?>
                        </p>
                        <?php if (mb_strlen($post['content']) > 300): ?>
                            <div class="post-text__more-link-wrapper">
                                <a class="post-text__more-link" href="#">Читать далее</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <footer class="post__footer">
                        <div class="post__author">
                            <a class="post__author-link" href="#" title="Автор">
                                <div class="post__avatar-wrapper">
                                    <img class="post__author-avatar" src="img/<?=$post['avatar'];?>"
                                         alt="Аватар пользователя">
                                </div>
                                <div class="post__info">
                                    <b class="post__author-name"><?=$post['login'];?></b>
                                    <time class="post__time" datetime="<?= $post['date_original']; ?>" title="<?= $post['date_russian']; ?>"><?= $post['date_rel']; ?></time>
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
            <?php elseif ($post['icon_class'] == 'link'): ?>
                <article class="popular__post post post-link">
                    <header class="post__header">
                        <h2><a href="/post.php?post_id=<?=$post['id']; ?>"><?=$post['title'];?></a></h2>
                    </header>
                    <div class="post__main">
                        <div class="post-link__wrapper">
                            <a class="post-link__external" href="<?=$post['link'];?>" title="Перейти по ссылке">
                                <div class="post-link__info-wrapper">
                                    <div class="post-link__info">
                                        <h3>HTML Academy</h3>
                                    </div>
                                </div>
                                <span><?=$post['link'];?></span>
                            </a>
                        </div>
                    </div>
                    <footer class="post__footer">
                        <div class="post__author">
                            <a class="post__author-link" href="#" title="Автор">
                                <div class="post__avatar-wrapper">
                                    <img class="post__author-avatar" src="img/<?=$post['avatar'];?>"
                                         alt="Аватар пользователя">
                                </div>
                                <div class="post__info">
                                    <b class="post__author-name"><?=$post['login'];?></b>
                                    <time class="post__time" datetime="<?= $post['date_original']; ?>" title="<?= $post['date_russian']; ?>"><?= $post['date_rel']; ?></time>
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
            <?php elseif ($post['icon_class'] == 'photo'): ?>
                <article class="popular__post post post-photo">
                    <header class="post__header">
                        <h2><a href="/post.php?post_id=<?=$post['id']; ?>"><?=$post['title'];?></a></h2>
                    </header>
                    <div class="post__main">
                        <div class="post-photo__image-wrapper">
                            <img src="img/<?=$post['img'];?>" alt="Фото от пользователя" width="360" height="240">
                        </div>
                    </div>
                    <footer class="post__footer">
                        <div class="post__author">
                            <a class="post__author-link" href="#" title="Автор">
                                <div class="post__avatar-wrapper">
                                    <img class="post__author-avatar" src="img/<?=$post['avatar'];?>"
                                         alt="Аватар пользователя">
                                </div>
                                <div class="post__info">
                                    <b class="post__author-name"><?=$post['login'];?></b>
                                    <time class="post__time" datetime="<?= $post['date_original']; ?>" title="<?= $post['date_russian']; ?>"><?= $post['date_rel']; ?></time>
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
            <?php elseif ($post['icon_class'] == 'quote'): ?>
                <article class="popular__post post post-quote">
                    <header class="post__header">
                        <h2><a href="/post.php?post_id=<?=$post['id']; ?>"><?=$post['title'];?></a></h2>
                    </header>
                    <div class="post__main">
                        <blockquote>
                            <p>
                                <?=getContent($post['content'], 300) ?>
                            </p>
                            <?php if (mb_strlen($post['content']) > 300): ?>
                                <div class="post-quote__more-link-wrapper">
                                    <a class="post-quote__more-link" href="#">Читать далее</a>
                                </div>
                            <?php endif; ?>
                            <cite><?=$post['autor'];?></cite>
                        </blockquote>
                    </div>
                    <footer class="post__footer">
                        <div class="post__author">
                            <a class="post__author-link" href="#" title="Автор">
                                <div class="post__avatar-wrapper">
                                    <img class="post__author-avatar" src="img/<?=$post['avatar'];?>"
                                         alt="Аватар пользователя">
                                </div>
                                <div class="post__info">
                                    <b class="post__author-name"><?=$post['login'];?></b>
                                    <time class="post__time" datetime="<?= $post['date_original']; ?>" title="<?= $post['date_russian']; ?>"><?= $post['date_rel']; ?></time>
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
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
