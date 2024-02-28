$("#kythi").change(function (e) {
  (id = document.getElementById("kythi").value), getmothi(id);
  getbode(id);
  reload();
});

function getmothi(data) {
  var id = {
    id: data,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getmonthi", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);
        rendermonthi(data);
        var temp = [];
        rendercauhoi(temp);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
}
function rendermonthi(data) {
  var html = `<option value="all">--Chọn môn thi--</option>`;
  if (data.length >= 1) {
    data.forEach((element) => {
      html += `<option value="${element.mamodun}">${element.tenmodun}</option>`;
    });
  }
  document.getElementById("monthi").innerHTML = html;
}
$("#monthi").change(function (e) {
  (id = document.getElementById("monthi").value), getbode(id);
  reload();
});
function getbode(id) {
  var id = {
    id: id,
  };

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getnoidungthi", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);
        renderbode(data);
        var temp = [];
        rendercauhoi(temp);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
}

function renderbode(data) {
  var html = `<option value="all">--Chọn phần thi--</option>`;
  if (data.length >= 1) {
    data.forEach((element) => {
      html += `<option value="${element.mabode}">${element.tenbode}</option>`;
    });
  }
  document.getElementById("pthi").innerHTML = html;
}
$("#pthi").change(function (e) {
  id = document.getElementById("pthi").value;
  getcauhoi(id);
  reload();
});

function getcauhoi(id) {
  var id = {
    id: id,
  };

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getcauhoibybode", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);
        rendercauhoi(data);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
}
// function reg(st1, st2, st3) {
//   if (st1 !== "") {
//     let extend = str(st1);
//     if (
//       extend === ".bmp" ||
//       extend === ".exr" ||
//       extend === ".gif" ||
//       extend === ".ico" ||
//       extend === ".jp2" ||
//       extend === ".jpeg" ||
//       extend === ".jpg" ||
//       extend === ".pbm" ||
//       extend === ".pcx" ||
//       extend === ".pgm" ||
//       extend === ".png" ||
//       extend === ".ppm" ||
//       extend === ".psd" ||
//       extend === ".tiff" ||
//       extend === ".tga"
//     ) {
//       document.write(
//         "<td>" +
//           st2 +
//           "<br> <img src='../upload/" +
//           st3 +
//           "/" +
//           st1 +
//           "' width='320' height='240' style='margin-top:0.6em;'></td>"
//       );
//     } else if (
//       extend === ".3gp" ||
//       extend === ".avi" ||
//       extend === ".flv" ||
//       extend === ".m4v" ||
//       extend === ".mkv" ||
//       extend === ".mov" ||
//       extend === ".mp4" ||
//       extend === ".mpeg" ||
//       extend === ".ogv" ||
//       extend === ".wmv" ||
//       extend === ".webm"
//     ) {
//       let sstemp = extend.slice(1);
//       document.write(
//         "<td>" +
//           st2 +
//           "<br><video width='320' height='240' controls><source src='../upload/" +
//           st3 +
//           "/" +
//           st1 +
//           "' type='video/" +
//           sstemp +
//           "'></video></td>"
//       );
//     } else if (
//       extend === ".aac" ||
//       extend === ".ac3" ||
//       extend === ".aiff" ||
//       extend === ".amr" ||
//       extend === ".ape" ||
//       extend === ".au" ||
//       extend === ".flac" ||
//       extend === ".m4a" ||
//       extend === ".mka" ||
//       extend === ".mp3" ||
//       extend === ".mpc" ||
//       extend === ".ogg" ||
//       extend === ".ra" ||
//       extend === ".wav" ||
//       extend === ".wma"
//     ) {
//       let sstemp = extend.slice(1);
//       document.write(
//         "<td>" +
//           st2 +
//           "<br><audio controls><source src='../upload/" +
//           st3 +
//           "/" +
//           st1 +
//           "' type='audio/" +
//           sstemp +
//           "'></audio></td>"
//       );
//     } else {
//       document.write("<td>" + st2 + "</td>");
//     }
//   } else {
//     document.write("<td>" + st2 + "</td>");
//   }
// }

// function str(st) {
//   let j = st.length - 1;
//   let stemp = "";
//   while (st[j] !== ".") {
//     stemp = st[j] + stemp;
//     j--;
//   }
//   stemp = st[j] + stemp;
//   return stemp;
// }

function rendercauhoi(data) {
  var html = `<tr style="color:rgba(255,153,0,1); margin-bottom:2em;">
  <th style='width:7%;'>Mã câu hỏi</th>
  <th style='width:20%;'>Tên câu hỏi</th>
  <th style='width:15%;'>Phương án đúng</th>
  <th style='width:15%;'>Phương án sai 1</th>
  <th style='width:15%;'>Phương án sai 2</th>
  <th style='width:15%;'>Phương án sai 3</th>
  <th style='width:5%;'>Mức độ</th>
</tr>`;
  if (data.length > 0) {
    data.forEach((element) => {
      let macauhoi = element.macauhoi.replace("<", "&lt;");
      let tencauhoi = element.tencauhoi.replace("<", "&lt;");
      let padung = element.padung.replace("<", "&lt;");
      let pasai1 = element.pasai1.replace("<", "&lt;");
      let pasai2 = element.pasai2.replace("<", "&lt;");
      let pasai3 = element.pasai3.replace("<", "&lt;");
      let mucdo = element.mucdo.replace("<", "&lt;");

      html += `<tr>
      <td>${macauhoi}</td>
      <td>${tencauhoi}</td>
      <td>${padung}</td>
      <td>${pasai1}</td>
      <td>${pasai2}</td>
      <td>${pasai3}</td>
      <td>${mucdo}</td>
  </tr>`;
    });
  }
  document.getElementById("cauhoilist").innerHTML = html;
  addevent();
}

function addevent() {
  $("tr").click(function (e) {
    $("input[id='macauhoi']").val($(this).children("td:eq(0)").text());
    $("input[id='tencauhoi']").val($(this).children("td:eq(1)").text());
    $("input[id='padung']").val($(this).children("td:eq(2)").text());
    $("input[id='pasai1']").val($(this).children("td:eq(3)").text());
    $("input[id='pasai2']").val($(this).children("td:eq(4)").text());
    $("input[id='pasai3']").val($(this).children("td:eq(5)").text());
    $("input[id='tl']").val($(this).children("td:eq(6)").text());
    var element = document.getElementById("update");
    if (element) {
      element.scrollIntoView({ behavior: "smooth" });
    }
  });
}
function reload() {
  $("input[id='macauhoi']").val("");
  $("input[id='tencauhoi']").val("");
  $("input[id='padung']").val("");
  $("input[id='pasai1']").val("");
  $("input[id='pasai2']").val("");
  $("input[id='pasai3']").val("");
  $("input[id='tl']").val("");
}
curd();
function curd() {
  $("#add").click(function (e) {
    var id = document.getElementById("pthi").value;
    var a, b, c, d, e, f;
    a = $("input[id='macauhoi']").val();
    b = $("input[id='tencauhoi']").val();
    c = $("input[id='padung']").val();
    d = $("input[id='pasai1']").val();
    e = $("input[id='pasai2']").val();
    f = $("input[id='pasai3']").val();
    g = $("input[id='tl']").val();
    if (a === "" || b === "" || c === "" || d === "" || e === "" || f === "")
      alert("Bạn cần nhập đủ thông tin!");
    else {
      var data = {
        macauhoi: a,
        tencauhoi: b,
        padung: c,
        pasai1: d,
        pasai2: e,
        pasai3: f,
        tl: g,
        mabode: document.getElementById("pthi").value,
      };

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?controller=createcauhoi", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = xhr.responseText;
            console.log(response);
            var mes = "Thêm mới câu hỏi thành công";
            showSuccessMessage(mes);
            reload();
            getcauhoi(id);
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
    }
  });

  $("#edit").click(function (e) {
    var id = document.getElementById("pthi").value;
    var a, b, c, d, e, f;
    a = $("input[id='macauhoi']").val();
    b = $("input[id='tencauhoi']").val();
    c = $("input[id='padung']").val();
    d = $("input[id='pasai1']").val();
    e = $("input[id='pasai2']").val();
    f = $("input[id='pasai3']").val();
    g = $("input[id='tl']").val(); //mức độ khó dễ trung bình
    if (a === "" || b === "" || c === "" || d === "" || e === "" || f === "")
      alert("Bạn cần nhập đủ thông tin!");
    else {
      var data = {
        macauhoi: a,
        tencauhoi: b,
        padung: c,
        pasai1: d,
        pasai2: e,
        pasai3: f,
        tl: g,
        mabode: document.getElementById("pthi").value,
      };

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?controller=updatecauhoi", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = xhr.responseText;
            console.log(response);
            var mes = "Cập nhật câu hỏi thành công";
            showSuccessMessage(mes);
            reload();
            getcauhoi(id);
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
    }
  });

  $("#delete").click(function (e) {
    if (confirm("Are you sure you want to delete")) {
      var id = document.getElementById("pthi").value;
      var data = {
        macauhoi: $("input[id='macauhoi']").val(),
      };

      var xhr = new XMLHttpRequest();
      xhr.open("POST", "index.php?controller=deletecauhoi", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var response = xhr.responseText;
            console.log(response);
            var mes = "Xoá câu hỏi thành công";
            showSuccessMessage(mes);
            reload();
            getcauhoi(id);
          } else {
            console.error("Lỗi:", xhr.status);
          }
        }
      };

      xhr.send(JSON.stringify(data));
    }
  });
  $("#refresh").click(function (e) {
    $("input[id='macauhoi']").val("");
    $("input[id='tencauhoi']").val("");
    $("input[id='padung']").val("");
    $("input[id='pasai1']").val("");
    $("input[id='pasai2']").val("");
    $("input[id='pasai3']").val("");
    $("input[id='tl']").val("");
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
