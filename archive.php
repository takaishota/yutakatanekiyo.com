<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="robots" content="all" />
<meta name="description" content="フォトグラファー種清豊の公式ホームページです" />
<meta name="keywords" content="種清,豊,yutaka,tanekiyo,写真家,Photographer,東京,ドイツ" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" href="/favicon.png" />
<link rel="stylesheet" href="/wp-content/themes/yutakatanekiyo_web/css/reset.css" media="screen" type="text/css">
<link rel="stylesheet" href="/wp-content/themes/yutakatanekiyo_web/style.css" media="screen" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Karla:400,700' rel='stylesheet' type='text/css'>

<title>YUTAKA TANEKIYO 種清豊 | photographer</title>
</head>

<body id="news">

<!-- #wrapper -->
<div id="wrapper">
<!-- #header -->
<?php get_header(); ?>
<!-- //#header -->

<!-- #main -->
<div id="main">
    <h1>NEWS</h1>
    <div class="contents">
	<?php
		/* News記事を取得する */
		$the_query = new WP_Query( array('posts_per_page' => 30 ) );
		while ( $the_query->have_posts() ) : $the_query->the_post();
	?>
			<dl class="<?php if(isLast($the_query)) echo 'last'; ?>">
				<dt><?php the_time('n/j');?><span class="category"><?php if(!in_category('no_category')) {echo '[';$cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; };echo ']';}?>
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
            			<dd>
                			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            			</dd>
			</dl>
	<?php endwhile; ?>
    </div><!-- //#contents -->
</div>
<!-- //#main -->

<!-- #footer -->
<?php get_footer(); ?>
<!--//#footer -->
</div>
<!-- //#wrapper -->

<!-- #ga -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27324464-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- //#ga -->
</body>
</html>