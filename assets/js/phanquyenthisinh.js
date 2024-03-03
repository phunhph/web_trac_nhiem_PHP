$("#kythi").change(function (e) {
  (id = document.getElementById("kythi").value), getmothi(id);
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
  getthisinh();
});
function getthisinh() {
  var data = {
    id: document.getElementById("monthi").value,
    hienthi: document.getElementById("hienthi").value,
  };

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getthisinhbymonthis", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;

        var data = JSON.parse(response);
        renderthisinh(data);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(data));
}

$("#hienthi").change(function (e) {
  getthisinh();
});
function selectAll() {
  var totalelement = document.f.elements.length;
  var elementName;
  for (var i = 0; i < totalelement; i++) {
    elementName = document.f.elements[i].name;
    if (elementName != undefined && elementName.indexOf("ct") != -1) {
      document.f.elements[i].checked = document.f.slAll.checked;
    }
  }
}
function renderthisinh(data) {
  html = `<tr style="color:rgba(255,153,51,1); margin-bottom:2em;">
  <th style='width:7%;'>Số báo danh</th>
  <th style='width:15%;'>Họ, đệm</th>
  <th style='width:8%;'>Tên</th>
  <th style='width:11%;'>Ngày sinh</th>
  <th style='width:30%;'>Tên đơn vị</th>
  <th style='width:8%;'>Được thi<br><input type="checkbox" onChange="selectAll();"
          name="slAll" checked>
  </th>
</tr>`;
  if (data.length > 0) {
    data.forEach((element) => {
      html += `<tr>
          <td style='text-align:left;'>${element.sbd}</td>
          <td style='text-align:left;'>${element.hodem}</td>
          <td style='text-align:left;'>${element.ten}</td>
          <td style='text-align:left;'>${element.ns}</td>
          <td style='text-align:left;'>${element.donvi}</td>
          `;
      if (element.chothi == "C") {
        html += `<td><input type='checkbox' checked name='ct[]' value="${element.sbd}"></td>
            </tr>`;
      } else {
        html += `<td><input type='checkbox' name='ct[]' value="${element.sbd}"></td>
              </tr>`;
      }
    });
  }
  // Thêm html vào một phần tử trên trang
  document.getElementById("sll").innerHTML = data.length;
  document.getElementById("listtsshow").innerHTML = html;
}
$("#sb").click(function (e) {
  if (window.confirm("Cập nhật lại quyền thi?")) {
    var data = {
      id: {
        sbd: [],
        kythi: [],
      },
      ud: {
        sbd: [],
        kythi: [],
      },
    };
    var i = 0;
    var j = 0;

    $(":checkbox").each(function () {
      if ($(this).is(":checked")) {
        data.id.sbd[i] = $(this).val();
        data.id.kythi[i] = $("#monthi").val();
        i++;
      } else {
        data.ud.sbd[j] = $(this).val();
        data.ud.kythi[j] = $("#monthi").val();
        j++;
      }
    });

    console.log(data);
  } else return false;
});
