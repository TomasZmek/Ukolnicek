    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User', array('class'=>'form-horizontal')); ?>
        <legend><?php echo __('Login'); ?></legend>
        <div class="form-group">
            <?php echo $this->Form->label('username', 'Uživatelské jméno', array(
                'class' => 'col-sm-2 control-label',

            )) ?>
            <div class="col-sm-5">
                <?php echo $this->Form->input('username', array(
                    'label'=>false,
                    'class' => 'form-control')); ?>
        </div>
            </div>
    <div class="form-group">
        <?php echo $this->Form->label('password', 'Heslo', array(
            'class' => 'col-sm-2 control-label',

        )) ?>
        <div class="col-sm-5">
        <?php echo $this->Form->input('password', array(
            'label'=>false,
            'class' => 'form-control'));
        ?>
        </div>
        </div>

    <?php echo $this->Form->end(__('Login')); ?>
