<?php
defined("_Rosait2025") or die("Доступ запрещён");

// Блок «Адаптивная фотогалерея»
function rs_gallery($content,$key=0){
    add_action( 'wp_footer', 'rs_gallery_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $gallery = $content['items_gallery'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>"  class="rs-gallery rs-photo <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-gallery__container">
            <div class="section-header">
                <div class="section-header__title">
                    <?php if(!empty($content["blocks_title"])):?>
                    <h2><?=$content["blocks_title"]?></h2>
                    <?php endif; ?>
                    <?php if(!empty($content["description"])):?>
                        <p><?=$content["description"]?></p>
                    <?php endif; ?>
                </div>
            </div>
 <?php if(is_array($gallery)):?>
            <div class="rs-gallery__slider swiper">
                <div class="rs-gallery__swiper swiper-wrapper">
                   <?php foreach ($gallery as $item):?>
                    <?php if(is_array($item['image'])):?>
                        <?php foreach ($item['image'] as $img):?>
                        <div class="rs-gallery__slide swiper-slide rs-gallery__slide-<?=$item['size']?>">
                            <div class="rs-gallery__item">
                                <a href="<?=$img['url']?>" class="rs-gallery__link"
                                   data-fancybox="gallery-<?=$key?>">
                                    <div class="rs-gallery__img">
                                        <img src="<?=$img['url']?>" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                       <?php endforeach;?>
                       <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
    <?php endif;?>
        </div>
        <div class="cursor">
            <div class="cursor__point-zero">
                <div class="cursor__wrapper">
                    <div class="cursor__circle">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M28.0266 8.45553L8.93469 27.5474M28.0266 8.45553L28.0266 16.9408M28.0266 8.45553L19.5413 8.45553M8.93469 27.5474L8.93469 19.0621M8.93469 27.5474L17.42 27.5474"
                                stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }

//Блок «Фотогалерея c подписями»
function rs_slider_block($content,$key=0){
    add_action( 'wp_footer', 'rs_slider_block_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $gallery = $content['slider-block'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-slider-block <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-slider-block__block">
            <div class="rs-slider-block__container">
                <div class="section-header">
                    <div class="section-header__title">
                        <?php if(!empty($content["blocks_title"])):?>
                            <h2><?=$content["blocks_title"]?></h2>
                        <?php endif; ?>
                        <?php if(!empty($content["description"])):?>
                            <p><?=$content["description"]?></p>
                        <?php endif; ?>
                    </div>
                </div>
    <?php if(is_array($gallery)):?>
                <div class="rs-slider-block__slider swiper">
                    <div class="rs-slider-block__swiper swiper-wrapper">
                        <?php foreach ($gallery as $item): ?>
                        <div class="rs-slider-block__slide swiper-slide">
                            <div class="rs-slider-block__item">
                                <a href="<?=$item['image']?>"
                                   data-fancybox="gallery-<?=$key?>" class="rs-slider-block__link">
                                    <div class="rs-slider-block__img">
                                        <img src="<?=$item['image']?>" alt="">
                                    </div>
                                    <?php if(!empty($item['desc'])):?>
                                    <div class="rs-slider-block__desc">
                                        <h4><?=$item['desc']?></h4>
                                    </div>
                                    <?php endif;?>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="rs-slider-block__action swiper-action">
                        <div class="rs-slider-block__pagination swiper-pagination"></div>
                        <div class="rs-slider-block__navigation swiper-navigation">
                            <div class="rs-slider-block__button-prev swiper-button-prev">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 6L9 12L15 18" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 6L9 12L15 18" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="rs-slider-block__button-next swiper-button-next">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
    <?php endif;?>
            </div>
        </div>
    </section>
<?php }

//Блок «Логотипы клиентов»
function rs_partners($content,$key=0){
    add_action( 'wp_footer', 'rs_partners_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $gallery = $content['partners'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-partners <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-partners__container">
            <div class="section-header">
                <div class="section-header__title">
                    <?php if(!empty($content["blocks_title"])):?>
                        <h2><?=$content["blocks_title"]?></h2>
                    <?php endif; ?>
                    <?php if(!empty($content["description"])):?>
                        <p><?=$content["description"]?></p>
                    <?php endif; ?>
                </div>
            </div>
    <?php if(is_array($gallery)):?>
            <div class="rs-partners__slider swiper">
                <div class="rs-partners__swiper swiper-wrapper">
                <?php foreach ($gallery as $item): ?>
                    <div class="rs-partners__slide swiper-slide">
                        <img src="<?=$item['image']?>" alt="">
                    </div>
                <?php endforeach; ?>
                </div>
                <div class="rs-partners__action swiper-action">
                    <div class="rs-partners__pagination swiper-pagination"></div>
                    <div class="rs-partners__navigation swiper-navigation">
                        <div class="rs-partners__button-prev swiper-button-prev">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 6L9 12L15 18" stroke="white" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 6L9 12L15 18" stroke="white" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="rs-partners__button-next swiper-button-next">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
    <?php endif;?>
        </div>
    </section>
<?php }

//Блок «Видео»
function rs_block_video($content,$key=0){
    add_action( 'wp_footer', 'rs_gallery_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $gallery = $content['video-gallery'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-gallery rs-video <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-gallery__container">
            <div class="section-header">
                <div class="section-header__title">
                    <?php if(!empty($content["blocks_title"])):?>
                        <h2><?=$content["blocks_title"]?></h2>
                    <?php endif; ?>
                    <?php if(!empty($content["description"])):?>
                        <p><?=$content['description']?></p>
                    <?php endif; ?>
                </div>
            </div>

    <?php if(is_array($gallery)):?>
            <div class="rs-gallery__slider swiper">
                <div class="rs-gallery__swiper swiper-wrapper">
                <?php foreach ($gallery as $item):?>
                    <div class="rs-gallery__slide swiper-slide rs-gallery__slide-<?=$item['size']?>">
                        <div class="rs-gallery__item">
                            <a href="<?=$item['video']?>" class="rs-gallery__link"
                               data-fancybox="gallery-<?=$key?>">
                                <div class="rs-gallery__img">
                                    <img src="<?=$item['poster']?>" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach;?>
                </div>
            </div>
    <?php endif;?>
        </div>
        <div class="cursor">
            <div class="cursor__point-zero">
                <div class="cursor__wrapper">
                    <div class="cursor__circle">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M12.4805 9.92869V26.0713C12.4805 27.2731 12.4805 27.874 12.7286 28.1523C12.944 28.3937 13.267 28.5218 13.5975 28.4969C13.9784 28.4682 14.4221 28.0433 15.3095 27.1935L23.7377 19.1222C24.1478 18.7294 24.3529 18.533 24.4298 18.3065C24.4974 18.1073 24.4974 17.8927 24.4298 17.6935C24.3529 17.467 24.1478 17.2706 23.7377 16.8778L15.3095 8.80649C14.4221 7.95669 13.9784 7.53177 13.5975 7.50306C13.267 7.47815 12.944 7.60628 12.7286 7.84772C12.4805 8.12597 12.4805 8.72688 12.4805 9.92869Z"
                                    fill="white" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }