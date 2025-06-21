<?php

/**
 * 
 */
class fetchrecords
{

	function StateName()		{
	
		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM states WHERE `status` = 'Y'");
		$result->execute();
		echo '<option value="">Choose State</option>';
		for ($j = 1; $row = $result->fetch(); $j++) {
			echo '<option value="'.$row['id'].'">' . $row['name'] . '</option>';
		}
	}
	function DistrictNames()		{
	
		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM cities ");
		$result->execute();
		// echo ' <option value="">Choose District</option>';
		for ($j = 1; $row = $result->fetch(); $j++) {
			echo '<option value="'.$row['id'].'">' . $row['name'] . '</option>';
		}
	}
	
	function visitor_count()
	{

		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT count(id) * 20 as cnt FROM master_user");
		$result->execute();
		$row = $result->fetch();
		return $row;
	}

	function marquee()
	{
		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT  * FROM donationmarquee");
		$result->execute();
		for($i=0;$row = $result->fetch();$i++){
		echo " ".$row['title'];
		}
	}

	function annapurna_slide_show()
	{

		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM `slide_show`");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>

			<div id="nivoslider" class="slides">
				<img src="annapurna_admin/<?php echo $row['slide_image'] ?>" alt="" title="#slider-<?php echo $i ?>-caption<?php echo $i ?>" />

			</div>
			<div id="slider-<?php echo $i ?>-caption<?php echo $i ?>" class="nivo-html-caption nivo-caption">
				<div class="banner-content slider-<?php echo $i ?>">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="text-content-wrapper">
									<div class="text-content slide-<?php echo $i ?>">
										<h1 class="title<?php echo $i ?> wow fadeInUp " data-wow-duration="2000ms" data-wow-delay="0s"><?php echo $row['slide_heading'] ?></h1>
										<p class="sub-title wow fadeInUp d-none d-lg-block " data-wow-duration="2900ms" data-wow-delay=".5s">
											<?php echo $row['slide_discription'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php

		}
	}

