<?php
/**
 * Created by PhpStorm.
 * User: tomas.zmek
 * Date: 4.4.14
 * Time: 13:42
 */
class Assignee extends AppModel{
    public $hasMany = array('Task');
}
