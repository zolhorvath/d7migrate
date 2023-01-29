<?php
// phpcs:ignoreFile
/**
 * @file
 * A database agnostic dump for testing purposes.
 *
 * This file was generated by the Drupal 9.5.3-dev db-tools.php script.
 */

use Drupal\Core\Database\Database;

$connection = Database::getConnection();
// Ensure any tables with a serial column with a value of 0 are created as
// expected.
if ($connection->databaseType() === 'mysql') {
  $sql_mode = $connection->query("SELECT @@sql_mode;")->fetchField();
  $connection->query("SET sql_mode = '$sql_mode,NO_AUTO_VALUE_ON_ZERO'");
}

include 'd7-source' . DIRECTORY_SEPARATOR . 'actions.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'authmap.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'batch.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'block.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'block_custom.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'block_node_type.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'block_role.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'blocked_ips.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_block.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_bootstrap.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_field.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_filter.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_form.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_image.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_menu.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_page.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_path.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'cache_update.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'date_format_locale.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'date_format_type.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'date_formats.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'field_config.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'field_config_instance.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'field_data_body.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'field_data_field_gallery_images.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'field_data_field_image.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'field_revision_body.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'field_revision_field_gallery_images.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'field_revision_field_image.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'file_managed.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'file_usage.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'filter.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'filter_format.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'flood.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'history.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'image_effects.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'image_styles.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'menu_links.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'menu_router.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'node.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'node_access.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'node_revision.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'node_type.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'queue.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'registry.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'registry_file.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'role.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'role_permission.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'semaphore.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'sequences.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'sessions.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'system.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'url_alias.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'users.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'users_roles.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'variable.php';
include 'd7-source' . DIRECTORY_SEPARATOR . 'watchdog.php';

// Reset the SQL mode.
if ($connection->databaseType() === 'mysql') {
  $connection->query("SET sql_mode = '$sql_mode'");
}
