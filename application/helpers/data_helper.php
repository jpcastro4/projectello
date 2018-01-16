<?php

function converter_data($data, $de = '/', $para = '-'){

    $separador = explode($de, $data);

    return $separador[2].$para.$separador[1].$para.$separador[0];
}

function formatar_tempo($timeBD) {

    $timeNow = time();
    $timeRes = $timeNow - $timeBD;
    $nar = 0;

    // variável de retorno
    $r = "";

    // Agora
    if ($timeRes == 0){
        $r = "agora";
    } else
    // Segundos
    if ($timeRes > 0 and $timeRes < 60){
        $r = $timeRes. " segundos atr&aacute;s";
    } else
    // Minutos
    if (($timeRes > 59) and ($timeRes < 3599)){
        $timeRes = $timeRes / 60;
        if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
            $r = round($timeRes,$nar). " minuto atr&aacute;s";
        } else {
            $r = round($timeRes,$nar). " minutos atr&aacute;s";
        }
    }
     else
    // Horas
    // Usar expressao regular para fazer hora e MEIA
    if ($timeRes > 3559 and $timeRes < 85399){
        $timeRes = $timeRes / 3600;

        if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
            $r = round($timeRes,$nar). " hora atr&aacute;s";
        }
        else {
            $r = round($timeRes,$nar). " horas atr&aacute;s";
        }
    } else
    // Dias
    // Usar expressao regular para fazer dia e MEIO
    if ($timeRes > 86400 and $timeRes < 2591999){

        $timeRes = $timeRes / 86400;
        if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
            $r = round($timeRes,$nar). " dia atr&aacute;s";
        } else {

            preg_match('/(\d*)\.(\d)/', $timeRes, $matches);

            if ($matches[2] >= 5) {
                $ext = round($timeRes,$nar) - 1;

                // Imprime o dia
                $r = $ext;

                // Formata o dia, singular ou plural
                if ($ext >= 1 and $ext < 2){ $r.= " dia "; } else { $r.= " dias ";}

                // Imprime o final da data
                $r.= "&frac12; atr&aacute;s";


            } else {
                $r = round($timeRes,0) . " dias atr&aacute;s";
            }

        }

    } else
    // Meses
    if ($timeRes > 2592000 and $timeRes < 31103999){

        $timeRes = $timeRes / 2592000;
        if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
            $r = round($timeRes,$nar). " mes atr&aacute;s";
        } else {

            preg_match('/(\d*)\.(\d)/', $timeRes, $matches);

            if ($matches[2] >= 5){
                $ext = round($timeRes,$nar) - 1;

                // Imprime o mes
                $r.= $ext;

                // Formata o mes, singular ou plural
                if ($ext >= 1 and $ext < 2){ $r.= " mês "; } else { $r.= " meses ";}

                // Imprime o final da data
                $r.= "&frac12; atr&aacute;s";
            } else {
                $r = round($timeRes,0) . " meses atr&aacute;s";
            }

        }
    } else
    // Anos
    if ($timeRes > 31104000 and $timeRes < 155519999){

        $timeRes /= 31104000;
        if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
            $r = round($timeRes,$nar). " ano atr&aacute;s";
        } else {
            $r = round($timeRes,$nar). " anos atr&aacute;s";
        }
    } else
    // 5 anos, mostra data
    if ($timeRes > 155520000){

        $localTimeRes = localtime($timeRes);
        $localTimeNow = localtime(time());

        $timeRes /= 31104000;
        $gmt = array();
        $gmt['mes'] = $localTimeRes[4];
        $gmt['ano'] = round($localTimeNow[5] + 1900 - $timeRes,0);

        $mon = array("Jan ","Fev ","Mar ","Abr ","Mai ","Jun ","Jul ","Ago ","Set ","Out ","Nov ","Dez ");

        $r = $mon[$gmt['mes']] . $gmt['ano'];
    }

    return $r;

}


//CALCULANDO DIAS NORMAIS
/*Abaixo vamos calcular a diferença entre duas datas. Fazemos uma reversão da maior sobre a menor 
para não termos um resultado negativo. */
function CalculaDias($xDataInicial, $xDataFinal){
   $time1 = dataToTimestamp($xDataInicial);  
   $time2 = dataToTimestamp($xDataFinal);  

   $tMaior = $time1>$time2 ? $time1 : $time2;  
   $tMenor = $time1<$time2 ? $time1 : $time2;  

   $diff = $tMaior-$tMenor;  
   $numDias = $diff/86400; //86400 é o número de segundos que 1 dia possui  
   return $numDias;
}

