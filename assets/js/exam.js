// time javaScript
window.onload = run;
var t = setInterval(function () {
  run();
}, 1000);
function run() {
  temp1 = temp;
  hour = format(parseInt(temp / 3600));
  temp = temp % 3600;
  minute = format(parseInt(temp / 60));
  temp = temp % 60;
  second = format(temp);

  temp = --temp1;
  if (temp % 10 == 0) {
    $.post("index.php?controller=UpdateTime", { time: temp })
      .done(function (response) {
        // Xử lý thành công nếu cần
        console.log(response);
      })
      .fail(function (error) {
        // Xử lý lỗi nếu cần
        console.error("Lỗi:", error);
      });
  }
  if (temp <= 0) {
    clearInterval(t);
    var tg = parseInt(new Date().getTime() / 1000);
    $.post("index.php?controller=UpdateTimeEnd", { time: temp, tg: tg })
      .done(function (response) {
        // Xử lý thành công nếu cần
        console.log(response);
      })
      .fail(function (error) {
        // Xử lý lỗi nếu cần
        console.error("Lỗi:", error);
      });
  }
  document.getElementById("clock").innerHTML =
    hour + ":" + minute + ":" + second;
}

function chamdiem() {
  if (
    confirm(
      "Sau khi xác nhận kết thúc bạn sẽ không thể thay đổi bài làm! Bạn có chắc chắn muốn kết thúc bài thi?"
    )
  ) {
    var tg = parseInt(new Date().getTime() / 1000);
    $.post("index.php?controller=UpdateTimeEnd", { time: temp, tg: tg })
      .done(function (response) {
        // Xử lý thành công nếu cần
        console.log(response);
        window.examtest.submit();
      })
      .fail(function (error) {
        // Xử lý lỗi nếu cần
        console.error("Lỗi:", error);
      });
  }
}

function format(d) {
  return (d < 10 ? "0" : "") + d;
}

// JavaScript Document

function scrollToAnchor(aid) {
  var targetElement = $("div[id='" + aid + "']");
  if (targetElement.length) {
    var targetOffset = targetElement.offset().top;
    $("html, body").animate({ scrollTop: targetOffset }, "slow");
    return false;
  }
}

function fillBackground(label) {
  var targetElement = $("div[id='" + label + "']");
  if (targetElement.length) {
    targetElement.css("background-color", "mediumseagreen");
  }
}

function writechoose(str) {
  var data = $(
    ".examcontent_p2 .areaexam .dapan ." + str + " input:radio"
  ).val();
  var name = $(
    ".examcontent_p2 .areaexam .dapan ." + str + " input:radio"
  ).attr("name");
  $.post("index.php?controller=updateTemp", { id: data, name: name })
    .done(function (response) {
      // Xử lý thành công nếu cần
    })
    .fail(function (error) {
      // Xử lý lỗi nếu cần
      console.error("Lỗi:", error);
    });
}
