<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php
  if (get_field('seo_noindex')) {
    echo '<meta name="robots" content="noindex">';
  }
  $site_name = get_bloginfo('name');
  $title = '';
  $desc = get_bloginfo('description');
  $og_img_url = '';
  $seo_title = get_field('seo_title');
  $seo_desc = get_field('seo_desc');
  $seo_keywords = get_field('seo_keywords');

  if (is_front_page()) {
    if ($seo_title) {
      $title = $seo_title;
    } else {
      $title = $site_name;
    }
    if ($seo_desc) {
      $desc = $seo_desc;
    }
  } elseif (is_page() || is_single()) {
    if ($seo_title) {
      $title = $seo_title;
    } else {
      $title = get_the_title($post->ID) . ' | ' . get_bloginfo('name');
    }
    if ($seo_desc) {
      $desc = $seo_desc;
    } elseif ($post->content) {
      $content = wp_strip_all_tags(get_the_content());
      $content = mb_substr($content, 0, 120, 'UTF-8');
      $desc = $content;
    }
  } elseif (is_archive() || is_search()) {
    $archive_title = strip_tags(get_the_archive_title());
    $title = $archive_title . 'の一覧 | ' . get_bloginfo('name');
  }

  //ogpデフォルトはTOPのアイキャッチ画像を使用
  $front_page_id = get_option('page_on_front');
  if (has_post_thumbnail($post)) {
    $og_img_url = get_the_post_thumbnail_url($post->ID, 'ogimg');
  } elseif (has_post_thumbnail($front_page_id)) {
    $og_img_url = wp_get_attachment_image_url($front_page_id, 'ogimg');
  }
  ?>
  <title><?php echo $title ?></title>
  <meta name="description" content="<?php echo $desc; ?>">
  <?php if ($seo_keywords) { ?>
    <meta name=”keywords” content=”<?php echo $seo_keywords; ?>”>
  <?php } ?>

  <!-- ▼ og設定 ▼ -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo $title; ?>">
  <meta property="og:description" content="<?php echo $desc; ?>">
  <meta property="og:url" content="<?php echo (is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>">
  <?php if ($og_img_url) { ?>
    <meta property="og:image" content="<?php echo $og_img_url; ?>"><?php } ?>
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <!-- ▲ og設定 ▲ -->

  <!-- ▼ twitter og設定 ▼ -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="<?php echo $title; ?>">
  <meta name="twitter:description" content="<?php echo $desc; ?>">
  <?php if ($og_img_url) : ?>
    <meta name="twitter:image" content="<?php echo $og_img_url; ?>">
  <?php endif; ?>
  <!-- ▲ twitter og設定 ▲ -->

  <!-- ▼ google font ▼ -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;700&family=Noto+Sans+JP:wght@300;400;500;700&family=Noto+Serif+JP:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- ▲ google font ▲ -->

  <!-- ▼ favicon設定 ▼ -->
  <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/setting/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/setting/apple-touch-icon.png">
  <!--/-->
  <!-- ▲ favicon設定 ▲ -->

  <?php wp_head(); ?>

<body <?php body_class(); ?>>

  <header></header>