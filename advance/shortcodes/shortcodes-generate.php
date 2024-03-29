<?php
function apollo13_shortcodes()
{
    $shortcodes = array(
        array(
            'id' => 'typography',
            'name' => __('Typography', TPL_SLUG),
            'codes' => array(
                array(
                    'name' => __('Blockquote', TPL_SLUG),
                    'code' => 'blockquote',
                    'fields' => array(
                        array(
                            'name' => __('Align', TPL_SLUG),
                            'id' => 'align',
                            'default' => 'left',
                            'place' => 'attr',
                            'type' => 'select',
                            'options' => array(
                                'left' => 'left',
                                'center' => 'center',
                                'right' => 'right',
                            )
                        ),
                        array(
                            'name' => __('Content', TPL_SLUG),
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea'
                        )
                    )
                ),
                array(
                    'name' => __('Hightlighting', TPL_SLUG),
                    'code' => 'hightlighting',
                    'fields' => array(
                        array(
                            'name' => __('Text color', TPL_SLUG),
                            'id' => 'text_color',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'color'
                        ),
                        array(
                            'name' => __('Hightlighting color', TPL_SLUG),
                            'id' => 'hightlighting_color',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'color'
                        ),
                        array(
                            'name' => __('Text', TPL_SLUG),
                            'id' => 'text',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea'
                        )
                    )
                ),
                array(
                    'name' => __('Dropcaps', TPL_SLUG),
                    'code' => 'dropcaps',
                    'fields' => array(
                        array(
                            'name' => __('Text color', TPL_SLUG),
                            'id' => 'text_color',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'color'
                        ),
                        array(
                            'name' => __('Background color', TPL_SLUG),
                            'id' => 'hightlighting_color',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'color'
                        ),
                        array(
                            'name' => __('Font size', TPL_SLUG),
                            'id' => 'font_size',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input'
                        ),
                        array(
                            'name' => __('Text', TPL_SLUG),
                            'id' => 'text',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'input'
                        )
                    )
                ),
                array(
                    'name' => __('Image with lightbox', TPL_SLUG),
                    'code' => 'image',
                    'fields' => array(
                        array(
                            'name' => __('Align', TPL_SLUG),
                            'id' => 'align',
                            'default' => 'none',
                            'place' => 'attr',
                            'type' => 'select',
                            'options' => array(
                                'none' => 'none',
                                'left' => 'left',
                                'right' => 'right',
                            )
                        ),
                        array(
                            'name' => __('Image', TPL_SLUG),
                            'id' => 'img',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'upload'
                        ),
                        array(
                            'name' => __('url', TPL_SLUG),
                            'id' => 'url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'upload'
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'id' => 'alt',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input'
                        ),
                        array(
                            'name' => __('Border', TPL_SLUG),
                            'id' => 'border',
                            'default' => 'on',
                            'place' => 'attr',
                            'type' => 'radio',
                            'options' => array(
                                'on' => __('Yes', TPL_SLUG),
                                'off' => __('No', TPL_SLUG)
                            ),
                        ),
                    )
                ),
            )
        ),
        array(
            'id' => 'pricing_boxes',
            'name' => __('Pricing Boxes', TPL_SLUG),
            'codes' => array(
                array(
                    'name' => __('Big', TPL_SLUG),
                    'code' => 'pr_big_boxes',
                    'fields' => array(
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'big_box_1',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'big_box_1',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'big_box_1',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'big_box_1',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'big_box_1',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'big_box_1',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'big_box_1',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'big_box_1',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //----------------------
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'big_box_2',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'big_box_2',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'big_box_2',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'big_box_2',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'big_box_2',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'big_box_2',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'big_box_2',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'big_box_2',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //--------------------------------
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'big_box_3',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'big_box_3',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'big_box_3',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'big_box_3',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'big_box_3',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'big_box_3',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'big_box_3',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'big_box_3',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //--------------------------
                        array(
                            'name' => __('Button color', TPL_SLUG),
                            'id' => 'bt_color',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'color'
                        )
                    )
                ),
                array(
                    'name' => __('Medium', TPL_SLUG),
                    'code' => 'pr__medium_boxes',
                    'fields' => array(
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'medium_box_1',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'medium_box_1',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'medium_box_1',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'medium_box_1',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'medium_box_1',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'medium_box_1',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'medium_box_1',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'medium_box_1',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //----------------------
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'medium_box_2',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'medium_box_2',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'medium_box_2',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'medium_box_2',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'medium_box_2',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'medium_box_2',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'medium_box_2',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'medium_box_2',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //--------------------------------
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'medium_box_3',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'medium_box_3',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'medium_box_3',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'medium_box_3',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'medium_box_3',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'medium_box_3',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'medium_box_3',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'medium_box_3',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //--------------------------------
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'medium_box_4',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'medium_box_4',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'medium_box_4',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'medium_box_4',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'medium_box_4',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'medium_box_4',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'medium_box_4',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'medium_box_4',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //--------------------------
                        array(
                            'name' => __('Button color', TPL_SLUG),
                            'id' => 'bt_color',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'color'
                        )
                    )
                ),
                array(
                    'name' => __('Small', TPL_SLUG),
                    'code' => 'pr_small_boxes',
                    'fields' => array(
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'small_box_1',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'small_box_1',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'small_box_1',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'small_box_1',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'small_box_1',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'small_box_1',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'small_box_1',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'small_box_1',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //----------------------
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'small_box_2',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'small_box_2',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'small_box_2',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'small_box_2',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'small_box_2',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'small_box_2',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'small_box_2',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'small_box_2',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //--------------------------------
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'small_box_3',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'small_box_3',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'small_box_3',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'small_box_3',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'small_box_3',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'small_box_3',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'small_box_3',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'small_box_3',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //--------------------------------
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'small_box_4',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'small_box_4',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'small_box_4',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'small_box_4',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'small_box_4',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'small_box_4',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'small_box_4',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'small_box_4',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //--------------------------
                        array(
                            'name' => __('Price', TPL_SLUG),
                            'subtag' => 'small_box_5',
                            'id' => 'price',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Per', TPL_SLUG),
                            'subtag' => 'small_box_5',
                            'id' => 'per',
                            'default' => 'MONTH',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'small_box_5',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 1', TPL_SLUG),
                            'subtag' => 'small_box_5',
                            'id' => 'item1',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 2', TPL_SLUG),
                            'subtag' => 'small_box_5',
                            'id' => 'item2',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 3', TPL_SLUG),
                            'subtag' => 'small_box_5',
                            'id' => 'item3',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Item 4', TPL_SLUG),
                            'subtag' => 'small_box_5',
                            'id' => 'item4',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Button url', TPL_SLUG),
                            'subtag' => 'small_box_5',
                            'id' => 'bt_url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => false
                        ),
                        //----------------------------
                        array(
                            'name' => __('Button color', TPL_SLUG),
                            'id' => 'bt_color',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'color'
                        )
                    )
                )
            )
        ),
        array(
            'id' => 'toggles',
            'name' => __('Tabs', TPL_SLUG),
            'codes' => array(
                array(
                    'name' => __('Tabs', TPL_SLUG),
                    'code' => 'tabs',
                    'fields' => array(
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'tab',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => true
                        ),
                        array(
                            'name' => __('Content', TPL_SLUG),
                            'subtag' => 'tab',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => true
                        ),
                        array(
                            'name' => __('Add more fields', TPL_SLUG),
                            'id' => 'additive',
                            'place' => 'additive',
                            'type' => 'additive',
                        )
                    )
                ),
            )
        ),
        array(
            'id' => 'button',
            'name' => __('Button', TPL_SLUG),
            'codes' => array(
                array(
                    'name' => __('Button', TPL_SLUG),
                    'code' => 'button',
                    'fields' => array(
                        array(
                            'name' => __('Text color', TPL_SLUG),
                            'id' => 'text_color',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'color'
                        ),
                        array(
                            'name' => __('Background color', TPL_SLUG),
                            'id' => 'background_color',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'color'
                        ),
                        array(
                            'name' => __('Label', TPL_SLUG),
                            'id' => 'text',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'input'
                        ),
                        array(
                            'name' => __('URL', TPL_SLUG),
                            'id' => 'url',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input'
                        )
                    )
                ),
            )
        ),
        array(
            'id' => 'accordions',
            'name' => __('Accordion', TPL_SLUG),
            'codes' => array(
                array(
                    'name' => __('Accordion', TPL_SLUG),
                    'code' => 'accordion',
                    'fields' => array(
                        array(
                            'name' => __('Title', TPL_SLUG),
                            'subtag' => 'acc',
                            'id' => 'title',
                            'default' => '',
                            'place' => 'attr',
                            'type' => 'input',
                            'additive' => true
                        ),
                        array(
                            'name' => __('Content', TPL_SLUG),
                            'subtag' => 'acc',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => true
                        ),
                        array(
                            'name' => __('Add more fields', TPL_SLUG),
                            'id' => 'additive',
                            'place' => 'additive',
                            'type' => 'additive',
                        )
                    )
                ),
            )
        ),
        array(
            'id' => 'columns',
            'name' => __('Columns', TPL_SLUG),
            'codes' => array(
                array(
                    'name' => __('Column 50%', TPL_SLUG),
                    'code' => 'nocodecols50',
                    'fields' => array(
                        array(
                            'name' => __('Left 50%', TPL_SLUG),
                            'subtag' => 'left50',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Right 50%', TPL_SLUG),
                            'subtag' => 'right50',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Add clear', TPL_SLUG),
                            'id' => 'addclear',
                            'subtag' => 'clear',
                            'default' => 'on',
                            'place' => 'addclear',
                            'type' => 'radio',
                            'options' => array(
                                'on' => 'Yes',
                                'off' => 'No'
                            ),
                            'additive' => false,
                        )
                    )
                ),
                array(
                    'name' => __('Column 33%', TPL_SLUG),
                    'code' => 'nocodecols33',
                    'fields' => array(
                        array(
                            'name' => __('Left 33%', TPL_SLUG),
                            'subtag' => 'left33',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Center 33%', TPL_SLUG),
                            'subtag' => 'center33',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Right 33%', TPL_SLUG),
                            'subtag' => 'right33',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Add clear', TPL_SLUG),
                            'id' => 'addclear',
                            'subtag' => 'clear',
                            'default' => 'on',
                            'place' => 'addclear',
                            'type' => 'radio',
                            'options' => array(
                                'on' => 'Yes',
                                'off' => 'No'
                            ),
                            'additive' => false,
                        )
                    )
                ),
                array(
                    'name' => __('Column 25%', TPL_SLUG),
                    'code' => 'nocodecols25',
                    'fields' => array(
                        array(
                            'name' => __('Left 25%', TPL_SLUG),
                            'subtag' => 'left25',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Center 25%', TPL_SLUG),
                            'subtag' => 'center25-1',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Center 25%', TPL_SLUG),
                            'subtag' => 'center25-2',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Right 25%', TPL_SLUG),
                            'subtag' => 'right25',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Add clear', TPL_SLUG),
                            'id' => 'addclear',
                            'subtag' => 'clear',
                            'default' => 'on',
                            'place' => 'addclear',
                            'type' => 'radio',
                            'options' => array(
                                'on' => 'Yes',
                                'off' => 'No'
                            ),
                            'additive' => false,
                        )
                    )
                ),
                array(
                    'name' => __('Column 20%', TPL_SLUG),
                    'code' => 'nocodecols20',
                    'fields' => array(
                        array(
                            'name' => __('Left 20%', TPL_SLUG),
                            'subtag' => 'left20',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Center 20%', TPL_SLUG),
                            'subtag' => 'center20-1',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Center 20%', TPL_SLUG),
                            'subtag' => 'center20-2',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Center 20%', TPL_SLUG),
                            'subtag' => 'center20-3',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Right 20%', TPL_SLUG),
                            'subtag' => 'right20',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Add clear', TPL_SLUG),
                            'id' => 'addclear',
                            'subtag' => 'clear',
                            'default' => 'on',
                            'place' => 'addclear',
                            'type' => 'radio',
                            'options' => array(
                                'on' => 'Yes',
                                'off' => 'No'
                            ),
                            'additive' => false,
                        )
                    )
                ),
                array(
                    'name' => __('Left 65%', TPL_SLUG),
                    'code' => 'nocodecols65l',
                    'fields' => array(
                        array(
                            'name' => __('Left 65%', TPL_SLUG),
                            'subtag' => 'left65',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Right 25%', TPL_SLUG),
                            'subtag' => 'right25',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Add clear', TPL_SLUG),
                            'id' => 'addclear',
                            'subtag' => 'clear',
                            'default' => 'on',
                            'place' => 'addclear',
                            'type' => 'radio',
                            'options' => array(
                                'on' => 'Yes',
                                'off' => 'No'
                            ),
                            'additive' => false,
                        )
                    )
                ),
                array(
                    'name' => __('Right 65%', TPL_SLUG),
                    'code' => 'nocodecols65r',
                    'fields' => array(
                        array(
                            'name' => __('Right 65%', TPL_SLUG),
                            'subtag' => 'right65',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Left 25%', TPL_SLUG),
                            'subtag' => 'left25',
                            'id' => 'content',
                            'default' => '',
                            'place' => 'content',
                            'type' => 'textarea',
                            'additive' => false
                        ),
                        array(
                            'name' => __('Add clear', TPL_SLUG),
                            'id' => 'addclear',
                            'subtag' => 'clear',
                            'default' => 'on',
                            'place' => 'addclear',
                            'type' => 'radio',
                            'options' => array(
                                'on' => 'Yes',
                                'off' => 'No'
                            ),
                            'additive' => false,
                        )
                    )
                ),
                array(
                    'name' => __('Line', TPL_SLUG),
                    'code' => 'line',
                    'fields' => array()
                ),
                array(
                    'name' => __('Clear', TPL_SLUG),
                    'code' => 'clear',
                    'fields' => array()
                ),
            )
        ),
        array(
            'id' => 'video',
            'name' => __('Video', TPL_SLUG),
            'codes' => array(
                array(
                    'name' => __('Video', TPL_SLUG),
                    'code' => 'video',
                    'fields' => array(
                        array(
                            'name' => __('Type', TPL_SLUG),
                            'id' => 'type',
                            'default' => 'youtube',
                            'place' => 'attr',
                            'type' => 'select',
                            'options' => array(
                                'youtube' => 'youtube',
                                'vimeo' => 'vimeo'
                            )
                        ),
                        array(
                            'name' => __('Movie id, or movie link', TPL_SLUG),
                            'place' => 'attr',
                            'id' => 'src',
                            'default' => '',
                            'type' => 'input',
                        ),
                        array(
                            'name' => __('Height', TPL_SLUG),
                            'place' => 'attr',
                            'id' => 'height',
                            'default' => '335',
                            'type' => 'input',
                        ),
                        array(
                            'name' => __('Width', TPL_SLUG),
                            'place' => 'attr',
                            'id' => 'width',
                            'default' => '595',
                            'type' => 'input',
                        ),
                        array(
                            'name' => __('Autoplay', TPL_SLUG),
                            'id' => 'autoplay',
                            'default' => 'off',
                            'place' => 'attr',
                            'type' => 'radio',
                            'options' => array(
                                'on' => 'On',
                                'off' => 'Off'
                            )
                        ),
                    )
                ),
            )
        ),
    );
    return $shortcodes;
}

