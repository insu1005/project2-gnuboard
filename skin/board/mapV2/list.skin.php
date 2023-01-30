<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');


// 검색 추가 @뒷고기잘구움 님 도움 주셨습니다. { 
function get_board_sfl_select_options2($sfl){
    global $is_admin;
    $str = '';

    $str .= '<option value="wr_subject||wr_3||wr_4" '.get_selected($sfl, 'wr_subject||wr_3||wr_4').'>업체명+주소</option>';
    $str .= '<option value="wr_subject" '.get_selected($sfl, 'wr_subject', true).'>업체명</option>';
    $str .= '<option value="wr_3||wr_4" '.get_selected($sfl, 'wr_3||wr_4').'>주소</option>';
    $str .= '<option value="wr_2" '.get_selected($sfl, 'wr_2', true).'>대표전화</option>';
    
    return run_replace('get_board_sfl_select_options2', $str, $sfl);
}

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);


$lat = 36.4965569936987; // 초기 및 리셋 중심좌표
$lng = 127.242297055683; // 초기 및 리셋 중심좌표
?>

<div class="inner justfix">
<div id="map" style="width: 100%; height: 400px; margin:0px; border-radius:4px;"></div>

<!-- {
kakao Api / JavaScript 키 필요
게시판관리 > 여분필드 1 값에 키를 넣어주세요.
-->
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=0a7f81f42fff246ceeb1efb3aebf1582
&libraries=services"></script>
<!-- } -->

