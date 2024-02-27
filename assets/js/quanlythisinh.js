document.getElementById("kythi").onchange = function () {
  var id = document.getElementById("kythi").value;
  getlop(id);
  document.getElementById(
    "thisinh"
  ).innerHTML = `<td valign="top" style="text-align: center;" colspan="8" class="dataTables_empty">No data available in table</td>`;
};
function getlop(id) {
  var data = {
    id: id,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getphongthi", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);
        renderPhong(data);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(data));
}
function renderPhong(date) {
  var html = `<option value="...">...</option>`;
  if (date.length > 0) {
    date.forEach((element) => {
      html += `<option value='${element}'>${element}</option>`;
    });
  }
  document.getElementById("phong").innerHTML = html;
}
// lấy dữ liệu và hiển thị dữ lieeuj sinh vien
document.getElementById("phong").onchange = function () {
  var phong = document.getElementById("phong").value;
  var ky = document.getElementById("kythi").value;
  getSinhVien(ky, phong);
};
function getSinhVien(ky, phong) {
  var data = {
    makythi: ky,
    tenphong: phong,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getthisinh", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);

        renderSinhVien(data);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };
  xhr.send(JSON.stringify(data));
}

function renderSinhVien(data) {
  var html = "";
  if (data.length >= 1) {
    data.forEach((element) => {
      html += `<tr>
            <td>${element.sbd}</td>
            <td>${element.hodem}</td>
            <td>${element.ten}</td>
            <td>${element.ngaysinh}</td>
            <td>${element.noisinh}</td>
            <td>${element.madonvi}</td>
            <td>${element.tendonvi}</td>
            <td>${element.tenphongthi}</td>
        </tr>`;
    });
  } else {
    html = `<td valign="top" style="text-align: center;" colspan="8" class="dataTables_empty">No data available in table</td>`;
  }
  document.getElementById("thisinh").innerHTML = html;
  addEvent();
}
addEvent();
function addEvent() {
  $("tr").click(function (e) {
    $("input[id='sbd']").val($(this).children("td:eq(0)").text());
    $("input[id='hodem']").val($(this).children("td:eq(1)").text());
    $("input[id='ten']").val($(this).children("td:eq(2)").text());
    $("input[id='ns']").val($(this).children("td:eq(3)").text());
    $("input[id='noisinh']").val($(this).children("td:eq(4)").text());
    $("input[id='madonvi']").val($(this).children("td:eq(5)").text());
    $("input[id='tendonvi']").val($(this).children("td:eq(6)").text());
    $("input[id='phongthi']").val($(this).children("td:eq(7)").text());
  });
  $("#refresh").click(function (e) {
    $("input[id='sbd']").val("");
    $("input[id='sbd']").focus();
    $("input[id='hodem']").val("");
    $("input[id='ten']").val("");
    $("input[id='ns']").val("");
    $("input[id='madonvi']").val("");
    $("input[id='tendonvi']").val("");
    $("input[id='phongthi']").val("");
  });
  var key = false;
  $("*")
    .keydown(function (e) {
      if (e.keyCode == 67) key = true;
    })
    .keyup(function (e) {
      if (e.keyCode == 67) key = false;
    })
    .keydown(function (e) {
      if (key) {
        if (e.keyCode == 65) {
          $("body").css("overflow", "hidden");
          $(".over").css("display", "block");
        }
      }
    });

  $("#sexit").click(function (e) {
    $("body").css("overflow", "visible");
    $(".over").css("display", "none");
    $("#search").val("");
  });

  $("#Sb").click(function (e) {
    var data = $("#search").val();
    $.ajax({
      type: "post",
      url: "sbdtemp.php",
      data: {
        id: data,
      },
      success: function (data) {
        if (data == "true") alert("Thí sinh có trong danh sách thi");
        else alert("Thí sinh này không tồn tại");
      },
    });
  });
}
crud();
function reload() {
  $("input[id='sbd']").val("");
  $("input[id='hodem']").val("");
  $("input[id='ten']").val("");
  $("input[id='ns']").val("");
  $("input[id='noisinh']").val("");
  $("input[id='madonvi']").val("");
  $("input[id='tendonvi']").val("");
  $("input[id='phongthi']").val("");
}
function crud() {
  $("#add").click(function (e) {
    var a, b, c, d, e, f;
    a = $("input[id='sbd']").val();
    b = $("input[id='hodem']").val();
    c = $("input[id='ten']").val();
    d = $("input[id='ns']").val();
    e = $("input[id='madonvi']").val();
    f = $("input[id='tendonvi']").val();
    g = $("input[id='phongthi']").val();
    if (
      a === "" ||
      b === "" ||
      c === "" ||
      d === "" ||
      e === "" ||
      f === "" ||
      g === ""
    )
      alert("Bạn cần nhập đủ thông tin!");
    else {
      var data = {
        sbd: a,
        hodem: b,
        ten: c,
        noisinh: document.getElementById("noisinh").value,
        ngaysinh: d,
        madonvi: e,
        tendonvi: f,
        phongthi: g,
        kythi: document.getElementById("kythi").value,
      };
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?controller=createthisinh", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // console.log(xhr.responseText);
            if (xhr.responseText === "true") {
              alert(
                "Học viên đã tồn tại, lưu ý mã học viên không được trùng nhau"
              );
            } else {
              alert("Thêm học viên thành công");
              getlop(data.kythi);
              reload();
            }
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
    }
  });

  $("#edit").click(function (e) {
    var a, b, c, d, e, f;
    a = $("input[id='sbd']").val();
    b = $("input[id='hodem']").val();
    c = $("input[id='ten']").val();
    d = $("input[id='ns']").val();
    e = $("input[id='madonvi']").val();
    f = $("input[id='tendonvi']").val();
    g = $("input[id='phongthi']").val();
    if (
      a === "" ||
      b === "" ||
      c === "" ||
      d === "" ||
      e === "" ||
      f === "" ||
      g === ""
    )
      alert("Bạn cần nhập đủ thông tin!");
    else {
      var data = $("#update").serialize();
      $.ajax({
        type: "POST",
        url: "editthisinh.php",
        data: data,
        success: function (data) {
          //alert(data);
          if (data == "true") {
            var ajax = new XMLHttpRequest();
            var dat = new FormData();

            function g() {
              dat.append(
                "profile",
                document.querySelector("#pictureprofile").files[0]
              );

              ajax.onreadystatechange = function (e) {
                if (ajax.status == 200 && ajax.readyState == 4) {
                  //alert(ajax.responseText);
                }
              };
              ajax.open("POST", "qthtaddprofile.php");
              ajax.send(dat);
            }
            g();
            alert("Cập nhật thành công");
            $(".loadchinh").load("qtht.php");
          } else
            alert(
              "Không thể cập nhật, lưu ý: bạn không được thay đổi số báo danh và mã đơn vị của thí"
            );
        },
      });
    }
  });

  $("#delete").click(function (e) {
    var id = $("input[id='sbd']").val();
    if (id !== null) {
      var data = $("#update").serialize();
      $.ajax({
        type: "post",
        url: "xoathisinh.php",
        data: data,
        success: function (data) {
          if (data === "true") {
            alert("Xóa thí sinh thành công!");
            $(".loadchinh").load("qtht.php");
          } else alert("Thí sinh không tồn tại!");
        },
      });
    }
  });
}
