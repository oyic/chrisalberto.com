<?php

namespace Flynt\Components\GridPricing;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

function getACFLayout(): array
{
    return [
        'name' => 'GridPricing',
        'label' => __('Grid: Pricing', 'flynt'),
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
                'label' => __('Description', 'flynt'),
                'instructions' => __('Want to add a description? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 0,
                'media_upload' => 0,
            ],
            [
                'label' => __('Pricing Column Block', 'flynt'),

                'name' => 'packageColumns',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'block',
                'button_label' => __('Add Package', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Package Title', 'flynt'),
                        'name' => 'columnTitle',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Badge Label', 'flynt'),
                        'name' => 'columnBadgeLabel',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Package Image', 'flynt'),
                        'name' => 'columnImage',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'required' => 1,
                        'mime_types' => 'jpg,jpeg,png,svg,webp',

                    ],
                    [
                        'label' => __('Price', 'flynt'),
                        'name' => 'columnPrice',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Price Description', 'flynt'),
                        'name' => 'columnPriceDescription',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Price Features', 'flynt'),
                        'name' => 'packageFeatures',
                        'type' => 'repeater',
                        'layout' => 'block',
                        'button_label' => __('Add Feature', 'flynt'),
                        'sub_fields' => [
                            [
                                'label' => __('Feature', 'flynt'),
                                'name' => 'packageFeature',
                                'type' => 'text',
                            ],
                        ],
                    ],
                    [
                        'label' => __('Column Link', 'flynt'),
                        'name' => 'packageLink',
                        'type' => 'link',
                    ],

                ],
            ],
            FieldVariables\getButtons(),

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