<script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = {
            center: new kakao.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>), // 지도의 중심좌표
            level: 13 // 지도 초기 확대레벨
        };

    var map = new kakao.maps.Map(mapContainer, mapOption);

    // 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
    var mapTypeControl = new daum.maps.MapTypeControl();

    // 지도에 컨트롤을 추가해야 지도위에 표시됩니다
    // daum.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
    map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPRIGHT);

    // 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
    var zoomControl = new daum.maps.ZoomControl();
    map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);


    <?php 
    
    $gu = str_replace("/","",$_GET['gubun']); 

        if($_GET['gubun']=="") {
	       $sql = " select * from g5_write_".$bo_table." order by wr_id asc ";
        } else {
        $sql = " select * from g5_write_".$bo_table." where ca_name='".$gu."' order by wr_id asc ";
        }

        $result = sql_query($sql);
        $cnt = 0;
        while ($row = sql_fetch_array($result)) { 
            if($row['wr_5'] && $row['wr_6']) {
                $thumb = get_list_thumbnail($board['bo_table'], $row['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height'], false, true);
                if($thumb['src']) {
                    $img_content = $thumb['src'];
                }
    ?>

    <?php if($row['wr_1'] == "markerStar1") { ?>
    var imageSrc = '<?php echo $board_skin_url ?>/img/markerStar1.png',
        <?php } else if($row['wr_1'] == "markerStar2") { ?>
    var imageSrc = '<?php echo $board_skin_url ?>/img/markerStar2.png',
        <?php } else if($row['wr_1'] == "markerStar3") { ?>
    var imageSrc = '<?php echo $board_skin_url ?>/img/markerStar3.png',
        <?php } else if($row['wr_1'] == "markerStar4") { ?>
    var imageSrc = '<?php echo $board_skin_url ?>/img/markerStar4.png',
        <?php } else if($row['wr_1'] == "markerStar5") { ?>
    var imageSrc = '<?php echo $board_skin_url ?>/img/markerStar5.png',
        <?php } else { ?>
    var imageSrc = '<?php echo $board_skin_url ?>/img/markerStar6.png',
        <?php } ?>

    imageSize = new kakao.maps.Size(24, 35), // 마커이미지의 크기입니다
        imageOption = {
            offset: new kakao.maps.Point(12, 35)
        }; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

    // 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
    var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption),
        markerPosition = new kakao.maps.LatLng(<?php echo $row['wr_5'] ?>, <?php echo $row['wr_6'] ?>); // 마커가 표시될 위치입니다

    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        position: markerPosition,
        image: markerImage
    });

    // 마커가 지도 위에 표시되도록 설정합니다
    marker.setMap(map);

    // 커스텀 오버레이에 표시할 컨텐츠 입니다
    var content = '<div class="wrap">' +
        '    <div class="info">' +
        '        <div class="body">' +
        '            <?php if($thumb['src']) { ?><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>&wr_id=<?php echo $row['wr_id']; ?>" class="img" style="background-image:url(<?php echo $img_content ?>)">' +
        '            </a><?php } ?>' +
        '            <div class="desc" style="<?php if($thumb['src']) { ?>margin-left: 70px;<?php } else { ?>margin-left: 10px;<?php } ?>">' +
        '                <img src="<?php echo $board_skin_url ?>/img/close_black_24dp.svg" class="close" onclick="closeOverlay_<?php echo $row['wr_id'] ?>()" title="닫기">' +
        '                <div class="titles cut80"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>&wr_id=<?php echo $row['wr_id']; ?>"><?php echo $row['wr_subject']; ?></a></div>' +
        '                <div class="sub1 cut90"><?php echo $row['wr_3']; ?> <?php echo $row['wr_4']; ?></div>' +
        '                <?php if($row['wr_2']) { ?>' +
        '                <div class="sub3 cut90"><a href="tel:<?php echo $row['wr_2']; ?>"><?php echo $row['wr_2']; ?></a></div>' +
        '                <?php } else { ?>' +
        '                <div class="sub2 cut90"><a href="<?php echo $row['wr_link1']; ?>" target="_blank"><?php echo $row['wr_link1']; ?></a></div>' +
        '                <?php } ?>' +
        '            </div>' +
        '        </div>' +
        '    </div>' +
        '</div>';

    // 마커 위에 커스텀오버레이를 표시합니다
    var position = new kakao.maps.LatLng(<?php echo $row['wr_5'] ?>, <?php echo $row['wr_6'] ?>);

    // 마커를 중심으로 커스텀 오버레이를 표시하기위해 CSS를 이용해 위치를 설정했습니다
    var overlay_<?php echo $row['wr_id'] ?> = new kakao.maps.CustomOverlay({
        content: content,
        map: map,
        position: position,
        yAnchor: 1
    });

    // 마커를 클릭했을 때 커스텀 오버레이를 표시합니다
    kakao.maps.event.addListener(marker, 'click', function() {
        overlay_<?php echo $row['wr_id'] ?>.setMap(map);
    });

    // 커스텀 오버레이를 닫기 위해 호출되는 함수입니다 
    function closeOverlay_<?php echo $row['wr_id'] ?>() {
        overlay_<?php echo $row['wr_id'] ?>.setMap(null);
    }

    overlay_<?php echo $row['wr_id'] ?>.setMap(null);


    <?php
        $cnt++;
    }
}

?>
</script>


<script>
    $(function(){
        $(".lnb li").removeClass();
        $(".lnb li").eq(2).addClass('on')
    })
</script>


