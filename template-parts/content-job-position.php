<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package parents
 */


$metaValues = get_post_meta(get_the_ID());
$category = get_category_by_slug($metaValues['pa_category'] ? $metaValues['pa_category'][0] : "Uncategorized");


global $wp;
?>


<section class="job-detail">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="job-header">
					<?php the_title('<h1>', '</h1>'); ?>
					<?php
					if (isset($metaValues['pa_location'])) {
						?>
                        <span class="location"><?php echo $metaValues['pa_location'][0]; ?></span>
						<?php
					}
					?>
                    <span class="category"><?php echo $category->name; ?></span>

                    <ul class="list-group list-group-horizontal">
						<?php
						if (isset($metaValues['pa_experience'])) {
							?>
                            <li class="list-group-item">
                                <span>Experience</span>
                                <strong><?php echo $metaValues['pa_experience'][0]; ?></strong>
                            </li>
							<?php
						}
						?>

						<?php
						if (isset($metaValues['pa_work_level'])) {
							?>
                            <li class="list-group-item">
                                <span>Work Level</span>
                                <strong><?php echo $metaValues['pa_work_level'][0]; ?></strong>
                            </li>
							<?php
						}
						?>

						<?php
						if (isset($metaValues['pa_employee_type'])) {
							?>
                            <li class="list-group-item">
                                <span>Employee Type</span>
                                <strong><?php echo $metaValues['pa_employee_type'][0]; ?></strong>
                            </li>
							<?php
						}
						?>
                    </ul>
                </div>

                <div class="job-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
								__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'parents'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post(get_the_title())
						)
					);
					?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="apply-now-box">
                    <a href="#" class="btn btn-primary d-block">Apply Now</a>
                    <div class="d-flex justify-content-between mt-5">
                        <a href="#" onclick="copyLink()" class="btn btn-tertiary"><i class="bi bi-files"></i> Copy Link</a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo home_url( $wp->request ); ?>"  target="_blank" class="btn btn-tertiary"><i class="bi bi-facebook"></i></a>
                        <a href="https://twitter.com/intent/tweet?url=<?php echo home_url( $wp->request ); ?>" class="btn btn-tertiary"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #post-<?php the_ID(); ?> -->

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
        navigator.clipboard.writeText(text).then(function() {
            console.log('Async: Copying to clipboard was successful!');
        }, function(err) {
            console.error('Async: Could not copy text: ', err);
        });
    }


    function copyLink(){
        var linkToCopy = '<?php echo home_url( $wp->request ); ?>';

        /* Copy the text inside the text field */
        copyTextToClipboard(linkToCopy);

        /* Alert the copied text */
        alert("Copied link: " + linkToCopy);
    }
</script>
