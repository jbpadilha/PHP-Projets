<?php
/*
  $Id$

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License v2 (1991)
  as published by the Free Software Foundation.
*/

  $osC_DirectoryListing = new osC_DirectoryListing(DIR_FS_WORK);
  $osC_DirectoryListing->setIncludeDirectories(false);
  $osC_DirectoryListing->setCheckExtension('cache');

  $cached_files = array();

  foreach ( $osC_DirectoryListing->getFiles() as $file ) {
    $last_modified = filemtime(DIR_FS_WORK . '/' . $file['name']);

    if ( strpos($file['name'], '-') !== false ) {
      $code = substr($file['name'], 0, strpos($file['name'], '-'));
    } else {
      $code = substr($file['name'], 0, strpos($file['name'], '.'));
    }

    if ( isset($cached_files[$code]) ) {
      $cached_files[$code]['total']++;

      if ( $last_modified > $cached_files[$code]['last_modified'] ) {
        $cached_files[$code]['last_modified'] = $last_modified;
      }
    } else {
      $cached_files[$code] = array('total' => 1,
                                   'last_modified' => $last_modified);
    }
  }
?>

<h1><?php echo osc_link_object(osc_href_link_admin(FILENAME_DEFAULT, $osC_Template->getModule()), $osC_Template->getPageTitle()); ?></h1>

<?php
  if ( $osC_MessageStack->size($osC_Template->getModule()) > 0 ) {
    echo $osC_MessageStack->get($osC_Template->getModule());
  }
?>

<form name="batch" action="#" method="post">

<table border="0" width="100%" cellspacing="0" cellpadding="2" class="dataTable">
  <thead>
    <tr>
      <th><?php echo $osC_Language->get('table_heading_cache_blocks'); ?></th>
      <th><?php echo $osC_Language->get('table_heading_total'); ?></th>
      <th><?php echo $osC_Language->get('table_heading_date_last_modified'); ?></th>
      <th width="150"><?php echo $osC_Language->get('table_heading_action'); ?></th>
      <th align="center" width="20"><?php echo osc_draw_checkbox_field('batchFlag', null, null, 'onclick="flagCheckboxes(this);"'); ?></th>
    </tr>
  </thead>
  <tfoot>
    <tr>
      <th align="right" colspan="4"><?php echo '<input type="image" src="' . osc_icon_raw('trash.png') . '" title="' . $osC_Language->get('icon_trash') . '" onclick="document.batch.action=\'' . osc_href_link_admin(FILENAME_DEFAULT, $osC_Template->getModule() . '&action=batchDelete') . '\';" />'; ?></th>
      <th align="center" width="20"><?php echo osc_draw_checkbox_field('batchFlag', null, null, 'onclick="flagCheckboxes(this);"'); ?></th>
    </tr>
  </tfoot>
  <tbody>

<?php
  foreach( $cached_files as $cache => $stats ) {
?>

    <tr onmouseover="rowOverEffect(this);" onmouseout="rowOutEffect(this);">
      <td onclick="document.getElementById('batch<?php echo $cache; ?>').checked = !document.getElementById('batch<?php echo $cache; ?>').checked;"><?php echo $cache; ?></td>
      <td align="center"><?php echo $stats['total']; ?></td>
      <td align="right"><?php echo osC_DateTime::getShort(osC_DateTime::fromUnixTimestamp($stats['last_modified']), true); ?></td>
      <td align="right"><?php echo osc_link_object(osc_href_link_admin(FILENAME_DEFAULT, $osC_Template->getModule() . '&block=' . $cache . '&action=delete'), osc_icon('trash.png')); ?></td>
      <td align="center"><?php echo osc_draw_checkbox_field('batch[]', $cache, null, 'id="batch' . $cache . '"'); ?></td>
    </tr>

<?php
  }
?>

  </tbody>
</table>

</form>

<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr>
    <td style="opacity: 0.5; filter: alpha(opacity=50);"><?php echo '<b>' . $osC_Language->get('table_action_legend') . '</b> ' . osc_icon('trash.png') . '&nbsp;' . $osC_Language->get('icon_trash'); ?></td>
  </tr>
</table>

<p><?php echo $osC_Language->get('cache_location') . ' ' . DIR_FS_WORK; ?></p>