//LISTA DE FERIADOS NO ANO
/*Abaixo criamos um array para registrar todos os feriados existentes durante o ano.*/
function Feriados($ano,$posicao){
   $dia = 86400;
   $datas = array();
   $datas['pascoa'] = easter_date($ano);
   $datas['sexta_santa'] = $datas['pascoa'] - (2 * $dia);
   $datas['carnaval'] = $datas['pascoa'] - (47 * $dia);
   $datas['corpus_cristi'] = $datas['pascoa'] + (60 * $dia);
   $feriados = array (
      '01/01',
      '02/02', // Navegantes
      date('d/m',$datas['carnaval']),
      date('d/m',$datas['sexta_santa']),
      date('d/m',$datas['pascoa']),
      '21/04',
      '01/05',
      date('d/m',$datas['corpus_cristi']),
      '20/09', // Revolução Farroupilha \m/
      '12/10',
      '02/11',
      '15/11',
      '25/12',
   );
   
return $feriados[$posicao]."/".$ano;
}      

//FORMATA COMO TIMESTAMP
/*Esta função é bem simples, e foi criada somente para nos ajudar a formatar a data já em formato  TimeStamp facilitando nossa soma de dias para uma data qualquer.*/
function dataToTimestamp($data){
  $ano = substr($data, 6,4);
  $mes = substr($data, 3,2);
  $dia = substr($data, 0,2);
  return mktime(0, 0, 0, $mes, $dia, $ano);  
} 

//SOMA 01 DIA   
function Soma1dia($data){   
   $ano = substr($data, 6,4);
   $mes = substr($data, 3,2);
   $dia = substr($data, 0,2);
return   date("d/m/Y", mktime(0, 0, 0, $mes, $dia+1, $ano));
}

function Menos2dias($data){   
  $ano = substr($data, 6,4);
  $mes = substr($data, 3,2);
  $dia = substr($data, 0,2);
  return   date("d/m/Y", mktime(0, 0, 0, $mes, $dia-2, $ano));
}

//CALCULA DIAS UTEIS
/*É nesta função que faremos o calculo. Abaixo podemos ver que faremos o cálculo normal de dias ($calculoDias), após este cálculo, faremos a comparação de dia a dia, verificando se este dia é um sábado, domingo ou feriado e em qualquer destas condições iremos incrementar 1*/

function DiasUteis($yDataInicial,$yDataFinal){

   $diaFDS = 0; //dias não úteis(Sábado=6 Domingo=0)
   $calculoDias = CalculaDias($yDataInicial, $yDataFinal); //número de dias entre a data inicial e a final
   $diasUteis = 0;
   
   while($yDataInicial!=$yDataFinal){
      $diaSemana = date("w", dataToTimestamp($yDataInicial));
      if($diaSemana==0 || $diaSemana==6){
         //se SABADO OU DOMINGO, SOMA 01
         $diaFDS++;
      }else{
      //senão vemos se este dia é FERIADO
         for($i=0; $i<=12; $i++){
            if($yDataInicial==Feriados(date("Y"),$i)){
               $diaFDS++;   
            }
         }
      }
      $yDataInicial = Soma1dia($yDataInicial); //dia + 1
   }
return $calculoDias - $diaFDS;
}

function Recebimentos($data, $dias)
{

    $_this =& get_instance();
    $configuracao = $_this->db->get('website_config');
    $row = $configuracao->row();


    $datas = array();

    $data = explode("-", $data);

    if($row->paga_fim_de_semana == 0){ //se nao paga fim de semana

        // pega o hoje e explode ele para achar o dia da semana
        $timestamp_primeira_data = date('w', mktime(0,0,0, $data[1], $data[2]+1, $data[0]));

        //se domingo
        if($timestamp_primeira_data == 0){

            $y = 2;
            $dias = $dias+1;//soma 1 no numero de dias do ciclo

        //se for sabado
        }elseif($timestamp_primeira_data == 6){

            $y = 3;
            $dias = $dias+2;//soma 2 dias no numero de dias do ciclo

        }else{

            $y = 1;
        }

    }else{

      $y = 1;
    }

      for($i = $y; $i<= $dias; $i++){  //igual y ao i. Se i é menor ou igual a dias trazido da funcao acima. Caso o contrario procura o proximo dia

          $d = mktime(0,0,0, $data[1], $data[2] + $i, $data[0]);

          $datas[] = date("Y-m-d", mktime(0, 0, 0, $data[1],   $data[2] + $i, $data[0]) );

          //se nao paga fim de semana
          if($row->paga_fim_de_semana == 0){
              //se não é sabado e nem domingo
              if(date('w', $d) == 0 || date('w', $d) == 6){

                  $dias++; //soma dias
              }
          }
      }



    return array('primeiro_recebimento'=>reset($datas), 'ultimo_recebimento'=>end($datas));
    }
?>