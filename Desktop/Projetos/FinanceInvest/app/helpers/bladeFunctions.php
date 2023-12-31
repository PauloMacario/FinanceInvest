<?php

setlocale(LC_MONETARY,"pt_BR", "ptb");

use Carbon\Carbon;

/* if (! function_exists('XXXX')) {
    function XXXX()
    {
        return xxx;
    }
}  */

if (! function_exists('date_br')) {
    function date_br($date, $format = "d/m/Y")
    {
        $dateInput = Carbon::parse($date);
        $dateOutput = $dateInput->format($format);
        
        return $dateOutput;
    }
}

if (! function_exists('money_br')) {
    function money_br($value)
    {
        return number_format($value, 2, ',', '.');
    }
}

if (! function_exists('text_status')) {
    function text_status($status)
    {
        switch ($status) {
            case 'NP':
                return "<span class=\"text-danger\">Pendente</span>";
                break;
            case 'PO':
                return "<span class=\"text-success\">Pago</span>";
                break;
            case 'CN':
                return "<span class=\"text-secondary\">Cancelada</span>";
                break;            
            default:
                return $status;
                break;
        }
    }
}