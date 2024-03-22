<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="shortcut icon" href="./assets/image/icon.png" type="image/x-icon">
  <title for="">Thi trắc nhiêm trực tuyến</title>
  <link rel="stylesheet" href="./assets/style/index.css" type="text/css">
  <link rel="stylesheet" href="./assets/style/monthi.css" type="text/css">
  <script src="./assets/js/jquery-3.1.1.js"></script>
  <script src="./assets/js/index.js"></script>
</head>

<body>
  <div class="back_out">
    <!--show background black-->
  </div>
  <div class="back_over">
    <!--show background status image gif-->
  </div>
  <div class="main">
    <div class="banner">
      <!--Background image-->
    </div>
    <div id="loadajax" style="width:100%; height:auto;">
      <div class="ttdk" style="height:40px; border:none; margin-bottom:1em;">
        <p class="ttdktext" style="color:blue; margin-top:1em; float:left; width:20%;border-bottom:3px solid blue; margin-left:0.6em;">
          Thông tin thí sinh</p>
        <p class="ttdktext" style="margin-left:3.7em; width:65%; color:blue; margin-top:1em; border-bottom:3px solid blue;">
          Danh sách môn thi</p>
      </div>
      <div class="body">
        <div class='avatar'>
          <div class='hellomem' style='width:100%; height:2.2em; background:seagreen;'>
            <img src='assets/image/key.png' width='15' height='17' style='margin-top:0.5em;margin-left:0.5em; float:left;'>
            <div class='xinchao' style='padding-top:0.5em;padding-left:0.5em;color:white; background-color:cadetblue; width:80%; height:1.7em; float:right;'>
              XIN CHÀO</div>
          </div>
          <div class='imagemem' style='width:100%; height:10em;padding-top:0.6em;'>
            <img src='<?= $target ?>' style='margin:auto; display:block; width:70%; height:96%;'>
          </div>
          <div class='chitiet' style=' width:100%; height:6.1em;'>
            <div class='hoten' style='width:100%; height:3em;background:rgba(170,170,170,0.4);'>
              <img src='assets/image/name.jpg' style='margin-top:0.5em;margin-left:0.3em; float:left;'>
              <div style='font-size:13px;padding-top:0.5em;padding-left:0em;color:black;width:70%; height:1.7em; float:right;'>
                <span>Họ và tên</span><br>
                <span><b><?= $_SESSION['user_info']['hodem'] . $_SESSION['user_info']['ten'] ?></b></span>
              </div>
            </div>
            <div class='sobd' style='width:100%; height:3.1em;background:rgba(170,170,170,0.4);'>
              <img src='assets/image/ID.jpg' style='margin-top:0.5em;margin-left:0.3em; float:left;'>
              <div style='font-size:13px;padding-top:0.5em;padding-left:0em;color:black;width:70%; height:1.7em; float:right;'>
                <span>Số báo danh</span><br>
                <span><b><?= $_SESSION['user_info']['sbd'] ?></b></span>
              </div>
            </div>
            <div class='sobd' style='width:100%; height:3.1em;background:rgba(170,170,170,0.4);'>
              <img src='assets/image/ID.jpg' style='margin-top:0.5em;margin-left:0.3em; float:left;'>
              <div style='font-size:13px;padding-top:0.5em;padding-left:0em;color:black;width:70%; height:1.7em; float:right;'>
                <span>Ngày sinh</span><br>
                <span><b><?= $_SESSION['user_info']['ngaysinh'] ?></b></span>
              </div>
            </div>
            <div class='sobd' style='width:100%; height:3.1em;background:rgba(170,170,170,0.4);'>
              <img src='assets/image/ID.jpg' style='margin-top:0.5em;margin-left:0.3em; float:left;'>
              <div style='font-size:13px;padding-top:0.5em;padding-left:0em;color:black;width:70%; height:1.7em; float:right;'>
                <span>Nơi sinh</span><br>
                <span><b><?= $_SESSION['user_info']['noisinh'] ?></b></span>
              </div>
            </div>
          </div>
        </div>
        <div class='dnh'>
          <div class='loadModun' name='mmodun'>
            <?php foreach ($moduns as $k => $v) : ?>
              <div class='bomodun'>

                <div>
                  <img src='assets/image/small-list.png' width='25' height='26' style='float:left; margin-left:2em; margin-top:-0.3em;'>
                  <p id='tench' style='margin-top:1em; margin-left:5.6em; cursor:pointer; padding-bottom:0.5em;'>
                    <a href="index.php?controller=setupExam&ID=<?= $v->getTenmodun() ?>" id="tencha" style="text-decoration: none; "><?= $v->getTenmodun() ?></a>
                  </p>
                </div>


              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <p class="det" style="color: darkviolet; background: lavender;width: 62.5%;text-align: center; float: right; margin-right: 6em;margin-top: -1.1em;">
          Thí sinh click vào tên môn thi để vào bài thi</p>
      </div>
    </div>
  </div>
</body>

</html>