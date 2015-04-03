**API De Integração**
==============
Este documento tem como objetivo orientar o desenvolvedor na hora de implementar a API V1 do Astandes, habilitando sua aplicação a enviar e receber SMS programaticamente.

**Autenticação**
---------------
Todas as rotas e APIs aqui descritas necessitam de um cabeçhalho de autenticação contendo a chave da API da sua conta. Esta chave pode ser obtida através do menu Perfil contido dentro do painel administrativo da sua conta. Exemplo de autenticação utilizando o cabeçalho Authorization:

Exemplo:

    curl https://astandes.com.br/api/v1/auth \
    -X GET \
    -H "Authorization: tokenv1  ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..."

 

**Devices**
------------
Os devices são representações abstratas de celulares, eles precisam estar pareados com um aplicativo instalado em um Android para que sejam capazes de enviar e receber mensagens.

**Criando um device**
Método: POST
URL: https://astandes.com.br/api/v1/device

Exemplo de requisição:

    curl https://astandes.com.br/api/v1/device \
    -X POST \
    -H "Authorization: tokenv1
    ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..." \
    -d \
    '{"phone": "+551181169093"}'

**Parâmetros do JSON enviado**

Campo| Descrição| Tipo| Requerido
--------|------------|------|-------------
firstname| Primeiro nome do utilizador deste aparelho |string |Não
lastname| Último nome do utilizador deste aparelho|string| Não
phone |Número do telefone| string |Não
email| E-mail do utilizador deste aparelho| string| Não
description| Descrição deste aparelho| string| Não
notification| URL de notificação para novas mensagens| string| Não
Exemplo de resposta:

    {
     "description": "Device para demonstração",
     "firstname": "Demo",
     "lastname": "Astandes",
     "notification": "https://astandes.com.br",
     "phone": "",
     "email": "",
     "created": "2015-02-03T17:22:39.506Z",
     "updated": "2015-02-03T17:22:39.506Z",
     "attached": false,
     "_id": "54d103df29ba4e502b2e4e9a"
    }

 **Alterando um device**
**Listando devices**

Método: GET
Rota: https://astandes.com.br/api/v1/device
Exemplo de requisição:

    curl https://astandes.com.br/api/v1/device?attached=false \
     -X GET \
     -H "Authorization: tokenv1
    ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..."


Parâmetros disponíveis para a query da URL:

Campo| Descrição| Tipo| Requerido
--------|------------|------|-------------
skip| Número de registros para pular antes de retornar| integer| Não
limit| Limite de registros para escapar antes de retornar| integer| Não
updated_start| Filtrar apenas registros alterados depois desta data| ISODate| Não
updated_stop| Filtrar apenas registros alterados antes desta data| ISODate| Não
created_start| Filtrar apenas registros criados depois desta data| ISODate| Não
created_stop| Filtrar apenas registros criados antes desta data| ISODate| Não
attached| Buscar por registros pareados| boolean| Não
sort| Nome do campo para ordenar o resultado| string| Não


