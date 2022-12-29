<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
echo '<link rel="stylesheet" href="'.$board_skin_url.'/style.css">';
echo '<link rel="stylesheet" href="'.$board_skin_url.'/responsive.css">';

if(!$wr_1) $wr_1 = $member['mb_nick']; // 소속
if(!$wr_2) $wr_2 = $member['mb_hp']; // 연락처
if(!$wr_3) $wr_3 = 0; // 접수상태
$requestboard   = new Request($board_skin_url);
if(!$wr_4) {

    switch($member['mb_level']) {
        case 5:
            $wr_4 = 1;
            break;
        default:
            $wr_level = "일반회원";
            $wr_4 = 0;
    }
}

switch($wr_4) { // 회원구분 (0:일반회원, 1:계약회원)
    case 1:
        $wr_level = "계약회원";
        break;
    default:
        $wr_level = "일반회원";
}

if(!$wr_name) $wr_name = $member['mb_name']; // 이름

?>

<div class="wrap">
    <h2 class="title_type1"><?php echo $g5['title'] ?></h2>

    <div class="cont-type1 cont_request">
	 <div class="row mt20">
            <div class="div_left">
                <h4 class='title_h4'>유지보수 요청을 위해 아래 요청내용을 작성해 주십시요.<br/>
                    담당자의 검토를 거쳐 견적 및 유지보수 진행에 따른 사항을 안내해 드리겠습니다.</h4>
                <p class="mt20 mp">내용은 되도록 자세하게 작성해 주시면 작업이 정확하고 신속하게 이루어집니다.<br/>
                    작업은 입금확인 후 진행됩니다.
                </p>
            </div>
            <div class="div_right right">
                <img src="<?php echo $board_skin_url; ?>/img/request_img.png" alt="유지보수 요청"/>
            </div>
        </div>

        <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
        <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
        <input type="hidden" name="w" value="<?php echo $w ?>">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
        <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
        <input type="hidden" name="sca" value="<?php echo $sca ?>">
        <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
        <input type="hidden" name="stx" value="<?php echo $stx ?>">
        <input type="hidden" name="spt" value="<?php echo $spt ?>">
        <input type="hidden" name="sst" value="<?php echo $sst ?>">
        <input type="hidden" name="sod" value="<?php echo $sod ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <?php
        $option = '';
        $option_hidden = '';
        if ($is_notice || $is_html || $is_secret || $is_mail) {
            $option = '';
            if ($is_notice) {
                $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
            }

            if ($is_html) {
                if ($is_dhtml_editor) {
                    $option_hidden .= '<input type="hidden" value="html1" name="html">';
                } else {
                    $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">html</label>';
                }
            }

            if ($is_secret) {
                if ($is_admin || $is_secret==1) {
                    $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
                } else {
                    $option_hidden .= '<input type="hidden" name="secret" value="secret">';
                }
            }

            if ($is_mail) {
                $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
            }
        }

        echo $option_hidden;
        ?>
        <table>
            <colgroup>
                <col style="width: 20%"/>
                <col style="width: 80%"/>
            </colgroup>
            <tbody>
            <?php if ($option) { ?>
                <tr>
                    <th scope="row">옵션</th>
                    <td class="border_r0"><?php echo $option ?></td>
                </tr>
            <?php } ?>
            <?php if ($is_category) { ?>
            <tr>
                <th scope="row"><label for="ca_name">분류<strong class="sound_only">필수</strong></label></th>
                <td class="border_r0">
                    <select name="ca_name" id="ca_name" required class="required form-control input_type1" >
                        <option value="">선택하세요</option>
                        <?php echo $category_option ?>
                    </select>
                </td>
            </tr>
            <?php } ?>

            <tr>
                <th scope="row"><label for="wr_1">소속</label></th>
                <td class="border_r0"><input type="text" name="wr_1" value="<?php echo $wr_1 ?>" class="form-control form-inline input_type1" maxlength="50"></td>
            </tr>

            <tr>
                <th scope="row"><label for="wr_name">이름<strong class="sound_only">필수</strong></label></th>
                <td class="border_r0"><input type="text" name="wr_name" value="<?php echo $wr_name ?>" id="wr_name" required class="form-control form-inline required input_type1" maxlength="20"></td>
            </tr>

            <input type="hidden" name="wr_4" value="<?php echo $wr_4; ?>" />
            <tr>
                <th scope="row"><label for="wr_name">회원구분<strong class="sound_only">필수</strong></label></th>
                <td class="border_r0"><input type="text" name="wr_level" value="<?php echo $wr_level ?>" readonly id="wr_level" required class="form-control form-inline required input_type1" maxlength="20"></td>
            </tr>

            <?php if ($is_password) { ?>
            <tr>
                <th scope="row"><label for="wr_password">비밀번호<strong class="sound_only">필수</strong></label></th>
                <td class="border_r0"><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input input_type1 <?php echo $password_required ?>" maxlength="20"></td>
            </tr>
            <?php } ?>

            <tr>
                <th>연락처</th>
                <td class="border_r0">
                    <input type="tel" name="wr_2" value="<?php echo $wr_2; ?>" required class="form-control" placeholder="예) 010-1234-5678">
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="wr_email">이메일</label></th>
                <td class="border_r0"><input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="form_control email" maxlength="100"></td>
            </tr>


            <?php if ($is_homepage) { ?>
                <tr>
                    <th scope="row"><label for="wr_homepage">홈페이지</label></th>
                    <td class="border_r0"><input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="frm_input"></td>
                </tr>
            <?php } ?>

            <?php if($w && $is_admin) {?>
                <tr>
                    <th scope="row"><label for="wr_stat">진행상황</label></th>
                    <td class="border_r0 state">
                        <?php $val = $requestboard->getStatVal($wr_3);
                        echo "<span class='".$val['css']."' style='display:inline-block;'>".$val['val']."</span>";
                        ?>
                        <select id='wr_stat' name='wr_3' class='form-control inline-block' style="display:inline-block;">
                            <option value=''>진행상황선택</option>
                            <option value='0'>0: 접수대기</option>
                            <option value='1'>1: 진행중</option>
                            <option value='2'>2: 작업완료</option>
                            <option value='3'>3: 작업보류</option>
                            <option value='4'>4: 작업취소</option>
                        </select>
                    </td>
                </tr>
            <?php } else { ?>
                <input type="hidden" name="wr_3" value="<?php echo $wr_3?>" />
            <?php }?>

            <tr>
                <th scope="row"><label for="wr_subject">제목<strong class="sound_only">필수</strong></label></th>
                <td class="border_r0">
                <div id="autosave_wrapper">
                    <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input required w100 input_type1" maxlength="255">
                </div>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="wr_content">요청사항<strong class="sound_only">필수</strong></label></th>
                <td class="wr_content border_r0">
                    <!--<textarea class="form-control" rows="10"></textarea>-->
                    <?php if($write_min || $write_max) { ?>
                        <!-- 최소/최대 글자 수 사용 시 -->
                        <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                    <?php } ?>
                    <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                    <?php if($write_min || $write_max) { ?>
                        <!-- 최소/최대 글자 수 사용 시 -->
                        <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                    <?php } ?>
                </td>
            </tr>
            <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
                <tr>
                    <th scope="row"><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></th>
                    <td class="border_r0"><input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input input_type1" ></td>
                </tr>
            <?php } ?>
            <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
            <tr>
                <th scope="row">파일 #<?php echo $i+1 ?></th>
                <td class="border_r0">
                    <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file frm_input">
                    <?php if ($is_file_content) { ?>
                        <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="frm_file frm_input" >
                    <?php } ?>
                    <?php if($w == 'u' && $file[$i]['file']) { ?>
                        <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
            <?php if ($is_guest) { //자동등록방지  ?>
                <tr>
                    <th scope="row">자동등록방지</th>
                    <td class="border_r0">
                        <?php echo $captcha_html ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="center mt20">
            <input type="submit" value="확인" id="btn_submit" accesskey="s" class="btn btn_blue">
            <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn btn-default">취소</a>
        </div>
        </form>
    </div>
</div>


<section id="bo_w">





    <script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }

    $(function () {
        var w = '<?php echo $w?>';

        if(w) {
            $("select[name='wr_3']").val('<?php echo $wr_3?>');
        }
    });
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->