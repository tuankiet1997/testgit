<?php
/**
 *   Copyright © 2019 Magenest. All rights reserved.
 *   See COPYING.txt for license details.
 *
 *   Magenest_ImageGallery extension
 *   NOTICE OF LICENSE
 *
 */

namespace Magenest\Test\Setup;

/**
 * Class InstallSchema
 * @package Magenest\ImageGallery\Setup
 */
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    /**
     * @param \Magento\Framework\Setup\SchemaSetupInterface $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     */
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();
        // create image table
        $tableImage = $installer->getConnection();
        $tableImage->addColumn(
            $installer->getTable('quote_address'),
            'region_address',
            [
                'type' => \Magento\Framework\DB\Ddl\Table ::TYPE_TEXT,
                'nullable' => true,
                'default' => NULL,
                'length' => 255,
                'comment' => 'Region Address'
            ]
        );
        $tableImage->addColumn(
            $installer->getTable('sales_order_address'),
            'region_address',
            [
                'type' => \Magento\Framework\DB\Ddl\Table ::TYPE_TEXT,
                'nullable' => true,
                'default' => NULL,
                'length' => 255,
                'comment' => 'Region Address'
            ]
        );
        $tableImage->addColumn(
            $installer->getTable('quote_payment'),
            'region_address',
            [
                'type' => \Magento\Framework\DB\Ddl\Table ::TYPE_TEXT,
                'nullable' => true,
                'default' => NULL,
                'length' => 255,
                'comment' => 'Region Address'
            ]
        );
        $tableImage->addColumn(
            $installer->getTable('sales_order_payment'),
            'region_address',
            [
                'type' => \Magento\Framework\DB\Ddl\Table ::TYPE_TEXT,
                'nullable' => true,
                'default' => NULL,
                'length' => 255,
                'comment' => 'Region Address'
            ]
        );

        $tableImage->addColumn(
            $installer->getTable('quote'),
            'region_address',
            [
                'type' => \Magento\Framework\DB\Ddl\Table ::TYPE_TEXT,
                'nullable' => true,
                'default' => NULL,
                'length' => 255,
                'comment' => 'Region Address'
            ]
        );

        $tableImage->addColumn(
            $installer->getTable('sales_order'),
            'region_address',
            [
                'type' => \Magento\Framework\DB\Ddl\Table ::TYPE_TEXT,
                'nullable' => true,
                'default' => NULL,
                'length' => 255,
                'comment' => 'Region Address'
            ]
        );

        $tableImage->addColumn(
            $installer->getTable('sales_order_grid'),
            'region_address',
            [
                'type' => \Magento\Framework\DB\Ddl\Table ::TYPE_TEXT,
                'nullable' => true,
                'default' => NULL,
                'length' => 255,
                'comment' => 'Region Address'
            ]
        );
        $installer->endSetup();
    }
}
