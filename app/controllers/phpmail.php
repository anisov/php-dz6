<?php
function sendPhpMail($countOrder, $name, $phone, $email, $street, $home, $housing, $apartment, $floor,
                     $comment, $money, $callback)
{
    if ($money) {
        $money = 'Потребуется сдача';
    } else {
        $money = 'Оплата по карте';
    }
    if ($callback) {
        $callback = 'ДА';
    } else {
        $callback = 'НЕТ';
    }
    if ($countOrder == 1) {
        $numberOrder = 'Спасибо - это ваш первый заказ';
    } else {
        $numberOrder = "Спасибо! Это уже $countOrder заказ";
    }


    $mail_message = '
        <html>
            <head>
                <title>Заявка</title>
            </head>
            <body>
                <h2>Заказ</h2>
                <h3>DarkBeefBurger за 500 рублей, 1 шт</h3>
                <ul>
                    <li>Имя: ' . $name . '</li>
                    <li>Телефон: ' . $phone . '</li>
                    <li>Телефон: ' . $email . '</li>
                    <li>Улица: ' . $street . '</li>
                    <li>Дом: ' . $home . '</li>
                    <li>Корпус: ' . $housing . '</li>
                    <li>Квартира: ' . $apartment . '</li>
                    <li>Этаж: ' . $floor . '</li>
                    <li>Комментарий: ' . $comment . '</li>
                    <li>Оплата: ' . $money . '</li>
                    <li>Перезвонить: ' . $callback . '</li>                   
                </ul>
                <b> ' . $numberOrder . '</b>
            </body>
        </html>    
        ';

    $mail = new \PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.yandex.ru";
    $mail->Username = "fsdfsdffe@yandex.ru";
    $mail->Password = 'qwerty1234';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('fsdfsdffe@yandex.ru', 'E-mail с сайта');
    $mail->addAddress('fsdfsdffe@yandex.ru', 'Получатель');
    $mail->addAttachment('composer.json');
    $mail->addReplyTo('fsdfsdffe@yandex.ru', 'Robot');
    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Письмо с сайта ' . date('d.m.Y H:i:s', time());
    $mail->Body = $mail_message;
    return $mail->send();
}
