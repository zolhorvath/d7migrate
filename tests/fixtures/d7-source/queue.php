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

$connection->schema()->createTable('queue', array(
  'fields' => array(
    'item_id' => array(
      'type' => 'serial',
      'not null' => TRUE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ),
    'name' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'data' => array(
      'type' => 'blob',
      'not null' => FALSE,
      'size' => 'big',
    ),
    'expire' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'created' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
  ),
  'primary key' => array(
    'item_id',
  ),
  'indexes' => array(
    'name_created' => array(
      'name',
      'created',
    ),
    'expire' => array(
      'expire',
    ),
  ),
  'mysql_character_set' => 'utf8',
));

$connection->insert('queue')
->fields(array(
  'item_id',
  'name',
  'data',
  'expire',
  'created',
))
->values(array(
  'item_id' => '2',
  'name' => 'update_fetch_tasks',
  'data' => 'a:8:{s:4:"name";s:6:"drupal";s:4:"info";a:6:{s:4:"name";s:5:"Block";s:7:"package";s:4:"Core";s:7:"version";s:4:"7.94";s:7:"project";s:6:"drupal";s:9:"datestamp";s:10:"1671034612";s:16:"_info_file_ctime";i:1674979036;}s:9:"datestamp";s:10:"1671034612";s:8:"includes";a:12:{s:5:"block";s:5:"Block";s:5:"dblog";s:16:"Database logging";s:5:"field";s:5:"Field";s:17:"field_sql_storage";s:17:"Field SQL storage";s:6:"filter";s:6:"Filter";s:4:"node";s:4:"Node";s:6:"system";s:6:"System";s:4:"text";s:4:"Text";s:6:"update";s:14:"Update manager";s:4:"user";s:4:"User";s:6:"bartik";s:6:"Bartik";s:5:"seven";s:5:"Seven";}s:12:"project_type";s:4:"core";s:14:"project_status";b:1;s:10:"sub_themes";a:0:{}s:11:"base_themes";a:0:{}}',
  'expire' => '0',
  'created' => '1674979333',
))
->values(array(
  'item_id' => '3',
  'name' => 'update_fetch_tasks',
  'data' => 'a:8:{s:4:"name";s:10:"references";s:4:"info";a:6:{s:4:"name";s:14:"Node Reference";s:7:"package";s:6:"Fields";s:7:"version";s:7:"7.x-2.4";s:7:"project";s:10:"references";s:9:"datestamp";s:10:"1655917209";s:16:"_info_file_ctime";i:1674979487;}s:9:"datestamp";s:10:"1655917209";s:8:"includes";a:2:{s:14:"node_reference";s:14:"Node Reference";s:10:"references";s:10:"References";}s:12:"project_type";s:6:"module";s:14:"project_status";b:1;s:10:"sub_themes";a:0:{}s:11:"base_themes";a:0:{}}',
  'expire' => '0',
  'created' => '1674979499',
))
->execute();

// Reset the SQL mode.
if ($connection->databaseType() === 'mysql') {
  $connection->query("SET sql_mode = '$sql_mode'");
}