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

  function osc_cfg_set_credit_cards_checkbox_field($default, $key = null) {
    global $osC_Database;

    $name = (empty($key)) ? 'configuration_value' : 'configuration[' . $key . '][]';

    $cc_array = array();

    $Qcc = $osC_Database->query('select id, credit_card_name from :table_credit_cards where credit_card_status = :credit_card_status order by sort_order, credit_card_name');
    $Qcc->bindTable(':table_credit_cards', TABLE_CREDIT_CARDS);
    $Qcc->bindInt(':credit_card_status', 1);
    $Qcc->execute();

    while ($Qcc->next()) {
      $cc_array[] = array('id' => $Qcc->valueInt('id'),
                          'text' => $Qcc->value('credit_card_name'));
    }

    return osc_draw_checkbox_field($name, $cc_array, explode(',', $default), null, '<br />');
  }
?>
