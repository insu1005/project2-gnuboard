<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
echo '<link rel="stylesheet" href="'.$board_skin_url.'/style.css">';
echo '<link rel="stylesheet" href="'.$board_skin_url.'/responsive.css">';

$requestboard = new Request($board_skin_url);

if ($is_admin && ($prev_href || $next_href)) {
    ob_start();

    if ($prev_href) {
        echo "<a href='$prev_href' class='btn btn-sm btn-default'>이전글</a>&nbsp;";
    }
    if ($next_href) {
        echo "<a href='$next_href' class='btn btn-sm btn-default'>다음글</a>";
    }

    $nav_buttons = ob_get_contents();
    ob_end_clean();
    
}

?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<div class="wrap">
    <h1 class="title_type1"><span>유</span>지보수 요청</h1>
    <div class="cont-type1 cont_request">
        <div class="row mt20">
            <div class="div_left btn_left left">
                <?php echo $nav_buttons; ?>
            </div>
            <div class="div_right right">
                <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn_red btn_lg">유지보수 신청하기</a><?php } ?>
            </div>
        </div>
        <table>
            <colgroup>
                <col style="width: 20%"/>
                <col style="width: 80%"/>
            </colgroup>
            </thead>
            <tbody>
            <?php if ($category_name) { // 분류가 있을 경우?>
                <tr>
                    <th>분류</th>
                    <td class="border_r0"><?php echo $view['ca_name'];?></td>
                </tr>
            <?php } ?>
            <tr>
                <th>이름</th>
                <td class="border_r0">
                    <?php echo $view['name'] ?> (<?php echo $view['wr_1'] ?>)
                </td>
            </tr>

            <tr>
                <th>연락처</th>
                <td class="border_r0">
                    <?php echo $view['wr_2']; ?> (<?php echo $view['wr_email'] ?>)
                </td>
            </tr>

            <tr>
                <th>요청일</th>
                <td class="border_r0">
                    <?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?>
                </td>
            </tr>
            <tr>
                <th>기타정보</th>
                <td class="border_r0">
                    <?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?>
                    <span class="w480">조회<?php echo number_format($view['wr_hit']) ?>회</span>
                    <span class="w480">댓글<?php echo number_format($view['wr_comment']) ?>건</span>
                </td>
            </tr>

            <tr>
                <th>진행상황</th>
                <td class="border_r0 state">
                    <?php $val = $requestboard->getStatVal($view['wr_3']);
                    echo "<span class='".$val['css']."' style='width:10%; text-align:center;' >".$val['val']."</span>";
                    ?>
                </td>
            </tr>
            </tbody>
        </table>

        <table>
            <colgroup>
                <col style="width: 20%"/>
                <col style="width: 80%"/>
            </colgroup>
            </thead>
            <tbody>
            <tr>
                <td class="border_r0 bold td_title" colspan="2"><?php echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력 ?></td>
            </tr>
            <tr>
                <td class="border_r0 td_cont" colspan="2">
                    <div>
                        <?php
                        // 파일 출력
                        $v_img_count = count($view['file']);
                        if($v_img_count) {
                            echo "<div id=\"bo_v_img\">\n";

                            for ($i=0; $i<=count($view['file']); $i++) {
                                if ($view['file'][$i]['view']) {
                                    echo get_view_thumbnail($view['file'][$i]['view']);
                                }
                            }

                            echo "</div>\n";
                        }
                        ?>
                        <?php echo get_view_thumbnail($view['content']); ?>
                    </div>
                </td>
            </tr>
            <?php if ($view['link']) { ?>
                <!-- 관련링크 시작 { -->
                <tr>
                    <th>관련링크</th>
                    <td class="border_r0">
                        <ul>
                            <?php
                            // 링크
                            $cnt = 0;
                            for ($i=1; $i<=count($view['link']); $i++) {
                                if ($view['link'][$i]) {
                                    $cnt++;
                                    $link = cut_str($view['link'][$i], 70);
                                    ?>
                                    <li>
                                        <a href="<?php echo $view['link_href'][$i] ?>" target="_blank">
                                            <img src="<?php echo $board_skin_url ?>/img/icon_link.gif" alt="관련링크">
                                            <strong><?php echo $link ?></strong>
                                        </a>
                                        <span class="bo_v_link_cnt"><?php echo $view['link_hit'][$i] ?>회 연결</span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </td>
                </tr>
                <!-- } 관련링크 끝 -->
            <?php } ?>
            <?php
            if ($view['file']['count']) {
                $cnt = 0;
                for ($i=0; $i<count($view['file']); $i++) {
                    if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                        $cnt++;
                }
            }
            ?>
            <?php if($cnt) { ?>
                <!-- 첨부파일 시작 { -->
                <tr>
                    <th>첨부파일</th>
                    <td class="border_r0">
                        <ul>
                            <?php
                            // 가변 파일
                            for ($i=0; $i<count($view['file']); $i++) {
                                if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
                                    ?>
                                    <li>
                                        <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                                            <img src="<?php echo $board_skin_url ?>/img/icon_file.gif" alt="첨부">
                                            <strong><?php echo $view['file'][$i]['source'] ?></strong>
                                            <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                                        </a>
                                        <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드</span>
                                        <span>DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </td>
                </tr>
                <!-- } 첨부파일 끝 -->
            <?php } ?>

            </tbody>
        </table>

        <?php
        include_once(G5_SNS_PATH."/view.sns.skin.php");

        // 코멘트 입출력
        include_once(G5_BBS_PATH.'/view_comment.php');
        ?>

        <div class="row mt20">
            <div class="div_left left">
                <?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="btn btn_red">수정</a><?php } ?>
                <?php if ($delete_href) { ?><a href="<?php echo $delete_href ?>" class="btn btn_red" onclick="del(this.href); return false;">삭제</a><?php } ?>
                <?php if ($copy_href) { ?><a href="<?php echo $copy_href ?>" class="btn btn-default" onclick="board_move(this.href); return false;">복사</a><?php } ?>
                <?php if ($move_href) { ?><a href="<?php echo $move_href ?>" class="btn btn-default" onclick="board_move(this.href); return false;">이동</a><?php } ?>
                <?php if ($search_href) { ?><a href="<?php echo $search_href ?>" class="btn btn-warning white">검색</a><?php } ?>
            </div>
            <div class="div_right right">
                <a href="<?php echo $list_href ?>" class="btn btn-default">목록보기</a>
            </div>
        </div>
    </div>
</div>


<!-- 게시물 읽기 시작 { -->
<div class="wrap">
    <div class="cont-type1 cont_request">
    <?php
    // 코멘트 입출력
    include_once(G5_BBS_PATH.'/view_comment.php');
     ?>
    </div>
</div>
<!-- } 게시판 읽기 끝 -->

<script>
    $('#wr_stat').change(function() {
        var stat;
        stat = $('#wr_stat option:selected').val();

        $.ajax({
            url:'<?php echo $board_skin_url; ?>/server.php',
            type:'get',
            data:"stat=" + stat + "&bo_table=<?php echo $_GET['bo_table']; ?>&wr_id=<?php echo $_GET['wr_id']; ?>",
            success:function(data){
               location.reload();
            }
        })
    });
</script>

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });
});
</script>

<!-- } 게시글 읽기 끝 -->