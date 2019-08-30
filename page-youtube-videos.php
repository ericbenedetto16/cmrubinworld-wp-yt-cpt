<?php /* Template Name: YouTube Video Template */ ?>
<?php get_header(); ?>

<?php
$featured_image = false;

if ( '' != get_the_post_thumbnail() ) :
	$featured_image = true;
?>

<div class="post-thumbnail">
	<div class="container">
		<h1 class="post-heading"><?php the_title(); ?></h1>
	</div>
</div>
<?php endif; ?>

<div class="page-wrap container">
	<div id="main-content">
		<div class="main-content-wrap clearfix">
			<div id="content">
				<?php get_template_part( 'includes/breadcrumbs', 'index' ); ?>
				<div id="left-area">
					<article class="entry-content clearfix">
						<?php if ( ! $featured_image ) : ?>
						<h1 class="yt-page-title"><?php the_title(); ?></h1>
						<?php endif; ?>
						<?php the_content(); ?>
						<div class="yt-videos">
							<?php 
							$yt_videos = new WP_QUERY( 'post_type=yt_videos&posts_per_page=10' );
							if( $yt_videos->have_posts() ):

								while( $yt_videos->have_posts() ): 
									$yt_videos->the_post();
									$post_id = get_the_ID();
									$the_link = get_field( 'video_link', $post_id );
									$the_author = get_field( 'video_author', $post_id );
							?>
							<a class="yt-video-card" href="<?php echo "$the_link" ?>" target=_blank>
								<?php the_post_thumbnail( 'large' ); ?>
								<p><?php the_title(); ?></p>
								<p><?php echo( $the_author ); ?></p>
							</a>
							<?php
								endwhile;
								wp_reset_postdata;
							endif;
							?>
						</div>
					</article>
					<?php
					if ( comments_open() && 'on' == et_get_option( 'nexus_show_pagescomments', 'false' ) )
						comments_template( '', true );
					?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
	<?php get_template_part( 'includes/footer-banner', 'page' ); ?>
</div>	
<?php get_footer(); ?>