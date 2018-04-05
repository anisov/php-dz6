<?php
//Возьмите любую картинку. Поверните с помощью PHP ее на 45 градусов.
//Нанесите ватермарк на изображение. Измените размер до ширины 200 с
//сохранением пропорций изображения
require 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;
$image = Image::make('foto.jpg');
$image->rotate(45);
$image->text('WaterMark', $image->width()/2, $image->height()/2, function ($font){
    $font->file('arial.ttf');
    $font->size(84);
    $font->color('FF8000');
    $font->align('center');
    $font->valign('center');
})->save('new.jpg');

