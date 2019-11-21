<main class="page__main page__main--publication">
    <div class="container">
        <?php if($post_id !== null) : ?>
        <?php foreach ($post_cards as $post_card): ?>
        <h1 class="page__title page__title--publication"><?= $post_card['title']; ?></h1>
        <section class="post-details">
            <h2 class="visually-hidden">Публикация</h2>
            <div class="post-details__wrapper post-<?= $post_card['icon_class']; ?>">
                <div class="post-details__main-block post post--details">
                    <?php switch ($post_card['icon_class']) {
                        case 'text':
                            echo (include_template('open_cards/text_card.php', ['post_card' => $post_card]));
                            break;
                        case 'photo':
                            echo (include_template('open_cards/photo_card.php', ['post_card' => $post_card]));
                            break;
                        case 'quote':
                            echo (include_template('open_cards/quote_card.php', ['post_card' => $post_card]));
                            break;
                        case 'video':
                            echo (include_template('open_cards/video_card.php', ['post_card' => $post_card]));
                            break;
                        case 'link':
                            echo (include_template('open_cards/link_card.php', ['post_card' => $post_card]));
                            break;
                    };
                    ?>

              </div>
            <?php endforeach; ?>
            <div class="post-details__user user">
                <div class="post-details__user-info user__info">
                    <div class="post-details__avatar user__avatar">
                        <a class="post-details__avatar-link user__avatar-link" href="#">
                            <img class="post-details__picture user__picture" src="img/userpic-elvira.jpg" alt="Аватар пользователя">
                        </a>
                    </div>
                    <div class="post-details__name-wrapper user__name-wrapper">
                        <a class="post-details__name user__name" href="#">
                            <span>Эльвира Хайпулинова</span>
                        </a>
                        <time class="post-details__time user__time" datetime="2014-03-20">5 лет на сайте</time>
                    </div>
                </div>
                <div class="post-details__rating user__rating">
                    <p class="post-details__rating-item user__rating-item user__rating-item--subscribers">
                        <span class="post-details__rating-amount user__rating-amount">1856</span>
                        <span class="post-details__rating-text user__rating-text">подписчиков</span>
                    </p>
                    <p class="post-details__rating-item user__rating-item user__rating-item--publications">
                        <span class="post-details__rating-amount user__rating-amount">556</span>
                        <span class="post-details__rating-text user__rating-text">публикаций</span>
                    </p>
                </div>
                <div class="post-details__user-buttons user__buttons">
                    <button class="user__button user__button--subscription button button--main" type="button">Подписаться</button>
                    <a class="user__button user__button--writing button button--green" href="#">Сообщение</a>
                </div>
            </div>
            </div>

        </section>
        <?php endif; ?>
    </div>
</main>
