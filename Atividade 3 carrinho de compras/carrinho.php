<?php
// 1. TEM QUE INICIAR A SESSÃO AQUI TAMBÉM!
início_da_sessão ();
? >
<! DOCTYPE html >
< html lang = " pt-br " >
< cabeçalho >
 < meta charset = " UTF-8 " >
 < title >Aula 3 - Carrinho</ title >
 <style> body { font- family : sans - serif ; margin : 20px ; } </style>
</head>
< corpo >
 < h1 >Seu Carrinho de Compras</ h1 >
 < a href = " index.php " >Voltar para a Loja</ a >
 < hr >
 <?php
 // 2. Verifique se o carrinho existe e não está vazio
 if ( isset ($_SESSION[ ' carrinho ' ]) && ! vazio ($_SESSION[ ' carrinho ' ])) {

 echo " <h3>Itens no seu carrinho:</h3> " ;
 echo " <ul> " ;
 // 3. Faz um loop por todos os itens salvos na sessão
 foreach ($_SESSION[ ' carrinho ' ] as $item) {
 echo " <li> " . htmlspecialchars ($item) . " </li> " ;
 }
 echo " </ul> " ;
 // 4. Link para limpar o carrinho
 echo ' <br><a href="limpar.php">Esvaziar Carrinho</a> ' ;
 } outro {
 // 5. Mensagem se o carrinho estiver vazio
 echo " <p>Seu carrinho está vazio.</p> " ;
 }
 ? >
</body>
</ html >
