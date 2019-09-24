@extends('dashboard');
@section('section')
    

<section>
    <header class=" col-9  retangle d-flex flex-row justify-content-start align-items-center">
        <h1 class=" retangle_header ml-2">
            CLIENTES
        </h1>
    </header>

<section class="retangle_conteudo col-9  mt-1">
                
                <!-- Formulario unificado de cadastro 
                     aqui você podera cadastra dados de pessoas juritica e fisica-->
            
                <div  class="border p-5 mt-3">
                   
                    <header class="d-flex flex-row justify-content-between">
                        <div>
                            <h3 class="bg-danger ">
                                <h6 class="titulo_fisica_juridica ">
                                    Pessoa Fisica ou Juridica?
                                </h6>
            
                                <div class="d-flex  flex-row justify-content-start align-items-center border-0" id="myTab">
                                    <div id="fisica-tab"
                                        class=" form-check form-check-inline d-flex flex-row justify-content-start align-items-center">
            
                                        <input class="mb-2" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                            value="option1">
                                        <label class="" for="inlineRadio1"> Fisica</label>
                                    </div>
                                    <div id='juritica-tab'
                                        class="form-check form-check-inline d-flex flex-row justify-content-start align-items-center">
            
                                        <input class="mb-2" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                            value="option2">
                                        <label class="" for="inlineRadio2">Juridica</label>
                                    </div>
                                </div>
            
            
                            </h3>
                        </div>
                       
                       
            
                    </header>
                    <div class="" id="Fisica">
                        <form action="{{ 
                            route('strore_cliente')
                        }}" method="POST">
                         @csrf
                         <div class="batao_submit d-flex flex-row justify-content-end align-itmes-start ">
                                <button type="button" class="btn bg-white text-dark " name="cancela">Cancela</button>
                                <button type="" class="btn submit" id='#submit' name='fisica' value="fisica">Salva</button>
                        </div>
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">DADOS PESSOAIS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#perfil" role="tab"
                                    aria-controls="profile" aria-selected="false">DADOS COMPLEMENTARES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contato" role="tab"
                                    aria-controls="contact" aria-selected="false">DOCUMENTO</a>
                            </li>
                        </ul>
            
                        <!-- CAMPOS DE PESSOAS FISICA -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table>
                                    <tr>
                                        <td colspan="4">
                                            <div class="form-group col-12">
                                                <label for="inputEmail4">Nome</label>
                                                <input type="text" name="nome_f" class="form-control" id="inputnomel4" placeholder="Nome">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-control  border-0">
                                                <label for="inputEmail4">Telefone</label>
                                                <select class=" form-control custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref" name='ddd_f'>
                                                    <option selected>Escolher...</option>
                                                    <option value="1">Um</option>
                                                    <option value="2">Dois</option>
                                                    <option value="3">Três</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
            
                                            <div class="  d-flex flex-row justify-content-between align-items-end">
                                                <div class="form-group col-md-6">
            
                                                    <input name="telefone_f" type="tel" class="form-control" id="inputEmail4" placeholder="Telefone">
                                                </div>
            
                                                <div class="form-group col-md-4">
            
                                                    <input name="Operadora_f" type="text" class="form-control" id="inputEmail4"
                                                        placeholder="Operadora">
                                                </div>
                                                <div class="form-group col-2">
                                                    <a href="">
                                                        <svg height="20px" style="fill:#5C5C5C" viewBox="-40 0 427 427.00131"
                                                            width="20px" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" />
                                                            <path
                                                                d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-control border-0 ">
                                                <label for="inputEmail4">Email</label>
                                                <select name='f_email' class=" form-control custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Escolher...</option>
                                                    <option value="1">Um</option>
                                                    <option value="2">Dois</option>
                                                    <option value="3">Três</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="  d-flex flex-row justify-content-between align-items-end">
                                                <div class="form-group col-md-8">
            
                                                    <input name="email_f" type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                </div>
                                                <div class="form-group col-2">
                                                    <a href="">
                                                        <svg height="20px" style="fill:#5C5C5C" viewBox="-40 0 427 427.00131"
                                                            width="20px" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" />
                                                            <path
                                                                d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-control border-0 ">
                                                <label for="inputEmail4">Endereço*</label>
                                                <select name="f_endereco" class=" form-control custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Escolher...</option>
                                                    <option value="1">Um</option>
                                                    <option value="2">Dois</option>
                                                    <option value="3">Três</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div class="  d-flex flex-row justify-content-between align-items-end">
                                                <div class="form-group col-md-8">
            
                                                    <input type="text" name='cep_f' class="form-control" id="inputEmail4" placeholder="Digite o CEP do cliente">
                                                </div>
                                                <div class="form-group col-2">
                                                    <a href="">
                                                        <svg height="20px" style="fill:#5C5C5C" viewBox="-40 0 427 427.00131"
                                                            width="20px" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" />
                                                            <path
                                                                d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="" colspan="2">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <div class="form-group col-8">
            
                                                    <input name="rua_f" type="text" class="form-control" id="inputAddress2"
                                                        placeholder="Digite sua rua ">
                                                </div>
            
            
                                                <div class="form-group col-4">
            
                                                    <input name='numero_f' type="text" class="form-control" id="inputAddress2"
                                                        placeholder="Numero ">
                                                </div>
            
                                            </div>
            
            
            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
            
                                                <div class="form-group col-8 ">
            
                                                    <input name='bairro_f' type="text" class="form-control" id="inputAddress2"
                                                        placeholder="Digite seu bairro ">
                                                </div>
            
                                                <div class="form-group col-4">
            
                                                    <input name="complemnto_f" type="text" class="form-control" id="inputAddress2"
                                                        placeholder="Complemento">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
            
                                                <div class="form-group col-8 ">
            
                                                    <input name="cidade_f" type="text" class="form-control" id="inputAddress2"
                                                        placeholder="Digite sua Cidade ">
                                                </div>
            
                                                <div class="form-group col-4">
            
                                                    <input name="estado_f" type="text" class="form-control" id="inputAddress2"
                                                        placeholder="Digite seu estados ">
                                                </div>
                                        </td>
            
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="form-group col-12">
            
                                                <input name='pais_f' type="text" class="form-control" id="inputAddress2"
                                                    placeholder="Qual seu pais? ">
                                            </div>
            
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="perfil" role="tabpanel" aria-labelledby="profile-tab">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="form-control border-0 ">
                                                <label for="inputEmail4">Nascimentos</label>
                                                <select name="dia_f" class=" form-control custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Dia</option>
                                                    <option value="1">Um</option>
                                                    <option value="2">Dois</option>
                                                    <option value="3">Três</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-control border-0 ">
                                                <label for="inputEmail4"></label>
                                                <select name="mes_f" class=" form-control custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Mês</option>
                                                    <option value="1">Um</option>
                                                    <option value="2">Dois</option>
                                                    <option value="3">Três</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-control border-0 ">
                                                <label for="inputEmail4"></label>
                                                <select name="ano_f" class=" form-control custom-select my-1 mr-sm-2"
                                                    id="inlineFormCustomSelectPref">
                                                    <option selected>Ano</option>
                                                    <option value="1">Um</option>
                                                    <option value="2">Dois</option>
                                                    <option value="3">Três</option>
                                                </select>
                                            </div>
                                        </td>
            
            
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="d-flex  col-12 flex-row">
                                            <div class="form-group col-10 ">
                                                <label for="formGroupExampleInput">Empresa</label>
                                                <input name='empresa_f' type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Qual empresa trabalha?">
                                            </div>
            
                                            <div class="form-group col-10">
                                                <label for="formGroupExampleInput">Profissão</label>
                                                <input name="profissao_f" type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Qual a profisão?
Profisão
Qual empresa trabalha?">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="d-flex  col-12 flex-row">
                                            <div class="form-group col-10 ">
                                                <label for="formGroupExampleInput">Estado civil</label>
                                                <input name="civil_f" type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Qual o estado civil?">
                                            </div>
            
                                            <div class="form-group col-10">
                                                <label for="formGroupExampleInput">Tratamento</label>
                                            <select name="tratamento_f" class=" form-control custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                                <option selected>Título social</option>
                                                <option value="1">Um</option>
                                                <option value="2">Dois</option>
                                                <option value="3">Três</option>
                                            </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="d-flex  col-12 flex-row justify-content-between align-items-end">
                                            <div class="form-group col-10 ">
                                                <label for="formGroupExampleInput">Filiação</label>
                                                <input name="nome_pai" type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Nome do pai">
                                            </div>
            
                                            <div class="form-group col-10 ">
            
                                                <input name='nome_mae' type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Nome da mãe">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="d-flex  col-12 flex-row">
                                            <div class="form-group col-10 ">
                                                <label for="formGroupExampleInput">Naturalidade</label>
                                                <input name="naturalidade" type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Qual a cidade natal?">
                                            </div>
            
                                            <div class="form-group col-10">
                                                <label for="formGroupExampleInput">Nacionalidade</label>
                                                <input name="nacionalidade" type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Qual a pais natal?">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="contact-tab">
                                <table>
                                    <tr class="">
                                        <td colspan="3" class="d-flex  col-12 flex-row">
                                            <div class="form-group col-10 ">
                                                <label for="formGroupExampleInput">RG</label>
                                                <input name='rg_f' type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Digite o RG">
                                            </div>
            
                                            <div class="form-group col-10">
                                                <label for="formGroupExampleInput">CPF</label>
                                                <input name="cpf_f" type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Digite o CPF">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="d-flex  col-12 flex-row">
                                            <div class="form-group col-10 ">
                                                <label for="formGroupExampleInput">CNH</label>
                                                <input name="cnh_f" type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Número/categoria/vencimento">
                                            </div>
            
                                            <div class="form-group col-10">
                                                <label for="formGroupExampleInput">CTPS</label>
                                                <input name="ctps_f" type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Número/série/emissão/UF">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="d-flex  col-12 flex-row justify-content-between align-items-end">
                                            <div class="form-group col-10 ">
                                                <label for="formGroupExampleInput">PIS</label>
                                                <input name='pis_f' type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Número">
                                            </div>
                                            <div class="form-group col-10 ">
                                                <label for="formGroupExampleInput">Titulo de eleito</label>
                                                <input name='titulo_f' type="text" class="form-control" id="formGroupExampleInput" placeholder="Número/zona/sessão">
                                            </div>
                                           
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="d-flex  col-12 flex-row">
                                           
            
                                            <div class="form-group col-10">
                                                <label for="formGroupExampleInput">Passaporte</label>
                                                <input name='passaporte_f' type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Número/tipo/emissor/autoridade">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
            
                        </div>
                        </form>
                    </div>
                    
                    <!-- CAMPOS DE PESSOAIS JURITICAS -->
                    <div id="Juridica" class="d-none">
                        <form action="{{ 
                            route('strore_cliente')
                        }}" method="POST">
                                <div class="batao_submit d-flex flex-row justify-content-end align-itmes-start ">
                                        <button type="button" class="btn bg-white text-dark " name="cancela">Cancela</button>
                                        <button type="" class="btn submit" id='#submit' name='juridica' value="juridica">Salva</button>
                                </div>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                    aria-controls="nav-home" aria-selected="true">DADOS PESSOAIS</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                    aria-controls="nav-profile" aria-selected="false">DADOS COMPLEMENTARES</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                                    aria-controls="nav-contact" aria-selected="false">DOCUMENTO</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="">
                                    <tr class="">
                                        <td colspan="4" class=" col-12  ">
                                            <div class="d-flex flex-row">
                                                <div class="form-group col-6 ">
                                                    <label for="formGroupExampleInput">Empresa*</label>
                                                    <input name="empresa_j" type="text" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Digite o nome empresarial">
                                                </div>
            
                                                <div class="form-group col-6">
                                                    <label for="formGroupExampleInput">Nome fantasia</label>
                                                    <input name="fantasia" type="text" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Digite o nome fantasia">
                                                </div>
                                            </div>
            
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="col-4">
                                            <div class="form-group  ">
            
                                                <div class="form-control border-0 ">
                                                    <label for="formGroupExampleInput">Telefone*</label>
                                                    <select name="ddd_j" class=" form-control custom-select my-1 mr-sm-2"
                                                        id="inlineFormCustomSelectPref">
                                                        <option selected>Escolher...</option>
                                                        <option value="1">Um</option>
                                                        <option value="2">Dois</option>
                                                        <option value="3">Três</option>
                                                    </select>
                                                    <span>
                                                        Adicionar telefone
                                                    </span>
                                                </div>
                                            </div>
            
                                        </td>
            
                                        <td class="" colspan="3">
                                            <div class="d-flex flex-row justify-content-between align-items-end">
                                                <div class="form-group col-5 ">
            
                                                    <input type="text" name='telefone_j' class="form-control" id="formGroupExampleInput"
                                                        placeholder="Digite o telefone">
                                                </div>
            
                                                <div class="form-group col-5 ">
            
                                                    <input name='Operadora_j' type="text" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Operadora">
                                                </div>
            
                                                <div class="form-group col-2">
                                                    <a href="">
                                                        <svg height="20px" style="fill:#5C5C5C" viewBox="-40 0 427 427.00131"
                                                            width="20px" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" />
                                                            <path
                                                                d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
            
                                        </td>
                                    </tr>
                                    <tr class="">
            
                                        <td class="col-1">
                                            <div class="form-group  ">
            
                                                <div class="form-control border-0 ">
                                                    <label for="formGroupExampleInput">Email*</label>
                                                    <select name="email_j" class=" form-control custom-select my-1 mr-sm-2"
                                                        id="inlineFormCustomSelectPref">
                                                        <option selected>Escolher...</option>
                                                        <option value="1">Um</option>
                                                        <option value="2">Dois</option>
                                                        <option value="3">Três</option>
                                                    </select>
                                                    <span>
                                                        Adicionar Email
                                                    </span>
                                                </div>
                                            </div>
            
                                        </td>
            
                                        <td>
            
                                            <div class="d-flex flex-row justify-content-between align-items-end">
                                                <div class="form-group col-10">
            
                                                    <input name="email_cli" type="text" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Digite o Email do cliente ">
                                                </div>
            
            
            
                                                <div class="form-group col-2">
                                                    <a href="">
                                                        <svg height="20px" style="fill:#5C5C5C" viewBox="-40 0 427 427.00131"
                                                            width="20px" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" />
                                                            <path
                                                                d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
            
                                        </td>
                                    </tr>
            
                                    <tr class="">
                                        <td class="col-1">
                                            <div class="form-group  ">
            
                                                <div class="form-control border-0 ">
                                                    <label for="formGroupExampleInput">Endereço*</label>
                                                    <select name='_endereco' class=" form-control custom-select my-1 mr-sm-2"
                                                        id="inlineFormCustomSelectPref">
                                                        <option selected>Escolher...</option>
                                                        <option value="1">Um</option>
                                                        <option value="2">Dois</option>
                                                        <option value="3">Três</option>
                                                    </select>
                                                </div>
                                            </div>
            
                                        </td>
            
                                        <td class=" ">
                                            <div class="d-flex flex-row justify-content-between align-items-end">
                                                <div class="form-group col-10">
            
                                                    <input type="text" name='cep_j' class="form-control" id="formGroupExampleInput"
                                                        placeholder="Digite o CEP do cliente ">
                                                </div>
            
            
            
                                                <div class="form-group col-2">
                                                    <a href="">
                                                        <svg height="20px" style="fill:#5C5C5C" viewBox="-40 0 427 427.00131"
                                                            width="20px" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                            <path
                                                                d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0" />
                                                            <path
                                                                d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
            
                                        </td>
                                    </tr>
                                    <tr class=" ">
                                        <td colspan="4">
                                            <div class="d-flex flex-row justify-content-aroud align-items-center">
                                                <div class="form-group col-8 ">
            
                                                    <input type="text" name='rua_j' class="form-control col-12" id="formGroupExampleInput"
                                                        placeholder="Digite a Rua">
                                                </div>
            
                                                <div class="form-group col-4">
            
                                                    <input type="text" name='numero_j' class="form-control" id="formGroupExampleInput"
                                                        placeholder="Número">
                                                </div>
                                            </div>
            
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="">
                                            <div class="d-flex flex-row justify-content-aroud align-items-end">
                                                <div class="form-group col-6 ">
            
                                                    <input type="text" name="bairro_j" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Digite o bairro">
                                                </div>
            
                                                <div class="form-group col-6">
            
                                                    <input type="text" name="complemento_j" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Complemento">
                                                </div>
                                            </div>
            
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3">
                                            <div class="d-flex flex-row justify-content-aroud align-items-end">
                                                <div class="form-group col-6 ">
            
                                                    <input name='cidade_j' type="text" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Digite a cidade">
                                                </div>
            
                                                <div class="form-group col-6">
            
                                                    <input type="text" name="estado_j" class="form-control" id="formGroupExampleInput"
                                                        placeholder="Digite o estado">
                                                </div>
                                            </div>
            
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="col-12 ">
            
                                            <div class="form-group ">
            
                                                <input type="text" class="form-control" name='pais_j' id="formGroupExampleInput"
                                                    placeholder="Qual o país?">
                                            </div>
                                            <span>
                                                Adicionar endereço
                                            </span>
            
                                        </td>
                                    </tr>
                                </table>
            
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <div class="form-group  ">
                                                <label for="formGroupExampleInput">Representante</label>
                                                <input type="text" class="form-control" name='representante
                                                ' id="formGroupExampleInput"
                                                    placeholder="Digite o nome do representante legal?">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group  ">
                                                <label for="formGroupExampleInput">Cargo</label>
                                                <input name='cargo' type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Qual o cargo na empresa?">
                                            </div>
                                        </td>
            
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table">
                                    <tr>
                                        <td colspan="2">
                                            <div class="form-group  ">
                                                <label for="formGroupExampleInput">CNPJ</label>
                                                <input type="text" name='cnpj' class="form-control" id="formGroupExampleInput"
                                                    placeholder="Digite o CNPJ?">
            
                                            </div>
                                        </td>
            
                                    </tr>
                                    <tr>
                                        <td>
            
                                            <div class="form-group  ">
                                                <label for="formGroupExampleInput">Inscrição Estadual</label>
                                                <input name='inscricao_estadual' type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Digite a inscrição estadual?">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group  ">
                                                <label for="formGroupExampleInput">Inscrição Municipal</label>
                                                <input type="text" name="inscricao_municipal" class="form-control" id="formGroupExampleInput"
                                                    placeholder="Digite a inscrição municipa?">
                                            </div>
            
            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
            
                                            <span>
                                                Simples Nacional
                                            </span>
                                            <div class="d-flex border flex-row justify-content-start align-items-center"></div>
                                            <div class="form-check form-check-inline">
                                                <input class=" mb-2" type="radio" name="simples_nacional" id="inlineRadio1"
                                                    value="sim">
                                                <label class="" for="inlineRadio1">Sim</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="mb-2" type="radio" name="simples_nacional" id="inlineRadio2"
                                                    value="não">
                                                <label class="" for="inlineRadio2">Não</label>
                                            </div>
                            </div>
                            </td>
            
                            </tr>
                            </table>
                        </div>
                    </div>
            
                    </div>
            
                </form>
            
                </div>
            </section>
@endsection