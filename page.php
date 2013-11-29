<?php ob_start();?>
<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
<?php 
	$page = get_page_by_title(get_the_title());
	$post_name = $page->post_name;
?>
<?php /*?>Page 1<?php */?>
<?php wp_reset_query(); ?>
<?php if ( is_page('noticias') || is_page('backend') || is_page('frontend') ) { ?>
<div class="hfeed main_content">
	<div class="main_content_inner">
		<div id="cotent_main_ajax" class="cotent_main_ajax">	<!-- contendor principal -->
			<div id="loading"></div>
			<div id="content_ajax" class="content_ajax relative">	<!-- contender para el ajax -->
				<div class="list_post">
					<?php
						wp_reset_query();
						$temp = $wp_query;
						$wp_query= null;
						$wp_query = new WP_Query();
					?>
					<?php
					  query_posts(array(
				       'order' => 'DESC',
				       'posts_per_page' => 3,
				       'paged' => $paged,
				       'category_name' => $post_name
					  ));
					?>
					<?php if (have_posts()): ?>
					<?php while (have_posts()) : the_post(); ?>
						<!-- article -->
						<article id="post-<?php the_ID(); ?>" <?php post_class("index_post"); ?>>
							<div class="title">
								<h2 class="view_single"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<div class="entry_post clearfix">
								<!-- <span class="float_left view_single">
									<a href="<?php the_permalink(); ?>" class="float_left" title="<?php echo get_the_title(); ?>"><img class="imagen_no_margin tinythumb" src="<?php echo get_template_directory_uri(); ?>/img/thumb.png" alt="<?php echo get_the_title(); ?>"></a>
								</span> -->
								<!-- <p class="date">Date : <span>January 5, 2009</span></p> -->
								<div class="text_post"><?php //the_excerpt(); //the_content(); ?></div>
								<?php /* ?><div class="btn_face">
									<fb:like href="<?php the_permalink(); ?>" width="120" height="21" colorscheme="dark" layout="button_count" action="like" show_faces="false" send="false"></fb:like>
								</div><?php */ ?>
							</div>
							<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
						</article>
						<!-- /article -->
					<?php endwhile; ?>
				</div>
				<div class="nav-previous navpage"><?php next_posts_link( 'Older posts' ); ?></div>
				<?php /* ?><div class="nav-next alignright navpage"><?php previous_posts_link( 'Newer posts' ); ?></div><?php */ ?>
				<?php endif; ?>
				<?php rewind_posts(); ?>
				<?php wp_reset_query(); ?>
			</div> <!-- fin contender para el ajax -->
			<span class="load_more block pointer" id="load_more">load more</span>
		</div> <!--fin contendor principal -->
	</div>
</div>

<?php /*?>Page 2<?php */?>
<?php wp_reset_query(); ?>
<?php } elseif ( is_page('nombre-pagina') ) { ?>
<?php wp_redirect(get_option('siteurl') . '/link-redirect/'); ?>

<?php /*?>Page 3<?php */?>
<?php wp_reset_query(); ?>
<?php } elseif ( is_page('page-2') || $post->post_parent == '1' ) { ?>
<div class="hfeed main_content">
	<div class="main_content_inner">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2>
				<?php the_title(); ?>
			</h2>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>
</div>

<?php wp_reset_query(); ?>
<?php } else { ?>
<div class="hfeed main_content">
	<div class="main_content_inner">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">

			<h3>Data from meta box</h3>
			<p>
			Mi nombre es:
			<?php
			echo get_post_meta($post->ID, $prefix.'text', true);
			?>
			</p>

			<h2 class="title_page"><?php the_title(); ?></h2>
			<div class="entry clearfix">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
		
		<div>
			<?php 
				$url= get_permalink();
				$tokens = explode('/', $url);
				$tag = $tokens[sizeof($tokens)-2];
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('showposts=5'.'&paged='.$paged.'&category_name='.$tag);
				$i = 1;
			?>
			<ul class="list_reset">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<li class="clearfix <?php echo ($i==1)? 'no_margin': ''?>">
					<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					<div><?php the_excerpt() ?></div>
				</li>
			<?php $i++; endwhile; ?>
			</ul>
			<div class="navigation">
			  <div class="alignleft"><?php previous_posts_link('&laquo; Previous') ?></div>
			  <div class="alignright"><?php next_posts_link('More &raquo;') ?></div>
			</div>
			
			<div class="navigation">
				<div class="custom_nav">
					<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
				</div>
			</div>
			<?php rewind_posts(); ?>			
			<?php $wp_query = null; $wp_query = $temp;?>
		
		</div>

	</div>
</div>
<?php } ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php ob_end_flush();?>