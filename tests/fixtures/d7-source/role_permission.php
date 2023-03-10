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

$connection->schema()->createTable('role_permission', array(
  'fields' => array(
    'rid' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ),
    'permission' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '128',
      'default' => '',
    ),
    'module' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
  ),
  'primary key' => array(
    'rid',
    'permission',
  ),
  'indexes' => array(
    'permission' => array(
      'permission',
    ),
  ),
  'mysql_character_set' => 'utf8',
));

$connection->insert('role_permission')
->fields(array(
  'rid',
  'permission',
  'module',
))
->values(array(
  'rid' => '1',
  'permission' => 'access content',
  'module' => 'node',
))
->values(array(
  'rid' => '2',
  'permission' => 'access content',
  'module' => 'node',
))
->execute();

// Reset the SQL mode.
if ($connection->databaseType() === 'mysql') {
  $connection->query("SET sql_mode = '$sql_mode'");
}