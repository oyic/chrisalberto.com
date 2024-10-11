<?php

namespace Flynt\Components\BlockAccordion;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'BlockAccordion',
        'label' => __('Block:Accordion History', 'flynt'),
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
                'label' => __('Accordion History Sections', 'flynt'),
                'name' => 'accordionSections',
                'type' => 'repeater',
                'layout' => 'row',
                'min' => 1,
                'button_label' => __('Add Accordion Section', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Section Title', 'flynt'),
                        'name' => 'sectionTitle',
                        'type' => 'text',

                    ],
                    [
                        'label' => __('Section Date', 'flynt'),
                        'name' => 'sectionDate',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Section Subtitle', 'flynt'),
                        'name' => 'sectionSubtitle',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Panel Items', 'flynt'),
                        'name' => 'panelItems',
                        'type' => 'repeater',
                        'type' => 'repeater',
                        'layout' => 'row',
                        'min' => 1,
                        'button_label' => __('Add Panel Items', 'flynt'),
                        'sub_fields' => [

                            [
                                'label' => __('Panel Title', 'flynt'),
                                'name' => 'panelTitle',
                                'type' => 'text',
                                'required' => 1,
                            ],
                            [
                                'label' => __('Panel Content', 'flynt'),
                                'name' => 'panelContent',
                                'type' => 'wysiwyg',
                                'tabs' => 'visual,text',
                                'media_upload' => 0,
                                'delay' => 1,
                            ],
                        ]
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
