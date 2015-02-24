<?php
$my_query = new WP_Query( array(
	'posts_per_page' => '3',
	'post_status' => 'publish',
	'orderby' => 'date',
	'order' => 'DESC'
));
if ($my_query -> have_posts()) : 
?>
	<div id="latest_news">
		<div class="contents">
			<?php while ($my_query -> have_posts()) : $my_query -> the_post(); ?>
				<dl <?php if(isLast($my_query)) echo 'class="last"'; ?>>
					<dt><?php the_time('n/j'); ?><span class="category"><?php if(!in_category('no_category')) {echo '[';$cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; };echo ']';}?>
				</span>
				<?php
					$days = 7; //Newを表示させたい期間の日数
					$today = date_i18n('U');
					$entry = get_the_time('U');
					$kiji = date('U',($today - $entry)) / 86400 ;
					if( $days > $kiji ){
					echo '<span class="new">new</span>';
				}?>
					</dt>
					<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
				</dl>
			<?php endwhile; wp_reset_query();?>        
		</div>
	</div>
<?php endif; ?>