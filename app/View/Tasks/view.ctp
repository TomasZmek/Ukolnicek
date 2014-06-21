<h1><?php echo h($task['Task']['name']); ?></h1>
<p><small>Vytvořen: <?php echo $this->Time->format($task['Task']['created'], '%d.%m.%Y') ?> , Termín: <?php echo $this->Time->format($task['Task']['term'], '%d.%m.%Y') ?>, Zpracovatel: <?php echo $task['Assignee']['username'] ?>
    Kategori: <?php echo $task['Category']['name'] ?></small></p>
<p><?php echo $this->Text->autoParagraph(($task['Task']['description'])); ?></p>
<p><?php echo $this->Html->link(
        '<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-check"></span> Uzavřít</button>',
        array('action'=>'taskDone', $task['Task']['id']),
        array('escape' => false)) ?></p>