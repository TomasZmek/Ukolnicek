<div class="form-group">

    <?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username' , array(
            'class' => 'form-control'));
        echo $this->Form->input('email' , array(
            'class' => 'form-control'));
        echo $this->Form->input('password', array(
            'class' => 'form-control'));
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password', 'class' => 'form-control'));
        echo $this->Form->input('role', array(
            'options' => array( 'admin' => 'Administrátro', 'manager' => 'Správce', 'uzivatel' => 'Uživatel'), 'class' => 'form-control'
        ));

        echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Click here to add the user') );
        ?>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>
<?php
if($this->Session->check('Auth.User')){
    echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') );
    echo "<br>";
    echo $this->Html->link( "Logout",   array('action'=>'logout') );
}else{
    echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') );
}
?>