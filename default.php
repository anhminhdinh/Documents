<?php
//cấu hình thông tin do google cung cấp
$api_url = 'https://www.google.com/recaptcha/api/siteverify';
$site_key = '6LeMqwkUAAAAAJChMFDQ8ai01v5xoSCxnZBHLQkL';
$secret_key = '6LeMqwkUAAAAAGQEkRITNtt_fmxNf3uWXB-0NTpw';

//kiem tra submit form
if (isset($_POST['submit'])) {
    //lấy dữ liệu được post lên
    $site_key_post = $_POST['g-recaptcha-response'];

    //lấy IP của khach
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $remoteip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $remoteip = $_SERVER['REMOTE_ADDR'];
    }

    //tạo link kết nối
    $api_url = $api_url . '?secret=' . $secret_key . '&response=' . $site_key_post . '&remoteip=' . $remoteip;
    //lấy kết quả trả về từ google
    $response = file_get_contents($api_url);
    //dữ liệu trả về dạng json
    $response = json_decode($response);
    if (!isset($response->success)) {
        echo 'Captcha khong dung';
    }
    if ($response->success == true) {
        echo 'Captcha dung';
    } else {
        echo 'Captcha khong dung';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <?php
        header("Access-Control-Allow-Origin: *");
        ?>
        <!-- this text is for test 01 -->
        <!-- <meta http-equiv="refresh" content="15"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="HiTutor | Interactive English">
        <meta name="author" content="Minh Dinh, based on the Shield theme of Carlos Alvarez - Alvarez.is - blacktie.co">
        <link rel="shortcut icon" href="assets/img/icon.png">
        <title lang="en">
            HiTutor | Interactive English
        </title>
        <title lang="vi">
            HiTutor | Tiếng Anh tương tác
        </title>
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="assets/css/main.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media
        queries -->
        <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            @media (max-width: 1200px) {
                .navbar-header {
                    float: none;
                }
                .navbar-left, .navbar-right {
                    float: none !important;
                }
                .navbar-toggle {
                    display: block;
                }
                .navbar-collapse {
                    border-top: 1px solid transparent;
                    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
                }
                .navbar-fixed-top {
                    top: 0;
                    border-width: 0 0 1px;
                }
                .navbar-collapse.collapse {
                    display: none !important;
                }
                .navbar-nav {
                    float: none !important;
                    margin-top: 7.5px;
                }
                .navbar-nav > li {
                    float: none;
                }
                .navbar-nav > li > a {
                    padding-top: 10px;
                    padding-bottom: 10px;
                }
                .collapse.in {
                    display: block !important;
                }

            }

        </style>
    </head>
    <body style="background-color: #fff;" lang="en">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar-main" style="margin-bottom: 0px; min-height: 40px; padding: 0px; border-bottom: none;">
            <div class="container-fluid" style="vertical-align: middle">
                <figure class="figure col-xs-5" style="max-width: 180px; min-width: 140px; max-height: 60px; padding: 5px">
                    <a href="#" onclick="javascript: {
                                history.go(0);
                                document.location.reload(true);
                            }">
                        <img id="id_logo_img" class="img main-logo" style="max-height: calc(100% - 22px); max-width: 100%; display: block;" src="assets/img/logo.png">
                    </a>
                </figure>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar">
                        </span>
                        <span class="icon-bar">
                        </span>
                        <span class="icon-bar">
                        </span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" data-toggle="collapse" data-target=".navbar-collapse.in" aria-expanded="false">
                    <!-- data-target=".navbar-collapse.in" -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#About">
                                <span lang="en" style="display:inherit">
                                    About hiTutor
                                    <span class="caret">
                                    </span>
                                </span>
                                <span lang="vi" style="display:none">
                                    Giới thiệu
                                    <span class="caret">
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#about" class="smoothScroll">
                                        <span lang="en" style="display: none">
                                            About hiTutor
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Lời dẫn
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#why" class="smoothScroll">
                                        <span lang="en" style="display: none">
                                            Why hiTutor
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Tại sao chọn hiTutor
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#democlass" class="smoothScroll">
                                <span lang="en" style="display: none">
                                    Demo class
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Lớp học mẫu
                                </span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#Program" aria-haspopup="true" aria-expanded="false">
                                <span lang="en" style="display: none">
                                    Programmes
                                    <span class="caret">
                                    </span>
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Chương trình học
                                    <span class="caret">
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="success">
                                    <a id="id_menu_program_peppa_btn" href="#kinder" class="smoothScroll">
                                        <span lang="en" style="display: none">
                                            Kinder Star
                                            <br>
                                            <span style="font-size: small;">
                                                For Kindergarten
                                            </span>
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Kinder Star
                                            <br>
                                            <span style="font-size: small;">
                                                Tiếng Anh Mầm non
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="warning">
                                    <a id="id_menu_program_juniors_btn" href="#children" class="smoothScroll">
                                        <span lang="en" style="display: none">
                                            Wonder Child
                                            <br>
                                            <span style="font-size: small;">
                                                For Child
                                            </span>
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Wonder Child
                                            <br>
                                            <span style="font-size: small;">
                                                Tiếng Anh Thiếu nhi
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="danger">
                                    <a id="id_menu_program_teens_btn" href="#teens" class="smoothScroll">
                                        <span lang="en" style="display: none">
                                            Rocket Teens
                                            <br>
                                            <span style="font-size: small;">
                                                For Teenagers
                                            </span>
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Rocket Teens
                                            <br>
                                            <span style="font-size: small;">
                                                Tiếng Anh Thiếu niên
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li class="info">
                                    <a id="id_menu_program_homeschool_btn" href="#homeschool" class="smoothScroll">
                                        <span lang="en" style="display: none">
                                            Home Tutor
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Giáo viên tại nhà
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a id="id_menu_program_pathway_btn" href="#pathway" class="smoothScroll">
                                        <span lang="en" style="display: none">
                                            Learning pathway
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Lộ trình học
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a id="id_menu_program_schedule_btn" href="#schedule" class="smoothScroll">
                                        <span lang="en" style="display: none">
                                            Programme Schedule
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Lịch học
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a id="id_menu_program_fee_btn" href="#tuition" class="smoothScroll">
                                        <span lang="en" style="display: none">
                                            Tuition
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Học phí
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a id="id_menu_teacher_btn" href="#body_teacherpage" class="smoothScroll" data-toggle="collapse" data-target=".navbar-collapse.in">
                                <span lang="en" style="display: none">
                                    Teacher
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Giáo viên
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#contact" class="smoothScroll">
                                <span lang="en" style="display: none">
                                    Contact
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Liên hệ
                                </span>
                            </a>
                        </li>
                        <li>
                            <a class="btn btn-default nav-btn" id="id_btn_register" data-toggle="modal" data-target="#register-modal">
                                <span lang="en" style="display: none">
                                    Register
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Đăng ký
                                </span>
                            </a>
                            <!-- style="padding: 5px; margin-top: 10px;
                            font-size: 16px;" -->
                        </li>
                    </ul>
                </div>
                <!-- </div> -->
            </div>
            <div class="container-fluid" style="vertical-align: middle;">
                <button class="navbar-link btn-link" style="padding: 2px; margin: 0px; vertical-align: middle;">
                    <a href="tel:0888000938" style="font-weight:bold;color:#d84315; font-size: 16px; margin: 0px; padding: 0px; letter-spacing: -1px">
                        <i class="fa fa-phone" style="color: #212121; font-size: smaller;">
                        </i>
                        0888000938
                    </a>
                </button>
                <div class="btn-group" role="group" style="float: right; vertical-align: middle; margin: 0px;">
                    <button class="navbar-btn btn-link" style="margin: 0px; padding: 2px; border: none">
                        <!--  -->
                        <a rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="http://facebook.com/hitutor.vn" target="_blank">
                            <img src="assets/img/F_icon.svg" height="28">
                        </a>
                    </button>
                    <button id="id_btn_lang" class="navbar-btn btn-link" style="margin: 0px; padding: 2px; border: none">
                        <img id="id_lang_img" src="assets/img/flags/gb.svg" height="28">
                    </button>
                </div>
            </div>
        </nav>
        <!-- <div class="navbar navbar-default" role="navigation"
        style="margin-bottom: 0px; padding: 0px;">
        </div> -->
        <!-- mainpage section -->
        <div id="body_mainpage" style="display: inline">
            <!-- ==== HEADERWRAP ==== -->
            <div id="headerwrap" id="home" name="home">
                <!-- class="clearfix container-fluid" -->
                <div class="viewport">
                    <hh lang="en" class="tlt" style="text-shadow: 0px 0px 3px #000000; display: none;">Let your child enjoy hiTutor living English</hh>
                    <hh lang="vi" class="tlt" style="text-shadow: 0px 0px 3px #000000; display: none;">Hãy để con trải nghiệm cuộc sống tiếng Anh muôn màu</hh>
                </div>
                <!-- <div id="id_header_img_div" class="centered" style="height:
                200px">
                <img id="id_header_img" class="img"
                src="assets/img/welcomelogo.png" alt="" style="filter:
                url(/assets/img/shadow.svg#drop-shadow);">
                </div> -->
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-margin">
                        <a id="id_head_btn_kinder" class="btn btn-success btn-block btn-xs" style="white-space: normal;" href="#kinder">
                            <div>Kinder Star</div>
                            <div lang="vi" style="display: inherit" class="course-subtitle">Tiếng Anh Mầm non</div>
                            <div lang="en" style="display: none" class="course-subtitle">For Kindergarten</div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-xs-6 col-margin">
                        <a id="id_head_btn_children" class="btn btn-warning btn-block btn-xs" style="white-space: normal;" href="#children">
                            <div>Wonder Child</div>
                            <div lang="vi" style="display: inherit" class="course-subtitle">Tiếng Anh Thiếu nhi</div>
                            <div lang="en" style="display: none" class="course-subtitle">For Child</div>
                        </a>
                    </div>
                    <div class="clearfix visible-xs-block">
                    </div>
                    <div class="col-sm-3 col-xs-6 col-margin">
                        <a id="id_head_btn_teens" class="btn btn-danger btn-block btn-xs" style="white-space: normal;" href="#teens">
                            <div>Rocket Teens</div>
                            <div lang="vi" style="display: inherit" class="course-subtitle">Tiếng Anh Thiếu niên</div>
                            <div lang="en" style="display: none" class="course-subtitle">For Teenagers</div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-xs-6 col-margin">
                        <a id="id_head_btn_home_tutor" class="btn btn-info btn-block btn-xs" style="white-space: normal;" href="#kinder">
                            <div>Home Tutor</div>
                            <div lang="vi" style="display: inherit" class="course-subtitle"><br /></div>
                            <div lang="en" style="display: none" class="course-subtitle"><br /></div>
                        </a>
                    </div>
                </div>
            </div>
            <!--headerwrap -->
            <!-- ==== ABOUT ==== -->
            <div class="container head-link" id="about" name="about" style="padding-bottom: 40px; background-color: #fff">
                <h1 lang="en" style="display: none">
                    About hiTutor
                </h1>
                <h1 lang="vi" style="display: inherit">
                    Lời dẫn
                </h1>
                <div lang="en" style="display: inherit; text-align: justify;">
                    Holding that Life is full of language and language is a reflection of our lives, hiTutor endevours to create unique Living English experiences for learners at the most effective investment level. hiTutor teachers and kid learners will share memorable English moments via practical-life activities ie: story telling, movie watching, socio-science explorational projects. English, which is embedded is daily activities as well as moral and life-skill lessons, will naturally get into children's mind, then reflect on their social behaviors, and become an integral part of their future lives.
                </div>
                <div lang="vi" style="display: none; text-align: justify;">
                    Cuộc sống quanh ta tràn ngập ngôn ngữ và ngôn ngữ chính là cuộc sống. Với tâm niệm đó, hiTutor được thành lập cùng nỗ lực tạo ra những trải nghiệm Anh văn tương tác hoàn toàn khác biệt cho người học với một mức đầu tư hiệu quả nhất. Học viên nhí của hiTutor sẽ cùng với giảng viên của chúng tôi trải nghiệm cuộc sống bằng tiếng Anh, qua những câu chuyện, mẩu phim, khám phá khoa học, đời sống, và xã hội. Tiếng Anh sẽ đồng hành cùng trẻ từ những điều nhỏ nhặt hàng ngày tới những bài học về nhân cách và kỹ năng sống, từ đó tạo ra sự khác biệt đáng kể trong khả năng vận dụng Anh ngữ của trẻ vào cuộc sống và ứng xử, xây dựng hành trang phát triển cho trẻ mỗi ngày.
                </div>
            </div>
            <!-- container -->
            <!-- ==== SECTION DIVIDER1 -->
            <section class="section-divider textdivider divider1">
                <div class="container">
                    <h1 lang="en" style="display: inline; text-align: center;">
                        “A different language is a different vision of life.”
                    </h1>
                    <h1 lang="vi" style="display: none; text-align: center;">
                        “A different language is a different vision of life.”
                    </h1>
                    <hr>
                    <p lang="en" style="display: inline; text-align: center;">
                        Federico Fellini
                    </p>
                    <p lang="vi" style="display: none; text-align: center;">
                        Federico Fellini
                    </p>
                </div>
                <!-- container -->
            </section>
            <!-- section -->
            <!-- ==== WHY HITUTOR ==== -->
            <div class="container head-link" id="why" name="why" style="padding-bottom: 10px">
                <h1 lang="en" style="display: none">
                    Why HiTutor
                </h1>
                <h1 lang="vi" style="display: inherit">
                    Tại sao chọn hiTutor
                </h1>
                <!-- <hr> -->
                <div class="centered">
                    <div class="row is-table-row" style="border-bottom: 1px solid rgba(0, 0, 0, 0.5);">
                        <div class="col-sm-4 col-xs-12 centered col-xs" style="padding-bottom: 5px;">
                            <div class="row container-fluid">
                                <b style="font-size: large;">
                                    <span lang="en" style="display: inherit;">
                                        Small-group learning
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Học theo nhóm nhỏ
                                    </span>
                                </b>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <img class="img" src="assets/img/why/groupkids.png" width="100%" alt="">
                                </div>
                                <div class="col-md-8 hidden-sm col-xs-12" style="font-size: small">
                                    <div lang="en" style="display: inherit; text-align: justify;">
                                        Small groups of 5-8 are arranged to create the best interactive environment for learners.
                                    </div>
                                    <div lang="vi" style="display: none; text-align: justify;">
                                        Nhằm xây dựng môi trường tương tác tốt nhất, lớp học hiTutor sẽ được thiết kế theo nhóm nhỏ 5-8 người.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12 centered col-xs" style="padding-bottom: 5px; border-left: 1px solid rgba(0, 0, 0, 0.5);border-right: 1px solid rgba(0, 0, 0, 0.5);">
                            <div class="row container-fluid">
                                <b style="font-size: large;">
                                    <span lang="en" style="display: none">
                                        Qualified teachers
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Giáo viên bản ngữ
                                    </span>
                                </b>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <img class="img" src="assets/img/why/teacher.png" width="100%" alt="">
                                </div>
                                <div class="col-md-8 hidden-sm col-xs-12" style="font-size: small">
                                    <div lang="en" style="display: inherit; text-align: justify;">
                                        Qualified foreign teachers who are carefully recruited and trained by hiTutor will not only improve learners' English accent, but also develop a positive body language pattern in their communications.
                                    </div>
                                    <div lang="vi" style="display: none; text-align: justify;">
                                        Tương tác với đội ngũ giáo viên bản ngữ được tuyển chọn và đào tạo bởi hiTutor không chi giúp chuẩn hoá phát âm mà còn giúp trẻ làm quen với ngôn ngữ hình thể và ngôn ngữ ứng xử tự tin và văn minh.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12 centered col-xs" style="padding-bottom: 5px;">
                            <div class="row container-fluid">
                                <b style="font-size: large;">
                                    <span lang="en" style="display: none">
                                        Convenient locations
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Địa điểm tiện lợi
                                    </span>
                                </b>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <img class="img" src="assets/img/why/location.png" width="100%" alt="">
                                </div>
                                <div class="col-md-8 hidden-sm col-xs-12" style="font-size: small">
                                    <div lang="en" style="display: inherit; text-align: justify;">
                                        To bring hiTutor Living English closer to Vietnamese learners, our classes are located either at or nearby learners ' houses.
                                    </div>
                                    <div lang="vi" style="display: none; text-align: justify;">
                                        Với mong muốn đưa Anh văn tương tác tới gần hơn với người học, lớp học hiTutor sẽ được bố trí tại nhà học viên, hoặc tại một địa điểm tiện lợi gần nhà.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row is-table-row" style="">
                        <div class="col-sm-4 col-xs-12 centered col-xs" style="padding-bottom: 5px;">
                            <div class="row container-fluid">
                                <b style="font-size: large;">
                                    <span lang="en" style="display: none">
                                        Inspirational Programmes
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Chương trình sinh động
                                    </span>
                                </b>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <img class="img" src="assets/img/why/readbooks.png" width="100%" alt="">
                                </div>
                                <div class="col-md-8 hidden-sm col-xs-12" style="font-size: small">
                                    <div lang="en" style="display: inherit; text-align: justify;">
                                        Inspirational contents from movies, songs, edu-games, social, cultural and science materials suited to each level and age group. Learning time is shared between academic learning & practical-life learning activities between learning from tutors and cross-leaner learning.
                                    </div>
                                    <div lang="vi" style="display: none; text-align: justify;">
                                        Chương trình lồng ghép những nội dung phim ảnh, ca nhạc, game vui, kiến thức khoa học, văn hoá, xã hội, phù hợp với từng trình độ và lứa tuổi. Kết hợp thời lượng học từ sách và học từ hoạt động đời sống, học từ giảng viên và học lẫn nhau.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12 centered col-xs" style="padding-bottom: 5px; border-left: 1px solid rgba(0, 0, 0, 0.5);border-right: 1px solid rgba(0, 0, 0, 0.5);">
                            <div class="row container-fluid">
                                <b style="font-size: large;">
                                    <span lang="en" style="display: none">
                                        Enhanced-interations
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Tăng cường tương tác
                                    </span>
                                </b>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <img class="img" src="assets/img/why/dance.png" width="100%" alt="">
                                </div>
                                <div class="col-md-8 hidden-sm col-xs-12" style="font-size: small">
                                    <div lang="en" style="display: inherit; text-align: justify;">
                                        Teachers are not one-way knowledge providers. Instead, they act as enthusiatic facilitators in hiTutor living English environment whereby learners are the centers.
                                    </div>
                                    <div lang="vi" style="display: none; text-align: justify;">
                                        Giảng viên không truyền đạt kiến thức Anh ngữ đơn thuần. Đây là những người góp phần kiến tạo ra môi trường Anh văn tương tác, là hoạt náo viên tích cực duy trì tương tác Anh ngữ của các học viên trong môi trường đó.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12 centered col-xs" style="padding-bottom: 5px;">
                            <div class="row container-fluid">
                                <b style="font-size: large;">
                                    <span lang="en" style="display: none">
                                        Effective Investment
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Đầu tư hiệu quả
                                    </span>
                                </b>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <img class="img" src="assets/img/why/Purse.svg" width="100%" alt="">
                                </div>
                                <div class="col-md-8 hidden-sm col-xs-12" style="font-size: small">
                                    <div lang="en" style="display: inherit; text-align: justify;">
                                        To enable better access to hiTutor Living English environment, we offer the best investment-effective product packages to the market.
                                    </div>
                                    <div lang="vi" style="display: none; text-align: justify;">
                                        Để đưa Anh văn tương tác tới gần hơn với nhiều trẻ nhỏ, hiHutor cam kết gói sản phẩm chất lượng ở một mức đầu tư hiệu quả so với thị trường.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
            <!-- ==== SECTION DIVIDER2 -->
            <section class="section-divider textdivider divider2">
                <div class="container-fluid">
                    <h1 lang="en" style="display: inline; text-align: center;">
                        “Tell me and I forget, teach me and I remember. involve me and I learn.”
                    </h1>
                    <h1 lang="vi" style="display: none; text-align: center;">
                        “Tell me and I forget, teach me and I remember. involve me and I learn.”
                    </h1>
                    <hr>
                    <p lang="en" style="display: inline; text-align: center;">
                        Benjamin Franklin
                    </p>
                    <p lang="vi" style="display: none; text-align: center;">
                        Benjamin Franklin
                    </p>
                </div>
                <!-- container -->
            </section>
            <!-- section -->
            <!-- ==== DEMO CLASS ==== -->
            <div class="head-link" id="democlass" name="democlass" style="padding-top: 150px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6" style="padding-left: 20px; padding-right: 20px; padding-bottom: 30px;">
                            <div class="row" style="padding: 10px; background-color: #eee">
                                <div class="col-lg-6">
                                    <div class="youtube embed-responsive embed-responsive-16by9" id="2P5Nc1Q3lg0">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <h1 lang="en" style="display: inherit; padding-top: 0px; margin-top: 0px">
                                            Demo class
                                        </h1>
                                        <h1 lang="vi" style="display: none; padding-top: 0px; margin-top: 0px">
                                            Lớp học mẫu
                                        </h1>
                                    </div>
                                    <span lang="en" style="display: none">
                                        Some video clips => need caption here
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Video clip căt ghép cảnh quay lớp học mẫu, phỏng vấn giáo viên, phỏng vấn học viên.
                                    </span>
                                    <hr>
                                    <button class="btn btn-default" data-toggle="modal" data-target="#register-modal">
                                        <span lang="en" style="display: none">
                                            Register
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Đăng ký
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6" style="padding-left: 20px; padding-right: 20px; padding-bottom: 30px;">
                            <div class="row" style="padding: 10px;">
                                <div class="col-lg-6" style="padding-bottom: 10px;">
                                    <div class="youtube embed-responsive embed-responsive-16by9" id="2P5Nc1Q3lg0">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div>
                                        <h1 lang="en" style="display: inherit; padding-top: 0px; margin-top: 0px">
                                            Demo class
                                        </h1>
                                        <h1 lang="vi" style="display: none; padding-top: 0px; margin-top: 0px">
                                            Lớp học mẫu
                                        </h1>
                                    </div>
                                    <span lang="en" style="display: none">
                                        Some video clips => need caption here
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Video clip căt ghép cảnh quay lớp học mẫu, phỏng vấn giáo viên, phỏng vấn học viên.
                                    </span>
                                    <hr>
                                    <button class="btn btn-default" data-toggle="modal" data-target="#register-modal">
                                        <span lang="en" style="display: none">
                                            Register
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Đăng ký
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>
            </div>
            <!-- greywrap -->
            <!-- ==== SECTION DIVIDER3 -->
            <section class="section-divider textdivider divider3">
                <div class="container-fluid">
                    <h1 lang="en" style="display: inline; text-align: center;">
                        “Language is for the living of life
                        <br>
                        <span style="font-size: smaller;">
                            not for the production of structures.
                        </span>
                        ”
                    </h1>
                    <h1 lang="vi" style="display: inline; text-align: center;">
                        “Language is for the living of life
                        <br>
                        <span style="font-size: smaller;">
                            not for the production of structures.
                        </span>
                        ”
                    </h1>
                    <hr>
                    <p lang="en" style="display: inline; text-align: center;">
                        Ruqaiya Hasan
                    </p>
                    <p lang="vi" style="display: none; text-align: center;">
                        Ruqaiya Hasan
                    </p>
                </div>
                <!-- container -->
            </section>
            <!-- section -->
            <!--==== CONTACT FORM =====-->
            <div class="container head-link" id="contact" name="contact" style="padding-bottom: 40px; background-color: #fff">
                <h1 lang="en" style="display: none">
                    Contact
                </h1>
                <h1 lang="vi" style="display: inherit">
                    Liên hệ
                </h1>
                <div class="row">
                    <div class="col-sm-3">
                        <span lang="en" style="display: none">
                            We are pleased to receive your questions and feedbacks to better improve our product and services
                        </span>
                        <span lang="vi" style="display: inherit">
                            Chúng tôi vui lòng nhận được thông tin hay phản hồi từ phía phụ huynh, học viên, giáo viên, và cộng đồng.
                        </span>
                    </div>
                    <div class="col-sm-9" style="background-color: #eee; padding: 30px 10px">
                        <form action="" method="post" class="form-horizontal">
                            <!-- onsubmit="return sendReply();" -->
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_contact_input_subject">
                                    <span lang="en" style="display: none">
                                        Subject
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Tiêu đề
                                    </span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="subject" id="id_contact_input_subject" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_contact_input_name">
                                    <span lang="en" style="display: none">
                                        Name
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Tên
                                    </span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="name" class="form-control" name="name" id="id_contact_input_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_contact_input_email">
                                    <span lang="en" style="display: none">
                                        Email
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Email
                                    </span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" id="id_contact_input_email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_contact_input_mobile">
                                    <span lang="en" style="display: none">
                                        Mobile
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Điện thoại
                                    </span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="tel" class="form-control" name="mobile" id="id_contact_input_mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_contact_input_message">
                                    <span lang="en" style="display: none">
                                        Message
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Lời nhắn
                                    </span>
                                </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="5" name="message" id="id_contact_input_message" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="g-recaptcha" data-sitekey="6LeMqwkUAAAAAJChMFDQ8ai01v5xoSCxnZBHLQkL"></div>
                                    <!-- <div id="recaptcha_Client">
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" name="submit" class="btn btn-default" id="clientSubmitBtn">
                                    <span lang="en" style="display: none">
                                        Submit
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Gửi
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- container -->
        </div>
        <!-- end mainpage section -->
        <!-- teacherpage section -->
        <div id="body_teacherpage" style="display: none;" class="head-link">
            <div class="container head-link">
                <h1>
                    <!-- style="margin-top: 0px; padding: 30px" -->
                    <span lang="en" style="display: none">
                        Message to Teacher
                    </span>
                    <span lang="vi" style="display: inherit">
                        Gửi Giáo viên
                    </span>
                </h1>
                <div class="row">
                    <!-- style="padding: 20px 30px;" -->
                    <!-- container -->
                    <div class="container col-md-4" id="teacher" name="teacher">
                        <!-- style="padding: 30px" -->
                        <div lang="en" style="display: inherit; text-align: justify;">
                            We understand that teachers play a vital role in the delivery of learning experiences and outcome quality, which in turn decide the delivery of our commitments to learners and their parents. Therefore, at hiTutor, we endevour to create a healthy and cooperative working environment for teachers. Please send your resumes to us so that we could have a chance to work together in expanding hiTutor Living English to more andmore learners
                            in Vietnam.
                        </div>
                        <div lang="vi" style="display: none; text-align: justify;">
                            Chúng tôi hiểu rằng Giáo viên đóng vai trò tiên quyết đối với chất lượng giảng dạy cũng như những cam kết của chúng tôi đối với phụ huynh và học viên. Do vậy, tại hiTutor, chúng tôi nỗ lực tạo dựng môi trường làm việc và phát triển tốt nhất dành cho giáo viên. Vui lòng gửi cho chúng tôi thông tin và CV để chúng ta có cơ hội chung tay mở rộng môi trường Anh văn tương tác của hiTutor tới nhiều hơn nữa các học viên tại ViệtNam.
                        </div>
                    </div>
                    <div class="container col-md-8" id="teacher_register" name="teacher_register">
                        <!-- style="padding: 0px 50px; background-color: #eee"
                        -->
                        <form class="form-horizontal" style="background-color: #eee; padding-bottom: 10px">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_teacher_reg_input_name">
                                    <span lang="en" style="display: none">
                                        Name
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Tên
                                    </span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="name" class="form-control" id="id_teacher_reg_input_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_teacher_reg_input_email">
                                    <span lang="en" style="display: none">
                                        Email
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Email
                                    </span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="id_teacher_reg_input_email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_teacher_reg_input_mobile">
                                    <span lang="en" style="display: none">
                                        Mobile
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Điện thoại
                                    </span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="tel" class="form-control" id="id_teacher_reg_input_mobile">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_teacher_reg_input_cv">
                                    <span lang="en" style="display: none">
                                        CV
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        CV
                                    </span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" accept=".doc .docx .pdf" id="id_teacher_reg_input_cv">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="id_teacher_reg_input_message">
                                    <span lang="en" style="display: none">
                                        Message
                                    </span>
                                    <span lang="vi" style="display: inherit">
                                        Lời nhắn
                                    </span>
                                </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="5" id="id_teacher_reg_input_message"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div id="recaptcha_Teacher">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 text-right">
                                    <button id="teacherRegBtn" type="submit" class="btn btn-default" disabled>
                                        <span lang="en" style="display: none">
                                            Submit
                                        </span>
                                        <span lang="vi" style="display: inherit">
                                            Đăng ký
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end teacherpage section -->
        <!-- programmes section -->
        <div id="body_programpage" style="display: none">
            <div class="container head-link" id="kinder" name="kinder" style="padding-bottom: 50px;">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="zoom-zone">
                            <img src="assets/img/courses/kinder_sm.jpg" width="100%">
                            <div class="overlay">
                            </div>
                            <div lang="en" style="display: none" class="btn-group btn-group-justified">
                                <a class="btn btn-default btn-demo" href="#democlass">
                                    Demo Class
                                </a>
                                <a class="btn btn-default" href="#schedule" >
                                    Schedule
                                </a>
                                <a class="btn btn-default" href="#tuition" >
                                    Tuition
                                </a>
                            </div>
                            <div lang="vi" style="display: inherit" class="btn-group btn-group-justified">
                                <a class="btn btn-default btn-demo" href="#democlass">
                                    Lớp học mẫu
                                </a>
                                <a class="btn btn-default" href="#schedule" >
                                    Lịch học
                                </a>
                                <a class="btn btn-default" href="#tuition" >
                                    Học phí
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div style="padding-bottom: 20px;">
                            <h4 lang="en" style="display: none">
                                Kinder Star
                                <br>
                                <span style="font-size: small;">
                                    For Kindergarten (age 3-6)
                                </span>
                            </h4>
                            <h4 lang="vi" style="display: inherit">
                                Kinder Star
                                <br>
                                <span style="font-size: small;">
                                    Tiếng Anh Mầm non (3-6 tuổi)
                                </span>
                            </h4>
                            <span lang="en" style="display: inherit; text-align: justify;">
                                Nursery age is defined as gold period for language development. Getting children to hiTutor English at their early age contributes to the solid development of their native accent, artistic mindset and critical thinking.
                                <br>
                                <br>
                                Kinder Star is designed for children aged 3-6, aimed at above objectives. hiTutor creates a living English environment for children with stories & poems telling, singing & dancing, and extra-curriculum activites, which enables them to absorb and communicate in English just the same way as they do with their monther-tongue. English, embedded into the children mind via vivid audio-visiuals as well as living materials, grows with the kids in parrallel with their first language. They get to explore the world, express their emotional and logical thinking in English natually and continually.
                            </span>
                            <span lang="vi" style="display: none; text-align: justify;">
                                Độ tuổi mầm non là giai đoạn vàng dành cho phát triển ngôn ngữ của bé. Việc đưa bé tiếp xúc sớm với Anh ngữ hiTutor giúp tăng cường khả năng phát âm chuẩn cũng như tư duy thẩm mỹ và tư duy phản biện ở bé một cách tự nhiên.
                                <br>
                                <br>
                                Kinder Star là chương trình Anh văn được thiết kế riêng cho các bé mầm non 3-6 tuổi nhắm vào những mục tiêu trên. Giống như cách các bé học nói tiếng mẹ đẻ, trong môi trường Anh văn Tương tác của hiTutor, các bé được tiếp xúc với tiếng Anh thông qua những câu truyện, bài thơ, những vận động nhảy múa hát ca, và những hoạt động ngoại khoá tập thể. Môi trường Anh ngữ của hiTutor thấm dần vào bé cùng những hình ảnh, âm thanh trực quan sinh động, và cùng cả những tư liệu thực của cuộc sống, để từ đó tiếng Anh lớn lên cùng bé song song với tiếng mẹ đẻ. Bé khám phá thế giới và tư duy bằng tiếng Anh, bày tỏ cảm xúc và quan điểm bằng tiếng Anh. Tiếng Anh bật ra như một phản xạ tự nhiên của bé khi tương tác với thế giới bên ngoài.
                            </span>
                        </div>
                        <div class="text-center" style="padding-bottom: 20px;">
                            <button id="id_btn_kinder_register" class="btn btn-default" data-toggle="modal" data-target="#register-modal">
                                <span lang="en" style="display: none">
                                    Register
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Đăng ký
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container head-link" id="children" name="children" style="padding-bottom: 50px;">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="zoom-zone">
                            <img src="assets/img/courses/children_sm.jpg" width="100%">
                            <div class="overlay">
                            </div>
                            <div lang="en" style="display: none" class="btn-group btn-group-justified">
                                <a class="btn btn-default btn-demo" href="#democlass">
                                    Demo Class
                                </a>
                                <a class="btn btn-default" href="#schedule" >
                                    Schedule
                                </a>
                                <a class="btn btn-default" href="#tuition" >
                                    Tuition
                                </a>
                            </div>
                            <div lang="vi" style="display: inherit" class="btn-group btn-group-justified">
                                <a class="btn btn-default btn-demo" href="#democlass">
                                    Lớp học mẫu
                                </a>
                                <a class="btn btn-default" href="#schedule" >
                                    Lịch học
                                </a>
                                <a class="btn btn-default" href="#tuition" >
                                    Học phí
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div style="padding-bottom: 20px;">
                            <h4 lang="en" style="display: none">
                                Wonder Child
                                <br>
                                <span style="font-size: small;">
                                    For Child (Grade 1-6)
                                </span>
                            </h4>
                            <h4 lang="vi" style="display: inherit">
                                Wonder Child
                                <br>
                                <span style="font-size: small;">
                                    Tiếng Anh Thiếu nhi (Lớp 1-6)
                                </span>
                            </h4>
                            <span lang="en" style="display: inherit; text-align: justify;">
                                Primary school age provides an important foundation for the shift in children's mind from specific thinking to abstract concepts. Therefore, hiTutor offers programmes that combine both aspects tailored to certain English levels and age-groups.
                                <br>
                                <br>
                                Wonder Child curriculum is deliverred via interactive softwares, with content mapped to Cambridge certificates of Starters, Movers and Flyers. Full skill-set of listening-speaking-reading-writing is delivered with a focus on listening and speaking skills. Grammar and vocabulary are taught via vivid visual presentations. Group-interative activities facilitated by movie, photo and edu-game materials play the central role in addition to some project work that gradually get juniors to develop their creative thinking and abstract concepts as well as social behaviors in parrallel with their English communication skills.
                            </span>
                            <span lang="vi" style="display: none; text-align: justify;">
                                Giai đoạn tiểu học đóng vai trò nền tảng đối với sự phát triển tư duy của trẻ từ cụ thể sang sáng tạo, trìu tượng. Môi trường Anh ngữ hiTutor bám sát quá trình phát triển tư duy ở lứa tuổi này, để thiết kế ra những chương trình dạy học kết hợp giữa yếu tố trực quan sinh động, và một số kiến thức phản ánh tư duy trìu tượng ở cấp độ căn bản, phù hợp với từng độ tuổi.
                                <br>
                                <br>
                                Chương trình Wonder Child được xây dựng trên cơ sở ứng dụng các phần mềm học tương tác, truyền tải nội dung trình độ tương ứng các cấp chứng chỉ Starters, Movers và Flyers của Cambridge. Trẻ được phát triển cả 4 kỹ năng nghe-nói-đọc-viết, trong đó xoáy mạnh vào kỹ năng nghe-nói. Ngữ pháp và từ vựng sẽ được truyền đạt thông qua những hình ảnh trực quan sinh động. Điểm nhấn của chương trình Wonder Child vẫn là những hoạt động tương tác tập thể trên nền tư liệu sách tương tác, phim, ảnh, trò chơi được thiết kế phù hợp với từng trình độ, đan xen với cả các dự án nhóm giúp trẻ phát triển tư duy sáng tạo, trìu tượng và kỹ năng ứng xử xã hội song song với việc phát triển khả năng Anh ngữ.
                            </span>
                        </div>
                        <div class="text-center" style="padding-bottom: 20px;">
                            <button class="btn btn-default" data-toggle="modal" data-target="#register-modal">
                                <span lang="en" style="display: none">
                                    Register
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Đăng ký
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container head-link" id="teens" name="teens" style="padding-bottom: 50px;">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="zoom-zone">
                            <img src="assets/img/courses/teens_sm.jpg" width="100%">
                            <div class="overlay">
                            </div>
                            <div lang="en" style="display: none" class="btn-group btn-group-justified">
                                <a class="btn btn-default btn-demo" href="#democlass">
                                    Demo Class
                                </a>
                                <a class="btn btn-default" href="#schedule" >
                                    Schedule
                                </a>
                                <a class="btn btn-default" href="#tuition" >
                                    Tuition
                                </a>
                            </div>
                            <div lang="vi" style="display: inherit" class="btn-group btn-group-justified">
                                <a class="btn btn-default btn-demo" href="#democlass">
                                    Lớp học mẫu
                                </a>
                                <a class="btn btn-default" href="#schedule" >
                                    Lịch học
                                </a>
                                <a class="btn btn-default" href="#tuition" >
                                    Học phí
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div style="padding-bottom: 20px;">
                            <h4 lang="en" style="display: none">
                                Rocket Teens
                                <br>
                                <span style="font-size: small;">
                                    For Teenagers (Grade 6-9)
                                </span>
                            </h4>
                            <h4 lang="vi" style="display: inherit">
                                Rocket Teens
                                <br>
                                <span style="font-size: small;">
                                    Tiếng Anh Thiếu niên (Lớp 6-9)
                                </span>
                            </h4>
                            <span lang="en" style="display: inherit; text-align: justify;">
                                Teenagers experience a period of radical development in their abstract and critical thinking that helps them perceive a large amount of life knowledge and start to position themselves among society. In accordingly, hiTutor Rocket Teen Programmes are designed to on-one-hand engage teenagers into various social and sciencetific knowledge subjects in English, and on-the-other-hand promote group interactions therefrom teenagers are facilited to communicate their independent views on different subject matters in English.
                                <br>
                                <br>
                                Rocket Teen curriculum is deliverred via interactive softwares, with content mapped to Cambridge certificates of KET and PET. Full skill-set of listening-speaking-reading-writing is delivered with a focus on listening-presentation-essay writing skills. Grammar and vocabulary are taught via living resources. At the central of Rocket Teen Programmes are group project activities designed around different scientific, social, cultural & economic subject matters and tailored to each level and age group, aimed at facilitating teenage learners to share, discuss, and present their views in English. Academic materials including video clips, photos, edu-games as well as extra-curricula activities shall be applied to promote teenagers' learning spririt.
                            </span>
                            <span lang="vi" style="display: none; text-align: justify;">
                                Lứa tuổi thiếu niên là giai đoạn phát triển mạnh mẽ của tư duy trìu tượng làm cơ sở cho việc lĩnh hội kiến thức cuộc sống, và cũng là thời điểm tăng cường tư duy phản biện ở trẻ. Bởi vậy, một mặt chương trình Rocket Teen gắn kết Anh văn trong nhiều mảng kiến thức cuộc sống, tạo tinh thần hứng thú học hỏi ở trẻ, qua đó Anh ngữ thấm sâu tư duy của trẻ một cách tự nhiên. Mặt khác, hiTutor cũng tạo môi trường hoạt động tập thể để trẻ tự tin vận dụng Anh ngữ thể hiện quan điểm độc lập của mình đối với các sự vật, sự việc trong cuộc sống.
                                <br>
                                <br>
                                Chương trình Rocket Teen được xây dựng trên cơ sở ứng dụng các phần mềm học tương tác, truyền tải nội dung trình độ tương ứng các cấp chứng chỉ KET và PET của Cambridge. Trẻ được phát triển cả 4 kỹ năng nghe-nói-đọc-viết, trong đó xoáy mạnh vào kỹ năng nghe-trình bày-viết luận. Ngữ pháp và từ vựng sẽ được truyền đạt thông qua những bối cảnh sống trực quan sinh động. Điểm nhấn của chương trình Rocket Teen  là những dự án nhóm trên nền kiến thức khoa học, văn hoá, kinh tế, xã hội thiết kế phù hợp với từng trình độ để các bạn trẻ chia sẻ, thảo luận và trình bày quan điểm bằng tiếng Anh. Những học cụ trực quan sinh động như video clip, tranh ảnh, games...và một số hoạt động ngoại khoá, sẽ được đưa vào để kích thích sự hứng khởi học tập ở trẻ.
                            </span>
                        </div>
                        <div class="text-center" style="padding-bottom: 20px;">
                            <button class="btn btn-default"  data-toggle="modal" data-target="#register-modal">
                                <span lang="en" style="display: none">
                                    Register
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Đăng ký
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container head-link" id="pathway" name="pathway" style="padding-bottom: 50px;">
                <div>
                    <h1 lang="en" style="display: none">
                        Learning Pathway
                    </h1>
                    <h1 lang="vi" style="display: inherit">
                        Lộ trình học
                    </h1>
                </div>
                <div lang="en" style="display: none">
                    Please contact us for more information about a learning pathway customized to your demand.
                </div>
                <div lang="vi" style="display: inherit">
                    Vui lòng liên hệ với chúng tôi để được tư vấn khóa học phù hợp với trình độ.
                </div>
                <div lang="vi" class="table-responsive">
                    <table id="id_table_pathway" class="table table-condensed table-striped table-hover centered">
                        <!-- table-bordered -->
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center">
                                    Khóa học
                                </th>
                                <th rowspan="2" style="text-align: center">
                                    Lứa tuổi
                                    <br>
                                    (tham khảo)
                                </th>
                                <th rowspan="2" style="text-align: center">
                                    Thời gian
                                    <br>
                                    (tuần)
                                </th>
                                <th colspan="3" style="text-align: center">
                                    Thời gian (H)
                                </th>
                                <th rowspan="2" style="text-align: center">
                                    Cambridge
                                </th>
                                <th rowspan="2" style="text-align: center">
                                    Khung trình độ
                                    <br>
                                    chung Châu Âu
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Học theo
                                    <br>
                                    giáo trình
                                </th>
                                <th>
                                    Bổ sung
                                    <br>
                                    Tương tác
                                </th>
                                <th>
                                    Tổng cộng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="success">
                                <td class="table-first-col">
                                    Kinder Star
                                </td>
                                <td>
                                    3-6 tuổi
                                </td>
                                <td>
                                    45
                                </td>
                                <td>
                                    60
                                </td>
                                <td>
                                    30
                                </td>
                                <td>
                                    90
                                </td>
                                <td>
                                </td>
                                <td>
                                    Pre A0
                                </td>
                            </tr>
                            <tr class="warning">
                                <td class="table-first-col">
                                    Wonder Child 1
                                </td>
                                <td>
                                    Lớp 1-2
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    Starters
                                </td>
                                <td>
                                    A0
                                </td>
                            </tr>
                            <tr class="warning">
                                <td class="table-first-col">
                                    Wonder Child 2
                                </td>
                                <td>
                                    Lớp 3-4
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    Movers
                                </td>
                                <td>
                                    A1
                                </td>
                            </tr>
                            <tr class="warning">
                                <td class="table-first-col">
                                    Wonder Child 3
                                </td>
                                <td>
                                    Lớp 5-6
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    Flyers
                                </td>
                                <td>
                                    A2
                                </td>
                            </tr>
                            <tr class="danger">
                                <td class="table-first-col">
                                    Rocket Teen 1
                                </td>
                                <td>
                                    Lớp 6-7
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    KET
                                </td>
                                <td>
                                    A2
                                </td>
                            </tr>
                            <tr class="danger">
                                <td class="table-first-col">
                                    Rocket Teen 2
                                </td>
                                <td>
                                    Lớp 8-9
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    PET
                                </td>
                                <td>
                                    B1
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div lang="en" class="table-responsive">
                    <table id="id_table_pathway" class="table table-condensed table-striped table-hover centered">
                        <!-- table-bordered -->
                        <thead>
                            <tr>
                                <th rowspan="2" style="text-align: center">
                                    Course
                                </th>
                                <th rowspan="2" style="text-align: center">
                                    Grade
                                    <br>
                                    (for reference)
                                </th>
                                <th rowspan="2" style="text-align: center">
                                    Duration
                                    <br>
                                    (weeks)
                                </th>
                                <th colspan="3" style="text-align: center">
                                    Duration (H)
                                </th>
                                <th rowspan="2" style="text-align: center">
                                    Cambridge
                                </th>
                                <th rowspan="2" style="text-align: center">
                                    CEFR
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Book
                                    <br>
                                    curriculum
                                </th>
                                <th>
                                    Extra
                                    <br>
                                    curriculum
                                </th>
                                <th>
                                    Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="success">
                                <td class="table-first-col">
                                    Kinder Star
                                </td>
                                <td>
                                    3-6 years old
                                </td>
                                <td>
                                    45
                                </td>
                                <td>
                                    60
                                </td>
                                <td>
                                    30
                                </td>
                                <td>
                                    90
                                </td>
                                <td>
                                </td>
                                <td>
                                    Pre A0
                                </td>
                            </tr>
                            <tr class="warning">
                                <td class="table-first-col">
                                    Wonder Child 1
                                </td>
                                <td>
                                    Grade 1-2
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    Starters
                                </td>
                                <td>
                                    A0
                                </td>
                            </tr>
                            <tr class="warning">
                                <td class="table-first-col">
                                    Wonder Child 2
                                </td>
                                <td>
                                    Grade 3-4
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    Movers
                                </td>
                                <td>
                                    A1
                                </td>
                            </tr>
                            <tr class="warning">
                                <td class="table-first-col">
                                    Wonder Child 3
                                </td>
                                <td>
                                    Grade 5-6
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    Flyers
                                </td>
                                <td>
                                    A2
                                </td>
                            </tr>
                            <tr class="danger">
                                <td class="table-first-col">
                                    Rocket Teen 1
                                </td>
                                <td>
                                    Grade 6-7
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    KET
                                </td>
                                <td>
                                    A2
                                </td>
                            </tr>
                            <tr class="danger">
                                <td class="table-first-col">
                                    Rocket Teen 2
                                </td>
                                <td>
                                    Grade 8-9
                                </td>
                                <td>
                                    75
                                </td>
                                <td>
                                    100
                                </td>
                                <td>
                                    50
                                </td>
                                <td>
                                    150
                                </td>
                                <td>
                                    PET
                                </td>
                                <td>
                                    B1
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row centered">
                    <div class="col-sm-4">
                        <a class="btn btn-success" href="#kinder" class="smoothScroll">
                            <span lang="en" style="display: none">
                                Kinder Star
                                <!-- <br>
                                <span style="font-size: x-small;">
                                For Kindergarten
                                </span> -->
                            </span>
                            <span lang="vi" style="display: inherit">
                                Kinder Star
                                <!-- <br>
                                <span style="font-size: x-small;">
                                Tiếng Anh Mầm non
                                </span> -->
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-warning" href="#children" class="smoothScroll">
                            <span lang="en" style="display: none">
                                Wonder Child
                                <!-- <br>
                                <span style="font-size: x-small;">
                                For Child
                                </span> -->
                            </span>
                            <span lang="vi" style="display: inherit">
                                Wonder Child
                                <!-- <br>
                                <span style="font-size: x-small;">
                                Tiếng Anh Thiếu nhi
                                </span> -->
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-danger" href="#teens" class="smoothScroll">
                            <span lang="en" style="display: none">
                                Rocket Teens
                                <!-- <br>
                                <span style="font-size: x-small;">
                                For Teenagers
                                </span> -->
                            </span>
                            <span lang="vi" style="display: inherit">
                                Rocket Teens
                                <!-- <br>
                                <span style="font-size: x-small;">
                                Tiếng Anh Thiếu niên
                                </span> -->
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container head-link" id="schedule" name="schedule" style="padding-bottom: 50px;">
                <div>
                    <h1 lang="en" style="display: none">
                        Programme Schedule
                    </h1>
                    <h1 lang="vi" style="display: inherit">
                        Lịch học
                    </h1>
                </div>
                <div lang="en" style="display: none">
                    Please contact us for more details on the Programmes schedule.
                </div>
                <div lang="vi" style="display: inherit">
                    Vui lòng liên hệ với chúng tôi để biết thêm chi tiết thời gian bắt đầu và kết thúc khoá học.
                </div>
                <div lang="en" class="table-responsive">
                    <table class="table table-condensed table-striped table-hover centered">
                        <!-- table-bordered  -->
                        <thead>
                            <tr>
                                <th>
                                </th>
                                <th>
                                    Mon
                                </th>
                                <th>
                                    Tue
                                </th>
                                <th>
                                    Wed
                                </th>
                                <th>
                                    Thur
                                </th>
                                <th>
                                    Fri
                                </th>
                                <th>
                                    Sat
                                </th>
                                <th>
                                    Sun
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="2">
                                    8H00-8H55
                                </td>
                                <td colspan="5" rowspan="2">
                                </td>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td class="danger" colspan="2">
                                    Rocket Teen
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    9H00-9H55
                                </td>
                                <td colspan="5" rowspan="2">
                                </td>
                                <td class="success" colspan="2">
                                    Kinder Star
                                </td>
                            </tr>
                            <tr>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    10H00-10H55
                                </td>
                                <td colspan="5" rowspan="2">
                                </td>
                                <td class="success" colspan="2">
                                    Kinder Star
                                </td>
                            </tr>
                            <tr>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    11H00-11H55
                                </td>
                                <td colspan="5" rowspan="2">
                                </td>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td class="danger" colspan="2">
                                    Rocket Teen
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    5H30-6H25
                                </td>
                                <td class="success" colspan="5">
                                    Kinder Star
                                </td>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td class="warning" colspan="5">
                                    Wonder Child
                                </td>
                                <td class="danger" colspan="2">
                                    Rocket Teen
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    6H30 - 7H25
                                </td>
                                <td class="warning" colspan="7">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td class="danger" colspan="7">
                                    Rocket Teen
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div lang="vi" class="table-responsive">
                    <table class="table table-condensed table-striped table-hover centered">
                        <!-- table-bordered -->
                        <thead>
                            <tr>
                                <th>
                                </th>
                                <th>
                                    Thứ 2
                                </th>
                                <th>
                                    Thứ 3
                                </th>
                                <th>
                                    Thứ 4
                                </th>
                                <th>
                                    Thứ 5
                                </th>
                                <th>
                                    Thứ 6
                                </th>
                                <th>
                                    Thứ 7
                                </th>
                                <th>
                                    CN
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="2">
                                    8H00-8H55
                                </td>
                                <td colspan="5" rowspan="2">
                                </td>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td class="danger" colspan="2">
                                    Rocket Teen
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    9H00-9H55
                                </td>
                                <td colspan="5" rowspan="2">
                                </td>
                                <td class="success" colspan="2">
                                    Kinder Star
                                </td>
                            </tr>
                            <tr>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    10H00-10H55
                                </td>
                                <td colspan="5" rowspan="2">
                                </td>
                                <td class="success" colspan="2">
                                    Kinder Star
                                </td>
                            </tr>
                            <tr>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    11H00-11H55
                                </td>
                                <td colspan="5" rowspan="2">
                                </td>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td class="danger" colspan="2">
                                    Rocket Teen
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    5H30-6H25
                                </td>
                                <td class="success" colspan="5">
                                    Kinder Star
                                </td>
                                <td class="warning" colspan="2">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td class="warning" colspan="5">
                                    Wonder Child
                                </td>
                                <td class="danger" colspan="2">
                                    Rocket Teen
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                    6H30 - 7H25
                                </td>
                                <td class="warning" colspan="7">
                                    Wonder Child
                                </td>
                            </tr>
                            <tr>
                                <td class="danger" colspan="7">
                                    Rocket Teen
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row centered">
                    <div class="col-sm-4">
                        <a class="btn btn-success" href="#kinder" class="smoothScroll">
                            <span lang="en" style="display: none">
                                Kinder Star
                                <!-- <br>
                                <span style="font-size: x-small;">
                                For Kindergarten
                                </span> -->
                            </span>
                            <span lang="vi" style="display: inherit">
                                Kinder Star
                                <!-- <br>
                                <span style="font-size: x-small;">
                                Tiếng Anh Mầm non
                                </span> -->
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-warning" href="#children" class="smoothScroll">
                            <span lang="en" style="display: none">
                                Wonder Child
                                <!-- <br>
                                <span style="font-size: x-small;">
                                For Child
                                </span> -->
                            </span>
                            <span lang="vi" style="display: inherit">
                                Wonder Child
                                <!-- <br>
                                <span style="font-size: x-small;">
                                Tiếng Anh Thiếu nhi
                                </span> -->
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-danger" href="#teens" class="smoothScroll">
                            <span lang="en" style="display: none">
                                Rocket Teens
                                <!-- <br>
                                <span style="font-size: x-small;">
                                For Teenagers
                                </span> -->
                            </span>
                            <span lang="vi" style="display: inherit">
                                Rocket Teens
                                <!-- <br>
                                <span style="font-size: x-small;">
                                Tiếng Anh Thiếu niên
                                </span> -->
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container head-link" id="tuition" name="tuition" style="padding-bottom: 50px;">
                <div>
                    <h1 lang="en" style="display: none">
                        Tuition
                    </h1>
                    <h1 lang="vi" style="display: inherit">
                        Học phí
                    </h1>
                </div>
                <div lang="en" style="display: none">
                    Please contact us for more details on courses and corresponding tuition.
                </div>
                <div lang="vi" style="display: inherit">
                    Vui lòng liên hệ với chúng tôi để được tư vấn thêm về khóa học và học phí tương ứng.
                </div>
                <div lang="en" class="table-responsive">
                    <table class="table table-condensed table-striped table-hover centered">
                        <!-- table-bordered -->
                        <thead>
                            <tr>
                                <th>
                                    Course
                                </th>
                                <th>
                                    Entrance Fee
                                </th>
                                <th colspan="2">
                                    Tuition
                                    <br>
                                    with 50% Foreign teacher
                                </th>
                                <th colspan="2">
                                    Tuition
                                    <br>
                                    with 100% Foreign teacher
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="success">
                                <td rowspan="2" class="table-first-col">
                                    Kinder Star
                                </td>
                                <td rowspan="2">
                                    VND 300,000
                                </td>
                                <td rowspan="2">
                                    VND 4,200,000
                                </td>
                                <td>
                                    15 weeks
                                </td>
                                <td rowspan="2">
                                    VND 6,300,000
                                </td>
                                <td>
                                    15 weeks
                                </td>
                            </tr>
                            <tr class="success">
                                <td>
                                    2 lessons/week
                                </td>
                                <td>
                                    2 lessons/week
                                </td>
                            </tr>
                            <tr class="warning">
                                <td rowspan="2" class="table-first-col">
                                    Wonder Child
                                </td>
                                <td rowspan="2">
                                    VND 300,000
                                </td>
                                <td rowspan="2">
                                    VND 4,200,000
                                </td>
                                <td>
                                    15 weeks
                                </td>
                                <td rowspan="2">
                                    VND 6,300,000
                                </td>
                                <td>
                                    15 weeks
                                </td>
                            </tr>
                            <tr class="warning">
                                <td>
                                    2 lessons/week
                                </td>
                                <td>
                                    2 lessons/week
                                </td>
                            </tr>
                            <tr class="danger">
                                <td rowspan="2" class="table-first-col">
                                    Rocket Teens
                                </td>
                                <td rowspan="2">
                                    VND 300,000
                                </td>
                                <td rowspan="2">
                                    VND 4,500,000
                                </td>
                                <td>
                                    15 weeks
                                </td>
                                <td rowspan="2">
                                    VND 6,900,000
                                </td>
                                <td>
                                    15 weeks
                                </td>
                            </tr>
                            <tr class="danger">
                                <td>
                                    2 lessons/week
                                </td>
                                <td>
                                    2 lessons/week
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div lang="vi" class="table-responsive">
                    <table class="table table-condensed table-striped table-hover centered">
                        <!-- table-bordered -->
                        <thead>
                            <tr>
                                <th>
                                    Khoá học
                                </th>
                                <th>
                                    Phí nhập học
                                </th>
                                <th colspan="2">
                                    Học phí
                                    <br>
                                    khoá học 50% GVNN
                                </th>
                                <th colspan="2">
                                    Học phí
                                    <br>
                                    khoá học 100% GVNN
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="success">
                                <td rowspan="2" class="table-first-col">
                                    Kinder Star
                                </td>
                                <td rowspan="2">
                                    300.000 đồng
                                </td>
                                <td rowspan="2">
                                    4.200.000 đồng
                                </td>
                                <td>
                                    15 tuần
                                </td>
                                <td rowspan="2">
                                    6.300.000 đồng
                                </td>
                                <td>
                                    15 tuần
                                </td>
                            </tr>
                            <tr class="success">
                                <td>
                                    2 buổi/tuần
                                </td>
                                <td>
                                    2 buổi/tuần
                                </td>
                            </tr>
                            <tr class="warning">
                                <td rowspan="2" class="table-first-col">
                                    Wonder Child
                                </td>
                                <td rowspan="2">
                                    300.000 đồng
                                </td>
                                <td rowspan="2">
                                    4.200.000 đồng
                                </td>
                                <td>
                                    15 tuần
                                </td>
                                <td rowspan="2">
                                    6.300.000 đồng
                                </td>
                                <td>
                                    15 tuần
                                </td>
                            </tr>
                            <tr class="warning">
                                <td>
                                    2 buổi/tuần
                                </td>
                                <td>
                                    2 buổi/tuần
                                </td>
                            </tr>
                            <tr class="danger">
                                <td rowspan="2" class="table-first-col">
                                    Rocket Teen
                                </td>
                                <td rowspan="2">
                                    300.000 đồng
                                </td>
                                <td rowspan="2">
                                    4.500.000 đồng
                                </td>
                                <td>
                                    15 tuần
                                </td>
                                <td rowspan="2">
                                    6.900.000 đồng
                                </td>
                                <td>
                                    15 tuần
                                </td>
                            </tr>
                            <tr class="danger">
                                <td>
                                    2 buổi/tuần
                                </td>
                                <td>
                                    2 buổi/tuần
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row centered">
                    <div class="col-sm-4">
                        <a class="btn btn-success" href="#kinder" class="smoothScroll">
                            <span lang="en" style="display: none">
                                Kinder Star
                                <!-- <br>
                                <span style="font-size: x-small;">
                                For Kindergarten
                                </span> -->
                            </span>
                            <span lang="vi" style="display: inherit">
                                Kinder Star
                                <!-- <br>
                                <span style="font-size: x-small;">
                                Tiếng Anh Mầm non
                                </span> -->
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-warning" href="#children" class="smoothScroll">
                            <span lang="en" style="display: none">
                                Wonder Child
                                <!-- <br>
                                <span style="font-size: x-small;">
                                For Child
                                </span> -->
                            </span>
                            <span lang="vi" style="display: inherit">
                                Wonder Child
                                <!-- <br>
                                <span style="font-size: x-small;">
                                Tiếng Anh Thiếu nhi
                                </span> -->
                            </span>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-danger" href="#teens" class="smoothScroll">
                            <span lang="en" style="display: none">
                                Rocket Teens
                                <!-- <br>
                                <span style="font-size: x-small;">
                                For Teenagers
                                </span> -->
                            </span>
                            <span lang="vi" style="display: inherit">
                                Rocket Teens
                                <!-- <br>
                                <span style="font-size: x-small;">
                                Tiếng Anh Thiếu niên
                                </span> -->
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-2">
                        <span lang="en" style="display: inherit; font-weight: bold">
                            Note:
                        </span>
                        <span lang="vi" style="display: none; font-weight: bold">
                            Lưu ý:
                        </span>
                    </div>
                    <div class="col-sm-10">
                        <span lang="en" style="display: inherit; font-size: small; text-align: justify;">
                            <ul>
                                <li>
                                    Tuitition for Home tutoring is quoted depending on varied requirements.
                                </li>
                                <li>
                                    Besides tuition, location extra-charge is applicable in certain areas.
                                </li>
                            </ul>
                        </span>
                        <span lang="vi" style="display: none; font-size: small; text-align: justify;">
                            <ul>
                                <li>
                                    Chúng tôi cũng cung cấp các khóa học tại nhà được thiết kế riêng theo nhu cầu phụ huynh, với mức học phí theo từng trường hợp.
                                </li>
                                <li>
                                    Ngoài học phí chính thức, chúng tôi có thể thu thêm phụ phí địa điểm đối với một số trường hợp nhất định.
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <span lang="en" style="display: inherit; font-weight: bold">
                            Policy:
                        </span>
                        <span lang="vi" style="display: none; font-weight: bold">
                            Chính sách phí:
                        </span>
                    </div>
                    <div class="col-sm-10">
                        <span lang="en" style="display: inherit; font-size: small; text-align: justify;">
                            <ul>
                                <li>
                                    Entrance Fee and Tuition are pre-paid and non-refundable.
                                </li>
                                <li>
                                    Tuition Reserve is not applicalbe.
                                </li>
                                <li>
                                    Fee transfer to another learner is allowed. In such case, placement tests are applied to map new learners to corresponding English levels and courses.
                                </li>
                                <li>
                                    Tuition addition might be applicable in certain cases due to different courses and learning time.
                                </li>
                            </ul>
                        </span>
                        <span lang="vi" style="display: none; font-size: small; text-align: justify;">
                            <ul>
                                <li>
                                    Phí nhập học và học phí được đóng đầy đủ trước khi đăng ký nhập học và sẽ không được hoàn lại.
                                </li>
                                <li>
                                    Không áp dụng Bảo lưu khóa học.
                                </li>
                                <li>
                                    Trường hợp học viên có nhu cầu chuyển phí sang một học viên khác, chúng tôi sẽ tiến hành tư vấn kiểm tra trình độ đầu vào đối với học viên nhận chuyển phí để xếp lớp phù hợp.
                                </li>
                                <li>
                                    Trong một số trường hợp, học viên nhận chuyển phí sẽ được yêu cầu bổ sung học phí tương ứng với khóa học tương ứng.
                                </li>
                            </ul>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end programmes section -->
        <div id="footerwrap">
            <div class="container">
                <h5>Copyright (c) by hiTutor</h5>
                <!-- Created by - <a href="http://minhdinh.net">Minh Dinh</a> -  -->
            </div>
        </div>
        ==== MODAL FORM ====
        <div id="register-modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 class="modal-title" id="id_register_title">
                            <span lang="en" style="display: none">
                                Register
                            </span>
                            <span lang="vi" style="display: inherit">
                                Đăng ký
                            </span>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span lang="en" style="display: none">
                                    Student Name
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Tên học viên
                                </span>
                            </span>
                            <input type="name" class="form-control" id="id_register_input_student_name" placeholder="Thomas Dinh" aria-describedby="id_register_form_student_name">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span lang="en" style="display: none">
                                    Student Age
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Tuổi học viên
                                </span>
                            </span>
                            <input type="number" class="form-control" id="id_register_input_student_age" placeholder="6" aria-describedby="id_register_form_student_age">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span lang="en" style="display: none">
                                    Parent Name
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Tên cha/mẹ
                                </span>
                            </span>
                            <input type="name" class="form-control" id="id_register_input_name" placeholder="Minh Dinh" aria-describedby="id_register_form_name">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span lang="en" style="display: none">
                                    Mobile
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Điện thoại
                                </span>
                            </span>
                            <input type="tel" class="form-control" id="id_register_input_mobile" placeholder="0987654321" aria-describedby="id_register_form_mobile">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span lang="en" style="display: none">
                                    Email
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Email
                                </span>
                            </span>
                            <input type="email" class="form-control" id="id_register_input_email" placeholder="Minhdinh@gmat.com" aria-describedby="id_register_form_email">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span lang="en" style="display: none">
                                    Address
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Địa chỉ
                                </span>
                            </span>
                            <input type="address" class="form-control" id="id_register_input_address" placeholder="14 Ngoc Ha" aria-describedby="id_register_form_address">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="id_register_input_e_years" style="font-weight: normal; font-size: 14px; line-height: 14px;">
                                <span lang="en" style="display: none">
                                    How long has the student been learning English?
                                </span>
                                <span lang="vi" style="display: inherit">
                                    Học viên đã học tiếng Anh trong bao lâu?
                                </span>
                            </label>
                            <div>
                                <input type="number" class="form-control" id="id_register_input_e_years">
                            </div>
                        </div>
                        <div id="recaptcha_Register">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="submitBtn" type="button" class="btn btn-default" data-dismiss="modal" disabled>
                            <span lang="en" style="display: none">
                                Register
                            </span>
                            <span lang="vi" style="display: inherit">
                                Đăng ký
                            </span>
                        </button>
                        <button type="button" class="btn btn-default" id="id_btn_register_submit" data-dismiss="modal">
                            <span lang="en" style="display: none">
                                Close
                            </span>
                            <span lang="vi" style="display: inherit">
                                Đóng
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/retina.js"></script>
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
        <script type="text/javascript" src="assets/js/jquery-func.js"></script>
        <script type="text/javascript" src="assets/js/js.cookie.js"></script>
        <script type="text/javascript" src="assets/js/jquery.textillate.js"></script>
        <script type="text/javascript" src="assets/js/jquery.lettering.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <!-- <script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script> -->

        <script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
        <script type="text/javascript" src="assets/js/langswitch.js"></script>
        <script type="text/javascript" src="assets/js/pageswitch.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>

        <!-- <script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script> -->

    </body>

</html>
