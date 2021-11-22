<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package parents
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<span class="position-absolute trigger">
        <!-- hidden trigger to apply 'stuck' styles -->
</span>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <header id="masthead" class="site-header">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light" aria-label="Parent Nav Bar">
            <div class="container">
                <a class="navbar-brand" href="#">
					<?php
					the_custom_logo();
					?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07"
                        aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
					<?php
					wp_nav_menu(
						array(
							'container' => false,
							'theme_location' => 'primary-menu-left',
							'menu_id' => 'primary-menu-left',
							'menu_class' => 'd-flex navbar-nav me-md-auto mb-2 mb-lg-0 ms-lg-2',
							'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
							'walker' => new WP_Bootstrap_Navwalker(),
						)
					);


					wp_nav_menu(
						array(
							'container' => false,
							'theme_location' => 'primary-menu-right',
							'menu_id' => 'primary-menu-right',
							'menu_class' => 'd-flex navbar-nav ms-md-auto mb-2 mb-lg-0 me-lg-2',
							'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
							'walker' => new WP_Bootstrap_Navwalker(),
						)
					);
					?>
<!--                    <ul class="d-flex navbar-nav me-md-auto mb-2 mb-lg-0 ms-lg-2">-->
<!--                        <li class="nav-item px-2">-->
<!--                            <a class="nav-link active" aria-current="page" href="#">Careers</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item px-2">-->
<!--                            <a class="nav-link" href="#">Parents</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <ul class="d-flex navbar-nav ms-md-auto mb-2 mb-lg-0 me-lg-2">-->
<!--                        <li class="nav-item px-2">-->
<!--                            <a class="nav-link" href="#">Features</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item px-2">-->
<!--                            <a class="nav-link" href="#">Pricing</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item dropdown px-2">-->
<!--                            <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-bs-toggle="dropdown"-->
<!--                               aria-expanded="false">EN</a>-->
<!--                            <ul class="dropdown-menu" aria-labelledby="dropdown07">-->
<!--                                <li><a class="dropdown-item" href="#">English</a></li>-->
<!--                                <li><a class="dropdown-item" href="#">Another Language</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
                    <div class="menu-buttons">
                        <a href="#" class="btn btn-primary mx-1">Try it out</a>
                        <a href="#" class="btn btn-tertiary mx-1">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header><!-- #masthead -->
