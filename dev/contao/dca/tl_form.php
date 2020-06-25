<?php

$GLOBALS['TL_DCA']['tl_form']['fields']['gridSpan'] = [
    'label' => ['Breite', 'Breite des Elements innerhalb des 12er Rasters'],
    'inputType' => 'select',
    'options' => ['default', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
    'eval' => ['maxlength'=>12, 'tl_class'=>'w50' ],
    'sql' => [
        'type' => 'string',
        'length' => 32,
        'default' => ''
    ],
];

$GLOBALS['TL_DCA']['tl_form']['fields']['gridStart'] = [
    'label' => ['Position', 'Position des Elements im 12er Raster (Breite und Position dürfen zusammen nicht größer als 13 sein)'],
    'inputType' => 'select',
    'options' => ['default', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
    'eval' => ['maxlength'=>12, 'tl_class'=>'w50 clr' ],
    'sql' => [
        'type' => 'string',
        'length' => 32,
        'default' => ''
    ],
];