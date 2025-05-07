<?php
defined("_Rosait2025") or die("Доступ запрещён");

//Блок Parallax
function rs_parallax($content,$key=0){
    add_action( 'wp_footer', 'rs_parallax_style');
    $bg_img = $content['on_background_img']?$content['background_img']:false;
    $buttons = $content['on_btn']?$content['buttons']:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-parallax" <?php if($bg_img):?> style="background-image: url(<?=$bg_img['img']?>);"<?php endif;?>>
        <div class="rs-parallax__container">
            <div class="rs-parallax__content">
                <?php if(!empty($content["blocks_title"])):?>
                    <h2><?=$content["blocks_title"]?></h2>
                <?php endif; ?>
                <?php if(!empty($content["description"])):?>
                <h6><?=$content['description']?></h6>
                <?php endif; ?>
                <?php if($buttons):
                    foreach ($buttons as $button):
                        if($button['type'] == 'link'):
                            $link=$button['link'];
                            ?>
                            <a href="<?=$link['url']?>" class="rs-btn _btn-primary"><?=$link['title']?></a>
                        <?php endif;
                        if($button['type'] == 'modal'):
                            ?>
                            <a href="#" class="rs-btn _btn-primary" data-popup="#<?=$button['modal']?>"><?=$button['btn_title']?></a>
                        <?php
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
<?php }

function rs_parallax_top(){
    $parallax = get_field('on_parallax')?get_field('header_parallax'):false;
    if($parallax):
        add_action( 'wp_footer', 'rs_parallax_style');
    ?>
    <section id="parallax-top" class="rs-parallax" <?php if($parallax['background_img']):?> style="border-top-left-radius: 0px; border-top-right-radius: 0px; background-image: url(<?=$parallax['background_img']?>);"<?php endif;?>>
        <div class="rs-parallax__container">
            <div class="rs-parallax__content">
                <?php if(!empty($parallax['title'])):?>
                    <h1><?=$parallax['title']?></h1>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
endif;
}

//Цитата
function rs_quote($content,$key=0){
    add_action( 'wp_footer', 'rs_quote_style');
    $bg_img = $content['on_background_img']?$content['background_img']:false;
    $buttons = $content['on_btn']?$content['buttons']:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-quote" <?php if($bg_img):?> style="background-image: url(<?=$bg_img['img']?>);"<?php endif;?>>
        <div class="rs-quote__container">
            <div class="rs-quote__content">
                <?php if(!empty($content["blocks_title"])):?>
                    <h2><?=$content["blocks_title"]?></h2>
                <?php endif; ?>
                <?php if(!empty($content["description"])):?>
                <h6><?=$content['description']?></h6>
                    <h6><?=$content['author']?></h6>
                <?php endif; ?>
                <?php if($buttons):
                    foreach ($buttons as $button):
                        if($button['type'] == 'link'):
                            $link=$button['link'];
                            ?>
                            <a href="<?=$link['url']?>" class="rs-btn _btn-primary"><?=$link['title']?></a>
                        <?php endif;
                        if($button['type'] == 'modal'):
                            ?>
                            <a href="#" class="rs-btn _btn-primary" data-popup="#<?=$button['modal']?>"><?=$button['btn_title']?></a>
                        <?php
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>
<?php }

