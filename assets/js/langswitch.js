/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var curlang = "vi";
function setLang(newlang) {
    $('#id_lang_img').attr('src', newlang == "en" ? "assets/img/flags/vn.svg" : "assets/img/flags/gb.svg");
    // $('#id_header_img').attr('src', newlang=="en" ? "assets/img/welcomelogo.png" : "assets/img/welcomelogo_vi.png");
    $('#id_logo_img').attr('src', newlang == "en" ? "assets/img/logo.png" : "assets/img/logo_vi.png");
    $('div[lang="vi"]').css('display', newlang == "en" ? 'none' : 'inherit');
    $('span[lang="vi"]').css('display', newlang == "en" ? 'none' : 'inherit');
    $('h1[lang="vi"]').css('display', newlang == "en" ? 'none' : 'inherit');
    $('h4[lang="vi"]').css('display', newlang == "en" ? 'none' : 'inherit');
    $('hh[lang="vi"]').css('display', newlang == "en" ? 'none' : 'table-cell');
    $('a[lang="vi"]').css('display', newlang == "en" ? 'none' : 'inherit');

    $('div[lang="en"]').css('display', newlang == "en" ? 'inherit' : 'none');
    $('span[lang="en"]').css('display', newlang == "en" ? 'inherit' : 'none');
    $('h1[lang="en"]').css('display', newlang == "en" ? 'inherit' : 'none');
    $('h4[lang="en"]').css('display', newlang == "en" ? 'inherit' : 'none');
    $('hh[lang="en"]').css('display', newlang == "en" ? 'table-cell' : 'none');
    $('a[lang="en"]').css('display', newlang == "en" ? 'inherit' : 'none');
    curlang = newlang;
    Cookies.set('curlang', curlang);
    $('.tlt').textillate('in');
};

$("#id_btn_lang").on("click", function () {
    if (curlang == 'vi')
        setLang('en');
    else {
        setLang('vi');
    }
});

