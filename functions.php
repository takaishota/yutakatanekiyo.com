<?php
// ループ内の最初の記事、最後の記事を判定
function isFirst($my_query){
    return ($my_query->current_post === 0);
}

function isLast($my_query){
    return ($my_query->current_post+1 === $my_query->post_count);
}

// 自動保存された下書きをゴミ箱に強制移動
function force_update_autodraft_to_trash( $post_id, $post ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE && ! (int)$post_id ) { return; }
    if ( $post->post_status == 'auto-draft' ) {
        wp_update_post( array( 'ID' => (int)$post_id, 'post_status' => 'trash' ) );
    }
}
add_action( 'wp_insert_post', 'force_update_autodraft_to_trash', 10, 2 );

// カスタム投稿の定義
/*add_action('init', 'my_custom_init');
function my_custom_init()
{
  $labels = array(
    'name' => _x('NEWS', 'post type general name'),
    'singular_name' => _x('NEWS', 'post type singular name'),
    'add_new' => _x('新しく記事を書く', 'news'),
    'add_new_item' => __('新規NEWS記事を書く'),
    'edit_item' => __('NEWS記事を編集'),
    'new_item' => __('新しいNEWS記事'),
    'view_item' => __('NEWSの記事を見る'),
    'search_items' => __('NEWSの記事を探す'),
    'not_found' =>  __('NEWSの記事はありません'),
    'not_found_in_trash' => __('ゴミ箱にNEWSの記事はありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail','custom-fields','excerpt','author','trackbacks','comments','revisions','page-attributes'),
    //'has_archive' => true
    'has_archive' => 'news'
  );
  register_post_type('news',$args);

  // カスタムタクソノミーの定義
  register_taxonomy(
    'newscat',
    'news',
    array(
      'hierarchical' => true,
      'update_count_callback' => '_update_post_term_count',
      'label' => 'カテゴリー',
      'singular_label' => 'カテゴリー',
      'public' => true,
      'show_ui' => true
    )
  );
}
// カスタム投稿関連のメッセージ定義
add_filter('post_updated_messages', 'news_updated_messages');
function book_updated_messages( $messages ) {

  $messages['news'] = array(
    0 => '', // ここは使用しません
    1 => sprintf( __('NEWSの記事を更新しました <a href="%s">記事を見る</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('カスタムフィールドを更新しました'),
    3 => __('カスタムフィールドを削除しました'),
    4 => __('NEWS更新'),
    5 => isset($_GET['revision']) ? sprintf( __(' %s 前にNEWSの記事を保存しました'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('NEWSが公開されました <a href="%s">記事を見る</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('NEWS記事を保存'),
    8 => sprintf( __('NEWSの記事を送信 <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('NEWSの記事を予約投稿しました: <strong>%1$s</strong>. <a target="_blank" href="%2$s">プレビュー</a>'),
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('NEWSの下書きを更新しました <a target="_blank" href="%s">プレビュー</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}*/
?>