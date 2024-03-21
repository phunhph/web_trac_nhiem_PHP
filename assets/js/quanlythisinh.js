document.getElementById("kythi").onchange = function () {
  var id = document.getElementById("kythi").value;
  getlop(id, null);
  reload();
};
function getlop(id, ast) {
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
        renderPhong(data, ast);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };
  xhr.send(JSON.stringify(data));
}
function renderPhong(date, ast) {
  if (ast == null) {
    var html = `<option value="...">...</option>`;
    if (date.length > 0) {
      date.forEach((element) => {
        html += `<option value='${element}'>${element}</option>`;
      });
    }
  } else {
    var html = `<option value="...">...</option>`;
    if (date.length > 0) {
      date.forEach((element) => {
        if (element == ast) {
          html += `<option value='${element}' selected>${element}</option>`;
        } else {
          html += `<option value='${element}'>${element}</option>`;
        }
      });
    }
  }
  document.getElementById("phong").innerHTML = html;
  document.getElementById(
    "thisinh"
  ).innerHTML = `<td valign="top" style="text-align: center;" colspan="8" class="dataTables_empty">No data available in table</td>`;
}
// lấy dữ liệu và hiển thị dữ lieeuj sinh vien
document.getElementById("phong").onchange = function () {
  var phong = document.getElementById("phong").value;
  var ky = document.getElementById("kythi").value;
  getSinhVien(ky, phong);
  reload();
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
              var mes = "Thêm học viên thành công";
              showSuccessMessage(mes);
              getlop(data.kythi, data.phongthi);
              getSinhVien(data.kythi, data.phongthi);
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
      xhr.open("POST", "index.php?controller=updatethisinh", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            if (xhr.responseText === "true") {
              var mes = "Cập nhật thông tin thành công";
              showSuccessMessage(mes);
              getlop(data.kythi, data.phongthi);
              getSinhVien(data.kythi, data.phongthi);
              reload();
            } else {
              alert("Không được thay đổi 'Số Báo Danh'");
            }
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
    }
  });

  $("#delete").click(function (e) {
    if (confirm("Xác nhận xoá học viên")) {
      var data = {
        sbd: $("input[id='sbd']").val(),
        kythi: document.getElementById("kythi").value,
        phongthi: $("input[id='phongthi']").val(),
      };
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?controller=deletethisinh", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var mes = "Xoá học viên thành công";
            showSuccessMessage(mes);
            reload();
            getlop(data.kythi, data.phongthi);
            getSinhVien(data.kythi, data.phongthi);
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
    }
  });
}
function showSuccessMessage(mes) {
  var successMessage = document.createElement("div");
  successMessage.textContent = mes;
  successMessage.classList.add("success-message");
  document.body.appendChild(successMessage);

  // Ẩn thông báo sau 3 giây
  setTimeout(function () {
    document.body.removeChild(successMessage);
  }, 3000);
}
document.getElementById("dlpassword").onclick = function () {
  var data = {
    kythi: document.getElementById("kythi").value,
    phong: document.getElementById("phong").value,
  };

  if (data.kythi === "..." || data.phong === "...") {
    alert("Vui lòng chọn kỳ thi và phòng");
  } else {
    fetch("index.php?controller=dlpassword", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok");
        }
        return response.blob();
      })
      .then((blob) => {
        // Tạo một đường dẫn đến file Excel
        const url = window.URL.createObjectURL(blob);

        // Tạo một phần tử a để tải xuống file Excel
        const a = document.createElement("a");
        a.href = url;
        a.download = "example.xlsx";

        // Thêm phần tử a vào body và click tự động để tải xuống file Excel
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);
      })
      .catch((error) => {
        console.error("Lỗi:", error.message);
      });
  }
};

document.getElementById("upload").addEventListener("submit", function (e) {
  e.preventDefault();

  var fileInput = document.getElementById("uploads");
  var file = fileInput.files[0];

  var makythi = document.getElementById("kythi").value;

  if (file && makythi !== "...") {
    var formData = new FormData();
    formData.append("upf", file);
    formData.append("makythi", makythi);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php?controller=createthisinhByexcel", true);

    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
        var responseData = xhr.responseText;
        var data = JSON.parse(responseData);
        // Kiểm tra xem có lỗi không
        if (data.error) {
          alert("Lỗi từ máy chủ: " + data.error);
        } else {
          // Thực hiện các hành động khác dựa trên dữ liệu nhận được
          renderExcel(data.success, data.phong);
        }
      } else {
        console.error("Có lỗi xảy ra khi gửi yêu cầu.");
      }
    };

    xhr.onerror = function () {
      console.error("Đã xảy ra lỗi trong quá trình gửi yêu cầu.");
    };

    xhr.send(formData);
  } else {
    if (file) {
      alert("Vui lòng nhập mã kỳ thi.");
    } else if (makythi !== "...") {
      alert("Vui lòng chọn file.");
    } else {
      alert("Vui lòng chọn file và nhập mã kỳ thi.");
    }
  }
});

function renderExcel($data, $phong) {
  var datalist = [];
  if ($phong) {
    var tenphong = $phong.tenphongthi;
    var soluong = 28 - $phong.solong;
  } else {
    var tenphong = "Phòng 1";
    var soluong = 28;
  }
  var checkaddexcel = true;
  var countadd = 0;
  $data.forEach((element) => {
    countadd++;
    if (soluong != 0) {
      datalist.push({
        sbd: element.sbd,
        hodem: element.hodem,
        ten: element.ten,
        ngaysinh: element.ngaysinh,
        noisinh: element.noisinh,
        madonvi: element.madonvi,
        tendonvi: element.tendonvi,
        tenphong: tenphong,
        makythi: document.getElementById("kythi").value,
      });
      soluong--;
    } else {
      soluong = 27;
      var soPhong = parseInt(tenphong.split(" ")[1]) + 1;
      tenphong = "Phòng " + soPhong;
      datalist.push({
        sbd: element.sbd,
        hodem: element.hodem,
        ten: element.ten,
        ngaysinh: element.ngaysinh,
        noisinh: element.noisinh,
        madonvi: element.madonvi,
        tendonvi: element.tendonvi,
        tenphong: tenphong,
        makythi: document.getElementById("kythi").value,
      });
    }
  });
  createByExcel(datalist);
}

function createByExcel(data) {
  var datacreate = {
    datacreate: data,
  };
  var xhr = new XMLHttpRequest();
  xhr.open(
    "POST",
    "index.php?controller=createthisinhByExcelAddDatabase",
    true
  );
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        if (xhr.responseText == "true") {
          alert("Học viên đã tồn tại, lưu ý mã học viên không được trùng nhau");
        } else {
          var mes = "Thêm học viên thành công";
          showSuccessMessage(mes);
          getlop(data[0].makythi, data[0].tenphong);
          getSinhVien(data[0].makythi, data[0].tenphong);
          reload();
          console.log(xhr.responseText);
          window.scrollTo({
            top: 0,
            behavior: "smooth",
          });
        }
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(datacreate));
}
