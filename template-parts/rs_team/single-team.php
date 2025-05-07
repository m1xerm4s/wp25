<?php get_header(); ?>
<?php
global $post;
$title = !empty(get_field('title'))?get_field('title'):get_the_title();
$img = (!empty(get_field('photo'))?get_field('photo'):has_post_thumbnail())?get_the_post_thumbnail_url():DEFAULT_IMAGE;
if ( function_exists('bcn_display') && !is_front_page()) {?>
    <div class="rs-breadcrumbs">
        <div class="rs-breadcrumbs__container">
            <nav class="rs-breadcrumbs__navigation">
                <ul itemscope itemtype="http://schema.org/BreadcrumbList" class="rs-breadcrumbs__list">
                    <?php bcn_display();?>
                </ul>
            </nav>
        </div>
    </div>
<?php } ?>
    <section class="rs-team">
        <div class="rs-team__container">
            <div class="rs-team__wrapper">
                <div class="rs-team__picture">
                    <div class="rs-team__picture_body">
                        <div class="rs-team__img">
                            <img src="<?=$img?>" alt="">
                        </div>

                        <a href="<?=get_post_type_archive_link( 'team' );?>" class="back-link">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M11.6962 16.9138L7.78417 13.0017M7.78417 13.0017L11.6962 9.0897M7.78417 13.0017H18.2163M1.2641 13.0017C1.2641 19.4834 6.51854 24.7378 13.0002 24.7378C19.4819 24.7378 24.7363 19.4834 24.7363 13.0017C24.7363 6.52006 19.4819 1.26562 13.0002 1.26562C6.51854 1.26562 1.2641 6.52006 1.2641 13.0017Z"
                                        stroke="#9397AD" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                            </svg>
                            <span>Назад к сотрудникам</span>
                        </a>
                    </div>
                </div>
                <div class="rs-team__desc">
                    <div class="rs-team__head">
                        <div class="rs-team__title">
                            <h3><?=$title?></h3>
                            <?php if(!empty(get_field('position'))):?>
                                <p><?=get_field('position')?></p>
                            <?php endif; ?>
                        </div>
                        <?php if(!empty(get_field('workexperience'))):?>
                        <div class="rs-team__exp">
                            <div class="rs-team__exp_icon">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M1.43689 11.2307L6.55774 15.3273C7.23996 15.8731 7.58108 16.146 7.96092 16.3401C8.29792 16.5122 8.65664 16.6381 9.02734 16.7141C9.44517 16.7999 9.88201 16.7999 10.7557 16.7999H17.2412C18.1149 16.7999 18.5517 16.7999 18.9695 16.7141C19.3402 16.6381 19.699 16.5122 20.036 16.3401C20.4158 16.146 20.7569 15.8731 21.4391 15.3273L26.56 11.2307M1.43689 11.2307C1.39844 11.8851 1.39844 12.6897 1.39844 13.7199V19.8799C1.39844 22.2321 1.39844 23.4082 1.85621 24.3067C2.25888 25.0969 2.9014 25.7395 3.69168 26.1421C4.59011 26.5999 5.76622 26.5999 8.11844 26.5999H19.8784C22.2307 26.5999 23.4068 26.5999 24.3052 26.1421C25.0955 25.7395 25.738 25.0969 26.1407 24.3067C26.5984 23.4082 26.5984 22.2321 26.5984 19.8799V13.7199C26.5984 12.6897 26.5984 11.8851 26.56 11.2307M1.43689 11.2307C1.48624 10.3908 1.59892 9.7981 1.85621 9.29314C2.25888 8.50286 2.9014 7.86034 3.69168 7.45768C4.59011 6.9999 5.76622 6.9999 8.11844 6.9999H8.39844M26.56 11.2307C26.5106 10.3908 26.398 9.7981 26.1407 9.29314C25.738 8.50286 25.0955 7.86034 24.3052 7.45768C23.4068 6.9999 22.2307 6.9999 19.8784 6.9999H19.5984M8.39844 6.9999V5.5999C8.39844 3.28031 10.2788 1.3999 12.5984 1.3999H15.3984C17.718 1.3999 19.5984 3.28031 19.5984 5.5999V6.9999M8.39844 6.9999H19.5984"
                                            stroke="#6366F1" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="rs-team__exp_text">
                                <h4><?=get_field('workexperience')?></h4>
                                <p>стаж работы</p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="rs-team__body">
                        <div class="rs-team__img">
                            <img src="<?=$img?>" alt="">
                        </div>
                        <?php
                        $rows = get_field('blocks' );
                        if( is_array($rows) ) {
                            foreach($rows as $index => $row){
                                $type_blocks = $row["type_blocks"];
                                do_action( 'template_on_'.$post->post_type.'_'.$type_blocks, $row, $index);
                            }
                        }?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>