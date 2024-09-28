<?php

namespace Flynt\Components\GridLogoSlider;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

add_filter('Flynt/addComponentData?name=GridLogoSlider', function (array $data): array {
    $data['sliderOptions'] = Options::getTranslatable('SliderOptions');
    $data['jsonData'] = [
        'options' => array_merge($data['sliderOptions'], $data['options']),
    ];
    return $data;
});

function getACFLayout(): array
{
    return [
        'name' => 'GridLogoSlider',
        'label' => __('Grid: Logo Slider', 'flynt'),
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
                'label' => __('Custom Column Block', 'flynt'),

                'name' => 'columns',
                'type' => 'repeater',
                'required' => 1,
                'layout' => 'block',
                'button_label' => __('Add Logo', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Logo Title', 'flynt'),
                        'name' => 'columnTitle',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Logo Image', 'flynt'),
                        'name' => 'columnLogo',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'required' => 1,
                        'mime_types' => 'jpg,jpeg,png,svg,webp',
                    ],
                    [
                        'label' => __('Logo Link', 'flynt'),
                        'name' => 'columnLink',
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
                    FieldVariables\getHeaderSlots(),
                    [
                        'label' => __('Autoplay logo', 'flynt'),
                        'name' => 'autoPlay',
                        'instructions' => __('Autoplay the logos', 'flynt'),
                        'type' => 'true_false',
                        'default_value' => '3',
                        'ui' => 1,
                        'wrapper' => [
                            'width' => '25',
                        ],
                    ],
                    [
                        'label' => __('Autoplay Speed (in milliseconds)', 'flynt'),
                        'name' => 'playspeed',
                        'type' => 'number',
                        'default_value' => '3000',
                        'max' => 7000,
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'autoPlay',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => __('Columns Gap', 'flynt'),
                        'name' => 'columnsGap',
                        'type' => 'select',
                        'choices' => [
                            '0' => '0',
                            '10px' => '10px',
                            '20px' => '20px',
                            '30px' => '30px',
                            '40px' => '40px',
                            '50px' => '50px',
                        ],
                        'default_value' => '30px',
                        'wrapper' => [
                            'width' => '25',
                        ],
                    ],
                    [
                        'label' => __('Columns Alignment', 'flynt'),
                        'name' => 'columnsAlignment',
                        'type' => 'select',
                        'choices' => [
                            'left' => 'Left',
                            'center' => 'Center',
                            'right' => 'Right',
                        ],
                        'default_value' => 'center',
                        'wrapper' => [
                            'width' => '25',
                        ],
                    ],
                    [
                        'label' => __('Card Type', 'flynt'),
                        'instructions' => __('Show as a card with boxes', 'flynt'),
                        'name' => 'asCard',
                        'type' => 'true_false',
                        'ui' => 1,
                        'wrapper' => [
                            'width' => '25',
                        ],
                    ],
                ]
            ]
        ]
    ];
}
