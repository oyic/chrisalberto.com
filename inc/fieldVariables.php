<?php

/**
 * Defines field variables to be used across multiple components.
 */

namespace Flynt\FieldVariables;

function getTheme($default = ''): array
{
    return [
        'label' => __('Theme', 'flynt'),
        'name' => 'theme',
        'type' => 'select',
        'allow_null' => 0,
        'multiple' => 0,
        'ui' => 0,
        'ajax' => 0,
        'choices' => [
            '' => __('(none)', 'flynt'),
            'light' => __('Light', 'flynt'),
            'dark' => __('Dark', 'flynt'),
        ],
        'default_value' => $default,
    ];
}

function getSize($default = 'medium'): array
{
    return [
        'label' => __('Size', 'flynt'),
        'name' => 'size',
        'type' => 'radio',
        'other_choice' => 0,
        'save_other_choice' => 0,
        'layout' => 'horizontal',
        'choices' => [
            'medium' => __('Medium', 'flynt'),
            'wide' => __('Wide', 'flynt'),
            'full' => __('Full', 'flynt'),
        ],
        'default_value' => $default
    ];
}

function getAlignment($args = []): array
{
    $options = wp_parse_args($args, [
        'label' => __('Align', 'flynt'),
        'name' => 'align',
        'default' => 'center',
    ]);

    return [
        'label' => $options['label'],
        'name' => $options['name'],
        'type' => 'radio',
        'other_choice' => 0,
        'save_other_choice' => 0,
        'layout' => 'horizontal',
        'choices' => [
            'left' => __('Left', 'flynt'),
            'center' => __('Center', 'flynt'),
        ],
        'default_value' => $options['default']
    ];
}

