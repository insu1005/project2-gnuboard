<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// input의 name을 boset[배열키] 형태로 등록

if($boset['counsel']){

	//게시판 칼럼추가
    sql_query(" ALTER TABLE `{$write_table}`
		ADD `addre` varchar(255) NOT NULL DEFAULT '' AFTER `wr_10` ,
		ADD `tel` varchar(20) NOT NULL DEFAULT '' AFTER `addre` ,
		ADD `hphone` varchar(20) NOT NULL DEFAULT '' AFTER `tel` ,
		ADD `oaddre` varchar(255) NOT NULL DEFAULT '' AFTER `hphone` ,
		ADD `otel` varchar(20) NOT NULL DEFAULT '' AFTER `oaddre` ,
		ADD `fax` varchar(20) NOT NULL DEFAULT '' AFTER `otel` ,
		ADD `ename` varchar(50) NOT NULL DEFAULT '' AFTER `fax` ,
		ADD `sex` char(1) DEFAULT '2' AFTER `ename` ,
		ADD `birth` varchar(20) NOT NULL DEFAULT '' AFTER `sex` ,
		ADD `merry` varchar(10) NOT NULL DEFAULT '' AFTER `birth` ,
		ADD `grade` varchar(20) NOT NULL DEFAULT '' AFTER `merry` ,
		ADD `bizno` varchar(15) NOT NULL DEFAULT '' AFTER `grade` ,
		ADD `job` varchar(30) NOT NULL DEFAULT '' AFTER `bizno` ,
		ADD `duty` varchar(30) NOT NULL DEFAULT '' AFTER `job` ,
		ADD `likes` varchar(50) NOT NULL DEFAULT '' AFTER `duty` ,
		ADD `emailok` char(1) DEFAULT '0' AFTER `likes` ,
		ADD `rcid` varchar(20) NOT NULL DEFAULT '' AFTER `emailok` ,
		ADD `input1` varchar(100) NOT NULL DEFAULT '' AFTER `rcid` ,
		ADD `input2` varchar(100) NOT NULL DEFAULT '' AFTER `input1` ,
		ADD `input3` varchar(100) NOT NULL DEFAULT '' AFTER `input2` ,
		ADD `input4` varchar(100) NOT NULL DEFAULT '' AFTER `input3` ,
		ADD `input5` varchar(100) NOT NULL DEFAULT '' AFTER `input4` ,
		ADD `select1` varchar(100) NOT NULL DEFAULT '' AFTER `input5` ,
		ADD `select2` varchar(100) NOT NULL DEFAULT '' AFTER `select1` ,
		ADD `select3` varchar(100) NOT NULL DEFAULT '' AFTER `select2` ,
		ADD `select4` varchar(100) NOT NULL DEFAULT '' AFTER `select3` ,
		ADD `select5` varchar(100) NOT NULL DEFAULT '' AFTER `select4` ,
		ADD `radio1` varchar(100) NOT NULL DEFAULT '' AFTER `select5` ,
		ADD `radio2` varchar(100) NOT NULL DEFAULT '' AFTER `radio1` ,
		ADD `radio3` varchar(100) NOT NULL DEFAULT '' AFTER `radio2` ,
		ADD `radio4` varchar(100) NOT NULL DEFAULT '' AFTER `radio3` ,
		ADD `radio5` varchar(100) NOT NULL DEFAULT '' AFTER `radio4` ,
		ADD `check1` varchar(100) NOT NULL DEFAULT '' AFTER `radio5` ,
		ADD `check2` varchar(100) NOT NULL DEFAULT '' AFTER `check1` ,
		ADD `check3` varchar(100) NOT NULL DEFAULT '' AFTER `check2` ,
		ADD `check4` varchar(100) NOT NULL DEFAULT '' AFTER `check3` ,
		ADD `check5` varchar(100) NOT NULL DEFAULT '' AFTER `check4` ,
		ADD `txt1` text NOT NULL AFTER `check5` ,
		ADD `txt2` text NOT NULL AFTER `txt1` ,
		ADD `txt3` text NOT NULL AFTER `txt2` ,
		ADD `effect` tinyint(4) NOT NULL DEFAULT '0' AFTER `txt3` ", false);

	$sql = " CREATE TABLE IF NOT EXISTS {$g5['counsel_opt_table']} (
			  `num` int(11) NOT NULL AUTO_INCREMENT,
			  `sex` char(1) DEFAULT '2',
			  `addre` char(1) DEFAULT '2',
			  `tel` char(1) DEFAULT '2',
			  `oaddre` char(1) DEFAULT '1',
			  `otel` char(1) DEFAULT '1',
			  `hphone` char(1) DEFAULT '1',
			  `fax` char(1) DEFAULT '1',
			  `ename` char(1) DEFAULT '1',
			  `birth` char(1) DEFAULT '1',
			  `merry` char(1) DEFAULT '1',
			  `grade` char(1) DEFAULT '1',
			  `bizno` char(1) DEFAULT '1',
			  `job` char(1) DEFAULT '1',
			  `duty` char(1) DEFAULT '1',
			  `likes` char(1) DEFAULT '1',
			  `emailok` char(1) DEFAULT '1',
			  `rcid` char(1) DEFAULT '1',
			  `input1` char(1) DEFAULT '0',
			  `input2` char(1) DEFAULT '0',
			  `input3` char(1) DEFAULT '0',
			  `input4` char(1) DEFAULT '0',
			  `input5` char(1) DEFAULT '0',
			  `select1` char(1) DEFAULT '0',
			  `select2` char(1) DEFAULT '0',
			  `select3` char(1) DEFAULT '0',
			  `select4` char(1) DEFAULT '0',
			  `select5` char(1) DEFAULT '0',
			  `radio1` char(1) DEFAULT '0',
			  `radio2` char(1) DEFAULT '0',
			  `radio3` char(1) DEFAULT '0',
			  `radio4` char(1) DEFAULT '0',
			  `radio5` char(1) DEFAULT '0',
			  `check1` char(1) DEFAULT '0',
			  `check2` char(1) DEFAULT '0',
			  `check3` char(1) DEFAULT '0',
			  `check4` char(1) DEFAULT '0',
			  `check5` char(1) DEFAULT '0',
			  `txt1` char(1) DEFAULT '0',
			  `txt2` char(1) DEFAULT '0',
			  `txt3` char(1) DEFAULT '0',
			  PRIMARY KEY (`num`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";
	sql_query($sql, false);

	$sql = " INSERT INTO {$g5['counsel_opt_table']} set num='1', sex='1', addre='2', tel='2', oaddre='1', otel='1', hphone='1', fax='1',
			ename='1', birth='1', merry='1', grade='1', bizno='1', job='1', duty='1', likes='1', emailok='1', rcid='1',
			input1='1', input2='0', input3='0', input4='0', input5='0', select1='1', select2='0', select3='0', select4='0', select5='0',
			radio1='1', radio2='0', radio3='0', radio4='0', radio5='0', check1='1', check2='0', check3='0', check4='0', check5='0',
			txt1='1', txt2='0', txt3='0'";
    sql_query($sql, false);

	$sql = " CREATE TABLE IF NOT EXISTS {$g5['counsel_item_table']} (
			  `num` int(11) NOT NULL AUTO_INCREMENT,
			  `mno` int(11) NOT NULL DEFAULT '0',
			  `icode` varchar(10) DEFAULT NULL,
			  `iname` varchar(50) DEFAULT NULL,
			  `size` char(3) DEFAULT NULL,
			  `size2` char(3) DEFAULT NULL,
			  `type` char(2) DEFAULT NULL,
			  `bigo` varchar(254) DEFAULT NULL,
			  `it1` varchar(50) DEFAULT NULL,
			  `it2` varchar(50) DEFAULT NULL,
			  `it3` varchar(50) DEFAULT NULL,
			  `it4` varchar(50) DEFAULT NULL,
			  `it5` varchar(50) DEFAULT NULL,
			  `it6` varchar(50) DEFAULT NULL,
			  `it7` varchar(50) DEFAULT NULL,
			  `it8` varchar(50) DEFAULT NULL,
			  `it9` varchar(50) DEFAULT NULL,
			  `it10` varchar(50) DEFAULT NULL,
			  `it11` varchar(50) DEFAULT NULL,
			  `it12` varchar(50) DEFAULT NULL,
			  `it13` varchar(50) DEFAULT NULL,
			  `it14` varchar(50) DEFAULT NULL,
			  `it15` varchar(50) DEFAULT NULL,
			  `it16` varchar(50) DEFAULT NULL,
			  `it17` varchar(50) DEFAULT NULL,
			  `it18` varchar(50) DEFAULT NULL,
			  `it19` varchar(50) DEFAULT NULL,
			  `it20` varchar(50) DEFAULT NULL,
			  `it21` varchar(50) DEFAULT NULL,
			  `it22` varchar(50) DEFAULT NULL,
			  `it23` varchar(50) DEFAULT NULL,
			  `it24` varchar(50) DEFAULT NULL,
			  `it25` varchar(50) DEFAULT NULL,
			  `it26` varchar(50) DEFAULT NULL,
			  `it27` varchar(50) DEFAULT NULL,
			  `it28` varchar(50) DEFAULT NULL,
			  `it29` varchar(50) DEFAULT NULL,
			  `it30` varchar(50) DEFAULT NULL,
			  PRIMARY KEY (`num`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";
	sql_query($sql, false);

	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '1', mno = '1', icode = 'ename', iname = '영문이름', size = '6', type = '11' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '2', mno = '2', icode = 'tel', iname = '전화번호', size = '3', type = '12' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '3', mno = '3', icode = 'hphone', iname = '휴대폰번호', size = '3', type = '14' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '4', mno = '4', icode = 'addre', iname = '주소', size = '6', type = '17' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '5', mno = '5', icode = 'otel', iname = '직장전화번호', size = '3', type = '13' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '6', mno = '6', icode = 'fax', iname = 'FAX', size = '3', type = '19' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '7', mno = '7', icode = 'oaddre', iname = '직장주소', size = '6', type = '18' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '8', mno = '8', icode = 'bizno', iname = '사업자등록번호', size = '6', type = '16' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '9', mno = '9', icode = 'rcid', iname = '추천인아이디', size = '3', type = '15' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '10', mno = '10', icode = 'grade', iname = '최종학력', size = '2', type = '2', it1 = '학력1', it2 = '학력2', it3 = '학력3' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '11', mno = '11', icode = 'job', iname = '직업', size = '2', type = '2', it1 = '직업1', it2 = '직업2', it3 = '직업3' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '12', mno = '12', icode = 'duty', iname = '직종', size = '2', type = '2', it1 = '직종1', it2 = '직종2', it3 = '직종3' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '13', mno = '13', icode = 'likes', iname = '관심영역', size = '2', type = '2', it1 = '관심영역1', it2 = '관심영역2', it3 = '관심영역3' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '14', mno = '14', icode = 'birth', iname = '생년월일', size = '6', type = '21' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '15', mno = '15', icode = 'emailok', iname = '메일수신여부', size = '6', type = '41' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '16', mno = '16', icode = 'merry', iname = '결혼여부', size = '6', type = '32' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '17', mno = '17', icode = 'sex', iname = '성별', size = '6', type = '31' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '18', mno = '18', icode = 'input1', iname = '입력형1', size = '6', type = '1' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '23', mno = '23', icode = 'select1', iname = '선택형1', size = '2', type = '2', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '28', mno = '28', icode = 'radio1', iname = '라디오박스형1', size = '10', type = '3', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '33', mno = '33', icode = 'check1', iname = '체크박스형1', size = '10', type = '4', it1 = '옵션1', it2 = '옵션2', it3 = '옵션3' ", false);
	sql_query(" INSERT INTO {$g5['counsel_item_table']} set num = '38', mno = '38', icode = 'txt1', iname = '긴문장입력형1', size = '10', size2 = '5', type = '5' ", false);

}else{

	sql_query(" ALTER TABLE `{$write_table}`
		DROP `addre`, DROP `tel`, DROP `hphone`, DROP `oaddre`, DROP `otel`, DROP `fax`,
		DROP `ename`, DROP `sex`, DROP `birth`, DROP `merry`, DROP `grade`, DROP `bizno`,
		DROP `job`, DROP `duty`, DROP `likes`, DROP `emailok`, DROP `rcid` ,
		DROP `input1`, DROP `input2`, DROP `input3`, DROP `input4`, DROP `input5` ,
		DROP `select1`, DROP `select2`, DROP `select3`, DROP `select4`, DROP `select5` ,
		DROP `radio1`, DROP `radio2`, DROP `radio3`, DROP `radio4`, DROP `radio5` ,
		DROP `check1`, DROP `check2`, DROP `check3`, DROP `check4`, DROP `check5`,
		DROP `txt1`, DROP `txt2`, DROP `txt3`, DROP `effect` ", false);
	sql_query(" DROP TABLE IF EXISTS {$g5['counsel_opt_table']} ", false);
	sql_query(" DROP TABLE IF EXISTS {$g5['counsel_item_table']} ", false);

}

?>

<table>
<caption>쓰기설정</caption>
<colgroup>
	<col class="grid_2">
	<col>
</colgroup>
<thead>
<tr>
	<th scope="col">구분</th>
	<th scope="col">설정</th>
</tr>
</thead>
<tbody>
<tr>
	<td align="center">온라인상담 설치</td>
	<td>
		<select name="boset[counsel]">
			<option value=""<?php echo get_selected('', $boset['counsel']);?>>삭제</option>
			<option value="1"<?php echo get_selected('1', $boset['counsel']);?>>설치</option>
		</select>
	</td>
</tr>
<tr>
	<td align="center">스타일</td>
	<td>
		<select name="boset[txt_style]">
			<option value=""<?php echo get_selected('', $boset['txt_style']);?>>Style01</option>
			<option value="1"<?php echo get_selected('1', $boset['txt_style']);?>>Style02</option>
		</select>
	</td>
</tr>
<tr>
	<td align="center">타이틀폰트크기</td>
	<td>
		<select name="boset[font_size]">
			<option value="font-12"<?php echo get_selected('font-12', $boset['font_size']);?>>12px</option>
			<option value="font-13"<?php echo get_selected('font-13', $boset['font_size']);?>>13px</option>
			<option value="font-14"<?php echo get_selected('font-14', $boset['font_size']);?>>14px</option>
			<option value="font-16"<?php echo get_selected('font-16', $boset['font_size']);?>>16px</option>
			<option value="font-18"<?php echo get_selected('font-18', $boset['font_size']);?>>18px</option>
		</select>
	</td>
</tr>
<tr>
	<td align="center">에디터</td>
	<td>
		<select name="boset[txt_editor]">
			<option value=""<?php echo get_selected('', $boset['txt_editor']);?>>미사용</option>
			<option value="1"<?php echo get_selected('1', $boset['txt_editor']);?>>사용</option>
		</select> 긴문장입력형 에디터사용유무설정
	</td>
</tr>
<tr>
	<td align="center">약관사용</td>
	<td>
		<select name="boset[agree]">
			<option value=""<?php echo get_selected('', $boset['agree']);?>>미사용</option>
			<option value="1"<?php echo get_selected('1', $boset['agree']);?>>사용(분리)</option>
			<option value="2"<?php echo get_selected('2', $boset['agree']);?>>사용(통합)</option>
		</select>
	</td>
</tr>
<tr>
	<td align="center">약관내용</td>
	<td>
		<textarea name="boset[stipulation]" id="boset[stipulation]" rows="10"><?php echo $boset['stipulation'] ?></textarea>
	</td>
</tr>
<tr>
	<td align="center">제목</td>
	<td>
		<select name="boset[subject]">
			<option value=""<?php echo get_selected('', $boset['subject']);?>>미사용</option>
			<option value="1"<?php echo get_selected('1', $boset['subject']);?>>사용</option>
		</select>
	</td>
</tr>
<tr>
	<td align="center">포토</td>
	<td>
		<select name="boset[photo]">
			<option value=""<?php echo get_selected('', $boset['photo']);?>>미사용</option>
			<option value="1"<?php echo get_selected('1', $boset['photo']);?>>사용</option>
		</select>
	</td>
</tr>
<tr>
	<td align="center">링크</td>
	<td>
		<select name="boset[link]">
			<option value=""<?php echo get_selected('', $boset['link']);?>>미사용</option>
			<option value="1"<?php echo get_selected('1', $boset['link']);?>>사용</option>
		</select> 유튜브, 비메오 등 동영상 공유주소 등록시 해당 동영상은 본문 자동실행
	</td>
</tr>
<tr>
	<td align="center">테그</td>
	<td>
		<select name="boset[use_tag]">
			<option value=""<?php echo get_selected('', $boset['use_tag']);?>>미사용</option>
			<option value="1"<?php echo get_selected('1', $boset['use_tag']);?>>사용</option>
		</select>
	</td>
</tr>
<tr>
	<td align="center">첨부파일</td>
	<td>
		<select name="boset[files]">
			<option value=""<?php echo get_selected('', $boset['files']);?>>미사용</option>
			<option value="1"<?php echo get_selected('1', $boset['files']);?>>사용</option>
		</select>
	</td>
</tr>
<tr>
	<td align="center">CallBack URL</td>
	<td>
		<?php echo help('URL이 없을 경우 쓰기페이지(write.php?bo_table='.$bo_table.')로 이동합니다.');?>
		<input type="text" name="boset[callback_url]" value="<?php echo $boset['callback_url'];?>" size="50" class="frm_input" placeholder="상담신청완료후 이동URL">
	</td>
</tr>
<tr>
	<td align="center">상담완료 메세지</td>
	<td>
		<input type="text" name="boset[okmsg]" value="<?php echo $boset['okmsg'];?>" size="40" class="frm_input" placeholder="정상적으로 접수되었습니다.">
	</td>
</tr>
<tr>
	<td align="center">메일로받기</td>
	<td>
		<label><input type="checkbox" name="boset[remail]" value="1"<?php echo get_checked($boset['remail'], '1');?>> 사용(관리메일로 상담신청내용 받기)</label>
	</td>
</tr>
<tr>
	<td align="center">관리메일</td>
	<td>
		<input type="text" name="boset[admin_email]" value="<?php echo $boset['admin_email'];?>" size="40" class="frm_input" placeholder="통보받을 메일주소를 넣어주세요.">
	</td>
</tr>
</tbody>
</table>
