<div class="card shadow-sm border rounded-0 mb-3 mt-3<?php if ($widget['class_wrap']) { ?> <?php echo $widget['class_wrap'];} ?>">

    <!--Card content-->
    <div class="card-body">
<?php if ($widget['title'] && $is_titles) { ?>
        <h4 class="mb-3 pb-2 border-bottom"><?php echo $widget['title']; ?></h4>
<?php } ?>
        
        <div class="body<?php if ($widget['class']) { ?> <?php echo $widget['class'];} ?>">
            <?php echo $widget['body']; ?>
        </div>

    </div>
    <!--/.Card content-->

</div>