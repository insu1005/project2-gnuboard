<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit;

include_once(G5_PATH.'/head-sub-4.php');
?>
<script>
    $(function(){
        $(".lnb li").removeClass();
        $(".lnb li").eq(2).addClass('on')
    })
</script>
<section class="sub-common sub4-1">
    <div class="inner">
        <article class="regular franchise-cost">
            <h2 class="sub-tit">비용안내</h2>
            <p class="sub-description">오구쌀 피자의 친절한 비용안내입니다</p>
            <div class="franchise-allign">
                <table class="franchise-detail">
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>내역</th>
                            <th>금액</th>
                            <th>비고</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>컨설팅 및 브랜드 사용</th>
                            <td>오구쌀피자 BI사용, 경영노하우 전수, 상권분석 및 상권보호</td>
                            <td>200</td>
                            <td rowspan="4">세부내역참조</td>
                        </tr>
                        <tr>
                            <th>기술지원 및 홍보교육</th>
                            <td>개점 교육 프로그램, 개점 행사 지원, 조리메뉴얼, 슈퍼바이져 정기 방문 및 교육	300</td>
                            <td>300</td>
                        </tr>
                        <tr>
                            <th>주방기기</th>
                            <td>오븐기, 각종냉장고, 도우기계, 작업대 등</td>
                            <td>1,600</td>
                        </tr>
                        <tr>
                            <th>집기비품</th>
                            <td>주방용품, 집기류</td>
                            <td>400</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>합계</th>
                            <td></td>
                            <td>2,500</td>
                            <td><strong>vat 별도</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </article>
        <article class="regular option">
            <h3 class="sub-tit">별도사항</h3>
            <p class="sub-description">오구쌀 피자의 또 다른 별도사항 내역입니다</p>
            <div class="franchise-allign">
                <table class="franchise-detail">
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>항목</th>
                            <th>금액</th>
                            <th>비고</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="5">별도추가사항</th>
                            <td>가스공사(LNG,LPG)</td>
                            <td rowspan="5">매장상황 고려 결정</td>
                            <td rowspan="5">세부내역참조</td>
                        </tr>
                        <tr>
                            <td>전기증설공사</td>
                        </tr>
                        <tr>
                            <td>냉난방기</td>
                        </tr>
                        <tr>
                            <td>인테리어</td>
                        </tr>
                        <tr>
                            <td>간판</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
        <article class="regular detail-cost">
            <h3 class="sub-tit">세부내역</h3>
            <p class="sub-description">오구쌀 피자의 세부적인 내역들을 안내해드립니다</p>
            <div class="franchise-allign">
                <table class="franchise-detail">
                    <thead>
                        <tr>
                            <th>구분</th>
                            <th>항목</th>
                            <th>내용</th>
                            <th>비고</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="11">주방기기</th>
                            <td>오븐기</td>
                            <td>컨베이어가스오븐 1대</td>
                            <td rowspan="11">추가시 별도비용 발생</td>
                        </tr>
                        <tr>
                            <td>피자롤러기</td>
                            <td>1대</td>
                        </tr>
                        <tr>
                            <td>토핑테이블</td>
                            <td>1대</td>
                        </tr>
                        <tr>
                            <td>냉장고(업소용)</td>
                            <td>1대</td>
                        </tr>
                        <tr>
                            <td>도우냉장고</td>
                            <td>2대</td>
                        </tr>
                        <tr>
                            <td>작업선반</td>
                            <td>1식</td>
                        </tr>
                        <tr>
                            <td>작업대(大)</td>
                            <td>1식</td>
                        </tr>
                        <tr>
                            <td>작업대(小)</td>
                            <td>1식</td>
                        </tr>
                        <tr>
                            <td>싱크대</td>
                            <td>1식</td>
                        </tr>
                        <tr>
                            <td>가스렌지</td>
                            <td>1식</td>
                        </tr>
                        <tr>
                            <td>순간온수기</td>
                            <td>1대</td>
                        </tr>
                        <tr>
                            <th>집기비품</th>
                            <td>주방기기</td>
                            <td>타공팬, 도마, 저울 등 주방비품</td>
                            <td rowspan="9">OPEN시 무상지원</td>
                        </tr>
                        <tr>
                            <th rowspan="8">본사지원</th>
                            <td>매장실전교육</td>
                            <td>오픈 전 5일간 교육(점주,점장 가능)</td>
                        </tr>
                        <tr>
                            <td>오픈매장컨설팅지원</td>
                            <td>오픈 후 본사 슈퍼바이저 5일간 지원</td>
                        </tr>
                        <tr>
                            <td>오픈이벤트</td>
                            <td>가렌다아치</td>
                        </tr>
                        <tr>
                            <td>나레이터 홍보</td>
                            <td>나레이션 및 전단 배포</td>
                        </tr>
                        <tr>
                            <td>오픈 할인 행사지원</td>
                            <td>할인 금액의 50% 지원</td>
                        </tr>
                        <tr>
                            <td>전단지/자석스티커</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>유니폼(앞치마,모자)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>pos(포스 1대)</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>
        <article class="regular process">
            <h3 class="sub-tit">오구쌀 피자 창업절차</h3>
            <p class="sub-description down-please">오구쌀피자의 창업절차를 상세히 안내해드립니다</p>
            <div class="process-bg">
                <div class="process-wrap clearfix">
                <div class="process-content">
                    <h4 class="process-number">1</h4>
                    <h5 class="process-tit">고객상담</h5>
                    <p class="process-description">사업현황,투자금 규모,<br>손익분석,출점전략 등<br>창업에 필요한 제반사항 상담</p>
                </div>
                <div class="process-content">
                    <h4 class="process-number">2</h4>
                    <h5 class="process-tit">입지선정</h5>
                    <p class="process-description">다수의 입점 후보군<br>비교분석을 통해<br>자담치킨이 성공할 수 있는<br>최적의 입지 선택</p>
                </div>
                <div class="process-content">
                    <h4 class="process-number">3</h4>
                    <h5 class="process-tit">점포/가맹계약</h5>
                    <p class="process-description">점포 시설권리 계약과<br>임대차 완료 +<br>본사와 프렌차이즈<br>가맹계약</p>
                </div>
                <div class="process-content">
                    <h4 class="process-number">4</h4>
                    <h5 class="process-tit">시설공사</h5>
                    <p class="process-description">인테리어,주방설비,간판,<br>냉난방 시설 ,의/탁자 배치 등<br>매장운영에 필요한 시설공사</p>
                </div>
                <div class="process-content">
                    <h4 class="process-number">5</h4>
                    <h5 class="process-tit">운영교육</h5>
                    <p class="process-description">인테리어 시설공사 동안<br>본사의 운영교육 진행<br>자담치킨메뉴얼 이론 및<br>실습교육 이수 후 직영점 현장 실습</p>
                </div>
                <div class="process-content">
                    <h4 class="process-number">6</h4>
                    <h5 class="process-tit">물품공금/가오픈</h5>
                    <p class="process-description">식자재,주류/음료,홍보자료 등<br>매장운영에 필요한 초도물품 공급<br>및 오픈준비 완료</p>
                </div>
                <div class="process-content">
                    <h4 class="process-number">7</h4>
                    <h5 class="process-tit">그랜드 오픈</h5>
                    <p class="process-description">본사지원 인려과 함께<br>매장홍보,오픈 이벤트<br>행사 진행</p>
                </div>
                <div class="process-content">
                    <h4 class="process-number">8</h4>
                    <h5 class="process-tit">지속관리</h5>
                    <p class="process-description">안정적 물품공급,<br>정기적 교육실시,<br>우수가맹점시상 및<br>슈퍼바이저의 지속적지원</p>
                </div>
                </div>
            </div>
        </article>
    </div>
</section>
<?php
include_once(G5_PATH.'/tail-sub-common.php');