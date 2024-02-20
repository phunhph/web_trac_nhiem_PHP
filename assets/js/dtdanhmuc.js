document.getElementById("kythi").onchange = function () {
  var id = document.getElementById("kythi").value;
  getmonthi(id);
};

// getdata monthi
function getmonthi(id) {
  var id = {
    id: id.toString(),
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getmonthi", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var date = JSON.parse(response);
        rendermonthi(date);
        addAllEvents();
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
}

// render monthi
function rendermonthi(date) {
  var html = "";
  var ops = ` <option value="...">...</option>`;
  if (date.length >= 1) {
    date.forEach((element) => {
      html += "<tr>";
      html +=
        '<td style="text-align:left; padding:0.5em 1em;">' +
        element.mamodun +
        "</td>";
      html +=
        '<td style="text-align:left; padding:0.5em 1em;">' +
        element.tenmodun +
        "</td>";
      html +=
        '<td style="text-align:left; padding:0.5em 1em;">' +
        element.batdau +
        "</td>";
      html +=
        '<td style="text-align:left; padding:0.5em 1em;">' +
        element.ketthuc +
        "</td>";
      html += "</tr>";
      ops += `<option value="${element.mamodun}">
	  ${element.tenmodun}
  </option>`;
    });
    document.getElementById("crud_monthi").innerHTML = `
  <form method="post" id="suamodun">
	  <span style="margin-left:1em; margin-bottom:1em;">Mã môn thi</span>
	  <input style="margin-left:1em; margin-bottom:1em;width:30em;" type='text'
		  name='mmt' id='mmt' value='' autofocus><br>
	  <span style="margin-left:1em; margin-bottom:1em;">Tên môn thi</span>
	  <input style="margin-left:0.8em; margin-bottom:1em;width:30em;" type='text'
		  name='tenmt' id='tenmt' value=''><br>
	  <span style="margin-left:1em; margin-bottom:1em;">Bắt đầu</span>
	  <input style="margin-left:2.9em; margin-bottom:1em;width:30em;" type='text'
		  name='tkt' id='tkt' value=''><br>
	  <span style="margin-left:1em; margin-bottom:1em;">Kết thúc</span>
	  <input style="margin-left:2.5em; margin-bottom:1em;width:30em;" type='text'
		  name='tkt2' id='tkt2' value=''>
  </form>
  <img id="add1" src="assets/image/add.png" width="33" height="33" title="Thêm mới"
	  style="margin-left:4em;margin-top:1em; cursor:pointer;">
  <img id="edit1" src="assets/image/edit.ico" width="33" height="33" title="Sửa"
	  style="margin-left:1em;margin-top:1em; cursor:pointer;">
  <img id="delete1" src="assets/image/delete.png" width="33" height="33" title="Xóa"
	  style="margin-left:1em;margin-top:1em; cursor:pointer;">
`;
  } else {
    var html = ``;
    ops = ` <option value="...">...</option>`;
    document.getElementById("crud_monthi").innerHTML = "";
  }

  document.getElementById("monthi").innerHTML = html;
  document.getElementById("monthi_ops").innerHTML = ops;
}

// getDate nội dung thi
document.getElementById("monthi_ops").onchange = function () {
  var id = document.getElementById("monthi_ops").value;
  getnoidungthi(id);
};
function getnoidungthi(id) {
  var id = {
    id: id.toString(),
  };

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getnoidungthi", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var date = JSON.parse(response);
        rendernoidungthi(date);
        addAllEvents();
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
}

// render nội dung thi

function rendernoidungthi(date) {
  var html = "";
  date.forEach((element, i) => {
    html += `<tr>
					<td style='text-align:left; padding:0.5em 1em;'>
						${element.mabode}${i}
					</td>
					<td style='text-align:left; padding:0.5em 1em;'>
						${element.tenbode}
					</td>
					<td style='text-align:left; padding:0.5em 1em;'>
						${element.tenmodun}
					</td>
					<td style='text-align:left; padding:0.5em 1em;'>
						${element.tenkythi}
					</td>
				</tr>`;
  });

  document.getElementById(
    "crud_noidungthi"
  ).innerHTML = `<form method="post" id="suamodun">
  <span style="margin-left:1em; margin-bottom:1em;">Mã nội dung thi</span>
  <input style="margin-left:1em; margin-bottom:1em;width:30em;" type='text'
	  name='mmt1' id='mmt1' value='' autofocus><br>
  <span style="margin-left:1em; margin-bottom:1em;">Tên nội dung thi</span>
  <input style="margin-left:0.75em; margin-bottom:1em;width:30em;" type='text'
	  name='tenmt1' id='tenmt1' value=''><br>
  <span style="margin-left:1em; margin-bottom:1em;">Tên môn thi</span>
  <input style="margin-left:2.83em; margin-bottom:1em;width:30em;" type='text'
	  name='tkt1' id='tkt1' value=''>
</form>
<img id="add2" src="assets/image/add.png" width="33" height="33" title="Thêm mới"
  style="margin-left:4em;margin-top:1em; cursor:pointer;">
<img id="edit2" src="assets/image/edit.ico" width="33" height="33" title="Sửa"
  style="margin-left:1em;margin-top:1em; cursor:pointer;">
<img id="delete2" src="assets/image/delete.png" width="33" height="33" title="Xóa"
  style="margin-left:1em;margin-top:1em; cursor:pointer;">`;
  document.getElementById("noidungthi").innerHTML = html;
}
addAllEvents();
function addAllEvents() {
  // JavaScript Document
  $(document).ready(function (e) {
    $(".ttb1 tr").click(function (e) {
      $("input[id='mkt']").val($(this).children("td:eq(0)").text());
      $("input[id='tenkt']").val($(this).children("td:eq(1)").text());
      $("input[id='tgbd']").val($(this).children("td:eq(2)").text());
      $("input[id='tgkt']").val($(this).children("td:eq(3)").text());
    });
    $(".ttb2 tr").click(function (e) {
      $("input[id='mmt']").val($(this).children("td:eq(0)").text());
      $("input[id='tenmt']").val($(this).children("td:eq(1)").text());
      $("input[id='tkt']").val($(this).children("td:eq(2)").text());
      $("input[id='tkt2']").val($(this).children("td:eq(3)").text());
    });
    $(".table12 tr").click(function (e) {
      $("input[id='mmt1']").val($(this).children("td:eq(0)").text());
      $("input[id='tenmt1']").val($(this).children("td:eq(1)").text());
      $("input[id='tkt1']").val($(this).children("td:eq(2)").text());
      $("input[id='tkt11']").val($(this).children("td:eq(3)").text());
    });
    $("#add").click(function (e) {
      var a, b, c, d;
      a = $("input[id='mkt']").val();
      b = $("input[id='tenkt']").val();
      c = $("input[id='tgbd']").val();
      d = $("input[id='tgkt']").val();
      if (a === "" || b === "" || c === "" || d === "")
        alert("Không được để trống dữ liệu!");
      else {
        var data = $("#mkt").val();
        var data1 = $("#tenkt").val();
        var data2 = $("#tgbd").val();
        var data3 = $("#tgkt").val();
        $.ajax({
          type: "POST",
          url: "dtdanhmucupdatekt.php",
          data: { d1: data, d2: data1, d3: data2, d4: data3 },
          success: function (data) {
            if (data == "false")
              alert(
                "Kỳ thì đã tồn tại, lưu ý mã các kỳ thi không được trùng nhau"
              );
            else {
              alert("Thêm kỳ thi thành công");
              $(".loadchinh").load("dtdanhmuc.php");
            }
          },
        });
      }
      $(".loadchinh").load("dtdanhmuc.php");
    });
    $("#edit").click(function (e) {
      var a, b, c, d;
      a = $("input[id='mkt']").val();
      b = $("input[id='tenkt']").val();
      c = $("input[id='tgbd']").val();
      d = $("input[id='tgkt']").val();
      if (a === "" || b === "" || c === "" || d === "")
        alert("Không được để trống dữ liệu!");
      else if (confirm("Bạn có chắc chắn sửa đổi?")) {
        var data = $("#mkt").val();
        var data1 = $("#tenkt").val();
        var data2 = $("#tgbd").val();
        var data3 = $("#tgkt").val();
        $.ajax({
          type: "POST",
          url: "dtdanhmucupdatektthem.php",
          data: { d1: data, d2: data1, d3: data2, d4: data3 },
          success: function (data) {
            if (data == "false") alert("Lỗi");
            else {
              alert("Đã sửa thành công");
              $(".loadchinh").load("dtdanhmuc.php");
            }
          },
        });
      }
    });
    $("#delete").click(function (e) {
      var a, b, c, d;
      a = $("input[id='mkt']").val();
      b = $("input[id='tenkt']").val();
      c = $("input[id='tgbd']").val();
      d = $("input[id='tgkt']").val();
      if (a === "" || b === "" || c === "" || d === "")
        alert("Không được để trống dữ liệu!");
      else if (confirm("Bạn chắc chắn xóa kỳ thi này?")) {
        var data = $("#mkt").val();
        $.ajax({
          type: "POST",
          url: "dtdanhmucupdatektxoa.php",
          data: { d1: data },
          success: function (data) {
            //alert(data);
            if (data == "false") alert("Lỗi");
            else {
              alert("Đã xóa");
              $(".loadchinh").load("dtdanhmuc.php");
            }
          },
        });
      }
    });
    //kỳ thi

    $("#add1").click(function (e) {
      var a, b, c, d;
      a = $("input[id='mmt']").val();
      b = $("input[id='tenmt']").val();
      c = $("input[id='tkt']").val();
      d = $("input[id='tkt2']").val();
      if (a === "" || b === "" || c === "" || d === "")
        alert("Không được để trống dữ liệu!");
      else if (confirm("Bạn chắc chắn thêm môn thi này?")) {
        var data = $("#mmt").val();
        var data1 = $("#tenmt").val();
        var data2 = $("#tkt").val();
        var data3 = $("#tkt2").val();
        $.ajax({
          type: "POST",
          url: "dtdanhmucupdatemt.php",
          data: { d1: data, d2: data1, d3: data2, d4: data3 },
          success: function (e) {
            if (e == "false")
              alert(
                "Môn thi đã tồn tại, lưu ý mã các môn thi không được trùng nhau"
              );
            else {
              alert("Đã thêm môn thi");
              $(".loadchinh").load("dtdanhmuc.php");
            }
          },
        });
      }
    });

    $("#edit1").click(function (e) {
      var a, b, c, d;
      a = $("input[id='mmt']").val();
      b = $("input[id='tenmt']").val();
      c = $("input[id='tkt']").val();
      d = $("input[id='tkt2']").val();
      if (a === "" || b === "" || c === "" || d === "")
        alert("Không được để trống dữ liệu!");
      else if (confirm("Bạn có chắc chắn sửa đổi?")) {
        var data = $("#mmt").val();
        var data1 = $("#tenmt").val();
        var data2 = $("#tkt").val();
        var data3 = $("#tkt2").val();
        $.ajax({
          type: "POST",
          url: "dtdanhmucupdatemtthem.php",
          data: { d1: data, d2: data1, d3: data2, d4: data3 },
          success: function (data) {
            if (data == "false") alert("Lỗi");
            else {
              alert("Đã sửa môn thi");
              $(".loadchinh").load("dtdanhmuc.php");
            }
          },
        });
      }
    });
    $("#delete1").click(function (e) {
      var a;
      a = $("input[id='mmt']").val();
      if (a === "") alert("Không được để trống mã môn thi!");
      else if (confirm("Bạn có chắc chắn xóa môn thi này?")) {
        var data = $("#mmt").val();
        $.ajax({
          type: "POST",
          url: "dtdanhmucupdatemtxoa.php",
          data: { d1: data },
          success: function (data) {
            if (data == "false") alert("Lỗi");
            else {
              alert("Đã xóa môn thi");
              $(".loadchinh").load("dtdanhmuc.php");
            }
          },
        });
      }
    });
    //Môn thi

    $("#add2").click(function (e) {
      //Tiếp tục từ đây
      var a, b, c;
      a = $("input[id='mmt1']").val();
      b = $("input[id='tenmt1']").val();
      c = $("input[id='tkt1']").val();
      if (a === "" || b === "" || c === "")
        alert("Không được để trống dữ liệu!");
      else if (confirm("Thêm nội dung này?")) {
        var data = $("#mmt1").val();
        var data1 = $("#tenmt1").val();
        var data2 = $("#tkt1").val();
        $.ajax({
          type: "POST",
          url: "dtdanhmucupdatend.php",
          data: { d1: data, d2: data1, d3: data2 },
          success: function (data) {
            if (data == "false")
              alert(
                "Nôi dung thi đã tồn tại, lưu ý mã các nội dung thi không được trùng nhau"
              );
            else {
              alert("Thêm nội dung thi thành công");
              $(".loadchinh").load("dtdanhmuc.php");
            }
          },
        });
      }
    });
    $("#edit2").click(function (e) {
      var a, b, c;
      a = $("input[id='mmt1']").val();
      b = $("input[id='tenmt1']").val();
      c = $("input[id='tkt1']").val();
      if (a === "" || b === "" || c === "")
        alert("Không được để trống dữ liệu!");
      else if (confirm("Bạn chắc chắn nội dung này?")) {
        var data = $("#mmt1").val();
        var data1 = $("#tenmt1").val();
        var data2 = $("#tkt1").val();
        $.ajax({
          type: "POST",
          url: "dtdanhmucupdatendthem.php",
          data: { d1: data, d2: data1, d3: data2 },
          success: function (data) {
            //alert(data);
            if (data == "false") alert("Lỗi");
            else {
              alert("Đã sửa");
              $(".loadchinh").load("dtdanhmuc.php");
            }
          },
        });
      }
    });
    $("#delete2").click(function (e) {
      var a;
      a = $("input[id='mmt1']").val();
      if (a === "") alert("Không được để trống dữ liệu!");
      else if (confirm("Bạn chắc chắn xóa kỳ thi này?")) {
        var data = $("#mmt1").val();
        $.ajax({
          type: "POST",
          url: "dtdanhmucupdatendxoa.php",
          data: { d1: data },
          success: function (data) {
            //alert(data);
            if (data == "false") alert("Lỗi");
            else {
              alert("Đã xóa");
              $(".loadchinh").load("dtdanhmuc.php");
            }
          },
        });
      }
    });
    //Bộ nội dung thi
  });
}
