/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var recaptchaClient;
var recaptchaTeacher;
var recaptchaRegister;
var myCallBack = function () {
    recaptchaClient = grecaptcha.render('recaptcha_Client', {
        'sitekey': '6LeMqwkUAAAAAJChMFDQ8ai01v5xoSCxnZBHLQkL', //Replace this with your Site key
        'data-callback': 'validate_client_form',
        'theme': 'light'
    });
    recaptchaTeacher = grecaptcha.render('recaptcha_Teacher', {
        'sitekey': '6LeMqwkUAAAAAJChMFDQ8ai01v5xoSCxnZBHLQkL', //Replace this with your Site key
        'data-callback': 'validate_teacher_form',
        'theme': 'light'
    });
    recaptchaRegister = grecaptcha.render('recaptcha_Register', {
        'sitekey': '6LeMqwkUAAAAAJChMFDQ8ai01v5xoSCxnZBHLQkL', //Replace this with your Site key
        'data-callback': 'validate_reg_form',
        'theme': 'dark'
    });
};
function validate_reg_form() {
    var captcha_response = grecaptcha.getResponse();
    if (captcha_response.length == 0) {
        // Captcha is not Passed
        return false;
    } else {
        $('#submitBtn').removeAttr('disabled');
        // Captcha is Passed
        return true;
    }
}
;
function validate_teacher_form() {
    var captcha_response = grecaptcha.getResponse();
    if (captcha_response.length == 0) {
        // Captcha is not Passed
        return false;
    } else {
        $('#teacherRegBtn').removeAttr('disabled');
        // Captcha is Passed
        return true;
    }
}
;
function validate_client_form() {
    console.log('validate_client_form');
    var captcha_response = grecaptcha.getResponse();
    if (captcha_response.length == 0) {
        console.log(captcha_response);
        // Captcha is not Passed
        return false;
    } else {
        $('#clientSubmitBtn').removeAttr('disabled');
        console.log('captcha ok');
        // Captcha is Passed
        return true;
    }
}
;

