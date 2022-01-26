<?php

namespace App\Traits;

use Carbon\Carbon;

trait Utils
{
    /**
     * Função para limpar scripts
     *
     * @param $variavel
     * @return string|string[]|null
     */
    public function limpa_tags($variavel)
    {
        return preg_replace('(<(/?[^\>]+)>)', '', $variavel);
    }

    /**
     * @param $value
     * @return string
     */
    public static function formatar_valor($value)
    {
        $value = (is_numeric($value)) ? $value : 0;
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    /**
     * @param $value
     * @param string $formato
     * @return string
     */
    public static function formata_data($value, $formato = 'd/m/Y')
    {
        if ($value) {
            return Carbon::parse($value)->format($formato);
        } else {
            return '';
        }
    }
}
