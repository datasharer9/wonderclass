<!doctype html>

<?php

header("Cache-Control: no-store, no-cache, must-revalidate");

$q =$_GET['searchClass'];
	
$con = mysqli_connect('localhost','idkhs9','khs16419g!!');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"idkhs9");
$sql1= "SELECT * FROM class_test WHERE className LIKE '%".$q."%' OR professor LIKE '%".$q."%' LIMIT 100";
//$sql1= "SELECT * FROM class_test WHERE match (className) against ('".$q."') OR match (professor) against ('".$q."') LIMIT 100";
	
$result = mysqli_query($con, $sql1); 
	

?>


<html>
	
<head>
	

	<meta charset="utf-8">
	<link href="index.css" rel="stylesheet" type="text/css">
	
	<script>
				
		function upDown(primeNum, upDown) {
   	
    	xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rank").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","upDown.php",true); 
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("primeNum="+ primeNum + "&upDown="+upDown );
		}
		
		function upDown_department(primeNum, upDown) {
		
   
    	xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rank").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","upDown_department.php",true); 
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("primeNum="+ primeNum + "&upDown="+upDown );
		}
		
		
	function search_university() {
		
		var x = document.getElementById("search-input").value;
		
		
    	xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("university_dropdown").innerHTML = this.responseText;
            }
        };
		
        xmlhttp.open("GET","search_university.php?q="+x, true); 
		xmlhttp.send();
		
	}

	function department(primeNum){
				
    	xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rank").innerHTML = this.responseText;
            }
        };
		
	
        xmlhttp.open("GET","department_filter.php?q="+primeNum	, true); 
		
		xmlhttp.send();
		
	}

	</script>

	
</head>
	
