<?php
if (isset($_POST['submit']) && !empty($_POST['submit'])):
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        $secret = '6LeMqwkUAAAAAGQEkRITNtt_fmxNf3uWXB-0NTpw';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if ($responseData->success):
            $name = !empty($_POST['name']) ? $_POST['name'] : '';
            $email = !empty($_POST['email']) ? $_POST['email'] : '';
            $message = !empty($_POST['message']) ? $_POST['message'] : '';

            $to = 'anhminh.dinh@gmail.com';
            $subject = 'New contact form have been submitted';
            $htmlContent = "
                <h1>Contact request details</h1>
                <p><b>Name: </b>" . $name . "</p>
                <p><b>Email: </b>" . $email . "</p>
                <p><b>Message: </b>" . $message . "</p>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From:' . $name . ' <' . $email . '>' . "\r\n";
            @mail($to, $subject, $htmlContent, $headers);

            $succMsg = 'Your contact request have submitted successfully.';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
endif;
?>
