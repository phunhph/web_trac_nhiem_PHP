$("#kythi").change(function (e) {
  (id = document.getElementById("kythi").value), getmothi(id);
  if (document.getElementById("kythi").value == "all") {
    document.getElementById("onno").style.display = "none";
  }
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
  var id = {
    id: document.getElementById("monthi").value,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=gettimeandnumber", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);
        getmodule();
        renderthoigian(data);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
});
function renderthoigian(data) {
  if (data.length > 0) {
    document.getElementById("time").value = data[0].tgthi;
    document.getElementById("stong").value = data[0].tongcauhoi;
  } else {
    document.getElementById("time").value = 0;
    document.getElementById("stong").value = 0;
  }
}
function getmodule() {
  var id = {
    id: document.getElementById("monthi").value,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getmodule", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);
        renderphanchimucdo(data);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
}
function renderphanchimucdo(data) {
  html = ``;

  if (data.length > 0) {
    data.forEach((element) => {
      html += `
          <div class='cls1'>
            <div class='cls2'>${element.mabode} - ${element.tenbode}</div>
            <div class='cls7'>
              <label style='margin-left:3em;'>Mức độ</label>
              <label style='margin-left:6em;'>Số lượng</label>
              <label style='margin-left:13em;'>Số câu chọn</label>
            </div>
            <div class='cls3' style='margin-left:2em;'>
            `;
      element.tongcau.forEach((ele) => {
        if (ele.mucdo == "Dễ") {
          if (element.profile.length > 0) {
            element.profile.forEach((e) => {
              if (e.pmucdo == 0) {
                html += `<div class='cls4'  id='${element.mabode}~0all'>
              <label style='margin-left:2em;'>Dễ</label>
              <label style='margin-left:7.5em;'id='${element.mabode}~0'>${ele.sde}</label>
              <label style='margin-left:16.8em;'>
              <input type='number' name='${element.mabode}~0' value='${e.soluong}' size='3' max='${ele.sde}' min='0'>
              </label>
            </div>`;
              }
            });
          } else {
            html += `<div class='cls4' id='${element.mabode}~0all'>
              <label style='margin-left:2em;'>Dễ</label>
              <label style='margin-left:7.5em;'id='${element.mabode}~0'>${ele.sde}</label>
              <label style='margin-left:16.8em;'>
              <input type='number' name='${element.mabode}~0' value='0' size='3' max='${ele.sde}' min='0'>
              </label>
            </div>`;
          }
        }
        if (ele.mucdo == "Trung bình") {
          if (element.profile.length > 0) {
            element.profile.forEach((e) => {
              if (e.pmucdo == 1) {
                html += `<div class='cls5' id='${element.mabode}~1all'>
              <label style='margin-left:2em;'>Trung bình</label>
              <label style='margin-left:4em;'id='${element.mabode}~1'>${ele.sde}</label>
              <label style='margin-left:16.8em;'><input type='number' name='${element.mabode}~1' value='${e.soluong}' size='3' max='${ele.sde}' min='0'></label>
            </div>`;
              }
            });
          } else {
            html += `<div class='cls5'id='${element.mabode}~1all'>
          <label style='margin-left:2em;'>Trung bình</label>
          <label style='margin-left:4em;'id='${element.mabode}~1'>${ele.sde}</label>
          <label style='margin-left:16.8em;'><input type='number' name='${element.mabode}~1' value='0' size='3' max='${ele.sde}' min='0'></label>
        </div>`;
          }
        }
        if (ele.mucdo == "Khó") {
          if (element.profile.length > 0) {
            element.profile.forEach((e) => {
              if (e.pmucdo == 2) {
                html += `<div class='cls6' id='${element.mabode}~2all'>
          <label style='margin-left:2em;'>Khó</label>
          <label style='margin-left:7em;'id='${element.mabode}~2'>${ele.sde}</label>
          <label style='margin-left:16.8em;'><input type='number' name='${element.mabode}~2' value='${e.soluong}' size='3' max='${ele.sde}' min='0'></label>
        </div>`;
              }
            });
          } else {
            html += `<div class='cls6' id='${element.mabode}~2all'>
          <label style='margin-left:2em;'>Khó</label>
          <label style='margin-left:7em;' id='${element.mabode}~2'>${ele.sde}</label>
          <label style='margin-left:16.8em;'><input type='number' name='${element.mabode}~2' value='0' size='3' max='${ele.sde}' min='0'></label>
        </div>`;
          }
        }
      });

      html += `</div>
      </div>`;
    });
  }
  document.getElementById("capnhatdt").innerHTML = html;
}
$("#sb").click(function (e) {
  e.preventDefault(); // Prevent form submission

  var data = new FormData(document.getElementById("capnhatdt"));
  var dataupdate = [];
  var count = 0;
  var tongkho = 0;
  var checkinput = true;
  var senData = {
    mamonthi: document.getElementById("monthi").value,
    solong: document.getElementById("stong").value,
    thoigian: document.getElementById("time").value,
    dataupdate: dataupdate,
  };
  data.forEach((value, key) => {
    dataupdate.push({
      modunmd: key,
      soluong: value,
    });
    count -= -value;
  });

  if (
    document.getElementById("stong").value == 0 ||
    document.getElementById("time").value == 0
  ) {
    alert(
      "Vui lòng nhập số lượng câu hỏi và thời lượng thi cho môn thi trước."
    );
  } else {
    dataupdate.forEach((element) => {
      if (
        element.soluong > document.getElementById(element.modunmd).innerHTML
      ) {
        document.getElementById(element.modunmd + "all").style.backgroundColor =
          "red";
        document.getElementById(element.modunmd + "all").style.color = "black";
        checkinput = false;
      } else {
        document.getElementById(element.modunmd + "all").style.backgroundColor =
          "#fff";
        document.getElementById(element.modunmd + "all").style.color = "black";
      }
      tongkho -= -document.getElementById(element.modunmd).innerHTML;
    });
    if (document.getElementById("stong").value > tongkho) {
      document.getElementById("stong").style.backgroundColor = "red";
      alert("Số lượng câu hỏi của môn không được nhiều hơn số lượng trong kho");
    } else {
      document.getElementById("stong").style.backgroundColor = "#fff";
      if (checkinput) {
        if (count == document.getElementById("stong").value) {
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "index.php?controller=updatecautrucde", true);
          xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
          );

          xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                var response = xhr.responseText;
                console.log(response);
                // var data = JSON.parse(response);
                // rendermonthi(data);
              } else {
                console.error("Lỗi:", xhr.status);
              }
            }
          };

          xhr.send(JSON.stringify(senData));
        } else if (count < document.getElementById("stong").value) {
          alert("Số lượng bạn nhập chưa đủ với tổng câu hỏi của môn.");
        } else if (count > document.getElementById("stong").value) {
          alert("Số lượng bạn nhập đang quá với tổng câu hỏi của môn.");
        }
      } else {
        alert(
          "Số lượng câu hỏi của từ modun và từng mức độ không được nhiều hơn số lượng trong kho đề"
        );
      }
    }
  }
});