Exemplo de retorno:

    {
     "skip": 0,
     "limit": 100,
     "sort": "-updated",
     "total": 1,
     "length": 1,
     "result": [
    			 {
    			     "_id": "54d103df29ba4e502b2e4e9a",
    			     "description": "Device para demonstração",
    			     "firstname": "Demo",
    			     "lastname": "Astandes",
    			     "notification": "https://astandes.com.br",
    			     "phone": "",
    	

**Listando devices**

Método: GET

Rota: https://astandes.com.br/api/v1/device
Exemplo de requisição:

    curl https://astandes.com.br/api/v1/device?attached=false \
     -X GET \
     -H "Authorization: tokenv1
    ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..."


Parâmetros disponíveis para a query da URL:

Campo| Descrição| Tipo| Requerido
--------|------------|------|-------------
skip| Número de registros para pular antes de retornar| integer| Não
limit| Limite de registros para escapar antes de retornar| integer| Não
updated_start| Filtrar apenas registros alterados depois desta data| ISODate| Não
updated_stop| Filtrar apenas registros alterados antes desta data| ISODate| Não
created_start| Filtrar apenas registros criados depois desta data| ISODate| Não
created_stop| Filtrar apenas registros criados antes desta data| ISODate| Não
attached| Buscar por registros pareados| boolean| Não
sort| Nome do campo para ordenar o resultado| string| Não

Exemplo de retorno:

    {
     "skip": 0,
     "limit": 100,
     "sort": "-updated",
     "total": 1,
     "length": 1,
     "result": [
    			 {
    			     "_id": "54d103df29ba4e502b2e4e9a",
    			     "description": "Device para demonstração",
    			     "firstname": "Demo",
    			     "lastname": "Astandes",
    			     "notification": "https://astandes.com.br",
    			     "phone": "",
    			     "email": "",
    			     "created": "2015-02-03T17:22:39.506Z",
    			     "updated": "2015-02-03T17:22:39.506Z",
    			     "attached": false
    		     }
    	     ]
    }
    

 **Excluir devices**
Método: DELETE
Rota: https://astandes.com.br/api/v1/device/{id_do_device}
Exemplo de requisição:

    curl https://astandes.com.br/api/v1/device/54d103df29ba4e502b2e4e9a \
     -X DELETE \
     -H "Authorization: tokenv1
    ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..."

**Pareamento**
------------------
O pareamento serve para sincronizar um aplicativo do Astandes com um device em sua conta, para
realizar isto é necessário criar um PIN de 7 dígitos.
 Parear device
Método: POST
Rota: https://astandes.com.br/api/v1/attach
Exemplo de requisição:

    curl https://astandes.com.br/api/v1/attach \
     -X POST \
     -H "Authorization: tokenv1
    ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..." \
     -d \
     '{"device": "54d103df29ba4e502b2e4e9a"}'

Campo| Descrição| Tipo| Requerido
--------|------------|------|-------------
device| ID do device à ser pareado| string| Sim
Exemplo de resposta:

    {
     "expires": "2015-02-03T19:29:05.180Z",
     "created": "2015-02-03T19:14:05.181Z",
     "code": "1453210",
     "device": {
			     "_id": "54d103df29ba4e502b2e...",
			     "description": "Device para demonstração",
			     "firstname": "Demo",
			     "lastname": "Astandes",
			     "notification": "https://astandes.com.br",
			     "phone": "",
			     "email": "",
			     "created": "2015-02-03T17:22:39.506Z",
			     "updated": "2015-02-03T17:22:39.506Z",
			     "attached": false
			   },
     "_id": "54d11dfde3b75236306..."
    }

Agora basta utilizar o campo code no aplicativo instalado no seu telefone. **Atenção** Este código dura 15
minutos.

**Envio simples**
-------------------
As mensagens são enviadas para os devices pareados e o  app astandes se encarrega de fazer o envio do SMS, portanto não esqueça de parear o seu device antes de tentar enviar uma mensagem.

**Criar uma nova mensagem**
Método: POST
Rota: https://astandes.com.br/api/v1/message

Exemplo de requisição passando o device:

    curl https://astandes.com.br/api/v1/message \
     -X POST \
     -H "Authorization: tokenv1
    ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..." \
     -d \
     '{
     "device": "54d103df29ba4e502b2...",
     "phone": "+5511999999999",
     "text": "Hello world!"
     }'

Exemplo de requisição utilizando escolhendo device aleatoriamente:

    curl https://astandes.com.br/api/v1/message \
     -X POST \
     -H "Authorization: tokenv1
    ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..." \
     -d \
     '{
     "device":{"distribute":"random"},
     "phone": "+5511999999999",
     "text": "Hello world!"
     }'



Campo| Descrição| Tipo| Requerido
-----|----------|-----|-------
device| ID do device por onde o sms será enviado. {"distribute": "random"}  pode ser utilizado no lugar do ID para que o sistema escolha de forma aleatória o device por onde a mensagem será enviada. | string| Sim
text| Mensagem a ser enviada| string| Sim
phone |Número do destinatário do SMS| integer| Sim
ttl| Cancela o envio da mensagem se o device não enviar após esse tempo em segundos | integer| Não
identifier| Identificador externo| string| Não
maxtries| Número de tentativas de envio antes de desistir| integer| Não
notification| URL de notificação de alteração de status da mensagem| string| Não
Exemplo de resposta:

    {
     "device": {
			     "_id": "54d103df29ba4e502b2e4e9a",
			     "description": "Device para demonstração",
			     "firstname": "Demo",
			     "lastname": "Astandes",
			     "notification": "https://astandes.com.br",
			     "phone": "",
			     "email": "",
			     "created": "2015-02-03T17:22:39.506Z",
			     "updated": "2015-02-04T12:18:47.255Z",
			     "attached": true
     },
     "phone": "+5511999999999",
     "text": "Hello world!",
     "identifier": "",
     "maxtries": 1,
     "notification": "",
     "created": "2015-02-04T12:19:20.345Z",
     "debug": false,
     "updated": "2015-02-04T12:19:20.346Z",
     "status": 201,
     "history": [
			     {
				     "status": 201,
				     "date": "2015-02-04T12:19:20.346Z"
			     }
			    ],
     "ttl": "2015-02-05T12:19:20.346Z",
     "_id": "54d20e4880a811151fc16f6c"
    }

**Envio de mensagens em lote**
-------------------
Esse envio é para os sistemas terem uma melhor performance quando necessitarem enviar varias mensagens para o astandes. O formato de cada mensagem e parametros são os mesmos utilizados no envio simples, com a diferença de estarem em um array.

**Enviando as mensagem**
Método: POST
Rota: https://astandes.com.br/api/v1/message/bulk

Exemplo:
Exemplo de requisição passando o device:

    curl https://astandes.com.br/api/v1/message/bulk \
     -X POST \
     -H "Authorization: tokenv1
    ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..." \
     -d \
     '{"messages":[ 
		{"device": "54d103df29ba4e502b2...",
	    "phone": "+5511999991111",
	    "text": "Hello world 1!"
	    },
	    {"device": "54d103df29ba4e502b2...",
	    "phone": "+5511999992222",
	    "text": "Hello world 2!"
	    },
	    {"device": "54d103df29ba4e502b2...",
	    "phone": "+5511999993333",
	    "text": "Hello world 3!"
	    }
     ]}'
     
  

   Exemplo de resposta:
     
     [{"device":
	    {
			"_id":"54ece955f3a15ecf58...",
		    "firstname":"Demo",
			"lastname":"Astandes",
			"phone":"011999999999",
			"description":"",
			"notification":"",
			"email":"",
			"created":"2015-02-24T21:12:53.481Z",
			"updated":"2015-02-24T21:13:22.067Z",
			"attached":true
		},
		"phone":"011999991111",
		"text":"Hello World 1",
		"ttl":"2015-03-19T16:48:15.076Z",
		"notification":"http://seudominio.com.br/status.php",
		"identifier":"",
		"maxtries":1,
		"debug":false,
		"status":201,
		"created":"2015-03-19T16:47:15.076Z",
		"updated":"2015-03-19T16:47:15.076Z",
		"history":[
					{
						"status":201,"date":"2015-03-19T16:47:15.076Z"
					}
				  ],
		"_id":"550afd935d6c046...."
	},
	{"device":
	    {
			"_id":"54ece955f3a15ecf58...",
		    "firstname":"Demo",
			"lastname":"Astandes",
			"phone":"011999999999",
			"description":"",
			"notification":"",
			"email":"",
			"created":"2015-02-24T21:12:53.481Z",
			"updated":"2015-02-24T21:13:22.067Z",
			"attached":true
		},
		"phone":"011999992222",
		"text":"Hello World 2",
		"ttl":"2015-03-19T16:48:15.076Z",
		"notification":"http://seudominio.com.br/status.php",
		"identifier":"",
		"maxtries":1,
		"debug":false,
		"status":201,
		"created":"2015-03-19T16:47:15.076Z",
		"updated":"2015-03-19T16:47:15.076Z",
		"history":[
					{
						"status":201,"date":"2015-03-19T16:47:15.076Z"
					}
				  ],
		"_id":"550afd935d6c046...."
	},
	{"device":
	    {
			"_id":"54ece955f3a15ecf58...",
		    "firstname":"Demo",
			"lastname":"Astandes",
			"phone":"011999999999",
			"description":"",
			"notification":"",
			"email":"",
			"created":"2015-02-24T21:12:53.481Z",
			"updated":"2015-02-24T21:13:22.067Z",
			"attached":true
		},
		"phone":"011999993333",
		"text":"Hello World 3",
		"ttl":"2015-03-19T16:48:15.076Z",
		"notification":"http://seudominio.com.br/status.php",
		"identifier":"",
		"maxtries":1,
		"debug":false,
		"status":201,
		"created":"2015-03-19T16:47:15.076Z",
		"updated":"2015-03-19T16:47:15.076Z",
		"history":[
					{
						"status":201,"date":"2015-03-19T16:47:15.076Z"
					}
				  ],
		"_id":"550afd935d6c046...."
	}]
	
