<?php get_header(); ?>
<?php
global $post;
$title = !empty(get_field('title'))?get_field('title'):get_the_title();
$gallery = get_field('gallery');
$sources=[];
foreach ($gallery as $item):
$sources[] = array(
    'full'=>  $item["url"],
    'thumbnail'=> $item["sizes"]["post-thumbnail"]
);
endforeach;
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
    <section class="rs-grid-block rs-albom">
        <div class="rs-grid-block__block">
            <div class="rs-grid-block__container">
                <div class="section-header">
                    <div class="section-header__title">
                        <h2><?=$title?></h2>
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="rs-grid-block__wrapper">
                    <div class="rs-grid-block__list" data-grid-column="4">

                    </div>
                    <div id="pagination-albom" class="pagging"></div>


                    <a href="<?=get_post_type_archive_link( 'alboms' );?>" class="back-link">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M11.6962 16.9138L7.78417 13.0017M7.78417 13.0017L11.6962 9.0897M7.78417 13.0017H18.2163M1.2641 13.0017C1.2641 19.4834 6.51854 24.7378 13.0002 24.7378C19.4819 24.7378 24.7363 19.4834 24.7363 13.0017C24.7363 6.52006 19.4819 1.26562 13.0002 1.26562C6.51854 1.26562 1.2641 6.52006 1.2641 13.0017Z"
                                    stroke="#9397AD" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                        </svg>
                        <span>Назад к альбомам</span>
                    </a>
                </div>
            </div>
        </div>
        <?php if(!empty(get_field('description'))):?>
        <div class="rs-grid-block__block">
            <div class="rs-grid-block__container">
                <div class="section-header">
                    <div class="section-header__title">
                        <?=get_field('description')?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif;?>
    </section>

<?php get_footer(); ?>
<script>
    jQuery(function($) {
        (function(name) {
            let container = $('#pagination-' + name),
                gallery = <?= json_encode($sources) ?>;
            if (!container.length) return;
            let sources = function () {
                let result = [];
                for (let i = 0; i < gallery.length; i++) {
                    let block ='';
                    block +=`<a href="${gallery[i]['full']}" class="rs-gallery__link" data-fancybox="gallery">`;
                    block +='<div class="rs-gallery__img">';
                    block +=`<img src="${gallery[i]['thumbnail']}" alt="">`;
                    block +='</div>';
                    block +='</a>';
                    result.push(block);
                }
                return result;
            }();
            let options = {
                dataSource: sources,
                pageSize: 8,
                callback: function (response, pagination) {
                  //  window.console && console.log(response, pagination);
                    var dataHtml = '';
                    $.each(response, function (index, item) {
                        dataHtml += '<div class="rs-gallery__item">' + item + '</div>';
                    });
                    dataHtml += '';
                    container.prev().html(dataHtml);
                }
            };

            /*container.addHook('beforeInit', function () {
                window.console && console.log('beforeInit...');
            });*/
            container.pagination(options);

            /*container.addHook('beforePageOnClick', function () {
                window.console && console.log('beforePageOnClick...');
                //return false
            });*/
        })('albom');
    })
</script>
