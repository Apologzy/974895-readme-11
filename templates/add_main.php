<main class="page__main page__main--adding-post">
    <div class="page__main-section">
        <div class="container">
            <h1 class="page__title page__title--adding-post">Добавить публикацию</h1>
        </div>
        <div class="adding-post container">
            <div class="adding-post__tabs-wrapper tabs">
                <div class="adding-post__tabs filters">
                    <ul class="adding-post__tabs-list filters__list tabs__list">
                        <?php foreach ($content_types as $content_type): ?>
                        <li class="adding-post__tabs-item filters__item">
                            <?php if($content_id == $content_type['id']) : ?>
                            <a class="adding-post__tabs-link filters__button filters__button--<?=$content_type['icon_class']; ?> filters__button--active tabs__item tabs__item--active button" href="/add.php?content_id=<?=$content_type['id']; ?>">
                                <svg class="filters__icon" width="22" height="18">
                                    <use xlink:href="#icon-filter-<?=$content_type['icon_class']; ?>"></use>
                                </svg>
                                <span><?=$content_type['field_name']; ?></span>
                            </a>
                            <?php else: ?>
                                <a class="adding-post__tabs-link filters__button filters__button--<?=$content_type['icon_class']; ?>  tabs__item  button" href="/add.php?content_id=<?=$content_type['id']; ?>">
                                    <svg class="filters__icon" width="22" height="18">
                                        <use xlink:href="#icon-filter-<?=$content_type['icon_class']; ?>"></use>
                                    </svg>
                                    <span><?=$content_type['field_name']; ?></span>
                                </a>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="adding-post__tab-content">

                        <?php switch ($content_id) {
                            case 1:
                                echo (include_template('add_posts/form_post_text.php', []));
                                break;
                            case 2:
                                echo (include_template('add_posts/form_post_photo.php', []));
                                break;
                            case 3:
                                echo (include_template('add_posts/form_post_quote.php', []));
                                break;
                            case 4:
                                echo (include_template('add_posts/form_post_video.php', []));
                                break;
                            case 5:
                                echo (include_template('add_posts/form_post_link.php', []));
                                break;
                        };
                        ?>

                </div>
            </div>
        </div>
    </div>
</main>
