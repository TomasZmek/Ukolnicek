<h2 class="sub-header">Dostupné úkoly</h2>
<div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <td>Id</td>
                <td>Jméno</td>
                <td>Autor</td>
                <td>Zpracovatel</td>
                <td>Vytvořen</td>
                <td>Termín</td>
                <td>Dokončen</td>
                <td>Akce</td>
            </tr>
            <?php foreach ($tasks as $task): ?>
            <tr>

                <td><?php echo $task['Task']['id'];?></td>
                <td><?php echo $this->Html->link($task['Task']['name'], array('controller' => 'tasks', 'action' => 'view', $task['Task']['id']))?></td>
                <td><?php echo $task['Author']['username']; ?></td>
                <td><?php echo $task['Assignee']['username'] ?></td>
                <td><?php echo $this->Time->format($task['Task']['created'], '%d.%m.%Y') ?></td>
                <td><?php echo $this->Time->format($task['Task']['term'], '%d.%m.%Y') ?></td>
                <td><?php if ($task['Task']['done'] == 1){
                        echo 'ANO';
                    }
                    else{
                        echo 'NE';
                    }

                    ?></td>
                <td><?php
                    echo $this->Html->link(
                        'Upravit',
                        array('action' => 'taskEdit', $task['Task']['id'])
                    );
                    ?>| <?php
                    echo $this->Form->postLink(
                        'Smazat',
                        array('action' => 'taskDelete', $task['Task']['id']),
                        array('confirm' => 'Jste si jistý?')
                    );
                    ?></td>

            </tr>
            <?php endforeach; ?>
            <?php unset($task); ?>
            </table>
    </div>