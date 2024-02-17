window.onload = function () {
  var urlParams = new URLSearchParams(window.location.search);
  var action = urlParams.get("action");
  if (action !== null) {
    if (action === "notstart") {
      alert("Kỳ thi chưa được mở, bạn không thể đăng nhập tại thời điểm này!");
      $(".back_out").css("display", "none");
      $(".back_over").css("display", "none");
      $("body").css("overflow", "visible");
    } else if (action === "stop") {
      alert("Kỳ thi đã bị đóng, bạn không thể đăng nhập!");
      $(".back_out").css("display", "none");
      $(".back_over").css("display", "none");
      $("body").css("overflow", "visible");
    } else if (action === "false") {
      alert("Bạn nhập sai số báo danh hoặc mật khẩu!");
      $(".back_out").css("display", "none");
      $(".back_over").css("display", "none");
      $("body").css("overflow", "visible");
    } else if (action === "true") {
      window.location.href = "index.php?controller=home";
    }
  }
};
$(document).ready(function () {
  $(".toggleFormBtn").click(function () {
    var targetId = $(this).data("target");
    $(".form-container").hide();
    $(targetId).show();
  });
});
