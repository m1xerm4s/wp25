<?php
$img = get_field('image_404','options');
$elem = get_field('image_404_btn','options');
?>
<section class="rs-error-block rs-error-block-1">
    <div class="rs-error-block__container">
        <div class="rs-error-block__img">
            <img src="<?=$img?>" alt="">
        </div>
        <div class="rs-error-block__description">
            <h1><?=get_field('title_404','options')?></h1>
            <h6><?=get_field('subtitle_404','options')?></h6>
        </div>

        <div class="rs-error-block__field">
            <img src="<?= $elem?>" alt="">
            <form class="form"
                  role="search"
                  method="get"
                  action="<?php echo home_url('/') ?>">
                <div class="form__block">
                    <div class="form__row">
                        <div class="form__line">
                            <label class="rs-input-placeholder">Введите информацию</label>
                            <input type="text" autocomplete="off" name="s" id="s_err"  required class="rs-input" value="<?php echo get_search_query() ?>">
                            <button type="button" class="rs-input-clear">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M12.7342 1.2749C12.65 1.19052 12.55 1.12358 12.4399 1.0779C12.3298 1.03223 12.2117 1.00872 12.0925 1.00872C11.9733 1.00872 11.8553 1.03223 11.7452 1.0779C11.6351 1.12358 11.535 1.19052 11.4508 1.2749L7 5.71663L2.54916 1.26579C2.4649 1.18153 2.36486 1.11468 2.25476 1.06908C2.14466 1.02347 2.02665 1 1.90748 1C1.78831 1 1.6703 1.02347 1.5602 1.06908C1.4501 1.11468 1.35006 1.18153 1.26579 1.26579C1.18153 1.35006 1.11468 1.4501 1.06908 1.5602C1.02347 1.6703 1 1.78831 1 1.90748C1 2.02665 1.02347 2.14466 1.06908 2.25476C1.11468 2.36486 1.18153 2.4649 1.26579 2.54916L5.71663 7L1.26579 11.4508C1.18153 11.5351 1.11468 11.6351 1.06908 11.7452C1.02347 11.8553 1 11.9733 1 12.0925C1 12.2117 1.02347 12.3297 1.06908 12.4398C1.11468 12.5499 1.18153 12.6499 1.26579 12.7342C1.35006 12.8185 1.4501 12.8853 1.5602 12.9309C1.6703 12.9765 1.78831 13 1.90748 13C2.02665 13 2.14466 12.9765 2.25476 12.9309C2.36486 12.8853 2.4649 12.8185 2.54916 12.7342L7 8.28337L11.4508 12.7342C11.5351 12.8185 11.6351 12.8853 11.7452 12.9309C11.8553 12.9765 11.9733 13 12.0925 13C12.2117 13 12.3297 12.9765 12.4398 12.9309C12.5499 12.8853 12.6499 12.8185 12.7342 12.7342C12.8185 12.6499 12.8853 12.5499 12.9309 12.4398C12.9765 12.3297 13 12.2117 13 12.0925C13 11.9733 12.9765 11.8553 12.9309 11.7452C12.8853 11.6351 12.8185 11.5351 12.7342 11.4508L8.28337 7L12.7342 2.54916C13.0801 2.20329 13.0801 1.62077 12.7342 1.2749Z"
                                            fill="#000" />
                                </svg>
                            </button>
                        </div>
                        <div class="form__button">
                            <button type="submit" class="rs-btn _btn-primary"><?php echo esc_html__( 'Найти','rosait' ) ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
