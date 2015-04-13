<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        
        <!-- jQuery Library -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/jquery-1.11.2.min.js"></script>
        
        <!-- CSS Framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/Semantic-UI-1.11.6/dist/semantic.min.css" />
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Semantic-UI-1.11.6/dist/semantic.min.js"></script>
        
        <!-- jQuery ui -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/jquery-ui-1.11.4/jquery-ui.min.css" />
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/jquery-ui-1.11.4/jquery-ui.min.js"></script>
        
        
        <!-- Games Engines -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/games/flash.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/games/flash.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <script>
            $(document).ready(function(){
                $("body").on("keydown", ".number", function(event){
                    var evt   = (event) ? event : window.event;
                    var keyCode = (evt.which) ? evt.which : evt.keyCode;
                    
                    if((keyCode < 48 || keyCode > 57) && keyCode !== 8 && keyCode !== 46 && keyCode !== 110 && (keyCode < 96 || keyCode > 105) && keyCode !== 37 && keyCode !== 39) {
                        return false;
                    }
                    
                    return true;
                });
            });
        </script>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

        <div class="ui horizontal divider">design area</div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
