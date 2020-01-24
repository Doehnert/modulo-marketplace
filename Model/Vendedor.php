<?php
namespace Vexpro\Marketplace\Model;
class Vendedor extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'vexpro_marketplace_vendedor';

	protected $_cacheTag = 'vexpro_marketplace_vendedor';

	protected $_eventPrefix = 'vexpro_marketplace_vendedor';

	protected function _construct()
	{
		$this->_init('Vexpro\Marketplace\Model\ResourceModel\Vendedor');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}