<?php include("header.php");
//error_reporting(0);
//ini_set('display_errors', 0);
include("loader.php");

include("side_menu_bar.php");

$userid = $_SESSION['id'];
$user_Uid = $_SESSION['username'];
if (isset($userid) && $userid != "") {
    require_once('include/function/spl_autoload_register.php');
    $fetchrecordobj = new fetchrecord;
    // $ttluser = $fetchrecordobj->ttlrefuser();
} else {
    header('Location: index.php'); //redirect URL
}
?>
<?php include('levelreport_API.php');
?>
<?php //include('magic_pool_1_API.php') 
?>
<?php //include('manual_pool_walletAPI.php') 
?>

<div class="main-content" style="padding-top: 100px;">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Level Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="withdrwal mt-4">
                                <h6>Select Level:</h6>
                                <input type="hidden" name="userid" value="<?php echo $user_Uid ?>">
                                <select name="levelrepot" id="levelrepot" class="form-control">
                                    <option selected disabled>Select Level</option>
                                    <option value="1">Level 1 </option>
                                    <option value="2">Level 2</option>
                                    <option value="3">Level 3</option>
                                    <option value="4">Level 4</option>
                                    <option value="5">Level 5</option>
                                    <option value="6">Level 6</option>
                                    <option value="7">Level 7</option>
                                    <option value="8">Level 8</option>
                                    <option value="9">Level 9</option>
                                    <option value="10">Level 10</option>
                                    <option value="11">Level 11</option>
                                    <option value="12">Level 12</option>
                                    <option value="13">Level 13</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Level Report List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class=" table table-bordered border-primary" id="mytable">
                                    <thead class="bg-dark">
                                        <tr>
                                            <th class="text-white">Sn.no</th>
                                            <th class="text-white">Level</th>
                                            <th class="text-white">Number Of Person</th>
                                        </tr>
                                    </thead>
                                    <tbody id="outputTable">

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
                        <span class="float-element tooltip-left">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="height: 25px;width: 25px;">
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    const aaray = <?php echo json_encode($organizedArray); ?>;
    var tbodycontent = ''
    

    $('#levelrepot').change(function() {
        var level = document.getElementById('levelrepot').value;

        for (let index = 1; index < array.length; index++) {

            if (level == '1') {
                $('#outputTable').empty();
                var valueOfArray = array[0];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '2') {
                $('#outputTable').empty();
                var valueOfArray = array[1];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '3') {
                $('#outputTable').empty();
                var valueOfArray = array[2];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '4') {
                $('#outputTable').empty();
                var valueOfArray = array[3];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '5') {
                $('#outputTable').empty();
                var valueOfArray = array[4];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '6') {
                $('#outputTable').empty();
                var valueOfArray = array[5];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '7') {
                $('#outputTable').empty();
                var valueOfArray = array[6];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '8') {
                $('#outputTable').empty();
                var valueOfArray = array[7];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '9') {
                $('#outputTable').empty();
                var valueOfArray = array[8];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '10') {
                $('#outputTable').empty();
                var valueOfArray = array[9];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '11') {
                $('#outputTable').empty();
                var valueOfArray = array[10];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '12') {
                $('#outputTable').empty();
                var valueOfArray = array[11];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No Person available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
            if (level == '13') {
                $('#outputTable').empty();
                var valueOfArray = array[12];
                if(!valueOfArray || valueOfArray.length === 0){
                    alert("No data available");
                }else{
                    tbodycontent = tbodycontent + `<tr>
                <td class="text-danger font-weight-bold">${index}</td>
                <td class="text-danger font-weight-bold">${level}</td>
                <td class="text-danger font-weight-bold">${valueOfArray.length}</td>
              </tr>`;
              $('#outputTable').append(tbodycontent);
              tbodycontent="";
                }
                break;
            }
        }



    })
</script>
<!-- General JS Scripts -->
<?php include('footer.php'); ?>