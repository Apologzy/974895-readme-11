<div class="container">
    <h1 class="page__title page__title--popular">Популярное</h1>
</div>
<?php foreach ($content_types as $content_type): ?>
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
                <?php if ($content_type['icon_class'] == 'photo'): ?>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--photo button" href="/index.php?content_id=<?=$content_type['id']; ?>">
                        <span class="visually-hidden">Фото</span>
                        <svg class="filters__icon" width="22" height="18">
                            <use xlink:href="#icon-filter-photo"></use>
                        </svg>
                    </a>
                </li>

                <?php elseif ($content_type['icon_class'] == 'video'): ?>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--video button" href="/index.php?content_id=<?=$content_type['id']; ?>">
                        <span class="visually-hidden">Видео</span>
                        <svg class="filters__icon" width="24" height="16">
                            <use xlink:href="#icon-filter-video"></use>
                        </svg>
                    </a>
                </li>

                <?php elseif ($content_type['icon_class'] == 'text'): ?>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--text button" href="/index.php?content_id=<?=$content_type['id']; ?>">
                        <span class="visually-hidden">Текст</span>
                        <svg class="filters__icon" width="20" height="21">
                            <use xlink:href="#icon-filter-text"></use>
                        </svg>
                    </a>
                </li>

                <?php elseif ($content_type['icon_class'] == 'quote'): ?>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--quote button" href="/index.php?content_id=<?=$content_type['id']; ?>">
                        <span class="visually-hidden">Цитата</span>
                        <svg class="filters__icon" width="21" height="20">
                            <use xlink:href="#icon-filter-quote"></use>
                        </svg>
                    </a>
                </li>

                <?php elseif ($content_type['icon_class'] == 'link'): ?>
                <li class="popular__filters-item filters__item">
                    <a class="filters__button filters__button--link button" href="/index.php?content_id=<?=$content_type['id']; ?>">
                        <span class="visually-hidden">Ссылка</span>
                        <svg class="filters__icon" width="21" height="18">
                            <use xlink:href="#icon-filter-link"></use>
                        </svg>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <?php endforeach; ?>
    <?php foreach ($cleaned_post as $post): ?>
        <div class="popular__posts">
            <?php if ($post['icon_class'] == 'text'): ?>
                <article class="popular__post post post-text">
                    <header class="post__header">
                        <h2><a href="#"><?=$post['title'];?></a></h2>
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
                        <h2><a href="#"><?=$post['title'];?></a></h2>
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
                        <h2><a href="#"><?=$post['title'];?></a></h2>
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
                        <h2><a href="#"><?=$post['title'];?></a></h2>
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
</div>
