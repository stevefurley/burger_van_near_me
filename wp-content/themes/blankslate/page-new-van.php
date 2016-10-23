<?php acf_form_head(); ?>
<?php get_header(); ?>

	<div id="primary" class="content-area">
	    <?php $van_id = get_the_id(); ?>
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php acf_form(array(
					'post_id'		=> 'new_post',
					'new_post'		=> array(
						'post_type'		=> 'post',
						'post_status'		=> 'publish',
						'post_title' => 'van-' . $van_id
					),
					'submit_value'		=> 'Create a new van'
				)); ?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>