<!-- 게시판 목록 시작 { -->
<div id="bo_list" style="width:<?php echo $width; ?>">
    <?php if ($is_category) { ?>
    <div class="bo_mo_cate">
        <select name="gubun" id="gubun" class="bo_cate_sel">
            <?php echo get_category_option($bo_table, $sca); // SELECT OPTION 태그로 넘겨받음 ?>
            <option value=''>전체</option>
        </select>
    </div>
    <?php } ?>

    <script>
        $("#gubun").change(function() {
            location.href = "?bo_table=<?php echo $bo_table ?>&gubun=" + encodeURIComponent($(this).val()) + "&sca=" + encodeURIComponent($(this).val());
        })

        $("#gubun").val("<?php echo $gubun ?>").prop("selected", true);


        //브라우저가 리사이즈될때 지도 리로드
        $(window).on('resize', function() {
            var markerPosition = new kakao.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>);
            map.setCenter(markerPosition)
            map.setLevel(13);
        });
    </script>

    <form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">

        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
        <input type="hidden" name="stx" value="<?php echo $stx ?>">
        <input type="hidden" name="spt" value="<?php echo $spt ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sst" value="<?php echo $sst ?>">
        <input type="hidden" name="sod" value="<?php echo $sod ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <input type="hidden" name="sw" value="">

        <!-- 게시판 페이지 정보 및 버튼 시작 { -->
        <div id="bo_btn_top">


            <ul class="btn_bo_user">
                <?php if ($admin_href) { ?>
                <li>
                    <a href="<?php echo $admin_href ?>" class="btn_b01 btn" title="관리자"><i class="fa fa-cog"></i><span class="sound_only">관리자</span></a>
                </li><?php } ?>
                <li>
                    <a href="javascript:void(0);" class="btn_b01 btn" title="Reset" onclick="ress()"><i class="fa fa-refresh" aria-hidden="true"></i><span class="sound_only">지도초기화</span>
                    </a>
                </li>
                <script>
                    function ress() {
                        var moveLatLon = new kakao.maps.LatLng(<?php echo $lat ?>, <?php echo $lng ?>);
                        map.setLevel(13);
                        map.panTo(moveLatLon);
                    }
                </script>

                <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>


                <li>
                    <button type="button" class="btn_bo_sch btn_b01 btn" title="검색"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                </li>


                <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b01 btn" title="등록"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">등록</span></a></li><?php } ?>
                <?php if ($is_admin == 'super' || $is_auth) {  ?>
                <li>
                    <button type="button" class="btn_more_opt is_list_btn btn_b01 btn top_op_btn" title="게시판 리스트 옵션"><i class="fa fa-ellipsis-v" aria-hidden="true" style="font-size:18px;"></i><span class="sound_only">게시판 리스트 옵션</span></button>
                    <?php if ($is_checkbox) { ?>
                    <ul class="more_opt is_list_btn">
                        <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"><i class="fa fa-trash-o" aria-hidden="true"></i> 선택삭제</button></li>
                        <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"><i class="fa fa-files-o" aria-hidden="true"></i> 선택복사</button></li>
                        <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"><i class="fa fa-arrows" aria-hidden="true"></i> 선택이동</button></li>
                    </ul>
                    <?php } ?>
                </li>
                <?php if ($is_checkbox) { ?>
                <li class="all_chk chk_box top_chk_all">
                    <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);" class="selec_chk">
                    <label for="chkall">
                        <span></span>
                        <b class="sound_only">현재 페이지 게시물 전체선택</b>
                    </label>
                </li>
                <?php } ?>
                <?php }  ?>
            </ul>
        </div>
        <!-- } 게시판 페이지 정보 및 버튼 끝 -->

        <div class="tbl_head01 tbl_wrap">
            <table>
                <caption><?php echo $board['bo_subject'] ?> 목록</caption>

                <tbody>
                    <?php
        for ($i=0; $i<count($list); $i++) {
        	if ($i%2==0) $lt_class = "even";
        	else $lt_class = "";
		?>
                    <tr class="<?php if ($list[$i]['is_notice']) echo "bo_notice"; ?> <?php echo $lt_class ?>">

                        <td class="td_num2">
                            <a href="#">
                                <?php if($list[$i]['wr_1'] == "markerStar1") { ?>
                                <img src="<?php echo $board_skin_url ?>/img/markerStar1.png" onclick="panTo_<?php echo $list[$i]['wr_id'] ?>()">
                                <?php } else if($list[$i]['wr_1'] == "markerStar2") { ?>
                                <img src="<?php echo $board_skin_url ?>/img/markerStar2.png" onclick="panTo_<?php echo $list[$i]['wr_id'] ?>()">
                                <?php } else if($list[$i]['wr_1'] == "markerStar3") { ?>
                                <img src="<?php echo $board_skin_url ?>/img/markerStar3.png" onclick="panTo_<?php echo $list[$i]['wr_id'] ?>()">
                                <?php } else if($list[$i]['wr_1'] == "markerStar4") { ?>
                                <img src="<?php echo $board_skin_url ?>/img/markerStar4.png" onclick="panTo_<?php echo $list[$i]['wr_id'] ?>()">
                                <?php } else if($list[$i]['wr_1'] == "markerStar5") { ?>
                                <img src="<?php echo $board_skin_url ?>/img/markerStar5.png" onclick="panTo_<?php echo $list[$i]['wr_id'] ?>()">
                                <?php } else { ?>
                                <img src="<?php echo $board_skin_url ?>/img/markerStar6.png" onclick="panTo_<?php echo $list[$i]['wr_id'] ?>()">
                                <?php } ?>
                            </a>

                            <script>
                                function panTo_<?php echo $list[$i]['wr_id'] ?>() {
                                    // 이동할 위도 경도 위치를 생성합니다 
                                    var moveLatLon = new kakao.maps.LatLng(<?php echo $list[$i]['wr_5'] ?>, <?php echo $list[$i]['wr_6'] ?>);

                                    // 지도 중심을 부드럽게 이동시킵니다
                                    // 만약 이동할 거리가 지도 화면보다 크면 부드러운 효과 없이 이동합니다
                                    map.setLevel(5);
                                    map.panTo(moveLatLon);

                                    overlay_<?php echo $list[$i]['wr_id'] ?>.setMap(map);
                                }
                            </script>

                        </td>

                        <td class="td_subject" style="padding-left:<?php echo $list[$i]['reply'] ? (strlen($list[$i]['wr_reply'])*10) : '0'; ?>px">

                            <div class="bo_tit">

                                <ul class="bo_tit_ul2">
                                    <a href="<?php echo $list[$i]['href'] ?>">
                                        <?php echo $list[$i]['icon_reply'] ?>
                                        <?php echo $list[$i]['subject'] ?>
                                    </a> 
                                    <?php if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";?>
                                    <?php if ($list[$i]['comment_cnt']) { ?> <span class="cnt_cmt">+<?php echo $list[$i]['wr_comment']; ?></span><?php } ?>
                                </ul>
                                <ul class="bo_tit_ul3">

                                    <?php if ($is_category && $list[$i]['ca_name']) { ?>
                                    <span style="color:#000"><?php echo $list[$i]['ca_name'] ?>　</span>
                                    <?php } ?>
                                    <?php echo $list[$i]['wr_3'] ?> <?php echo $list[$i]['wr_4'] ?>

                                    <?php if($list[$i]['wr_link1']) { ?>
                                    <dd class="bo_tit_ul4">
                                        <a href="<?php echo $list[$i]['wr_link1'] ?>" target="_blank"><?php echo $list[$i]['wr_link1'] ?></a>
                                    </dd>
                                    <?php } ?>

                                    <?php if($list[$i]['wr_2']) { ?>
                                    <dd style="margin-top:20px;" class="mo_view">
                                        <a href="tel:<?php echo $list[$i]['wr_2'] ?>" class="tel_btn" style="font-size:12px;"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $list[$i]['wr_2'] ?></a>
                                    </dd>
                                    <?php } ?>

                                </ul>



                            </div>
                        </td>

                        <td class="td_datetime pc_view">
                            <?php if($list[$i]['wr_2']) { ?>
                            <span class="tel_btn"><?php echo $list[$i]['wr_2'] ?></span>
                            <?php } ?>
                        </td>

                        <td class="td_datetime2">
                            <a href="#" class="" onclick="panTo_<?php echo $list[$i]['wr_id'] ?>()"><i class="fa fa-location-arrow" aria-hidden="true"></i></a>
                        </td>



                        <?php if ($is_checkbox) { ?>
                        <td class="td_chk chk_box">
                            <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>" class="selec_chk">
                            <label for="chk_wr_id_<?php echo $i ?>">
                                <span></span>
                                <b class="sound_only"><?php echo $list[$i]['subject'] ?></b>
                            </label>
                        </td>
                        <?php } ?>

                    </tr>
                    <?php } ?>
                    <?php if (count($list) == 0) { echo '<tr><td colspan="'.$colspan.'" class="empty_table">등록된 데이터가 없습니다.</td></tr>'; } ?>
                </tbody>
            </table>
        </div>
        <!-- 페이지 -->
        <?php echo $write_pages; ?>
        <!-- 페이지 -->

        <?php if ($list_href || $is_checkbox || $write_href) { ?>
        <div class="bo_fx">
            <?php if ($list_href || $write_href) { ?>
            <ul class="btn_bo_user_btm">
                <!--
        	<?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn" title="관리자"><i class="fa fa-cog fa-spin fa-fw"></i><span class="sound_only">관리자</span></a></li><?php } ?>
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn" title="RSS"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
            -->

                <?php if ($write_href) { ?>
                <li class="btn_list_01">
                    <?php if ($stx) { ?>
                    <a href="<?php echo $list_href ?>" class="btn_b01 btn" title="목록">
                        <i class="fa fa-bars mo_view" aria-hidden="true"></i>
                        <span class="pc_view">목록</span>
                    </a>
                    <?php } ?>
                    <a href="<?php echo $write_href ?>" class="btn_b01 btn" title="등록">
                        <i class="fa fa-pencil mo_view" aria-hidden="true"></i>
                        <span class="pc_view">등록하기</span>
                    </a>

                </li>
                <?php } ?>

            </ul>
            <?php } ?>
        </div>
        <?php } ?>
    </form>


    <div class="bo_sch_wrap">
        <fieldset class="bo_sch">
            <h3>검색</h3>
            <form name="fsearch" method="get">
                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                <input type="hidden" name="sca" value="<?php echo $sca ?>">
                <input type="hidden" name="sop" value="and">
                <label for="sfl" class="sound_only">검색대상</label>
                <select name="sfl" id="sfl">
                    <?php echo get_board_sfl_select_options2($sfl); ?>
                </select>
                <label for="stx" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                <div class="sch_bar">
                    <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" required id="stx" class="sch_input" size="25" maxlength="20" placeholder=" 검색어를 입력해주세요">
                    <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                </div>
                <button type="button" class="bo_sch_cls" title="닫기"><i class="fa fa-times" aria-hidden="true"></i><span class="sound_only">닫기</span></button>
            </form>
        </fieldset>
        <div class="bo_sch_bg"></div>
    </div>
    <script>
        jQuery(function($) {
            // 게시판 검색
            $(".btn_bo_sch").on("click", function() {
                $(".bo_sch_wrap").toggle();
            })
            $('.bo_sch_bg, .bo_sch_cls').click(function() {
                $('.bo_sch_wrap').hide();
            });
        });
    </script>


