<?php
defined("_Rosait2025") or die("Доступ запрещён");

//Блок «Cвяжитесь с нами»
function rs_feedback($content,$key=0){
    add_action( 'wp_footer', 'rs_feedback_style');
    $bg_img = $content['on_background_img']?$content['background_img']:false;
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $shortcode = $content['shortcode'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-feedback <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
    <?php if($bg_img):?>
        <div class="rs-feedback__bg">
            <img src="<?=$bg_img['img']?>" alt="">
        </div>
    <?php endif;?>
        <div class="rs-feedback__container">
            <div class="rs-feedback__wrapper">
                <div class="section-header _center">
                    <div class="section-header__title">
                        <?php if(!empty($content["blocks_title"])):?>
                            <h2><?=$content["blocks_title"]?></h2>
                        <?php endif; ?>
                        <?php if(!empty($content["description"])):?>
                            <p><?=$content['description']?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="rs-feedback__form">
                    <?php echo apply_shortcodes( $shortcode ); ?>

                </div>
            </div>
        </div>
    </section>
<?php }

// Блок «Подписаться»
function rs_subscribe($content,$key=0){
    add_action( 'wp_footer', 'rs_subscribe_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $shortcode = $content['shortcode'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-subscribe <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-subscribe__container">
            <div class="rs-subscribe__wrapper">
                <div class="rs-subscribe__text">
                    <?php if(!empty($content["blocks_title"])):?>
                        <h2><?=$content["blocks_title"]?></h2>
                    <?php endif; ?>
                    <?php if(!empty($content["description"])):?>
                        <h6><?=$content['description']?></h6>
                    <?php endif; ?>
                </div>

                <div class="rs-subscribe__form">
                    <?php echo apply_shortcodes( $shortcode ); ?>
                </div>
            </div>
        </div>
    </section>
<?php }

// Блок «Нужна консультация специалиста?»
function rs_form($content,$key=0){
   // add_action( 'wp_footer', 'rs_subscribe_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $shortcode = $content['shortcode'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-form <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-form__container">
            <div class="section-header">
                <div class="section-header__title">
                    <?php if(!empty($content["blocks_title"])):?>
                        <h2><?=$content["blocks_title"]?></h2>
                    <?php endif; ?>
                </div>
            </div>
            <div class="rs-form__form">
                <?php echo apply_shortcodes( $shortcode ); ?>
            </div>
        </div>
    </section>
<?php }

//Блок «Контакты»
function rs_contacts($content,$key=0){
    add_action( 'wp_footer', 'rs_contacts_style');
    $bg_img = $content['on_background_img']?$content['background_img']:false;
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $contacts = $content['contacts']?$content['contacts']:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    $option_map = $content['option_map'];
    if($option_map == 'frame'){
        $map = $content['map'];
    } else {
        $branchData = array();
        $locations = $content['locations'];
        if(is_array($locations)){
            foreach ($locations as $location){
                $branchData[]=array(
                    'address' => $location['address'],
                    'location' =>[(float)$location['location']['lon'],(float)$location['location']['lat']],
                );
            }
        }
        $json = json_encode($branchData);
        ?>
        <script>
            const branchData = <?= $json; ?>;
        </script>
     <?php

        add_action( 'wp_footer', 'rs_contacts_script');
    }
    ?>
    <section id="<?=$anchor?>" class="rs-contacts <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <?php if($bg_img):?>
        <div class="rs-contacts__bg">
            <img src="<?=$bg_img['img']?>" alt="">
        </div>
        <?php endif; ?>
        <div class="rs-contacts__container">
            <div class="section-header _center">
                <div class="section-header__title">
                    <?php if(!empty($content["blocks_title"])):?>
                        <h2><?=$content["blocks_title"]?></h2>
                    <?php endif; ?>
                    <?php if(!empty($content["description"])):?>
                        <p><?=$content['description']?></p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="rs-contacts__block">
                <div class="rs-contacts__map map"><?=$option_map == 'frame'?$map:"";?></div>

                <?php if($contacts): ?>
                <div class="rs-contacts__wrapper">
                    <div class="rs-contacts__body">
                        <?php if(!empty($contacts['title'])):?>
                        <h3><?=$contacts['title']?></h3>
                        <?php endif;?>
                        <?php if(!empty($contacts['subtitle'])):?>
                        <p><?=$contacts['subtitle']?></p>
                        <?php endif;?>
                        <ul class="rs-contacts__contact">
                            <?php if(!empty($contacts['phones']) && is_array($contacts['phones'])):
                                foreach ($contacts['phones'] as $phone):
                                ?>
                                    <li>
                                        <a href="tel:<?= preg_replace('/[^0-9\+]+/', '', $phone['phone']) ?>">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                        d="M0 2.22222C0 9.83148 6.16852 16 13.7778 16C14.1211 16 14.4615 15.9874 14.7985 15.9628C15.1852 15.9344 15.3786 15.9203 15.5546 15.8189C15.7004 15.735 15.8387 15.5862 15.9118 15.4347C16 15.2517 16 15.0383 16 14.6115V12.1073C16 11.7484 16 11.5689 15.9409 11.4151C15.8888 11.2792 15.804 11.1582 15.6941 11.0627C15.5697 10.9547 15.4011 10.8933 15.0638 10.7707L12.2133 9.73413C11.8209 9.59143 11.6247 9.52008 11.4385 9.53219C11.2743 9.54287 11.1164 9.59889 10.9822 9.69402C10.83 9.8019 10.7226 9.98093 10.5077 10.339L10.5077 10.339L9.77778 11.5556C7.42234 10.4888 5.5128 8.57678 4.44444 6.22222L5.66101 5.49229C6.01907 5.27745 6.1981 5.17003 6.30598 5.01783C6.40111 4.88363 6.45713 4.72566 6.46781 4.56151C6.47992 4.37535 6.40857 4.17913 6.26587 3.78671L5.22932 0.936188C5.10667 0.598899 5.04534 0.430252 4.93726 0.305864C4.84179 0.19599 4.7208 0.111243 4.58491 0.0590678C4.43107 0 4.25162 0 3.89273 0H1.38846C0.96167 0 0.748276 0 0.565315 0.0882247C0.41378 0.161295 0.265011 0.299568 0.181069 0.445362C0.0797174 0.621392 0.0655565 0.814772 0.0372347 1.20153C0.0125563 1.53854 0 1.87892 0 2.22222Z"
                                                        fill="#CCCDF1" />
                                            </svg>
                                            <span><?=$phone['phone']?> <?=$phone['comment']?></span></a>
                                    </li>
                                <?php endforeach;
                            endif;
                            ?>
                            <?php if(!empty($contacts['emails']) && is_array($contacts['emails'])):
                            foreach ($contacts['emails'] as $email):
                                ?>
                                <li>
                                    <a href="mailto:<?=$email['e-mail']?>">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M0.0495854 4.49783C0.25173 3.64021 1.04822 3 2 3H14C14.9518 3 15.7483 3.64021 15.9504 4.49783L8 9.17647L0.0495854 4.49783ZM0 5.59719V12.4376L5.80319 9.01224L0 5.59719ZM6.7614 9.57612L0.191871 13.4538C0.512604 14.1051 1.20168 14.5556 2 14.5556H14C14.7983 14.5556 15.4874 14.1051 15.8081 13.4538L9.2386 9.57612L8 10.305L6.7614 9.57612ZM10.1968 9.01224L16 12.4376V5.59719L10.1968 9.01224Z"
                                                    fill="#CCCDF1" />
                                        </svg>
                                        <span><?=$email['email']?> <?=$email['comment']?></span>
                                    </a>
                                </li>
                            <?php endforeach;
                            endif;?>
                            <?php if(!empty($contacts['works'])):?>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8ZM8 3.5C8 3.22386 7.77614 3 7.5 3C7.22386 3 7 3.22386 7 3.5V9C7 9.17943 7.09614 9.3451 7.25193 9.43412L10.7519 11.4341C10.9917 11.5711 11.2971 11.4878 11.4341 11.2481C11.5711 11.0083 11.4878 10.7029 11.2481 10.5659L8 8.70984V3.5Z"
                                            fill="#CCCDF1" />
                                </svg>
                                <span><?=$contacts['works']?></span>
                            </li>
                            <?php endif;?>
                            <?php if(!empty($contacts['address'])):?>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M8.4 16C8.4 16 14.8 10.3137 14.8 6C14.8 2.68629 11.9346 0 8.4 0C4.86538 0 2 2.68629 2 6C2 10.3137 8.4 16 8.4 16ZM8.4 9C6.63269 9 5.2 7.65685 5.2 6C5.2 4.34315 6.63269 3 8.4 3C10.1673 3 11.6 4.34315 11.6 6C11.6 7.65685 10.1673 9 8.4 9Z"
                                            fill="#CCCDF1" />
                                </svg>
                                <span><?=$contacts['address']?></span>
                            </li>
                            <?php endif;?>
                        </ul>

                        <?php if($contacts['on_social']):
                            $socials = get_field('social','options');
                            $contacts_socials=[];
                            foreach ($socials as $social){
                                if(in_array($social['name'], $contacts['social_btn'])) {
                                    $key = array_keys($contacts['social_btn'], $social['name']);

                                    $contacts_socials[$key[0]]=$social;
                                }
                            }
                            ksort($contacts_socials);
                        if(!empty($contacts_socials)) social_btn($contacts_socials,'rs-contacts__social') ;
                        endif;?>

                        <a href="#" class="rs-btn _btn-primary" data-popup="#<?=$contacts['modal']?>"><?=$contacts['btn_title']?></a>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </section>
<?php }

//Страница «Контакты»
function rs_contacts_page(){
    add_action( 'wp_footer', 'rs_contacts_style');
$contacts = get_field('contacts')?get_field('contacts'):false;
$option_map = get_field('option_map');
if($option_map == 'frame'){
    $map = get_field('map');
} else {
    $branchData = array();
    $locations = get_field('locations');
    if(is_array($locations)){
        foreach ($locations as $location){
            $branchData[]=array(
                'address' => $location['address'],
                'location' =>[(float)$location['location']['lon'],(float)$location['location']['lat']],
            );
        }
    }
    $json = json_encode($branchData);
    ?>
    <script>
        const branchData = <?= $json; ?>;
    </script>
    <?php

    add_action( 'wp_footer', 'rs_contacts_script');
}
?>
    <section class="rs-contacts">
        <div class="rs-contacts__container">
            <div class="rs-contacts__top">
                <div class="rs-contacts__body">
                    <?php if(!empty($contacts["title"])):?>
                        <h3><?=$contacts["title"]?></h3>
                    <?php endif; ?>
                    <?php if(!empty($contacts["subtitle"])):?>
                        <p><?=$contacts["subtitle"]?></p>
                    <?php endif; ?>

                    <ul class="rs-contacts__contact">
                        <?php if(!empty($contacts['phones']) && is_array($contacts['phones'])):
                            foreach ($contacts['phones'] as $phone):
                                ?>
                                <li>
                                    <a href="tel:<?= preg_replace('/[^0-9\+]+/', '', $phone['phone']) ?>">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M0 2.22222C0 9.83148 6.16852 16 13.7778 16C14.1211 16 14.4615 15.9874 14.7985 15.9628C15.1852 15.9344 15.3786 15.9203 15.5546 15.8189C15.7004 15.735 15.8387 15.5862 15.9118 15.4347C16 15.2517 16 15.0383 16 14.6115V12.1073C16 11.7484 16 11.5689 15.9409 11.4151C15.8888 11.2792 15.804 11.1582 15.6941 11.0627C15.5697 10.9547 15.4011 10.8933 15.0638 10.7707L12.2133 9.73413C11.8209 9.59143 11.6247 9.52008 11.4385 9.53219C11.2743 9.54287 11.1164 9.59889 10.9822 9.69402C10.83 9.8019 10.7226 9.98093 10.5077 10.339L10.5077 10.339L9.77778 11.5556C7.42234 10.4888 5.5128 8.57678 4.44444 6.22222L5.66101 5.49229C6.01907 5.27745 6.1981 5.17003 6.30598 5.01783C6.40111 4.88363 6.45713 4.72566 6.46781 4.56151C6.47992 4.37535 6.40857 4.17913 6.26587 3.78671L5.22932 0.936188C5.10667 0.598899 5.04534 0.430252 4.93726 0.305864C4.84179 0.19599 4.7208 0.111243 4.58491 0.0590678C4.43107 0 4.25162 0 3.89273 0H1.38846C0.96167 0 0.748276 0 0.565315 0.0882247C0.41378 0.161295 0.265011 0.299568 0.181069 0.445362C0.0797174 0.621392 0.0655565 0.814772 0.0372347 1.20153C0.0125563 1.53854 0 1.87892 0 2.22222Z"
                                                    fill="#CCCDF1" />
                                        </svg>
                                        <span><?=$phone['phone']?> <?=$phone['comment']?></span></a>
                                </li>
                            <?php endforeach;
                        endif;
                        ?>
                        <?php if(!empty($contacts['emails']) && is_array($contacts['emails'])):
                            foreach ($contacts['emails'] as $email):
                                ?>
                                <li>
                                    <a href="mailto:<?=$email['e-mail']?>">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M0.0495854 4.49783C0.25173 3.64021 1.04822 3 2 3H14C14.9518 3 15.7483 3.64021 15.9504 4.49783L8 9.17647L0.0495854 4.49783ZM0 5.59719V12.4376L5.80319 9.01224L0 5.59719ZM6.7614 9.57612L0.191871 13.4538C0.512604 14.1051 1.20168 14.5556 2 14.5556H14C14.7983 14.5556 15.4874 14.1051 15.8081 13.4538L9.2386 9.57612L8 10.305L6.7614 9.57612ZM10.1968 9.01224L16 12.4376V5.59719L10.1968 9.01224Z"
                                                    fill="#CCCDF1" />
                                        </svg>
                                        <span><?=$email['email']?> <?=$email['comment']?></span>
                                    </a>
                                </li>
                            <?php endforeach;
                        endif;?>
                        <?php if(!empty($contacts['works'])):?>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0C12.4183 0 16 3.58172 16 8ZM8 3.5C8 3.22386 7.77614 3 7.5 3C7.22386 3 7 3.22386 7 3.5V9C7 9.17943 7.09614 9.3451 7.25193 9.43412L10.7519 11.4341C10.9917 11.5711 11.2971 11.4878 11.4341 11.2481C11.5711 11.0083 11.4878 10.7029 11.2481 10.5659L8 8.70984V3.5Z"
                                            fill="#CCCDF1" />
                                </svg>
                                <span><?=$contacts['works']?></span>
                            </li>
                        <?php endif;?>
                        <?php if(!empty($contacts['address'])):?>
                            <li>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M8.4 16C8.4 16 14.8 10.3137 14.8 6C14.8 2.68629 11.9346 0 8.4 0C4.86538 0 2 2.68629 2 6C2 10.3137 8.4 16 8.4 16ZM8.4 9C6.63269 9 5.2 7.65685 5.2 6C5.2 4.34315 6.63269 3 8.4 3C10.1673 3 11.6 4.34315 11.6 6C11.6 7.65685 10.1673 9 8.4 9Z"
                                            fill="#CCCDF1" />
                                </svg>
                                <span><?=$contacts['address']?></span>
                            </li>
                        <?php endif;?>
                    </ul>

                    <?php
                    if($contacts['on_social']):
                    if(!empty($contacts["social_title"])):?>
                    <h5><?=$contacts["social_title"]?></h5>
                    <?php endif; ?>
                    <?php
                        $socials = get_field('social','options');
                        $contacts_socials=[];
                        foreach ($socials as $social){
                            if(in_array($social['name'], $contacts['social_btn'])) {
                                $key = array_keys($contacts['social_btn'], $social['name']);

                                $contacts_socials[$key[0]]=$social;
                            }
                        }
                        ksort($contacts_socials);
                        if(!empty($contacts_socials)) social_btn($contacts_socials,'rs-contacts__social') ;
                    endif;?>

                    <?php if($contacts['download']):
                        $file = $contacts['download'];
                        ?>
                    <a href="<?=$file["url"]?>" class="rs-btn _btn-gray" download target="_blank"><?=$file["title"]?></a>
                    <?php endif; ?>
                </div>

                <div class="rs-contacts__body">
                    <?php if(!empty($contacts["title_form"])):?>
                        <h3><?=$contacts["title_form"]?></h3>
                    <?php endif; ?>
                    <?php if(!empty($contacts["subtitle_form"])):?>
                        <p><?=$contacts["subtitle_form"]?></p>
                    <?php endif; ?>
                    <?php echo apply_shortcodes( $contacts["shortcode_form"] ); ?>
                </div>
            </div>

            <div class="rs-contacts__bottom">
                <div class="rs-contacts__map map"><?=$option_map == 'frame'?$map:"";?></div>
            </div>
        </div>
    </section>
<?php }