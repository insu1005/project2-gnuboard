<?php
$sub_menu = '300900';
include_once('./_common.php');

auth_check($auth[$sub_menu], "r");

$g5['title'] = '온라인상담 항목관리';
include_once (G5_ADMIN_PATH.'/admin.head.php');

$frm_submit = '<div class="btn_confirm01 btn_confirm">
    <input type="submit" value="확인" class="btn_submit" accesskey="s">
    <a href="./counsel_order_opt.php">취소</a>
</div>';

if($mode=='100'){

	$sql = " update {$g5['counsel_opt_table']} set sex = '$sex', addre = '$addre', tel = '$tel', oaddre = '$oaddre', otel = '$otel',
	hphone = '$hphone', fax = '$fax', ename = '$ename', birth = '$birth', merry = '$merry', grade = '$grade', bizno = '$bizno',
	job = '$job', duty = '$duty', likes = '$likes', rcid = '$rcid', emailok = '$emailok',
	input1 = '$input1', input2 = '$input2', input3 = '$input3', input4 = '$input4', input5 = '$input5',
	select1 = '$select1',select2 = '$select2',select3 = '$select3', select4 = '$select4', select5 = '$select5',
	radio1 = '$radio1', radio2 = '$radio2', radio3 = '$radio3', radio4 = '$radio4', radio5 = '$radio5',
	check1 = '$check1', check2 = '$check2', check3 = '$check3', check4 = '$check4', check5 = '$check5',
	txt1 = '$txt1', txt2 = '$txt2', txt3 = '$txt3' where num = '$num' ";
	sql_query($sql);

	goto_url("./counsel_order_opt.php");

}

?>

<form name="fconfig" action="./counsel_order_opt.php" onsubmit="return fconfig_check(this)" method="post" enctype="MULTIPART/FORM-DATA">
<input type="hidden" name="token" value="" id="token">
<input type="hidden" name="mode" value="100" id="mode">
<input type="hidden" name="num" value="<?php echo $csconfig['num'] ?>" id="num">

