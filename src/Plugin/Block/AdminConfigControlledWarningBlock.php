<?php
namespace Drupal\hide_config_menus\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a warning block for use in the administration area
 *
 * @Block(
 *   id = "admin_config_controlled_warning",
 *   admin_label = @Translation("Configuration VCS Controlled Warning"),
 *   category = @Translation("Help"),
 * )
 */
class AdminConfigControlledWarningBlock extends BlockBase {
  private $restrictedRoutes = [
        'node.type_add',
        'entity.node_type.collection',
        'entity.node.field_ui_fields',
        'entity.node_type.edit_form',
        'entity.field_config.node_field_edit_form',
        'entity.field_config.node_storage_edit_form',
        'entity.entity_form_display.node.default',
        'entity.entity_view_display.node.default',
        'entity.entity_form_mode.collection',
        'entity.entity_form_mode.edit_form',
        'entity.media_type.collection',
        'entity.media_type.add_form',
        'entity.media_type.edit_form',
        'entity.media.field_ui_fields',
        'entity.entity_form_display.media.default',
        'entity.entity_view_display.media.default',
        'entity.paragraphs_type.collection',
        'paragraphs.type_add',
        'entity.paragraph.field_ui_fields',
        'entity.entity_form_display.paragraph.default',
        'entity.entity_view_display.paragraph.default',
        'system.themes_page',
        'system.theme_settings_theme',
        'system.theme_settings',
        'system.modules_list',
        'system.modules_uninstall',
        'entity.user.field_ui_fields',
        'entity.entity_form_display.user.default',
        'entity.entity_view_display.user.default',
        'entity.pathauto_pattern.collection',
        'entity.pathauto_pattern.edit_form',
        'pathauto.settings.form',
        'entity.user_role.collection',
        'entity.user_role.edit_form',
        'entity.user_role.edit_permissions_form',
        'user.admin_permissions',
        'entity.image_style.collection',
        'entity.image_style.edit_form',
        'image.style_add',
        'filter.admin_overview',
        'system.performance_settings',
        'entity.workflow.collection',
        'entity.workflow.edit_form',
        'entity.workflow.edit_form',
        'entity.block_content_type.collection',
        'entity.block_content_type.edit_form',
        'entity.field_config.block_content_field_edit_form',
        'entity.field_config.block_content_storage_edit_form',
        'block_content.type_add',
        'entity.block_content.field_ui_fields',
        'entity.entity_form_display.block_content.default',
        'entity.entity_view_display.block_content.default',
        'metatag.settings',
        'entity.metatag_defaults.collection',
        'entity.view.collection',
        'entity.view.edit_form',
        'views_ui.settings_basic',
  ];

  /**
   * {@inheritdoc}
   */
  public function build() {
    $markup = '';
    if( \Drupal\Core\Site\Settings::get('hide_configuration_menu', false) ) {
      $routeName = \Drupal::routeMatch()->getRouteName();
      if( in_array( $routeName, $this->restrictedRoutes ) ) {
        $markup = <<<EODIALOG
          <div role="contentinfo" aria-label="Error message" class="messages messages--error">
            <div role="alert">
              <h2 class="visually-hidden">Warning message</h2>
              WARNING! Using this page may lead to data-loss.
              This page modifies configuration items that are VCS controlled.
              Any changes made here will be lost the next time a site is deployed.
            </div>
          </div>
EODIALOG;
      }
    }
    return [
      '#markup' => $markup,
    ];
  }

  /**
   * @return int
   */
  public function getCacheMaxAge() {
    return 0;
  }
}

