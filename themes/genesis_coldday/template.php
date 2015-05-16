<?php
// $Id: template.php,v 1.4 2008/11/16 16:43:23 jmburnz Exp $

/**
 * @file template.php
 */

/**
 * Implementation of HOOK_theme().
 */
function genesis_coldday_theme(&$existing, $type, $theme, $path) {
  $hooks = genesis_theme($existing, $type, $theme, $path);
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  return $hooks;
}

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function genesis_coldday_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */


/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function*/
function genesis_coldday_preprocess_page(&$vars, $hook) {
		if ($vars['secondary_links']) {
    $vars['sec_class'] = 'with-secondary';
  }
}
// 

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function genesis_coldday_preprocess_node(&$vars, $hook) {
  // Set comment vars for the customised dates.
  $vars['long_date']  = format_date($vars['node']->created, 'custom', "l, F j, Y - H:i");
  $vars['short_date'] = format_date($vars['node']->created, 'custom', "F j, Y");
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function genesis_coldday_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function genesis_coldday_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Return code that emits a feed icon.
 *
 * @param $url 
 *   The url of the feed.
 * @param $title 
 *   A descriptive title of the feed.
 */
function genesis_coldday_feed_icon($url, $title) {
  $path = drupal_get_path('theme', 'genesis_coldday');
  if ($image = theme('image', $path .'/images/feed-icon-24x24.png', t('Syndicate content'), $title)) {
    return '<a href="'. check_url($url) .'" class="feed-icon">'. $image .'</a>';
  }
}