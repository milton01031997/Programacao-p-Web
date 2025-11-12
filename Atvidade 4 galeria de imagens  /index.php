<?php
// --- PARTE 1: LÓGICA DE UPLOAD ---
// Define o diretório para onde os arquivos serão movidos
$diretorio_uploads = " uploads/ " ;
$mensagem = "" ; // Para salvar o status do upload
// 1. Verifique se o formulário foi enviado (método POST)
se ($_SERVER[ ' REQUEST_METHOD ' ] == ' POST ' ) {
 // 2. Verifique se um arquivo foi realmente enviado e se não houve erro
 if ( isset ($_FILES[ ' foto ' ]) && $_FILES[ ' foto ' ][ ' error ' ] == 0 ) {

 // 3. Pega o nome temporário do arquivo no servidor
 $arquivo_tmp = $_FILES[ ' foto ' ][ ' tmp_name ' ];

 // 4. Pega o nome original do arquivo
 // basename() é uma segurança para evitar nomes de arquivos maliciosos
 $nome_arquivo = nome base ($_FILES[ ' foto ' ][ ' nome ' ]);
 // 5. Defina o caminho completo de destino
 $caminho_destino = $diretorio_uploads . $nome_arquivo;
 // 6. Tenta mover o arquivo do local temporário para o destino
 if ( move_uploaded_file ($ arquivo_tmp, $caminho_destino)) {
 $mensagem = " Arquivo enviado com sucesso! " ;
 } outro {
 $mensagem = " Erro ao mover o arquivo. " ;
 }
 } outro {
 $mensagem = " Erro ao enviar ou nenhum arquivo selecionado. " ;
 }
}
// --- PARTE 2: LÓGICA DE EXIBIÇÃO DA GALERIA ---
// 7. Leia todos os arquivos da pasta 'uploads'
// glob() é uma função que busca arquivos que batem com um padrão
$imagens = glob ($diretorio_uploads . " *.{jpg,jpeg,png,gif} " , GLOB_BRACE );
? >
<! DOCTYPE html >
< html lang = " pt-br " >
< cabeçalho >
 < meta charset = " UTF-8 " >
 < title >Aula 4 - Mini Galeria</ title >
 < estilo >
 corpo { família da fonte : sans-serif ; margem : 20px ; }
 h1 , h2 { cor : #333 ; }
 /* Estilo da galeria */
 .galeria { display : flex ; flex-wrap : wrap ; gap : 10px ; margin- top : 20px ; }
 .galeria img { width : 200px ; height : 150px ; object - fit : cover ; border : 2px solid #CCC ; }
 </ estilo >
</head>
< corpo >
 < h1 > 🖼️Mini Galeria de Imagens</ h1 >
 < form action = " index.php " method = " POST " enctype = " multipart/form-data " >
 < label for = " foto " >Escolha uma imagem:</ label >

 < input type = " file " id = " foto " name = " foto " accept = " image/* " required >

 < button type = " submit " >Enviar Imagem</ button >
 </ formulário >
 <?php if ($mensagem != "" ): ? >
 < p >< forte > <?php echo $mensagem; ? > </ forte </ p >
 <?php endif ; ? >
 < hr >
 < h2 >Imagens Enviadas</ h2 >
 < div class = " galeria " >
 <?php
 se ( vazio ($imagens)) {
 echo " <p>Nenhuma imagem foi enviada ainda.</p> " ;
 } outro {
 foreach ($imagens as $img) {
 // Exiba a tag <img> com o caminho da imagem
 echo " <img src=' " . htmlspecialchars ($img) . " ' alt='Imagem da galeria'> " ;
 }
 }
 ? >
 </div>
</body>
</ html >
