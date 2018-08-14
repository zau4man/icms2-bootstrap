<?php if(!isset($ds_prefix)){ $ds_prefix = '/'; } ?>
<div class="content_datasets mb-3">
    <ul class="nav nav-tabs">
        <?php $ds_counter = 0; ?>
        <?php foreach($datasets as $set){ ?>
            <?php $ds_selected = ($dataset_name == $set['name'] || (!$dataset_name && $ds_counter==0)); ?>
            <li class="nav-item <?php if ($ds_selected){ ?>active <?php } ?><?php echo $set['name'].(!empty($set['target_controller']) ? '_'.$set['target_controller'] : ''); ?>">

                <?php $ds_url = sprintf($base_ds_url, ($ds_counter > 0 ? $ds_prefix.$set['name'] : '')); ?>

                <?php if ($ds_selected){ ?>
                    <a class="nav-link active" href="#"><?php echo $set['title']; ?></a>
                <?php } else { ?>
                    <a class="nav-link" href="<?php echo $ds_url; ?>"><?php echo $set['title']; ?></a>
                <?php } ?>

            </li>
            <?php $ds_counter++; ?>
        <?php } ?>
    </ul>
</div>
<?php if (!empty($current_dataset['description'])){ ?>
    <div class="content_datasets_description">
        <?php echo $current_dataset['description']; ?>
    </div>
<?php } ?>