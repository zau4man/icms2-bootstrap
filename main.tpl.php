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

        <div class="container flexblock">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    
                    <a class="navbar-brand" href="/"><?php echo html_image($this->options['logo'], 'micro'); ?><?php echo $this->options['logotext']; ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        
                        <?php $this->widgets('header',false,'wrapper_plain'); ?>
                        
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search">
                            <button class="btn my-2 my-sm-0" type="submit">Поиск</button>
                        </form>
                    </div>
                </nav>
            </header>
            <main role="main" class="container content">
                <div class="row">

                    <div class="col-sm-9">

                        <?php
                        $messages = cmsUser::getSessionMessages();
                        if ($messages) {
                            ?>
                            <div class="sess_messages">
                                <?php foreach ($messages as $message) { ?>
                                    <div class="<?php echo $message['class']; ?>"><?php echo $message['text']; ?></div>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if ($this->isBody()) { ?>
                            <article>
                                <?php if ($config->show_breadcrumbs && $core->uri && $this->isBreadcrumbs()) { ?>
                                    <div id="breadcrumbs">
                                        <?php $this->breadcrumbs(array('strip_last' => false)); ?>
                                    </div>
                                <?php } ?>
                                <div id="controller_wrap">
                                    <?php $this->block('before_body'); ?>
                                    <?php $this->body(); ?>
                                </div>
                            </article>
                        <?php } ?>

                    </div>
                    <div class="col-sm"></div>
                </div>
            </main>
            <footer class="footer">
                  <div class="container">
                    <span class="text-muted">Place sticky footer content here.</span>
                  </div>
                </footer>
        </div>

    </body>
</html>