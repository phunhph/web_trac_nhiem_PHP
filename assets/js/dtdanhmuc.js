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
        envenmon();
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
	  <input style="margin-left:2.9em; margin-bottom:1em;width:30em;" type='datetime-local'
		  name='tkt' id='tkt' value=''><br>
	  <span style="margin-left:1em; margin-bottom:1em;">Kết thúc</span>
	  <input style="margin-left:2.5em; margin-bottom:1em;width:30em;" type='datetime-local'
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
        console.log(response);
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
						${element.mabode}
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
function envenmon() {
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
      var data = {
        id: $("#mmt").val(),
        name: $("#tenmt").val(),
        tgbd: $("#tkt").val(),
        tgkt: $("#tkt2").val(),
        id_kt: $("#kythi").val(),
      };
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?controller=addmonthi", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            getmonthi(data.id_kt);
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
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
      var data = {
        id: $("#mmt").val(),
        name: $("#tenmt").val(),
        tgbd: $("#tkt").val(),
        tgkt: $("#tkt2").val(),
        id_kt: $("#kythi").val(),
      };
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?controller=fixmonthi", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            getmonthi(data.id_kt);
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
    }
  });
  $("#delete1").click(function (e) {
    var a;
    a = $("input[id='mmt']").val();
    if (a === "") alert("Không được để trống mã môn thi!");
    else if (confirm("Bạn có chắc chắn xóa môn thi này?")) {
      var data = {
        id: $("#mmt").val(),
        id_kt: $("#kythi").val(),
      };
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?controller=deletemonthi", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
            getmonthi(data.id_kt);
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
    }
  });
}
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
        var data = {
          id: $("#mmt1").val(),
          name: $("#tenmt1").val(),
          monthi: $("#tkt1").val(),
          mamon: $("#monthi_ops").val(),
        };
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php?controller=addnoidungthi", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );

        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              getnoidungthi(data.mamon);
            } else {
              console.error("Lỗi:", xhr.status);
            }
          }
        };

        xhr.send(JSON.stringify(data));
      }
    });
    $("#edit2").click(function (e) {
      var data = {
        id: $("#mmt1").val(),
        name: $("#tenmt1").val(),
        monthi: $("#tkt1").val(),
        mamon: $("#monthi_ops").val(),
      };
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?controller=fixnoidungthi", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            console.log(xhr.responseText);
            getnoidungthi(data.mamon);
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
    });
    $("#delete2").click(function (e) {
      var a;
      a = $("input[id='mmt1']").val();
      if (a === "") alert("Không được để trống dữ liệu!");
      else if (confirm("Bạn chắc chắn xóa kỳ thi này?")) {
        var data = {
          id: $("#mmt1").val(),
          name: $("#tenmt1").val(),
          monthi: $("#tkt1").val(),
          mamon: $("#monthi_ops").val(),
        };
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php?controller=deletenoidungthi", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );

        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              console.log(xhr.responseText);
              getnoidungthi(data.mamon);
            } else {
              console.error("Lỗi:", xhr.status);
            }
          }
        };

        xhr.send(JSON.stringify(data));
      }
    });
    //Bộ nội dung thi
  });
}
