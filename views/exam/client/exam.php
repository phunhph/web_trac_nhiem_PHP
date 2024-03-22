<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title for="">Thi trắc nhiêm trực tuyến</title>
    <link rel="shortcut icon" href="assets/image/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/style/exam.css" type="text/css" />
    <script src="assets/js/jquery-3.1.1.js"></script>
    <script src="assets/js/exam.js"></script>
</head>

<body>
    <!--<div class="examcontent">-->
    <!--Phần danh sách câu hỏi-->
    <div class="divmain">
        <div class="examcontent_p1">
            <script>
                var hour, minute, second, temp1, temp = <?= $time ?>;
            </script>
            <div id="timer">
                <img src="assets/image/clock.png" height="38" width="38" style="margin-left:1em;float:left;" />
                <div id="clock" style="color:mediumseagreen;margin-top:0.1em; margin-left:4.5em;font-size:25px;font-weight:bold;">
                </div>
                <!--Hiển thị thời gian còn lại-->
            </div>
            <div class="dscauhoi">
                <div class='hellomem' style='width:100%; height:2em;'>
                    <div style='padding-top:0.5em;padding-left:0.5em;font-size:14px;color:orangered;width:97.5%; height:1.8em;'>
                        Danh sách câu hỏi</div>
                </div>
                <div class="maincauhoi" style="width:100%;height:8em;overflow:auto;">
                    <?php
                    for ($i = 1; $i <= $_SESSION['tongcauhoi']; $i++) {
                        echo "<div class='socau' id='s" . $i . "' onClick=\"scrollToAnchor('ch" . $i . "');\">" . $i . "
                		</div>";
                    }
                    ?>
                </div>
                <br>
                <div style="font-weight:bold; font-size:14px;margin-bottom:0.8em; margin-left:0.6em;"><i><u>Chú
                            ý:</u></i></div>
                <div style="font-size:13px;margin-left:0.6em;">- Màu đen: Câu hỏi chưa trả lời.</div>
                <div style="font-size:13px;margin-left:0.6em;">- Màu xanh: Câu hỏi đã trả lời.</div>
            </div>

            <div style='margin-left:0.25em;'>
                <div class='chitiet' style='width:100%; height:inherit; margin-top:1.2em;'>

                    <div class='hoten' style='width:100%;font-size:14px;'>
                        <div style='padding-top:1em;padding-left:0em;color:black;width:100%; height:1.7em;'>
                            <span style='margin-left:1em;'>Họ và tên:&nbsp;</span>
                            <span style="color:rgba(255,102,51,1);"><b>
                                    <?= $_SESSION['user_info']['hodem'] . " " . $_SESSION['user_info']['ten'] ?>
                                </b></span>
                        </div>
                    </div>

                    <div class='sobd' style='width:100%;font-size:14px;'>
                        <div style='padding-top:0.1em;padding-left:0em;color:black;width:100%; height:1.7em;'>
                            <span style='margin-left:1em;'>Số báo danh:&nbsp;</span>
                            <span style="color:rgba(255,102,51,1);"><b>
                                    <?php echo $sbd; ?>
                                </b></span>
                        </div>
                    </div>
                </div>
            </div>
            <input id="submit" style="margin:auto;display:block;margin-top:0.8em;margin-bottom:0.6em;background:mediumseagreen;border:none;color:white;font-weight:bold;padding:10px 45px;cursor:pointer;" type="submit" value="Nộp bài" onClick="chamdiem();">
        </div>
        <!--End phần danh sách câu hỏi-->

        <!--Phần câu hỏi-->
        <div class="examcontent_p2">
            <form method='post' name='examtest' action="index.php?controller=reportExam">
                <?php
                foreach ($bode as $k => $v) : ?>
                    <?php if ($v->getTemp() == null) : ?>
                        <div class='areaexam'>
                            <div class='cauhoi' id='ch<?= $k + 1 ?>'>
                                Câu hỏi
                                <b>
                                    <?= $k + 1 ?>
                                </b>:
                                <div class='tencauhoi'>
                                    <?= $v->getCauhoi() ?>
                                    <?php if (!empty($cdata['imgviauTencauhoi']))
                                        reg($cdata['imgviauTencauhoi'], "imgcauhoi"); ?>
                                </div>
                                <div class='dapan'>
                                    <div class="choose<?= $j ?>" onclick=" writechoose('choose<?php echo $j; ?>')" style="margin-bottom:0.6em;">
                                        <label onclick="fillBackground('s<?= $k + 1 ?>')">
                                            <input type="radio" id="tcau<?= $k + 1 ?>" name="cau<?= $k + 1 ?>" value="A">&nbsp;A. <?= $v->getPaA() ?>
                                        </label><br>
                                    </div>
                                    <?php $j++ ?>
                                    <div class='choose<?= $j ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                        <label onclick="fillBackground('s<?= $k + 1 ?>')">
                                            <input type='radio' id='tcau<?= $k + 1 ?>' name='cau<?= $k + 1 ?>' value='B'>&nbsp;B
                                            <?= $v->getPaB() ?>
                                        </label><br>
                                        <?php if (!empty($cdata['imgviauPadung']))
                                            reg($cdata['imgviauPadung'], "imgdapan"); ?>
                                        <?php $j++ ?>
                                    </div>
                                    <div class='choose<?= $j ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                        <label onclick="fillBackground('s<?= $k + 1 ?>')"">
                                        <input type='radio' id='tcau<?= $k + 1 ?>' name='cau<?= $k + 1 ?>' value='C'>&nbsp;C
                                        <?= $v->getPaC() ?>
                                    </label><br>
                                    <?php if (!empty($cdata['imgviauPadung']))
                                        reg($cdata['imgviauPadung'], "imgdapan"); ?>
                                    <?php $j++ ?>
                                </div>
                                <div class='choose<?= $j ?>'onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                            <label onclick="fillBackground('s<?= $k + 1 ?>')"">
                                    <input type='radio' id='tcau<?= $k + 1 ?>' name='cau<?= $k + 1 ?>' value='D'>&nbsp;D
                                    <?= $v->getPaD() ?>
                                </label><br>
                                <?php if (!empty($cdata['imgviauPadung']))
                                    reg($cdata['imgviauPadung'], "imgdapan"); ?>
                                <?php $j++ ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php else :
                        switch ($v->getTemp()) {
                            case 'A':
                ?>
                <div class='areaexam'>
                            <div class='cauhoi' id='ch<?= $k + 1 ?>'>
                                Câu hỏi
                                <b>
                                    <?= $k + 1 ?>
                                </b>:
                                <div class='tencauhoi'>
                                    <?= $v->getCauhoi() ?>
                                    <?php if (!empty($cdata['imgviauTencauhoi']))
                                        reg($cdata['imgviauTencauhoi'], "imgcauhoi"); ?>
                                </div>
                                <script>fillBackground('s<?php echo ($k + 1); ?>');</script>
                                <div class='dapan'>
                                <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                    <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='A' checked>
                                                    &nbsp;A. <?php echo $v->getPaA(); ?>
                                                </label><br>
                                                <?php if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'], "imgdapan"); ?>
                                    </div>
                                    <?php
                                    $j++;
                                    ?>
                                    <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                        <label onClick=" fillBackground('s<?php echo ($k + 1); ?>')">
                                            <input class='choose<?php echo ($k + 1); ?>' type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='B'>&nbsp;B. <?php echo $v->getPaB(); ?> </label><br>
                                        <?php if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'], "imgdapan"); ?>
                                    </div>
                                    <?php
                                    $j++;
                                    ?>
                                    <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                        <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                            <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='C'>
                                            &nbsp;C. <?php echo $v->getPaC(); ?>
                                        </label><br>
                                        <?php if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'], "imgdapan"); ?>
                                    </div>
                                    <?php
                                    $j++;
                                    ?>
                                    <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                        <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                            <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='D'>
                                            &nbsp;D. <?php echo $v->getPaD(); ?>
                                        </label>
                                        <?php if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'], "imgdapan"); ?>
                                    </div>
                                </div>
                            <?php

                                $j++;
                                break;
                            case 'B':
                            ?>
                                <div class='areaexam'>
                                    <div class='cauhoi' id='ch<?= $k + 1 ?>'>
                                        Câu hỏi
                                        <b>
                                            <?= $k + 1 ?>
                                        </b>:
                                        <div class='tencauhoi'>
                                            <?= $v->getCauhoi() ?>
                                            <?php if (!empty($cdata['imgviauTencauhoi']))
                                                reg($cdata['imgviauTencauhoi'], "imgcauhoi"); ?>
                                        </div>
                                        <script>
                                            fillBackground('s<?php echo ($k + 1); ?>');
                                        </script>
                                        <div class='dapan'>
                                            <div class='choose<?php echo $j; ?>' onclick="writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                    <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='A'>
                                                    &nbsp;A. <?php echo $v->getPaA(); ?>
                                                </label><br>
                                                <?php if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'], "imgdapan"); ?>
                                            </div>
                                            <?php
                                            $j++;
                                            ?>
                                            <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                    <input class='choose<?php echo ($k + 1); ?>' type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='B' checked>
                                                    &nbsp;B. <?php echo $v->getPaB(); ?>
                                                </label><br>
                                                <?php if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'], "imgdapan"); ?>
                                            </div>
                                            <?php
                                            $j++;
                                            ?>
                                            <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                    <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='C'>
                                                    &nbsp;C. <?php echo $v->getPaC(); ?>
                                                </label><br>
                                                <?php if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'], "imgdapan"); ?>
                                            </div>
                                            <?php
                                            $j++;
                                            ?>
                                            <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                    <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='D'>
                                                    &nbsp;D. <?php echo $v->getPaD(); ?>
                                                </label>
                                                <?php if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'], "imgdapan"); ?>
                                            </div>
                                        </div>
                                    <?php

                                    $j++;
                                    break;
                                case 'C':
                                    ?>
                                        <div class='areaexam'>
                                            <div class='cauhoi' id='ch<?= $k + 1 ?>'>
                                                Câu hỏi
                                                <b>
                                                    <?= $k + 1 ?>
                                                </b>:
                                                <div class='tencauhoi'>
                                                    <?= $v->getCauhoi() ?>
                                                    <?php if (!empty($cdata['imgviauTencauhoi']))
                                                        reg($cdata['imgviauTencauhoi'], "imgcauhoi"); ?>
                                                </div>
                                                <script>
                                                    fillBackground('s<?php echo ($k + 1); ?>');
                                                </script>
                                                <div class='dapan'>
                                                    <div class='choose<?php echo $j; ?>' onclick="writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                        <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                            <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='A'>
                                                            &nbsp;A. <?php echo $v->getPaA(); ?>
                                                        </label><br>
                                                        <?php if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'], "imgdapan"); ?>
                                                    </div>
                                                    <?php
                                                    $j++;
                                                    ?>
                                                    <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                        <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                            <input class='choose<?php echo ($k + 1); ?>' type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='B'> &nbsp;B.
                                                            <?php echo $v->getPaB(); ?> </label><br>
                                                        <?php if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'], "imgdapan"); ?>
                                                    </div>
                                                    <?php
                                                    $j++;
                                                    ?>
                                                    <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                        <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                            <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='C' checked>
                                                            &nbsp;C. <?php echo $v->getPaC(); ?>
                                                        </label><br>
                                                        <?php if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'], "imgdapan"); ?>
                                                    </div>
                                                    <?php
                                                    $j++;
                                                    ?>
                                                    <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                        <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                            <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='D'>
                                                            &nbsp;D. <?php echo $v->getPaD(); ?>
                                                        </label>
                                                        <?php if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'], "imgdapan"); ?>
                                                    </div>
                                                </div>
                                            <?php

                                            $j++;
                                            break;
                                        case 'D':
                                            ?>
                                                <div class='areaexam'>
                                                    <div class='cauhoi' id='ch<?= $k + 1 ?>'>
                                                        Câu hỏi
                                                        <b>
                                                            <?= $k + 1 ?>
                                                        </b>:
                                                        <div class='tencauhoi'>
                                                            <?= $v->getCauhoi() ?>
                                                            <?php if (!empty($cdata['imgviauTencauhoi']))
                                                                reg($cdata['imgviauTencauhoi'], "imgcauhoi"); ?>
                                                        </div>
                                                        <script>
                                                            fillBackground('s<?php echo ($k + 1); ?>');
                                                        </script>
                                                        <div class='dapan'>
                                                            <div class='choose<?php echo $j; ?>' onclick="writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                                <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                                    <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='A'>
                                                                    &nbsp;A. <?php echo $v->getPaA(); ?>
                                                                </label><br>
                                                                <?php if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'], "imgdapan"); ?>
                                                            </div>
                                                            <?php
                                                            $j++;
                                                            ?>
                                                            <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                                <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                                    <input class='choose<?php echo ($k + 1); ?>' type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='B'> &nbsp;B.
                                                                    <?php echo $v->getPaB(); ?> </label><br>
                                                                <?php if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'], "imgdapan"); ?>
                                                            </div>
                                                            <?php
                                                            $j++;
                                                            ?>
                                                            <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                                <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                                    <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='C'>
                                                                    &nbsp;C. <?php echo $v->getPaC(); ?>
                                                                </label><br>
                                                                <?php if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'], "imgdapan"); ?>
                                                            </div>
                                                            <?php
                                                            $j++;
                                                            ?>
                                                            <div class='choose<?php echo $j; ?>' onclick=" writechoose('choose<?php echo $j; ?>')" style='margin-bottom:0.6em;'>
                                                                <label onClick="fillBackground('s<?php echo ($k + 1); ?>')">
                                                                    <input type='radio' id='tcau<?php echo ($k + 1); ?>' name='cau<?php echo ($k + 1); ?>' value='D' checked>
                                                                    &nbsp;D. <?php echo $v->getPaD(); ?>
                                                                </label>
                                                                <?php if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'], "imgdapan"); ?>
                                                            </div>
                                                        </div>
                                                <?php

                                                $j++;
                                                break;
                                        } ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        <?php endforeach; ?>

            </form>

        </div>
    </div>
    <!--End phần câu hỏi-->
    <!--</div>-->
</body>

</html>