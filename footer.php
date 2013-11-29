<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
	</div><!--End content_inner -->
</div><!--End content -->

<footer class="footer">
	<div class="clearfix footer_inner">
		<p>
			<?php bloginfo('name'); ?>
			<?php echo date('Y'); ?> is proudly powered by <a href="http://wordpress.org/">WordPress</a> <br />
			<a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
		</p>
	</div>
</footer>

</div><!--End wrapper -->

<!--jquery tabs-->
<script src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
<script>
	head.ready('jQuery', function(){

		head.ready('fancybox', function() {
			jQuery(".fancybox a").fancybox({
				titlePosition	: 'inside',
				transitionIn	: 'none',
				transitionOut	: 'none',
				autoDimensions	: false,
				width			: 586,
				height			: 371,
				titleShow		: false,
				margin			: 0,
				padding			: 0,
				showCloseButton	: true,
				onStart	: function() {
					//jQuery('#fancybox-outer').css('background-color','transparent');
					//jQuery('.fancybox-bg').hide();
				}
			});
			
			jQuery('.close_link').click(function () { 
			  jQuery.fancybox.close();
			  return false;
			});
		});

		head.ready('jQueryUI', function() {
			
		});

		head.ready('validate', function() {
			jQuery('#contact_form').validate({
				invalidHandler: function(e, validator) {
					var errors = validator.numberOfInvalids();
					if (errors) {
						var message = errors == 1
							? 'You missed 1 field. It has been highlighted below'
							: 'You missed ' + errors + ' fields.  They have been highlighted below';
						$("div.error span").html(message);
						$("div.error").show();
					} else {
						$("div.error").hide();
					}
				},
				submitHandler: function() {
					// código
				}
			})
		});

		head.ready('numeric', function() {
			jQuery('.numeric').numeric({
				decimal: false,
				negative: false
			})
		});

		head.ready('cycle', function() {
			/*jQuery('#slider').cycle({
		        fx:      'fade',
				timeout: 5000,
				pager:   '#nav_news',
				prev:    '#prev',
		        next:    '#next'
		    });*/
		});

		head.ready('flexslider', function() {
			$(window).load(function() {
				$('.flexslider').flexslider();
			});
		});

		head.ready('selectbox', function() {
			jQuery(".select_styling").sexyCombo({
				showListCallback : function () {
					jQuery('.sexy').addClass('sexy_active');
				},
				hideListCallback : function () {
					jQuery('.sexy').removeClass('sexy_active');
				}
			});
		});	

		head.ready('scrollpane', function() {
			jQuery('.scroll-pane').jScrollPane({
				showArrows:false,
				scrollbarOnLeft: true,
				verticalGutter : 0,
				maintainPosition: false,
				verticalDragMaxHeight : 136,
				verticalDragMinHeight : 136
			})
		});

		head.ready('placeholder', function() {
			jQuery('input, textarea').placeholder();
		});
	});
</script>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/screen.js"></script>

<?php wp_footer(); ?>

</body>

</html>