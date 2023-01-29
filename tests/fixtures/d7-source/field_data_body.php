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

$connection->schema()->createTable('field_data_body', array(
  'fields' => array(
    'entity_type' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '128',
      'default' => '',
    ),
    'bundle' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '128',
      'default' => '',
    ),
    'deleted' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'tiny',
      'default' => '0',
    ),
    'entity_id' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ),
    'revision_id' => array(
      'type' => 'int',
      'not null' => FALSE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ),
    'language' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '32',
      'default' => '',
    ),
    'delta' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ),
    'body_value' => array(
      'type' => 'text',
      'not null' => FALSE,
      'size' => 'big',
    ),
    'body_summary' => array(
      'type' => 'text',
      'not null' => FALSE,
      'size' => 'big',
    ),
    'body_format' => array(
      'type' => 'varchar',
      'not null' => FALSE,
      'length' => '255',
    ),
  ),
  'primary key' => array(
    'entity_type',
    'entity_id',
    'deleted',
    'delta',
    'language',
  ),
  'indexes' => array(
    'entity_type' => array(
      'entity_type',
    ),
    'bundle' => array(
      'bundle',
    ),
    'deleted' => array(
      'deleted',
    ),
    'entity_id' => array(
      'entity_id',
    ),
    'revision_id' => array(
      'revision_id',
    ),
    'language' => array(
      'language',
    ),
    'body_format' => array(
      'body_format',
    ),
  ),
  'mysql_character_set' => 'utf8',
));

$connection->insert('field_data_body')
->fields(array(
  'entity_type',
  'bundle',
  'deleted',
  'entity_id',
  'revision_id',
  'language',
  'delta',
  'body_value',
  'body_summary',
  'body_format',
))
->values(array(
  'entity_type' => 'node',
  'bundle' => 'gallery',
  'deleted' => '0',
  'entity_id' => '7',
  'revision_id' => '7',
  'language' => 'und',
  'delta' => '0',
  'body_value' => 'Body text of Gallery #1',
  'body_summary' => '',
  'body_format' => 'plain_text',
))
->values(array(
  'entity_type' => 'node',
  'bundle' => 'gallery',
  'deleted' => '0',
  'entity_id' => '8',
  'revision_id' => '8',
  'language' => 'und',
  'delta' => '0',
  'body_value' => 'Body text of Gallery #2',
  'body_summary' => '',
  'body_format' => 'plain_text',
))
->values(array(
  'entity_type' => 'node',
  'bundle' => 'gallery',
  'deleted' => '0',
  'entity_id' => '9',
  'revision_id' => '9',
  'language' => 'und',
  'delta' => '0',
  'body_value' => 'Body text of Gallery #3',
  'body_summary' => '',
  'body_format' => 'plain_text',
))
->execute();

// Reset the SQL mode.
if ($connection->databaseType() === 'mysql') {
  $connection->query("SET sql_mode = '$sql_mode'");
}