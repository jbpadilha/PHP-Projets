<?php
/*
  $Id: $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  class osC_ProductAttributes_manufacturers {
    static public function getValue($value) {
      global $osC_Database;

      $Qmanufacturer = $osC_Database->query('select manufacturers_name from :table_manufacturers where manufacturers_id = :manufacturers_id');
      $Qmanufacturer->bindTable(':table_manufacturers');
      $Qmanufacturer->bindInt(':manufacturers_id', $value);
      $Qmanufacturer->execute();

      if ( $Qmanufacturer->numberOfRows() === 1 ) {
        return $Qmanufacturer->value('manufacturers_name');
      }
    }
  }
?>
