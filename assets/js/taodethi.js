$("#kythi").change(function (e) {
  (id = document.getElementById("kythi").value), getmothi(id);
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
      var data = $("#update").serialize();
      $.ajax({
        type: "POST",
        url: "themcauhoi.php",
        data: data,
        success: function (data) {
          //alert(data);
          if (data == "false")
            alert("Câu hỏi đã tồn tại, lưu ý mã câu hỏi không trùng nhau");
          else {
            alert("Thêm câu hỏi thành công");
            var ajax = new XMLHttpRequest();
            var dat = new FormData();
            function g() {
              dat.append("f1", document.querySelector("#file1").files[0]);
              dat.append("f2", document.querySelector("#file2").files[0]);
              dat.append("f3", document.querySelector("#file3").files[0]);
              dat.append("f4", document.querySelector("#file4").files[0]);
              dat.append("f5", document.querySelector("#file5").files[0]);

              ajax.onreadystatechange = function (e) {
                if (ajax.status == 200 && ajax.readyState == 4) {
                  //alert(ajax.responseText);
                }
              };
              ajax.open("POST", "taodethiaddiva.php");
              ajax.send(dat);
            }
            g();
            $(".loadchinh").load("taodethi.php");
          }
        },
      });
    }
  });

  $("#edit").click(function (e) {
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
      var data = $("#update").serialize();
      $.ajax({
        type: "POST",
        url: "editcauhoi.php",
        data: data,
        success: function (data) {
          //alert(data);
          if (data == "true") {
            alert("Đã sửa");
            var ajax = new XMLHttpRequest();
            var dat = new FormData();
            function g() {
              dat.append("f1", document.querySelector("#file1").files[0]);
              dat.append("f2", document.querySelector("#file2").files[0]);
              dat.append("f3", document.querySelector("#file3").files[0]);
              dat.append("f4", document.querySelector("#file4").files[0]);
              dat.append("f5", document.querySelector("#file5").files[0]);

              ajax.onreadystatechange = function (e) {
                if (ajax.status == 200 && ajax.readyState == 4) {
                  //alert(ajax.responseText);
                }
              };
              ajax.open("POST", "taodethiaddiva.php");
              ajax.send(dat);
            }
            g();
            $(".loadchinh").load("taodethi.php");
          } else alert("Lỗi");
        },
      });
    }
  });

  $("#delete").click(function (e) {
    var a = $("input[id='macauhoi']").val();
    if (a !== "") {
      var data = $("#update").serialize();
      $.ajax({
        type: "POST",
        url: "xoacauhoi.php",
        data: data,
        success: function (data) {
          if (data == "true") {
            alert("Đã xóa câu hỏi");
            $(".loadchinh").load("taodethi.php");
          } else alert("Câu hỏi không tồn tại");
        },
      });
    } else {
      alert("vui long nhap id");
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
