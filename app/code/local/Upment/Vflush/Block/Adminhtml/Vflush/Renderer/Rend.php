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

class Upment_Vflush_Block_Adminhtml_Vflush_Renderer_Rend extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

  public function render(Varien_Object $row)
  {
    $value =  $row->getData($this->getColumn()->getIndex());
    $base = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
    return '<a href="'.$base.$value.'" target="_blank">'.$base.$value.'</a>';
  }

}