function getTextAlignment($args = []): array
{
    $options = wp_parse_args($args, [
        'label' => __('Align text', 'flynt'),
        'name' => 'textAlign',
        'default' => 'left',
    ]);

    return [
        'label' => $options['label'],
        'name' => $options['name'],
        'type' => 'button_group',
        'choices' => [
            'left' => sprintf('<i class="dashicons dashicons-editor-alignleft" title="%1$s"></i>', __('Align text left', 'flynt')),
            'center' => sprintf('<i class="dashicons dashicons-editor-aligncenter" title="%1$s"></i>', __('Align text center', 'flynt'))
        ],
        'default_value' => $options['default']
    ];
}
function getBackground($args = []): array
{
    return
    [
        [
            'label' => __('Background', 'flynt'),
            'name' => 'backgroundTab',
            'type' => 'tab',
            'placement' => 'Top',
            'endpoint' => 0,
        ],

        [
            'label' => '',
            'name' => 'background',
            'type' => 'group',
            'layout' => 'block',
            'sub_fields' => [
                    [
                        'label' => __('Type', 'flynt'),
                        'name' => 'type',
                        'type' => 'button_group',
                        'aria-label' => __('Type', 'flynt'),
                        'wrapper' => [
                            'width' => 35,
                        ],
                        'choices' => [
                            'none' => '<span class="dashicons dashicons-no" title="None" ></span>',
                            'image' => '<span class="dashicons dashicons-format-image" title="Image" ></span>',
                            'video' => '<span class="dashicons dashicons-format-video" title="Video" ></span>',
                            'color' => '<span class="dashicons dashicons-admin-appearance" title="Color" ></span>',
                        ],
                        'default_value' => 'none',
                        'layout' => 'horizontal'
                    ],

                    [
                        'label' => __('Image', 'flynt'),
                        'name' => 'image',
                        'type' => 'image',
                        'aria-label' => __('Background Image', 'flynt'),
                        'required' => 1,
                        'wrapper' => [
                            'width' => 25
                        ],
                        'library' => 'uploadedTo',
                        'preview_size' => 'medium',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'type',
                                    'operator' => '==',
                                    'value' => 'image',
                                ],

                            ]
                        ],
                    ],
                    [
                        'label' => __('Parallax', 'flynt'),
                        'name' => 'parallax',
                        'type' => 'true_false',
                        'aria-label' => __('Background Image in parallax', 'flynt'),
                        'wrapper' => [
                            'width' => 20
                        ],
                        'ui' => 1,
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'type',
                                    'operator' => '==',
                                    'value' => 'image',
                                ],

                            ],
                        ],
                    ],
                    [
                        'label' => __('Different Image on Mobile', 'flynt'),
                        'name' => 'different_image_on_mobile',
                        'type' => 'true_false',
                        'aria-label' => __('Different Image on Mobile', 'flynt'),
                        'wrapper' => [
                            'width' => 20
                        ],
                        'ui' => 1,
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'type',
                                    'operator' => '==',
                                    'value' => 'image',
                                ],

                            ]
                        ],
                    ],


                    [
                        'label' => __('Mobile Image', 'flynt'),
                        'name' => 'mobile_image',
                        'type' => 'image',
                        'aria-label' => __('Mobile Image', 'flynt'),
                        'required' => 1,
                        'wrapper' => [
                            'width' => 25
                        ],
                        'library' => 'uploadedTo',
                        'preview_size' => 'medium',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'type',
                                    'operator' => '==',
                                    'value' => 'image',
                                ],
                                [
                                    'fieldPath' => 'different_image_on_mobile',
                                    'operator' => '==',
                                    'value' => 1,
                                ],

                            ]
                        ],
                    ],

                    [
                        'label' => __('Video', 'flynt'),
                        'name' => 'video',
                        'type' => 'file',
                        'aria-label' => __('Video', 'flynt'),
                        'required' => 1,
                        'wrapper' => [
                            'width' => 25
                        ],
                        'library' => 'uploadedTo',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'type',
                                    'operator' => '==',
                                    'value' => 'video',
                                ],

                            ]
                        ],
                    ],

                    [
                        'label' => __('Color', 'flynt'),
                        'name' => 'color',
                        'type' => 'select',
                        'aria-label' => __('Color', 'flynt'),
                        'required' => 1,
                        'wrapper' => [
                            'width' => 25
                        ],
                        'choices' => [
                            'light' => __('Light', 'flynt'),
                            'dark' => __('Dark', 'flynt'),
                            'primary' => __('Primary', 'flynt'),
                            'secondary' => __('Secondary', 'flynt'),
                            'tertiary' => __('Tertiary', 'flynt'),
                            'transparent' => __('Transparent', 'flynt'),
                        ],
                        'default_value' => 'transparent',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'type',
                                    'operator' => '==',
                                    'value' => 'color',
                                ],

                            ]
                        ],
                    ],

            ],


        ],
    ];
}

function getTitles($args = []): array
{

    $titles = [
        [
        'label' => __('Title', 'flynt'),
        'name' => 'title',
        'type' => 'text',
        ]
    ];

    if (in_array('uppertitle', $args)) :
        array_unshift($titles, [
            'label' => __('Upper title', 'flynt'),
            'name' => 'uppertitle',
            'type' => 'text',
        ]);
    endif;

    if (in_array('subtitle', $args)) :
        array_push($titles, [
            'label' => __('Subtitle', 'flynt'),
            'name' => 'subtitle',
            'type' => 'text',
        ]);
    endif;


    return
    [
        'label' => '',
        'name' => 'titles',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [
            $titles
        ]
        ];
}

function getButtons($args = []): array
{
    return [
       'label' => __('Click to Actions', 'flynt'),
       'name' => 'CTA_links',
       'type' => 'repeater',
       'layout' => 'table',
       'sub_fields' => [
            [
                'label' => __('Link', 'flynt'),
                'name' => 'link',
                'type' => 'link',
                'required' => 1,
            ],
            [
                'label' => __('Custom Label', 'flynt'),
                'name' => 'customLabel',
                'type' => 'text'
            ],
            [
                'label' => __('Type', 'flynt'),
                'name' => 'button_type',
                'type' => 'select',
                'choices' => [
                    'primary' => __('Primary', 'flynt'),
                    'secondary' => __('Secondary', 'flynt'),
                    'tertiary' => __('Tertiary', 'flynt'),
                    'link' => __('Link', 'flynt'),
                ],
                'default_value' => 'primary'
            ],
       ],
       'max' => 2

    ];
}
