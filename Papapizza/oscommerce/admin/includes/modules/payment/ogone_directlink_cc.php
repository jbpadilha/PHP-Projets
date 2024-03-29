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

/**
 * The administration side of the Ogone DirectLink Credit Card payment module
 */

  class osC_Payment_ogone_directlink_cc extends osC_Payment_Admin {

/**
 * The administrative title of the payment module
 *
 * @var string
 * @access private
 */

    var $_title;

/**
 * The code of the payment module
 *
 * @var string
 * @access private
 */

    var $_code = 'ogone_directlink_cc';

/**
 * The developers name
 *
 * @var string
 * @access private
 */

    var $_author_name = 'osCommerce';

/**
 * The developers address
 *
 * @var string
 * @access private
 */

    var $_author_www = 'http://www.oscommerce.com';

/**
 * The status of the module
 *
 * @var boolean
 * @access private
 */

    var $_status = false;

/**
 * Constructor
 */

    function osC_Payment_ogone_directlink_cc() {
      global $osC_Language;

      $this->_title = $osC_Language->get('payment_ogone_directlink_cc_title');
      $this->_description = $osC_Language->get('payment_ogone_directlink_cc_description');
      $this->_method_title = $osC_Language->get('payment_ogone_directlink_cc_method_title');
      $this->_status = (defined('MODULE_PAYMENT_OGONE_DIRECTLINK_CC_STATUS') && (MODULE_PAYMENT_OGONE_DIRECTLINK_CC_STATUS == '1') ? true : false);
      $this->_sort_order = (defined('MODULE_PAYMENT_OGONE_DIRECTLINK_CC_SORT_ORDER') ? MODULE_PAYMENT_OGONE_DIRECTLINK_CC_SORT_ORDER : '');

      if (defined('MODULE_PAYMENT_OGONE_DIRECTLINK_CC_TRANSACTION_SERVER')) {
        switch (MODULE_PAYMENT_OGONE_DIRECTLINK_CC_TRANSACTION_SERVER) {
          case 'production':
            $this->_maintenance_gateway_url = 'https://secure.ogone.com/ncol/prod/maintenancedirect.asp';
            $this->_inquiry_gateway_url = 'https://secure.ogone.com/ncol/prod/querydirect.asp';
            break;

          default:
            $this->_maintenance_gateway_url = 'https://secure.ogone.com/ncol/test/maintenancedirect.asp';
            $this->_inquiry_gateway_url = 'https://secure.ogone.com/ncol/test/querydirect.asp';
            break;
        }
      }
    }

/**
 * Checks to see if the module has been installed
 *
 * @access public
 * @return boolean
 */

    function isInstalled() {
      return (bool)defined('MODULE_PAYMENT_OGONE_DIRECTLINK_CC_STATUS');
    }

/**
 * Installs the module
 *
 * @access public
 * @see osC_Payment_Admin::install()
 */

    function install() {
      global $osC_Database;

      parent::install();

      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Enable Ogone DirectLink Credit Card Module', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_STATUS', '-1', 'Do you want to accept Ogone DirectLink credit card payments?', '6', '0', 'osc_cfg_use_get_boolean_value', 'osc_cfg_set_boolean_value(array(1, -1))', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Merchant ID (PSPID)', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_MERCHANT_ID', '', 'The merchant ID (PSPID) to connect to the gateway with.', '6', '0', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('User ID (optional)', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_USER_ID', '', 'The user ID to perform transactions under. (optional)', '6', '0', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Merchant/User Password', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_PASSWORD', '', 'The password to use with the merchant or user ID when connecting to the gateway.', '6', '0', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('SHA-1 Signature', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_SHA1_SIGNATURE', '', 'The additional string to use when building the SHA-1 signature of the transaction. (optional; 3.2)', '6', '0', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Credit Cards', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_ACCEPTED_TYPES', '', 'Accept these credit card types for this payment method.', '6', '0', 'osc_cfg_set_credit_cards_checkbox_field', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Verify With CVC', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_VERIFY_WITH_CVC', '1', 'Verify the credit card with the billing address with the Credit Card Verification Checknumber (CVC)?', '6', '0', 'osc_cfg_use_get_boolean_value', 'osc_cfg_set_boolean_value(array(1, -1))', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Transaction Server', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_TRANSACTION_SERVER', 'test', 'Perform transactions on the production server or on the testing server.', '6', '0', 'osc_cfg_set_boolean_value(array(\'production\', \'test\'))', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0' , now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment Zone', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', 'osc_cfg_use_get_zone_class_title', 'osc_cfg_set_zone_classes_pull_down_menu', now())");
      $osC_Database->simpleQuery("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', 'osc_cfg_set_order_statuses_pull_down_menu', 'osc_cfg_use_get_order_status_title', now())");
    }

/**
 * Return the configuration parameter keys in an array
 *
 * @access public
 * @return array
 */

    function getKeys() {
      if (!isset($this->_keys)) {
        $this->_keys = array('MODULE_PAYMENT_OGONE_DIRECTLINK_CC_STATUS',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_MERCHANT_ID',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_USER_ID',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_PASSWORD',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_SHA1_SIGNATURE',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_ACCEPTED_TYPES',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_VERIFY_WITH_CVC',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_TRANSACTION_SERVER',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_ZONE',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_ORDER_STATUS_ID',
                             'MODULE_PAYMENT_OGONE_DIRECTLINK_CC_SORT_ORDER');
      }

      return $this->_keys;
    }

/**
 * Returns the available post transaction actions in an array
 *
 * @access public
 * @param $history An array of transaction actions already processed
 * @return array
 */

    function getPostTransactionActions($history) {
      $actions = array(4 => 'inquiryTransaction');

      if ( (in_array('2', $history) === false) && (in_array('3', $history) === false) ) {
        $actions[2] = 'cancelTransaction';
        $actions[3] = 'approveTransaction';
      }

      return $actions;
    }

/**
 * Approves the transaction at the gateway server
 *
 * @access public
 * @param $id The ID of the order
 */

    function approveTransaction($id) {
      global $osC_Database;

      $Qorder = $osC_Database->query('select transaction_return_value from :table_orders_transactions_history where orders_id = :orders_id and transaction_code = 1 order by date_added limit 1');
      $Qorder->bindTable(':table_orders_transactions_history', TABLE_ORDERS_TRANSACTIONS_HISTORY);
      $Qorder->bindInt(':orders_id', $id);
      $Qorder->execute();

      if ($Qorder->numberOfRows() === 1) {
        $osC_XML = new osC_XML($Qorder->value('transaction_return_value'));
        $result_array = $osC_XML->toArray();

        $params = array('PSPID' => MODULE_PAYMENT_OGONE_DIRECTLINK_CC_MERCHANT_ID,
                        'PSWD' => MODULE_PAYMENT_OGONE_DIRECTLINK_CC_PASSWORD,
                        'PAYID' => $result_array['ncresponse attr']['PAYID'],
                        'OPERATION' => 'SAS');

        if (osc_empty(MODULE_PAYMENT_OGONE_DIRECTLINK_CC_USER_ID) === false) {
          $params['USERID'] = MODULE_PAYMENT_OGONE_DIRECTLINK_CC_USER_ID;
        }

        $post_string = '';

        foreach ($params as $key => $value) {
          $post_string .= $key . '=' . urlencode($value) . '&';
        }

        $post_string = substr($post_string, 0, -1);

        $result = osC_Payment::sendTransactionToGateway($this->_maintenance_gateway_url, $post_string);

        if (empty($result) === false) {
          $osC_XML = new osC_XML($result);
          $result_array = $osC_XML->toArray();

          switch ($result_array['ncresponse attr']['STATUS']) {
            case '':
            case '0':
              $transaction_return_status = '0';
              break;

            default:
              $transaction_return_status = '1';
              break;
          }

          $Qtransaction = $osC_Database->query('insert into :table_orders_transactions_history (orders_id, transaction_code, transaction_return_value, transaction_return_status, date_added) values (:orders_id, :transaction_code, :transaction_return_value, :transaction_return_status, now())');
          $Qtransaction->bindTable(':table_orders_transactions_history', TABLE_ORDERS_TRANSACTIONS_HISTORY);
          $Qtransaction->bindInt(':orders_id', $id);
          $Qtransaction->bindInt(':transaction_code', 3);
          $Qtransaction->bindValue(':transaction_return_value', $result);
          $Qtransaction->bindInt(':transaction_return_status', $transaction_return_status);
          $Qtransaction->execute();
        }
      }
    }

/**
 * Cancels the transaction at the gateway server
 *
 * @access public
 * @param $id The ID of the order
 */

    function cancelTransaction($id) {
      global $osC_Database;

      $Qorder = $osC_Database->query('select transaction_return_value from :table_orders_transactions_history where orders_id = :orders_id and transaction_code = 1 order by date_added limit 1');
      $Qorder->bindTable(':table_orders_transactions_history', TABLE_ORDERS_TRANSACTIONS_HISTORY);
      $Qorder->bindInt(':orders_id', $id);
      $Qorder->execute();

      if ($Qorder->numberOfRows() === 1) {
        $osC_XML = new osC_XML($Qorder->value('transaction_return_value'));
        $result_array = $osC_XML->toArray();

        $params = array('PSPID' => MODULE_PAYMENT_OGONE_DIRECTLINK_CC_MERCHANT_ID,
                        'PSWD' => MODULE_PAYMENT_OGONE_DIRECTLINK_CC_PASSWORD,
                        'PAYID' => $result_array['ncresponse attr']['PAYID'],
                        'OPERATION' => 'DES');

        if (osc_empty(MODULE_PAYMENT_OGONE_DIRECTLINK_CC_USER_ID) === false) {
          $params['USERID'] = MODULE_PAYMENT_OGONE_DIRECTLINK_CC_USER_ID;
        }

        $post_string = '';

        foreach ($params as $key => $value) {
          $post_string .= $key . '=' . urlencode($value) . '&';
        }

        $post_string = substr($post_string, 0, -1);

        $result = osC_Payment::sendTransactionToGateway($this->_maintenance_gateway_url, $post_string);

        if (empty($result) === false) {
          $osC_XML = new osC_XML($result);
          $result_array = $osC_XML->toArray();

          switch ($result_array['ncresponse attr']['STATUS']) {
            case '':
            case '0':
              $transaction_return_status = '0';
              break;

            default:
              $transaction_return_status = '1';
              break;
          }

          $Qtransaction = $osC_Database->query('insert into :table_orders_transactions_history (orders_id, transaction_code, transaction_return_value, transaction_return_status, date_added) values (:orders_id, :transaction_code, :transaction_return_value, :transaction_return_status, now())');
          $Qtransaction->bindTable(':table_orders_transactions_history', TABLE_ORDERS_TRANSACTIONS_HISTORY);
          $Qtransaction->bindInt(':orders_id', $id);
          $Qtransaction->bindInt(':transaction_code', 2);
          $Qtransaction->bindValue(':transaction_return_value', $result);
          $Qtransaction->bindInt(':transaction_return_status', $transaction_return_status);
          $Qtransaction->execute();
        }
      }
    }

/**
 * Send a status enquiry of the transaction to the gateway server
 *
 * @access public
 * @param $id The ID of the order
 */

    function inquiryTransaction($id) {
      global $osC_Database;

      $Qorder = $osC_Database->query('select transaction_return_value from :table_orders_transactions_history where orders_id = :orders_id and transaction_code = 1 order by date_added limit 1');
      $Qorder->bindTable(':table_orders_transactions_history', TABLE_ORDERS_TRANSACTIONS_HISTORY);
      $Qorder->bindInt(':orders_id', $id);
      $Qorder->execute();

      if ($Qorder->numberOfRows() === 1) {
        $osC_XML = new osC_XML($Qorder->value('transaction_return_value'));
        $result_array = $osC_XML->toArray();

        $params = array('PSPID' => MODULE_PAYMENT_OGONE_DIRECTLINK_CC_MERCHANT_ID,
                        'PSWD' => MODULE_PAYMENT_OGONE_DIRECTLINK_CC_PASSWORD,
                        'PAYID' => $result_array['ncresponse attr']['PAYID']);

        if (osc_empty(MODULE_PAYMENT_OGONE_DIRECTLINK_CC_USER_ID) === false) {
          $params['USERID'] = MODULE_PAYMENT_OGONE_DIRECTLINK_CC_USER_ID;
        }

        $post_string = '';

        foreach ($params as $key => $value) {
          $post_string .= $key . '=' . urlencode($value) . '&';
        }

        $post_string = substr($post_string, 0, -1);

        $result = osC_Payment::sendTransactionToGateway($this->_inquiry_gateway_url, $post_string);

        if (empty($result) === false) {
          $osC_XML = new osC_XML($result);
          $result_array = $osC_XML->toArray();

          switch ($result_array['ncresponse attr']['STATUS']) {
            case '':
            case '0':
              $transaction_return_status = '0';
              break;

            default:
              $transaction_return_status = '1';
              break;
          }

          $Qtransaction = $osC_Database->query('insert into :table_orders_transactions_history (orders_id, transaction_code, transaction_return_value, transaction_return_status, date_added) values (:orders_id, :transaction_code, :transaction_return_value, :transaction_return_status, now())');
          $Qtransaction->bindTable(':table_orders_transactions_history', TABLE_ORDERS_TRANSACTIONS_HISTORY);
          $Qtransaction->bindInt(':orders_id', $id);
          $Qtransaction->bindInt(':transaction_code', 4);
          $Qtransaction->bindValue(':transaction_return_value', $result);
          $Qtransaction->bindInt(':transaction_return_status', $transaction_return_status);
          $Qtransaction->execute();
        }
      }
    }
  }
?>
