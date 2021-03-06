<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 */
?>
<!DOCTYPE html ng-app="dmci">
<!-- Sorry no IE7 support! -->
<!-- @see http://foundation.zurb.com/docs/index.html#basicHTMLMarkup -->

<!--[if IE 8]><html class="no-js lt-ie9" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"> <!--<![endif]-->
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!--[if lt IE 9]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
 </head>
 <body ng-controller="dmciController" "class="<?php print $classes. " ".$parent_page; ?>" <?php print $attributes;?>>

 <div id="st-container" class="st-container">
 <div class="st-pusher">
  <nav class="st-menu st-effect-3" id="menu-3">
    <ul class="st-menu-ul">
      <li class="li-title">
        <span>Dashboard</span>
        <ul>
          <li><a class="icon" href="/home">Home</a></li>
          <li><a class="icon" href="/news">News</a></li>
          <li><a class="icon" href="/reservation-list">Reservation</a></li>
          <li><a class="icon" href="/availability">Availability</a></li>
          <li><a class="icon" href="/contacts">Contact</a></li>
          <li><a class="icon" href="/profile">Profile</a></li>
        </ul>
      </li>

      <li class="li-title">
        <span>Presentation</span>
        <ul>
          <li><a class="icon" href="/history">History</a></li>
          <li><a class="icon" href="/property-selection">Property Selection</a></li>
          <li><a class="icon" href="/reservation">Reservation</a></li>
          <li><a class="icon" href="/bpc-form">BPC</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <nav class="top-bar" data-topbar role="navigation" data-options="is_hover: false">
    <a href="<?php print url('node/1'); ?>"> <img src="<?php print $base_url_default_files . "dmci-icon.png"; ?>" class="right" /> </a>
    <div class="top-bar-section">
      <div id="st-trigger-effects" class="column">
        <button data-effect="st-effect-3" class="hamburger left"> <li></li><li></li><li></li> </button>
      </div>
    </div>
  </nav>

  <?php if ($parent_page != "Dashboard"): ?>
    <?php if (arg(1) != 1): ?>
      <?php if (drupal_is_front_page() != 1): ?>
        <div class="page-title-container">
          <div class="parent-page"><b><?php print $parent_page; ?></b></div>
          <div class="current-page">
            <div class="b-container"><b><?php print $current_page; ?></b></div>
            <img src="<?php print $base_url_default_files . "top-curve.png"; ?>" class="curve">
          </div>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  <?php else: ?>
    <div class="dashboard-menu">
      <ul>
        <li id="home"> <a href="home"> Home </a> </li>
        <li id="news"> <a href="news"> News </a> </li>
        <li id="reservation"> <a href="reservation-list"> Reservation </a> </li>
        <li id="availability"> <a href="availability"> Availability </a> </li>
        <li id="contacts"> <a href="contacts"> Contacts </a> </li>
        <li id="profile"> <a href="profile"> Profile </a> </li>
        <div class="clear-both"></div>
      </ul>
      <div class="right profile-name">
        <div class="name left"> Juan Dela Cruz <div> Marketing Manager </div> </div>
        <img src="<?php print $base_url_default_files . "unknown.jpg"; ?>" />
      </div>
    </div>
  <?php endif; ?>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  <?php print _zurb_foundation_add_reveals(); ?>

  <?php if ($parent_page == "Dashboard"): ?>
    <div class="search-container">
      <div class="search-overflow">
        <div class="search"> <img src="<?php print $base_url_default_files . "search-icon.png"; ?>" /> </div>
        <input type="text" placeholder="Search" class="form-search" />
      </div>
    </div>
  <?php endif; ?>

  <script>
    (function ($, Drupal, window, document, undefined) {
      $(document).foundation();
    })(jQuery, Drupal, this, this.document);
  </script>
  </div>
</div>
</body>
</html>
