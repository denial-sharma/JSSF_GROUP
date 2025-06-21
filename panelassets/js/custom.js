// delete section



function activeuser(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/updatepage/activeuser.php",
    data: { aid: id },
    success: function (msg) {
      alert(msg);
      window.location.href = "inactive_user.php";
    },
  });
}

// function deleteuser(id) {
//   alert(id);
//   $.ajax({
//     type: "POST",
//     url: "../admin/ajax_page/delete_pages/deleteuser.php",
//     data: { aid: id },
//     success: function (msg) {
//       alert(msg);
//       window.location.href = "active_user.php";
//     },
//   });
// }

function inactiveuser(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/updatepage/inactiveuser.php",
    data: { inaid: id },
    success: function (msg) {
      alert(msg);
      window.location.href = "active_user.php";
    },
  });
}

function deleteslideshow(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/delete_pages/slideshowdelete.php",
    data: { sid: id },
    success: function (msg) {
      alert(msg);
      window.location.href = "slide_show.php";
    },
  });
}

function deleteadv(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/delete_pages/librarydelete.php",
    data: { lid: id },
    success: function (msg) {
      alert(msg);
      window.location.href = "advertise.php";
    },
  });
}

function deletenews(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/delete_pages/newsdelete.php",
    data: { nid: id },
    success: function (msg) {
      alert(msg);
      window.location.href = "news.php";
    },
  });
}

function deletetestimonial(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/delete_pages/testimonialdelete.php",
    data: { tid: id },
    success: function (msg) {
      alert(msg);
      window.location.href = "testimonial.php";
    },
  });
}

function deleteabout(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/delete_pages/aboutdelete.php",
    data: { aboutid: id },
    success: function (msg) {
      alert(msg);
      window.location.href = "about.php";
    },
  });
}

function deleteteacher(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/delete_pages/teacherdelete.php",
    data: { teacherid: id },
    success: function (msg) {
      alert(msg);
      window.location.href = "teacher.php";
    },
  });
}

// update section

function eventupdate(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/updatepage/eventupdate.php",
    data: { eid: id },
    success: function (msg) {
      var eventarray = msg.split(",");
      $("#updatestatus").val(eventarray[0]);
      $("#ename").val(eventarray[1]);
      $("#edate").val(eventarray[2]);
      $("#etime").val(eventarray[3]);
      $("#elocation").val(eventarray[4]);
      $("#edetails").val(eventarray[5]);

      //  window.location.href = "event.php";
    },
  });
}


function advupdate(id) {
  $.ajax({
    type: "POST",
    url: "../admin/ajax_page/updatepage/libraryupdate.php",
    data: { lid: id },
    success: function (msg) {
      var facilityarray = msg.split(",");
      $("#updatestatus").val(facilityarray[0]);
      $("#bname").val(facilityarray[1]);
    },
  });
}


