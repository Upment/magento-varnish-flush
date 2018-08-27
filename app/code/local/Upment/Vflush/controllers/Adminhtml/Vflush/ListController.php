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

class Upment_Vflush_Adminhtml_Vflush_ListController extends Mage_Adminhtml_Controller_Action
{

  public function indexAction() {
    $this->_title($this->__('Upment'))->_title($this->__('Varnish Flush'));
    $this->loadLayout();
    $this->_setActiveMenu('upment');
    $this->_addContent($this->getLayout()->createBlock('upment_vflush/adminhtml_vflush_list'));
    $this->renderLayout();
  }

  public function gridAction()
  {
    $this->loadLayout();
    $this->getResponse()->setBody(
      $this->getLayout()->createBlock('upment_vflush/adminhtml_vflush_list_grid')->toHtml()
    );
  }

  public function flushAction() {
    $urlParam = $this->getRequest()->getParam('page_id');
    if ($urlParam == 0) {
      $url='^/$';
    } else {
      $url='^/'.Mage::getModel('cms/page')->load($urlParam)->getIdentifier().'$';
    }
    if ($result = Mage::getModel('turpentine/varnish_admin')->flushUrl($url)) {
      $status=reset($result);
      if ($url == '^/$') $url="Home Page";
      if ($status == '1') {
        Mage::getSingleton('adminhtml/session')->addSuccess("Cache flush successful for $url");
      } else {
        Mage::getSingleton('adminhtml/session')->addError("Coundn't flush $url cache: $status");
      }
    } else {
      Mage::getSingleton('adminhtml/session')->addError("An unknown error occured.");
    }
    $this->_redirect('*/*/index');
  }

}
