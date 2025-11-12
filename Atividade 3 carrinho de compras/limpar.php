<?php
// 1. Inicia sessão para poder gerenciar
início_da_sessão ();
// 2. Destrua TODOS os dados da sessão
session_destroy ();
// 3. Redireciona o usuário de volta para a loja
cabeçalho ( ' Localização: index.php ' );
saída ;
? >
