<?php
	@session_start();
	$session_id = $_SESSION['session_id'];
	include "../dbconfig.php";

	/*
	$review_no = $_GET['no'];
	$sql = "select * from review where id = ".$review_no;
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	*/
	$review_no = $_GET['no'];
	
	//조회수 증가
	$sql_hit = "update review set hit = hit + 1 where id =".$review_no;
	$result_hit = mysql_query($sql_hit);

	$sql = "SELECT * FROM lecture AS L RIGHT JOIN review AS R
			ON L.category_code = R.category_code where R.id = ".$review_no;
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);

?>
<div class="search-info">
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px" id="category_code" name="category_code" >
					<option value="00">분류</option>
					<option value="01">일반직무</option>
					<option value="02">산업직무</option>
					<option value="03">공통역량</option>
					<option value="04">어학 및 자격증</option>
				</select>
				<select class="input-sel" style="width:158px" id="case" onchange="changeSearch()">
					<option value="lecture_name">강의명</option>
					<option value="login_id">작성자</option>
				</select>
				<input type="text" class="input-text" placeholder="강의명을 입력하세요." style="width:158px" id="search"/>
				<button type="button" class="btn-s-dark" onclick="search()">검색</button>
			</div>
		</div>

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
			<caption class="hidden">수강후기</caption>
			<colgroup>
				<col style="width:8%"/>
				<col style="width:8%"/>
				<col style="*"/>
				<col style="width:15%"/>
				<col style="width:12%"/>
			</colgroup>

			<thead>
				<tr>
					<th scope="col">번호</th>
					<th scope="col">분류</th>
					<th scope="col">제목</th>
					<th scope="col">강좌만족도</th>
					<th scope="col">작성자</th>
				</tr>
			</thead>
	 
			<!--수강후기 리스트 페이징 처리-->
			<tbody>
				<?php
					$board_perpage = 6;

					if(isset($_GET["page"])){
					
						$page = $_GET["page"];
					
					}else{
					
						$page = 1;
					
					}

					$start_from = ($page-1) * $board_perpage;

					/* best 수강후기 시작*/

					$sql_byhit = "select * from review order by hit desc limit 3";
					$result_byhit = mysql_query($sql_byhit);
					while($row = mysql_fetch_assoc($result_byhit)){
				?>
					<tr class="bbs-sbj">
						<td><span class="txt-icon-line"><em>BEST</em></span></td>
						<td><?php 
								if($row['category_code'] == "01"){
									echo "일반직무";
								}else if($row['category_code'] == "02"){
									echo "산업직무";
								}else if($row['category_code'] == "03"){
									echo "공통역량";
								}else if($row['category_code'] == "04"){
									echo "어학/자격증";
								} ?>
						</td>
						<!--<?php echo "<td><a href = /test/lecture_board/modify.html?no=".$row['id'].">".$row['title']."</td>" ?>-->
						<?php echo "<td><a href = /test/lecture_board/detail.html?no=".$row['id']."><span class='tc-gray ellipsis_line'>수강 강의명 : ".$row['lecture_name']."</span><strong class='ellipsis_line'>".$row['title']."</strong></td>" ?>
						<!--<td><?php echo $row['score']; ?></td>-->
						<td>
						<?php if($row['score'] == "5"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:100%"></span>
								</span>
						<?php }else if($row['score'] == "4"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:80%"></span>
								</span>
						<?php }else if($row['score'] == "3"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:60%"></span>
								</span>
						<?php }else if($row['score'] == "2"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:40%"></span>
								</span>
						<?php }else if($row['score'] == "1"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:20%"></span>
								</span>
						<?php }?>
						</td>
						<td><?php echo $row['login_id']; ?></td>
					</tr>
				
				<?php }	

					//강의명 검색할 경우
					if($case == "lecture_name"){

						$lectureSearch = "where lecture_name LIKE '%".$search."%'";

					}else if($case == "login_id"){

						$lectureSearch = "where login_id LIKE '%".$search."%'";
					
					}

					$sql = "select * from review ".$lectureSearch." order by id desc LIMIT $start_from, $board_perpage";

					$rs_result = mysql_query($sql);
					while($row = mysql_fetch_assoc($rs_result)){
				?>
					<tr class="bbs-sbj">
						<td><?php echo $row['id']; ?></td>
						<td><?php 
								if($row['category_code'] == "01"){
									echo "일반직무";
								}else if($row['category_code'] == "02"){
									echo "산업직무";
								}else if($row['category_code'] == "03"){
									echo "공통역량";
								}else if($row['category_code'] == "04"){
									echo "어학/자격증";
								} ?>
						</td>
						<!--<?php echo "<td><a href = /test/lecture_board/modify.html?no=".$row['id'].">".$row['title']."</td>" ?>-->
						<?php echo "<td><a href = /test/lecture_board/detail.html?no=".$row['id']."><span class='tc-gray ellipsis_line'>수강 강의명 : ".$row['lecture_name']."</span><strong class='ellipsis_line'>".$row['title']."</strong></td>" ?>
						<!--<td><?php echo $row['score']; ?></td>-->
						<td>
						<?php if($row['score'] == "5"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:100%"></span>
								</span>
						<?php }else if($row['score'] == "4"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:80%"></span>
								</span>
						<?php }else if($row['score'] == "3"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:60%"></span>
								</span>
						<?php }else if($row['score'] == "2"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:40%"></span>
								</span>
						<?php }else if($row['score'] == "1"){ ?>
								<span class="star-rating">
									<span class="star-inner" style="width:20%"></span>
								</span>
						<?php }?>
						</td>
						<td><?php echo $row['login_id']; ?></td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>

		<div class="box-paging">
			<a href="#"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>
			<a href="#"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>
			<?php
				if($case == "lecture_name"){

						$lectureSearch = "where lecture_name LIKE '%".$search."%'";

				}else if($case == "login_id"){

					$lectureSearch = "where login_id LIKE '%".$search."%'";
				
				}
				$sql = "select count(*) from review ".$lectureSearch;

				$rs_result = mysql_query($sql);
				$row = mysql_fetch_row($rs_result);
				$total_records = $row[0];
				$total_pages = ceil($total_records / $board_perpage);

				for($i = 1; $i < $total_pages + 1; $i++){
					echo "<a href='/test/lecture_board/index.php?page=$i'>".$i."</a>";
				}
			?>
			<a href="#"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>
			<a href="#"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>
		</div>

		<script>
	
	//select-box 변경시 placeholder 변경
	function changeSearch(){

		console.log($('#case').val());

		if($('#case').val() == 'lecture_name'){

			$('#search').attr("placeholder","강의명을 입력하시오.");

		}else if($('#case').val() == 'login_id'){

			$('#search').attr("placeholder","작성자명을 입력하시오.");

		}
	
	}

	//버튼클릭 : 검색
	function search(){

		if($("#category_code").val() == "00"){
			alert("분류를 선택해주세요");
			return false;
		}

		if($("#search").val() == ""){		
			alert("검색어를 입력해주세요");
			return false;
		}
		
		var code = $("#category_code").val();
		var select_case = $('#case').val();
		var search = $("#search").val();

		if (select_case == "lecture_name")
		{
			location.href = "/test/lecture_board/index.php?mode=list&code="+code+"&case="+select_case+"&search="+search;
		}

		if (select_case == "login_id")
		{
			location.href = "/test/lecture_board/index.php?mode=list&code="+code+"&case="+select_case+"&search="+search;
		}
	}

	$('#ul_value').click(function(){
		alert();
	});
</script>