function apollo13_shortcodes_make_field($field, $code)
{
    $html = '';
    //we produce uniq id
    $id = 'apollo13-' . $code . '-' . $field['id'];
    $class = $field['place'];
    if (isset($field['subtag']) && ($field['subtag'] != '')) {
        $id .= '-' . $field['subtag']; //we add info for js engine
    }
    if (isset($field['additive']) && $field['additive']) {
        $id .= '-1'; //we add info for js engine
        $class .= ' additive';
    }
    //checking what type o field to make
    if ($field['type'] == 'upload') {
        $html .= '<div class="upload-input ' . $class . '">';
//				<p class="desc">$field['desc']; </p>
        $html .= '<label><span class="label-name">' . $field['name'] . '</span>';
        $html .= '<input id="' . $id . '" class="' . $class . '" type="text" size="36" name="' . $id . '" value="' . $field['default'] . '" />';
        $html .= '</label>';
        $html .= '<input id="upload_' . $id . '" class="upload-image-button ' . $class . '" type="button" value="' . __('Upload Image', TPL_SLUG) . '" />';
        $html .= '</div>';
    } elseif ($field['type'] == 'input') {
        $html .= '<div class="text-input ' . $class . '">';
//				<p class="desc">$field['desc']; </p>
        $html .= '<label><span class="label-name">' . $field['name'] . '</span>';
        $html .= '<input id="' . $id . '" class="' . $class . '" type="text" size="36" name="' . $id . '" value="' . $field['default'] . '" />';
        $html .= '</label>';
        $html .= '</div>';
    } elseif ($field['type'] == 'select') {
        $selected = $field['default'];
        $html .= '<div class="select-input ' . $class . '">';
//				<p class="desc">$field['desc']; </p>
        $html .= '<label><span class="label-name">' . $field['name'] . '</span>';
        $html .= '<select id="' . $id . '" class="' . $class . '" name="' . $id . '">';
        foreach ($field['options'] as $html_value => $html_option) {
            $selected_attr = '';
            if ($html_value == $selected) {
                $selected_attr = ' selected="selected"';
            }
            $html .= '<option value="' . $html_value . '"' . $selected_attr . '>' . $html_option . '</option>';
        }
        $html .= '</select>';
        $html .= '</label>';
        $html .= '</div>';
    } elseif ($field['type'] == 'radio') {
        $selected = $field['default'];
        $html .= '<div class="radio-input ' . $class . '">';
//				<p class="desc">$field['desc']; </p>
        $html .= '<span class="label-like">' . $field['name'] . '</span>';
        foreach ($field['options'] as $html_value => $html_option) {
            $selected_attr = '';
            if ($html_value == $selected) {
                $selected_attr = ' checked="checked"';
            }
            $html .= '<label><input type="radio" name="' . $id . '" class="' . $class . '" value="' . $html_value . '"' . $selected_attr . ' />' . $html_option . '</label>';
        }
        $html .= '</div>';
    } elseif ($field['type'] == 'color') {
        $html .= '<div class="color-input ' . $class . '">';
//				<p class="desc">$field['desc']; </p>
        $html .= '<label><span class="label-name">' . $field['name'] . '</span>';
        $html .= '<input id="' . $id . '" type="text" class="with-color ' . $class . '" name="' . $id . '" value="' . $field['default'] . '" />';
        $html .= '</label>';
        $html .= '</div>';
    } elseif ($field['type'] == 'textarea') {
        $html .= '<div class="textarea-input ' . $class . '">';
//				<p class="desc">$field['desc']; </p>
        $html .= '<label><span class="label-name">' . $field['name'] . '</span>';
        $html .= '<textarea id="' . $id . '" class="' . $class . '" name="' . $id . '">' . $field['default'] . '</textarea>';
        $html .= '</label>';
        $html .= '</div>';
    } elseif ($field['type'] == 'additive') {
        $html .= '<div class="add-more-parent"><span class="button add-more-fields"><span>+</span>' . $field['name'] . '</span></div>';
    }
    return $html;
}

?>