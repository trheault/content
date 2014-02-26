<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
function idfg_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    array_shift($breadcrumb);
    return '<div class="breadcrumb">' . implode(' � ', $breadcrumb) . '</div>';
  }
}
function idfg_preprocess_page(&$variables) {
	// Add custom JS
	drupal_add_js('sites/all/themes/idfg/js/idfgcustom.js');
	drupal_add_js('sites/all/themes/idfg/js/jquery.mobilemenu.min.js');
}
    