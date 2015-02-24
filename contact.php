<?php
/*
Template Name: CONTACTページ
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="robots" content="all" />
<meta name="description" content="フォトグラファー種清豊の公式ホームページです。コンタクトページ。お仕事のご依頼やご相談、その他お問い合わせはこちらから。" />
<meta name="keywords" content="種清豊, yutaka tanekiyo, たねきよ ゆたか, 写真家, Photographer, 東京, TOKYO, ドイツ, EOS学園, 日本写真学院" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" href="/favicon.png" />
<link rel="stylesheet" href="/wp-content/themes/yutakatanekiyo_web/css/reset.css" media="screen" type="text/css">
<link rel="stylesheet" href="/wp-content/themes/yutakatanekiyo_web/style.css" media="screen" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Karla:400,700' rel='stylesheet' type='text/css'>

<title>CONTACT - YUTAKA TANEKIYO 種清豊| Photographer</title>
</head>

<body id="contact">
<div id="bg"></div>
<!-- #wrapper -->
<div id="wrapper">
<!-- #header -->
<?php get_header(); ?>
<!-- //#header -->

<!-- #main -->
<div id="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <div class="contents">
        <div class="inner">
            <?php the_content(); ?>
        </div>
    </div><!-- //#contents -->
    <?php endwhile; ?>
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