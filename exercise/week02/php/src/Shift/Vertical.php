<?php

namespace Shift;

class Vertical
{
    public static function valeurEtage (int $chiffre1, int $chiffre2, string $sensParenthese, string $signalStream) {
        for ($indice = 0; $indice < strlen($signalStream); $indice++) {
            $valeurFinale[] = [$signalStream[$indice], ($signalStream[$indice] === $sensParenthese) ? $chiffre1 : $chiffre2];
        }
        return $valeurFinale;
    }
    public static function whichFloor(string $signalStream): int
    {

        $valeurFinale = [];
        if (str_contains($signalStream,'🧝')) {
            // remplace l'emoji par un caractère vide
            $signalStream=str_replace('🧝','',$signalStream);
            // parcourt le fichier et enregistre les valeurs des étages dans $val
            $valeurFinale=self::valeurEtage(3,-2,')',$signalStream);
        } else {
            // si pas d'emoji, parcourt le fichier et enregistre les valeurs des étages dans $val
            $valeurFinale=self::valeurEtage(1,-1,'(',$signalStream);
        }
        // retourne la somme des valeurs des étages mdr
        return array_sum(array_column($valeurFinale, 1));
    }
}