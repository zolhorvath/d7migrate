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

$connection->schema()->createTable('users', array(
  'fields' => array(
    'uid' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
      'unsigned' => TRUE,
    ),
    'name' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '60',
      'default' => '',
    ),
    'pass' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '128',
      'default' => '',
    ),
    'mail' => array(
      'type' => 'varchar',
      'not null' => FALSE,
      'length' => '254',
      'default' => '',
    ),
    'theme' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'signature' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
      'default' => '',
    ),
    'signature_format' => array(
      'type' => 'varchar',
      'not null' => FALSE,
      'length' => '255',
    ),
    'created' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'changed' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'access' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'login' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'status' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'tiny',
      'default' => '0',
    ),
    'timezone' => array(
      'type' => 'varchar',
      'not null' => FALSE,
      'length' => '32',
    ),
    'language' => array(
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '12',
      'default' => '',
    ),
    'picture' => array(
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'default' => '0',
    ),
    'init' => array(
      'type' => 'varchar',
      'not null' => FALSE,
      'length' => '254',
      'default' => '',
    ),
    'data' => array(
      'type' => 'blob',
      'not null' => FALSE,
      'size' => 'big',
    ),
  ),
  'primary key' => array(
    'uid',
  ),
  'unique keys' => array(
    'name' => array(
      'name',
    ),
  ),
  'indexes' => array(
    'access' => array(
      'access',
    ),
    'created' => array(
      'created',
    ),
    'changed' => array(
      'changed',
    ),
    'mail' => array(
      'mail',
    ),
    'picture' => array(
      'picture',
    ),
  ),
  'mysql_character_set' => 'utf8',
));

$connection->insert('users')
->fields(array(
  'uid',
  'name',
  'pass',
  'mail',
  'theme',
  'signature',
  'signature_format',
  'created',
  'changed',
  'access',
  'login',
  'status',
  'timezone',
  'language',
  'picture',
  'init',
  'data',
))
->values(array(
  'uid' => '0',
  'name' => '',
  'pass' => '',
  'mail' => '',
  'theme' => '',
  'signature' => '',
  'signature_format' => NULL,
  'created' => '0',
  'changed' => '0',
  'access' => '0',
  'login' => '0',
  'status' => '0',
  'timezone' => NULL,
  'language' => '',
  'picture' => '0',
  'init' => '',
  'data' => NULL,
))
->values(array(
  'uid' => '1',
  'name' => 'admin',
  'pass' => '$S$DfOA3ELx2mSzMB4plGBO5y.G42SYM0wD.75lBNouKTLeenbms6m9',
  'mail' => 'admin@example.com',
  'theme' => '',
  'signature' => '',
  'signature_format' => NULL,
  'created' => '1674979260',
  'changed' => '1674979260',
  'access' => '1674979876',
  'login' => '1674979306',
  'status' => '1',
  'timezone' => 'UTC',
  'language' => '',
  'picture' => '0',
  'init' => 'admin@example.com',
  'data' => 'b:0;',
))
->execute();

// Reset the SQL mode.
if ($connection->databaseType() === 'mysql') {
  $connection->query("SET sql_mode = '$sql_mode'");
}