<section id="anc_scf_book">
    <h2 class="h2_frm">온라인상담 항목관리</h2>
    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>책만들기 설정</caption>
        <colgroup>
            <col class="grid_4">
            <col>
        </colgroup>
        <tbody>
		<tr>
            <th scope="row"><label for="ename">영문이름</label></th>
            <td><?php echo gen_single_selectbox("","ename",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['ename'],''); ?> <a href="counsel_open.php?item=ename&inum=11&itemname=영문이름" target="_blank" class="btn_frmline win_scrap">영문이름 수정</a> <?php echo ($csconfig['ename'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="tel1">전화번호</label></th>
            <td><?php echo gen_single_selectbox("","tel",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['tel1'],''); ?> <a href="counsel_open.php?item=tel&inum=12&itemname=전화번호" target="_blank" class="btn_frmline win_scrap">전화번호 수정</a> <?php echo ($csconfig['tel'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="otel1">직장전화번호</label></th>
            <td><?php echo gen_single_selectbox("","otel",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['otel1'],''); ?> <a href="counsel_open.php?item=otel&inum=13&itemname=직장전화번호" target="_blank" class="btn_frmline win_scrap">직장전화번호 수정</a> <?php echo ($csconfig['otel'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="hphone1">휴대폰번호</label></th>
            <td><?php echo gen_single_selectbox("","hphone",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['hphone1'],''); ?> <a href="counsel_open.php?item=hphone&inum=14&itemname=휴대폰번호" target="_blank" class="btn_frmline win_scrap">휴대폰번호 수정</a> <?php echo ($csconfig['hphone'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">추천인 아이디</label></th>
            <td><?php echo gen_single_selectbox("","rcid",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['rcid'],''); ?> <a href="counsel_open.php?item=rcid&inum=15&itemname=추천인아이디" target="_blank" class="btn_frmline win_scrap">추천인아이디 수정</a> <?php echo ($csconfig['rcid'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">사업자등록번호</label></th>
            <td><?php echo gen_single_selectbox("","bizno",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['bizno'],''); ?> <a href="counsel_open.php?item=bizno&inum=16&itemname=사업자등록번호" target="_blank" class="btn_frmline win_scrap">사업자등록번호 수정</a> <?php echo ($csconfig['bizno'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="addre">주소</label></th>
            <td><?php echo gen_single_selectbox("","addre",Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['addre'],''); ?> <a href="counsel_open.php?item=addre&inum=17&itemname=주소" target="_blank" class="btn_frmline win_scrap">주소수정</a> <?php echo ($csconfig['addre'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="oaddre">직장주소</label></th>
            <td><?php echo gen_single_selectbox("","oaddre",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['oaddre'],''); ?> <a href="counsel_open.php?item=oaddre&inum=18&itemname=직장주소" target="_blank" class="btn_frmline win_scrap">직장주소 수정</a> <?php echo ($csconfig['oaddre'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="otel1">FAX</label></th>
            <td><?php echo gen_single_selectbox("","fax",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['fax1'],''); ?> <a href="counsel_open.php?item=fax&inum=19&itemname=FAX" target="_blank" class="btn_frmline win_scrap">FAX번호 수정</a> <?php echo ($csconfig['fax'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="grade">최종학력</label></th>
            <td><?php echo gen_single_selectbox("","grade",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['grade'],''); ?> <a href="counsel_open.php?item=grade&inum=2&itemname=최종학력" target="_blank" class="btn_frmline win_scrap">최종학력 항목수정</a> <?php echo ($csconfig['grade'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">직업</label></th>
            <td><?php echo gen_single_selectbox("","job",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['job'],''); ?> <a href="counsel_open.php?item=job&inum=2&itemname=직업" target="_blank" class="btn_frmline win_scrap">직업 항목수정</a> <?php echo ($csconfig['job'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">직종</label></th>
            <td><?php echo gen_single_selectbox("","duty",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['duty'],''); ?> <a href="counsel_open.php?item=duty&inum=2&itemname=직종" target="_blank" class="btn_frmline win_scrap">직종 항목수정</a> <?php echo ($csconfig['duty'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">관심영역</label></th>
            <td><?php echo gen_single_selectbox("","likes",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['likes'],''); ?> <a href="counsel_open.php?item=likes&inum=2&itemname=관심영역" target="_blank" class="btn_frmline win_scrap">관심영역 항목수정</a> <?php echo ($csconfig['likes'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="birth">생년월일</label></th>
            <td><?php echo gen_single_selectbox("","birth",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['birth'],''); ?> <a href="counsel_open.php?item=birth&inum=21&itemname=생년월일" target="_blank" class="btn_frmline win_scrap">생년월일 수정</a> <?php echo ($csconfig['birth'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
        <tr>
            <th scope="row"><label for="sex">성별</label></th>
            <td><?php echo gen_single_selectbox("","sex",Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['sex'],''); ?> <a href="counsel_open.php?item=sex&inum=31&itemname=성별" target="_blank" class="btn_frmline win_scrap">성별수정</a> <?php echo ($csconfig['sex'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="merry">결혼여부</label></th>
            <td><?php echo gen_single_selectbox("","merry",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['merry'],''); ?> <a href="counsel_open.php?item=merry&inum=32&itemname=결혼여부" target="_blank" class="btn_frmline win_scrap">결혼여부 항목수정</a> <?php echo ($csconfig['merry'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">메일수신여부</label></th>
            <td><?php echo gen_single_selectbox("","emailok",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['emailok'],''); ?> <a href="counsel_open.php?item=emailok&inum=41&itemname=메일수신여부" target="_blank" class="btn_frmline win_scrap">메일수신여부 수정</a> <?php echo ($csconfig['emailok'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">입력형 추가1</label></th>
            <td><?php echo gen_single_selectbox("","input1",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['input1'],''); ?> <a href="counsel_open.php?item=input1&inum=1&itemname=입력형1" target="_blank" class="btn_frmline win_scrap">입력형 1 항목수정</a> <?php echo ($csconfig['input1'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">입력형 추가2</label></th>
            <td><?php echo gen_single_selectbox("","input2",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['input2'],''); ?> <a href="counsel_open.php?item=input2&inum=1&itemname=입력형2" target="_blank" class="btn_frmline win_scrap">입력형 2 항목수정</a> <?php echo ($csconfig['input2'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">입력형 추가3</label></th>
            <td><?php echo gen_single_selectbox("","input3",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['input3'],''); ?> <a href="counsel_open.php?item=input3&inum=1&itemname=입력형3" target="_blank" class="btn_frmline win_scrap">입력형 3 항목수정</a> <?php echo ($csconfig['input3'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">입력형 추가4</label></th>
            <td><?php echo gen_single_selectbox("","input4",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['input4'],''); ?> <a href="counsel_open.php?item=input4&inum=1&itemname=입력형4" target="_blank" class="btn_frmline win_scrap">입력형 4 항목수정</a> <?php echo ($csconfig['input4'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">입력형 추가5</label></th>
            <td><?php echo gen_single_selectbox("","input5",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['input5'],''); ?> <a href="counsel_open.php?item=input5&inum=1&itemname=입력형5" target="_blank" class="btn_frmline win_scrap">입력형 5 항목수정</a> <?php echo ($csconfig['input5'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">선택형 추가1</label></th>
            <td><?php echo gen_single_selectbox("","select1",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['select1'],''); ?> <a href="counsel_open.php?item=select1&inum=2&itemname=선택형1" target="_blank" class="btn_frmline win_scrap">선택형 1 항목수정</a> <?php echo ($csconfig['select1'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">선택형 추가2</label></th>
            <td><?php echo gen_single_selectbox("","select2",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['select2'],''); ?> <a href="counsel_open.php?item=select2&inum=2&itemname=선택형2" target="_blank" class="btn_frmline win_scrap">선택형 2 항목수정</a> <?php echo ($csconfig['select2'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">선택형 추가3</label></th>
            <td><?php echo gen_single_selectbox("","select3",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['select3'],''); ?> <a href="counsel_open.php?item=select3&inum=2&itemname=선택형3" target="_blank" class="btn_frmline win_scrap">선택형 3 항목수정</a> <?php echo ($csconfig['select3'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">선택형 추가4</label></th>
            <td><?php echo gen_single_selectbox("","select4",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['select4'],''); ?> <a href="counsel_open.php?item=select4&inum=2&itemname=선택형4" target="_blank" class="btn_frmline win_scrap">선택형 4 항목수정</a> <?php echo ($csconfig['select4'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">선택형 추가5</label></th>
            <td><?php echo gen_single_selectbox("","select5",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['select5'],''); ?> <a href="counsel_open.php?item=select5&inum=2&itemname=선택형5" target="_blank" class="btn_frmline win_scrap">선택형 5 항목수정</a> <?php echo ($csconfig['select5'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">라디오박스형 추가1</label></th>
            <td><?php echo gen_single_selectbox("","radio1",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['radio1'],''); ?> <a href="counsel_open.php?item=radio1&inum=3&itemname=라디오박스형1" target="_blank" class="btn_frmline win_scrap">라디오박스형 1 항목수정</a> <?php echo ($csconfig['radio1'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">라디오박스형 추가2</label></th>
            <td><?php echo gen_single_selectbox("","radio2",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['radio2'],''); ?> <a href="counsel_open.php?item=radio2&inum=3&itemname=라디오박스형2" target="_blank" class="btn_frmline win_scrap">라디오박스형 2 항목수정</a> <?php echo ($csconfig['radio2'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">라디오박스형 추가3</label></th>
            <td><?php echo gen_single_selectbox("","radio3",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['radio3'],''); ?> <a href="counsel_open.php?item=radio3&inum=3&itemname=라디오박스형3" target="_blank" class="btn_frmline win_scrap">라디오박스형 3 항목수정</a> <?php echo ($csconfig['radio3'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">라디오박스형 추가4</label></th>
            <td><?php echo gen_single_selectbox("","radio4",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['radio4'],''); ?> <a href="counsel_open.php?item=radio4&inum=3&itemname=라디오박스형4" target="_blank" class="btn_frmline win_scrap">라디오박스형 4 항목수정</a> <?php echo ($csconfig['radio4'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">라디오박스형 추가5</label></th>
            <td><?php echo gen_single_selectbox("","radio5",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['radio5'],''); ?> <a href="counsel_open.php?item=radio5&inum=3&itemname=라디오박스형5" target="_blank" class="btn_frmline win_scrap">라디오박스형 5 항목수정</a> <?php echo ($csconfig['radio5'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">체크박스형 추가1</label></th>
            <td><?php echo gen_single_selectbox("","check1",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['check1'],''); ?> <a href="counsel_open.php?item=check1&inum=4&itemname=체크박스형1" target="_blank" class="btn_frmline win_scrap">체크박스형 1 항목수정</a> <?php echo ($csconfig['check1'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">체크박스형 추가2</label></th>
            <td><?php echo gen_single_selectbox("","check2",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['check2'],''); ?> <a href="counsel_open.php?item=check2&inum=4&itemname=체크박스형2" target="_blank" class="btn_frmline win_scrap">체크박스형 2 항목수정</a> <?php echo ($csconfig['check2'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">체크박스형 추가3</label></th>
            <td><?php echo gen_single_selectbox("","check3",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['check3'],''); ?> <a href="counsel_open.php?item=check3&inum=4&itemname=체크박스형3" target="_blank" class="btn_frmline win_scrap">체크박스형 3 항목수정</a> <?php echo ($csconfig['check3'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">체크박스형 추가4</label></th>
            <td><?php echo gen_single_selectbox("","check4",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['check4'],''); ?> <a href="counsel_open.php?item=check4&inum=4&itemname=체크박스형4" target="_blank" class="btn_frmline win_scrap">체크박스형 4 항목수정</a> <?php echo ($csconfig['check4'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">체크박스형 추가5</label></th>
            <td><?php echo gen_single_selectbox("","check5",   Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['check5'],''); ?> <a href="counsel_open.php?item=check5&inum=4&itemname=체크박스형5" target="_blank" class="btn_frmline win_scrap">체크박스형 5 항목수정</a> <?php echo ($csconfig['check5'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">긴문장입력형 추가1</label></th>
            <td><?php echo gen_single_selectbox("","txt1",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['txt1'],''); ?> <a href="counsel_open.php?item=txt1&inum=5&itemname=긴문장입력형1" target="_blank" class="btn_frmline win_scrap">긴문장입력형 1 항목수정</a> <?php echo ($csconfig['txt1'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">긴문장입력형 추가2</label></th>
            <td><?php echo gen_single_selectbox("","txt2",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['txt2'],''); ?> <a href="counsel_open.php?item=txt2&inum=5&itemname=긴문장입력형2" target="_blank" class="btn_frmline win_scrap">긴문장입력형 2 항목수정</a> <?php echo ($csconfig['txt2'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
		<tr>
            <th scope="row"><label for="bizno">긴문장입력형 추가3</label></th>
            <td><?php echo gen_single_selectbox("","txt3",  Array("선택항목","필수","사용안함"), Array("1","2","0"),$csconfig['txt3'],''); ?> <a href="counsel_open.php?item=txt3&inum=5&itemname=긴문장입력형3" target="_blank" class="btn_frmline win_scrap">긴문장입력형 3 항목수정</a> <?php echo ($csconfig['txt3'])?'<span class="blue">사용</span>':'<span class="red">사용안함</span>';?></td>
        </tr>
        </tbody>
        </table>
    </div>
</section>

<?php echo $frm_submit; ?>

</form>

<script>
function fconfig_check(f)
{

    return true;
}
</script>
<?php
include_once (G5_ADMIN_PATH.'/admin.tail.php');
?>
