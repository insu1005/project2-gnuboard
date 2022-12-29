<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$write_skin_url.'/write.css" media="screen">', 0);

if(!$header_skin) {
?>
<div class="well">
	<h2><?php echo $g5['title'] ?></h2>
</div>
<?php } ?>


<?php
if($boset['counsel']){

	if(!$w && $boset['agree']){

		switch($boset['agree']) {
			case '1':
				$w_step = ($_POST['agree'])?"step2":"step1";
				break;
			case '2':
				$w_step = 'step2';
				break;
		}

	}else{

		$w_step = ($w=="r")?"re":"step2";

	}

	include_once($write_skin_path.'/write.'.$w_step.'.skin.php');

}else{

	$str = '<div class="write-btn pull-center">';
	$str .= '<p>추가설정 에서 쓰기스킨 설정후 설치를 진행하세요.</p>';
	if($is_admin) $str .= '<a role="button" href="board.setup.php?bo_table='.$bo_table.'" class="btn btn-'.$btn2.' btn-sm win_memo"><i class="fa fa-cogs"></i><span class="hidden-xs"> 추가설정</span></a>';
	$str .= '</div><div class="clearfix"></div>';

	echo $str;

}
?>
