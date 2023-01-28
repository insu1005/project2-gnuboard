<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit;

include_once(G5_PATH.'/head-sub-1.php');
?>
<script>
    $(function(){
        $(".lnb li").removeClass();
        $(".lnb li").eq(1).addClass('on')
    })
</script>
<section class="sub-common sub1-1">
    <div class="inner">
        <article class="regular company">
                <h2 class="sub-tit">회사 소개</h2>
                <p class="sub-description">정직하게 만들어 맛있는 피자 <strong>(주)오구본가입니다.</strong></p>
                <div class="company-wrap">
                    <div class="company-brand clearfix">
                        <img src="/img/sub-img/brand-model.png" alt="안녕하세요!! 여러분과 함께하는 가성비 피자 오구쌀 피자입니다!">
                        <img src="/img/sub-img/aboutus-logo.png" alt="저희 로고쌀만의 트레이드 마크 항상 오구쌀 피자와 함께하세요!">
                    </div>
                    <div class="company-description">
                        <h3>안녕하세요. <strong>(주)오구본가입니다.</strong></h3>
                        <strong>오구피자 체인본사 임직원은 오랜 기간 동안 실무 경영 및 개발 노하우를 바탕으로 오구피자만의 
                            <br><strong>독특한 도우를 만들어(쌀과 보리, 조, 검은깨, 밀 등 으로 만든 오곡웰빙 도우)</strong><br>담백하고 고소한 맛과 
                            영양으로 남녀노소 누구나 즐겨 먹을 수 있는 피자를 탄생 시켰습니다.
                        </strong>
                        <em>최소의 비용으로 최고의 가치를 부여한 피자를 만듦으로써 오구피자 점주님께는 고수익율, 
                            고객님께는 저렴한 가격으로 경제적 부담을 줄여 언제나 즐길 수 있는 기회를 드리고 있습니다.
                        </em>
                        <p>항상 초심을 잃지 않는 자세로 고객의 입장에서 생각하고, 끊임없는 개발과 투자로 가맹점주님의 
                            성공을 향한 길잡이가 되도록 최선의 노력을 다하겠습니다.
                        </p>
                    </div>
                    <img src="/img/sub-img/brand-model2.png" alt="이제까지 저희 오구쌀의 성장과정 말씀드립니다!!">
                    <div class="company-detail">    
                        <strong>2006년 5월에 프랜차이즈 설립 후 2011년 5월에 가맹점 500호를 돌파하였습니다.</strong>
                        <em>국산 쌀과 보리, 조, 밀에 검은깨를 첨가한 소위 오곡 웰빙 도우 사용을 표방하고 있으며 <br> 꽤나 다양한 토핑을 고를 수 있고 치즈 크러스트나 고구마 무스 유무를 선택할 수 있는 등 선택의 폭은 괴장히 넓은 편입니다. <br>하지만 저희는 고객여러분들을 위해 저렴한 가격으로 제공하고 있습니다. 일부 메뉴에는 매운 소스를 넣기도 합니다.</em>
                        <p>500점포 돌파와 함께 제2브랜드인 오구 치킨이 발족되었고, 이와 연계되어 치킨+피자 세트도 판매되고 있습니다.<p>
                    </div>
                </div>
        </article>
    </div>
</section>
<?php
include_once(G5_PATH.'/tail-sub-common.php');