<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title for="">Thi trắc nhiêm trực tuyến</title>
    <link rel="shortcut icon" href="./assets/image/icon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./assets/style/report.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="./assets/js/jquery-3.1.1.js"></script>
    <script src="./assets/js/report.js"></script>
</head>

<body>
    <!--<div class="examcontent">-->
    <!--Phần danh sách câu hỏi-->
    <div class="examcontent_p1">
        <div class="dscauhoi">
            <div class='hellomem' style='width:100%; height:2em;'>
                <div style='padding-top:0.5em;padding-left:0.5em;font-size:17px;color:orangered;font-weight:bold; text-align:center;'>
                    Danh sách câu hỏi</div>
            </div>
            <div class="maincauhoi" style="width:100%;height:10em;overflow:auto; margin-top:1em;">
                <?php
                for ($i = 1; $i <= $tongcauhoi; $i++) echo "<div class='socau' id='s" . $i . "' onClick=\"scrollToAnchor('ch" . $i . "');\">" . $i . "</div>";
                ?>
            </div>
            <br>
            <div style="font-weight:bold; font-size:11px; margin-bottom:1em; margin-left:0.6em;"><i><u>Chú
                        thích:</u></i></div>
            <div style="font-size:11px;margin-left:0.6em;">Màu xanh: Câu trả lời đúng</div>
            <div style="font-size:11px;margin-left:0.6em;">Màu đỏ: Câu trả lời sai</div>
            <div style="font-size:11px;margin-left:0.6em;">Màu vàng: Câu hỏi không trả lời</div>
        </div>
        <button type="submit" name="logout" id="redu">Đăng xuất</button>
    </div>
    <!--End phần danh sách câu hỏi-->

    <!--Phần câu hỏi-->
    <div class="examcontent_p2">
        <div class="tongdiem">
            <p style="font-size:22px;text-align:center;">KẾT QUẢ BÀI THI</p>
            <table class="tablekq" border="1">
                <tr>
                    <th>Số báo danh</th>
                    <th>Họ và tên</th>
                    <th>Bắt đầu</th>
                    <th>Kết thúc</th>
                    <th>Thời gian làm bài</th>
                    <th>Tổng điểm</th>
                </tr>
                <tr>
                    <td><?php echo $sbd; ?></td>
                    <td><?php echo $namef . " " . $name; ?></td>
                    <td><?= $tgbd->getThoigianthi() ?></td>
                    <td><?= $tgbd->getThoigianketthuc() ?></td>
                    <td><?php echo $re; ?></td>
                    <td style="font-size:25px; font-weight:bold; color:red; margin-top:0.1em; margin-bottom:0.5em;">
                        <?php echo $tongdiem . '/10'; ?></td>
                </tr>
            </table>
        </div>
        <!--het tong diem-->


        <?php
        foreach ($bode as $key => $value) :;
        ?>

            <div class='areaexam'>
                <div class='cauhoi' id='ch<?php echo $key + 1; ?>'>
                    Câu hỏi <b><?php echo $key + 1; ?></b>:
                </div>
                <div class='tencauhoi'>
                    <?php echo $value->getCauHoi(); ?>
                    <?php if (!empty($dtencauhoir['imgviauTencauhoi'])) reg($dtencauhoir['imgviauTencauhoi'], "imgcauhoi"); ?>
                </div>
                <div class='dapan'>
                    <table border='1' class='tabledapan'>
                        <tr>
                            <th style='color:blue'>Câu trả lời của bạn</th>
                            <th style='color:blue'>Câu trả lời đúng</th>
                        </tr>
                        <tr>
                            <td style='color:blue;background:white;'>

                                <?php if ($value->getTemp() == $value->getpadung()) : ?>
                                    <script>
                                        $(document).ready(function() {
                                            $("div[id='s<?php echo $key + 1; ?>']").css("background-color", "green");
                                        });
                                    </script>
                                    <?php if ($value->getTemp() == 'A') : ?>
                                        <label>
                                            <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caus<?php echo $key + 1; ?>' checked>
                                            <?php echo $value->getTemp(); ?>. <?php echo $value->getPaA() ?>
                                            <div>
                                                <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                            </div>
                                        </label>
                                        <img src='assets/image/approve.png' style='padding-left:25px;'>
                                    <?php elseif ($value->getTemp() == 'B') : ?>
                                        <label>
                                            <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caus<?php echo $key + 1; ?>' checked>
                                            <?php echo $value->getTemp() ?>. <?php echo $value->getPaB() ?>
                                            <div>
                                                <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                            </div>
                                        </label>
                                        <img src='assets/image/approve.png' style='padding-left:25px;'>
                                    <?php elseif ($value->getTemp() == 'C') : ?>
                                        <label>
                                            <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caus<?php echo $key + 1; ?>' checked>
                                            <?php echo $value->getTemp() ?>. <?php echo $value->getPaC(); ?>
                                            <div>
                                                <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                            </div>
                                        </label>
                                        <img src='assets/image/approve.png' style='padding-left:25px;'>
                                    <?php elseif ($value->getTemp() == 'D') : ?>
                                        <label>
                                            <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caus<?php echo $key + 1; ?>' checked>
                                            <?php echo $value->getTemp() ?>. <?php echo $value->getPaD(); ?>
                                            <div>
                                                <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                            </div>
                                        </label>
                                        <img src='assets/image/approve.png' style='padding-left:25px;'>
                                    <?php endif; ?>
                                <?php elseif ($value->getTemp() == 'null') : ?>
                                    <label>
                                        Bạn không trả lời câu hỏi này
                                        <script>
                                            $(document).ready(function() {
                                                $("div[id='s<?php echo $key + 1; ?>']").css("background-color", "#faac32");
                                            });
                                        </script>
                                    </label>
                                <?php else : ?>
                                    <script>
                                        $(document).ready(function() {
                                            $("div[id='s<?php echo $key + 1; ?>']").css("background-color", "red");
                                        });
                                    </script>
                                    <?php if ($value->getTemp() == 'A') : ?>
                                        <label>
                                            <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caus<?php echo $key + 1; ?>' checked>
                                            <?php echo $value->getTemp(); ?>. <?php echo $value->getPaA() ?>
                                            <div>
                                                <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                            </div>
                                        </label><img src='assets/image/false.png' style='padding-left:25px;'>
                                    <?php elseif ($value->getTemp() == 'B') : ?>
                                        <label>
                                            <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caus<?php echo $key + 1; ?>' checked>
                                            <?php echo $value->getTemp() ?>. <?php echo $value->getPaB() ?>
                                            <div>
                                                <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                            </div>
                                        </label><img src='assets/image/false.png' style='padding-left:25px;'>
                                    <?php elseif ($value->getTemp() == 'C') : ?>
                                        <label>
                                            <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caus<?php echo $key + 1; ?>' checked>
                                            <?php echo $value->getTemp() ?>. <?php echo $value->getPaC(); ?>
                                            <div>
                                                <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                            </div>
                                        </label><img src='assets/image/false.png' style='padding-left:25px;'>
                                    <?php elseif ($value->getTemp() == 'D') : ?>
                                        <label>
                                            <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caus<?php echo $key + 1; ?>' checked>
                                            <?php echo $value->getTemp() ?>. <?php echo $value->getPaD(); ?>
                                            <div>
                                                <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                            </div>
                                        </label><img src='assets/image/false.png' style='padding-left:25px;'>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                            <td style='background:white;'>
                                <?php if ($value->getpadung() == 'A') : ?>
                                    <label>
                                        <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caud<?php echo $key + 1; ?>' checked>
                                        <?php echo $value->getpadung(); ?>. <?php echo $value->getPaA(); ?>
                                        <div>
                                            <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                        </div>
                                    </label>
                                <?php elseif ($value->getpadung() == 'B') : ?>
                                    <label>
                                        <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caud<?php echo $key + 1; ?>' checked>
                                        <?php echo $value->getpadung(); ?>. <?php echo $value->getPaB(); ?>
                                        <div>
                                            <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                        </div>
                                    </label>
                                <?php elseif ($value->getpadung() == 'C') : ?>
                                    <label>
                                        <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caud<?php echo $key + 1; ?>' checked>
                                        <?php echo $value->getpadung(); ?>. <?php echo $value->getPaC(); ?>
                                        <div>
                                            <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                        </div>
                                    </label>
                                <?php elseif ($value->getpadung() == 'D') : ?>
                                    <label>
                                        <input type='radio' id='tcau<?php echo $key + 1; ?>' name='caud<?php echo $key + 1; ?>' checked>
                                        <?php echo $value->getpadung(); ?>. <?php echo $value->getPaD(); ?>
                                        <div>
                                            <?php if (!empty($dtencauhoir['imgviauPadung'])) reg($dtencauhoir['imgviauPadung'], "imgdapan"); ?>
                                        </div>
                                    </label>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!--End phần câu hỏi-->
    </div>

    <?php
    unset($_SESSION['sbd']);
    ?>
</body>

</html>