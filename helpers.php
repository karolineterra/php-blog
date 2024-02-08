<?php
/**
 * Esta função valida uma url
 * @param string $url recebe a url a ser verificada
 * @return bool
 */
function validarUrl(string $url): bool 
{
    return filter_var($url, FILTER_VALIDATE_URL);
}

/**
 * Esta função valida um e-mail
 * @param string $url recebe e-mail a ser verificado
 * @return bool
 */
function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
/**
 * Função que retorna há quanto tempo alguma atividade foi feita/criada com relação ao tempo atual
 * 
 * @param string $data recebe a data em que o item foi criado
 * @return string
 */
function contarTempo(string $data)
{
    $agora = strtotime(date('Y-m-d H:i:s'));
    $tempo = strtotime($data);
    $diferenca = $agora - $tempo;

    $segundos = $diferenca;
    $minutos = round($diferenca / 60);
    $horas = round($diferenca / 3600);
    $dias = round($diferenca / 86400);
    $semanas = round($diferenca / 604800);
    $meses = round($diferenca / 2419200);
    $anos = round($diferenca / 29030400);

    if ($segundos <= 60) {
        return 'agora';
    } elseif ($minutos <= 60) {
        return $minutos == 1 ? 'há 1 minuto' : 'há ' . $minutos . ' minutos';
    } elseif ($horas <= 24) {
        return $horas == 1 ? 'há 1 hora' : 'há ' . $horas . ' horas';
    } elseif ($dias <= 7) {
        return $dias == 1 ? 'ontem' : 'há ' . $dias . ' dias';
    } elseif ($semanas <= 4) {
        return $semanas == 1 ? 'há 1 semana' : 'há ' . $semanas . ' semanas';
    } elseif ($meses <= 12) {
        return $meses == 1 ? 'há 1 mês' : 'há ' . $meses . ' meses';
    } else {
        return $anos == 1 ? 'há 1 ano' : 'há ' . $anos . ' anos';
    }
}

/**
 * Formata um valor com ponto e vírgulas
 * 
 * @param string $valor Opcional. Recebe o valor que será formatado.
 * @return string
 */
function formatarValor(float $valor = null): string
{
    return number_format(($valor ? $valor : 10), 2, ',', '.');
}

/**
 * Formata um número com pontos
 * 
 * @param string $numero Opcional. Recebe o número que será formatado.
 * @return string
 */
function formatarNumero(string $numero = null): string
{
    return number_format($numero ?: 0, 0, '.', '.');
}
/**
 * Saudação de acordo com o horário
 * @return string saudacao
 */
function saudacao(): string
{
    $hora = date('H:i:s');

    if ($hora >= 0 and $hora <= 5) {
        $saudacao = "<h1>boa madrugada</h1>";
    } elseif ($hora >= 6 and $hora <= 12) {
        $saudacao = "<h1>Bom dia</h1>";
    } elseif ($hora >= 13 && $hora <= 18) {
        $saudacao = "<h1>Boa tarde</h1>";
    } else {
        $saudacao = "<h1>Boa noite</h1>";
    }

    return $saudacao;
}

/**
 * Resume um texto
 * 
 * @param string $texto texto para resumir
 * @param int $limite quantidade de caracteres
 * @param string $continue opcional - o que deve ser exibido ao final do resumo
 * @return string texto resumido
 */
function resumirTexto(string $texto, int $limite, string $continue = '...'): string
{
    $textoLimpo = trim(strip_tags($texto));
    if (mb_strlen($textoLimpo) <= $limite) {
        return $textoLimpo;
    }

    $resumirTexto = mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ''));
    return $resumirTexto . $continue;
}