</div>

<?php if($is_checkbox) { ?>
<noscript>
    <p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<?php if ($is_checkbox) { ?>
<script>
    function all_checked(sw) {
        var f = document.fboardlist;

        for (var i = 0; i < f.length; i++) {
            if (f.elements[i].name == "chk_wr_id[]")
                f.elements[i].checked = sw;
        }
    }

    function fboardlist_submit(f) {
        var chk_count = 0;

        for (var i = 0; i < f.length; i++) {
            if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
                chk_count++;
        }

        if (!chk_count) {
            alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
            return false;
        }

        if (document.pressed == "선택복사") {
            select_copy("copy");
            return;
        }

        if (document.pressed == "선택이동") {
            select_copy("move");
            return;
        }

        if (document.pressed == "선택삭제") {
            if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
                return false;

            f.removeAttribute("target");
            f.action = g5_bbs_url + "/board_list_update.php";
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
        f.action = g5_bbs_url + "/move.php";
        f.submit();
    }

    // 게시판 리스트 관리자 옵션
    jQuery(function($) {
        $(".btn_more_opt.is_list_btn").on("click", function(e) {
            e.stopPropagation();
            $(".more_opt.is_list_btn").toggle();
        });
        $(document).on("click", function(e) {
            if (!$(e.target).closest('.is_list_btn').length) {
                $(".more_opt.is_list_btn").hide();
            }
        });
    });
</script>
<?php } ?>
</div>
<!-- } 게시판 목록 끝 -->