<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2006 osCommerce

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  class osC_Specials {

/* Private variables */

    var $_specials = array();

/* Class constructor */

    function osC_Specials() {
    }

/* Public methods */

    function activateAll() {
      global $osC_Database;

      $Qspecials = $osC_Database->query('select specials_id from :table_specials where status = 0 and now() >= start_date and start_date > 0 and now() < expires_date');
      $Qspecials->bindTable(':table_specials', TABLE_SPECIALS);
      $Qspecials->execute();

      while ($Qspecials->next()) {
        $this->_setStatus($Qspecials->valueInt('specials_id'), true);
      }

      $Qspecials->freeResult();
    }

    function expireAll() {
      global $osC_Database;

      $Qspecials = $osC_Database->query('select specials_id from :table_specials where status = 1 and now() >= expires_date and expires_date > 0');
      $Qspecials->bindTable(':table_specials', TABLE_SPECIALS);
      $Qspecials->execute();

      while ($Qspecials->next()) {
        $this->_setStatus($Qspecials->valueInt('specials_id'), false);
      }

      $Qspecials->freeResult();
    }

    function isActive($id) {
      global $osC_Database;

      if (!isset($this->_specials[$id])) {
        $this->_specials[$id] = $this->getPrice($id);
      }

      return is_numeric($this->_specials[$id]);
    }

    function getPrice($id) {
      global $osC_Database;

      if (!isset($this->_specials[$id])) {
        $Qspecial = $osC_Database->query('select specials_new_products_price from :table_specials where products_id = :products_id and status = 1');
        $Qspecial->bindTable(':table_specials', TABLE_SPECIALS);
        $Qspecial->bindInt(':products_id', $id);
        $Qspecial->execute();

        if ($Qspecial->numberOfRows() > 0) {
          $this->_specials[$id] = $Qspecial->valueDecimal('specials_new_products_price');
        } else {
          $this->_specials[$id] = null;
        }

        $Qspecial->freeResult();
      }

      return $this->_specials[$id];
    }
	
	function getRelativePrice($id, $check = false) {
		global $osC_Database;

		if(!$check)
			$this->_specials_ex[$id] = array();

		$Qspecial = $osC_Database->query('select value, percentage from :table_specials where products_id = :products_id and status = 1');
		$Qspecial->bindTable(':table_specials', TABLE_SPECIALS);
		$Qspecial->bindInt(':products_id', $id);
		$Qspecial->execute();

		if ($Qspecial->numberOfRows() > 0)
		{
			if($check)
				return true;
				
			$this->_specials_ex[$id]['value'] = $Qspecial->valueDecimal('value');
			$this->_specials_ex[$id]['percentage'] = $Qspecial->valueInt('percentage');
		}
		else
		{
			$Qspecial = $osC_Database->query('select s.value, s.percentage from :table_products p inner join :table_products pp ON (p.products_id = pp.parent_id and pp.products_id = :products_id) INNER JOIN :table_specials s ON (p.products_id = s.products_id) where s.status = 1');
			$Qspecial->bindTable(':table_products', TABLE_PRODUCTS);
			$Qspecial->bindTable(':table_products', TABLE_PRODUCTS);
			$Qspecial->bindTable(':table_specials', TABLE_SPECIALS);
			$Qspecial->bindInt(':products_id', $id);
			$Qspecial->execute();
			
			if($Qspecial->numberOfRows() > 0)
			{
				if($check)
					return true;
				
				$this->_specials_ex[$id]['value'] = $Qspecial->valueDecimal('value');
				$this->_specials_ex[$id]['percentage'] = $Qspecial->valueInt('percentage');
			}
			else
				$this->_specials_ex[$id] = null;
		}

		$Qspecial->freeResult();
		
		if($check)
			return false;
		
		return $this->_specials_ex[$id];
	}

    function &getListing() {
      global $osC_Database, $osC_Language, $osC_Image;

      $Qspecials = $osC_Database->query('select p.products_id, p.has_children, p.products_price, p.products_tax_class_id, pd.products_name, pd.products_keyword, s.specials_new_products_price, s.value, s.percentage, i.image from :table_products p left join :table_products_images i on (p.products_id = i.products_id and i.default_flag = :default_flag), :table_products_description pd, :table_specials s where p.products_status = 1 and s.products_id = p.products_id and p.products_id = pd.products_id and pd.language_id = :language_id and s.status = 1 order by s.specials_date_added desc');
      $Qspecials->bindTable(':table_products', TABLE_PRODUCTS);
      $Qspecials->bindTable(':table_products_images', TABLE_PRODUCTS_IMAGES);
      $Qspecials->bindTable(':table_products_description', TABLE_PRODUCTS_DESCRIPTION);
      $Qspecials->bindTable(':table_specials', TABLE_SPECIALS);
      $Qspecials->bindInt(':default_flag', 1);
      $Qspecials->bindInt(':language_id', $osC_Language->getID());
      $Qspecials->setBatchLimit((isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1), MAX_DISPLAY_SPECIAL_PRODUCTS);
      $Qspecials->execute();

      return $Qspecials;
    }

/* Private methods */

    function _setStatus($id, $status) {
      global $osC_Database;

      $Qstatus = $osC_Database->query('update :table_specials set status = :status, date_status_change = now() where specials_id = :specials_id');
      $Qstatus->bindTable(':table_specials', TABLE_SPECIALS);
      $Qstatus->bindInt(':status', ($status === true) ? '1' : '0');
      $Qstatus->bindInt(':specials_id', $id);
      $Qstatus->execute();

      $Qstatus->freeResult();
    }
  }
?>