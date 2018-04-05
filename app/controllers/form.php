<?php
use ReCaptcha\ReCaptcha;

function orderAddSendEmail($DBH)
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $street = $_POST['street'];
    $home = $_POST['home'];
    $housing = $_POST['part'];
    $apartment = $_POST['appt'];
    $floor = $_POST['floor'];
    $comment = $_POST['comment'];
    $money = $_POST['payment'];
    $callback = $_POST['callback'];

    if (!$callback) {
        $callback = 0;
    }

    function submit()
    {
        $remoteIp = $_SERVER['REMOTE_ADDR'];
        $gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
        $recaptcha = new ReCaptcha("6Ler6VAUAAAAAPVL_sSvLuQqIILtgmASO8U2lzU_");
        $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
        if ($resp->isSuccess()) {
            return True;
        } else {
            echo json_encode("Поражен вашей неудачей, сударь");
            die();
        }
    }

    if (submit()) {
        if (ctype_digit($home) and ctype_digit($housing) and ctype_digit($apartment) and ctype_digit($floor)) {
            $emailArray = getAllUser($DBH);
            $userId = addOrGetUser($DBH, $email, $emailArray, $name, $phone);
            $countOrder = numberOrder($DBH, $userId);
            $mail = sendPhpMail($countOrder, $name, $phone, $email, $street, $home, $housing, $apartment, $floor,
                $comment, $money, $callback);
            $data = [];
            if ($mail) {
                $data['status'] = "OK";
                $data['mes'] = "Ваш заказ принят! Ваша вкусная еда скоро будет у вас!";
                newOrder($DBH, $street, $home, $housing, $apartment, $floor, $comment,
                    $money, $callback, $userId);
            } else {
                $data['status'] = "No";
                $data['mes'] = 'На сервере произошла ошибка, попробуйте сделать заказ через некоторое время! Приносим свои извинения!';
            }
            echo json_encode($data);
        } else {
            $data['status'] = "No";
            $data['mes'] = 'Телефон, дом, корпус, квартира, этаж должны быть цифрами!';
            echo json_encode($data);
        }
    }

}
$DBH = getConnect();
orderAddSendEmail($DBH);

