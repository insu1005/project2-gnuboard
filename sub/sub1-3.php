<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit;

include_once(G5_PATH.'/head-sub-1.php');
?>
<section class="sub-common sub1-1">
    <div class="inner">
        <article class="regular brand-sub">
            <h2 class="sub-tit">오시는길</h2>
            <p class="sub-description">오구오구! 여러분에게 항상 열려있는 공간! 오구쌀피자 입니다!</p>
            <figure class="location-wrap">
                <div class="location-map">
                    <!-- * 카카오맵 - 지도퍼가기 -->
                    <!-- 1. 지도 노드 -->
                    <div id="daumRoughmapContainer1672028317904" class="root_daum_roughmap root_daum_roughmap_landing"></div>
                    <!-- 2. 설치 스크립트 * 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다. -->
                    <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
                    <!-- 3. 실행 스크립트 -->
                    <script charset="UTF-8">
                    new daum.roughmap.Lander({
                    "timestamp" : "1672028317904",
                    "key" : "2d6ob",
                    "mapWidth" : "1000",
                    "mapHeight" : "600"
                    }).render();
                    </script>
                </div>
                <div class="location-detail">   
                    <p><strong>주소</strong> 인천 부평구 경원대로 1415 가나파라움빌딩 704호</p>
                    <p><strong>TEL</strong> 1833-754</p>
                </div> 
            </figure>
        </article>
        <article class="regular transportation">
            <h2 class="sub-tit">대중교통</h2>
            <p class="sub-description">오구오구! 여러분 편안하게 조심히 살펴 오세요!</p>
            <div class="transportation-wrap">
                <div class="subway-box clearfix">
                    <h3 class="subway-tit">지하철</h3>
                    <p class="subway-direction"><strong>부평역 출구</strong> : 약 582m (10분) 도보</p>
                </div>
                <div class="bus-box clearfix">
                    <h3 class="bus-tit">버스</h3>
                    
                    <ul class="bus-direction">
                        <li class="bupyeong">부평역</li>
                        <ul class="line-1 clearfix">
                            <li><strong class="line-1-common">간선</strong>1</li>
                            <li><strong class="line-1-common">간선</strong>11</li>
                            <li><strong class="line-1-common">간선</strong>12</li>
                            <li><strong class="line-1-common">간선</strong>43</li>
                            <li><strong class="line-1-common">간선</strong>45</li>
                            <li><strong class="line-1-common">간선</strong>46</li>
                            <li><strong class="line-1-common">간선</strong>47</li>
                        </ul>
                        <ul class="line-2 clearfix">
                            <li><strong class="line-2-common">지선</strong>558</li>
                            <li><strong class="line-2-common">지선</strong>561</li>
                            <li><strong class="line-2-common">지선</strong>565</li>
                            <li><strong class="line-2-common">지선</strong>579</li>
                            <li><strong class="line-2-common">지선</strong>586</li>
                        </ul>
                        <li class="line-3"><strong>일반</strong>88</li>
                        <li class="line-4"><strong>좌석</strong>302</li>
                    </ul>
                </div>
            </div>
        </article>
    </div>
</section>
<?php
include_once(G5_PATH.'/tail-sub-common.php');