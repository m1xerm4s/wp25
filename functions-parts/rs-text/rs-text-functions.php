<?php
defined("_Rosait2025") or die("Доступ запрещён");

//Текстовый блок (текст + картинка)
function rs_text_block($content,$key=0){
    add_action( 'wp_footer', 'rs_text_block_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $block_text = $content['items_text'];
    $settings = $block_text['settings'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-text-block <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?> >
        <div class="rs-text-block__container">
            <div class="rs-text-block__wrapper">
                <?php if(!$settings['position']):?>
                    <div class="rs-text-block__item">
                        <div class="rs-text-block__picture">
                            <div class="rs-text-block__img">
                                <img src="<?=$settings['img']?>" alt="<?=$settings['label']?>">
                            </div>
                            <?php if(!empty($settings['label'])):?>
                                <div class="rs-text-block__label">
                                    <?=$settings['label']?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="rs-text-block__item rs-text-block__item-desc">
                    <div class="rs-text-block__desc">
                        <?php if(!empty($content["blocks_title"])):?>
                            <h2><?=$content["blocks_title"]?></h2>
                        <?php endif; ?>
                        <?=$block_text["text"]?>
                    </div>
                </div>
                <?php if($settings['position']):?>
                    <div class="rs-text-block__item">
                        <div class="rs-text-block__picture">
                            <div class="rs-text-block__img">
                                <img src="<?=$settings['img']?>" alt="<?=$settings['label']?>">
                            </div>
                            <?php if(!empty($settings['label'])):?>
                            <div class="rs-text-block__label">
                                <?=$settings['label']?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php }

//Вывод Содержимого страницы
function rs_content($content,$key=0){
    add_action( 'wp_footer', 'rs_text_block_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-text-block <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?> >
        <div class="rs-text-block__container">
            <?php if (!empty($content["blocks_title"]) || !empty($content["description"])): ?>
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
            <?php endif; ?>
            <?php echo get_the_content();?>
        </div>
    </section>
<?php }

//Таблица
function rs_table($content,$key=0){
    //Для подключения стилей блока
    //add_action( 'wp_footer', 'rs_text_block_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $table = $content['table'];
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-table <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-table__container">
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
        </div>
    </section>
<?php }