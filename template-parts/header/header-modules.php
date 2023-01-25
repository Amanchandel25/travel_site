<?php
/**
 * Displays header modules
 *
 *
 * @package     Andaaz
 * @author      Amjad Ali
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 */
?>
    <div class="nav flex-nowrap align-items-center header-modules d-none d-lg-flex">

        <!-- Nav Search -->
        <?php if (true === get_theme_mod('andaaz_is_navbar_search_form', andaaz_defaults('is_navbar_search_form'))) { ?>
        <div class="nav-item navbar-icon-link" data-toggle="search">
            <a class="nav-link"  href="#" data-bs-toggle="modal" data-bs-target="#nav-search">
                <i class="fa fa-search" aria-hidden="true"></i>
            </a>
        </div>

        <!-- Search Modal -->
        <div class="modal fade modal-nav-search" id="nav-search" tabindex="-1" aria-labelledby="nav-search" aria-hidden="true">
          <div class="modal-dialog modal-halfscreen">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form role="search" method="get" class="row gx-0 navbar-search-bar" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                    <label> <span class="screen-reader-text"><?php echo esc_html_x('Search for:', 'label', 'andaaz') ?></span></label>

                    <div class="col-9">
                      <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr('Search …', 'andaaz') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr('Search for:', 'label', 'andaaz') ?>" />
                    </div>

                    <div class="col-3">
                      <button class="button" type="submit"><?php echo esc_html_x('Search', 'label', 'andaaz') ?></button>
                    </div>

                  </form>

              </div>
            </div>
          </div>
        </div>
        <?php } ?>

        <!--  my account -->
        <?php if (true === get_theme_mod('andaaz_is_navbar_my_account', andaaz_defaults('is_navbar_my_account'))) { ?>
            <div class="nav-item nav-item-account d-none d-lg-block">

                <?php if (is_user_logged_in()) { ?>

                <a class="nav-link" href="<?php get_permalink(get_option('woocommerce_myaccount_page_id')) ?>" title="<?php esc_html('My Account',      'Andaaz') ?>"><i class="fas fa-user"></i> <?php esc_html('My Account', 'andaaz') ?> </a>

                <?php } else { ?>

                <a class="nav-link" href="<?php get_permalink(get_option('woocommerce_myaccount_page_id')) ?>" title="<?php esc_html('Login /   Register',    'Andaaz') ?>"><i class="fas fa-user"></i> <?php esc_html('Login / Register', 'andaaz') ?> </a>

                <?php } ?>

            </div>
        <?php } ?>
        
        <!-- Header shopping cart -->
        <?php if (true === get_theme_mod('andaaz_is_navbar_shopping_cart', andaaz_defaults('is_navbar_shopping_cart'))) {
          echo andaaz_header_cart();
        } ?>

        <?php if (true === get_theme_mod('andaaz_is_offcanvas_header_widget', andaaz_defaults('is_offcanvas_header_widget')) && is_active_sidebar( 'offcanvas-header-widget' ) ) { ?>
          <!-- Offcanvas menu toggler -->
          <div class="nav-item">
              <a class="nav-link pr-0" data-bs-toggle="modal" href="#" role="button" aria-controls="offcanvas-header-widget" data-bs-target="#offcanvas-header-widget">
                  <i class="fas fa-bars"></i>
              </a>
          </div>

          <!-- Modal -->

          <div class="modal right fade offcanvas-header-widget" id="offcanvas-header-widget" tabindex="-1" aria-labelledby="offcanvas-header-widget" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <aside class="widget-area offcanvas-menu-widget" role="complementary">
                    <?php
                      if ( is_active_sidebar( 'offcanvas-header-widget' ) ) {
                        dynamic_sidebar( 'offcanvas-header-widget' ); 
                      }
                    ?>
                  </aside>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

    </div>
