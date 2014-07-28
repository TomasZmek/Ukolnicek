<?php
/**
 * Created by PhpStorm.
 * User: tomas.zmek
 * Date: 7.4.14
 * Time: 11:06
 */

class Task extends AppModel{
    public $name = 'Task';


    /**
     * Propojeni tabulek users a tasks, kdy je tu zavyslost na tasks.author => users.id
     * a tasks.assignee => users.id . V TasksControlleru pak staci volat find('all')
     *
     * @var array
     */
    public $belongsTo = array(

        'Author'=>array(
            'className'=>'User',
            'foreignKey'=>'author'
        ),
        'Assignee'=>array(
            'className'=>'User',
            'foreignKey'=>'assignee'
        ),
        'Category' =>array(
            'className' => 'Category',
            'foreignKey'=>'category'
        )
    );

    public $validate = array(
        'name' => array(
            'rule'=>'notEmpty',
            'message' => 'Uveďte název úkolu'
        ),
        'description'=>array(
            'rule'=>'notEmpty',
            'message' => 'Uveďte popis úkolu',
        )
    );

}