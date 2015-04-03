**Exemplo de resposta automática**
==============
Esse código é um exemplo de como responder um sms que chega ao seu device com o astandes. 
 

**Configuraçao do astandes**
---------------
Primeiro configure o astandes encaminhar os sms que chegam para um end point.
Exemplo:

 Na interface web do astandes, entre **aparelhos**, no aparelho desejado  click em **editar**. No campo **URL de notificação** informe o endereço para onde as notificações serão enviadas. Por exemplo: **http://seudominio.com.br/quiz** . Feito isso todas os sms e outros status que chegarem ao astandes serão encaminhados para essa URL. 
 

**lib/config.ini**
------------
Nesse arquivos você pode configurar:

|Parametros|Comentário|
--------------|--------------|
|[astandes]||
|api_key="xxx" |API key  localizado na interface web em Perfil do usuário.
|device_id="yyy"|Aparelho ID, localizado na interface web em Aparelhos ID do aparelho que responderá as mensagens 
|log_file="/tmp/quiz.log"| Arquivo de Log
|debug=0|  #Modo debug 0 Desativado e 1 Ativado
|[quiz]|
|mensagem="Auto resposta"|Mensagem padrão
|log_file="/tmp/quiz.log"|Arquivo de Log
|debug=0| #Modo debug 0 Desativado e 1 Ativado

