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
        enderphanchimucdo(data);
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
      var temp = "";
      html += `
          <div class='cls1'>
            <div class='cls2'>${element.mabode} - ${element.tenbode}</div>
            <div class='cls7'>
              <label style='margin-left:3em;'>Mức độ</label>
              <label style='margin-left:6em;'>Số lượng</label>
              <label style='margin-left:13em;'>Số câu chọn</label>
            </div>
            <div class='cls3' style='margin-left:2em;'>
              <div class='cls4'>
                <label style='margin-left:2em;'>Dễ</label>
                <label style='margin-left:7.5em;'>${element.sde}</label>
                <label style='margin-left:16.8em;'><input type='text' name='${element.mabode}~0' value='${temp}' size='3'></label>
              </div>
              <div class='cls5'>
                <label style='margin-left:2em;'>Trung bình</label>
                <label style='margin-left:4em;'>${element.stb}</label>
                <label style='margin-left:16.8em;'><input type='text' name='${element.mabode}~1' value='${temp}' size='3'></label>
              </div>
              <div class='cls6'>
                <label style='margin-left:2em;'>Khó</label>
                <label style='margin-left:7em;'>${element.skho}</label>
                <label style='margin-left:16.8em;'><input type='text' name='${element.mabode}~2' value='${temp}' size='3'></label>
              </div>
            </div>
          </div>`;
    });
  }
  document.getElementById("capnhatdt").innerHTML = html;
}
