<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="robots" content="all" />
<meta name="description" content="フォトグラファー種清豊の公式ホームページです。展覧会や雑誌掲載などのお知らせ、キャノンEOS学園、日本写真学院の生徒の方へのご連絡などを掲載しています。" />
<meta name="keywords" content="種清豊, yutaka tanekiyo, たねきよ ゆたか, 写真家, Photographer, 東京, TOKYO, ドイツ, EOS学園, 日本写真学院、お知らせ" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" href="/favicon.png" />
<link rel="stylesheet" href="/wp-content/themes/yutakatanekiyo_web/css/reset.css" media="screen" type="text/css">
<link rel="stylesheet" href="/wp-content/themes/yutakatanekiyo_web/style.css" media="screen" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Karla:400,700' rel='stylesheet' type='text/css'>

<title>NEWS - YUTAKA TANEKIYO 種清豊| Photographer</title>
</head>

<body id="news">

<!-- #wrapper -->
<div id="wrapper">
<!-- #header -->
<?php get_header(); ?>
<!-- //#header -->

<!-- #main -->
<div id="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <h1>NEWS</h1>
    <div class="contents">
       	<article>
		<span class="date">
            		<b>info</b>
                	<time>
				<?php the_date('Y-n-j'); ?>
			</time>
		</span>
		<h1><?php the_title(); ?></h1>
        	<?php the_content(); ?>
        </article>
	<div id="social">
        	<span>SHARE：</span>
        	<a class="twitter" href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" rel="nofollow" target="_blank"></a>
            <a class="facebook" href="<?php the_permalink(); ?>" rel="nofollow" target="_blank"></a>
        </div>
    </div><!-- //#contents -->
    <?php endwhile; ?>
</div>
<!-- //#main -->
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