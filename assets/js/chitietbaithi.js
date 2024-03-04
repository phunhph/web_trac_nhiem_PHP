$("#kythi").change(function (e) {
  (id = document.getElementById("kythi").value), getmothi(id);
  getmathisinh(id);
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
function getmathisinh(id) {
  var id = {
    id: id,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getsbd", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);
        renderSBD(data);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
}
function renderSBD(data) {
  var html = `<option value="all">- - - Mã thí sinh - - -</option>`;
  if (data.length >= 1) {
    data.forEach((element) => {
      html += `<option value="${element}">${element}</option>`;
    });
  }
  document.getElementById("masbd").innerHTML = html;
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

$("#masbd").change(function (e) {
  id = document.getElementById("masbd").value;
  mamodun = document.getElementById("monthi").value;
  var id = {
    id: id,
    mamodun: mamodun,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getketqua", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;

        var data = JSON.parse(response);
        renderthongthiketqua(data);
        getthongthibaithi();
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
});

function renderthongthiketqua(data) {
  var html = ``;
  if (data.length > 0) {
    html = `
    <td>${document.getElementById("masbd").value}</td>
    <td>${data[0].hodem} ${data[0].ten}</td>
    <td>${data[0].thoigianthi}</td>
    <td>${data[0].thoigianketthuc}</td>
    <td>${data[0].socaudung}</td>
    <td style="font-size:25px; font-weight:bold; color:red; margin-top:0.1em; margin-bottom:0.5em;">
    ${data[0].diem}/10</td>`;
  }
  document.getElementById("thong_tin").innerHTML = html;
}
function getthongthibaithi() {
  id = document.getElementById("masbd").value;
  mamodun = document.getElementById("monthi").value;
  var id = {
    id: id,
    mamodun: mamodun,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getthongthibaithi", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;

        var data = JSON.parse(response);
        renderbaithifull(data);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(id));
}

function renderbaithifull(data) {
  var html = ``;
  var dem = 1;
  if (data.length > 0) {
    data.forEach((element) => {
      console.log(element);
      html += `<div class='cauhoi'>
      ${element.stt}:
      </div>
      <div class='tencauhoi'>
      ${element.cauhoi}
      </div>`;
      html += `<div class='dapan'>
      <table border='1' class='tabledapan'>
          <tr>
              <th style='color:blue'>Câu trả lời của bạn</th>
              <th style='color:blue'>Câu trả lời đúng</th>
          </tr>
          <tr>
              <td style='color:blue;background:white;'>`;
      if (element.temp == element.padung) {
        switch (element.temp) {
          case "A":
            html += `<label>
            <input type='radio' checked>
            ${element.temp}. ${element.paA}
            <img src='assets/image/approve.png' style='padding-left:25px;'>
            </label>`;
            break;
          case "B":
            html += `<label>
            <input type='radio' checked>
            ${element.temp}. ${element.paB}
            <img src='assets/image/approve.png' style='padding-left:25px;'>
            </label>`;
            break;
          case "C":
            html += `<label>
            <input type='radio' checked>
            ${element.temp}. ${element.paC}
            <img src='assets/image/approve.png' style='padding-left:25px;'>
            </label>`;
            break;
          case "D":
            html += `<label>
            <input type='radio' checked>
            ${element.temp}. ${element.paD}
            <img src='assets/image/approve.png' style='padding-left:25px;'>
            </label>`;
            break;
        }
      } else if (element.temp == null) {
        html += `<label>
        Bạn không trả lời câu hỏi này
        </label>`;
      } else {
        switch (element.temp) {
          case "A":
            html += `<label>
            <input type='radio'>
            ${element.temp}. ${element.paA}
            <img src='assets/image/false.png' style='padding-left:25px;'>
            </label>`;
            break;
          case "B":
            html += `<label>
            <input type='radio'>
            ${element.temp}. ${element.paB}
            <img src='assets/image/false.png' style='padding-left:25px;'>
            </label>`;
            break;
          case "C":
            html += `<label>
            <input type='radio'>
            ${element.temp}. ${element.paC}
            <img src='assets/image/false.png' style='padding-left:25px;'>
            </label>`;
            break;
          case "D":
            html += `<label>
            <input type='radio'>
            ${element.temp}. ${element.paD}
            <img src='assets/image/false.png' style='padding-left:25px;'>
            </label>`;
            break;
        }
      }
      html += ` </td>
      <td style='background:white;'>`;
      if (element.padung == "A") {
        html += `<label>
        <input type='radio' checked>
        ${element.padung}. ${element.paA}
        </label>`;
      }
      if (element.padung == "B") {
        html += `<label>
        <input type='radio' checked>
        ${element.padung}. ${element.paB}
        </label>`;
      }
      if (element.padung == "C") {
        html += `<label>
        <input type='radio' checked>
        ${element.padung}. ${element.paC}
        </label>`;
      }
      if (element.padung == "D") {
        html += `<label>
        <input type='radio' checked>
        ${element.padung}. ${element.paD}
        </label>`;
      }
      html += `</td>
      </tr>
  </table>
  </div></div>`; // Closing div added here
    });
  }
  document.getElementById("chitietbailam").innerHTML = html;
}

function printContent() {
  var reponsve = document.body.innerHTML;
  var pr = document.getElementById("load").innerHTML;
  document.body.innerHTML = pr;
  window.print();
  document.body.innerHTML = reponsve;
}
