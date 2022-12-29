<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$view_skin_url.'/view.css" media="screen">', 0);

$attach_list = '';
if ($view['link']) {
	// 링크
	for ($i=1; $i<=count($view['link']); $i++) {
		if ($view['link'][$i]) {
			$attach_list .= '<a class="list-group-item break-word" href="'.$view['link_href'][$i].'" target="_blank">';
			$attach_list .= '<i class="fa fa-link"></i> '.cut_str($view['link'][$i], 70).' &nbsp;<span class="blue">+ '.$view['link_hit'][$i].'</span></a>'.PHP_EOL;
		}
	}
}

// 가변 파일
$j = 0;
if ($view['file']['count']) {
	for ($i=0; $i<count($view['file']); $i++) {
		if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
			if ($board['bo_download_point'] < 0 && $j == 0) {
				if($is_download_free) {
					if($is_download_free == "1") {
						$attach_list .= '<a class="list-group-item"><i class="fa fa-bell red"></i> 무료로 다운로드할 수 있습니다. ('.number_format(abs($board['bo_download_point'])).AS_MP.')</a>'.PHP_EOL;
					} else {
						$attach_list .= '<a class="list-group-item"><i class="fa fa-bell red"></i> '.$is_download_free.' 까지 무료로 다운로드할 수 있습니다. ('.number_format(abs($board['bo_download_point'])).AS_MP.')</a>'.PHP_EOL;
					}
				} else {
					if($is_downterm) {
						$attach_list .= '<a class="list-group-item"><i class="fa fa-bell red"></i> 다운로드시 <b>'.number_format(abs($board['bo_download_point'])).'</b>'.AS_MP.' 차감 ('.number_format($is_downterm).'일 동안 다운로드 이력 유지)</a>'.PHP_EOL;
					} else {
						$attach_list .= '<a class="list-group-item"><i class="fa fa-bell red"></i> 다운로드시 <b>'.number_format(abs($board['bo_download_point'])).'</b>'.AS_MP.' 차감 (최초 1회 / 재다운로드시 무료)</a>'.PHP_EOL;
					}
				}
			}
			$file_tooltip = '';
			if($view['file'][$i]['content']) {
				$file_tooltip = ' data-original-title="'.strip_tags($view['file'][$i]['content']).'" data-toggle="tooltip"';
			}
			$attach_list .= '<a class="list-group-item break-word view_file_download at-tip" href="'.$view['file'][$i]['href'].'"'.$file_tooltip.'>';
			$attach_list .= '<span class="pull-right hidden-xs text-muted"><i class="fa fa-clock-o"></i> '.date("Y.m.d H:i", strtotime($view['file'][$i]['datetime'])).'</span>';
			$attach_list .= '<i class="fa fa-download"></i> '.$view['file'][$i]['source'].' ('.$view['file'][$i]['size'].') &nbsp;<span class="orangered">+ '.$view['file'][$i]['download'].'</span></a>'.PHP_EOL;
			$j++;
		}
	}
}

$view_font = (G5_IS_MOBILE) ? '' : ' font-12';
$view_subject = get_text($view['wr_subject']);

$sql = " select * from {$g5['counsel_item_table']} order by mno ";
$result = sql_query($sql);
?>

