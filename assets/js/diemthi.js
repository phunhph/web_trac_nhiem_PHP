document.getElementById("kythi").onchange = function () {
  var id = document.getElementById("kythi").value;
  getlop(id, null);
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
}
// lấy dữ liệu và hiển thị dữ lieeuj sinh vien
document.getElementById("phong").onchange = function () {
  var phong = document.getElementById("phong").value;
  var ky = document.getElementById("kythi").value;
  document.getElementById("spanPhong").innerHTML = phong;
  var data = {
    phong: phong,
    kythi: ky,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getdiem", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);
        renderdiem(data);
        console.log(response);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };
  xhr.send(JSON.stringify(data));
};

function renderdiem(data) {
  html = ``;
  if (data.length > 0) {
    var i = 1;
    data.forEach((element) => {
      html += `<tr>
          <td>${i}</td>
          <td>${element.sbd ? element.sbd : ""}</td>
          <td>${element.hodem ? element.hodem : ""}</td>
          <td>${element.ten ? element.ten : ""}</td>
          <td>${element.noisinh ? element.noisinh : ""}</td>
          <td>${element.ngaysinh ? element.ngaysinh : ""}</td>
          <td>${element.tenmodun ? element.tenmodun : ""}</td>
          <td>${element.socaudung ? element.socaudung : ""}</td>
          <td>${element.diem ? element.diem : ""}</td>
          <td>${element.thoigianthi ? element.thoigianthi : ""}</td>
          <td>${element.thoigianketthuc ? element.thoigianketthuc : ""}</td>
      </tr>`;
      i++;
    });
  }
  document.getElementById("renderkqthi").innerHTML = html;
}
