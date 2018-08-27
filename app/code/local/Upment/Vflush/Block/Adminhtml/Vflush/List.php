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

class Upment_Vflush_Block_Adminhtml_Vflush_List extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'upment_vflush';
        $this->_controller = 'adminhtml_vflush_list';
        $this->_headerText = Mage::helper('upment_vflush')->__('Varnish Flush - Upment');

        parent::__construct();
        $this->_removeButton('add');
        $this->_addButton('flush_home', array(
          'label'   => Mage::helper('upment_vflush')->__('Flush Home Page'),
          'onclick' => "setLocation('".$this->getUrl('*/*/flush', array('page_id' => '0'))."')"
        ));
    }
}
