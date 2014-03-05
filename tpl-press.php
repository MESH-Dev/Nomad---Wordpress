<?php /* Template Name: Press Releases */
	get_header();
	global $apollo13; ?>
<?php  if ( have_posts() ) { while ( have_posts() ) { the_post();
	$press = get_field('press');
} } ?>
<div id="content">
        <style type="text/css" media="screen">
            </style>
    <div id="page_title" class="page_title_portfolio border_bottom">
        <h1><?php the_title(); ?></h1>
        <div style="clear: both;"></div>
    </div>
    <div id="portfolio_conteiner" class="portfolio-elastic elastic no_content_font press-release-cont">
		<div id="press-left">
			<div class="gutter">
				<?php $args = array(
							'posts_per_page' => 6,
							'post_type' => 'portfolio',
							'post__in' => $press
						);
				$query = new WP_Query($args);
				if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();  ?>
				<a href="<?php the_permalink(); ?>">
					<div class="item  four columns portfolio_box">
			            <div class="portfolio_box_hover" style="">
			                <div class="slide_box_hover_background" style="width: 300px; height: 200px;"></div>
			                <p style="padding-top: 95px; width: 300px;"></p>
			            </div>
			            <?php $apollo13->portfolio_get_icon(300, 200); ?>
			            <div class="portfolio_desc_below border_bottom" style="width: 300px;">
			                <p class="portfolio_box_title"><?php the_title(); ?></p>
			                <p class="portfolio_extra_description"><?php the_time('j F Y'); ?></p>
			            </div>
			        </div>
				</a>
				<?php } } ?>



			</div>
		</div>
		<div id="press-right">
			<div class="gutter">
				<h4>Additional Press</h4>
				<?php $args = array(
							'posts_per_page' => -1,
							'post_type' => 'portfolio',
							'post__not_in' => $press
						);
				$query = new WP_Query($args);
				if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();  ?>
					<a href="<?php the_permalink(); ?>" class="additional-link">
						<span class="additional-entry">
							<?php the_title(); ?>
						</span>
						<span class="additional-date">
							<?php the_time('j F Y'); ?>
						</span>
					</a>
				<?php } } ?>
			</div>
		</div>
    </div>

<?php get_footer(); ?>