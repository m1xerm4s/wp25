<?php
defined("_Rosait2025") or die("Доступ запрещён");
global $footer_address, $footer_emails, $footer_phones, $footer_socials,$footer_works;
$menus = get_field("footer_menu",'options');
$on_top_footer=!empty($footer_address) || !empty($footer_emails) || !empty($footer_phones) || !empty($footer_socials) || $footer_works;
?>
<footer>
    <div class="rs-footer">
        <?php if($on_top_footer || !empty($menus)):?>
        <div class="rs-footer__wrapper">
            <div class="rs-footer__container">

                <div class="rs-footer__spollers spollers" data-spollers="991.98, max">
                    <?php if($on_top_footer):
                        //Вывод контактной информации
                        ?>
                    <div class=" rs-footer__spollers_item spollers__item">
                        <h6 class="rs-footer__spollers_title spollers__title _spoller-active" data-spoller>
                            <?=get_field('footer_contacts_title','options')?></h6>
                        <div class="rs-footer__spollers_body spollers__body">
                            <div class="rs-footer__menu menu">
                                <nav class="menu__body">
                                    <ul class="menu__list">
                                        <?php if (!empty($footer_phones) && is_array($footer_phones)):
                                            foreach ($footer_phones as $phone):
                                                ?>
                                                <li class="menu-item">
                                                    <a href="tel:<?= preg_replace('/[^0-9\+]+/', '', $phone['phone']) ?>">
                                                        <svg class="footer-phone-icon" width="20" height="20"
                                                             viewBox="0 0 20 20" fill="none">
                                                            <path
                                                                    d="M2 6.22222C2 13.8315 8.16852 20 15.7778 20C16.1211 20 16.4615 19.9874 16.7985 19.9628C17.1852 19.9344 17.3786 19.9203 17.5546 19.8189C17.7004 19.735 17.8387 19.5862 17.9118 19.4347C18 19.2517 18 19.0383 18 18.6115V16.1073C18 15.7484 18 15.5689 17.9409 15.4151C17.8888 15.2792 17.804 15.1582 17.6941 15.0627C17.5697 14.9547 17.4011 14.8933 17.0638 14.7707L14.2133 13.7341C13.8209 13.5914 13.6247 13.5201 13.4385 13.5322C13.2743 13.5429 13.1164 13.5989 12.9822 13.694C12.83 13.8019 12.7226 13.9809 12.5077 14.339L12.5077 14.339L11.7778 15.5556C9.42234 14.4888 7.5128 12.5768 6.44444 10.2222L7.66101 9.49229C8.01907 9.27745 8.1981 9.17003 8.30598 9.01783C8.40111 8.88363 8.45713 8.72566 8.46781 8.56151C8.47992 8.37535 8.40857 8.17913 8.26587 7.78671L7.22932 4.93619C7.10667 4.5989 7.04534 4.43025 6.93726 4.30586C6.84179 4.19599 6.7208 4.11124 6.58491 4.05907C6.43107 4 6.25162 4 5.89273 4H3.38846C2.96167 4 2.74828 4 2.56531 4.08822C2.41378 4.1613 2.26501 4.29957 2.18107 4.44536C2.07972 4.62139 2.06556 4.81477 2.03723 5.20153C2.01256 5.53854 2 5.87892 2 6.22222Z"
                                                                    fill="var(--icons-menu-color)" />
                                                        </svg>
                                                        <span><?=$phone['phone']?> <?=!empty($phone['comment'])?"(".$phone['comment'].")":""?></span></a>
                                                </li>
                                            <?php endforeach;
                                        endif; ?>
                                        <?php if(!empty($footer_emails) && is_array($footer_emails)):
                                            foreach ($footer_emails as $email):
                                                ?>
                                                <li class="menu-item">
                                                    <a href="mailto:<?=$email['e-mail']?>"><svg class="footer-emain-icon" width="20" height="20"
                                                                                                viewBox="0 0 20 20" fill="none">
                                                            <path
                                                                    d="M1.05578 8.18506C1.2832 7.22024 2.17925 6.5 3.25 6.5H16.75C17.8207 6.5 18.7168 7.22024 18.9442 8.18506L10 13.4485L1.05578 8.18506ZM1 9.42184V17.1173L7.52859 13.2638L1 9.42184ZM8.60658 13.8981L1.21585 18.2605C1.57668 18.9933 2.35189 19.5 3.25 19.5H16.75C17.6481 19.5 18.4233 18.9933 18.7841 18.2605L11.3934 13.8981L10 14.7181L8.60658 13.8981ZM12.4714 13.2638L19 17.1173V9.42184L12.4714 13.2638Z"
                                                                    fill="var(--icons-menu-color)" />
                                                        </svg><?=$email['e-mail']?> <?=!empty($email['comment'])?"(".$email['comment'].")":""?></a>
                                                </li>
                                            <?php endforeach;
                                        endif;?>

                                        <?php if($footer_works):?>
                                        <li class="menu-item">
                                            <svg class="footer-time-icon" width="20" height="20"
                                                 viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M19 12C19 16.9706 14.9706 21 10 21C5.02944 21 1 16.9706 1 12C1 7.02944 5.02944 3 10 3C14.9706 3 19 7.02944 19 12ZM10 6.9375C10 6.62684 9.74816 6.375 9.4375 6.375C9.12684 6.375 8.875 6.62684 8.875 6.9375V13.125C8.875 13.3269 8.98316 13.5132 9.15842 13.6134L13.0959 15.8634C13.3657 16.0175 13.7093 15.9238 13.8634 15.6541C14.0175 15.3843 13.9238 15.0407 13.6541 14.8866L10 12.7986V6.9375Z"
                                                    fill="var(--icons-menu-color)" />
                                            </svg>
                                            <span><?=$footer_works?></span>
                                        </li>
                                        <?php  endif;?>
                                        <?php
                                        $address ="";

                                        if(is_array($footer_address)) $address = $footer_address['address'];
                                        if(!empty($address)):?>
                                        <li class="menu-item">
                                            <svg class="footer-location-icon" width="20" height="20"
                                                 viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M10 23C10 23 17.5 15.8921 17.5 10.5C17.5 6.35786 14.1421 3 10 3C5.85786 3 2.5 6.35786 2.5 10.5C2.5 15.8921 10 23 10 23ZM10 14.25C7.92893 14.25 6.25 12.5711 6.25 10.5C6.25 8.42893 7.92893 6.75 10 6.75C12.0711 6.75 13.75 8.42893 13.75 10.5C13.75 12.5711 12.0711 14.25 10 14.25Z"
                                                    fill="var(--icons-menu-color)" />
                                            </svg>
                                            <span><?=$address?></span>
                                        </li>
                                        <?php endif;?>
                                    </ul>
                                </nav>
                            </div>

                            <?php if(!empty($footer_socials) && is_array($footer_socials)):
                                //Вывод кнопок социальных сетей
                                ?>
                                <div class="rs-footer__social social">
                                    <?= social_btn($footer_socials)?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif;?>
                    <?php
                    //Вывод меню
                    foreach ($menus as $id):
                        if(wp_get_nav_menu_object( $id)):?>
                            <div class=" rs-footer__spollers_item spollers__item">
                                <h6 class="rs-footer__spollers_title spollers__title" data-spoller><?=wp_get_nav_menu_object( $id)->name?></h6>
                                <div class="rs-footer__spollers_body spollers__body">
                                    <div class="rs-footer__menu menu">
                                        <?php
                                        $args = [
                                            'theme_location'  => '',
                                            'menu'            => $id,
                                            'container'       => 'nav',
                                            'container_class' => 'menu__body',
                                            'container_id'    => '',
                                            'menu_class'      => 'menu__list',
                                            'menu_id'         => '',
                                            'echo'            => true,
                                            'fallback_cb'     => '',
                                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'depth'           => 1,
                                            'walker'          =>'',
                                        ];
                                        wp_nav_menu($args);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
        <?php endif;?>
        <div class="rs-footer__bottom">
            <div class="rs-footer__container">
                <div class="rs-footer__copyright"><?=get_field('copyright',"options")?></div>
                <div class="rs-footer__develop">
                    <?php echo apply_shortcodes( '[develop_link]' ); ?>
                </div>
            </div>
        </div>
    </div>
</footer>