document.getElementById("kythi").onchange = function () {
  var id = document.getElementById("kythi").value;
  gettinhtrangthi(id);
};
function gettinhtrangthi(id) {
  var data = {
    id: id,
  };
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getthongtinall", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var data = JSON.parse(response);
        renderfull(data);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(data));
}

function renderfull(data) {
  var html = ``;
  var i = 1;
  if (data.length > 0) {
    data.forEach((element) => {
      var rowColor =
        element.tinhtrang === "Đang thi" ? "palegoldenrod" : "#4CAF50";
      var textColor = element.tinhtrang === "Đang thi" ? "red" : "white";

      html += `<tr style="background: ${rowColor}; color: ${textColor};">
                    <td>${i}</td>
                    <td>${element.ip}</td>
                    <td>${element.sbd}</td>
                    <td>${element.hodem} ${element.ten}</td>
                    <td>${element.monthi}</td>
                    <td>${element.bd}</td>
                    <td>${element.kt}</td>
                    <td>${element.tinhtrang}</td>
                 </tr>`;
      i++;
    });
  }
  document.getElementById("renderfull").innerHTML = html;
}
