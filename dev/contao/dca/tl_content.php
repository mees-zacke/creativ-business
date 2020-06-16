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
    ->addField('linkTitle', 'link_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('embed', 'link_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('titleText', 'link_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('rel', 'link_legend', PaletteManipulator::POSITION_APPEND)

    ->applyToPalette('text', 'tl_content')
    ;

$GLOBALS['TL_DCA']['tl_content']['palettes'] = str_replace(',cssID',',gridSpan,gridStart,cssID',$GLOBALS['TL_DCA']['tl_content']['palettes']);

$GLOBALS['TL_DCA']['tl_content']['fields']['gridSpan'] = [
    'label' => ['Breite', 'Breite des Elements innerhalb des 12er Rasters'],
    'inputType' => 'select',
    'options' => ['default', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
    'eval' => ['maxlength'=>12, 'tl_class'=>'w50 clr' ],
    'sql' => [
        'type' => 'string',
        'length' => 32,
        'default' => ''
    ],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['gridStart'] = [
    'label' => ['Position', 'Position des Elements im 12er Raster (Breite und Position dürfen zusammen nicht größergleich 12 sein)'],
    'inputType' => 'select',
    'options' => ['default', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
    'eval' => ['maxlength'=>12, 'tl_class'=>'w50' ],
    'sql' => [
        'type' => 'string',
        'length' => 32,
        'default' => ''
    ],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['linkTo'] = [
    'label'                   => &$GLOBALS['TL_LANG']['MSC']['url'],
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => ['maxlength'=>255, 'dcaPicker'=>true, 'tl_class'=>'w50'],
    'sql'                     => "varchar(255) NOT NULL default ''"

];
