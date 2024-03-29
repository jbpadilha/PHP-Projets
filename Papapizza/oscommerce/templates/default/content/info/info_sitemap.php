<?php
/*
  $Id: $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2006 osCommerce

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  $osC_CategoryTree->reset();
  $osC_CategoryTree->setShowCategoryProductCount(false);
?>

<?php echo osc_image(DIR_WS_IMAGES . $osC_Template->getPageImage(), $osC_Template->getPageTitle(), HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT, 'id="pageIcon"'); ?>

<h1><?php echo $osC_Template->getPageTitle(); ?></h1>

<div>
  <div style="float: right; width: 49%;">
    <ul>
      <li><?php echo osc_link_object(osc_href_link(FILENAME_ACCOUNT, null, 'SSL'), $osC_Language->get('sitemap_account')); ?>
        <ul>
          <li><?php echo osc_link_object(osc_href_link(FILENAME_ACCOUNT, 'edit', 'SSL'), $osC_Language->get('sitemap_account_edit')); ?></li>
          <li><?php echo osc_link_object(osc_href_link(FILENAME_ACCOUNT, 'address_book', 'SSL'), $osC_Language->get('sitemap_address_book')); ?></li>
          <li><?php echo osc_link_object(osc_href_link(FILENAME_ACCOUNT, 'orders', 'SSL'), $osC_Language->get('sitemap_account_history')); ?></li>
          <li><?php echo osc_link_object(osc_href_link(FILENAME_ACCOUNT, 'newsletters', 'SSL'), $osC_Language->get('sitemap_account_notifications')); ?></li>
        </ul>
      </li>
      <li><?php echo osc_link_object(osc_href_link(FILENAME_CHECKOUT, null, 'SSL'), $osC_Language->get('sitemap_shopping_cart')); ?></li>
      <li><?php echo osc_link_object(osc_href_link(FILENAME_CHECKOUT, 'shipping', 'SSL'), $osC_Language->get('sitemap_checkout_shipping')); ?></li>
      <li><?php echo osc_link_object(osc_href_link(FILENAME_SEARCH), $osC_Language->get('sitemap_advanced_search')); ?></li>
      <li><?php echo osc_link_object(osc_href_link(FILENAME_PRODUCTS, 'new'), $osC_Language->get('sitemap_products_new')); ?></li>
      <li><?php echo osc_link_object(osc_href_link(FILENAME_PRODUCTS, 'specials'), $osC_Language->get('sitemap_specials')); ?></li>
      <li><?php echo osc_link_object(osc_href_link(FILENAME_PRODUCTS, 'reviews'), $osC_Language->get('sitemap_reviews')); ?></li>
      <li><?php echo osc_link_object(osc_href_link(FILENAME_INFO), $osC_Language->get('box_information_heading')); ?>
        <ul>
          <li><?php echo osc_link_object(osc_href_link(FILENAME_INFO, 'shipping'), $osC_Language->get('box_information_shipping')); ?></li>
          <li><?php echo osc_link_object(osc_href_link(FILENAME_INFO, 'privacy'), $osC_Language->get('box_information_privacy')); ?></li>
          <li><?php echo osc_link_object(osc_href_link(FILENAME_INFO, 'conditions'), $osC_Language->get('box_information_conditions')); ?></li>
          <li><?php echo osc_link_object(osc_href_link(FILENAME_INFO, 'contact'), $osC_Language->get('box_information_contact')); ?></li>
        </ul>
      </li>
    </ul>
  </div>

  <div style="width: 49%;">
    <?php echo $osC_CategoryTree->getTree(); ?>
  </div>
</div>
