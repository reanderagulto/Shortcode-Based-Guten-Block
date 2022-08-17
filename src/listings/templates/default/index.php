<?php
    echo "<div class=\"container container-theme-filter\" id=\"content\">";
    do_action('aios_starter_theme_before_inner_page_content');

    $aios_metaboxes_banner_title_layout = get_option('aios-metaboxes-banner-title-layout', '');
    if (!is_custom_field_banner(get_queried_object()) || $aios_metaboxes_banner_title_layout[1] != 1) {
        $aioscm_used_custom_title = get_post_meta(get_the_ID(), 'aioscm_used_custom_title', true);
        $aioscm_main_title = get_post_meta(get_the_ID(), 'aioscm_main_title', true);
        $aioscm_sub_title = get_post_meta(get_the_ID(), 'aioscm_sub_title', true);
        $aioscm_title = $aioscm_used_custom_title == 1 ? $aioscm_main_title . '<span>' . $aioscm_sub_title . '</span>' : get_the_title();
        echo '<h1 class="entry-title ' . ($aioscm_used_custom_title == 1 ? 'entry-custom-title' : '') . '">' . $aioscm_title . '</h1>';
    }

    echo "</div>";
?>
<div id="listings-results" class="listings-wrap">
  <div class="listings-inner">
    <!-- Template head section -->
		<?php
		$defaultStatuses = [];

		$statuses = get_terms(['taxonomy' => 'property-statuses','hide_empty' => false,]);

		foreach ($statuses as $status){
			$defaultStatuses[] = $status->slug;
		}

		require(AIOS_LISTINGS_URL_TEMPLATES.'main-page/default/head.view.php');
		?>
    <div class="listings-main">
      <div id="aios-listings-loader">
        <div class="loader-spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
      <!-- Render Listing View -->
      <div id="render-listing-views" class="aios-listing-list-wrap"></div>

    </div>
  </div>
</div>
<?php

    echo "<div class=\"container container-theme-filter\">";
    do_action('aios_starter_theme_after_inner_page_content');
    echo "</div>";

?>
