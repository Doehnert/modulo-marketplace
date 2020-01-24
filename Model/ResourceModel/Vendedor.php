<?php
namespace Vexpro\Marketplace\Model\ResourceModel;


class Vendedor extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('vexpro_vendedor', 'vendedor_id');
	}
	
}