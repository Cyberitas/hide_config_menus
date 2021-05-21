# Installation
This module is designed to be installed via composer.

From your drupal root run the following commands:

    composer require cyberitas/hide_config_menus
    drush pm:enable -y hide_config_menus

To enable this module, you must both enable the module itself, as well as add a line to your settings.php:

    $settings['hide_configuration_menu'] = true;

