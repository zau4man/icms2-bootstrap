<?php if ($items){ ?>

    <div class="widget_content_list media-list">
        <?php foreach($items as $item) { ?>

            <?php
                $url        = href_to($ctype['name'], $item['slug'] . '.html');
                $is_private = $item['is_private'] && $hide_except_title && !$item['user']['is_friend'];
                $image      = (($image_field && !empty($item[$image_field])) ? $item[$image_field] : '');
                if ($is_private) {
                    if($image_field && !empty($item[$image_field])){
                        $image = default_images('private', 'small');
                    }
                    $url    = '';
                }
            ?>

            <div class="media">
                <?php if ($image) { ?>

                        <?php if ($url) { ?>
                            <a class="pr-3" href="<?php echo $url; ?>"><?php echo html_image($image, 'small', $item['title']); ?></a>
                        <?php } else { ?>
                            <?php echo html_image($image, 'small', $item['title']); ?>
                        <?php } ?>
                <?php } ?>
                <div class="media-body">
                    <div class="title">
                        <?php if ($url) { ?>
                        <h5><a href="<?php echo $url; ?>"><?php html($item['title']); ?></a></h5>
                        <?php } else { ?>
                            <h5><?php html($item['title']); ?></h5>
                        <?php } ?>
                        <?php if ($item['is_private']) { ?>
                            <span class="is_private" title="<?php html(LANG_PRIVACY_HINT); ?>"></span>
                        <?php } ?>
                    </div>
                    <?php if ($teaser_field && !empty($item[$teaser_field])) { ?>
                        <div class="teaser">
                            <?php if (!$is_private) { ?>
                                <?php echo string_short($item[$teaser_field], $teaser_len); ?>
                            <?php } else { ?>
                                <!--noindex--><div class="private_field_hint"><?php echo LANG_PRIVACY_PRIVATE_HINT; ?></div><!--/noindex-->
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if ($is_show_details) { ?>
                        <div class="details">
                            <span class="date">
                                <i class="far fa-clock"></i> <?php html(string_date_age_max($item['date_pub'], true)); ?>
                            </span>
                            <?php if($ctype['is_comments']){ ?>
                            <span class="comments">
                                    <?php if ($url) { ?>
                                        <a href="<?php echo $url . '#comments'; ?>" title="<?php echo LANG_COMMENTS; ?>">
                                            <i class="fas fa-comments"></i> <?php echo intval($item['comments']); ?>
                                        </a>
                                    <?php } else { ?>
                                        <i class="fas fa-comments"></i> <?php echo intval($item['comments']); ?>
                                    <?php } ?>
                                </span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

        <?php } ?>
    </div>

<?php } ?>