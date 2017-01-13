<?php
/**
 * Created by PhpStorm.
 * User: miroslawratman
 * Date: 17/12/14
 * Time: 10:27
 */

ERROR_REPORTING(E_ALL);
require_once __DIR__ . '/../loader.php';
require_once __DIR__ . '/Doctrine2Test.php';

$c = new Doctrine2Test();
var_export(
    $c->orderBy()
);
echo "<br>";
var_export(
    $c->orderByWrong()
);
