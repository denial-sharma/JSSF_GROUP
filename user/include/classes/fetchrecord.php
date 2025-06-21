<?php

/**
 * 
 */
class fetchrecord
{

	function jssf_yojna()
	{
		include('../configration/dbconnection.php');

		$result = $conn->prepare("SELECT * FROM `services` WHERE `id` = 11");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>
			<tr>
				<td><label><?php echo $i ?></label></td>
				<td><label><?php echo $row['title'] ?></label></td>
				<td>
					<div class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" id="save" onclick="applyyojna(<?php echo $row['id'] ?>)">Apply</div>
					<div class="btn btn-primary d-none" data-toggle="modal" onclick="payforyojana()" id="pay">Pay Now</div>
					<div class="btn btn-primary d-none"><a class="text-white text-decoration-none" id="certificate" href="downloadyojanacertificate.php?id=<?php echo $row['id'] ?>" target="_black">Download Certificate</a></div>
				</td>
			</tr>
		<?php

		}
	}

	function jssf_yojna_list_byuser()
	{
		include('../configration/dbconnection.php');
		$user_uid = $_SESSION['username'];
		$result = $conn->prepare("SELECT * from yojna_data where `userid` = '$user_uid' AND `yojnaid` = 11");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>
			<tr>
				<td><label><?php echo $i ?></label>
				</td>
				<td><label><?php echo $row['registration_no'] ?></label></td>
				<td><label><?php echo $row['girl_name'] ?></label></td>
				<td><label><?php echo $row['aadhar_no'] ?></label></td>
				<td><?php
					echo '<div class="btn btn-primary "><a class="text-white text-decoration-none" id="certificate" href="downloadyojanacertificate.php?id=' . $row['id'] . '"  target="_black">Download Certificate</a></div>';
					?>
				</td>
			</tr>
		<?php
		}
	}

	function getyojanasdata()
	{
		include('../configration/dbconnection.php');
		$id = $_GET['id'];
		$result = $conn->prepare("SELECT * FROM `yojna_data`  WHERE `id`= $id");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>

			<div style="padding:50px;">
				<div class="row ft-24 mt-bg">
					<div class="col-md-7 col-9">
						<label class="ml">पंजीकरण संख्या :- &nbsp;</label>
						<label> <?php echo $row['registration_no']  ?></label>
						<br><br>
						<label class="ml">पिता या संरक्षक की ID संख्या :- &nbsp; </label>
						<label><?php echo $row['userid'] ?></label>
					</div>
					<div class="col-md-5 col-3">
						<div class="divborder">
							<img src="<?php echo $row['girl_photo'] ?>" alt="" class="imghw">
						</div>
					</div>
				</div>

				<div class="row ft-24" style="margin-top: 1rem;">
					<div class="col-md-3 col-3"></div>
					<div class="col-md-9 col-9">
						<div class="divmt">
							<span>बेटी का नाम :- &nbsp;</span>
							<span><?php echo $row['girl_name'] ?></span>
						</div>

						<div class="divmt">
							<span>पिता का नाम :- &nbsp;</span>
							<span><?php echo $row['girl_f_n'] ?></span>
						</div>

						<div class="divmt">
							<span>माता का नाम :- &nbsp;</span>
							<span><?php echo $row['girl_m_n'] ?></span>
						</div>

						<div class="divmt">
							<span>पुरा पता :- &nbsp;</span>
							<span><?php echo $row['address'] ?></span>
						</div>

						<div class="divmt">
							<span>ग्राम :- &nbsp;</span>
							<span><?php echo $row['gram_panchayat'] ?></span>
						</div>

						<div class="divmt">
							<span>पोस्ट :- &nbsp;</span>
							<span><?php echo $row['block'] . ', ' . $row['tahsil'] ?></span>
						</div>

						<div class="divmt">
							<span>पंचायत:- &nbsp;</span>
							<span><?php echo $row['gram_panchayat'] ?></span>
						</div>

						<div class="divmt">
							<span>ज़िला :- &nbsp;</span>
							<span><?php echo $row['district'] ?></span>
						</div>

						<div class="divmt">
							<span>राज्य :- &nbsp;</span>
							<span><?php echo $row['state'] ?></span>
						</div>

						<div class="divmt">
							<span>पिन कोड :- &nbsp;</span>
							<span><?php echo $row['pincode'] ?></span>
						</div>

						<div class="divmt">
							<span>आधार नंबर :- &nbsp;</span>
							<span><?php echo $row['aadhar_no'] ?></span>
						</div>

						<div class="divmt">
							<span>पंजीकरण की तिथि :- &nbsp;</span>
							<span><?php echo date("d-m-Y", strtotime($row['created_at'])) ?></span>
						</div>

					</div>
				</div>

			</div>



		<?php
		}
	}

	function checkusersubscription()
	{
		include('../configration/dbconnection.php');
		$user_uid = $_SESSION['username'];
		$result = $conn->prepare("SELECT created_at FROM `master_user` where user_uid = '$user_uid' and `status` = 'A' ");
		$result->execute();
		$row = $result->fetch();
		return $row;
	}

	function ttLreUser()
	{
		include('../configration/dbconnection.php');
		$user_uid = $_SESSION['username'];
		$result = $conn->prepare("SELECT count(*) as cnt FROM `node` where refid = '$user_uid' ");
		$result->execute();
		$row = $result->fetch();
		return $row;
	}


	function user_reff()
	{
		include('../configration/dbconnection.php');
		$user_uid = $_SESSION['username'];
		$result = $conn->prepare("SELECT * FROM `node` WHERE `refid` = '$user_uid' ");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>

			<tr>
				<td><label><?php echo $i ?></lable>
				</td>
				<td><label><?php echo $row['user_uid'] ?></label></td>
				<td><label><?php echo $row['user_name'] ?></label></td>
				<td><label><?php echo $row['user_email'] ?></label></td>
				<td><label><?php echo $row['user_phone'] ?></label></td>
				<td><label class='text-success'>Active</label></td>
				<td><button class='btn btn-danger' onclick=" inactiveuser(<?php echo $row['id'] ?>)">Inactive</button></td>

			</tr>
		<?php

		}
	}

	function getmatrixincome()
	{

		include("../configration/dbconnection.php");
		$userUid = $_SESSION['username'];
		$stateDate = date('Y-m-01');
		$endDate = date('Y-m-30');

		$sql = "SELECT amount FROM matrix where userid = '$userUid'";
		$matrix = $conn->prepare($sql);
		$matrix->execute();
		$row = $matrix->fetch();
		?>

		<?php echo $row['amount'] ?>

		<?php
		//  echo $row['refid'],$row['userid'] , $row['created_at'];


	}

	function profiledata($userid)
	{
		include('../configration/dbconnection.php');
		$result = $conn->prepare("SELECT mu.*,kyc.kyc_docnumber, reg_user.nomini_name FROM ((`master_user` as mu INNER JOIN kyc on kyc.masteruser_uid = mu.user_uid) INNER JOIN reg_user on reg_user.masteruser_uid = mu.user_uid) where mu.id= $userid ");
		$result->execute();
		$row = $result->fetch();
		return $row;
	}

	function getpay($userid)
	{
		include('../configration/dbconnection.php');
		$result = $conn->prepare("SELECT mu.*,kyc.kyc_docnumber, reg_user.nomini_name FROM ((`master_user` as mu INNER JOIN kyc on kyc.masteruser_uid = mu.user_uid) INNER JOIN reg_user on reg_user.masteruser_uid = mu.user_uid) where mu.id= $userid ");
		$result->execute();
		$row = $result->fetch();
		return $row;
	}

	function getmyrefuserlist()
	{
		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$result = $conn->prepare("SELECT master_user.user_name, master_user.status, node.id as id  ,master_user.user_uid FROM `node` INNER JOIN master_user on master_user.user_uid = node.userid where node.sponcerid = '$userid' AND node.manual_pool  IS NULL ORDER BY `refid` ASC; ");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) {
			$userStatus = $row['status'];
		?>

			<?php
			if ($userStatus == 'A') {
			?>
				<tr class="text-success">
					<td><label><?php echo $i ?></label></td>
					<td><label><?php echo $row['user_name'] ?></label></td>
					<td><label><?php echo $row['user_uid'] ?></label></td>
					<td><label>Active</label></td>
					<td>
						<div class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="assginreflerid(<?php echo $row['id'] ?>)">Assgin </div>
					</td>
				</tr>

			<?php
			} else {
			?>
				<tr class="text-danger">
					<td><label><?php echo $i ?></label></td>
					<td><label><?php echo $row['user_name'] ?></label></td>
					<td><label><?php echo $row['user_uid'] ?></label></td>
					<?php
					if ($userStatus != 'A') {
					?>
						<td><label>Inactive</label></td>
					<?php
					}
					?>

					<td>
						<div class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="assginreflerid(<?php echo $row['id'] ?>)">Assgin </div>

					</td>

				</tr>
			<?php
			}
			?>

		<?php
		}
	}


	function getInActiveuser()
	{
		include('../configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM `master_user` WHERE `status` = 'P' ");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>

			<tr>
				<td><label><?php echo $i ?></lable>
				</td>
				<td><label><?php echo $row['user_uid'] ?></label></td>
				<td><label><?php echo $row['user_name'] ?></label></td>
				<td><label><?php echo $row['user_email'] ?></label></td>
				<td><label><?php echo $row['user_phone'] ?></label></td>
				<td><label class='text-danger'>Inactive</label></td>
				<td><button class='btn btn-success' onclick="activeuser(<?php echo $row['id'] ?>)">Active</button></td>
			</tr>
		<?php

		}
	}


	function jssf_list()
	{

		include('../configration/dbconnection.php');
		$result = $conn->prepare("SELECT * FROM `advertise`");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) { ?>

			<tr class='text-center'>
				<td><label><?php echo $i ?></label></td>
				<td><label><?php echo $row['title'] ?></label></td>
				<td><img src="<?php echo $row['image'] ?>" height='80'></td>
				<td><button class="btn btn-primary" onclick="advupdate(<?php echo $row['id'] ?>)">Edit</button></td>
				<td><button class="btn btn-danger" onclick="deleteadv(<?php echo $row['id'] ?>)">Delete</button></td>
			</tr>
		<?php

		}
	}

	function profileList()
	{
		include('../configration/dbconnection.php');
		$userid = $_SESSION['id'];
		$sql = $conn->prepare("SELECT * FROM `master_user` where id = '$userid' ");
		$sql->execute();
		$row = $sql->fetch();
		?>
		<ul style="list-style:none">
			<li><strong>Memberid :</strong> &nbsp;<?php echo $row['user_uid'] ?></li>
			<li><strong>Name :</strong> &nbsp;<?php echo $row['user_name'] ?></li>
			<li><strong>User Dob :</strong> &nbsp;<?php echo $row['user_dob'] ?></li>
			<li><strong>Gender :</strong> &nbsp;<?php echo $row['user_gender'] ?></li>
			<li><strong>Mobile No :</strong> &nbsp;<?php echo $row['user_phone'] ?></li>
			<li><strong>Email :</strong> &nbsp;<?php echo $row['user_email'] ?></li>
			<li><strong>Address :</strong> &nbsp;<?php echo $row['user_add1'] . ', ' . $row['user_add2'] ?></li>
			<li><strong>City :</strong> &nbsp;<?php echo $row['user_city'] ?></li>
			<li><strong>State :</strong> &nbsp;<?php echo $row['user_state'] ?></li>
			<li><strong id="joindate">Joining Date :</strong> &nbsp;<?php echo date("d-m-Y", strtotime($row['created_at'])) ?></li>
			<li><strong id="joindate">Renewal Date :</strong> &nbsp;
				<?php
				$joiningDate = new DateTime($row['renewal_date']);
				//echo $joiningDate->format("d-m-Y");

				// Calculate the renewal date (1 year after joining)
				$renewalDate = (clone $joiningDate)->modify('+1 year');
				echo $renewalDate->format("d-m-Y");
				?>
			</li>

		</ul>
	<?php
	}


	function joiningDate()
	{

		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$sql = $conn->prepare("SELECT created_at FROM `master_user` where user_uid = '$userid' ");
		$sql->execute();
		$row = $sql->fetch();
		echo date("d-m-Y", strtotime($row['created_at']));
	}


	function activeuserlist()
	{

		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$sql = $conn->prepare("SELECT count(*) as countActiveUser FROM `master_user` join node on master_user.user_uid = node.userid where master_user.status = 'A' and node.refid = '$userid'");
		$sql->execute();
		$row = $sql->fetch();
	?>
		<h4><?php echo $row['countActiveUser'] ?></h4>
	<?php

	}

	function inactiveuserlist()
	{

		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$sql = $conn->prepare("SELECT count(*) as countInActiveUser FROM `master_user` join node on master_user.user_uid = node.userid where master_user.status = 'P' and node.refid = '$userid' ");
		$sql->execute();
		$row = $sql->fetch();
	?>
		<h4><?php echo $row['countInActiveUser'] ?></h4>
	<?php

	}

	function patentlist()
	{

		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$sql = $conn->prepare("SELECT count(*) as countpatentUser FROM node where sponcerid = '$userid' ");
		$sql->execute();
		$row = $sql->fetch();
	?>
		<h4><?php echo $row['countpatentUser'] ?></h4>
	<?php

	}

	function directjoint()
	{

		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$sql = $conn->prepare("SELECT count(userid) as directjoin FROM node where refid = '$userid' AND levelname = '2' ");
		$sql->execute();
		$row = $sql->fetch();
	?>
		<h4><?php echo $row['directjoin'] ?></h4>
	<?php

	}

	function directjointtotalamount()
	{

		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$sql = $conn->prepare("SELECT count(userid) as directjoin FROM node where refid = '$userid' AND levelname = '2' ");
		$sql->execute();
		$row = $sql->fetch();
		$directjoin = $row['directjoin'];
		$getamount = $directjoin * 25;

	?>
		<h4><?php echo $getamount ?></h4>
	<?php

	}

	function totalIncomeMagicPool1()
	{

		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$sql = $conn->prepare("SELECT sum(income) as totalimcome FROM magic_pool_income_1 where userid = '$userid' ");
		$sql->execute();
		$row = $sql->fetch();
	?>
		<?php echo $row['totalimcome'] ?>
	<?php

	}

	function reffrallist()
	{

		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$sql = $conn->prepare("SELECT count(*) as countreffralUser FROM node where refid = '$userid' ");
		$sql->execute();
		$row = $sql->fetch();
	?>
		<h4><?php echo $row['countreffralUser'] ?></h4>
		<?php

	}

	function getdirectjoinref()
	{
		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$result = $conn->prepare("SELECT node.refid,node.userid , master_user.id , master_user.user_name , master_user.user_uid FROM node join master_user on node.userid = master_user.user_uid Where node.refid = '$userid' AND node.levelname = '2';
 ");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) {
		?>
			<tr class="text-center">
				<td><label><?php echo $i ?></label></td>
				<td><label><?php echo $row['user_name'] ?></label></td>
				<td><label><?php echo $row['user_uid'] ?></label></td>
				<td><label><?php echo $row['refid'] ?></label></td>
				<td><label><?php echo 100 ?></label></td>
				<td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="downloadjoincertificate(<?php echo $row['id'] ?>)">Certificate</button></td>
			</tr>
		<?php
		}
	}


	function getdirectiserid()
	{
		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$result = $conn->prepare("SELECT node.refid,node.userid , master_user.id , master_user.user_name , master_user.user_uid FROM node join master_user on node.userid = master_user.user_uid Where node.refid = '$userid' AND node.levelname = '2' ;
 ");
		$result->execute();
		 $row = $result->fetch();
		?>
			 <a href="directjoincertificeate.php?id=<?php echo $row['id']?>"><button type="button" class="btn btn-primary">Print</button></a>
		<?php
		
	}
	function donation()
	{
		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$result = $conn->prepare("SELECT * FROM `transaction` where userid =  '$userid'  And `type_trans` = 'donation'");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) {

		?>


			<tr class="text-center">
				<td><label><?php echo $i ?></label></td>
				<td><label><?php echo $row['transaction_id'] ?></label></td>
				<td><label><?php echo $row['amount'] ?></label></td>
				<td><label><?php echo $row['created_at'] ?></label></td>
				</td>
			</tr>


		<?php
		}
	}
	function bhagyalakshmi()
	{
		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$result = $conn->prepare("SELECT * FROM `transaction` where userid =  '$userid' And `type_trans` = 'bhagyalakshmi' ");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) {

		?>


			<tr class="text-center">
				<td><label><?php echo $i ?></label></td>
				<td><label><?php echo $row['transaction_id'] ?></label></td>
				<td><label><?php echo $row['amount'] ?></label></td>
				<td><label><?php echo $row['created_at'] ?></label></td>
				</td>
			</tr>


		<?php
		}
	}



	function setwallet()
	{
		include('../configration/dbconnection.php');
		$user_Uid = $_SESSION['username'];

		$getWalletAmt = $conn->prepare("SELECT amount FROM wallet WHERE `userid` = '$user_Uid' ");
		$getWalletAmt->execute();
		$row = $getWalletAmt->fetch();
		$getamt = $row['amount'];
		echo $getamt;
	}

	function withdrawalincome()
	{
		include('../configration/dbconnection.php');
		$user_Uid = $_SESSION['username'];

		$getWalletAmt = $conn->prepare("SELECT amount , status  FROM withdrawal WHERE `userid` = '$user_Uid' ");
		$getWalletAmt->execute();
		for ($i = 0; $row = $getWalletAmt->fetch(); $i++) {
			// $row = $getWalletAmt->fetch();
			$getamt = $row['amount'];
			$status = $row['status'];
			$userid = $row['userid'];
		?>

			<?php
			if ($getamt == 'NULL') {
				echo "<span>No Withdrawal Request Yet</span>";
			} else {
			?>
				<div class="row">
					<div class="col-6">
						<?php echo "<h4> ₹" . $getamt . "</h4>"; ?>
					</div>
					<div class="col-6">
						<?php if ($status == "P") {
						?>
							<span class="text-danger">Padding</span>
						<?php
						} else {
						?>
							<span class="text-success">Approved</span>
						<?php
						} ?>
					</div>
				</div>
		<?php


			}
		}
		?>





		<?php

	}

	function totalCountWithdrawal()
	{
		include('../configration/dbconnection.php');
		$user_Uid = $_SESSION['username'];

		$getWalletAmt = $conn->prepare("SELECT sum(amount) as withdrdrawalamount FROM withdrawal WHERE `userid` = '$user_Uid' ");
		$getWalletAmt->execute();
		$row = $getWalletAmt->fetch();
		$getamt = $row['withdrdrawalamount'];
		echo $getamt;
	}

	function getbankdetails()
	{
		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$result = $conn->prepare("SELECT * FROM bankdetails WHERE `userid` = '$userid' ");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) {

		?>


			<tr>
				<td><label><?php echo $i ?></label></td>
				<td><label><?php echo $row['bankname'] ?></label></td>
				<td><label><?php echo $row['account_no'] ?></label></td>
				<td><label><?php echo $row['ifsc_code'] ?></label></td>
				<td><label><?php echo $row['holdername'] ?></label></td>
				<td><button class="btn btn-primary" onclick="editbankdetails('<?php echo $row['id'] ?>')">Edit</button></td>

			</tr>


		<?php
		}
	}

	function getwithdrawallist()
	{
		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$result = $conn->prepare("SELECT * FROM withdrawal WHERE `userid` = '$userid' ");
		$result->execute();
		for ($i = 1; $row = $result->fetch(); $i++) {

		?>


			<tr>
				<td><label><?php echo $i ?></label></td>
				<td><label><?php echo $row['amount'] ?></label></td>
				<td><label><?php echo $row['created_at'] ?></label></td>
				<?php if ($row['status'] == 'P') {
				?>
					<td class="text-danger"><label>Pending</label></td>
				<?php
				} else {
				?>
					<td class="text-success"><label>Approved</label></td>
				<?php
				}
				?>

			</tr>


		<?php
		}
	}


	function getmagicpoolincome_1()
	{
		include('../configration/dbconnection.php');
		$userid = $_SESSION['username'];
		$result = $conn->prepare("SELECT * FROM magic_pool_income_1 WHERE `userid` = '$userid' ");
		$result->execute();

		for ($i = 1; $row = $result->fetch(); $i++) {

		?>


			<tr class="text-center">
				<td><label><?php echo $row['room_type'] ?></label></td>
				<td><label><?php echo $row['no_of_person'] ?></label></td>
				<td><label><?php echo $row['income'] ?></label></td>

			</tr>


<?php
		}
	}
}

?>