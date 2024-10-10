<?php

namespace Flynt\Components\BlockTwoColsWysiwyg;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'BlockTwoColsWysiwyg',
        'label' => __('Block:Two Columns Wysiwyg', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            FieldVariables\getTitles(['subtitle']),
            [
                'label' => __('Row Items', 'flynt'),
                'instructions' => __('Row items', 'flynt'),
                'name' => 'rowItems',
                'type' => 'repeater',
                'min' => 2,
                'layout' => 'block',
                'button_label' => __('Add Row Item', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Column Content', 'flynt'),
                        'name' => 'columnContent',
                        'type' => 'wysiwyg',
                        'delay' => 0,
                        'media_upload' => 0,
                        'required' => 1,
                    ]
                ]
            ],
            FieldVariables\getBackground(),
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getSize(),
                ]
            ]
        ]
    ];
}
