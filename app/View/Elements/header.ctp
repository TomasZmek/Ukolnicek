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