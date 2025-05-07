<?php
defined("_Rosait2025") or die("Доступ запрещён");

// Преимущества (с иконками - главная страница)
function rs_features_custom($content,$key=0){
    add_action( 'wp_footer', 'rs_features_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    $on_color_scheme=$content['on_color_scheme']??false;
    if($on_color_scheme):
        $color_scheme = $content["color_scheme"];
        $color_bg = $color_scheme['color_bg'];
        $color_bg_icon = $color_scheme['color_bg_icon'];
        $color_txt = $color_scheme['color_txt'];
        $color_txt_hover = $color_scheme['color_txt_hover'];
    endif;
    ?>
<section id="<?=$anchor?>" class="rs-features <?=$background?'_blue-block':''?>" <?php if($background):?>
	style="background-color:<?=$background?> " <?php endif; ?>>
	<div class="rs-features__container">
		<?php if(!empty($content["blocks_title"])):?>
		<div class="section-header">
			<div class="section-header__title">
				<h2><?=$content["blocks_title"]?></h2>
			</div>
		</div>
		<?php endif; ?>
		<div class="rs-features__slider swiper">
			<div class="rs-features__swiper swiper-wrapper">
				<?php foreach ($content["items_features"] as $feature):
                    $on_color=$feature['on_color']??false;
                    if($on_color):
                        $color_bg = $feature['color_bg'];
                        $color_bg_icon = $feature['color_bg_icon'];
                        $color_txt = $feature['color_txt'];
                        $color_txt_hover = $feature['color_txt_hover'];
                    endif;
                    ?>
				<div class="rs-features__slide swiper-slide rs-features__slide-<?=$feature['size']?>">
					<div class="rs-features__item" <?php if($on_color || $on_color_scheme):?>
						style="background: <?=$color_bg?>;color: <?=$color_txt?>" <?php endif;?>>
						<div class="rs-features__img" <?php if($on_color || $on_color_scheme):?> style="--bg-circle-color: <?=$color_bg_icon?>;" <?php endif;?>>
							<?php if(!empty($feature['icon'])):?>
							<img src="<?=$feature['icon']?>" alt="">
							<?php endif; ?>
						</div>
						<div class="rs-features__desc" <?php if($on_color || $on_color_scheme):?> style="--font-hover-color: <?=$color_txt_hover?>;" <?php endif;?>>
							<?php if(!empty($feature['title'])):?>
							<h4><?=$feature['title']?></h4>
							<?php endif; ?>
							<?php if(!empty($feature['description'])):?>
							<p><?=$feature['description']?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php }

// Преимущества (с иконками 3/4/5 в ряд)
function rs_features($content,$key=0){
    add_action( 'wp_footer', 'rs_features_row_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    $on_color_scheme=$content['on_color_scheme']??false;
    if($on_color_scheme):
        $color_scheme = $content["color_scheme"];
        $color_bg = $color_scheme['color_bg'];
        $color_bg_icon = $color_scheme['color_bg_icon'];
        $color_txt = $color_scheme['color_txt'];
        $color_txt_hover = $color_scheme['color_txt_hover'];
    endif;
    ?>
<section id="<?=$anchor?>"
	class="rs-features-row rs-features-row-<?=$content['count_features']?>   <?=$background?'_blue-block':''?>"
	<?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
	<div class="rs-features-row__container">
		<?php if(!empty($content["blocks_title"])):?>
		<div class="section-header">
			<div class="section-header__title">
				<h2><?=$content["blocks_title"]?></h2>
			</div>
		</div>
		<?php endif; ?>

		<div class="rs-features-row__wrapper">
			<div class="rs-features-row__list">
				<?php foreach ($content["items_features"] as $feature):
                        $on_color=$feature['on_color']??false;
                    if($on_color):
                        $color_bg = $feature['color_bg'];
                        $color_bg_icon = $feature['color_bg_icon'];
                        $color_txt = $feature['color_txt'];
                        $color_txt_hover = $feature['color_txt_hover'];
                    endif;
                        ?>
				<div class="rs-features-row__item" <?php if($on_color || $on_color_scheme):?>
					style="background: <?=$color_bg?>;color: <?=$color_txt?>" <?php endif;?>>
					<div class="rs-features-row__img" <?php if($on_color || $on_color_scheme):?> style="--bg-circle-color: <?=$color_bg_icon?>;" <?php endif;?>>
						<?php if(!empty($feature['icon'])):?>
						<img src="<?=$feature['icon']?>" alt="">
						<?php endif; ?>
					</div>
					<div class="rs-features-row__desc" <?php if($on_color || $on_color_scheme):?> style="--font-hover-color: <?=$color_txt_hover?>;" <?php endif;?>>
						<?php if(!empty($feature['title'])):?>
						<h4><?=$feature['title']?></h4>
						<?php endif; ?>
						<?php if(!empty($feature['description'])):?>
						<p><?=$feature['description']?></p>
						<?php endif; ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<?php }

// Преимущества с картинкой
function rs_features_img($content,$key=0){
    add_action( 'wp_footer', 'rs_features_img_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
<section id="<?=$anchor?>" class="rs-features-img <?=$background?'_blue-block':''?>" <?php if($background):?>
	style="background-color:<?=$background?> " <?php endif; ?>>
	<div class="rs-features-img__container">
		<div class="section-header _center">
			<?php if(!empty($content["blocks_title"])):?>
			<div class="section-header__title">
				<h2><?=$content["blocks_title"]?></h2>
			</div>
			<?php endif; ?>
		</div>

		<div class="rs-features-img__wrapper">
			<div class="rs-features-img__column">
				<?php foreach ($content["items_features"] as $index=>$feature):
                        if($index % 2 != 0) continue;
                        $num = ($index+1 > 9)?$index:'0'.($index+1);
                        ?>
				<div class="rs-features-img__item">
					<div class="rs-features-img__num"><?=$num?>.</div>
					<div class="rs-features-img__desc">
						<h4><?=$feature['title']?></h4>
						<p><?=$feature['description']?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<?php if($content['on_background_img'] && !empty($content['block_img'])):
                    $background_img = $content['on_background_img']?$content['background_img']:false;
                    $block_img = $content['block_img'];
                    ?>
			<div class="rs-features-img__column">
				<?php if(is_array($block_img['features_lines'])):
                        foreach ($block_img['features_lines'] as $line):
                        ?>
				<div class="rs-features-img__line">
					<?=$line["line"]?>
				</div>
				<?php
                        endforeach;
                        endif; ?>

				<div class="rs-features-img__picture">
					<?php if($background_img):
                            if($background_img['img']):
                            ?>
					<div class="rs-features-img__img">
						<img src="<?=$background_img['img']?>" alt="">
					</div>
					<?php endif;
                            if($background_img['bg']):
                            ?>
					<div class="rs-features-img__bg">
						<img src="<?=$background_img['bg']?>" alt="">
					</div>
					<?php endif; ?>
					<?php endif; ?>
					<?php if(is_array($block_img['icons'])):
                        foreach ($block_img['icons'] as $icon):
                            $coord = $icon['coordinats'];

                            $style = '';
                            if(!empty($coord['top'])){
                                $style .=  'top:'. $coord['top'].'%;';
                            }
                            if(!empty($coord['left'])){
                                $style .=  'left:'. $coord['left'].'%;';
                            }
                            if(!empty($coord['right'])){
                                $style .=  'right:'. $coord['right'].'%;';
                            }
                            if(!empty($coord['bottom'])){
                                $style .=  'bottom:'. $coord['bottom'].'%;';
                            }
                            ?>
					<div class="rs-features-img__icon" style="<?=$style?>">
						<img src="<?=$icon['icon']?>" alt="">
					</div>
					<?php
                        endforeach;
                        endif; ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="rs-features-img__column">
				<?php foreach ($content["items_features"] as $index=>$feature):
                        if($index % 2 == 0) continue;
                        $num = ($index+1 > 9)?$index:'0'.($index+1);
                        ?>
				<div class="rs-features-img__item">
					<div class="rs-features-img__num"><?=$num?>.</div>
					<div class="rs-features-img__desc">
						<h4><?=$feature['title']?></h4>
						<p><?=$feature['description']?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php }

//Блок «как мы работаем»
function rs_steps($content,$key=0){
    add_action( 'wp_footer', 'rs_steps_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $buttons = $content['on_btn']?$content['buttons']:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
<section id="<?=$anchor?>" class="rs-steps <?=$background?'_blue-block':''?>" <?php if($background):?>
	style="background-color:<?=$background?> " <?php endif; ?>>
	<div class="rs-steps__container">
		<div class="rs-steps__wrapper">
			<div class="rs-steps__text">
				<div class="rs-steps__text_body">
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
					<?php if($buttons):
                            foreach ($buttons as $button):
                                if($button['type'] == 'link'):
                                    $link=$button['link'];
                                    ?>
					<a href="<?=$link['url']?>" class="rs-btn _btn-primary"><?=$link['title']?></a>
					<?php endif;
                                if($button['type'] == 'modal'):
                                    ?>
					<a href="#" class="rs-btn _btn-primary"
						data-popup="#<?=$button['modal']?>"><?=$button['btn_title']?></a>
					<?php
                                endif;
                            endforeach;
                        endif;
                        ?>

				</div>
			</div>

			<div class="rs-steps__content">
				<div class="rs-steps__list">
					<?php foreach ($content["items_features"] as $index=>$feature):
                        $num = ($index+1 > 9)?$index:'0'.($index+1);
                        ?>
					<div class="rs-steps__item">
						<div class="rs-steps__num"><?=$num?></div>
						<div class="rs-steps__img">
							<img src="<?=$feature['icon']?>" alt="">
						</div>
						<div class="rs-steps__desc">
							<h4><?=$feature['title']?></h4>
							<p><?=$feature['description']?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if($buttons): ?>
			<div class="section-footer">
				<?php   foreach ($buttons as $button):
                        if($button['type'] == 'link'):
                            $link=$button['link'];
                            ?>
				<a href="<?=$link['url']?>" class="rs-btn _btn-primary"><?=$link['title']?></a>
				<?php endif;
                        if($button['type'] == 'modal'):
                            ?>
				<a href="#" class="rs-btn _btn-primary"
					data-popup="#<?=$button['modal']?>"><?=$button['btn_title']?></a>
				<?php
                        endif;
                     endforeach; ?>
			</div>
			<?php  endif;  ?>
		</div>
	</div>
</section>

<?php }