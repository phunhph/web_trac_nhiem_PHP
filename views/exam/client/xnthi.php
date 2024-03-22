<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title for="">Thi trắc nhiêm trực tuyến</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/image/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/style/xnthi.css" type="text/css">
    <script src="./assets/js/jquery-3.1.1.js"></script>
    <script src="./assets/js/xnthi.js"></script>
    <script>
        setInterval(timer, 1000);
        var mins = 1,
            second = 0,
            m, s;
        var a = "<?php echo $_GET['ID']; ?>";

        function timer() {
            if (second == 0) {
                mins--, second = 60;
            }
            second--;
            if (second < 10) s = '0' + second;
            else s = second;
            m = '0' + mins;
            if (second == 0 && mins == 0) window.location = 'index.php?controller=exam&ID=' + a + "&" + "fx=" +
                parseInt(new Date()
                    .getTime() / 1000);
        }
        $(document).ready(function(e) {
            var a = "<?php echo $_GET['ID']; ?>";
            $("#btn").click(function(e) {
                window.location = 'index.php?controller=exam&ID=' + a + "&" + "fx=" + parseInt(
                    new Date().getTime() / 1000);
            });
        });
    </script>
</head>

<body>
    <div class="main">
        <div class="banner">
            <!--Background image-->
        </div>
        <div id="loadajax" style="width:100%; height:auto;">
            <div class="ttdk" style="height:40px;border-bottom: 4px solid blue;">
                <img src="assets/image/danhsach.png" width="23" height="25" style="margin-left:0.5em;margin-top:0.7em; float:left; ">
                <p class="ttdktext" style="color:blue; margin-top:1em; margin-left:0.6em;">
                    <?php if (isset($_GET['ID'])) echo "Bài thi môn: " . $_GET['ID']; ?></p>
            </div>
            <div class="content" style="z-index:1;width:100%;height:20em;margin-top:0.5em;">

                <?php if (isset($error)) : ?>
                    <div class="Aavatar">
                        <?= $error; ?>
                    </div>
                <?php else : ?>

                    <div class="msg" style="background:rgba(153,255,204,0.2); width:98.8%; height:13em; margin-left:0.4em; float:left;">
                        <p style="margin-top:1.6em;">
                            Số lượng câu hỏi: <?= $tongch ?>
                            <span style="color:red; font-size:17px;"></span> câu
                        </p>
                        <p>Thời gian làm bài: <?= $ttime ?> <span style="color:red; font-size:17px;"></span> phút</p>
                        <span style="color:blue; margin-bottom:1em; margin-left:0.6em; font-weight:bold;">Lưu ý:</span><br>
                        <p>Sau 1 phút thí sinh không nhấp chuột vào nút "Bắt đầu làm bài", hệ thống sẽ tự động chuyển đến
                            bài thi.</p>
                        <p>Khi thí sinh bắt đầu làm bài thi, thời gian sẽ được tính. Thí sinh bắt buộc phải hoàn thành bài
                            thi của mình trong thời gian cho phép, quá thời gian quy định hệ thống sẽ tự động dừng bài làm
                            của bạn và trả kết quả</p>
                        <button id="btn" style="margin:auto;display:block;margin-top:4em;background:green;border:none;color:white;font-weight:bold;padding:6px 25px;width:15em; height:2.5em;cursor:pointer;">Bắt
                            đầu làm bài</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>