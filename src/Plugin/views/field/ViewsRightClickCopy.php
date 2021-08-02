<?php

namespace Drupal\views_right_click\Plugin\views\field;

use Drupal\Core\Url;
use Drupal\views\Plugin\views\field\LinkBase;
use Drupal\views\ResultRow;


/**
 * A handler to provide a field that is completely custom by the administrator.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("copy")
 */
class ViewsRightClickCopy extends LinkBase
{
  /**
   * {@inheritdoc}
   */
  public function render(ResultRow $row)
  {
    $build = [
      '#markup' => $this->renderLink($row),
      '#attached' => [
        'library' => ['views_right_click/jquery.selection'],
      ]
    ];
    return $build;
  }

  /**
   * @inheritDoc
   */
  protected function getUrlInfo(ResultRow $row)
  {
    return Url::fromRoute('<current>', [], ['fragment' => 'copy']);
  }

  /**
   * {@inheritdoc}
   */
  protected function renderLink(ResultRow $row)
  {
    $this->options['alter']['make_link'] = TRUE;
    $this->options['alter']['url'] = $this->getUrlInfo($row);
    $text = !empty($this->options['text']) ? $this->sanitizeValue($this->options['text']) : $this->getDefaultLabel();
    $this->options['alter']['link_class'] = "views-right-click-copy-link";
    return $text;
  }

  /**
   * {@inheritdoc}
   */
  protected function getDefaultLabel()
  {
    return $this->t('copy');
  }
}
