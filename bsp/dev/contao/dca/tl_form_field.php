<?php

$strTable = 'tl_form_field';

$GLOBALS['TL_DCA'][$strTable]['palettes']['upload'] = str_replace(
    ',label',
    ',label,tooltip',
    $GLOBALS['TL_DCA'][$strTable]['palettes']['upload']
);

$GLOBALS['TL_DCA'][$strTable]['fields']['tooltip'] = [
    'label' => ['Tooltip','Hier kannst du einen Tooltip für das Formularfeld angeben.'],
    'exclude' => true,
    'sorting' => true,
    'inputType' => 'textarea',
    'eval' => ['rte'=>'tinyMCE', 'maxlength' => 255, 'tl_class' => 'w50'],
    'sql' => "text NULL"
];