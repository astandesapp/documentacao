<?php
/*
Nome: Luiz Sales
Data: 26/03/2015

Esse exemplo demonstra como receber um sms encaminhado pelo device. Para isso é necessario entrar na sua conta do astandes entrar em "Aparelhos"  escolha o aparelho que deseja receber notificações, clique em "Editar" e no campo "URL de notificação" configure o endereço para onde o astandes enviará as notificações por exemplo "http://meudominio.com.br/notificacoes.php"

Exemplo JSON de um SMS recebido:
{"created":"2015-03-26T04:12:32.114Z","updated":"2015-03-26T04:12:32.114Z","device":{"_id":"54ece955f3a15ecf51111","firstname":"Samsung","lastname":"Chip TIM","phone":"011911112222","description":"","notification":"http://meudominio.com.br/rcv.php","email":"","created":"2015-02-24T21:12:53.481Z","updated":"2015-02-24T21:13:22.067Z","attached":true,"rand":0.422616531373933},"status":204,"maxtries":1,"notification":"","identifier":"","debug":false,"ttl":"2015-03-27T04:12:32.114Z","text":"teste","phone":"011991962981","history":[{"status":204,"date":"2015-03-26T04:12:32.114Z"},{"status":202,"date":"2015-03-26T04:12:32.172Z"}],"_id":"551387303559548c5de64141"}

Exemplo JSON Status de uma mensagem enviada
{"device":{"_id":"54fb309c01e1d8e2222222","phone":"0119999999","firstname":"aaaaaaaaaa","lastname":"bbbbbbbbbbbb","description":"","notification":"","email":"","created":"2015-03-07T17:08:44.930Z","updated":"2015-03-07T17:09:22.703Z","attached":true,"rand":0.6807142987381667},"phone":"011999994444","text":"teste","notification":"http://meudominio.com.br/rcv.php","identifier":"12345","maxtries":1,"debug":false,"status":201,"created":"2015-03-26T04:12:23.501Z","updated":"2015-03-26T04:12:23.501Z","history":[{"status":201,"date":"2015-03-26T04:12:23.501Z"}],"ttl":"2015-03-27T04:12:23.501Z","_id":"551387273559548c5de6413d"}

Código de status das mesagens

Os status númericos de cada SMS enviado ou recebido podem ser consultados na tabela abaixo.

Sucesso

* 200: status de sucesso não documentado
* 201: mensagem criada no servidor
* 202: recebida pelo telefone pareado
* 203: enviada para a operadora
* 204: recebida pelo servidor
* 205: entregue


Transacional

* 300: status transacional não documentado
* 301: tentanto enviar novamente
* 302: enviando


Erros

* 500: status de erro não documentado
* 501: tempo de vida expirado
* 502: mensagem inválida
* 503: mensagem rejeitada
* 504: mensagem não pode ser entregue
* 505: mensagem apagada
* 506: falha genérica
* 507: sem serviço
* 508: PDU nulo
* 509: rede de dados desativada
* 510: erro ao entregar a mensagem
* 511: créditos do Astandes insuficientes
*/

// Recebe o JSON
$data = json_decode(file_get_contents("php://input"));

// Salva as mensagens recebidas no arquivo rcv.log
if($data->status === 204){
  $rcv_sms="Origin: {$data->phone} Mensagem: {$data->text} \n";
  file_put_contents ("/tmp/rcv.log", $rcv_sms, FILE_APPEND);
}

// Status de Mensagem enviada
if($data->status === 203){
  $rcv_sms = "Mensagem ID: {$data->_id} ID enviado: {$data->identifier} Status da Mensagem: {$data->status} \n";
  file_put_contents ("/tmp/rcv.log", $rcv_sms, FILE_APPEND);
}
