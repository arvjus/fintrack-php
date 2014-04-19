<?php
/**
 * Created by PhpStorm.
 * User: arju
 * Date: 19/04/14
 * Time: 23:51
 */
return array(
    'default' => 'sqlite',
    'connections' => array(
        'sqlite' => array(
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => ''
        ),
    )
);