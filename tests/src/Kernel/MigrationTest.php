<?php

declare(strict_types = 1);

namespace Drupal\Tests\d7migrate\Kernel;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\entity_reference_revisions\EntityReferenceRevisionsFieldItemList;
use Drupal\file\Plugin\migrate\source\d7\File;
use Drupal\migrate\Plugin\MigrationInterface;
use Drupal\migrate\Plugin\MigrationPluginManagerInterface;
use Drupal\Tests\migmag\Traits\MigMagKernelTestDxTrait;
use Drupal\Tests\migrate_drupal\Kernel\MigrateDrupalTestBase;

/**
 * Tests the migrations on the database dump in '<root>/tests/fixtures'.
 *
 * @group d7migrate
 */
class MigrationTest extends MigrateDrupalTestBase {

  use MigMagKernelTestDxTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'd7migrate',
    'entity_reference_revisions',
    'filter',
    'image',
    'media',
    'migrate_devel_file_copy',
    'node',
    'paragraphs',
    'tecla',
    'text',
  ];

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();

    $this->loadFixture(dirname(__DIR__, 2) . '/fixtures/d7-source.php');

    // Install the necessary modules.
    $module_handler = \Drupal::moduleHandler();
    if ($module_handler->moduleExists('user')) {
      $module_handler->loadInclude('user', 'install');
      $this->installSchema('user', array_keys(user_schema()));
      user_install();
      $this->installConfig(['user']);
      $this->installEntitySchema('user');
    }

    if ($module_handler->moduleExists('file')) {
      $this->installEntitySchema('file');
      $this->installSchema('file', ['file_usage']);
    }

    if ($module_handler->moduleExists('node')) {
      $module_handler->loadInclude('node', 'install');
      $this->installSchema('node', array_keys(node_schema()));
      node_install();
      $this->installConfig(['node']);
    }

    if ($module_handler->moduleExists('media')) {
      $this->installEntitySchema('media');
      $module_handler->loadInclude('media', 'install');
      media_install();
      $this->installConfig(['media']);
    }

    if ($module_handler->moduleExists('paragraphs')) {
      $this->installEntitySchema('paragraph');
      $module_handler->loadInclude('paragraphs', 'install');
      paragraphs_install();
      $this->installConfig(['paragraphs']);
    }

    $this->installConfig(['d7migrate']);
  }

  /**
   * Tests migrations.
   */
  public function testMigrations(): void {
    $manager = \Drupal::service('plugin.manager.migration');
    assert($manager instanceof MigrationPluginManagerInterface);
    $migrations_to_execute = array_keys($manager->createInstancesByTag('Gallery'));
    $this->assertNotEmpty($migrations_to_execute);

    $this->startCollectingMessages();
    $this->executeMigrations($migrations_to_execute);
    $this->assertExpectedMigrationMessages();

    $this->assertEquals(
      [
        7 => [
          'vid' => [['value' => 7]],
          'langcode' => [['value' => 'en']],
          'type' => [['target_id' => 'gallery']],
          'revision_timestamp' => [['value' => 1674979876]],
          'revision_uid' => [['target_id' => 1]],
          'revision_log' => [],
          'status' => [['value' => 1]],
          'uid' => [['target_id' => 1]],
          'title' => [['value' => 'Gallery #1']],
          'created' => [['value' => 1674979876]],
          'changed' => [['value' => 1674979876]],
          'promote' => [['value' => 1]],
          'sticky' => [['value' => 0]],
          'default_langcode' => [['value' => 1]],
          'revision_default' => [['value' => 1]],
          'revision_translation_affected' => [['value' => 1]],
          'field_content' => [
            // Text paragraph.
            [
              'id' => [['value' => 4]],
              'revision_id' => [['value' => 4]],
              'type' => [['target_id' => 'text']],
              'status' => [['value' => 1]],
              'field_text' => [
                [
                  'value' => 'Body text of Gallery #1',
                  'format' => 'plain_text',
                ],
              ],
            ],
            // Media paragraph.
            [
              'id' => [['value' => 1]],
              'revision_id' => [['value' => 1]],
              'type' => [['target_id' => 'media']],
              'status' => [['value' => 1]],
              'field_media' => [
                ['target_id' => 1],
                ['target_id' => 2],
                ['target_id' => 3],
              ],
            ],
          ],
        ],
        8 => [
          'vid' => [['value' => 8]],
          'langcode' => [['value' => 'en']],
          'type' => [['target_id' => 'gallery']],
          'revision_timestamp' => [['value' => 1674979895]],
          'revision_uid' => [['target_id' => 1]],
          'revision_log' => [],
          'status' => [['value' => 1]],
          'uid' => [['target_id' => 1]],
          'title' => [['value' => 'Gallery #2']],
          'created' => [['value' => 1674979895]],
          'changed' => [['value' => 1674979895]],
          'promote' => [['value' => 1]],
          'sticky' => [['value' => 0]],
          'default_langcode' => [['value' => 1]],
          'revision_default' => [['value' => 1]],
          'revision_translation_affected' => [['value' => 1]],
          'field_content' => [
            // Text paragraph.
            [
              'id' => [['value' => 5]],
              'revision_id' => [['value' => 5]],
              'type' => [['target_id' => 'text']],
              'status' => [['value' => 1]],
              'field_text' => [
                [
                  'value' => 'Body text of Gallery #2',
                  'format' => 'plain_text',
                ],
              ],
            ],
            // Media paragraph.
            [
              'id' => [['value' => 2]],
              'revision_id' => [['value' => 2]],
              'type' => [['target_id' => 'media']],
              'status' => [['value' => 1]],
              'field_media' => [
                ['target_id' => 4],
                ['target_id' => 5],
                ['target_id' => 6],
              ],
            ],
          ],
        ],
        9 => [
          'vid' => [['value' => 9]],
          'langcode' => [['value' => 'en']],
          'type' => [['target_id' => 'gallery']],
          'revision_timestamp' => [['value' => 1674979912]],
          'revision_uid' => [['target_id' => 1]],
          'revision_log' => [],
          'status' => [['value' => 1]],
          'uid' => [['target_id' => 1]],
          'title' => [['value' => 'Gallery #3']],
          'created' => [['value' => 1674979912]],
          'changed' => [['value' => 1674979912]],
          'promote' => [['value' => 1]],
          'sticky' => [['value' => 0]],
          'default_langcode' => [['value' => 1]],
          'revision_default' => [['value' => 1]],
          'revision_translation_affected' => [['value' => 1]],
          'field_content' => [
            // Text paragraph.
            [
              'id' => [['value' => 6]],
              'revision_id' => [['value' => 6]],
              'type' => [['target_id' => 'text']],
              'status' => [['value' => 1]],
              'field_text' => [
                [
                  'value' => 'Body text of Gallery #3',
                  'format' => 'plain_text',
                ],
              ],
            ],
            // Media paragraph.
            [
              'id' => [['value' => 3]],
              'revision_id' => [['value' => 3]],
              'type' => [['target_id' => 'media']],
              'status' => [['value' => 1]],
              'field_media' => [
                ['target_id' => 6],
              ],
            ],
          ],
        ],
      ],
      array_map(
        [$this, 'getEntityArray'],
        \Drupal::entityTypeManager()->getStorage('node')->loadMultiple()
      )
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function prepareMigration(MigrationInterface $migration) {
    if (!$migration->getSourcePlugin() instanceof File) {
      return;
    }

    $source_config = $migration->getSourceConfiguration();
    $source_config['constants']['source_base_path'] = implode(
      DIRECTORY_SEPARATOR,
      [
        dirname(__DIR__, 2),
        'fixtures',
        'd7-source-files',
      ]
    );
    $migration->set('source', $source_config);
  }

  /**
   * Converts a content entity to array.
   *
   * @param \Drupal\Core\Entity\ContentEntityInterface $entity
   *   Entity to convert to array.
   *
   * @return array
   *   Entity converted to array.
   */
  protected function getEntityArray(ContentEntityInterface $entity): array {
    // Exclude NID, VID, UUID.
    $entity_array = array_diff_key(
      $entity->toArray(),
      ['nid' => 1, 'uuid' => 1],
    );
    // Extract entities referenced in field_content.
    $field_content = $entity->get('field_content');
    assert($field_content instanceof EntityReferenceRevisionsFieldItemList);
    foreach ($field_content->referencedEntities() as $delta => $paragraph) {
      $entity_array['field_content'][$delta] = array_diff_key(
        $paragraph->toArray(),
        [
          'uuid' => 1,
          'langcode' => 1,
          'created' => 1,
          'parent_id' => 1,
          'parent_type' => 1,
          'parent_field_name' => 1,
          'behavior_settings' => 1,
          'default_langcode' => 1,
          'revision_default' => 1,
          'revision_translation_affected' => 1,
        ]
      );
    }

    return $entity_array;
  }

}
