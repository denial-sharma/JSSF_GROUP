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

  .modal-backdrop.show {
    opacity: 0;
  }
</style>


<?php include("loader.php") ?>

<?php include("side_menu_bar.php") ?>
<?php
$userid = $_SESSION['id'];
if (isset($userid) && $userid != "") {
  require_once('include/function/spl_autoload_register.php');
  $fetchrecordobj = new fetchrecord;
  $ttLreUser = $fetchrecordobj->ttLreUser();
} else {
  header('Location: index.php'); //redirect URL
}
include('manual_pool_walletAPI.php');
// include('matrix_bonus_income_api.php');


?>

<div class="main-content" style="padding-top: 100px;">
  <!-- For Assgin Patented id  -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="assignChildLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Assgin Parent to <span id="assignChildLabel"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="parentIdSelect">Select Parent Id</label>
            <select class="form-control" id="parentIdSelect">

            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="assginPreant()">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <!-- End Of Assgin Patented id  -->


  <section class="section">
    <div class="section-body">
      <h4>My Reffler List</h4>

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-9 col-md-12">
            <div id="chart-container" class="bg-white">
              </div>
                <div class="card mt-4">
                  <div class="card-header">
                    <h4> Wallet</h4>
                  </div>
                  <div class="card-body">
                    <h5>
                      Referral Amount : <label class="text-success">₹<?php echo $manualPoolWallet ?></label>
                    </h5>
                    <h5>
                      Level Amount : <label class="text-success">₹<?php echo $levelIncome ?></label>
                    </h5>

                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="card" style="overflow: scroll;">
                <table class="table">
                  <thead>
                    <tr>
                      <th>User Id</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="reflerUserListTbody">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
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

  </section>

</div>

<script type="text/javascript" src="https://dabeng.github.io/OrgChart/js/jquery.min.js"></script>
<script type="text/javascript" src="https://dabeng.github.io/OrgChart/js/jquery.orgchart.js"></script>

<script type="text/javascript">
  var leveluser = [];


  function transformData(input) {
    leveluser = input;
    // console.log(input );
    const userIdMap = {}; // Create a map to store user objects by their userid
    const result = [];

    // Build a map of user objects using userid as the key
    input.forEach((group, ind) => {
      group.forEach((user) => {
        userIdMap[user.name] = user;
        user.children = [];
        user.className = (user.status == 'A') ? 'act' : 'inact';
        user.collapsed = true;
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

  function assginPreant() {

    var childId = document.getElementById('assignChildLabel').innerText;
    var preantId = document.getElementById('parentIdSelect').value;
    $.ajax({
      type: "POST",
      url: "udateuserassgin.php",
      data: {
        childId: childId,
        preantId: preantId
      },
      success: function(msg) {
        swal.fire({
          title: "Note",
          text: msg,
          icon: "success",
          button: "OK",
        }).then(function() {
          location.reload();
        });
      },
      error: function(xhr) {
        swal.fire("Error", xhr, "warning");
      }
    });
  }



  function assginButtonclick(childId) {
    //  console.log(childId, leveluser , JSON.stringify(leveluser, null, 2));


    var parentCount = [{
      parentId: '<?php echo $_SESSION["username"] ?>',
      childCount: 0
    }];
    leveluser.map(val => {
      val.forEach(elem => {
        var isName = true;
        for (let i = 0; i < parentCount.length; i++) {

          if (parentCount[i].parentId == elem.name) {
            isName = false;
          }
          if (parentCount[i].parentId === elem.parentid) {
            // Increment the count
            parentCount[i].childCount += 1;
            break;
          }

        }

        if (isName) {
          parentCount.push({
            parentId: elem.name,
            childCount: 0
          })
        }
      })
    })

    // console.log(parentCount)

    var selectElement = document.getElementById("parentIdSelect");
    while (selectElement.firstChild) {
      selectElement.removeChild(selectElement.firstChild);
    }

    var assignChildLabel = document.getElementById("assignChildLabel");
    assignChildLabel.innerText = childId;
    parentCount.map(val => {
      // console.log(item);
      if (val.childCount < 3){
        var option = document.createElement("option");
        option.value = val.parentId;
        option.text = val.parentId;
        selectElement.appendChild(option);

      }

    })

    console.log('parentCount', parentCount)
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
  var _datachild = transformData(<?php geltraverslist() ?>);
  datascource.children = _datachild;
  // console.log('datachild', _datachild);

  $('#chart-container').orgchart({
    'data': datascource,
    'nodeContent': 'title'
  });



  function getuserreflerlist(userid) {
    var tbodycontent = ''

    $.ajax({
      type: "POST",
      url: "getrefleridAPI.php",
      data: {
        userid: userid
      },
      success: function(msg) {


        try {
          msg.map(val => {
            if (val.manual_pool == '' || val.manual_pool == null) {
               console.log(val.userid);  
              tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${val.userid}</td>
                <td><button class="btn btn-primary btn-sm" onclick="assginButtonclick('${val.userid}')" data-toggle="modal" data-target="#exampleModal"> Assgin</button></td>
              </tr>`

            } else {
              tbodycontent = tbodycontent + `<tr>
                <td class="text-success font-weight-bold">${val.userid}</td>
              </tr>`
            }
            // console.log(val);

          })

          var tdbodyData = document.getElementById('reflerUserListTbody');
          tdbodyData.innerHTML = tbodycontent;

        } catch (error) {
          sweetAlert("Error", error, "warning");
        }
      },
      error: function(xhr) {
        sweetAlert("Error", xhr, "warning");
      }
    });

  }
  getuserreflerlist('<?php echo $_SESSION["username"] ?>');
</script>
<!-- General JS Scripts -->
<?php


function gelTraversList()
{
  $trvList = array();
  $level_1 = ttLreUser($_SESSION['username']);
  getChildList($level_1, $trvList);
  //  echo json_encode($output);
}

function ttLreUser($refid)
{
  include("../configration/dbconnection.php");
  // $refid = $_POST['refid'];
  $assginResult = $conn->prepare("SELECT master_user.id, master_user.user_name, master_user.user_uid, master_user.status FROM `node` INNER JOIN
   master_user on master_user.user_uid = node.userid 
   WHERE node.manual_pool = '$refid' and master_user.`status`='A' ");
  $assginResult->execute();
  $refList = array();
  for ($i = 1; $row = $assginResult->fetch(); $i++) {
    $refList[] = array(
      "title" => $row['user_name'],
      "name" => $row['user_uid'],
      "parentid" => $refid,
      "status" => $row['status']
    );
  }

  return $refList;
}

function getChildList($level_1, $trvList)
{

  if (count($level_1) > 0) {
    $trvList[] = $level_1;
    // echo json_encode($trvList);
    $temp_Arr = array();
    foreach ($level_1 as $value) {
      $temp_Arr = array_merge($temp_Arr,  ttLreUser($value['name']));
    }

    getChildList($temp_Arr, $trvList);
  } else {
    // $trvList[] = $temp_Arr;
    echo json_encode($trvList);
  }
}




include('footer.php'); ?>