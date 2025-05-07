<?php
defined("_Rosait2025") or die("Доступ запрещён");

//Блок с переключателями
function rs_tabs($content,$key=0){
    add_action( 'wp_footer', 'rs_tabs_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $tabs = $content["tabs"];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-tabs <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-tabs__container">
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
            <?php if(is_array($tabs) && !empty($tabs)):?>
            <div data-tabs="991.98, max" data-tabs-animate="500" class="tabs">
                <nav data-tabs-titles class="tabs__navigation">
                    <?php foreach ($tabs as $key=> $tab):?>
                    <button type="button" class="tabs__title <?=$key==0?'_tab-active':''?>">
                        <?=$tab['tab_title']?>
                        <i class="tabs__icon">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M8.82082 1.91016L5 5.73098L1.17918 1.91016L0 3.0893L5 8.0893L10 3.0893L8.82082 1.91016Z"
                                        fill="#fff" />
                            </svg>
                        </i>
                    </button>
                    <?php endforeach;?>
                </nav>

                <div data-tabs-body class="tabs__content">
                    <?php foreach ($tabs as $key=> $tab):
                        $link=$tab['link'];
                        ?>
                    <div class="tabs__body">
                        <?php switch($tab['type_tab']["value"]):
                            case 'txt':
                            ?>
                                <div class="tabs__wrapper">
                                    <div class="tabs__text">
                                        <?php if(!empty($tab['title'])):?>
                                        <h4><?=$tab['title']?></h4>
                                        <?php endif;?>
                                        <?=$tab['content']?>
                                        <?php if(!empty($link) && is_array($link)):?>
                                        <a href="<?=$link['url']?>" class="rs-btn _btn-primary"><?=$link['title']?></a>
                                        <?php endif;?>
                                    </div>
                                    <?php if($tab['img']):?>
                                    <div class="tabs__img">
                                        <img src="<?=$tab['img']?>" alt="">
                                    </div>
                                    <?php endif;?>
                                </div>
                            <?php break;
                            case 'map':
                                ?>
                                    <?php if(!empty($tab['title'])):?>
                                    <h4><?=$tab['title']?></h4>
                                <?php endif;?>
                                    <?=$tab['content']?>
                                    <?php if(!empty($link) && is_array($link)):?>
                                    <a href="<?=$link['url']?>" class="rs-btn _btn-primary"><?=$link['title']?></a>
                                <?php endif;?>
                                    <div class="tabs__map"><?=$tab['map']?></div>
                                <?php break;
                            case 'video':
                                    $gallery = $tab['gallery'];
                                ?>
                                    <?php if(!empty($tab['title'])):?>
                                    <h4><?=$tab['title']?></h4>
                                    <?php endif;?>
                                    <?=$tab['content']?>
                                    <?php if(!empty($gallery) && is_array($gallery)): ?>
                                        <div class="tabs__gallery">
                                            <div class="tabs__gallery_list">
                                                <?php foreach ($gallery as $item):?>
                                                <div class="tabs__gallery_item">
                                                    <a href="<?=$item['link']?>"
                                                       data-fancybox="gallery3">
                                                        <div class="tabs__gallery_img">
                                                            <img src="<?=$item['poster']?>" alt="">
                                                        </div>
                                                    </a>
                                                </div>
                                                <?php endforeach;?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(!empty($link) && is_array($link)):?>
                                    <a href="<?=$link['url']?>" class="rs-btn _btn-primary"><?=$link['title']?></a>
                                    <?php endif;?>
                                <?php break ;
                            case 'table':
                                    $table = $tab['table'];
                                ?>
                                    <?php if(!empty($tab['title'])):?>
                                    <h4><?=$tab['title']?></h4>
                                    <?php endif;?>
                                    <?=$tab['content']?>
                                    <?php if(!empty($table)): ?>
                                        <div class="table">
                                            <?php
                                            echo '<table>';

                                            if ( ! empty( $table['caption'] ) ) {

                                                echo '<caption>' . $table['caption'] . '</caption>';
                                            }

                                            if ( ! empty( $table['header'] ) ) {

                                                echo '<thead>';

                                                echo '<tr>';

                                                foreach ( $table['header'] as $th ) {

                                                    echo '<th>';
                                                    echo $th['c'];
                                                    echo '</th>';
                                                }

                                                echo '</tr>';

                                                echo '</thead>';
                                            }

                                            echo '<tbody>';

                                            foreach ( $table['body'] as $tr ) {

                                                echo '<tr>';

                                                foreach ( $tr as $td ) {

                                                    echo '<td>';
                                                    echo $td['c'];
                                                    echo '</td>';
                                                }

                                                echo '</tr>';
                                            }

                                            echo '</tbody>';

                                            echo '</table>';
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                <?php break ?>
                        <?php endswitch; ?>
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

//Блок «Аккордеон»
function rs_accordion($content,$key=0){
    add_action( 'wp_footer', 'rs_accordion_style');
    $bg_img = $content['on_background_img']?$content['background_img']:false;
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $items = $content['items'];
    $blockquote = $content['on_blockquote']?$content['blockquote']:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
<section id="<?=$anchor?>" class="rs-accordion <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
    <?php if($bg_img ):?>
        <div class="rs-accordion__bg">
            <?=$bg_img['svg']?>
        </div>
    <?php endif;?>
    <div class="rs-accordion__container">
        <div class="rs-accordion__wrapper">
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
            <?php if(is_array($items)):?>
            <div data-spollers data-one-spoller class="rs-accordion__spollers">
            <?php foreach ($items as $k => $item):?>
                <div class="rs-accordion__spollers_item">
                    <button type="button" data-spoller class="rs-accordion__spollers_title <?=$k==0?'_spoller-active':''?>">
                        <?=$item['title']?>
                        <i class="rs-accordion__spollers_icon">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M8.82082 1.91016L5 5.73098L1.17918 1.91016L0 3.0893L5 8.0893L10 3.0893L8.82082 1.91016Z"
                                        fill="#33354D" />
                            </svg>
                        </i>
                    </button>
                    <div class="rs-accordion__spollers_body">
                        <?=$item['description']?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php if($blockquote):?>
            <blockquote>
                <?php if(!empty($blockquote['title'])):?>
                    <h5><?=$blockquote['title']?></h5>
                <?php endif; ?>
                <?php if(!empty($blockquote['description'])):?>
                    <?=$blockquote['description']?>
                <?php endif; ?>
        <?php if($blockquote['on_btn']):
            $buttons = $blockquote['buttons']
            ?>
            <?php if(is_array($buttons)):
                foreach ($buttons as $button):
                    if($button['type'] == 'link'):
                        $link=$button['link'];
                        ?>
                        <a href="<?=$link['url']?>" class="rs-btn _btn-border-primary"><?=$link['title']?></a>
                    <?php endif;
                    if($button['type'] == 'modal'):
                        ?>
                        <a href="#" class="rs-btn _btn-border-primary" data-popup="#<?=$button['modal']?>"><?=$button['btn_title']?></a>
                    <?php
                    endif;
                endforeach;
            endif; ?>
        <?php endif; ?>
            </blockquote>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php }

//Блок «Документы»
function rs_documents($content,$key=0){
    add_action( 'wp_footer', 'rs_documents_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $items = $content['items_documents'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-documents <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?> >
        <div class="rs-documents__container">
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

            <?php if(is_array($items)): ?>
            <div class="rs-documents__list">
            <?php foreach ($items as $doc):
                $file = $doc["item"];
                $size =  FileSizeConvert($file["filesize"]);
                ?>
                <div class="rs-documents__item">
                    <a href="<?=$file['url']?>" target="_blank" class="rs-documents__link" <?php if( $doc["on_download"]):?> download <?php endif;?> >
                        <div class="rs-documents__format">
                            <?= pathinfo($file['filename'], PATHINFO_EXTENSION)?>
                        </div>
                        <div class="rs-documents__desc">
                            <h4><?=$file['title']?></h4>
                            <p><?=$size?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

<?php }

//Блок «Прайс»
function   rs_tariff($content,$key=0){
    add_action( 'wp_footer', 'rs_tariff_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $tariffs= $content['tariff'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-tariff <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-tariff__container">

            <div class="rs-tariff__desktop">
                <div class="rs-tariff__top">

                    <div class="rs-tariff__title">
                        <?php if(!empty($content["blocks_title"])):?>
                            <h2><?=$content["blocks_title"]?></h2>
                        <?php endif; ?>
                        <?php if(!empty($content["description"])):?>
                            <p><?=$content['description']?></p>
                        <?php endif; ?>
                    </div>
                    <?php if(is_array($tariffs)):
                        $table=array();
                        $table_btn=array();
                        ?>
                    <?php foreach ($tariffs as $key =>$tariff):
                            $properties = $tariff['tariff'];
                            $table_btn[$key]=$tariff['link'];
                            foreach($properties as $k=>$property){
                                $index=explode('_',$property['tariff_item']['value'])[1];
                                $table[$index]['label']=$property['tariff_item']['label'];
                                $table[$index]['value'][$key] = $property['on_txt']?$property['value']:true;
                            }



                            ?>
                    <div class="rs-tariff__head">
                        <?php if(!empty($tariff['title'])):?>
                        <h5><?=$tariff['title']?></h5>
                        <?php endif;?>
                        <?php if(!empty($tariff['price'])):?>
                        <h5><?=$tariff['price']?></h5>
                        <?php endif;?>
                        <?php if(!empty($tariff['description'])):?>
                        <div class="rs-tariff__head_desc">
                            <p><?=$tariff['description']?></p>
                            <?php if(!empty($tariff['tooltip'])):?>
                            <div class="tooltip">
                                <button type="button" class="tooltip__btn">
                                    <svg width="23" height="22" viewBox="0 0 23 22" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                                d="M11.4633 11.8333C12.5745 10.7222 13.6855 10.2829 13.6855 9.05556C13.6855 7.82826 12.6906 6.83333 11.4633 6.83333C10.4279 6.83333 9.5578 7.54154 9.31111 8.5M11.4633 15.1667H11.4745M21.5 11C21.5 16.5228 17.0228 21 11.5 21C5.97715 21 1.5 16.5228 1.5 11C1.5 5.47715 5.97715 1 11.5 1C17.0228 1 21.5 5.47715 21.5 11Z"
                                                stroke="#25C16F" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </button>
                                <div class="tooltip__modal _arrow-top"><?=$tariff['tooltip']?></div>
                            </div>
                            <?php endif;?>
                        </div>
                        <?php endif;?>
                    </div>
                    <?php endforeach;?>
                    <?php
                        ksort($table);
                    endif; ?>
                </div>
                <?php if(is_array($tariffs) && !empty($table)):?>
                <div class="rs-tariff__body">
                    <div class="rs-tariff__about">
                        <?php foreach ($table as $key=>$item):?>
                        <div class="rs-tariff__about_row">
                            <div class="rs-tariff__about_item">
                                <p><?=$item["label"]?></p>
                            </div>
                            <?php for ($i = 0; $i < count($tariffs); $i++) {
                                $value=$item['value'][$i];?>
                            <div class="rs-tariff__about_item">
                                <?php  if($value):
                                        if(is_bool ($value)):?>
                                            <img src="<?=get_stylesheet_directory_uri()?>/img/blocks/tariff/check.svg" alt="">
                                        <?php else:?>
                                            <p><?=$value?></p>
                                        <?php endif;?>
                                <?php else:?>
                                    <img src="<?=get_stylesheet_directory_uri()?>/img/blocks/tariff/close.svg" alt="">
                           <?php endif;?>
                            </div>
                            <?php }  ?>
                        </div>
                        <?php endforeach;?>

                        <?php if(is_array($table_btn)):?>
                        <div class="rs-tariff__about_row">
                            <div class="rs-tariff__about_item">
                            </div>
                            <?php for ($i = 0; $i < count($tariffs); $i++) {
                                $link=$table_btn[$i];?>
                                <div class="rs-tariff__about_item">
                                    <?php if(!empty($link) && is_array($link)):?>
                                    <a href="<?=$link['url']?>" class="rs-btn _btn-primary"><?=$link['title']?></a>
                                    <?php endif; ?>
                                </div>
                            <?php }  ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="rs-tariff__mobile">
                <?php if(!empty($content["blocks_title"])):?>
                    <h2><?=$content["blocks_title"]?></h2>
                <?php endif; ?>
                <?php if(!empty($content["description"])):?>
                    <p><?=$content['description']?></p>
                <?php endif; ?>
            <?php if(is_array($tariffs)):?>
                <div data-spollers data-one-spoller class="rs-tariff__spollers">
                <?php foreach ($tariffs as $key =>$tariff):
                    $link = $tariff["link"];
                    ?>
                    <div class="rs-tariff__spollers_item">
                        <div class="rs-tariff__spollers_head">
                            <?php if(!empty($tariff['title'])):?>
                                <h4><?=$tariff['title']?></h4>
                            <?php endif;?>
                            <?php if(!empty($tariff['price'])):?>
                                <h5><?=$tariff['price']?></h5>
                            <?php endif;?>
                            <?php if(!empty($tariff['description'])):?>
                                <div class="rs-tariff__spollers_head-desc">
                                    <p><?=$tariff['description']?></p>
                                    <?php if(!empty($tariff['tooltip'])):?>
                                        <div class="tooltip">
                                            <button type="button" class="tooltip__btn">
                                                <svg width="23" height="22" viewBox="0 0 23 22" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                            d="M11.4633 11.8333C12.5745 10.7222 13.6855 10.2829 13.6855 9.05556C13.6855 7.82826 12.6906 6.83333 11.4633 6.83333C10.4279 6.83333 9.5578 7.54154 9.31111 8.5M11.4633 15.1667H11.4745M21.5 11C21.5 16.5228 17.0228 21 11.5 21C5.97715 21 1.5 16.5228 1.5 11C1.5 5.47715 5.97715 1 11.5 1C17.0228 1 21.5 5.47715 21.5 11Z"
                                                            stroke="#25C16F" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </button>
                                            <div class="tooltip__modal _arrow-top"><?=$tariff['tooltip']?></div>
                                        </div>
                                    <?php endif;?>
                                </div>
                            <?php endif;?>
                        </div>
                <?php if(!empty($tariff['tariff']) && is_array($tariff['tariff'])):?>
                        <div class="rs-tariff__spollers_body">
                            <ul>
                                <?php foreach ($tariff['tariff'] as $item):?>
                                <li><?=$item['tariff_item']['label']?><?= $item["on_txt"]?" (".$item["value"].")":'';?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                <?php endif;?>

                        <div class="rs-tariff__spollers_footer">
                            <button type="button" data-spoller
                                    class="rs-tariff__spollers_title">описание</button>
                            <?php if(!empty($link) && is_array($link)):?>
                            <a href="<?=$link['url']?>" class="rs-btn _btn-primary"><?=$link['title']?></a>
                            <?php endif;?>
                        </div>

                    </div>
                <?php endforeach;?>
                </div>
            <?php endif;?>
            </div>

        </div>
    </section>
<?php }