**Listar mensagens**
----------------------
 
Método: GET
Rota:  https://astandes.com.br/api/v1/message

Exemplo de requisição:

    curl https://astandes.com.br/api/v1/message?debug=false \
     -X GET \
     -H "Authorization: tokenv1
    ABBdC1SZ1MZRmwMQelUemcLPAQgb5969uTnkRwImaeEW57lD/33Ue/3Wsx..."

Parâmetros disponíveis para a query da URL:

Campo| Descrição| Tipo| Requerido
--------|------------|------|-------------
skip| Número de registros para pular antes de retornar| integer| Não
limit| Limite de registros para escapar antes de retornar| integer| Não
updated_start| Filtrar apenas registros alterados depois desta data| ISODate| Não
updated_stop| Filtrar apenas registros alterados antes desta data| ISODate| Não
created_start| Filtrar apenas registros criados depois desta data| ISODate| Não
created_stop| Filtrar apenas registros criados antes desta data| ISODate| Não
debug| Filtra mensagens que foram enviadas em modo de debug| boolean| Não
sort| Nome do campo para ordenar o resultado| string| Não

Exemplo de resposta:

    {
     "skip": 0,
     "limit": 100,
     "sort": "-updated",
     "total": 1,
     "length": 1,
     "result": [{
     "_id": "54d20e4880a811151fc16f6c",
     "device": {
     "_id": "54d103df29ba4e502b2e4e9a",
     "description": "Device para demonstração",
     "firstname": "Demo",
     "lastname": "Astandes",
     "notification": "https://astandes.com.br",
     "phone": "",
     "email": "",
     "created": "2015-02-03T17:22:39.506Z",
     "updated": "2015-02-04T12:18:47.255Z",
     "attached": true
     },
     "destination": "+5511999999999",
     "text": "Hello world",
     "identifier": "",
     "maxtries": 1,
     "notification": "",
     "created": "2015-02-04T12:19:20.345Z",
     "debug": false,
     "updated": "2015-02-04T12:19:20.346Z",
     "status": 201,
     "history": [{
     "status": 201,
     "date": "2015-02-04T12:19:20.346Z"
     }],
     "ttl": "2015-02-05T12:19:20.346Z"
     }]
    }

