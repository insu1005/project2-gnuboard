<?
$g5_path = ".."; // 그누보드가 있는 상대경로를 적어줌
?>
<? include_once("customer2.php"); ?>
<script language="javascript">
var char_min = parseInt(<?=$write_min?>); 
var char_max = parseInt(<?=$write_max?>); 
</script>

<style type="text/css">
.form-box{padding:15px 0;background:#3c3c3c;color:#fff;display:table;width:100%;}
.form-box .new-l-con{float:left;width:49%;margin-right:2%;margin-top:17px;}
.form-box .new-l-con .l-s-txt{text-align:right;float:left;font-size:15px;}
.form-box .new-l-con h2{float:left;margin-left:2%;font-size:30px;color:#fff;font-weight:300;}
.form-box .new-l-con .r-number{float:left;margin-left:5%;font-size:36px;line-height:100%;font-weight:bold;color:#f9cc3d;}
.form-box .new-l-con .r-number:before{content:"";background:url("theme/nero28/img/icon4.png") no-repeat;width:32px;height:31px;background-size:100%;    display: inline-block;vertical-align:-1px;margin-right:5px;}
.form-box .new-r-con{float:left;width:49%;}
.form-box .new-r-con .new-t-con{display:table;width:100%;}
.form-box .new-r-con .l-in{float:left;width:calc(100% - 150px);}
.form-box .new-r-con .l-in input{float:left;width:49%;margin-right:2%;border:0;border-bottom:1px solid #fff;height:40px;line-height:40px;background:none;color:#fff;}
.form-box .new-r-con .l-in input:last-child{margin-right:0;}
.form-box .new-r-con .r-btn{float:left;width:130px;margin-left:20px;text-align:center;font-size:16px;background:#f9cc3d;color:#333;border:0;height:40px;line-height:40px;}
.form-box .new-r-con .new-b-con{margin-top:5px;}
.form-box .new-r-con .new-b-con a{padding:5px 10px;background:#777;color:#fff;font-size:11px;margin-top:2px;margin-left:20px;display:inline-block;}
.form-box .new-r-con .l-in ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  color: #fff;
}
.form-box .new-r-con .l-in ::-moz-placeholder { /* Firefox 19+ */
  color: #fff;
}
.form-box .new-r-con .l-in :-ms-input-placeholder { /* IE 10+ */
  color: #fff;
}
.form-box .new-r-con .l-in :-moz-placeholder { /* Firefox 18- */
  color: #fff;
}
@media (max-width: 1085px){
	.form-box .new-l-con{float:none;width:100%;display:table;}
	.form-box .new-r-con{float:none;width:100%;margin-top:30px;display:table;}
	.form-box .new-l-con{text-align:center;}
	.form-box .new-l-con .l-s-txt{display:inline-block;float:none;}
	.form-box .new-l-con h2{display:inline-block;float:none;}
	.form-box .new-l-con .r-number{display:inline-block;float:none;}
	.form-box .new-r-con .new-b-con{margin-top:10px;}
}
@media (max-width: 760px){
	.form-box .new-l-con .l-s-txt{display:inline-block;float:none;font-size:13px;}
	.form-box .new-l-con h2{display:inline-block;float:none;font-size:20px;}
	.form-box .new-l-con .r-number{display:inline-block;float:none;font-size:24px;}
}

</style>
<script type="text/javascript">
function checkFrm(obj) {
if(obj.wr_6.checked == false) {
  alert('개인정보 활동동의에 체크해주세요.');
  obj.wr_6.focus();
  return false;
	
 }

}
</script>
<div class="form-box" >
  <form name=fwrite method=post action="<?=G5_BBS_URL?>/write_update.php" onsubmit="return checkFrm(this);">
		<input type="hidden" name="token" value=<?php echo get_write_token('online') ?>> 
		<input type=hidden name=bo_table value="online">
		<input type=hidden name="wr_7" value="">
		<input type=hidden name="wr_8" value="">
		<input type=hidden name="wr_9" value="">
		<input type=hidden name="wr_name" value="관리자">
		<input type=hidden name="wr_subject" >
		<input type=hidden name="wr_content" value="내용">
		<div class="boxy-warp">
			<div class="form-con">
				<div class="new-l-con">
					<span class="l-s-txt">신송자<br>신마산식당</span>
					<h2>성공창업문의</h2>
					<span class="r-number">1544-1544</span>
				</div>
				<div class="new-r-con">
					<div class="new-t-con">
						<div class="l-in">
							<input type="text" name="wr_subject" placeholder="성함" required itemname="이름"/>
							<input type="text" name="wr_8" maxlength="11" required itemname="연락처"/>
						</div>
						<input name="image" type="submit" value="무료상담신청" alt="무료상담신청" class="r-btn">
					</div>
					<div class="new-b-con">
						<label for="provision-check">
							<input id="provision-check" type="checkbox" name="wr_6" value="6" <?=$write[wr_6]?>/>
							<span>개인정보처리방침을 읽었으며 이에 동의합니다.</span>
						</label>
						<a href="#"  data-toggle="modal" data-target="#modal1">자세히보기</a>
					</div>
				</div>
			</div>
		</div>
  </form>
</div>
<!--//-->
