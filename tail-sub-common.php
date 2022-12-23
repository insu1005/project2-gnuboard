<?php if (!defined('_GNUBOARD_')) exit; ?>

</main>
<!-- } 콘텐츠 끝 -->

<!-- 하단 시작 { -->
<footer>
    <div class="inner clearfix">
        <h2 class="f-logo">오구쌀피자</h2>
        <ul class="f-menu">
            <li><a href="/sub/sub1-1.php">브랜드소개</a></li>
            <li><a href="/sub/sub1-3.php">오시는길</a></li>
            <li><a href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보처리방침</a></li>
            <li><a href="#">이메일무단수집거부</a></li>
        </ul>
        <div class="f-family">
            <ul class="f-sns">
                <li><a href="https://www.facebook.com/people/59ricepizza/100069717694656/">페이스북</a></li>
                <li><a href="https://www.youtube.com/channel/UCHRimlsItJFENMHU-DewnJA">유튜브</a></li>
                <li><a href="https://blog.naver.com/ogubonga/222930207300">인스타</a></li>
                <li><a href="https://blog.naver.com/ogubonga/222910235967">트위터</a></li>
                <li><a href="https://blog.naver.com/ogubonga">블로그</a></li>
            </ul>
            <div class="franchise">
                <p>가맹문의 1833-7544</p>
                <p>AM 09:00~ PM 06:00 / 주말 및 공휴일 휴무</p>
            </div>
        </div>
        <div class="f-copy">
            <ul class="f-copy-address">
                <li><address>오구쌀피자주소 :인천 부평구 경원대로 1415 가나파라움빌딩 704호</address></li>
                <li>사업자번호 : 130-86-46596 가맹문의 : 1833-7544 FAX : 032-668-5992</li>
            </ul>
            <p>Copyright © 59PIZZA. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) {
     ?>

<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->




<?php
include_once(G5_PATH."/tail.sub.php");