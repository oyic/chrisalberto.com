<?php

namespace Flynt\Components\GridLogoSlider;

use Flynt\FieldVariables;
use Flynt\Utils\Options;
use Timber\Timber;

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
                    // [
                    //     'label' => __('Column Description', 'flynt'),
                    //     'name' => 'columnDescription',
                    //     'type' => 'wysiwyg',
                    //     'delay' => 0,
                    //     'media_upload' => 0,
                    // ],
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
                        'label' => __('Columns per row', 'flynt'),
                        'name' => 'columnsPerRow',
                        'instructions' => __('Determines number of columns', 'flynt'),
                        'type' => 'select',
                        'choices' => [
                            '6' => '2',
                            '4' => '3',
                            '3' => '4',
                            '2' => '5',
                        ],
                        'default_value' => '3',
                        'wrapper' => [
                            'width' => '25',
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
                    [
                        'label' => __('Image as icon', 'flynt'),
                        'name' => 'asIcon',
                        'type' => 'true_false',
                        'ui' => 1,
                        'wrapper' => [
                            'width' => '25',
                        ],
                    ],
                    [
                        'label' => __('Icon Position', 'flynt'),
                        'name' => 'iconPosition',
                        'type' => 'button_group',
                        'choices' => [
                            'left' => sprintf('<i class=\'dashicons dashicons-align-left\' title=\'%1$s\'></i>', __('Icon on the left', 'flynt')),
                            'top' => sprintf('<i class=\'dashicons dashicons-editor-aligncenter\' title=\'%1$s\'></i>', __('Icon on the Top', 'flynt')),
                        ],
                        'default_value' => 'left',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'asIcon',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],

                    ],
                    [
                        'label' => __('Column Link as Button', 'flynt'),
                        'name' => 'asButton',
                        'type' => 'true_false',
                        'ui' => 1,
                        'wrapper' => [
                            'width' => '25',
                        ],
                        'default_value' => 0,
                    ],
                    [
                        'label' => __('Button Style', 'flynt'),
                        'name' => 'buttonStyle',
                        'type' => 'select',
                        'choices' => [
                            'primary' => __('Primary', 'flynt'),
                            'secondary' => __('Secondary', 'flynt'),
                            'tertiary' => __('Tertiary', 'flynt'),
                        ],
                        'wrapper' => [
                            'width' => '25',
                        ],
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'asButton',
                                    'operator' => '==',
                                    'value' => '1',
                                ],
                            ],
                        ],
                    ],

                ]
            ]
        ]
    ];
}

// const POST_TYPE = 'post';
// const FILTER_BY_TAXONOMY = 'category';

// add_filter('Flynt/addComponentData?name=GridLogoSlider', function (array $data): array {
//     $data['uuid'] ??= wp_generate_uuid4();
//     $postType = POST_TYPE;
//     $taxonomy = FILTER_BY_TAXONOMY;
//     $terms = get_terms([
//         'taxonomy' => $taxonomy,
//         'hide_empty' => true,
//     ]);
//     $queriedObject = get_queried_object();
//     if (count($terms) > 1) {
//         $data['terms'] = array_map(function ($term) use ($queriedObject) {
//             $timberTerm = Timber::get_term($term);
//             if ($queriedObject->taxonomy ?? null) {
//                 $timberTerm->isActive = $queriedObject->taxonomy === $term->taxonomy && $queriedObject->term_id === $term->term_id;
//             }

//             return $timberTerm;
//         }, $terms);

//         // Add item for all posts
//         array_unshift($data['terms'], [
//             'link' => get_post_type_archive_link($postType),
//             'title' => $data['labels']['allPosts'],
//             'isActive' => is_home() || is_post_type_archive($postType),
//         ]);
//     }

//     if (is_home()) {
//         $data['isHome'] = true;
//         $data['title'] = $queriedObject->post_title ?? get_bloginfo('name');
//     } else {
//         $data['title'] =  get_the_archive_title();
//         $data['description'] = get_the_archive_description();
//     }

//     return $data;
// });

