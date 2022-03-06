<!-- // ONE ARTICLE ON ARTICLES LIST  -->

<article class="post post-short" id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

	<div class="post__image">

		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<?php if (has_post_thumbnail($r->ID)) {
				echo get_the_post_thumbnail($r->ID, 'medium');
			} else {
				echo '<img src="' . get_theme_file_uri() . '/assets/img/no-image.jpg"' . 'alt="no image placeholder" />';
			}
			?>
		</a>
	</div>
	<div class="post__content">


		<?php the_title('<h2 class="post__title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
		<div class="post__categories">
			<ul class="post__categories__list">
				<?php
				foreach ((get_the_category()) as $category) {
					echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '"rel="category tag">' . $category->cat_name . '</a></li>';
				}
				?>
			</ul>
		</div>

		<div class="post__excerpt-wrapper">
			<div class="post__excerpt"><?php the_excerpt(''); ?></div>
			<a href="<?php the_permalink(); ?>" class="btn read-more">details</a>

		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->