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
?>

<div style="float: right;"><?php echo osc_link_object(osc_href_link(FILENAME_PRODUCTS, $osC_Product->getKeyword()), $osC_Image->show($osC_Product->getImage(), $osC_Product->getTitle(), 'hspace="5" vspace="5"', 'mini')); ?></div>

<h1><?php echo $osC_Template->getPageTitle() . ($osC_Product->hasModel() ? '<br /><span class="smallText">' . $osC_Product->getModel() . '</span>' : ''); ?></h1>

<?php
  if ($osC_MessageStack->size('tell_a_friend') > 0) {
    echo $osC_MessageStack->get('tell_a_friend');
  }
?>

<form name="tell_a_friend" action="<?php echo osc_href_link(FILENAME_PRODUCTS, 'tell_a_friend&' . $osC_Product->getKeyword() . '&action=process'); ?>" method="post">

<div class="moduleBox">
  <em style="float: right; margin-top: 10px;"><?php echo $osC_Language->get('form_required_information'); ?></em>

  <h6><?php echo $osC_Language->get('customer_details_title'); ?></h6>

  <div class="content">
    <ol>
      <li><?php echo osc_draw_label($osC_Language->get('field_tell_a_friend_customer_name'), null, 'from_name', true) . osc_draw_input_field('from_name', ($osC_Customer->isLoggedOn() ? $osC_Customer->getName() : null)); ?></li>
      <li><?php echo osc_draw_label($osC_Language->get('field_tell_a_friend_customer_email_address'), null, 'from_email_address', true) . osc_draw_input_field('from_email_address', ($osC_Customer->isLoggedOn() ? $osC_Customer->getEmailAddress() : null)); ?></li>
    </ol>
  </div>
</div>

<div class="moduleBox">
  <h6><?php echo $osC_Language->get('friend_details_title'); ?></h6>

  <div class="content">
    <ol>
      <li><?php echo osc_draw_label($osC_Language->get('field_tell_a_friend_friends_name'), null, 'to_name', true) . osc_draw_input_field('to_name'); ?></li>
      <li><?php echo osc_draw_label($osC_Language->get('field_tell_a_friend_friends_email_address'), null, 'to_email_address', true) . osc_draw_input_field('to_email_address'); ?></li>
    </ol>
  </div>
</div>

<div class="moduleBox">
  <h6><?php echo $osC_Language->get('tell_a_friend_message'); ?></h6>

  <div class="content">
    <ol>
      <li><?php echo osc_draw_textarea_field('message', null, 40, 8, 'style="width: 98%;"'); ?></li>
    </ol>
  </div>
</div>

<div class="submitFormButtons">
  <span style="float: right;"><?php echo osc_draw_image_submit_button('button_continue.gif', $osC_Language->get('button_continue')); ?></span>

  <?php echo osc_link_object(osc_href_link(FILENAME_PRODUCTS, $osC_Product->getKeyword()), osc_draw_image_button('button_back.gif', $osC_Language->get('button_back'))); ?>
</div>

</form>
