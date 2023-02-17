<?php
// リサイズされる画像の画質を100%にする
add_filter('jpeg_quality', function ($arg) {
  return 100;
});
// サムネイルの設定
add_theme_support('post-thumbnails'); // サムネイルを有効化
add_image_size('pmAndBlog', 480, 260, true);
add_image_size('ogimg', 1200, 630, true);
// デフォルトの画像サイズを生成しない
add_filter('intermediate_image_sizes_advanced', 'remove_image_sizes');


// css,js読み込み
function wp_theme_scripts()
{
  wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.1.1');
  wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', array('style'), '1.1.1');
  wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.1.1', true);
  wp_deregister_script('jquery'); // WordPressで用意されているjQueryを読み込まない記述
}

// 投稿画面のCSS読み込み
function add_block_editor_styles()
{
  global $pagenow;

  if ($pagenow == 'post.php' || $pagenow == 'post-new.php' || $pagenow == 'edit.php') {
    wp_enqueue_style('block-style', get_stylesheet_directory_uri() . '/block_style.css');
  }
}
add_action('enqueue_block_editor_assets', 'add_block_editor_styles');
