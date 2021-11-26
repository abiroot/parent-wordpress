<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package parents
 */

get_header();

$args = array(
	'numberposts' => '1',
);
$latestPost = wp_get_recent_posts($args);
$latestPost = reset($latestPost);
?>


    <main id="primary" class="site-main">


		<?php
		if (!empty($latestPost)) {
			?>
            <section class="blog-header">
                <div class="container ">
                    <div class="header-box">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h1 class="fw-bold"><?php echo $latestPost['post_title']; ?></h1>
                                <p>
									<?php echo wp_trim_excerpt($latestPost['post_content']); ?>
                                </p>
                                <a href="<?php echo get_permalink($latestPost); ?>" class="btn btn-tertiary mx-1">Read Article</a>
                            </div>
                            <div class="col-md-6">
                                <img class="header-img" src="<?php echo get_the_post_thumbnail_url($latestPost->ID); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<?php
		}
		?>

        <section class="article-cards">
            <div class="container pt-5">
                <div class="row">
					<?php
					if (have_posts()) {

						/* Start the Loop */
						while (have_posts()) {
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part('template-parts/content', get_post_type());

						}

						the_posts_navigation();

					} else {

						get_template_part('template-parts/content', 'none');

					}
					?>
                </div>
            </div>
        </section>


    </main><!-- #main -->

<?php
//get_sidebar();
get_footer();
