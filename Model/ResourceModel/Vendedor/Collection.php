<?php
namespace Vexpro\Marketplace\Model\ResourceModel\Vendedor;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'vendedor_id';
	protected $_eventPrefix = 'vexpro_marketplace_vendedor_collection';
	protected $_eventObject = 'vendedor_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Vexpro\Marketplace\Model\Vendedor', 'Vexpro\Marketplace\Model\ResourceModel\Vendedor');
	}

}