	function jssf_adver()
	{

		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM `advertise`");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>
			<div class="swiper-slide" style="max-width: 250px;">
				<img src="admin/<?php echo $row['image'] ?>" class="img-fluid p-2" alt="" style="max-width:200px !important ; height:280px !important;">
				<!-- <br><br><h5><?php //echo $row['title'] ?></h5> -->
			</div>
			
		<?php

		}
	}

	function jssf_services()
	{

		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM `services`");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>
			<div class="col-lg-6 col-md-6 mt-3">
				<div class="card" >
					<img class="card-img-top" src="admin/<?php echo $row['image'] ?>" alt="Card image">
					<div class="card-body">
						<h4 class="card-title"><?php echo $row['title'] ?></h4>
						<p class="card-text"><?php echo $row['description'] ?></p>
					</div>
				</div>
			</div>
		<?php

		}
	}

	function annapurna_news()
	{

		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM `news`");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>

			<div class="col-lg-6 col-md-12 col-12">
				<div class="single-latest-item">
					<div class="single-latest-image">
						<a href="#"><img src="annapurna_admin/<?php echo $row['n_image'] ?>" alt=""></a>
					</div>
					<div class="single-latest-text">
						<h3><a href="#"><?php echo $row['n_name'] ?></a></h3>
						<div class="single-item-comment-view">
							<span><i class="zmdi zmdi-calendar-check"></i> <?php echo $row['news_start_date'] ?> - <?php echo $row['news_end_date'] ?></span>

						</div>
						<p><?php echo $row['n_details'] ?></p>

					</div>
				</div>
			</div>
		<?php

		}
	}

	function annapurna_testimonial()
	{
		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM `testimonial`");
		$result->execute();
		while ($row = $result->fetch()) { ?>

			<tr class='text-center'>
				<td><label><?php echo $row['id'] ?></label></td>
				<td><label><?php echo $row['tm_name'] ?></label></td>
				<td><img src="annapurna_admin/<?php echo $row['tm_image'] ?>" height='80'></td>
				<td><label><?php echo $row['tm_discription'] ?></label></td>
				<td><button class="btn btn-primary" onclick="testimonialupdate(<?php echo $row['id'] ?>)">Edit</button></td>
				<td><button class="btn btn-danger" onclick="deletetestimonial(<?php echo $row['id'] ?>)">Delete</button></td>
			</tr>
		<?php

		}
	}

	function annapurna_abouts()
	{

		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM `about`");
		$result->execute();
		for ($i = 0; $row = $result->fetch(); $i++) { ?>

			<div class="col-lg-6 col-md-12 col-12">
				<div class="about-text-container">
					<p><span><?php echo $row['about_title'] ?></span> <?php echo $row['about_discription'] ?></p>
					<div class="about-us">
						<span><?php $point = $row['about_point'];
								$arrpoint = explode(",", $point);
								$counpoint = count($arrpoint);
								for ($j = 0; $j < $counpoint; $j++) {
									echo "<li>" . $arrpoint[$j] . '<br>';
								}

								?></span>


					</div>
					<p>this school is providing free education lodging,fooding to 350 students in present times.</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-12">
				<div class="skill-image">
					<img src="annapurna_admin/<?php echo $row['about_image'] ?>" alt="">
				</div>
			</div>
		<?php

		}
	}

	function annapurna_teacher()
	{

		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM `teacher`");
		$result->execute();
		while ($row = $result->fetch()) { ?>

			<div class="col-lg-3 col-md-6 col-12">
				<div class="single-teacher-item">
					<div class="single-teacher-image">
						<a href="#"><img src="annapurna_admin/<?php echo $row['teacher_image'] ?>" alt=""></a>
					</div>
					<div class="single-teacher-text">
						<h3><a href="#"><?php echo $row['teacher_name'] ?></a></h3>
						<h4><?php echo $row['teacher_position'] ?></h4>
						<p><?php echo $row['teacher_discription'] ?></p>

					</div>
				</div>
			</div>
		<?php

		}
	}

	function getbhagyalakshmiwinner()
	{
		$day = date("l");
		if($day == 'Sunday'){
			include('configration/dbconnection.php');
			$result = $conn->prepare("SELECT * FROM `bhagyalakshmi` ");
			$result->execute();
			echo '<div class="table-responsive mt-3">
			<table class="table">
				<thead>
					<tr class="text-center ">
						<th>S.no</th>
						<th>User Name</th>
						<th>Amount</th>
						<th>Date</th>
				</tr>
				</thead>
				<tbody>';
					
					
					for ($i = 1; $row = $result->fetch(); $i++) { 
						$dt=date_create($row['date']);
						
						?>
						
						<tr class='text-center'>
							<td><label><?php echo $i ?></label></td>
							<td><label><?php echo $row['username'] ?></label></td>
							<td><label><?php echo $row['amount'] ?></label></td>
							<td><label><?php echo date_format($dt,"d-m-Y");?></label></td>
						</tr>
			<?php
					}
				echo'</tbody>

			</table>
		</div>';
			
		}else{
			echo '<marquee behavior="silde" direction="left" class="bg-danger text-white p-2 mt-3" style="font-size:20px;"> Winner Will be Announces Every Sunday </marquee>
			<div class="comingsoon text-center" style="margin-top:200px;">
                                        <img src="img/commingsoon.gif" alt="" srcset="" width="100%">
                                    </div>';
		}
		
	}

	function coursestatus()
	{

		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT count(*) FROM `courses`");
		$result->execute();
		while ($row = $result->fetch()) {
			echo $row['count(*)'];
		}
	}

	function facilitystatus()
	{

		include('configration/dbconnection.php');
		$result = $conn->prepare("SELECT count(*) FROM `facility`");
		$result->execute();
		while ($row = $result->fetch()) {
			echo $row['count(*)'];
		}
	}
}

?>