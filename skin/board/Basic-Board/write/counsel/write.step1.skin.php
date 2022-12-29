<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<div class="alert alert-info" role="alert">
	<strong><i class="fa fa-exclamation-circle fa-lg"></i> 온라인상담약관 내용에 동의하셔야 온라인상담 하실 수 있습니다.</strong>
</div>

<form  name="fregister" id="fregister" action="<?php echo G5_BBS_URL.'/write.php?bo_table='.$bo_table ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off" class="form" role="form">
	<div class="panel panel-default">
		<div class="panel-heading"><strong><i class="fa fa-file-text-o fa-lg"></i> 온라인상담약관</strong></div>
		<div class="panel-body">
			<textarea class="form-control input-sm" rows="10" readonly><?php echo get_text($boset['stipulation']) ?></textarea>
		</div>
		<div class="panel-footer">
            <label><input type="checkbox" name="agree" value="1" id="agree"> 약관에 동의합니다.</label>
		</div>
	</div>

    <div class="text-center">
        <button type="submit" class="btn btn-color">온라인상담</button>
		<a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn btn-black">취소</a>
    </div>
</form>

<script>
    function fregister_submit(f) {
        if (!f.agree.checked) {
            alert("약관에 동의하셔야 온라인상담 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        return true;
    }
</script>