<?php
namespace Vexpro\Marketplace\Block\Adminhtml;

class Vendedor extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_vendedor';
		$this->_blockGroup = 'Vexpro_Marketplace';
		$this->_headerText = __('Vendedores');
		$this->_addButtonLabel = __('Criar novo vendedor');
		parent::_construct();
	}
}