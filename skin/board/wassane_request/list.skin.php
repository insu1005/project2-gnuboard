<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$requestboard   = new Request($board_skin_url);

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 7;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
echo '<link rel="stylesheet" href="'.$board_skin_url.'/style.css">';
echo '<link rel="stylesheet" href="'.$board_skin_url.'/responsive.css">';

?>

<script>
    $(function(){
        $(".lnb li").removeClass();
        $(".lnb li").eq(3).addClass('on')
    })
</script>

<div class="inner">
<div class="wrap">
    <h2 class="title_type1"><?php echo $board['bo_subject'] ?><span class="sound_only"><?php echo $board['bo_subject'] ?></span></h2>
    <div class="cont-type1 cont_request">
        <div class="service_info">
            <div class="service_title">오구쌀 피자<br/>가맹문의</div>
            <ul class="service_type1">
                <li class="pl0"><img src="<?php echo $board_skin_url;?>/img/service1_1.png" /><p>온라인접수</p></li>
                <li><img src="<?php echo $board_skin_url;?>/img/service1_2.png" /><p>견적확인</p></li>
                <li><img src="<?php echo $board_skin_url;?>/img/service1_3.png" /><p>입금 확인 후<br/>진행</p></li>
                <li><img src="<?php echo $board_skin_url;?>/img/service1_4.png" /><p>고객 검수</p></li>
                <li><img src="<?php echo $board_skin_url;?>/img/service1_5.png" /><p>사이트 반영</p></li>
            </ul>
            <div class="service_txt">
                오구오구!! 오구쌀피자와 함께해요! 오구쌀 여러분 대환영! 오구쌀피자의 가족이 되는 것을 환영합니다!
            </div>
        </div>
        <div class="row mt20 clearfix">
            <div class="div_left left">
                <!-- 게시판 카테고리 : 시작 -->
                <?php if ($is_category) { ?>
                    <ul class="sub_cate2">
                        <?php echo $category_option; ?>
                    </ul>
                <?php } ?>
                <!-- 게시판 카테고리 : 끝 -->
            </div>
            <div class="join-img"></div>
            <div class="join-wrap">
                <p>오구오구 여러분 오구쌀 피자와 함께할가요?<br>저희와 함께하길 원하면 하단에 <strong>"오구쌀 피자와 함께하기"</strong> 를 <br><em>클릭해주세요!</em></p>
                <div class="div_right right">
                    <a href="<?php echo $write_href?$write_href:G5_BBS_URL . '/login.php?url=' . $urlencode ?>" class="btn btn_lg btn_red white go"><span>오구쌀 피자와<br> 함께하기</span><span>GO</span></a>
                </div>
            </div>
        </div>
        <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
        <input type="hidden" name="stx" value="<?php echo $stx ?>">
        <input type="hidden" name="spt" value="<?php echo $spt ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sst" value="<?php echo $sst ?>">
        <input type="hidden" name="sod" value="<?php echo $sod ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <input type="hidden" name="sw" value="">

        <table class="table_request">
            <colgroup>
                <?php if ($is_checkbox) { ?>
                <col style="width: 5%" />
                <?php } ?>
                <col style="width: 5%" />
                <col style="width: 10%" />
                <col />
                <col style="width: 18%" />
                <col style="width: 12%" />
                <col style="width: 10%" />
                <col style="width: 10%" />
            </colgroup>
            <thead>
            <tr>
                <?php if ($is_checkbox) { ?>
                <th>
                    <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                    <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
                </th>
                <?php } ?>
                <th>NO.</th>
                <th>분류</th>
                <th>제목</th>
                <th>신청자</th>
                <th class="w480">회원구분</th>
                <th>진행상황</th>
                <th class="border_r0"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>요청일</a></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table border_r0">게시물이 없습니다.</td></tr>'; }
            else {
                for ($i = 0; $i < count($list); $i++) {
                    $wr_name = trim(strip_tags($list[$i]['name'])); // 작성자
                    $wr_group = trim(strip_tags($list[$i]['wr_1'])); // 소속
                    if(!$wr_group) $wr_group = "개인";

                    if(!is_admin($member['mb_id']) && ($member['mb_id'] != $list[$i]['mb_id'])) {
                        $wr_name = $_cn->privacy($wr_name);
                        if($wr_group != '개인') $wr_group = $_cn->privacy($wr_group);
                    }


                    ?>
                    <tr>
                        <?php if ($is_checkbox) { ?>
                            <td class="center">
                                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                                <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                            </td>
                        <?php } ?>
                        <td class="center">
                            <?php
                            if ($list[$i]['is_notice']) // 공지사항
                                echo '<strong>공지</strong>';
                            else if ($wr_id == $list[$i]['wr_id'])
                                echo "<span class=\"bo_current\">열람중</span>";
                            else
                                echo $list[$i]['num'];
                            ?>
                        </td>
                        <td class="center">
                            <?php
                            if ($is_category && $list[$i]['ca_name']) {
                                ?>
                                <a href="<?php echo $list[$i]['ca_name_href'] ?>"
                                   class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                            <?php } ?>
                        </td>
                        <td>
                            <?php echo $list[$i]['icon_reply']; ?>
                            <?php if (isset($list[$i]['icon_secret'])) { echo $list[$i]['icon_secret'];?>
                            <?php } ?>
                            <a href="<?php echo $list[$i]['href'] ?>">
                                <?php echo $list[$i]['subject'] ?>
                                <?php if ($list[$i]['comment_cnt']) { ?><span
                                        class="sound_only">댓글</span>(<?php echo $list[$i]['comment_cnt']; ?>)<span
                                        class="sound_only">개</span><?php } ?>
                                <?php
                                if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                                if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
                                if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
                                ?>
                            </a>
                        </td>
                        <td class="center"><?php echo $wr_name; ?>(<?php echo $wr_group ?>)</td>
                        <td class="center w480"><?php echo $requestboard->getLevelVal($list[$i]['wr_4']); ?> </td>
                        <td class="center state">
                            <?php $val = $requestboard->getStatVal($list[$i]['wr_3']);
                            echo "<span class='".$val['css']."'>".$val['val']."</span>";
                            ?>
                        </td>
                        <td class="center border_r0"><?php echo $list[$i]['datetime'] ?></td>
                    </tr>
                <?php
                }
            }?>
            </tbody>
        </table>
        <div class="mt10 right here-fix">
            <span class="bold blue"><?php echo $page ?> page</span> /
            <span>Total <?php echo number_format($total_count) ?></span>
        </div>

        <?php echo $write_pages;  // 페이징?>

        <?php if ($list_href || $is_checkbox || $write_href) { ?>
            <div>
                <?php if ($is_checkbox) { ?>
                    <ul class="sub_cate2">
                        <?php if ($list_href) { ?><span class="btn btn-sm btn-success"><a href="<?php echo $list_href ?>">전체보기</a></span><?php } ?>
                        <span><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn btn-sm btn-danger"></span>
                        <span><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn btn-sm btn-danger"></span>
                        <span><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn btn-sm btn-danger"></span>
                    </ul>
                    <noscript>
                        <p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
                    </noscript>
                <?php } ?>
            </div>
        <?php } ?>
        </form>
    </div>
</div>


<!-- 게시판 검색 시작 { -->
<fieldset class="center">
    <form name="fsearch top-fix" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>제목</option>
        <option value="wr_name,1"<?php echo get_selected($sfl, 'wr_name,1'); ?>>신청자</option>
    </select>
    <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="frm_input required" size="15" maxlength="20">
    <input type="submit" value="검색" class="btn_submit">
    </form>
</fieldset>
<!-- } 게시판 검색 끝 -->

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
</div>
<!-- } 게시판 목록 끝 -->
