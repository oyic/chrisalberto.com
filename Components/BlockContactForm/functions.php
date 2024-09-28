<?php

namespace Flynt\Components\BlockContactForm;

use Flynt\FieldVariables;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=BlockContactForm', function (array $data): array {
    return $data;
});

function getACFLayout(): array
{
    return [
        'name' => 'BlockContactForm',
        'label' => __('Block: Contact Form', 'flynt'),
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
                'label' => __('Text', 'flynt'),
                'instructions' => __('Want to add a description? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 0,
                'media_upload' => 0,
            ],
            [
                'label' => __('Form', 'flynt'),
                'instructions' => __('Contact Form', 'flynt'),
                'post_type' => [



                    'wpcf7_contact_form',


                ],
                'name' => 'formID',
                'type' => 'post_object',
                'required' => 1,
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
                        'label' => __('Simple Header', 'flynt'),
                        'name' => 'simpleHeader',
                        'type' => 'true_false',
                        'ui' => 1,
                    ]
                ]
            ]
        ]
    ];
}

Options::addGlobal('FormContact', [
    [
        'label' => __('Heading', 'flynt'),
        'name' => 'heading',
        'type' => 'text',
    ],
    [
        'label' => __('Address', 'flynt'),
        'name' => 'address',
        'type' => 'wysiwyg',
    ],
    [
        'label' => __('Phone', 'flynt'),
        'name' => 'phone',
        'type' => 'text',
    ],
    [
        'label' => __('Email', 'flynt'),
        'name' => 'email',
        'type' => 'text',
    ],
]);