// Options::addGlobal('GridPostsArchive', [
//     [
//         'label' => __('Load More Button?', 'flynt'),
//         'name' => 'loadMore',
//         'type' => 'true_false',
//         'default_value' => 0,
//         'ui' => 1
//     ],
// ]);

// Options::addTranslatable('GridPostsArchive', [
//     [
//         'label' => __('Content', 'flynt'),
//         'name' => 'contentTab',
//         'type' => 'tab',
//         'placement' => 'top',
//         'endpoint' => 0,
//     ],
//     [
//         'label' => __('Title', 'flynt'),
//         'instructions' => __('Want to add a headline? And a paragraph? Go ahead! Or just leave it empty and nothing will be shown.', 'flynt'),
//         'name' => 'preContentHtml',
//         'type' => 'wysiwyg',
//         'tabs' => 'visual,text',
//         'media_upload' => 0,
//         'delay' => 0,
//     ],
//     [
//         'label' => __('Labels', 'flynt'),
//         'name' => 'labelsTab',
//         'type' => 'tab',
//         'placement' => 'top',
//         'endpoint' => 0
//     ],
//     [
//         'label' => '',
//         'name' => 'labels',
//         'type' => 'group',
//         'sub_fields' => [
//             [
//                 'label' => __('Filter by', 'flynt'),
//                 'name' => 'filterBy',
//                 'type' => 'text',
//                 'default_value' => __('Filter by', 'flynt'),
//                 'required' => 1,
//                 'wrapper' => [
//                     'width' => '50',
//                 ],
//             ],
//             [
//                 'label' => __('Previous', 'flynt'),
//                 'name' => 'previous',
//                 'type' => 'text',
//                 'default_value' => __('Prev', 'flynt'),
//                 'required' => 1,
//                 'wrapper' => [
//                     'width' => '50',
//                 ],
//             ],
//             [
//                 'label' => __('Next', 'flynt'),
//                 'name' => 'next',
//                 'type' => 'text',
//                 'default_value' => __('Next', 'flynt'),
//                 'required' => 1,
//                 'wrapper' => [
//                     'width' => '50',
//                 ],
//             ],
//             [
//                 'label' => __('Load More', 'flynt'),
//                 'name' => 'loadMore',
//                 'type' => 'text',
//                 'default_value' => __('Load More', 'flynt'),
//                 'required' => 1,
//                 'wrapper' => [
//                     'width' => '50',
//                 ],
//             ],
//             [
//                 'label' => __('No Posts Found Text', 'flynt'),
//                 'name' => 'noPostsFound',
//                 'type' => 'text',
//                 'default_value' => __('No post found.', 'flynt'),
//                 'required' => 1,
//                 'wrapper' => [
//                     'width' => '50',
//                 ],
//             ],
//             [
//                 'label' => __('All Posts', 'flynt'),
//                 'name' => 'allPosts',
//                 'type' => 'text',
//                 'default_value' => __('All', 'flynt'),
//                 'required' => 1,
//                 'wrapper' => [
//                     'width' => '50',
//                 ],
//             ],
//             [
//                 'label' => __('Reading Time - (20) min read', 'flynt'),
//                 'instructions' => __('%d is placeholder for number of minutes', 'flynt'),
//                 'name' => 'readingTime',
//                 'type' => 'text',
//                 'default_value' => __('%d min read', 'flynt'),
//                 'required' => 1,
//                 'wrapper' => [
//                     'width' => 50
//                 ],
//             ],
//             [
//                 'label' => __('Read More', 'flynt'),
//                 'name' => 'readMore',
//                 'type' => 'text',
//                 'default_value' => __('Read More', 'flynt'),
//                 'required' => 1,
//                 'wrapper' => [
//                     'width' => '50',
//                 ],
//             ]
//         ],
//     ],
//     [
//         'label' => __('Options', 'flynt'),
//         'name' => 'optionsTab',
//         'type' => 'tab',
//         'placement' => 'top',
//         'endpoint' => 0
//     ],
//     [
//         'label' => '',
//         'name' => 'options',
//         'type' => 'group',
//         'layout' => 'row',
//         'sub_fields' => [
//             FieldVariables\getTheme()
//         ]
//     ],
// ]);
