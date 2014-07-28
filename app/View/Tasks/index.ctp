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
                        '<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span> Upravit</button>',
                        array('action' => 'taskEdit', $task['Task']['id']),
                        array('escape' => false)) ?> <?php
                    echo $this->Form->Postlink(
                        '<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-trash"></span> Smazat</button>',
                        array('action' => 'taskDelete', $task['Task']['id']),
                        array(
                            'escape' => false,
                            'confirm' => 'Opravdu smazat úkol?')
                        ) ?></td>

            </tr>
            <?php endforeach; ?>
            <?php unset($task); ?>
            </table>
    </div>