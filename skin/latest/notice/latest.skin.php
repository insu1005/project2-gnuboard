<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
add_javascript('<script src="'.G5_JS_URL.'/jquery.bxslider.js"></script>', 10);
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="notice ft_cnt event">
    <h2><a href="<?php echo get_pretty_url($bo_table); ?>"><div class="hidden"><?php echo $bo_subject ?></div>EVENT</a></h2>
    <img src="/img/smallhouse.png" alt="오구쌀피자가 보여주는 이벤트!">
    <ul class="event-list">
    <?php for ($i=0; $i<$list_count; $i++) {  ?>
        <li class="effect">
            <?php
            if ($list[$i]['icon_secret']) echo "<span class=\"lock_icon\"><i class=\"fa fa-lock\" aria-hidden=\"true\"></i></span> ";
            if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";
             //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".get_pretty_url($bo_table, $list[$i]['wr_id'])."\">";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];

            if ($list[$i]['comment_cnt']);

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            //if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
            //if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;
            //if ($list[$i]['icon_hot']) echo " <i class=\"fa fa-heart\" aria-hidden=\"true\"></i>";
            ?>
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    <a href="http://insu1006.dothome.co.kr/bbs/board.php?bo_table=notice" class="lt_more event-more"><span class="sound_only">이벤트</span>more</a>
</div>
