<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package parents
 */

global $wp;

?>
    <section class="blog-inner">
        <div class="container">
            <div class="row align-items-center">
				<?php
				echo get_the_post_thumbnail();
				?>
                <div class="px-5 pt-5 pb-3">
                    <img src="assets/vectors/back.svg" alt="">
                    <span class="px-2 back">Back</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <ul class="d-flex justify-content-between align-items-center">
                        <li>
                            Written By <p class="detail"><?php echo get_the_author(); ?></p>
                        </li>
                        <li>
                            Published on <p class="detail"><?php echo get_the_date(); ?></p>
                        </li>
                        <li>
                            Reading time <p class="detail">5 minutes</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 offset-md-2">
                    <div class="apply-now-box">
                        <div class="d-flex justify-content-between">
                            <a href="#" onclick="copyLink()" class="btn btn-tertiary"><i class="bi bi-files"></i> Copy
                                Link</a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url($wp->request); ?>"
                               target="_blank" class="btn btn-tertiary"><i class="bi bi-facebook"></i></a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo home_url($wp->request); ?>"
                               class="btn btn-tertiary"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-5">
				<?php
				the_title('<h1>', '</h1>');
				?>
				<?php
				$categories = get_categories();
				foreach ($categories as $category) {
					?>
                    <a href="#">
                        <span class="category"><?php echo $category->name; ?></span>
                    </a>
					<?php
				}
				?>

				<?php
				the_content();
				?>
            </div>
        </div>
    </section>


    <section class="article-cards">
        <div class="container pt-5">
            <p class="article-title"> Other Articles</p>
            <div class="row">
				<?php
				// the query
				$recent_posts = wp_get_recent_posts(array(
					'numberposts' => 3, // Number of recent posts thumbnails to display
					'post_type' => 'post',
					'post_status' => 'publish' // Show only the published posts
				));

				if(count($recent_posts) > 0){

					foreach ($recent_posts as $recent_post) {
						?>
                        <div class="col-md-4 mb-5">
                            <div class="article-card">
                                <div class="article-header">
                                    <a href="#">
										<?php echo get_the_post_thumbnail($recent_post['ID']); ?>
                                    </a>
									<?PHP
									$categories = wp_get_post_categories($recent_post['ID'],  array( 'fields' => 'all' ));
									foreach ($categories as $category) {
										?>
                                        <a href="<?php get_permalink($recent_post['ID']); ?>">
                                            <span class="category"><?php echo $category->name; ?></span>
                                        </a>
										<?php
									}
									?>
                                </div>
                                <a href="<?php get_permalink($recent_post['ID']); ?>">
                                    <div class="article-body">
                                        <h2><?php echo $recent_post['post_title']; ?></h2>
                                        <p>
											<?php echo wp_trim_excerpt($recent_post['post_content']); ?>
                                        </p>
                                    </div>
                                </a>
                                <div class="article-footer">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <span class="author"><?php echo get_the_author_meta('display_name', $recent_post['post_author']); ?></span>
                                            <span class="date"><?php echo $recent_post['post_date']; ?></span>
                                        </div>
                                        <div class="col-6">
                                            <span class="time-read">5 min read</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
					}

				}

				?>
            </div>
        </div>
    </section>


    <script>
        function fallbackCopyTextToClipboard(text) {
            var textArea = document.createElement("textarea");
            textArea.value = text;

            // Avoid scrolling to bottom
            textArea.style.top = "0";
            textArea.style.left = "0";
            textArea.style.position = "fixed";

            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Fallback: Copying text command was ' + msg);
            } catch (err) {
                console.error('Fallback: Oops, unable to copy', err);
            }

            document.body.removeChild(textArea);
        }

        function copyTextToClipboard(text) {
            if (!navigator.clipboard) {
                fallbackCopyTextToClipboard(text);
                return;
            }
            navigator.clipboard.writeText(text).then(function () {
                console.log('Async: Copying to clipboard was successful!');
            }, function (err) {
                console.error('Async: Could not copy text: ', err);
            });
        }


        function copyLink() {
            var linkToCopy = '<?php echo home_url($wp->request); ?>';

            /* Copy the text inside the text field */
            copyTextToClipboard(linkToCopy);

            /* Alert the copied text */
            alert("Copied link: " + linkToCopy);
        }
    </script>

<?php
