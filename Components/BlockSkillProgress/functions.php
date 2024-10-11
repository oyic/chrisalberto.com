<?php

namespace Flynt\Components\BlockSkillProgress;

use Flynt\FieldVariables;

add_filter('Flynt/addComponentData?name=BlockSkillProgress', function (array $data): array {
    // $data['slug'] = sanitize_title($data['rowItems']['itemTitle']);

    // var_dump($data['rowItems']['itemTitle']);
    foreach ($data['rowItems'] as $key => $item) :
        $data['rowItems'][$key]['slug'] = sanitize_title($item['itemTitle']);
    endforeach;
    return $data;
});

function getACFLayout(): array
{
    return [
        'name' => 'BlockSkillProgress',
        'label' => __('Block:Skill Progress', 'flynt'),
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
                'label' => __('Items', 'flynt'),
                'instructions' => __('Row items', 'flynt'),
                'name' => 'rowItems',
                'type' => 'repeater',
                'min' => 2,
                'layout' => 'block',
                'button_label' => __('Add Row Item', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'itemTitle',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'label' => __('Progress', 'flynt'),
                        'name' => 'itemProgress',
                        'type' => 'range',
                        'required' => 1,
                        'min' => 1,
                        'max' => 10,
                        'step_size' => .5,
                        'default_value' => 3
                    ],
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
