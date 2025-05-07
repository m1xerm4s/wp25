<?php
$img = get_field('image_404','options');
?>
<section class="rs-error-block rs-error-block-3">
    <div class="rs-error-block__container">
        <div class="rs-error-block__img">
            <img src="<?=$img?>" alt="">
        </div>
        <div class="rs-error-block__description">
            <h1><?=get_field('title_404','options')?></h1>
            <h6><?=get_field('subtitle_404','options')?></h6>
            <a href="/" class="rs-btn _btn-primary">Вернуться на главную</a>
        </div>
    </div>
</section>
