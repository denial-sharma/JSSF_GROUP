<?php include("header.php");
//error_reporting(0);
//ini_set('display_errors', 0);
?>
<link rel="stylesheet" href="https://dabeng.github.io/OrgChart/css/jquery.orgchart.css">
<style>
  #chart-container {
    font-family: Arial;

    border: 2px dashed #aaa;
    border-radius: 5px;
    overflow: auto;
    text-align: center;
  }

  .orgchart {
    background: #fff;
   

  }

  .orgchart td>.down {
    background-color: #aaa;
  }

  .orgchart .act .title {
    background-color: #009933;
  }

  .orgchart .inact .title {
    background-color: red;
  }
</style>


<?php include("loader.php") ?>

<?php include("side_menu_bar.php") ?>
<?php
$userid = $_SESSION['id'];
if (isset($userid) && $userid != "") {
  require_once('include/function/spl_autoload_register.php');
  $fetchrecordobj = new fetchrecord;
  $ttluser = $fetchrecordobj->ttlrefuser();
} else {
  header('Location: index.php'); //redirect URL
}
?>

<div class="main-content" style="padding-top: 100px;">
  <section class="section">
    <div class="section-body">
      <h4>My Reffler List</h4>
      
   
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      <div id="chart-container" class="bg-white"></div>
      </div>
      
    </div>
  </div>

      <!-- <div class="col-md-5 col-4 ">
          <button class="btn btn-primary btn-sm" 
          onclick="gettraverslist('<?php //echo $_SESSION['username'] 
                                    ?>')">abc</button>
        </div> -->
    </div>
  
</div>
</section>
<div class="floating-container">
  <div class="floating-button">+</div>
  <div class="element-container">

    <a href="https://api.whatsapp.com/send?text=https://jssfgroup.com/register.php?UId=<?php echo $_SESSION['username'] ?>">
      <!-- <span class="float-element tooltip-left">
      <i class="material-icons">phone
      </i>
    </span> -->
      <span class="float-element tooltip-left">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height: 25px;width: 25px;">
          <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
        </svg>
      </span>
    </a>
    <!-- <span class="float-element">
      <i class="material-icons">chat</i>
    </span> -->
  </div>
</div>
</div>

<script type="text/javascript" src="https://dabeng.github.io/OrgChart/js/jquery.min.js"></script>
<script type="text/javascript" src="https://dabeng.github.io/OrgChart/js/jquery.orgchart.js"></script>

<script type="text/javascript">
  function transformData(input) {
// console.log(input);
    const userIdMap = {}; // Create a map to store user objects by their userid
    const result = [];

    // Build a map of user objects using userid as the key
    input.forEach((group, ind) => {
      group.forEach((user) => {
        userIdMap[user.name] = user;
        user.children = [];
        user.className = (user.status == 'A') ? 'act' : 'inact';
        user.collapsed=true;
      });
    });

    // Iterate through the input data to build the desired structure
    input.forEach((group) => {
      group.forEach((user) => {
        if (user.parentid === null || !userIdMap[user.parentid]) {
          // This is a top-level user
          result.push(user);
        } else {
          // This user has a parent, add it as a child
          userIdMap[user.parentid].children.push(user);
        }
      });
    });
    return result;
  }
</script>
<script>
  var datascource = {
    'collapsed': true,
    'name': '<?php echo $_SESSION['username'] ?>',
    'title': '<?php echo $_SESSION['title'] ?>',
    'className': 'act',
    children: ''
    
  }
  const TRIVSELIST = <?php geltraverslist()?>

  datascource.children = transformData(TRIVSELIST)
  console.log('TRIVSELIST' , TRIVSELIST);

  $('#chart-container').orgchart({
    'data': datascource,
    'nodeContent': 'title'
    
    
  });

 
  
</script>
<!-- General JS Scripts -->
<?php

function geltraverslist()
{
  $trvlist = array();
  $lvl_1 = ttlrefuser($_SESSION['username']);
  getchildlist($lvl_1, $trvlist);
  //  echo json_encode($output);
}

function ttlrefuser($refid)
{
  include("../configration/dbconnection.php");
  // $refid = $_POST['refid'];
  $result = $conn->prepare("SELECT master_user.id, master_user.user_name, master_user.user_uid, master_user.status FROM `node` INNER JOIN
   master_user on master_user.user_uid = node.userid 
   WHERE `sponcerid` = '$refid' ");
  $result->execute();
  $reflist = array();
  for ($i = 1; $row = $result->fetch(); $i++) {
    $reflist[] = array(
      "title" => $row['user_name'],
      "name" => $row['user_uid'],
      "parentid" => $refid,
      "status" => $row['status']
    );
  }
  return $reflist;
}

function getchildlist($lvl_1, $trvlist)
{

  if (count($lvl_1) > 0) {
    $trvlist[] = $lvl_1;
    // echo json_encode($trvlist);
    $temp_arr = array();
    foreach ($lvl_1 as $value) {
      $temp_arr = array_merge($temp_arr,  ttlrefuser($value['name']));
    }

    getchildlist($temp_arr, $trvlist);
  } else {
    // $trvlist[] = $temp_arr;
    echo json_encode($trvlist);
  }
}




include('footer.php'); ?>