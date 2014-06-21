
<div class="col-sm-3 col-md-2 sidebar">
    <?php
    if($this->Session->check('Auth.User')){?>
    <ul class="nav nav-sidebar">
        <li><?php echo $this->Html->link('Nový úkol', array('controller' => 'tasks', 'action' => 'taskAdd')); ?></li>
        <li><?php echo $this->Html->link( "Logout",   array('controller' => 'users', 'action'=>'logout') ); } ?></li>
    </ul>
</div>

