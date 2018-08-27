<?php
/**
 * Upment Varnish Flush module for Magento
 * Copyright (C) 2018  Upment D.O.O.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

class Upment_Vflush_Block_Adminhtml_Vflush_List_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('upment_vflush');
        $this->setDefaultSort('title');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('cms/page_collection')->addFieldToFilter('is_active', 1);
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('upment_vflush');

        $this->addColumn('page_id', array(
            'header' => $helper->__('Page ID'),
            'width'  => 20,
            'index'  => 'page_id'
        ));

        $this->addColumn('title', array(
            'header' => $helper->__('Page Name'),
            'index'  => 'title'
        ));

        $this->addColumn('identifier', array(
            'header' => $helper->__('URL'),
            'index'  => 'identifier',
            'renderer'  => 'Upment_Vflush_Block_Adminhtml_Vflush_Renderer_Rend'
        ));

        $this->addColumn('action_flush', array(
          'index'     => 'page_id',
          'header'    => $helper->__('Action'),
          'width'     => 15,
          'sortable'  => false,
          'filter'    => false,
          'type'      => 'action',
          'actions'   => array(
            array(
              'url'     => array(
                'base'      => '*/*/flush'
              ),
              'caption' => $helper->__('Flush'),
              'field'   => 'page_id'
            ),
          )
        ));

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}
