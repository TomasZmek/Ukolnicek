<?php
/**
 * Created by PhpStorm.
 * User: tomas.zmek
 * Date: 8.4.14
 * Time: 10:24
 */

class Category extends AppModel{
public $belongsTo = array(
    'Category'=>array(
        'className'=>'Task',
        'foreignKey'=>'category'
    )
);
}