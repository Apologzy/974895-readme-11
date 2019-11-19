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
                    <a class="filters__button filters__button--ellipse filters__button--all filters__button--active" href="/index.php">
                        <span>Все</span>
                    </a>
                </li>
                <?php foreach ($content_types as $content_type): ?>
                    <?php $content_id = $_GET['content_id'] ?? null; ?>
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

        <div class="popular__posts">
            <?php foreach ($post_cards as $post_card): ?>
                <?php switch ($post_card['content_id']) {
                    case 1:
                        echo (include_template('post_cards/text_card.php', ['post_card' => $post_card]));
                        break;
                    case 2:
                        echo (include_template('post_cards/photo_card.php', ['post_card' => $post_card]));
                        break;
                    case 3:
                        echo (include_template('post_cards/quote_card.php', ['post_card' => $post_card]));
                        break;
                    case 4:
                        echo (include_template('post_cards/video_card.php', ['post_card' => $post_card]));
                        break;
                    case 5:
                        echo (include_template('post_cards/link_card.php', ['post_card' => $post_card]));
                        break;
                };
                ?>

            <?php endforeach; ?>
        </div>
</div>
