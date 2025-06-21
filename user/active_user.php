<?php include("header.php") ?>
<style>
  .usercard{
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
  }
  .activecard{
    color:white;
    background-color: orange;
  }
  </style>
<body>
  <?php include("loader.php") ?>

  <?php include("side_menu_bar.php") ?>
  <?php
  require_once('include/function/spl_autoload_register.php');
  $fetchrecordobj = new fetchrecord;
  // $ttluser = $fetchrecordobj->ttlrefuser();
  ?>

  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-md-5 col-4"></div>
          <div class="col-4 col-lg-2 ">
            <div class="card" id="card_<?php echo $_SESSION['username'] ?>">
              <div class="card-body card-type-3">
                <div class="usercard" >
                  <!-- <div class="col-auto">
                    <div class="card-circle l-bg-orange text-white">
                      <?php //echo $ttluser['cnt'];
                      ?>
                    </div>
                  </div> -->
                  <span> <?php echo $_SESSION['username']?></span>
                  <span class="btn btn-sm btn-info" onclick="getrefuser('<?php echo $_SESSION['username'] ?>',0)">View</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-4 "></div>
        </div>
        <div class=" container-fluid" id="refdiv">

        </div>
      </div>
    </section>
  </div>
  <script>
   
    var userlistdiv = document.getElementById('refdiv');

    function getrefuser(refid, _userlvl) {
     
    
      $.ajax({
        type: "POST",
        url: "ajax_page/getrefuser.php",
        data: {
          refid: refid
        },
        success: function(msg) {
          removeuserrow(_userlvl)
          adduserrow(msg, _userlvl);
          setactivecard(refid)
          // $('#refdiv').empty();
          // $('#refdiv').append(msg);
        },
        error: function(xhr) {
          swal("Error", xhr, "warning");
        }
      })
     
    }

    function setactivecard(id){
      try {
        var activecard = document.getElementsByClassName('activecard');
        if(activecard.length > 0){
          const element = document.getElementsByClassName('activecard')[0];
          element.classList.remove("activecard");
        }
       
        var rmrow = document.getElementById("card_" + id);
          if(rmrow){
            rmrow.classList.add("activecard");
          }
      } catch (error) {
        console.log("setactivecard",error)
      }
     

    }

    function adduserrow(userlist, userlvl) {
      userlvl++ ;
      console.log(userlist, userlvl);
      var row = document.createElement('div');
      row.classList.add("row");
      row.id = "userrw" + userlvl;
      var rowdt = "";
      userlist.forEach(element => {
        rowdt = rowdt + `<div class="col-4 col-lg-4 ">
            <div class="card"   id="card_${element.userid}">
              <div class="card-body">
                <div class="usercard">
                  <span>${element.userid}</span>
                  <span class="btn btn-sm  btn-info" onclick="getrefuser('${element.userid}',${userlvl})">View</span>
                </div>
              </div>
            </div>
          </div>`
      });
      row.innerHTML = rowdt;
      userlistdiv.append(row)
    }

    function removeuserrow(id) {
      let divrowcnt =  userlistdiv.childElementCount;
      if (id <divrowcnt) {
        for (id; id <= divrowcnt; id++) {
          var rmrow = document.getElementById("userrw" + (id+1));
          if(rmrow){
          rmrow.remove();
          }
          console.log("removeuserrow",id+1,divrowcnt)
        }
      }

    }
  </script>
<?php include('footer.php'); ?>