//Цифры
function rs_number($content,$key=0){
    add_action( 'wp_footer', 'rs_number_style');
    $bg_img = $content['on_background_img']?$content['background_img']:false;
    $color = $content['on_color']?$content['color']:false;
    $color_number = $content['on_color_number']?$content['color_number']:false;
    $items = $content['items_number'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-number <?=$color?'_white-block':''?>"
        <?php if($bg_img || $color):?> style="<?php if($bg_img):?>background-image: url(<?=$bg_img['img']?>);<?php endif;?> <?php if($color):?> color:<?=$color?>; <?php endif;?>"<?php endif;?>>
        <div class="rs-number__container">
            <div class="section-header _center">
                <div class="section-header__title">
                    <?php if(!empty($content["blocks_title"])):?>
                        <h2><?=$content["blocks_title"]?></h2>
                    <?php endif; ?>
                    <?php if(!empty($content["description"])):?>
                        <h6><?=$content['description']?></h6>
                    <?php endif; ?>
                </div>
            </div>
    <?php if(is_array($items)):?>
            <div class="rs-number__list">
                <?php foreach ($items as $item):?>
                <div class="rs-number__item">
                    <div class="rs-number__total" <?php if($color_number):?> style="color:<?=$color_number?>;" <?php endif;?>><?=$item['prefix']?><span data-digits-counter="<?=$item['number']?>"><?=$item['number']?></span><?=$item['postfix']?></div>
                    <h4><?=$item['description']?></h4>
                </div>
                <?php endforeach;?>

            </div>
    <?php endif;?>
        </div>
    </section>
<?php }

// Блок «Фоновое видео
function rs_bg_video($content,$key=0){
    add_action( 'wp_footer', 'rs_parallax_style');
    $video_block = $content['video_block'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-parallax">
        <div class="rs-parallax__bg">
            <!-- За скорость видео отвечает playbackRate -->
            <video onloadstart="this.playbackRate = 0.3;" autoplay loop muted playsinline
              <?if(!empty($video_block['poster'])):?> poster="<?=$video_block['poster']?>" <?php endif;?> >
                <source src="<?=$video_block['video']?>" type="video/mp4">
            </video>
        </div>
        <div class="rs-parallax__container">
            <div class="rs-parallax__content">
                <?php if(!empty($content["blocks_title"])):?>
                    <h2><?=$content["blocks_title"]?></h2>
                <?php endif; ?>
                <?php if(!empty($content["description"])):?>
                    <p><?=$content["description"]?></p>
                <?php endif; ?>
                <a class="play-btn" href="<?=$video_block['video']?>" data-fancybox="video-<?=$key?>">
                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M12.4805 9.92869V26.0713C12.4805 27.2731 12.4805 27.874 12.7286 28.1523C12.944 28.3937 13.267 28.5218 13.5975 28.4969C13.9784 28.4682 14.4221 28.0433 15.3095 27.1935L23.7377 19.1222C24.1478 18.7294 24.3529 18.533 24.4298 18.3065C24.4974 18.1073 24.4974 17.8927 24.4298 17.6935C24.3529 17.467 24.1478 17.2706 23.7377 16.8778L15.3095 8.80649C14.4221 7.95669 13.9784 7.53177 13.5975 7.50306C13.267 7.47815 12.944 7.60628 12.7286 7.84772C12.4805 8.12597 12.4805 8.72688 12.4805 9.92869Z"
                                fill="white" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
<?php }

//Блок «До окончания акции осталось»
function rs_timer_act($content,$key=0){
    add_action( 'wp_footer', 'rs_timer_style');
    $bg_img = $content["on_background_img"]?$content["background_img"]:false;
    $timer = $content['timer'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>"  class="rs-timer">
        <?php if($bg_img):?>
            <div class="rs-timer__bg">
                <img src="<?=$bg_img['img']?>" alt="">
            </div>
        <?php endif; ?>
        <div class="rs-timer__container">
            <div class="rs-timer__wrapper">
                <div class="rs-timer__text">
                    <?php if(!empty($content["blocks_title"])):?>
                        <h2><?=$content["blocks_title"]?></h2>
                    <?php endif; ?>
                    <?php if(!empty($content["description"])):?>
                        <h6><?=$content['description']?></h6>
                    <?php endif; ?>
                </div>
                <div class="rs-timer__time">
                    <div class="timer" data-timer="<?=$timer?>">
                        <div class="timer__items">
                            <div class="timer__item timer__days">00</div>
                            <div class="timer__item timer__hours">00</div>
                            <div class="timer__item timer__minutes">00</div>
                            <div class="timer__item timer__seconds">00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }