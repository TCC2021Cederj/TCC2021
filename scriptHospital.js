if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

function carregaSelect(){
	if(document.getElementById('radioInternadoSim').checked == true){
		document.getElementById('selectLeitos').style.visibility = "visible";
	}
	else{
		document.getElementById('selectLeitos').style.visibility = "hidden";
	}
	
}


function enviarFormulario(){
	var formulario = document.getElementById('formulario');
	var nomePaciente = document.getElementById('nomePaciente');
	var cpfPaciente = document.getElementById('cpfPaciente');
	var idadePaciente = document.getElementById('idadePaciente');
	var crmMedicoResponsavel = document.getElementById('crmMedicoResponsavel');
	
	if(nomePaciente.value == ""){
		alert('Digite o nome do paciente');
	}
	else{
		if(cpfPaciente.value == ""){
			alert('Digite o CPF do paciente');
		}
	
		else{
			if(idadePaciente.value == ""){
				alert('Digite a idade do paciente');
			}
	
			else{
				if(crmMedicoResponsavel.value == ""){
				alert('Digite o CRM do médico responsável');
				}
		
				else{
					formulario.submit();
				}
			}
		}
	}
}

var enviado = false;

function removePaciente(valor){
	if(enviado)
		return;
	enviado = true;/*Serve pra evitar o erro de enviar o mesmo formulário mais de uma vez em uma clicada*/
	var formulario = document.getElementById('formRemovePaciente');
	var send = document.createElement('INPUT');
	send.name = 'removeLeito';
	send.type = 'hidden';
	send.value = valor;
	formulario.append(send);
	formulario.submit();
}

function removeCadastroPaciente(valor){
	var formulario = document.getElementById('formCadastroPaciente');
	var send = document.createElement('INPUT');
	send.name = 'deletaCadastroPaciente';
	send.type = 'hidden';
	send.value = valor;
	formulario.append(send);
	formulario.submit();
}

function voltaCadastroPaciente(valor){
	var formulario = document.getElementById('formCadastroPaciente');
	var send = document.createElement('INPUT');
	send.name = 'voltaCadastroPaciente';
	send.type = 'hidden';
	send.value = valor;
	formulario.append(send);
	formulario.submit();
}

function enviarReceituario(){
	document.getElementById('formReceituario').submit();
}

function criarReceituario(){
	window.location.href = "http://localhost/teste/Receituario.php";
}


function imprime (text){
    text-document;
    print(text);
}
 
 
 function removeReceituarioPaciente(valor){
	var formulario = document.getElementById('formReceituario');
	var send = document.createElement('INPUT');
	send.name = 'removeReceituario';
	send.type = 'hidden';
	send.value = valor;
	formulario.append(send);
	formulario.submit();
 }
 
 function enviarCadMedico(){
	 document.getElementById('formAdministracao').submit();
 }
 
 
 function mostraMedico(){
	document.getElementById('zoom1').innerHTML = '<label class="titulo">'+
															'Cadastro de médicos no sistema'+
														'</label>'+
														'<br>'+
														'<br>'+
														'<br>'+
														'Nome do médico:<input type="text" name="nomeMedico" style="margin-left:20px;">'+
														'<br>'+
														'<br>'+
														'CRM:<input type="text" name="crmMedico" style="margin-left:104px;">'+
														'<br>'+
														'<br>'+
														'Senha:<input type="text" name="senhaMedico" style="margin-left:94px;">'+
														'<br>'+
														'<br>'+
														'<a href="ListaMedicos.php">'+
															'<button type="button" value="">Médicos cadastrados no sistema</button>'+
														'</a>'
														
 }
 
 function mostraAdm(){
	document.getElementById('zoom1').innerHTML = '<label class="titulo">'+
															'Cadastro de administradores no sistema'+
														'</label>'+
														'<br>'+
														'<br>'+
														'<br>'+
														'Nome do administrador:<input type="text" name="nomeAdm" style="margin-left:20px;">'+
														'<br>'+
														'<br>'+
														'Senha:<input type="text" name="senhaAdm" style="margin-left:138px;">'+
														'<br>'+
														'<br>'+
														'<a href="ListaAdm.php">'+
															'<button type="button" value="">Administradores cadastrados no sistema</button>'+
														'</a>';
														
 }
 
function enviaInativaMed(valor){
	var formulario = document.getElementById('ativaInativa');
	var send = document.createElement('INPUT');
	send.name = 'inativaMed';
	send.type = 'hidden';
	send.value = valor;
	formulario.append(send);
	formulario.submit();
}

function enviaAtivaMed(valor){
	var formulario = document.getElementById('ativaInativa');
	var send = document.createElement('INPUT');
	send.name = 'ativaMed';
	send.type = 'hidden';
	send.value = valor;
	formulario.append(send);
	formulario.submit();
}

function enviaInativaAdm(valor){
	var formulario = document.getElementById('ativaInativa2');
	var send = document.createElement('INPUT');
	send.type = 'hidden';
	send.name = 'inativaAdm';
	send.value = valor;
	formulario.append(send);
	formulario.submit();
}

function enviaAtivaAdm(valor){
	var formulario = document.getElementById('ativaInativa2');
	var send = document.createElement('INPUT');
	send.type = 'hidden';
	send.name = 'ativaAdm';
	send.value = valor;
	formulario.append(send);
	formulario.submit();
}