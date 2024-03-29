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

  class osC_Product {
    var $_data = array();

    function __construct($id) {
      global $osC_Database, $osC_Services, $osC_Language, $osC_Image;

      if ( !empty($id) ) {
        if ( is_numeric($id) ) {
          $Qproduct = $osC_Database->query('select products_id as id, parent_id, products_quantity as quantity, products_price as price, products_model as model, products_tax_class_id as tax_class_id, products_weight as weight, products_weight_class as weight_class_id, products_date_added as date_added, manufacturers_id, has_children from :table_products where products_id = :products_id and products_status = :products_status');
          $Qproduct->bindTable(':table_products', TABLE_PRODUCTS);
          $Qproduct->bindInt(':products_id', $id);
          $Qproduct->bindInt(':products_status', 1);
          $Qproduct->execute();

          if ( $Qproduct->numberOfRows() === 1 ) {
            $this->_data = $Qproduct->toArray();

            $this->_data['master_id'] = $Qproduct->valueInt('id');
            $this->_data['has_children'] = $Qproduct->valueInt('has_children');

            if ( $Qproduct->valueInt('parent_id') > 0 ) {
              $Qmaster = $osC_Database->query('select products_id, has_children from :table_products where products_id = :products_id and products_status = :products_status');
              $Qmaster->bindTable(':table_products', TABLE_PRODUCTS);
              $Qmaster->bindInt(':products_id', $Qproduct->valueInt('parent_id'));
              $Qmaster->bindInt(':products_status', 1);
              $Qmaster->execute();

              if ( $Qmaster->numberOfRows() === 1 ) {
                $this->_data['master_id'] = $Qmaster->valueInt('products_id');
                $this->_data['has_children'] = $Qmaster->valueInt('has_children');
              } else { // master product is disabled so invalidate the product variant
                $this->_data = array();
              }
            }

            if ( !empty($this->_data) ) {
              $Qdesc = $osC_Database->query('select products_name as name, products_description as description, products_keyword as keyword, products_tags as tags, products_url as url from :table_products_description where products_id = :products_id and language_id = :language_id');
              $Qdesc->bindTable(':table_products_description', TABLE_PRODUCTS_DESCRIPTION);
              $Qdesc->bindInt(':products_id', $this->_data['master_id']);
              $Qdesc->bindInt(':language_id', $osC_Language->getID());
              $Qdesc->execute();

              $this->_data = array_merge($this->_data, $Qdesc->toArray());
            }
          }
        } else {
          $Qproduct = $osC_Database->query('select p.products_id as id, p.parent_id, p.products_quantity as quantity, p.products_price as price, p.products_model as model, p.products_tax_class_id as tax_class_id, p.products_weight as weight, p.products_weight_class as weight_class_id, p.products_date_added as date_added, p.manufacturers_id, p.has_children, pd.products_name as name, pd.products_description as description, pd.products_keyword as keyword, pd.products_tags as tags, pd.products_url as url from :table_products p, :table_products_description pd where pd.products_keyword = :products_keyword and pd.language_id = :language_id and pd.products_id = p.products_id and p.products_status = :products_status');
          $Qproduct->bindTable(':table_products', TABLE_PRODUCTS);
          $Qproduct->bindTable(':table_products_description', TABLE_PRODUCTS_DESCRIPTION);
          $Qproduct->bindValue(':products_keyword', $id);
          $Qproduct->bindInt(':language_id', $osC_Language->getID());
          $Qproduct->bindInt(':products_status', 1);
          $Qproduct->execute();

          if ($Qproduct->numberOfRows() === 1) {
            $this->_data = $Qproduct->toArray();

            $this->_data['master_id'] = $Qproduct->valueInt('id');
            $this->_data['has_children'] = $Qproduct->valueInt('has_children');
          }
        }

        if ( !empty($this->_data) ) {
          $this->_data['images'] = array();

          $Qimages = $osC_Database->query('select id, image, default_flag from :table_products_images where products_id = :products_id order by sort_order');
          $Qimages->bindTable(':table_products_images', TABLE_PRODUCTS_IMAGES);
          $Qimages->bindInt(':products_id', $this->_data['master_id']);
          $Qimages->execute();

          while ($Qimages->next()) {
            $this->_data['images'][] = $Qimages->toArray();
          }

          $Qcategory = $osC_Database->query('select categories_id from :table_products_to_categories where products_id = :products_id limit 1');
          $Qcategory->bindTable(':table_products_to_categories', TABLE_PRODUCTS_TO_CATEGORIES);
          $Qcategory->bindInt(':products_id', $this->_data['master_id']);
          $Qcategory->execute();

          $this->_data['category_id'] = $Qcategory->valueInt('categories_id');

          if ( $this->_data['has_children'] === 1 ) {
            $this->_data['variants'] = array();

            $Qsubproducts = $osC_Database->query('select * from :table_products where parent_id = :parent_id and products_status = :products_status');
            $Qsubproducts->bindTable(':table_products', TABLE_PRODUCTS);
            $Qsubproducts->bindInt(':parent_id', $this->_data['master_id']);
            $Qsubproducts->bindInt(':products_status', 1);
            $Qsubproducts->execute();

            while ( $Qsubproducts->next() ) {
              $this->_data['variants'][$Qsubproducts->valueInt('products_id')]['data'] = array('price' => $Qsubproducts->value('products_price'),
                                                                                               'tax_class_id' => $Qsubproducts->valueInt('products_tax_class_id'),
                                                                                               'model' => $Qsubproducts->value('products_model'),
                                                                                               'quantity' => $Qsubproducts->value('products_quantity'),
                                                                                               'weight' => $Qsubproducts->value('products_weight'),
                                                                                               'weight_class_id' => $Qsubproducts->valueInt('products_weight_class'),
                                                                                               'availability_shipping' => 1);

              $Qvariants = $osC_Database->query('select pv.default_combo, pvg.id as group_id, pvg.title as group_title, pvg.module, pvv.id as value_id, pvv.title as value_title, pvv.sort_order as value_sort_order from :table_products_variants pv, :table_products_variants_groups pvg, :table_products_variants_values pvv where pv.products_id = :products_id and pv.products_variants_values_id = pvv.id and pvv.languages_id = :languages_id and pvv.products_variants_groups_id = pvg.id and pvg.languages_id = :languages_id order by pvg.sort_order, pvg.title');
              $Qvariants->bindTable(':table_products_variants', TABLE_PRODUCTS_VARIANTS);
              $Qvariants->bindTable(':table_products_variants_groups', TABLE_PRODUCTS_VARIANTS_GROUPS);
              $Qvariants->bindTable(':table_products_variants_values', TABLE_PRODUCTS_VARIANTS_VALUES);
              $Qvariants->bindInt(':products_id', $Qsubproducts->valueInt('products_id'));
              $Qvariants->bindInt(':languages_id', $osC_Language->getID());
              $Qvariants->bindInt(':languages_id', $osC_Language->getID());
              $Qvariants->execute();

              while ( $Qvariants->next() ) {
                $this->_data['variants'][$Qsubproducts->valueInt('products_id')]['values'][$Qvariants->valueInt('group_id')][$Qvariants->valueInt('value_id')] = array('value_id' => $Qvariants->valueInt('value_id'),
                                                                                                                                                                       'group_title' => $Qvariants->value('group_title'),
                                                                                                                                                                       'value_title' => $Qvariants->value('value_title'),
                                                                                                                                                                       'sort_order' => $Qvariants->value('value_sort_order'),
                                                                                                                                                                       'default' => (bool)$Qvariants->valueInt('default_combo'),
                                                                                                                                                                       'module' => $Qvariants->value('module'));
              }
            }
          }

          $this->_data['attributes'] = array();

          $Qattributes = $osC_Database->query('select tb.code, pa.value from :table_product_attributes pa, :table_templates_boxes tb where pa.products_id = :products_id and pa.languages_id in (0, :languages_id) and pa.id = tb.id');
          $Qattributes->bindTable(':table_product_attributes');
          $Qattributes->bindTable(':table_templates_boxes');
          $Qattributes->bindInt(':products_id', $this->_data['master_id']);
          $Qattributes->bindInt(':languages_id', $osC_Language->getID());
          $Qattributes->execute();

          while ( $Qattributes->next() ) {
            $this->_data['attributes'][$Qattributes->value('code')] = $Qattributes->value('value');
          }

          if ( $osC_Services->isStarted('reviews') ) {
            $Qavg = $osC_Database->query('select avg(reviews_rating) as rating from :table_reviews where products_id = :products_id and languages_id = :languages_id and reviews_status = 1');
            $Qavg->bindTable(':table_reviews', TABLE_REVIEWS);
            $Qavg->bindInt(':products_id', $this->_data['master_id']);
            $Qavg->bindInt(':languages_id', $osC_Language->getID());
            $Qavg->execute();

            $this->_data['reviews_average_rating'] = round($Qavg->value('rating'));
          }
        }
      }
    }

    function isValid() {
      return !empty($this->_data);
    }

    function getData($key = null) {
      if ( isset($this->_data[$key]) ) {
        return $this->_data[$key];
      }

      return $this->_data;
    }

    function getID() {
      return $this->_data['id'];
    }

    function getMasterID() {
      return $this->_data['master_id'];
    }

    function getTitle() {
      return $this->_data['name'];
    }

    function getDescription() {
      return $this->_data['description'];
    }

    function hasModel() {
      return (isset($this->_data['model']) && !empty($this->_data['model']));
    }

    function getModel() {
		print_r($this->_data['model']);
      return $this->_data['model'];
    }

    function hasKeyword() {
      return (isset($this->_data['keyword']) && !empty($this->_data['keyword']));
    }

    function getKeyword() {
      return $this->_data['keyword'];
    }

    function hasTags() {
      return (isset($this->_data['tags']) && !empty($this->_data['tags']));
    }

    function getTags() {
      return $this->_data['tags'];
    }

    function getPrice() {
    }

	function getPriceFormated($with_special = false) {
		global $osC_Services, $osC_Specials, $osC_Currencies, $osC_Language;

		if (($with_special === true) && $osC_Services->isStarted('specials') && (($new_price = $osC_Specials->getPrice($this->_data['id'])) || $osC_Specials->getRelativePrice($this->_data['id'], true)))
		{			
			$promo = $osC_Specials->getRelativePrice($this->_data['id']);				
				
			if($this->hasVariants() && isset($promo) && $promo)
			{
				$promo = $this->getVariantMinPrice() - ((!$promo['percentage']) ? $promo['value'] : ($this->getVariantMinPrice() * $promo['value'] / 100)); 				
				$price = $osC_Language->get('price_from') . '&nbsp;<s>' . $osC_Currencies->displayPrice($this->getVariantMinPrice(), $this->_data['tax_class_id']) . '</s> <span class="productSpecialPrice">' . $osC_Currencies->displayPrice($promo, $this->_data['tax_class_id']) . '</span>';
			}
			else
			{
				$price = '<s>' . $osC_Currencies->displayPrice($this->_data['price'], $this->_data['tax_class_id']) . '</s> <span class="productSpecialPrice">' . $osC_Currencies->displayPrice($new_price, $this->_data['tax_class_id']) . '</span>';
			}
		}
		else
		{
			if ( $this->hasVariants() )
			{				
				$price = $osC_Language->get('price_from') . '&nbsp;' . $osC_Currencies->displayPrice($this->getVariantMinPrice(), $this->_data['tax_class_id']);
			}
			else
			{
				$price = $osC_Currencies->displayPrice($this->_data['price'], $this->_data['tax_class_id']);
			}
		}

		return $price;
	}

    function getVariantMinPrice() {
      $price = null;

      foreach ( $this->_data['variants'] as $variant ) {
        if ( ($price === null) || ($variant['data']['price'] < $price) ) {
          $price = $variant['data']['price'];
        }
      }

      return ( $price !== null ) ? $price : 0;
    }

    function getVariantMaxPrice() {
      $price = 0;

      foreach ( $this->_data['variants'] as $variant ) {
        if ( $variant['data']['price'] > $price ) {
          $price = $variant['data']['price'];
        }
      }

      return $price;
    }

    function getQuantity() {
      $quantity = $this->_data['quantity'];

      if ( $this->hasVariants() ) {
        $quantity = 0;

        foreach ( $this->_data['variants'] as $variants ) {
          $quantity += $variants['data']['quantity'];
        }
      }

      return $quantity;
    }

    function getWeight() {
      global $osC_Weight;

      $weight = 0;

      if ( $this->hasVariants() ) {
        foreach ( $this->_data['variants'] as $subproduct_id => $variants ) {
          foreach ( $variants['values'] as $group_id => $values ) {
            foreach ( $values as $value_id => $data ) {
              if ( $data['default'] === true ) {
                $weight = $osC_Weight->display($variants['data']['weight'], $variants['data']['weight_class_id']);

                break 3;
              }
            }
          }
        }
      } else {
        $weight = $osC_Weight->display($this->_data['weight'], $this->_data['weight_class_id']);
      }

      return $weight;
    }

    function hasManufacturer() {
      return ( $this->_data['manufacturers_id'] > 0 );
    }

    function getManufacturer() {
      if ( !class_exists('osC_Manufacturer') ) {
        include('includes/classes/manufacturer.php');
      }

      $osC_Manufacturer = new osC_Manufacturer($this->_data['manufacturers_id']);

      return $osC_Manufacturer->getTitle();
    }

    function getManufacturerID() {
      return $this->_data['manufacturers_id'];
    }

    function getCategoryID() {
      return $this->_data['category_id'];
    }

    function getImages() {
      return $this->_data['images'];
    }

    function hasImage() {
      foreach ($this->_data['images'] as $image) {
        if ($image['default_flag'] == '1') {
          return true;
        }
      }
    }

    function getImage() {
      foreach ($this->_data['images'] as $image) {
        if ($image['default_flag'] == '1') {
          return $image['image'];
        }
      }
    }

    function hasURL() {
      return (isset($this->_data['url']) && !empty($this->_data['url']));
    }

    function getURL() {
      return $this->_data['url'];
    }

    function getDateAvailable() {
// HPDL
      return false; //$this->_data['date_available'];
    }

    function getDateAdded() {
      return $this->_data['date_added'];
    }

    function hasVariants() {
      return (isset($this->_data['variants']) && !empty($this->_data['variants']));
    }

    function getVariants($filter_duplicates = true) {
      if ( $filter_duplicates === true ) {
        $values_array = array();

        foreach ( $this->_data['variants'] as $product_id => $variants ) {
          foreach ( $variants['values'] as $group_id => $values ) {
            foreach ( $values as $value_id => $value ) {
              if ( !isset($values_array[$group_id]) ) {
                $values_array[$group_id]['group_id'] = $group_id;
                $values_array[$group_id]['title'] = $value['group_title'];
                $values_array[$group_id]['module'] = $value['module'];
              }

              $value_exists = false;

              if ( isset($values_array[$group_id]['data']) ) {
                foreach ( $values_array[$group_id]['data'] as $data ) {
                  if ( $data['id'] == $value_id ) {
                    $value_exists = true;

                    break;
                  }
                }
              }

              if ( $value_exists === false ) {
                $values_array[$group_id]['data'][] = array('id' => $value_id,
                                                           'text' => $value['value_title'],
                                                           'default' => $value['default'],
                                                           'sort_order' => $value['sort_order']);
              } elseif ( $value['default'] === true ) {
                foreach ( $values_array[$group_id]['data'] as &$existing_data ) {
                  if ( $existing_data['id'] == $value_id ) {
                    $existing_data['default'] = true;

                    break;
                  }
                }
              }
            }
          }
        }

        foreach ( $values_array as $group_id => &$value ) {
          usort($value['data'], array('osC_Product', '_usortVariantValues'));
        }

        return $values_array;
      }

      return $this->_data['variants'];
    }

    function variantExists($variant) {
      return is_numeric($this->getProductVariantID($variant));
    }

    function getProductVariantID($variant) {
      $_product_id = false;

      $_size = sizeof($variant);

      foreach ( $this->_data['variants'] as $product_id => $variants ) {
        if ( sizeof($variants['values']) === $_size ) {
          $_array = array();

          foreach ( $variants['values'] as $group_id => $value ) {
            foreach ( $value as $value_id => $value_data ) {
              if ( is_array($variant[$group_id]) && array_key_exists($value_id, $variant[$group_id]) ) {
                $_array[$group_id][$value_id] = $variant[$group_id][$value_id];
              } else {
                $_array[$group_id] = $value_id;
              }
            }
          }

          if ( sizeof(array_diff_assoc($_array, $variant)) === 0 ) {
            $_product_id = $product_id;

            break;
          }
        }
      }

      return $_product_id;
    }

    function hasAttribute($code) {
      return isset($this->_data['attributes'][$code]);
    }

    function getAttribute($code) {
      if ( !class_exists('osC_ProductAttributes_' . $code) ) {
        if ( file_exists(DIR_FS_CATALOG . 'includes/modules/product_attributes/' . basename($code) . '.php') ) {
          include(DIR_FS_CATALOG . 'includes/modules/product_attributes/' . basename($code) . '.php');
        }
      }

      if ( class_exists('osC_ProductAttributes_' . $code) ) {
        return call_user_func(array('osC_ProductAttributes_' . $code, 'getValue'), $this->_data['attributes'][$code]);
      }
    }

    function checkEntry($id) {
      global $osC_Database;

      $Qproduct = $osC_Database->query('select p.products_id from :table_products p');
      $Qproduct->bindTable(':table_products', TABLE_PRODUCTS);

      if ( is_numeric($id) ) {
        $Qproduct->appendQuery('where p.products_id = :products_id');
        $Qproduct->bindInt(':products_id', $id);
      } else {
        $Qproduct->appendQuery(', :table_products_description pd where pd.products_keyword = :products_keyword and pd.products_id = p.products_id');
        $Qproduct->bindTable(':table_products_description', TABLE_PRODUCTS_DESCRIPTION);
        $Qproduct->bindValue(':products_keyword', $id);
      }

      $Qproduct->appendQuery('and p.products_status = 1 limit 1');
      $Qproduct->execute();

      return ( $Qproduct->numberOfRows() === 1 );
    }

    function incrementCounter() {
      global $osC_Database, $osC_Language;

      $Qupdate = $osC_Database->query('update :table_products_description set products_viewed = products_viewed+1 where products_id = :products_id and language_id = :language_id');
      $Qupdate->bindTable(':table_products_description', TABLE_PRODUCTS_DESCRIPTION);
      $Qupdate->bindInt(':products_id', osc_get_product_id($this->_data['id']));
      $Qupdate->bindInt(':language_id', $osC_Language->getID());
      $Qupdate->execute();
    }

    function numberOfImages() {
      return sizeof($this->_data['images']);
    }

    protected static function _usortVariantValues($a, $b) {
      if ( $a['sort_order'] == $b['sort_order'] ) {
        return strnatcasecmp($a['text'], $b['text']);
      }

      return ( $a['sort_order'] < $b['sort_order'] ) ? -1 : 1;
    }
  }
?>