<section itemscope itemtype="http://schema.org/NewsArticle">
	<article itemprop="articleBody">
		<h1 itemprop="headline" content="<?php echo $view_subject;?>">
			<?php if($view['photo']) { ?><span class="talker-photo hidden-xs"><?php echo $view['photo'];?></span><?php } ?>
			<?php echo cut_str(get_text($view['wr_subject']), 70); ?>
		</h1>
		<div class="panel panel-default view-head<?php echo ($attach_list) ? '' : ' no-attach';?>">
			<div class="panel-heading">
				<div class="ellipsis text-muted<?php echo $view_font;?>">
					<span itemprop="publisher" content="<?php echo get_text($view['wr_name']);?>">
						<?php echo $view['name']; //등록자 ?>
					</span>
					<?php echo ($is_ip_view) ? '<span class="print-hide hidden-xs">('.$ip.')</span>' : ''; ?>
					<?php if($view['ca_name']) { ?>
						<span class="hidden-xs">
							<span class="sp"></span>
							<i class="fa fa-tag"></i>
							<?php echo $view['ca_name']; //분류 ?>
						</span>
					<?php } ?>
					<span class="sp"></span>
					<i class="fa fa-comment"></i>
					<?php echo ($view['wr_comment']) ? '<b class="red">'.$view['wr_comment'].'</b>' : 0; //댓글수 ?>
					<span class="sp"></span>
					<i class="fa fa-eye"></i>
					<?php echo $view['wr_hit']; //조회수 ?>

					<?php if($is_good) { ?>
						<span class="sp"></span>
						<i class="fa fa-thumbs-up"></i>
						<?php echo $view['wr_good']; //추천수 ?>
					<?php } ?>
					<?php if($is_nogood) { ?>
						<span class="sp"></span>
						<i class="fa fa-thumbs-down"></i>
						<?php echo $view['wr_nogood']; //비추천수 ?>
					<?php } ?>
					<span class="pull-right">
						<i class="fa fa-clock-o"></i>
						<span itemprop="datePublished" content="<?php echo date('Y-m-dTH:i:s', $view['date']);?>">
							<?php echo apms_date($view['date'], 'orangered', 'before'); //시간 ?>
						</span>
					</span>
				</div>
			</div>
		   <?php
				if($attach_list) {
					echo '<div class="list-group'.$view_font.'">'.$attach_list.'</div>'.PHP_EOL;
				}
			?>
		</div>

		<div class="view-padding">


			<table class="table table-bordered">
				<tr>
					<td class="bold active" style="width:150px">결과</td>
					<td class="<?php echo ($view['effect'])?'blue':'red'; ?>"><?php echo ($view['effect'])?'접수완료':'접수중'; ?></td>
				</tr>
				<tr>
					<td class="bold active" style="width:150px">이름</td>
					<td><?php echo $view['name']; //등록자 ?></td>
				</tr>
				<tr>
					<td class="bold active" style="width:150px">E-mail</td>
					<td><?php echo $view['wr_email']; //등록자 ?></td>
				</tr>
				<?php if ($view['wr_homepage']) { ?>
				<tr>
					<td class="bold active" style="width:150px">홈페이지</td>
					<td><?php echo $view['wr_homepage']; //등록자 ?></td>
				</tr>
				<?php } ?>
				<?php
				$mdatas = Array() ;
				for ($i=0; $row=sql_fetch_array($result); $i++) {

					$fvs=$row[icode];

					$mdatas[$fvs][icode]=trim($row[icode]);
					$mdatas[$fvs][iname]=trim(stripslashes($row[iname]));
					$mdatas[$fvs][size]=trim($row[size]);
					$mdatas[$fvs][size2]=trim($row[size2]);
					$mdatas[$fvs][editor]=trim($row[editor]);
					$mdatas[$fvs][bigo]=trim(stripslashes($row[bigo]));
					$mdatas[$fvs][type]=$row[type];
					$mdatas[$fvs][1]=trim(stripslashes($row[it1]));
					$mdatas[$fvs][2]=trim(stripslashes($row[it2]));
					$mdatas[$fvs][3]=trim(stripslashes($row[it3]));
					$mdatas[$fvs][4]=trim(stripslashes($row[it4]));
					$mdatas[$fvs][5]=trim(stripslashes($row[it5]));
					$mdatas[$fvs][6]=trim(stripslashes($row[it6]));
					$mdatas[$fvs][7]=trim(stripslashes($row[it7]));
					$mdatas[$fvs][8]=trim(stripslashes($row[it8]));
					$mdatas[$fvs][9]=trim(stripslashes($row[it9]));
					$mdatas[$fvs][10]=trim(stripslashes($row[it10]));
					$mdatas[$fvs][11]=trim(stripslashes($row[it11]));
					$mdatas[$fvs][12]=trim(stripslashes($row[it12]));
					$mdatas[$fvs][13]=trim(stripslashes($row[it13]));
					$mdatas[$fvs][14]=trim(stripslashes($row[it14]));
					$mdatas[$fvs][15]=trim(stripslashes($row[it15]));
					$mdatas[$fvs][16]=trim(stripslashes($row[it16]));
					$mdatas[$fvs][17]=trim(stripslashes($row[it17]));
					$mdatas[$fvs][18]=trim(stripslashes($row[it18]));
					$mdatas[$fvs][19]=trim(stripslashes($row[it19]));
					$mdatas[$fvs][20]=trim(stripslashes($row[it20]));
					$mdatas[$fvs][21]=trim(stripslashes($row[it21]));
					$mdatas[$fvs][22]=trim(stripslashes($row[it22]));
					$mdatas[$fvs][23]=trim(stripslashes($row[it23]));
					$mdatas[$fvs][24]=trim(stripslashes($row[it24]));
					$mdatas[$fvs][25]=trim(stripslashes($row[it25]));
					$mdatas[$fvs][26]=trim(stripslashes($row[it26]));
					$mdatas[$fvs][27]=trim(stripslashes($row[it27]));
					$mdatas[$fvs][28]=trim(stripslashes($row[it28]));
					$mdatas[$fvs][29]=trim(stripslashes($row[it29]));
					$mdatas[$fvs][30]=trim(stripslashes($row[it30]));

					switch($row[type]){
						case '1': //입력형
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '11': //영문이름
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '12': // 전화번호
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '13': // 직장전화번호
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '14': // 휴대폰번호
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '15'://추천인
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '16': //사업자번호
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '17': //주소
							if($csconfig[$fvs]!='0'){

							$addr_array = explode("|", $view['addre']);
							$view['zip']			= $addr_array[0];
							$view['addre1']		= $addr_array[1];
							$view['addre2']		= $addr_array[2];
							$view['addre3']		= $addr_array[3];
							$view['addre_jibeon']	= $addr_array[4];

							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>['.$view['zip'].'] '.$view['addre1'].''.$view['addre2'].''.$view['addre3'].''.$view['addre_jibeon'].'</td>
							</tr>';
						} break;

						case '18': //직장주소
							if($csconfig[$fvs]!='0'){

							$addr_array = explode("|", $view['oaddre']);
							$view['ozip']			= $addr_array[0];
							$view['oaddre1']		= $addr_array[1];
							$view['oaddre2']		= $addr_array[2];
							$view['oaddre3']		= $addr_array[3];
							$view['oaddre_jibeon']	= $addr_array[4];

							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>['.$view['ozip'].'] '.$view['oaddre1'].''.$view['oaddre2'].''.$view['oaddre3'].''.$view['oaddre_jibeon'].'</td>
							</tr>';
						} break;

						case '19': //FAX
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '2': //텍스트
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '21': //생년월일
							if($csconfig[$fvs]!='0'){

							$ymd_array = explode("-", $view['birth']);
							$view['year']	= $ymd_array[0];
							$view['month']	= $ymd_array[1];
							$view['day']	= $ymd_array[2];

							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view['year'].'년 '.$view['month'].'월 '.$view['day'].'일</td>
							</tr>';
						} break;

						case '3': //라디오
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '31': //성별
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '32': //결혼여부
							if($csconfig[$fvs]!='0'){
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$view[$fvs].'</td>
							</tr>';
						} break;

						case '4'://체크박스
							if($csconfig[$fvs]!='0'){

							$Arrays=optArray($fvs,$mdatas);

							$view[$fvs] = explode("|", $view[$fvs]);

							$check_item = "";
							for( $i = 0; $i < count( $Arrays ); $i++ ){
								if ( $Arrays[$i] == $view[$fvs][$i] ){
									$check_item .= '<code>' . $Arrays[$i] .'</code>&nbsp;&nbsp;';
								} else {
									$check_item .= $Arrays[$i].'&nbsp;&nbsp;';
								}
							}
							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$check_item.'</td>
							</tr>';
						} break;

						case '41': //메일수신여부
							if($csconfig[$fvs]!='0'){
							$emailcheck = ($view[$fvs]=='1')?'메일수신동의':'메일수신동의하지 않음';

							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.$emailcheck.'</td>
							</tr>';
						} break;

						case '5': //긴분장
							if($csconfig[$fvs]!='0'){

							$view[$fvs] = conv_content($view[$fvs], 2);

							echo '<tr>
								<td class="bold active">'.$mdatas[$fvs][iname].'</td>
								<td>'.get_view_thumbnail($view[$fvs]).'</td>
							</tr>';
						} break;

					}// end switch
					unset($needstr);
				}
				?>
			</table>


		</div>

		<div class="view-padding">

			<?php if ($is_torrent) echo apms_addon('torrent-basic'); // 토렌트 파일정보 ?>

			<?php
				// 이미지 상단 출력
				$v_img_count = count($view['file']);
				if($v_img_count && $is_img_head) {
					echo '<div class="view-img">'.PHP_EOL;
					for ($i=0; $i<=count($view['file']); $i++) {
						if ($view['file'][$i]['view']) {
							echo get_view_thumbnail($view['file'][$i]['view']);
						}
					}
					echo '</div>'.PHP_EOL;
				}
			 ?>

			<div itemprop="description" class="view-content">
				<?php echo get_view_thumbnail($view['content']); ?>
			</div>

			<?php
				// 이미지 하단 출력
				if($v_img_count && $is_img_tail) {
					echo '<div class="view-img">'.PHP_EOL;
					for ($i=0; $i<=count($view['file']); $i++) {
						if ($view['file'][$i]['view']) {
							echo get_view_thumbnail($view['file'][$i]['view']);
						}
					}
					echo '</div>'.PHP_EOL;
				}
			?>
		</div>

		<?php //설문
			if($view['as_extra'] == "2") {
				include_once($view_skin_path.'/view.poll.skin.php');
			}
		?>

		<?php if ($good_href || $nogood_href) { ?>
			<div class="print-hide view-good-box">
				<?php if ($good_href) { ?>
					<span class="view-good">
						<a href="#" onclick="apms_good('<?php echo $bo_table;?>', '<?php echo $wr_id;?>', 'good', 'wr_good'); return false;">
							<b id="wr_good"><?php echo $view['wr_good']; ?></b>
							<br>
							<i class="fa fa-thumbs-up"></i>
						</a>
					</span>
				<?php } ?>
				<?php if ($nogood_href) { ?>
					<span class="view-nogood">
						<a href="#" onclick="apms_good('<?php echo $bo_table;?>', '<?php echo $wr_id;?>', 'nogood', 'wr_nogood'); return false;">
							<b id="wr_nogood"><?php echo $view['wr_nogood']; ?></b>
							<br>
							<i class="fa fa-thumbs-down"></i>
						</a>
					</span>
				<?php } ?>
			</div>
			<p></p>
		<?php } else { //여백주기 ?>
			<div class="h40"></div>
		<?php } ?>

		<?php if($is_jump_btn) { //상위노출 버튼 ?>
			<div class="text-center" style="margin:15px 0px;">
				<a href="<?php echo $board_skin_url;?>/run.jump.php?bo_table=<?php echo $bo_table;?>&amp;wr_id=<?php echo $wr_id;?><?php echo $modal_query;?>" class="btn btn-sm btn-black">
					상위노출하기(<?php echo number_format($boset['jpp']);?><?php echo AS_MP;?>/일)
				</a>
				<?php if($view['wr_7'] && $view['wr_7'] >= G5_SERVER_TIME) { ?>
					<p style="margin-top:12px;">
						<?php echo date("Y년 m월 d일 H시 i분", $view['wr_7']);?> 종료
					</p>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if ($is_tag) { // 태그 ?>
			<p class="view-tag view-padding<?php echo $view_font;?>"><i class="fa fa-tags"></i> <?php echo $tag_list;?></p>
		<?php } ?>

		<div class="print-hide view-icon view-padding">
			<?php
				// SNS 보내기
				if ($board['bo_use_sns']) {
					echo apms_sns_share_icon('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], $view['subject'], $seometa['img']['src']);
				}
			?>
			<span class="pull-right">
				<img src="<?php echo G5_IMG_URL;?>/sns/print.png" alt="프린트" class="cursor at-tip" onclick="apms_print();" data-original-title="프린트" data-toggle="tooltip">
				<?php if ($scrap_href) { ?>
					<img src="<?php echo G5_IMG_URL;?>/sns/scrap.png" alt="스크랩" class="cursor at-tip" onclick="win_scrap('<?php echo $scrap_href;  ?>');" data-original-title="스크랩" data-toggle="tooltip">
				<?php } ?>
				<?php if ($is_shingo) { ?>
					<img src="<?php echo G5_IMG_URL;?>/sns/shingo.png" alt="신고" class="cursor at-tip" onclick="apms_shingo('<?php echo $bo_table;?>', '<?php echo $wr_id;?>');" data-original-title="신고" data-toggle="tooltip">
				<?php } ?>
				<?php if ($is_admin) { ?>
					<?php if ($view['is_lock']) { // 글이 잠긴상태이면 ?>
						<img src="<?php echo G5_IMG_URL;?>/sns/unlock.png" alt="해제" class="cursor at-tip" onclick="apms_shingo('<?php echo $bo_table;?>', '<?php echo $wr_id;?>', 'unlock');" data-original-title="해제" data-toggle="tooltip">
					<?php } else { ?>
						<img src="<?php echo G5_IMG_URL;?>/sns/lock.png" alt="잠금" class="cursor at-tip" onclick="apms_shingo('<?php echo $bo_table;?>', '<?php echo $wr_id;?>', 'lock');" data-original-title="잠금" data-toggle="tooltip">
					<?php } ?>
				<?php } ?>
			</span>
			<div class="clearfix"></div>
		</div>

		<?php if($is_signature) { // 서명 ?>
			<div class="print-hide">
				<?php echo apms_addon('sign-basic'); // 회원서명 ?>
			</div>
		<?php } else { ?>
			<div class="view-author-none"></div>
		<?php } ?>

	</article>
</section>

<?php include_once('./view_comment.php'); ?>
