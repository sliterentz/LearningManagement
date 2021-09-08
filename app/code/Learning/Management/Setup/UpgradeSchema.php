<?php

namespace Learning\Management\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
	public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$installer = $setup;

		$installer->startSetup();

		if (version_compare($context->getVersion(), '1.2.4', '<')) {
			if (!$installer->tableExists('learning_object_product_post')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('learning_object_product_post')
				)
					->addColumn(
						'post_id',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						null,
						[
							'identity' => true,
							'nullable' => false,
							'primary'  => true,
							'unsigned' => true,
						],
						'Post ID'
					)
					->addColumn(
						'title',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						['nullable => false'],
						'Title Object'
					)
					->addColumn(
						'summary',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						['nullable => false'],
						'Summary Object'
					)
					->addColumn(
						'image',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						'64k',
						[],
						'Image Thumbnail'
					)
					->addColumn(
						'detail',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						[],
						'Detail Object'
					)
					->addColumn(
						'status',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						1,
						[],
						'Record Status'
					)
					->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
					)->addColumn(
						'updated_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
						'Updated At'
					)
					->setComment('Learning Object Table');
				$installer->getConnection()->createTable($table);

				$installer->getConnection()->addIndex(
					$installer->getTable('learning_object_product_post'),
					$setup->getIdxName(
						$installer->getTable('learning_object_product_post'),
						['title', 'summary', 'image', 'detail'],
						\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
					),
					['title', 'summary', 'image', 'detail'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				);
			}
		}


		if (version_compare($context->getVersion(), '1.2.0', '<')) {
			$installer->getConnection()->addColumn(
				$installer->getTable('learning_object_product_post'),
				'test',
				[
					'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
					'nullable' => true,
					'length' => '12,4',
					'comment' => 'test',
					'after' => 'status'
				]
			);
		}

		$installer->endSetup();
	}
}
