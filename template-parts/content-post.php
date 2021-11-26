<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package parents
 */


?>
<div class="col-md-4 mb-5">
    <div class="article-card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="article-header">
            <a href="#">
				<?php
				echo get_the_post_thumbnail();
				?>
            </a>
            <div class="text-left">
				<?php
				$categories = get_categories();
				foreach ($categories as $category) {
					?>
                    <span class="category d-inline-block"><?php echo $category->name; ?></span>
					<?php
				}
				?>
            </div>
        </div>
        <a href="#">
            <div class="article-body">
				<?php
				the_title('<h2>', '</h2>');
				?>

				<?php
				the_excerpt();
				?>
            </div>
        </a>
        <div class="article-footer">
            <div class="row align-items-center">
                <div class="col-6">
                    <span class="author"><?php echo get_the_author()?></span>
                    <span class="date"><?php echo get_the_date() ?></span>
                </div>
                <div class="col-6">
                    <span class="time-read">5 min read</span>
                </div>
            </div>
        </div>
    </div>
</div>
