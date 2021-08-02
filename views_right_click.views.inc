<?php
/**
 *
 */
/**
 * Implements @see hook_views_data_alter().
 */
function views_right_click_views_data_alter(&$data) {
  $data['views']['copy'] = [
    'title' => t('Copy'),
    'field' => [
      'id' => 'copy',
    ],
  ];
}
