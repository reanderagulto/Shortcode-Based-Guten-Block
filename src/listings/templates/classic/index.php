<?php
  use AIOS\Listings\Classses\Options;
  $settings = Options::Settings();
    echo "<div class=\"container container-theme-filter\">";
    do_action('aios_starter_theme_before_inner_page_content');
    echo "</div>";
?>

<!-- BEGIN: Classic Properties -->
<div class="ai-classic-properties">
  <!-- BEGIN: Heading -->
  <div class="ai-classic-properties-heading" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
    <!-- BEGIN: Row -->
    <div class="ai-classic-properties-heading-row">
      <!-- BEGIN: Entry Title -->
      <div class="ai-classic-properties-title ai-classic-properties-heading-col">
	      <?php
          $aios_metaboxes_banner_title_layout = get_option('aios-metaboxes-banner-title-layout', '' );
          $pageTitle = get_the_title();
          $pageTitleArr = explode(' ', $pageTitle);
          $pageTitleFirst = $pageTitleArr[0];
          // Remove first word
          unset($pageTitleArr[0]);
          $pageTitleLast = '<span>' . implode(' ', $pageTitleArr) . '</span>';
          $aioscm_title = $pageTitleFirst . $pageTitleLast;

          if (! is_custom_field_banner(get_queried_object()) || $aios_metaboxes_banner_title_layout[1] != 1 ) {
            $aioscm_used_custom_title = get_post_meta( get_the_ID(), 'aioscm_used_custom_title', true );
            $aioscm_main_title = get_post_meta( get_the_ID(), 'aioscm_main_title', true );
            $aioscm_sub_title = get_post_meta( get_the_ID(), 'aioscm_sub_title', true );
            $aioscm_title = $aioscm_used_custom_title == 1 ? "{$aioscm_main_title} <span>{$aioscm_sub_title}</span>" : $aioscm_title;
          }

          echo '<h1 class="entry-title">' . $aioscm_title . '</h1>';
	      ?>
      </div>
      <!-- BEGIN: Entry Title -->
      <!-- END: Search Fields -->
      <div class="ai-classic-properties-search ai-classic-properties-heading-col">
        <!-- BEGIN: Row -->
        <form id="ai-classic-properties-search" class="ai-classic-properties-search-row">
          <!-- Hidden fields -->
          <input type="hidden" name="q" value="true">
          <input type="hidden" name="parent_page" value="<?php echo get_the_ID(); ?>">
          <input type="hidden" name="address" value="<?php echo (isset($_GET['address'])||!empty($_GET['address']))?$_GET['address']:''; ?>">
          <input type="hidden" name="sort" value="<?php echo (isset($_GET['sort'])||!empty($_GET['sort']))?$_GET['sort']:$settings['sort']; ?>">
          <input type="hidden" name="selected_view" value="<?php echo (isset($_GET['selected_view'])||!empty($_GET['selected_view']))?$_GET['selected_view']:'grid'; ?>">
          <input type="hidden" name="current_page" value="<?php echo (isset($_GET['current_page'])||!empty($_GET['current_page']))?$_GET['current_page']:1; ?>">
          <input type="hidden" name="show" value="<?php echo (isset($_GET['show'])||!empty($_GET['show']))?$_GET['show']:$settings['show']; ?>">
          <input type="hidden" name="featured_only" value="<?php echo (isset($_GET['featured_only'])||!empty($_GET['featured_only']))?$_GET['featured_only']:(!empty($featuredOnly)?1:0); ?>">

          <!-- BEGIN: Refine Search -->
          <div class="ai-classic-properties-search-refine ai-classic-properties-search-col">
            <div class="ai-classic-properties-search-button-wrap">
              <button type="button" class="ai-classic-properties-search-button">Refine Search <em></em></button>
              <div class="ai-classic-properties-search-button-content">
                <div class="ai-classic-properties-search-button-content-row">
                  <div class="ai-classic-properties-search-button-content-col-50">
                    <label for="min-price">Min. Price</label>
                    <input type="text" id="min-price" name="min_price" placeholder="Min. Price" value="<?php echo (isset($_GET['min_price'])||!empty($_GET['min_price']))?$_GET['min_price']:0; ?>">
                  </div>
                  <div class="ai-classic-properties-search-button-content-col-50">
                    <label for="max-price">Max. Price</label>
                    <input type="text" id="max-price" name="max_price" placeholder="Max. Price" value="<?php echo (isset($_GET['max_price'])||!empty($_GET['max_price']))?$_GET['max_price']:10000000000; ?>">
                  </div>
                </div>
                <div class="ai-classic-properties-search-button-content-row">
                  <div class="ai-classic-properties-search-button-content-col-50">
	                  <?php $bedrooms = isset($_GET['bedrooms']) || !empty($_GET['bedrooms']) ? $_GET['bedrooms'] : ''; ?>
                    <label for="beds">Beds</label>
                    <select name="bedrooms" id="beds">
                      <option value="">Beds</option>
                      <option <?php echo ($bedrooms==1)?'selected':'' ?> value="1">1+</option>
                      <option <?php echo ($bedrooms==2)?'selected':'' ?> value="2">2+</option>
                      <option <?php echo ($bedrooms==3)?'selected':'' ?> value="3">3+</option>
                      <option <?php echo ($bedrooms==4)?'selected':'' ?> value="4">4+</option>
                      <option <?php echo ($bedrooms==5)?'selected':'' ?> value="5">4+</option>
                    </select>
                  </div>
                  <div class="ai-classic-properties-search-button-content-col-50">
	                  <?php $bedrooms = isset($_GET['bathrooms']) || !empty($_GET['bathrooms']) ? $_GET['bathrooms'] : ''; ?>
                    <label for="baths">Baths</label>
                    <select name="baths" id="baths">
                      <option value="">Baths</option>
                      <option <?php echo ($bathrooms==1)?'selected':'' ?> value="1">1+</option>
                      <option <?php echo ($bathrooms==2)?'selected':'' ?> value="2">2+</option>
                      <option <?php echo ($bathrooms==3)?'selected':'' ?> value="3">3+</option>
                      <option <?php echo ($bathrooms==4)?'selected':'' ?> value="4">4+</option>
                      <option <?php echo ($bathrooms==5)?'selected':'' ?> value="5">5+</option>
                    </select>
                  </div>
                </div>
                <div class="ai-classic-properties-search-button-content-row">
                  <div class="ai-classic-properties-search-button-content-col">
                    <input type="submit" value="Update">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END: Refine Search -->
          <!-- BEGIN: Sort Search -->
          <div class="ai-classic-properties-search-sort ai-classic-properties-search-col">
            <div class="ai-classic-properties-search-button-wrap">
              <button type="button" class="ai-classic-properties-search-button">Sort <em></em></button>
              <div class="ai-classic-properties-search-button-content">
                <ul>
                  <li <?= $_GET['sort']=='lpd' || !isset($_GET['sort']) || empty($_GET['sort']) ? 'class="active"' : ''; ?>>
                    <a href="#" data-type="lpd">Price (High to Low)</a>
                  </li>
                  <li <?= isset($_GET['sort']) && $_GET['sort'] == 'lpa' ? 'class="active"' : ''; ?>>
                    <a href="#" data-type="lpa">Price (Low to High)</a>
                  </li>
                  <li <?= isset($_GET['sort']) && $_GET['sort'] == 'mr' ? 'class="active"' : ''; ?>>
                    <a href="#" data-type="mr">Most Recent</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- END: Sort Search -->
          <!-- BEGIN: View Search -->
          <div class="ai-classic-properties-search-view ai-classic-properties-search-col">
            <span data-view="list" class="<?= isset($_GET['view']) && $_GET['view'] === 'list' ? 'active' : '' ?>">List <em class="ai-font-layout-list"></em></span>
            <span data-view="grid" class="<?= isset($_GET['view']) && $_GET['view'] === 'grid' || ! isset($_GET['view']) ? 'active' : '' ?>">Grid <em class="ai-font-layout-grid"></em></span>
            <span data-view="table" class="<?= isset($_GET['view']) && $_GET['view'] === 'table' ? 'active' : '' ?>">Table <em class="ai-font-layout-table"></em></span>
          </div>
          <!-- END: View Search -->
        </form>
        <!-- END: Row -->
      </div>
      <!-- END: Search Fields -->
    </div>
    <!-- END: Row -->
  </div>
  <!-- END: Heading -->

	<?php if (isset($_GET['map']) && $_GET['map'] === 'true')  : ?>
    <!-- BEGIN: Maps -->
    <div class="ai-classic-properties-frame-responsive">
      <iframe width="500" height="300" src="https://api.maptiler.com/maps/streets/?key=5BgxtAeqRVkmRC7k52Ki#14.2/33.92137/-118.41335"></iframe>
    </div>
    <!-- END: Maps -->
	<?php endif; ?>
  <!-- BEGIN: Listings(data view = list, grid, table) -->
  <div class="ai-classic-properties-listings" data-view="<?= $_GET['view'] ?? 'grid' ?>">
    <!-- Template loader -->
    <div class="aios-listings-loader">
      <div class="loader-spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>

    <div class="ai-classic-properties-listings-row">
    </div>
  </div>
  <!-- END: Listings -->
</div>
<!-- END: Classic Properties -->

<?php
    echo "<div class=\"container container-theme-filter\">";
    do_action('aios_starter_theme_after_inner_page_content');
    echo "</div>";
?>
