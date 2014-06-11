<h1><?php echo h($task['Task']['name']); ?></h1>
<p><small>Vytvořen: <?php echo $this->Time->format($task['Task']['created'], '%d.%m.%Y') ?> , Termín: <?php echo $this->Time->format($task['Task']['term'], '%d.%m.%Y') ?>, Zpracovatel: <?php echo $task['Assignee']['username'] ?>
    Kategori: <?php echo $task['Category']['name'] ?></small></p>
<p><?php echo h($task['Task']['description']); ?></p>