<body>
	
	<div class="bluecolor"> </div>
		<div class="container1">
	
	<header>
		
		<div class="head_nav">
			<div class="tie">
			 <ol>로그인</ol>
			 <ol>서비스 소개 </ol>
			 <ol>불편/개선 사항 보내기 </ol>	
			</div>
		</div>

		<div class="logobanner">
		<div id="logo"><img src="images/소형로고.png" alt=""></div>
		<div class="sentence">강의에 순위를 매겨 빠르게 좋은 강의를 찾는 방법</div>
		</div>
		
		<nav>
			<div class="big_sort">
		<div class="tie2">
			
			<div>대학교 </div>
			<div>인터넷 강의 </div>
			<div>고등학교 </div>
			
		</div>
			</div>
		</nav>
		
		
	</header>
			
		<div id="search-box">
			<span><img id="reading-glasses" src="images/noun_Search_1613659_51A7F9.png" alt=""></span>
			<span><input id="search-input" onKeyUp="search_university()"  type="text" placeholder="대학명을 검색하세요!"></span>
			
			
			</div>
			<table id="university_dropdown">
				
		
			</table>
	
	<div id="university-name">서경대 </div>
		<h2>순위정렬기준 선택 </h2>
			
		<div class="wrap_box">
			
			<div class="sort_box">
				
					<div class="college"> 
			 		<div class="sort_univ">
						<a href="javascript:window.location.reload(true);" >종합순위</a>
					</div>
				</div>
					<div class="college">
						<div class="sort_univ">인문과학대 </div>
						
						<div onClick="department(20010)"><a href="#rank_banner">국제비즈니스어학부/영어</a></div>
						<div onClick="department(20011)"><a href="#rank_banner">국제비즈니스어학부/일어</a> </div>
						<div onClick="department(20012)"><a href="#rank_banner">국제비즈니스어학부/중어</a> </div>
						<div onClick="department(20013)"><a href="#rank_banner">국제비즈니스어학부/노어</a> </div>
						<div onClick="department(20014)"><a href="#rank_banner">국제비즈니스어학부/불어</a> </div>
						<div onClick="department(20005)"><a href="#rank_banner">문화콘텐츠학부</a> </div>
						<div onClick="department(20015)"><a href="#rank_banner">아동학과</a> </div>
					</div>
				
					<div class="college">
						<div class="sort_univ">사회과학대학  </div>
						<div onClick="department(20016)"><a href="#rank_banner">공공인적자원학부</a> </div>						
						<div onClick="department(20019)"><a href="#rank_banner">경영학부</a> </div>
						<div onClick="department(20025)"><a href="#rank_banner">군사학과</a> </div>
						<div onClick="department(20024)"><a href="#rank_banner">글로벌경영학과</a> </div>
					</div>
					<div class="college">
						<div class="sort_univ">이공대학 </div>
						<div onClick="department(20029)"><a href="#rank_banner">컴퓨터공학과</a> </div>
						<div onClick="department(20026)"><a href="#rank_banner">컴퓨터과학과</a> </div>
						<div onClick="department(20030)"><a href="#rank_banner">화학생명공학과</a> </div>
						<div onClick="department(20034)"><a href="#rank_banner">토목건축공학과</a> </div>
						<div onClick="department(20032)"><a href="#rank_banner">산업경영시스템공학과</a> </div>
						<div onClick="department(20031)"><a href="#rank_banner">나노융합공학과</a> </div>
						<div onClick="department(20033)"><a href="#rank_banner">도시공학과</a> </div>
						<div onClick="department(20027)"><a href="#rank_banner">금융정보공학과</a> </div>
					</div>
					
					<div class="college">
	                    <div class="sort_univ">예술대학 </div>
	                    <div onClick="department(20035)"><a href="#rank_banner">디자인학부</a> </div>
	                    <div onClick="department(20040)"><a href="#rank_banner">음악학부</a> </div>
	                    <div onClick="department(20042)"><a href="#rank_banner">뮤지컬학부</a> </div>
	                    <div onClick="department(20041)"><a href="#rank_banner">실용음악학과</a> </div>
	                    <div onClick="department(20048)"><a href="#rank_banner">무용예술학과</a></div>
	                    <div onClick="department(20045)"><a href="#rank_banner">공연예술학부/연기</a> </div>
	                    <div onClick="department(20046)"><a href="#rank_banner">공연예술학부/무대기술</a> </div>
	                    <div onClick="department(20044)"><a href="#rank_banner">공연예술학부/모델연기</a> </div>
	                    <div onClick="department(20047)"><a href="#rank_banner">공연예술학부/무대패션</a> </div>
	                    <div onClick="department(20043)"><a href="#rank_banner">영화영상학과</a> </div>			
				</div>
				<div class="college">
					<div class="sort_univ">미용예술대학 </div>
					<div onClick="department(20051)"><a href="#rank_banner">미용예술학과</a> </div>
					<div onClick="department(20049)"><a href="#rank_banner">헤어메이크업디자인학과</a> </div>
					<div onClick="department(20050)"><a href="#rank_banner">뷰티테라피&메이크업학과</a> </div>
					<div onClick="department(20052)"><a href="#rank_banner">미용예술학과_외국인유학생</a></div>
				</div>
				<div class="else">
					<div class="sort_univ">기타  </div>
					<div onClick="department(20002)"><a href="#rank_banner">교양</a> </div>
					<div onClick="department(20004)"><a href="#rank_banner">OCU</a> </div>
					<div onClick="department(20053)"><a href="#rank_banner">교양/외국인유학</a> </div>
				</div>
			</div>
			
		</div>
		<div class="container_rank">
			
			<div id="box_banner">
				<div id="rank_banner">실시간으로 움직이는 순위 </div>
					
				  <form action="search_class.php#box_banner" method="get">
						
					<input id="search-class" type="search" name="searchClass" placeholder="강의명, 교수명을 검색하세요!" >
					<img type="submit" id="reading_glasses" src="images/noun_Search_1613659_51A7F9.png" alt="">
					
				  </form>
					
					
			
			</div>
			
			<div id="rank">
				
				<?php
					$rank = 1;
				
				echo '<table id="rank-table"  cellspacing="0" cellpadding="3">

				
					<tr id="table-head">
					
					<th></th>
					<th id="th-recommend">추천수</th>
					<th id="th-rank">순위 </th>
					<th id="th-class">강의명  </th>
					<th id="th-professor">교수명  </th>
					<th id="th-grade">학점 </th>
					</tr>';	


				
				while($row=mysqli_fetch_assoc($result)){

					echo '<tr class="line-rankbox">
					
	
					<td class="tr-button">
				
					<button type="submit" onclick="upDown('.$row[primeNum].' , 0)"><img class="recommend-button" src="images/button_recommend_up자산 6@216x.png" alt="추천 "> </button>
					
				
					<button onclick="upDown('.$row[primeNum].' , 1)"><img class="recommend-button" src="images/button_recommend_down자산 7@216x.png" alt="비추천 "></button>    
					
					</td>';
								
										
					echo '<td class="td-recommend">'.$row['recommend'].'</td>
					<td class ="td-rank">'.$rank.'</td>
					<td class="td-class">'.$row['className'].'</td>
					<td class="td=professor">'.$row['professor'].'</td>
					<td class="td-grade">'.$row['grade'].'</td>
					
					</tr>';

					$rank=$rank+1;
					}
				

					echo '</table>';
	
				?>		
				
					
					
	
        </div>	
		
		
	
	</div>
	</div>	
</body>
	<footer>
	</footer>
</html>