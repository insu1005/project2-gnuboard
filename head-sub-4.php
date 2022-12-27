<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

run_event('pre_head');

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- stylesheet -s -->
<link rel="stylesheet" href="/css/common.css">
<link rel="stylesheet" href="/css/sub-common.css">
<link rel="stylesheet" href="/css/sub4-1.css">
<!-- stylesheet -e -->
<!-- 상단 시작 { -->
    <header class="header">
        <div class="inner">
        <h1 class="logo"><a href="/">오구쌀피자</a></h1>
        <nav class="gnb">
            <h2 class="hidden">메인메뉴</h2>
            <ul>
                <li class="depth1">
                    <a href="/sub/sub1-1.php">브랜드</a>
                    <ul class="depth2">
                        <li><a href="/sub/sub1-1.php">브랜드 소개</a></li>
                        <li><a href="/sub/sub1-2.php">회사소개</a></li>
                        <li><a href="/sub/sub1-3.php">오시는 길</a></li>
                    </ul>
                </li>
                <li class="depth1">
                    <a href="/sub/sub2-1.php">메뉴</a>
                    <ul class="depth2">
                        <li><a href="/sub/sub2-1.php">신메뉴</a></li>
                        <li><a href="#">반미터 피자</a></li>
                        <li><a href="#">클래식 쌀피자</a></li>
                        <li><a href="#">프리미엄 쌀피자</a></li>
                        <li><a href="#">세트/사이드</a></li>
                    </ul>
                </li>
                <li class="depth1">
                    <a href="/sub/sub3-1.php">매장찾기</a>
                    <ul class="depth2">
                        <li><a href="/sub/sub3-1.php">신규오픈</a></li>
                        <li><a href="#">매장찾기</a></li>
                        <li><a href="#">우수매장</a></li>
                    </ul>
                </li>
                <li class="depth1">
                    <a href="/sub/sub4-1.php">창업</a>
                    <ul class="depth2">
                        <li><a href="/sub/sub4-1.php">브랜드 경쟁력</a></li>
                        <li><a href="#">성공 스토리</a></li>
                        <li><a href="#">창업 및 비용</a></li>
                        <li><a href="#">가맹문의</a></li>
                    </ul>
                </li>
                <li class="depth1">
                    <a href="/sub/sub5-1.php">커뮤니티</a>
                    <ul class="depth2">
                        <li><a href="/sub/sub5-1.php">이벤트</a></li>
                        <li><a href="http://insu1006.dothome.co.kr/bbs/board.php?bo_table=notice">공지사항</a></li>
                        <li><a href="#">MEDIA</a></li>
                        <li><a href="#">고객의 소리</a></li>
                        <li><a href="#">점주게시판</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <nav class="tnb">
            <ul class="hd_login">        
                <?php if ($is_member) {  ?>
                <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                <?php if ($is_admin) {  ?>
                <li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
                <?php }  ?>
                <?php } else {  ?>
                <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
                <?php }  ?>
            </ul>
        </nav>
    </div>
    </header>
<!-- } 상단 끝 -->

<!-- 콘텐츠 시작 { -->
    <main>
    <div class="visual">
            <div class="inner">창업</div>
        </div>
        <div class="lnb">
            <div class="inner">
                   <ul class="lnb-list">
                      <li class="on"><a href="/sub/sub4-1.php">브랜드 경쟁력</a></li>
                      <li><a href="/sub/sub1-2.php">성공 스토리</a></li>
                      <li><a href="/sub/sub1-3.php">창업 및 비용</a></li>
                      <li><a href="/sub/sub1-3.php">가맹문의</a></li>
                   </ul>
            </div>
        </div>