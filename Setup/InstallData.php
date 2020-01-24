<?php
namespace Vexpro\Marketplace\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Catalog\Model\Product;

class InstallData implements InstallDataInterface
{
    protected $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->addAttribute(Product::ENTITY, 'points', [
            'type' => 'int', //inform which EAV table this attribute data will saved to
            'label' => 'points', //user friendly label that is used within admin
            'input' => 'text', //defined the type of input that will be used
            'visible' => true,
            'required' => false, //tell us if the field is required to be entered before the product can be saved.
            'sort_order' => 100, //the order it will be displayed within the admin
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE, //the scope that is allowed for the value to be modified.
            'wysiwyg' => true,
            'is_html_allowed_on_front' => true, // tells the validation engine that HTML is allowed for this attribute
        ]);

        $setup->endSetup();
    }
}
