<?php $listed = array(); ?>
<nav aria-label="breadcrumb">
<ol class="breadcrumb rounded-0">

    <li class="breadcrumb-item">
        <a href="<?php echo $options['home_url']; ?>" title="<?php echo LANG_HOME; ?>">Главная</a>
    </li>

    <?php if ($breadcrumbs) { ?>

        <?php foreach($breadcrumbs as $id=>$item){ ?>

            <?php if (in_array($item['href'], $listed)){ continue; } ?>

            <li <?php if (!isset($item['is_last'])){ ?>itemscope itemtype="http://data-vocabulary.org/Breadcrumb"<?php } ?> class="breadcrumb-item">
                <?php if (!isset($item['is_last'])){ ?>
                    <a href="<?php html($item['href']); ?>" itemprop="url"><span itemprop="title"><?php html($item['title']); ?></span></a>
                <?php } else { ?>
                    <span><?php html($item['title']); ?></span>
                <?php } ?>
            </li>

            <?php $listed[] = $item['href']; ?>

        <?php } ?>

    <?php } ?>
</ol>
</nav>