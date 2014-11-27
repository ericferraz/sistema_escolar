<?php

/**
 * recebe a data do banco de dados e formata para o formato
 * amigaval para o usuário
 * @param type $data
 * @param type $delimitador
 */
function parseDateBancoToUser($data,$delimitador='-'){
   $d = explode($delimitador, $data);
   return ($d[2].'/'.$d[1].'/'.$d[0]);
}

