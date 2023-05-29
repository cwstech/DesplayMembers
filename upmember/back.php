<?php
session_start();
include '../db.php';
require ('../add/mail/maildb/PHPMailer.php');
require ('../add/mail/maildb/SMTP.php');
require ('../add/mail/maildb/Exception.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// echo $_SESSION['uname'];
if (isset($_SESSION["uname"]) == null) {
    header("Location: /");
} else {
    if (time() - $_SESSION["ti"] > 600) {
        session_destroy();
        header("Location: index.php");
    } else {
        if ($_SESSION["role"] == "admin9412") {
            $code = $_POST['code'];
            $name = $_POST['Rname'];
            $deg = $_POST['deg'];
            $mo = $_POST['mo'];
            $gmail = $_POST['gmail'];
            $date = $_POST['date'];
            $add = $_POST['add'];
            $gb = $_POST['gb'];
            $stat = $_POST['stat'];
echo $_POST['file3']."<br>";
echo $_POST['file4'];
            $str=rand();
            $result = sha1($str);
            $str1=rand();
$result1 = sha1($str1);



            if (isset($_FILES["file"])) {
                $error = [];
                $file_name = $_FILES["file"]["name"];
                $file_type = $_FILES["file"]["type"];
                $file_tmp = $_FILES["file"]["tmp_name"];
                $ext = explode('.', $_FILES["file"]["name"]);
                $file_ext = end($ext);

                $exction = array("jpg", "png", "jpeg");

                if (in_array($file_ext, $exction) === false) {
                    $error[] = "Exction is Not matched";
$data = $_POST['file3'];
                    echo "this";
                }else{


                if (empty($error)) {
                    move_uploaded_file($file_tmp, $data = "../add/Image/".$result. "" . $_FILES["file"]["name"]);
                    echo ($data);
                    echo "Success";
                } else {
                    print_r($error);
                }
            }
            }else{
                
                echo "this part<br>";
            }
            
            if (isset($_FILES["file1"])) {
                $error = [];
                $file_name = $_FILES["file1"]["name"];
                $file_type = $_FILES["file1"]["type"];
                $file_tmp = $_FILES["file1"]["tmp_name"];
                $ext = explode('.', $_FILES["file1"]["name"]);
                $file_ext = end($ext);
                
                $exction = array("jpg", "png", "jpeg");
                
                if (in_array($file_ext, $exction) === false) {
                    $error[] = "Exction is Not matched";
                    $data1 = $_POST['file4'];
                }else{
                
                
                if (empty($error)) {
                    move_uploaded_file($file_tmp, $data1 = "../add/AImage/". $result1 . $_FILES["file1"]["name"]);
                    echo ($data1);
                    echo "Success";
                } else {
                    print_r($error);
                }
            }
        }
        $id = $_GET['id'];

            $obj = new DB();
            $res = $obj->updet($code, $name, $deg, $mo, $gmail, $date, $add, $data, $gb, $stat, $_SESSION["uname"], $id);

            if ($res) { ?>
                <!-- mail---------------------------------- -->
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    $rs = $obj-> updes($deg);
    $ok = mysqli_fetch_row($rs);
    date_default_timezone_set('Asia/Calcutta');      
    $date=date("Y/m/d");
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Host       = 'smtpout.secureserver.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication                     //SMTP username
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = 'xxxxxxxxx';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('no-reply@rct-rakshakgroupsurat.in', 'no-reply');
    $mail->addAddress($gmail);     //Add a recipient

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'UPDATED';
    // $mail->Body    = 'This is the HTML message body <h1><a href="http://techcws.me/">in bold!</a></h1>';
    $mail->Body    = '<!DOCTYPE html>

    <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
    <!--[if !mso]><!-->
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet" type="text/css"/>
    <!--<![endif]-->
    <style>
            * {
                box-sizing: border-box;
            }
    
            body {
                margin: 0;
                padding: 0;
            }
    
            a[x-apple-data-detectors] {
                color: inherit !important;
                text-decoration: inherit !important;
            }
    
            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
            }
    
            p {
                line-height: inherit
            }
    
            .desktop_hide,
            .desktop_hide table {
                mso-hide: all;
                display: none;
                max-height: 0px;
                overflow: hidden;
            }
    
            @media (max-width:700px) {
    
                .desktop_hide table.icons-inner,
                .social_block.desktop_hide .social-table {
                    display: inline-block !important;
                }
    
                .icons-inner {
                    text-align: center;
                }
    
                .icons-inner td {
                    margin: 0 auto;
                }
    
                .fullMobileWidth,
                .row-content {
                    width: 100% !important;
                }
    
                .mobile_hide {
                    display: none;
                }
    
                .stack .column {
                    width: 100%;
                    display: block;
                }
    
                .mobile_hide {
                    min-height: 0;
                    max-height: 0;
                    max-width: 0;
                    overflow: hidden;
                    font-size: 0px;
                }
    
                .desktop_hide,
                .desktop_hide table {
                    display: table !important;
                    max-height: none !important;
                }
            }
        </style>
    </head>
    <body style="background-color: #f9f9f9; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
    <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f9f9f9;" width="100%">
    <tbody>
    <tr>
    <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
    <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #5d77a9; color: #000000; width: 680px;" width="680">
    <tbody>
    <tr>
    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tr>
    <td class="pad" style="padding-bottom:10px;padding-top:10px;width:100%;padding-right:0px;padding-left:0px;">
    <div align="center" class="alignment" style="line-height:10px"><img alt="Yourlogo Light" src="https://rct-rakshakgroupsurat.in/wp-content/uploads/2023/02/WhatsApp-Image-2023-02-14-at-3.37.49-PM.jpeg" style="display: block; height: 50px; border: 0; width: 40px; max-width: 100%;" title="RCT" width="268"/></div><center><h3 style="color: white" >RCT</h3></center>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
    <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #cbdbef; color: #000000; width: 680px;" width="680">
    <tbody>
    <tr>
    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 20px; padding-bottom: 20px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tr>
    <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;">
    <div align="center" class="alignment" style="line-height:10px"><img alt="Check Icon" src="https://rct-rakshakgroupsurat.in/wp-content/uploads/2023/02/check-icon.png" style="display: block; height: auto; border: 0; width: 93px; max-width: 100%;" title="Check Icon" width="93"/></div>
    </td>
    </tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" class="text_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
    <tr>
    <td class="pad" style="padding-bottom:25px;padding-left:20px;padding-right:20px;padding-top:80px;">
    <div style="font-family: Georgia, serif">
    <div class="" style="font-size: 14px; font-family: Georgia, Times, Times New Roman, serif; mso-line-height-alt: 16.8px; color: #2f2f2f; line-height: 1.2;">
    <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;"><span style="font-size:42px;">Infomations Update Sucessfully Complete!</span></p>
    </div>
    </div>
    </td>
    </tr>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" class="text_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
    <tr>
    <td class="pad" style="padding-bottom:80px;padding-left:30px;padding-right:30px;padding-top:10px;">
    <div style="font-family: sans-serif">
    <div class="" style="font-size: 14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 21px; color: #2f2f2f; line-height: 1.5;">
    <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 24px;"><span style="font-size:16px;">Hello <strong><u>'.$name.'</u></strong>,</span></p>
    <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;"> </p>




    
    <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 24px;"><span style="font-size:16px;">Your Infomation Has been Updated to RCT(Rakshak Charitable Trust)<strong><span style=""></span></strong></span></p>
    <!-- <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 24px;"><span style="font-size:16px;">using <strong><span style="">Bank Account ****9876</span></strong></span></p> -->
    <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;"> </p>
    <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;"><span style="color:#000000;font-size:14px;"> </span></p>
    <!-- <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;"><span style="color:#000000;font-size:14px;">consectetur adipiscing elit lectus.</span></p> -->
    </div>
    </div>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
    <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;" width="680">
    <tbody>
    <tr>
    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="text_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
    <tr>
    <td class="pad" style="padding-bottom:20px;padding-left:20px;padding-right:20px;padding-top:50px;">
    <div style="font-family: sans-serif">
    <div class="" style="font-size: 14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 16.8px; color: #2f2f2f; line-height: 1.2;">
    <p style="margin: 0; text-align: center; mso-line-height-alt: 16.8px; letter-spacing: 1px;"><strong><span style="font-size:18px;">ACCOUNT DETAILS</span></strong></p>
    </div>
    </div>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
    <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;" width="680">
    <tbody>
    <tr>
    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="50%">
    <table border="0" cellpadding="0" cellspacing="0" class="text_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
    <tr>
    <td class="pad" style="padding-bottom:15px;padding-left:10px;padding-right:20px;padding-top:15px;">
    <div style="font-family: sans-serif">
    <div class="" style="font-size: 14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 28px; color: #393d47; line-height: 2;">
    <p style="margin: 0; font-size: 16px; text-align: right; mso-line-height-alt: 32px;"><strong><span style="font-size:16px;"><span style="color:#5d77a9;">Email</span></span></strong></p>
    <p style="margin: 0; font-size: 16px; text-align: right; mso-line-height-alt: 32px;"><strong><span style="font-size:16px;"><span style="color:#5d77a9;">Date</span></span></strong></p>
    <p style="margin: 0; font-size: 16px; text-align: right; mso-line-height-alt: 32px;"><strong><span style="font-size:16px;"><span style="color:#5d77a9;">Desegnation</span></span></strong></p>
    <p></p>
    <p style="margin: 0; font-size: 16px; text-align: right; mso-line-height-alt: 32px;"><strong><span style="font-size:16px;"><span style="color:#5d77a9;">Code</span></span></strong></p>
    </div>
    </div>
    </td>
    </tr>
    </table>
    </td>
    <td class="column column-2" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="50%">
    <table border="0" cellpadding="0" cellspacing="0" class="text_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
    <tr>
    <td class="pad" style="padding-bottom:10px;padding-left:20px;padding-right:10px;padding-top:10px;">
    <div style="font-family: sans-serif">
    <div class="" style="font-size: 14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 28px; color: #2f2f2f; line-height: 2;">
    <p style="margin: 0; font-size: 16px; text-align: left; mso-line-height-alt: 32px;"><span style="font-size:16px;">'.$gmail.'</span></p>
    <p style="margin: 0; font-size: 16px; text-align: left; mso-line-height-alt: 32px;"><span style="font-size:16px;">'.$date.'</span></p>
    <p style="margin: 0; font-size: 16px; text-align: left; mso-line-height-alt: 32px;">'.$ok[1].'</p><p></p>
    <p style="margin: 0; font-size: 16px; text-align: left; mso-line-height-alt: 32px;">'.$code.'</p>
    </div>
    </div>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
    <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; color: #000000; width: 680px;" width="680">
    <tbody>
    <tr>
    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 0px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="text_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
    <tr>
    <td class="pad" style="padding-bottom:40px;padding-left:30px;padding-right:30px;padding-top:40px;">
    <div style="font-family: sans-serif">
    <div class="" style="font-size: 14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 21px; color: #2f2f2f; line-height: 1.5;">
    <p style="margin: 0; font-size: 16px; text-align: center; mso-line-height-alt: 21px;"><span style="font-size:14px;"><span style="color:#000000;">*T&C Apply </span><span style="color:#000000;"></span></span></p>
    </div>
    </div>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-6" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
    <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fae890; color: #000000; width: 680px;" width="680">
    <tbody>
    <tr>
    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="50%">
    
    
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-7" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
    <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #5d77a9; color: #000000; width: 680px;" width="680">
    <tbody>
    <tr>
    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
    <table border="0" cellpadding="0" cellspacing="0" class="image_block block-2" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tr>
    <td class="pad" style="width:100%;padding-right:0px;padding-left:0px;padding-top:20px;">
    <div align="center" class="alignment" style="line-height:10px"><img alt="Yourlogo Light" src="https://rct-rakshakgroupsurat.in/wp-content/uploads/2023/02/WhatsApp-Image-2023-02-14-at-3.37.49-PM.jpeg" style="display: block; height: 70px; border: 0; width: 45px; max-width: 100%;" title="RCT" width="204"/></div>
    </td>
    </tr>
    </table>
    <table border="0" cellpadding="10" cellspacing="0" class="social_block block-3" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tr>
    <td class="pad">
    <div align="center" class="alignment">
    <table border="0" cellpadding="0" cellspacing="0" class="social-table" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block;" width="108px">
    <tr>
    <td style="padding:0 2px 0 2px;"><a href="https://www.facebook.com/Rakshakgroup/" target="_blank"><img alt="Facebook" height="32" src="https://rct-rakshakgroupsurat.in/wp-content/uploads/2023/02/facebook2x.png" style="display: block; height: auto; border: 0;" title="Facebook" width="32"/></a></td>
    <!--<td style="padding:0 2px 0 2px;"><a href="https://twitter.com/" target="_blank"><img alt="Twitter" height="32" src="images/twitter2x.png" style="display: block; height: auto; border: 0;" title="Twitter" width="32"/></a></td> -->
    <td style="padding:0 2px 0 2px;"><a href="https://instagram.com/rakshak_group_surat_official" target="_blank"><img alt="Instagram" height="32" src="https://rct-rakshakgroupsurat.in/wp-content/uploads/2023/02/instagram2x.png" style="display: block; height: auto; border: 0;" title="Instagram" width="32"/></a></td>
    </tr>
    </table>
    </div>
    </td>
    </tr>
    </table>
    <table border="0" cellpadding="10" cellspacing="0" class="text_block block-4" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
    <tr>
    <td class="pad">
    <div style="font-family: sans-serif">
    <div class="" style="font-size: 14px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 21px; color: #f9f9f9; line-height: 1.5;">
    <p style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 18px;"><span style="font-size:12px;">UG-12,Offera Business Hub,VIP road,Surat.</span></p>
    <p style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 18px;"><span style="font-size:12px;">info@rct-rakshakgroupsurat.in </span></p>
<!--    <p style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 18px;"><span style="font-size:12px;">+91 Soon...</span></p> -->
    </div>
    </div>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-8" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
    <tbody>
    <tr>
    <td>
    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #5d77a9; color: #000000; width: 680px;" width="680">
    <tbody>
    <tr>
    <td class="column column-1" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 0px; padding-bottom: 20px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;" width="100%">
    <table border="0" cellpadding="10" cellspacing="0" class="text_block block-1" role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
    <tr>
    <td class="pad">
    <div style="font-family: sans-serif">
    <div class="" style="font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; color: #cfceca; line-height: 1.2;">
    <p style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;"><span style="font-size:12px;">2021 © All Rights Reserved</span></p>
    </div>
    </div>
    </td>
    </tr>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!-- End -->
    </body>
    </html>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if (!$mail->send()) {
        echo "Erro:-<br>".$mail->ErrorInfo;
    }else{
        echo 'Message has been sent';
        $tim =  date("h:i:sa");
        $action = "Register $name Account";
        $log = $obj->log($_SESSION["uname"], $action, $date, $tim);
        $_SESSION['temp'] = "Opration Sucess!";
        header("Location: index.php");
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
            } else {
                echo ("Raju gare gayo");
            }
        }
    }
}
