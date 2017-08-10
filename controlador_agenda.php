<?php

function cadastrar($nome, $email, $telefone) {
   $contatosAuxiliar = pegar_contatos();
    $contato = ['id' => uniqid(), 'nome' => $nome, 'email' => $email, 'telefone' => $telefone];
    array_push($contatosAuxiliar, $contato);//pega o array contato e coloca dentro da matriz contatos auxiliar
    salvarContatos($contatosAuxiliar);

    header('Location: index.phtml');
}

function pegar_contatos(){
    $contatosAuxiliar = file_get_contents('contatos.json');//pega os arquivos do arquivo contatos.json
    $contatosAuxiliar = json_decode($contatosAuxiliar, true);//decodifica o arquivo do formato json para um array
    return $contatosAuxiliar;
}
function excluir($id,$contatos){

    foreach ($contatos as $i => $contato){
        if ($id == $contato['id']) {
            unset($contatos[$i]);
        }
    }
    salvarContatos($contatos);
    header('Location: index.phtml');
}
function salvarContatos($contato){
    $meuscontatos = json_encode($contato,JSON_PRETTY_PRINT);//codifica uma matriz para o formato json
    file_put_contents('contatos.json',$meuscontatos);//coloca o conteudo do array no arquivo contatos.json
}
function editar($id, $nome, $email, $telefone){
    $meuscontatos = pegar_contatos();

    foreach ($meuscontatos as $i => $contato){
        if ($id == $contato['id']){
            $meuscontatos[$i]['nome'] = $nome;
            $meuscontatos[$i]['email'] = $email;
            $meuscontatos[$i]['telefone'] = $telefone;
        }
    }
   salvarContatos($meuscontatos);
    header('Location: index.phtml');
}
function editar_contato($id){
    $meuscontatos = pegar_contatos();
    foreach ($meuscontatos as $contato){
        if ($id == $contato['id']){
            return $contato;
        }
    }
}
function buscar($nome){

    $meuscontatos = pegar_contatos();
    $encontrados = [];
    if ($nome == null){
        return $meuscontatos;
    } else {

        foreach ($meuscontatos as $meuscontato){
            if ($nome == $meuscontato['nome']){
                $encontrados[] = $meuscontato;
            }
        }

        return $encontrados;
    }

}
//rotas
switch ($_GET['acao']){
    case cadastrar:
        cadastrar($_POST['nome'],$_POST['email'],$_POST['telefone']);
        break;
    case excluir:
        excluir($_GET['id'],pegar_contatos());
        break;
    case editar:
        editar($_GET['id'],$_POST['nome1'],$_POST['email1'],$_POST['telefone1']);
        break;
    case busca:
        buscar($_POST['nome_buscado']);
}