/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function showpage(page) {
    $('#body_mainpage').css('display', (page == 'main') ? 'inline' : 'none');
    $('#body_teacherpage').css('display', (page == 'teacher') ? 'inline' : 'none');
    $('#body_programpage').css('display', (page == 'program') ? 'inline' : 'none');
};
$('.nav a').on("click", function () {
    // alert(this.id);
    if (this.id == "id_menu_teacher_btn") {
        showpage('teacher');
    } else if (this.id.indexOf('id_menu_program_') >= 0) {
        showpage('program');
    } else {
        showpage('main');
    }
});
$('a').on("click", function () {
    if (this.id.indexOf('id_head_btn_') >= 0) {
        showpage('program');
    }
});
$('.main-logo').on('click', function () {
    showpage('main');
});
$('a.btn-demo').on('click', function () {
    showpage('main');
});

