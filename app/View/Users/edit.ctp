<div class="form-group">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php
        echo $this->Form->hidden('id', array('value' => $this->data['User']['id']));
        echo $this->Form->input('username', array( 'readonly' => 'readonly', 'label' => 'Usernames cannot be changed!', 'class' => 'form-control'));
        echo $this->Form->input('email' , array('class' => 'form-control'));
        echo $this->Form->input('password', array('label'=>'Password - Leav empty if not change', 'class' => 'form-control'));
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password', 'class' => 'form-control'));
 
      echo $this->Form->input('role', array(
            'options' => array( 'admin' => 'Administrátro', 'manager' => 'Správce', 'uzivatel' => 'Uživatel'), 'class' => 'form-control'
        ));
        echo $this->Form->submit('Edit User', array('class' => 'form-submit',  'title' => 'Click here to add the user') );
       
        ?>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>
<?php
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') );
?>
<br/>
<?php
echo $this->Html->link( "Logout",   array('action'=>'logout') );
?>