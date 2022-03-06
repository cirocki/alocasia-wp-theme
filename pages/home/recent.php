<section id="index-recent" class="recent index-section">
    <div class="container">
        <div class="recent__wrapper centered">
            <div class="recent__header section-header">
                <h2 class="section-title">Blog</h2>
                <h3 class="section-subtitle">Recent articles</h3>
            </div>
            <div class="recent__posts">
                <?php $the_query = new WP_Query('posts_per_page=3');
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php
                    get_template_part('/template-parts/content-short-article', get_post_type());
                    ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>