<h2>Přidat úkol</h2>
<?php
/**
 * Formular pridavani noveho tasku.
 * Nutno jeste provest upravy ve validaci
 */
echo $this->Form->create('Task', array(
    'class'=>'form-horizontal'
)); ?>
<div class="form-group">
    <?php echo $this->Form->label('name', 'Název', array(
        'class' => 'col-sm-2 control-label',

    )) ?>
    <div class="col-sm-5">
        <?php echo $this->Form->input('name', array(
        'label'=>false,
        'class' => 'form-control')); ?>
    </div>
</div>
<div class="form-group">
        <?php echo $this->Form->label('assignee', 'Zpracovatel', array(
        'class' => 'col-sm-2 control-label'
    )) ?>
    <div class="col-sm-2">
        <?php echo $this->Form->input('assignee', array(
            'label' => false,
            'class' => 'form-control',
            'options'=>$assignee));
            ?>
    </div>
</div>
<div class="form-group">
    <?php echo $this->Form->label('category', 'Kategorie', array(
        'class' => 'col-sm-2 control-label',
    )) ?>
    <div class="col-sm-2">
    <?php
        echo $this->Form->input('category', array(
            'label' => false,
            'class' => 'form-control',
            'options'=>$category));
    ?>
    </div>
</div>
<div class="form-group row">
    <?php echo $this->Form->label('term', 'Termín', array(
        'class' => 'col-sm-2 control-label',
    )) ?>
    <div class="col-sm-2">
    <?php
//nastaveni terminu dokonceni. Nutne jeste provest lepsi formatovani
echo $this->Form->input('term', array(
    'type'=>'date',
    'label'=> false,
    'error' => false,
    'id' => 'select_date',
    'class' => 'form-control fl tal vat w300p',
    ));
    ?>
    <?php echo $this->Html->div('datepicker_img w100p fl pl460p pa',
        $this->Html->image('datepicker_calendar_icon.gif'),array('id' => 'datepicker_img')); ?>
    <?php echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker')); ?>
        <?php echo $this->Html->div('datepicker fl pl460p pa', ' ' ,array('id' => 'datepicker')); ?>
        <div>&nbsp;</div>
    </div>
</div>
<div class="form-group">
    <?php echo $this->Form->label('description', 'Popis úkolu', array(
        'class' => 'col-sm-2 control-label',

    )) ?>

    <div class="col-sm-4">
    <?php
echo $this->Form->input('description', array(
    'label' => false,
    'class' => 'form-control',
    'rows' => '10'));
echo $this->Form->submit('Uložit', array('class' => 'btn btn-primary'));
$this->Form->end();
    ?>
        </div>
</div>

