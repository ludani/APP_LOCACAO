<?php	
    session_start();
    include 'conexao.php';
     

       //como pegar informacoes de outra pagina e imprimir em pdf com php

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();


      
                    $cmd = "select * from imoveis ";
                    $imoveis = mysqli_query($link, $cmd);
                    $total = mysqli_num_rows($imoveis); 
                    $registros = 10;
                    $numPaginas = ceil($total/$registros);
                 

                    if(isset($_REQUEST['filtro']))
                      $filtro = $_REQUEST['filtro'];
                    else
                      $filtro ="";
                  //  $sql = "SELECT usuid, usunome, usuemail FROM sa_usuario WHERE usuarionome LIKE '$filtro%' ORDER BY usunome limit $inicio,$registros " ;
                    $sql = "SELECT * FROM imoveis  
                            INNER JOIN fiador ON imoveis.codigo_fiador = fiador.codigo_fiador
                            WHERE id LIKE '%$filtro%' ORDER BY id limit $registros"; 
                      $resultado    = mysqli_query($link, $sql);
                      $num          = mysqli_num_rows($resultado);
                      
                            while($registro = mysqli_fetch_array($resultado)) { 
                            $id           = $registro['nome_fiador'];
                            $cidade       = $registro['cidade'];
                            $valor        = $registro['valor'];
                            $descricao    = $registro['descricao'];
                            $img          = $registro['img'];   
	
    // Carrega seu HTML
	$dompdf->load_html (

		"<br><br><h3><center>CONTRATO IMOVEL</center></h3>
        <br><br><div class='container'>
        <h4> CLÁUSULA PRIMEIRA: O objeto deste contrato de locação é o imóvel residencial.<br>
         Estado:
        </h4><div>".$registro['estado']. 
        "<span style='font-size:18px;'><b> Cidade: </b></span>".$registro['cidade']. 
        "<span style='font-size:18px;'><b> Bairro: </b></span>" .$registro['bairro']. 
        "<span style='font-size:18px;'><b> Complemento: </b></span>" .$registro['complemento'].       
        "<span style='font-size:18px;'><b> Endereco: </b></span>"  .$registro['endereco']. 
        "<span style='font-size:18px;'><b> Cep: </b></span>"  .$registro['cep']. 
        "<span style='font-size:18px;'><b> Numero: </b></span>".$registro['numero']."</div><br><br>".
        
        
    "<div class='container'><h3>CLÁUSULA SEGUNDA: O prazo da locação, ficará em acordo com locador e locatario.<br> 
        CLÁUSULA TERCEIRA: O aluguel mensal, deverá ser pago até o dia 10 (dez) do mês subseqüente ao vencido, no local indicado pelo LOCADOR, é de R$ ".$registro['valor']. "</h3>". "<p> mensais, reajustados anualmente, de conformidade com a variação do IGP-M apurada no ano anterior, e na sua falta, por outro índice criado pelo Governo Federal e, ainda, em sua substituição, pela Fundação Getúlio Vargas, reajustamento este sempre incidente e calculado sobre o último aluguel pago no último mês do ano anterior.<br>
        CLÁUSULA QUARTA: O LOCATÁRIO será responsável por todos os tributos incidentes sobre o imóvel bem como despesas ordinárias de condomínio, e quaisquer outras despesas que recaírem sobre o imóvel, arcando tambem com as despesas provenientes de sua utilização seja elas, ligação e consumo de luz, força, água e gás que serão pagas diretamente às empresas concessionárias dos referidos serviços.<br>
        CLÁUSULA QUINTA: Em caso de mora no pagamento do aluguel, será aplicada multa de 2% (dois por cento) sobre o valor devido e juros mensais de 1% (um por cento) do montante devido.<br>
        CLÁUSULA SEXTA: Fica ao LOCATÁRIO, a responsabilidade em zelar pela conservação, limpeza do imóvel, efetuando as reformas necessárias para sua manutenção sendo que os gastos e pagamentos decorrentes da mesma, correrão por conta do mesmo. O LOCATÁRIO está obrigado a devolver o imóvel em perfeitas condições de limpeza, conservação e pintura, quando finda ou rescindida esta avença, conforme constante no termo de vistoria em anexo. O LOCATÁRIO não poderá realizar obras que alterem ou modifiquem a estrutura do imóvel locado, sem prévia autorização por escrito da LOCADORA. Caso este consinta na realização das obras, estas ficarão desde logo, incorporadas ao imóvel, sem que assista ao LOCATÁRIO qualquer indenização pelas obras ou retenção por benfeitorias. As benfeitorias removíveis poderão ser retiradas, desde que não desfigurem o imóvel locado.<br>
        PARÁGRAFO ÚNICO: O LOCATÁRIO declara receber o imóvel em perfeito estado de conservação e perfeito funcionamento devendo observar o que consta no termo de vistoria.<br>
        CLÁUSULA SÉTIMA: O LOCATÁRIO declara, que o imóvel ora locado, destina-se única e exclusivamente para o seu uso residencial e de sua família.<br>
        
        CLÁUSULA OITAVA: O LOCATÁRIO não poderá sublocar, transferir ou ceder o imóvel, sendo nulo de pleno direito qualquer ato praticado com este fim sem o consentimento prévio e por escrito do LOCADOR.<br>
        CLÁUSULA NONA: Em caso de sinistro parcial ou total do prédio, que impossibilite a habitação o imóvel locado, o presente contrato estará rescindido, independentemente de aviso ou interpelação judicial ou extrajudicial; no caso de incêndio parcial, obrigando a obras de reconstrução, o presente contrato terá suspensa a sua vigência e reduzida a renda do imóvel durante o período da reconstrução à metade do que na época for o aluguel, e sendo após a reconstrução devolvido o LOCATÁRIO pelo prazo restante do contrato, que ficará prorrogado pelo mesmo tempo de duração das obras de reconstrução.<br>
        CLÁUSULA DÉCIMA : Em caso de desapropriação total ou parcial do imóvel locado, ficará rescindido de pleno direito o presente contrato de locação, independente de quaisquer indenizações de ambas as partes ou contratantes.<br>
        CLÁUSULA DÉCIMA PRIMEIRA: Falecendo o FIADOR, o LOCATÁRIO, em 30 (trinta) dias, dar substituto idôneo que possa garantir o valor locativo e encargos do referido imóvel, ou prestar seguro fiança de empresa idônea.<br>
        CLÁUSULA DÉCIMA SEGUNDA: No caso de alienação do imóvel, obriga-se o LOCADOR, dar preferência ao LOCATÁRIO, e se o mesmo não utilizar-se dessa prerrogativa, o LOCADOR deverá constar da respectiva escritura pública, a existência do presente contrato, para que o adquirente o respeite nos termos da legislação vigente.<br>
        CLÁUSULA DÉCIMA TERCEIRA: O FIADOR e principal pagador do LOCATÁRIO, responde solidariamente por todos os pagamentos descritos neste contrato bem como, não só até o final de seu prazo, como mesmo depois, até a efetiva entrega das chaves ao LOCADOR e termo de vistoria do imóvel.<br>
        CLÁUSULA DÉCIMA QUARTA: È facultado ao LOCADOR vistoriar, por si ou seus procuradores, sempre que achar conveniente, para a certeza do cumprimento das obrigações assumidas neste contrato.<br>
        CLÁUSULA DÉCIMA QUINTA: A infração de qualquer das cláusulas do presente contrato, sujeita o infrator à multa de duas vezes o valor do aluguel, tomando-se por base, o último aluguel vencido.<br>
        CLÁUSULA DÉCIMA SEXTA: As partes contratantes obrigam-se por si, herdeiros e/ou sucessores, elegendo o Foro da Cidade do (colocar o fórum do município), para a propositura de qualquer ação.
        E, por assim estarem justos e contratados, mandaram extrair o presente instrumento em três (03) vias, para um só efeito, assinando-as, juntamente com as testemunhas, a tudo presentes.
        </p><br>

            <span style=margin-left:70px> 42f43f5704ed34b7ae11bb3884d05b5e </span> <span style=margin-left:50px> 56680968d510222ae27faf3d4f0dfd22 </span><br>
                    <span style=margin-left:180px>Cliente</span> <span style=margin-left:230px>Locador</span><br><br>"
    ); }

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"contrato.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);


?>