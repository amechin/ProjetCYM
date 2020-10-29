<?php


namespace App\Service;


class EditString
{
    public static function NbCaracteresChaine(string $str): string
    {
        if (strlen($str) > 3) {
            $message = 'cette chaine contient plus de 3 caractères';
        } else {
            $message = 'cette chaine contient moins de 3 caractères';
        }
        return $message;
    }

    public static function ChaineSansEspaces(string $str):string
    {
        return str_replace(' ', '', $str);
    }
}