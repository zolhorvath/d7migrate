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

$connection->schema()->createTable('actions', array(
  'fields' => array(
    'aid' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '0',
    ),
    'type' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '32',
      'default' => '',
    ),
    'callback' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'parameters' => array(
      'type' => 'blob',
      'not null' => TRUE,
      'size' => 'big',
    ),
    'label' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '0',
    ),
  ),
  'primary key' => array(
    'aid',
  ),
  'mysql_character_set' => 'utf8',
));

$connection->insert('actions')
->fields(array(
  'aid',
  'type',
  'callback',
  'parameters',
  'label',
))
->values(array(
  'aid' => 'node_make_sticky_action',
  'type' => 'node',
  'callback' => 'node_make_sticky_action',
  'parameters' => '',
  'label' => 'Make content sticky',
))
->values(array(
  'aid' => 'node_make_unsticky_action',
  'type' => 'node',
  'callback' => 'node_make_unsticky_action',
  'parameters' => '',
  'label' => 'Make content unsticky',
))
->values(array(
  'aid' => 'node_promote_action',
  'type' => 'node',
  'callback' => 'node_promote_action',
  'parameters' => '',
  'label' => 'Promote content to front page',
))
->values(array(
  'aid' => 'node_publish_action',
  'type' => 'node',
  'callback' => 'node_publish_action',
  'parameters' => '',
  'label' => 'Publish content',
))
->values(array(
  'aid' => 'node_save_action',
  'type' => 'node',
  'callback' => 'node_save_action',
  'parameters' => '',
  'label' => 'Save content',
))
->values(array(
  'aid' => 'node_unpromote_action',
  'type' => 'node',
  'callback' => 'node_unpromote_action',
  'parameters' => '',
  'label' => 'Remove content from front page',
))
->values(array(
  'aid' => 'node_unpublish_action',
  'type' => 'node',
  'callback' => 'node_unpublish_action',
  'parameters' => '',
  'label' => 'Unpublish content',
))
->values(array(
  'aid' => 'system_block_ip_action',
  'type' => 'user',
  'callback' => 'system_block_ip_action',
  'parameters' => '',
  'label' => 'Ban IP address of current user',
))
->values(array(
  'aid' => 'user_block_user_action',
  'type' => 'user',
  'callback' => 'user_block_user_action',
  'parameters' => '',
  'label' => 'Block current user',
))
->values(array(
  'aid' => 'user_unblock_user_action',
  'type' => 'user',
  'callback' => 'user_unblock_user_action',
  'parameters' => '',
  'label' => 'Unblock current user',
))
->execute();

// Reset the SQL mode.
if ($connection->databaseType() === 'mysql') {
  $connection->query("SET sql_mode = '$sql_mode'");
}