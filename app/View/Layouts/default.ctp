<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Úkolníček2: jednoduchý správce úkoklů');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this->Html->css('jquery-ui-1.10.4.custom'); ?>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
        echo $this->Html->css('bootstrap.min');

        echo $this->Html->css('dashboard');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
 </head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <h1><?php echo $this->Html->link('Úkolníček', array('controller'=>'tasks', 'action'=>'index'), array ('class'=>'navbar-brand')) ?></h1>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo $this->Html->link('Úkoly', array('controller' => 'tasks', 'action' => 'index')); ?></li>
                <li><a href="#">Nastavení</a></li>
                <li><a href="#">Profil</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <?php echo $this->element('sidebar');?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            <div class="row placeholders">
                <?php echo $this->Session->flash(); ?>
            </div>



            <?php echo $this->fetch('content'); ?>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
   ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php echo $this->Html->script('jquery-1.10.2'); ?>
<?php echo $this->Html->script('jquery-ui-1.10.4.custom.min'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#select_date").click(function(){
            $("#datepicker").datepicker(
                {
                    dateFormat: 'yy-mm-dd',
                    onSelect: function(dateText, inst){
                        $('#select_date').val(dateText);
                        $("#datepicker").datepicker("destroy");
                    }
                }
            );
        });
    });
</script>

</body>
</html>
