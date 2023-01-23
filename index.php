<?php
    include("conexao.php");
    include("ElementosPagina.class.php");
    $sql = "SELECT P.id as id, P.nrsei, P.redmine, P.numfunc, P.nome, F.nome AS ASSESSOR, S.descricao AS STATUS, A.descricao AS ASSUNTO, P.data_ini 
            FROM processo P, FUNCIONARIO F, STATUS S, ASSUNTO A 
            WHERE P.assunto_id = A.id 
            AND P.funcionario_id = F.id 
            AND P.status_id = S.id
        order by p.data_ini";

    $con = $conexao->query($sql) or die($conexao->error) ;

    $tabela = '';
    while($dado = $con->fetch_array()) {
        $tabela = $tabela.'
                <tr>
                    <td>'.$dado["id"].'</td>
                    <td>'.$dado["nrsei"].'</td>
                    <td>'.$dado["redmine"].'</td>
                    <td>'.$dado["numfunc"].'</td>
                    <td>'.$dado["nome"]   .'</td>
                    <td>'.$dado["ASSESSOR"].'</td>
                    <td>'.$dado["STATUS"]  .'</td>
                    <td>'.$dado["ASSUNTO"] .'</td>
                    <td>'.$dado["data_ini"].'</td>
                    <td><a href="editar.php?codigo='.$dado["id"].'">Editar</a> 
                        <a href="excluir.php?codigo='.$dado["id"].'">Excluir</a></td> 
                </tr>';
    }

    $conexao->close();

    $corpo = '  <div>
                    <table width="968" align="center" border ="1" bgcolor="#FFFFFF">
                        <tr><td colspan = "8" align="center" > Processos abertos </td> </tr>
                        <tr>
                            <td>ID</td>
                            <td>Nro. Sei</td>
                            <td>Redmine</td>
                            <td>ID Funcional</td>
                            <td>Nome Servidor</td>
                            <td>Assessor</td>
                            <td>Status</td>
                            <td>Assunto</td>
                            <td>Data Inicial</td>
                        </tr>
                        '.$tabela.' 
                    </table>
                    <form action="cadastrar.php" method="POST">
                        <table width="968" class="tdatagrid_table" align="center" border ="0" bgcolor="#FFFFFF">
                            <tr>
                                <td width = "10"></td>
                                <td align="left">
                                    <p align="left" class="tit_conteudo">Cadastrar Novo Processo</p>
                                </td>
                            <tr>
                                <td width = "10"></td>
                                <td align="left" >
                                    <input name="nrsei" class="input is-large" placeholder="Nro. SEI" autofocus="">
                                </td>
                            </tr>
                            <tr>
                                <td width = "10"></td>
                                <td align="left" >
                                    <input name="redmine" class="input is-large" type="input" placeholder="Redmine">
                                </td>
                            </tr>
                            <tr>
                                <td width = "10"></td>
                                <td align="left" >
                                    <input name="numfunc" class="input is-large" placeholder="Numfunc" autofocus="">
                                </td>
                            </tr>
                            <tr>
                                <td width = "10"></td>
                                <td align="left" >
                                    <input name="nome" class="input is-large" type="input" placeholder="Nome">
                                </td>
                            </tr>
                            <tr>
                                <td width = "10"></td>
                                <td align="left" >
                                    <select name="assunto_id" id="assunto_id" placeholder="Assunto" class="input is-large">
                                        <option value="0">--Assunto--</option>
                                        <option value="1">Aposentadoria</option>
                                        <option value="2">Arquivo eTCE</option>
                                        <option value="3">Atributos do Servidor</option>
                                        <option value="4">Atualização do E-mail</option>
                                        <option value="5">Auditoria</option>
                                        <option value="6">Bloqueio de Pagamento</option>
                                        <option value="7">Cadastro de Servidor</option>
                                        <option value="8">Carteira de ID Funcional</option>
                                        <option value="9">Centro de Custo</option>
                                        <option value="10">Consignação</option>
                                        <option value="11">Contagem de Tempo/Enquadramento</option>
                                        <option value="12">Contagem de Tempo/Trienio</option>
                                        <option value="13">Dados do Servidor</option>
                                        <option value="14">DEA Judicial</option>
                                        <option value="15">Dependente/Representante Legal</option>
                                        <option value="16">Desligamento</option>
                                        <option value="17">Determinação Judicial</option>
                                        <option value="18">Disposição Externa</option>
                                        <option value="19">Disposição Interna</option>
                                        <option value="20">Encerramento de Folha</option>
                                        <option value="21">Estrutura</option>
                                        <option value="22">Evento de Mudança de UA</option>
                                        <option value="23">Evento de Progressão</option>
                                        <option value="24">Eventos de Cargo</option>
                                        <option value="25">Exercício do Servidor</option>
                                        <option value="26">Férias</option>
                                        <option value="27">Frequência</option>
                                        <option value="28">Grupos de Eleitos</option>
                                        <option value="29">Informe de Rendimentos</option>
                                        <option value="30">Ingressos do Servidor</option>
                                        <option value="31">Lançamento Manual</option>
                                        <option value="32">Licença Premio</option>
                                        <option value="33">Outros</option>
                                        <option value="34">Pagamento</option>
                                        <option value="35">Parametrização</option>
                                        <option value="36">PASEP</option>
                                        <option value="37">Pensão Alimentícia</option>
                                        <option value="38">Pensão Especial</option>
                                        <option value="39">Pensão Previdenciária</option>
                                        <option value="40">Portal do Servidor</option>
                                        <option value="41">Pré-Contagem/Averbações</option>
                                        <option value="42">RAIS</option>
                                        <option value="43">RAS</option>
                                        <option value="44">Relatórios</option>
                                        <option value="45">Retransmissão de Pagamento</option>
                                        <option value="46">SAPE</option>
                                        <option value="47">Senha SAPE</option>
                                        <option value="48">Senha SIGRH</option>
                                        <option value="49">Vínculos</option> 
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width = "10"></td>
                                <td align="left" >
                                    <select name="assessor_id" id="assessor_id" placeholder="Assessor" class="input is-large">
                                        <option value="0">--Assessor--</option>
                                        <option value="1">Cris</option>
                                        <option value="2">Cristovao</option>
                                        <option value="3">Karen</option>
                                        <option value="4">Heuler</option>
                                        <option value="5">Marcio</option>
                                        <option value="6">Mayara</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width = "10"></td>
                                <td align="left" >
                                    <select name="status_id" id="status_id" placeholder="Status" class="input is-large">
                                        <option value="0">--Status--</option>
                                        <option value="1">Iniciado</option>
                                        <option value="2">Aberto Redmine</option>
                                        <option value="3">Finalizado</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width = "10"></td>
                                <td align="left" >
                                    <br>
                                    <button type="submit" class="button is-block is-link is-large is-fullwidth">Salvar</button>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
    ';
    

    $template = ElementosPagina::$cabecalhoTela . ElementosPagina::$cabecalhoCCTela . $corpo . ElementosPagina::$rodapeTela;

    echo $template;
?>

