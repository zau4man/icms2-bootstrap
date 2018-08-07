<?php $core = cmsCore::getInstance(); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php $this->title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->addMainCSS("templates/{$this->name}/css/bootstrap.min.css"); ?>
    <?php $this->addMainCSS("templates/{$this->name}/css/styles.css"); ?>
    <?php $this->addMainJS("templates/default/js/jquery.js"); ?>
    <?php $this->addMainJS("templates/{$this->name}/js/bootstrap.min.js"); ?>
    <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/livingston-css3-mediaqueries-js/1.0.0/css3-mediaqueries.min.js"></script>
    <![endif]-->
    <?php $this->head(); ?>
    <meta name="csrf-token" content="<?php echo cmsForm::getCSRFToken(); ?>" />
</head>
<body id="<?php echo $device_type; ?>_device_type">



</body>
</html>