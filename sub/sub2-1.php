<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit;

include_once(G5_PATH.'/head-sub-2.php');
?>
<script>
    $(function(){
        $(".lnb li").removeClass();
        $(".lnb li").eq(0).addClass('on')
    })
</script>
<section class="sub-common sub1-1">
    <div class="inner">
        <article class="regular brand-sub">
            <h2 class="sub-tit">브랜드 소개</h2>
            <p class="sub-description">항상 여러분과 함께하는 최고의 브랜드!</p>
            <div class="big-box-wrap">
                <div class="box-wrap clearfix">
                    <div class="box-wrap-regular">
                        <h4 class="box-wrap-tit">우리쌀과 보리, 조, 밀,<br> 검은깨로 만든 <strong>웰빙도우피자입니다.</strong></h4>
                        <div class="box-wrap-description">
                            <strong>토핑만큼 도우의 맛이 중요합니다.</strong>
                            <em>오구쌀피자는 쫀득하고 고소한 쌀도우피자입니다.</em>
                            <p>오구쌀피자는 타공팬을 사용한 피자로 기름기가 없고 담백합니다.</p>
                            <p>그래서 건강한 피자입니다.</p>
                        </div>
                    </div>
                </div>
                <div class="box-wrap clearfix">
                    <div class="box-wrap-regular">
                        <h4 class="box-wrap-tit"><strong>100%</strong><em>자연치즈</em>를 사용합니다.</h4>
                        <div class="box-wrap-description">
                            <strong>토핑치즈 - 자연치즈100%</strong>
                            <em>주문 즉시 도우를 손으로 두드리고 펴서</em>
                            <p>신선한 재료를 토핑하여 맛있게 제공합니다.</p>
                            <p>그래서 맛있는 피자입니다.</p>
                        </div>
                    </div>
                    <div class="empty"></div>
                </div>
                <div class="box-wrap clearfix">
                    <div class="box-wrap-regular">
                        <h4 class="box-wrap-tit"><strong>엄선된 토핑과 재료만을 사용하여</strong><br>안심하고 드실 수 있습니다.</h4>
                        <div class="box-wrap-description">
                            <strong>오구쌀피자는 원산지 표시제를 준수합니다.</strong>
                            <em>또한 '맛없는 피자는 만들지도, 고객에게 제공하지도 않는다.'는</em>
                            <p>신념 아래 피자를 만듭니다.</p>
                            <p>그래서 정직한 피자입니다</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <article class="regular identity">
            <h3 class="sub-tit">아이덴티티</h3>
            <p class="sub-description">오구쌀만의 차별성! 막강한 개성!</p>
            <div class="big-box-wrap">
                <figure class="identity-common clearfix">
                    <h4 class="identity-tit">BRAND LOGO</h4>
                    <img src="/img/sub-img/identity-logo.jpg" alt="막강한 유기농 브랜드 오구쌀피자!">
                </figure>
                <figure class="identity-common clearfix">
                    <h4 class="identity-tit">COLOR PALLET</h4>
                    <div class="color clearfix">
                        <p>MAIN COLOR</p>
                        <p>SUB COLOR</p>
                        <p>POINT COLOR</p>
                    </div>
                </figure>
                <p class="identity-description">59피자라는 명칭은 가장 기본적이고 저렴한 콤비네이션 피자가 5,900원인 것에서 유래하였습니다.<br> 
                    광고 카피인 '맛있어서 오구, 생각나서 오구' 역시 여기에서 나왔습니다.</p>
            </div>
        </article>
        <article class="regular interior">
            <h3 class="sub-tit">인테리어</h3>
            <p class="sub-description">오구쌀만의 특별한 장소!</p>
            <div class="big-box-wrap">
                <figure class="interior-wrap">
                    <img src="/img/sub-img/interior.png" alt="오구쌀만의 특별한 장소!">
                    <div class="interior-description">
                        <strong>2006년 처음 시작된 59쌀피자 프랜차이즈가 2011년 현재 오구피자 전국 가맹점 500호점을 돌파했습니다.<br>  
                            오구피자만의 독특한 쌀과 검은깨,  기타 웰빙 재료로 기름기를 없애고 담백한 맛과 영향을 고려하여 남녀노소 누구나<br> 
                            즐길 수 있는 저렴한 가격의 쌀피자로 건강한 맛의 이미지를 보여주고 있습니다.</strong>
                        <em>현대인의 감각에 맞춘 세련된 인테리어와 넓은 실내 공간으로 많은 사람들이 매장에 방문해 음식을 즐길 수 있도록  되어있습니다.<br>
                            20여가지 종류의 피자와 스파게티, 오구치킨이 주요 판매 제품입니다.</em>
                        <p>저가형 피자 가게지만 비교적 세련된 인테리어였습니다. 로고에 사용된 색상이 인테리어에 적절히 조합되어 안정적인 분위기입니다.<br>
                            ‘59'라는 것을 맛있어서 오구, 생각나서 오구라는 문구를 통해 센스있게 표현해 재미를 더 했습니다.<br>
                            또 로고 안에 쌀을 강조하는 이미지를 넣어 재미도 더 하고 오구피자만의 쌀로 만든다라는 특징을 잘 살린 것 같습니다.</p>
                    </div>
                </figure>
            </div>
        </article>
    </div>
</section>
<?php
include_once(G5_PATH.'/tail-sub-common.php');