// lấy thông tin kỳ thi để fix

function getdataFIx(kythi) {
  document.querySelectorAll(".btnFix").forEach((item) => {
    item.addEventListener("click", (event) => {
      const id = item.getAttribute("data-id");
      kythi.forEach((element) => {
        if (id == element.makythi) {
          document.getElementById("ten_fix").value = element.tenkythi;
          document.getElementById("makythi_fix").value = element.makythi;
          document.getElementById("start_fix").value = element.tgbatdua;
          document.getElementById("end_fix").value = element.tgketthuc;
        }
      });
    });
  });
}
getdataFIx(kythi);

document.getElementById("save_fix").onclick = function () {
  var data = {
    makythi: document.getElementById("makythi_fix").value,
    tenkythi: document.getElementById("ten_fix").value,
    tgbatdua: document.getElementById("start_fix").value,
    tgketthuc: document.getElementById("end_fix").value,
  };

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=updateKyThi", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var message = "Cập nhật thông tin kỳ thi thành công";
        showSuccessMessage(message);
        getDate();
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(data));
};

document.getElementById("create").onclick = function () {
  var data = {
    makythi: document.getElementById("ma_create").value,
    tenkythi: document.getElementById("ten_create").value,
    tgbatdua: document.getElementById("start_crate").value,
    tgketthuc: document.getElementById("end_create").value,
  };

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=createKyThi", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        console.log(response);
        var message = "Thêm mới kỳ thi thành công";
        showSuccessMessage(message);
        getDate();
        resetform();
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send(JSON.stringify(data));
};

function deleteAdd() {
  // Xoá kỳ thi theo mã kỳ thi
  document.querySelectorAll(".btnDelete").forEach((item) => {
    item.addEventListener("click", (event) => {
      var data = {
        id: item.getAttribute("data-id"),
      };

      // thông báo xác nhận xoá kỳ thi
      const result = confirm("Xác nhận xoá kỳ thi có mã kỳ thi: " + data.id);

      // điều hướng đáp án
      if (result) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php?controller=deleteKyThi", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );

        xhr.onreadystatechange = function () {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              getDate();
              var message = "Đã xoá bỏ kỳ thi có mã kỳ thi: " + data.id;
              showSuccessMessage(message);
            } else {
              console.error("Lỗi:", xhr.status);
            }
          }
        };
        xhr.send(JSON.stringify(data));
      }
    });
  });
}
deleteAdd();

// cập nhật dữ liệu mới nhất
function getDate() {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "index.php?controller=getDataAPI", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        var date = JSON.parse(response);
        render(date);
      } else {
        console.error("Lỗi:", xhr.status);
      }
    }
  };

  xhr.send();
}

// rerender dữ lệu cài sự kiện
function render(date) {
  // Lấy phần tử có id là "render_ky_thi"
  var renderDiv = document.getElementById("render_ky_thi");
  // HTML mẫu bạn muốn render
  var html = "";
  date.forEach((value) => {
    // Tạo chuỗi HTML cho mỗi giá trị trong mảng date
    html += `
   <div class="col-lg-3 mb-4">
       <div class="card bg-dark text-white shadow">
           <div class="card-body-item">
               <p>Tên kỳ thi: ${value.tenkythi}</p>
               <p>Mã Kỳ thi: ${value.makythi}</p>
               <p>Thời gian bắt đầu: </p>
               <p>${value.tgbatdua}</p>
               <p>Thời gian kết thúc:</p>
               <p>${value.tgketthuc}</p>
               <div class="row">
                   <div class="col-lg-3 mb-4">
                       <button type="button" class=" btn btn-secondary btn-sm shadow border btnFix" data-toggle="modal" data-target="#exampleModalLong" data-id="${value.makythi}">
                           Sửa
                       </button>
                   </div>
                   <div class="col-lg-3 mb-4">
                       <button class="btn btn-secondary btn-sm shadow border btnDelete" data-id="${value.makythi}">
                           Xoá
                       </button>
                   </div>
                   <div class="col-lg-6 mb-4">
                       <button class="btn btn-secondary btn-sm shadow border">
                           Quản lý
                       </button>
                   </div>
               </div>
           </div>
       </div>
   </div>
 `;
  });
  html += `<div class="col-lg-3 mb-12">
  <div class="card bg-secondary text-white shadow">
      <div class="card-body-item" data-toggle="modal" data-target="#createExam">
          <div class="card-body-item-add">
              <div class="circle-with-cross">
              </div>
          </div>
      </div>
  </div>
</div>`;
  // Thêm HTML vào phần tử đã lấy
  renderDiv.innerHTML = html;
  deleteAdd();
  getdataFIx(date);
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
// xoá dữ liệu ở form
function resetform() {
  document.getElementById("ma_create").value = "";
  document.getElementById("ten_create").value = "";
  document.getElementById("start_crate").value = "";
  document.getElementById("end_create").value = "";
}

document.getElementById("close").onclick = resetform;
document.getElementById("huy").onclick = resetform;