**Notificações**
------------------
O Astandes possui mecanismos para avisar o seu sistema sobre mensagens recebidas e sobre a
alteração do status das mensagens.

**Formato da notificação**
Todas as notificações enviadas para o seu sistema serão em JSON e possuem o seguinte formato.

    {
     "device":{
     "_id": "54d103df29ba4e502b2e4e9a",
     "description": "Device para demonstração",
     "firstname": "Demo",
     "lastname": "Astandes",
     "notification": "https://astandes.com.br",
     "phone": "",
     "email": "",
     "created": "2015-02-03T17:22:39.506Z",
     "updated": "2015-02-04T12:18:47.255Z",
     "attached": true
     },
     "destination": "+5511999999999",
     "text": "Hello world!",
     "identifier": "",
     "maxtries": 1,
     "notification": "",
     "created": "2015-02-04T12:19:20.345Z",
     "debug": false,
     "updated": "2015-02-04T12:19:20.346Z",
     "status": 201,
     "history": [
     {
     "status": 201,
     "date": "2015-02-04T12:19:20.346Z"
     }
     ],
     "ttl": "2015-02-05T12:19:20.346Z",
     "_id": "54d20e4880a811151fc16f6c"
    }

**Notificação de atualização de status**
Este tipo de notificação serve para informar o seu sistema sobre a alteração do status de uma mensagem. É possível informar a URL que receberá esta notificação através do campo notification ao criar uma nova mensagem.

**Notificação de nova mensagem**
As notificações de nova mensagem são utilizadas para informar o seu sistema sobre mensagens recebidas de aparelhos pareados. Para informar a URL de recebimento deste tipo de atualização é necessário informar o campo notification ao criar ou alterar um device. 

Note que ambas notificações utilizam o mesmo formato JSON, se você deseja receber os dois tipos de notificação na sua URL basta filtrar o campo status para saber quais mensagens são de atualização e quais são mensagens recebidas pelo aparelho. O código 204 descreve uma mensagem recebida, enquanto os outros informam de atualizações.


**Código de status das mesagens**
--------------------------------------
Os status númericos de cada SMS enviado ou recebido podem ser consultados na tabela abaixo.

**Sucesso**

    * 200: status de sucesso não documentado
    * 201: mensagem criada no servidor
    * 202: recebida pelo telefone pareado
    * 203: enviada para a operadora
    * 204: recebida pelo servidor
    * 205: entregue

**Transacional**

    * 300: status transacional não documentado
    * 301: tentanto enviar novamente
    * 302: enviando

**Erros**

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

