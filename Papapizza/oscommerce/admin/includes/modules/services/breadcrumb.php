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

  class osC_Services_breadcrumb_Admin {
    var $title,
        $description,
        $uninstallable = true,
        $depends,
        $precedes;

    function osC_Services_breadcrumb_Admin() {
      global $osC_Language;

      $osC_Language->loadIniFile('modules/services/breadcrumb.php');

      $this->title = $osC_Language->get('services_breadcrumb_title');
      $this->description = $osC_Language->get('services_breadcrumb_description');
    }

    function install() {
      return false;
    }

    function remove() {
      return false;
    }

    function keys() {
      return false;
    }
  }
?>
