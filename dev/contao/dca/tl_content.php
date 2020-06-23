<?php

// H2 als standard bei Überschriften setzen
$GLOBALS['TL_DCA']['tl_content']['fields']['headline']['default'] = array('unit'=>'h2', 'value'=>'');
$GLOBALS['TL_DCA']['tl_content']['fields']['headline']['eval']['allowHtml'] = true;

// Link Picker in Text Elementen


use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()

    ->addLegend('link_legend', 'expert_legend', PaletteManipulator::POSITION_BEFORE)

    ->addField('linkTo', 'link_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('target', 'link_legend', PaletteManipulator::POSITION_APPEND)

    ->applyToPalette('text', 'tl_content')
    ->applyToPalette('headline', 'tl_content')
    ;

$GLOBALS['TL_DCA']['tl_content']['fields']['linkTo'] = [
    'label'                   => &$GLOBALS['TL_LANG']['MSC']['url'],
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => ['maxlength'=>255, 'dcaPicker'=>true, 'tl_class'=>'w50'],
    'sql'                     => "varchar(255) NOT NULL default ''"

];

// Auswählbare Position und Breite von Inhaltselementen

$GLOBALS['TL_DCA']['tl_content']['palettes'] = str_replace(',type',',type,gridStart,gridSpan',$GLOBALS['TL_DCA']['tl_content']['palettes']);

$GLOBALS['TL_DCA']['tl_content']['fields']['gridSpan'] = [
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

$GLOBALS['TL_DCA']['tl_content']['fields']['gridStart'] = [
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

// Auswählbare Bildbreite und Bildposition im Element

PaletteManipulator::create()

    ->addField('imagePosition', 'singleSRC' , PaletteManipulator::POSITION_AFTER)
    ->addField('imageSpan', 'imagePosition' , PaletteManipulator::POSITION_AFTER)

    ->applytoSubpalette('addImage', 'tl_content')
;


$GLOBALS['TL_DCA']['tl_content']['fields']['imageSpan'] = [
    'label' => ['Bildbreite', 'Breite des Bildes im Elementraster (Muss kleiner sein als Elementbreite - 3)'],
    'inputType' => 'select',
    'options' => ['default', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
    'eval' => ['tl_class'=>'w50' ],
    'sql' => [
        'type' => 'string',
        'length' => 32,
        'default' => ''
    ],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['imagePosition'] = [
    'label' => ['Bildposition', 'Position des Bildes vom Text'],
    'inputType' => 'select',
    'options' => ['keine Ausrichtung','links', 'rechts'],
    'eval' => ['tl_class'=>'w50 clr' ],
    'sql' => [
        'type' => 'string',
        'length' => 32,
        'default' => ''
    ],
];
