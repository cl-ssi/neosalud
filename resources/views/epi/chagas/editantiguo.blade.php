@extends('layouts.app')

@section('content')

<h3 class="mb-3">Editar sospecha 519034</h3>
<a href="https://i.saludiquique.cl/monitor/lab/suspect_cases/519034/notificationFormSmall"
    class="btn btn-outline-primary">Caso pdf</a>

<div class="form-row mt-3">

    <fieldset class="form-group col-8 col-md-3">
        <label for="for_run">Run</label>
        <input type="text" class="form-control" readonly="" disabled="" value="22601558">
    </fieldset>

    <fieldset class="form-group col-4 col-md-1">
        <label for="for_dv">DV</label>
        <input type="text" class="form-control" readonly="" disabled="" value="2">
    </fieldset>

    <fieldset class="form-group col-12 col-md-3">
        <label for="for_other_identification">Otra identificación</label>
        <input type="text" class="form-control" placeholder="Extranjeros sin run" readonly="" disabled="" value="">
    </fieldset>

    <fieldset class="form-group col-6 col-md-2">
        <label for="for_gender">Género</label>
        <select class="form-control" readonly="" disabled="">
            <option value="male">
                Masculino
            </option>
            <option value="female" selected="">
                Femenino
            </option>
            <option value="other">
                Otro
            </option>
            <option value="unknown">
                Desconocido
            </option>
        </select>
    </fieldset>

    <fieldset class="form-group col-6 col-md-3">
        <label for="for_birthday">Fecha Nacimiento</label>
        <input type="date" class="form-control" readonly="" disabled="" value="1963-07-07">
    </fieldset>

</div>

<div class="form-row">

    <fieldset class="form-group col-12 col-md-4">
        <label for="for_name">Nombres</label>
        <input type="text" class="form-control" readonly="" disabled="" value="ANA MARIA">
    </fieldset>

    <fieldset class="form-group col-6 col-md-4">
        <label for="for_fathers_family">Apellido Paterno</label>
        <input type="text" class="form-control" readonly="" disabled="" value="CHAPPE">
    </fieldset>

    <fieldset class="form-group col-6 col-md-4">
        <label for="for_mothers_family">Apellido Materno</label>
        <input type="text" class="form-control" readonly="" disabled="" value="VARGAS">
    </fieldset>

</div>

    <hr>

    
    <form method="POST" class="form-horizontal" action="https://i.saludiquique.cl/monitor/lab/suspect_cases/519034" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="ePpUXDtmXbqBgRArshkX8lA1jKEhi3aNac3ClRvp">        <input type="hidden" name="_method" value="PUT">
                    <div class="form-row">

                <div class="col-12 col-md-4 col-lg-3">
                    <div class="input-group mb-3">
                        <select name="laboratory_id_derive" form="derive_form" id="for_laboratory_id_derive" class="form-control selectpicker" required="">
                            <option value="">Selec. Laboratorio</option>
                            <optgroup label="Internos">
                                <option selected="" value="1">HETG</option>
                                <option value="2">UNAP</option>
                                <option value="3">BIOCLINIC</option>
                                <option disabled="" value="9">ARAUCO</option>
                                <option value="11">BIONET SSI</option>
                                <option value="13">Blue Lab</option>
                                <option value="14">Playa Brava</option>
                                <option value="20">Natura Cell Arica</option>
                                <option value="21">Labocenter</option>
                            </optgroup>

                            <optgroup label="Externos">
                                <option value="4">Lucio Córdova</option>
                                <option value="5">CENTRO ONCOLOGICO DEL NORTE</option>
                                <option value="6">ISP</option>
                                <option value="7">BARNAFI KRAUSE</option>
                                <option value="8">BIOCLINIC</option>
                                <option value="10">Lab. Univ. San Sebastian</option>
                                <option value="12">TAAG GENETICS</option>
                                <option value="15">UCN Antofagasta</option>
                                <option value="16">Hospital Calama</option>
                                <option value="17">Universidad de Atacama</option>
                                <option value="18">Hospital Antofagasta</option>
                                <option value="19">Hospital Arica</option>
                            </optgroup>
                        </select>

                        <input type="hidden" form="derive_form" name="casos_seleccionados[]" value="519034">

                        {{--
                        <div class="input-group-append">
                            <button type="submit" form="derive_form" class="btn btn-primary float-right" title="Derivar"><svg class="svg-inline--fa fa-reply-all fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="reply-all" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M136.309 189.836L312.313 37.851C327.72 24.546 352 35.348 352 56.015v82.763c129.182 10.231 224 52.212 224 183.548 0 61.441-39.582 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 38.512-123.162-3.922-169.482-112.59-182.015v84.175c0 20.701-24.3 31.453-39.687 18.164L136.309 226.164c-11.071-9.561-11.086-26.753 0-36.328zm-128 36.328L184.313 378.15C199.7 391.439 224 380.687 224 359.986v-15.818l-108.606-93.785A55.96 55.96 0 0 1 96 207.998a55.953 55.953 0 0 1 19.393-42.38L224 71.832V56.015c0-20.667-24.28-31.469-39.687-18.164L8.309 189.836c-11.086 9.575-11.071 26.767 0 36.328z"></path></svg><!-- <i class="fas fa-reply-all"></i> --> Derivar</button>
                        </div>
                        --}}

                    </div>
                </div>
                <input type="hidden" name="laboratory_id" id="for_laboratory_id" value="1">
            </div>
        
        <div class="form-row">
            <fieldset class="form-group col-5 col-md-3">
                <label for="for_sample_at">Fecha Muestra</label>
                <input type="datetime-local" class="form-control" id="for_sample_at" name="sample_at" value="2021-08-31T22:55:40">
            </fieldset>

            <fieldset class="form-group col-7 col-md-3">
                <label for="for_sample_type">Grupo de Pesquiza</label>
                <select name="sample_type" id="for_sample_type" class="form-control">
                    
                    <option value=""></option>
                    <option value="TÓRULAS NASOFARÍNGEAS" selected="">
                    Control Pre concepcional
                    </option>
                    <option value="ESPUTO">ESPUTO</option>
                    
                    <option value="ASPIRADO NASOFARÍNGEO">
                        ASPIRADO NASOFARÍNGEO
                    </option>
                    <option value="LAVADO BRONCOALVEOLAR">
                        LAVADO BRONCOALVEOLAR
                    </option>
                    <option value="ASPIRADO TRAQUEAL">
                        ASPIRADO TRAQUEAL
                    </option>
                    <option value="MUESTRA SANGUÍNEA">
                        MUESTRA SANGUÍNEA
                    </option>
                    <option value="TEJIDO PULMONAR">
                        TEJIDO PULMONAR
                    </option>
                    <option value="SALIVA">SALIVA</option>
                    <option value="OTRO">OTRO</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-12 col-md-3">
                <label for="for_establishment_id">Establecimiento *</label>
                <select name="establishment_id" id="for_establishment_id" class="form-control" required="">
                    <option value=""></option>
                                            <option value="51">Servicio de Salud Tarapacá</option>
                                            <option value="4005">Bluelab Laboratorio Biología Molecular</option>
                                            <option value="57">Centro Clínico Militar Iquique</option>
                                            <option value="111">CECOSF Cerro Esmeralda</option>
                                            <option value="112">CECOSF El Boro</option>
                                            <option value="3516">CECOSF La Tortuga</option>
                                            <option value="65">Centro de Atención Instituto de Seguridad del Trabajador Iquique</option>
                                            <option value="3597">Centro de Diálisis Alto Hospicio</option>
                                            <option value="3754">Centro de Diálisis Alto Medicen</option>
                                            <option value="76">Centro de Diálisis Corporación Paúl Harris</option>
                                            <option value="75">Centro de Diálisis Iquique</option>
                                            <option value="80">Centro de Diálisis la Tirana</option>
                                            <option value="74">Centro de Diálisis Medicen</option>
                                            <option value="92">CESFAM Camiña</option>
                                            <option value="83">CESFAM Cirujano Aguirre</option>
                                            <option value="85">CESFAM Cirujano Guzmán</option>
                                            <option value="84">CESFAM Cirujano Videla</option>
                                            <option value="93">CESFAM Colchane</option>
                                            <option value="91">CESFAM Dr. Amador Neghme Rodríguez</option>
                                            <option value="90">CESFAM Dr. Héctor Reyno</option>
                                            <option value="87">CESFAM Dr. Juan Márquez Vismarra</option>
                                            <option value="3735">CESFAM Dr. Yandry Añazco Montero</option>
                                            <option value="88">CESFAM Pedro Pulgar</option>
                                            <option value="86">CESFAM Pozo Almonte</option>
                                            <option value="89">CESFAM Sur Iquique</option>
                                            <option value="59">Centro de Salud Mutual CChC Iquique</option>
                                            <option value="4001">Centro de Salud Policia de Investigaciones</option>
                                            <option value="69">Centro de Salud Universidad Arturo Prat</option>
                                            <option value="4007">Lifemed Iquique</option>
                                            <option value="68">Centro Médico y Dental Megasalud Alto Hospicio</option>
                                            <option value="58">Centro Médico y Dental Megasalud Iquique</option>
                                            <option value="3719">Centro Odontológico Uno Salud Dental Iquique</option>
                                            <option value="63">Clínica Coposa Cía. Minera Doña Inés de Collahuasi</option>
                                            <option value="53">Clínica Dental Móvil </option>
                                            <option value="64">Clínica Establecimiento Penitenciario Alto Hospicio</option>
                                            <option value="55">Clínica Iquique</option>
                                            <option value="56">Clínica Tarapacá</option>
                                            <option value="73">Laboratorio Clinicum Automatizado Ltda.</option>
                                            <option value="108">COSAM Dr. Jorge Seguel Cáceres</option>
                                            <option value="110">COSAM Enrique París</option>
                                            <option value="109">COSAM Salvador Allende</option>
                                            <option value="4006">ESACHS</option>
                                            <option value="3899">Estadio Tierra de Campeones</option>
                                            <option value="54" selected="">Hospital Ernesto Torres Galdames</option>
                                            <option value="3420">Instituto Teletón Iquique</option>
                                            <option value="82">Laboratorio Clínico Arauco Ltda.</option>
                                            <option value="72">Laboratorio Clínico Automatizado Biogénesis</option>
                                            <option value="71">Laboratorio Clínico Automatizado Elmo</option>
                                            <option value="70">Laboratorio Clínico Bionet S.A. - Iquique</option>
                                            <option value="81">Laboratorio Clínico Costanera</option>
                                            <option value="3419">Laboratorio Clínico de Nueva Clínica Tarapacá</option>
                                            <option value="77">Laboratorio Clínico Iquilab</option>
                                            <option value="79">Laboratorio Clínico OASIS S.A.C.</option>
                                            <option value="78">Laboratorio Clínico Playa Brava</option>
                                            <option value="3627">Laboratorio Clínico Wallace SpA.</option>
                                            <option value="3553">Laboratorio Médico Bioclinic Ltda.</option>
                                            <option value="4002">Otros</option>
                                            <option value="3880">PAME Hospital de Iquique </option>
                                            <option value="62">Policlínico Carabineros de Iquique</option>
                                            <option value="3372">Policlínico Centro de Cumplimiento Penitenciario Iquique</option>
                                            <option value="3373">Policlínico de Atención Primaria del Centro de Detención Preventiva de Pozo Almonte</option>
                                            <option value="3757">Policlínico De La Compañía Minera Cerro Colorado S.A.</option>
                                            <option value="66">Policlínico del Trabajador AChS Iquique</option>
                                            <option value="61">Policlínico FACH de Iquique</option>
                                            <option value="60">Policlínico Naval de Iquique</option>
                                            <option value="102">Posta de Salud Rural Cancosa</option>
                                            <option value="106">Posta de Salud Rural Cariquima</option>
                                            <option value="103">Posta Rural Chanavayita</option>
                                            <option value="98">Posta de Salud Rural Chiapa</option>
                                            <option value="100">Posta de Salud Rural Enquelga</option>
                                            <option value="4000">Posta de Salud Rural Huara</option>
                                            <option value="105">Posta de Salud Rural La Huayca</option>
                                            <option value="97">Posta de Salud Rural La Tirana</option>
                                            <option value="96">Posta de Salud Rural Mamiña</option>
                                            <option value="107">Posta de Salud Rural Matilla</option>
                                            <option value="99">Posta de Salud Rural Moquella</option>
                                            <option value="3654">Posta de Salud Rural Pachica</option>
                                            <option value="94">Posta de Salud Rural Pisagua</option>
                                            <option value="104">Posta Rural San Marcos</option>
                                            <option value="101">Posta de Salud Rural Sibaya</option>
                                            <option value="95">Posta de Salud Rural Tarapacá</option>
                                            <option value="52">PRAIS (S.S. Iquique)</option>
                                            <option value="4008">Santillana Mar SPA</option>
                                            <option value="113">SAPU Cirujano Aguirre</option>
                                            <option value="115">SAPU Cirujano Guzmán</option>
                                            <option value="114">SAPU Cirujano Videla</option>
                                            <option value="119">SAPU El Boro</option>
                                            <option value="3281">SAPU Huara</option>
                                            <option value="117">SAPU Pedro Pulgar</option>
                                            <option value="116">SAPU Pozo Almonte</option>
                                            <option value="4009">SAR La Tortuga</option>
                                            <option value="118">SAR Sur de Iquique</option>
                                            <option value="4004">SEREMI DE SALUD</option>
                                            <option value="3836">Servicio Médico Legal Iquique</option>
                                            <option value="4003">SMA Servicios Medicos</option>
                                            <option value="3933">SUR Camiña</option>
                                            <option value="3930">SUR Cariquima</option>
                                            <option value="3928">SUR Chanavayita</option>
                                            <option value="3929">SUR Colchane</option>
                                            <option value="3932">SUR Pica</option>
                                            <option value="3931">SUR Tarapacá</option>
                                            <option value="67">Vacunatorio Sonrisa Infantil</option>
                                    </select>
            </fieldset>

            <fieldset class="form-group col-12 col-md-3">
                <label for="for_origin">Estab. Detalle (Opcional)</label>
                <select name="origin" id="for_origin" class="form-control">
                    <option value=""></option>
                                            <option value=".BAC MIGRANTES SSI">
                            .BAC MIGRANTES SSI
                        </option>
                                            <option value="2DO BAC TRANSPORTE LÍNEA 1">
                            2DO BAC TRANSPORTE LÍNEA 1
                        </option>
                                            <option value="3ERO BAC TRANSPORTE LÍNEA 1">
                            3ERO BAC TRANSPORTE LÍNEA 1
                        </option>
                                            <option value="Terminal Agropecuario">
                            AGRO
                        </option>
                                            <option value="AGRO HOSPICIO">
                            AGRO HOSPICIO
                        </option>
                                            <option value="BAC  campamento Renacer">
                            BAC  campamento Renacer
                        </option>
                                            <option value="BAC  comunidad terapeutica">
                            BAC  comunidad terapeutica
                        </option>
                                            <option value="BAC  DICREP">
                            BAC  DICREP
                        </option>
                                            <option value="BAC  Eleam huerto de paz">
                            BAC  Eleam huerto de paz
                        </option>
                                            <option value="BAC  Fonasa">
                            BAC  Fonasa
                        </option>
                                            <option value="BAC  JAT Obras Civiles">
                            BAC  JAT Obras Civiles
                        </option>
                                            <option value="BAC  JJVV Salitrera Victoria">
                            BAC  JJVV Salitrera Victoria
                        </option>
                                            <option value="BAC  MODULOS CENTRO PENITENCIARIO A.H">
                            BAC  MODULOS CENTRO PENITENCIARIO A.H
                        </option>
                                            <option value="BAC  Plaza Rancagua">
                            BAC  Plaza Rancagua
                        </option>
                                            <option value="BAC  Puerta a Puerta Hector Reyno">
                            BAC  Puerta a Puerta Hector Reyno
                        </option>
                                            <option value="BAC  UTA">
                            BAC  UTA
                        </option>
                                            <option value="BAC 2DA muestra Albergue Colegio Unap">
                            BAC 2DA muestra Albergue Colegio Unap
                        </option>
                                            <option value="BAC ACL Alto Hospicio">
                            BAC ACL Alto Hospicio
                        </option>
                                            <option value="BAC ACL Hormigones">
                            BAC ACL Hormigones
                        </option>
                                            <option value="BAC ACL Iquique">
                            BAC ACL Iquique
                        </option>
                                            <option value="BAC ACL obra cerro colorado">
                            BAC ACL obra cerro colorado
                        </option>
                                            <option value="BAC ACL obras luchando por un sueño">
                            BAC ACL obras luchando por un sueño
                        </option>
                                            <option value="BAC Aduana">
                            BAC Aduana
                        </option>
                                            <option value="BAC AGRO HOSPICIO">
                            BAC AGRO HOSPICIO
                        </option>
                                            <option value="BAC Agro La tortuga">
                            BAC Agro La tortuga
                        </option>
                                            <option value="BAC Agro Sur">
                            BAC Agro Sur
                        </option>
                                            <option value="BAC Aguas del Altiplano">
                            BAC Aguas del Altiplano
                        </option>
                                            <option value="Bac Albergue Escuela Centenario 2da MUESTRA">
                            Bac Albergue  Escuela Centenario2da MUESTRA
                        </option>
                                            <option value="BAC Albergue Colegio Unap">
                            BAC Albergue Colegio Unap
                        </option>
                                            <option value="Albergue Día">
                            BAC Albergue Día
                        </option>
                                            <option value="Bac Albergue Escuela Centenario">
                            Bac Albergue Escuela Centenario
                        </option>
                                            <option value="BAC Albergue Escuela Paula Jaraquemada">
                            BAC Albergue Escuela Paula Jaraquemada
                        </option>
                                            <option value="Bac Albergue Ex Estadio Cavancha">
                            Bac Albergue Ex Estadio Cavancha
                        </option>
                                            <option value="BAC Albergue Liceo 7">
                            BAC Albergue Liceo A7
                        </option>
                                            <option value="Bac Albergue Liceo Comercial">
                            Bac Albergue Liceo Comercial
                        </option>
                                            <option value="BAC Albergue UNAP">
                            BAC Albergue UNAP
                        </option>
                                            <option value="BAC alfredo Cruz">
                            BAC alfredo cruz
                        </option>
                                            <option value="BAC alrededor escuela croacia">
                            BAC alrededor escuela croacia
                        </option>
                                            <option value="BAC Altos de Playa Blanca">
                            BAC Altos de Playa Blanca
                        </option>
                                            <option value="Bac Altos del Dragón">
                            Bac Altos del Dragón
                        </option>
                                            <option value="BAC Altos del Pacífico">
                            BAC Altos del pacíficos
                        </option>
                                            <option value="BAC Atalaya">
                            BAC Atalaya
                        </option>
                                            <option value="BAC Barrio Emergencia">
                            BAC Barrio Emergencia
                        </option>
                                            <option value="BAC BOMBEROS">
                            BAC BOMBEROS
                        </option>
                                            <option value="BAC Cajta">
                            BAC Cajta
                        </option>
                                            <option value="BAC caleta Cavancha">
                            BAC caleta Cavancha
                        </option>
                                            <option value="BAC Caleta Cavancha">
                            BAC Caleta Cavancha
                        </option>
                                            <option value="BAC Caleta Los Verdes">
                            BAC Caleta Los Verdes
                        </option>
                                            <option value="BAC Caleta Riquelme">
                            BAC Caleta Riquelme
                        </option>
                                            <option value="BAC Campamento Canadena">
                            BAC Campamento Canadena
                        </option>
                                            <option value="BAC Campamento El Boro">
                            BAC Campamento El Boro
                        </option>
                                            <option value="BAC Campamento Ex Vertedero">
                            BAC Campamento Ex Vertedero
                        </option>
                                            <option value="BAC Campamento Gitano El Boro">
                            BAC Campamento Gitano El Boro
                        </option>
                                            <option value="BAC campamento la Pampa A.H">
                            BAC campamento la Pampa A.H
                        </option>
                                            <option value="BAC Campamento San Martin">
                            BAC Campamento San Martin
                        </option>
                                            <option value="BAC Campamento San Martin">
                            BAC Campamento San Martin
                        </option>
                                            <option value="BAC CARABINEROS">
                            BAC CARABINEROS
                        </option>
                                            <option value="BAC Carabineros 2">
                            BAC Carabineros 2
                        </option>
                                            <option value="BAC CARABINEROS 3">
                            BAC CARABINEROS 3
                        </option>
                                            <option value="BAC CARABINEROS 4">
                            BAC CARABINEROS 4
                        </option>
                                            <option value="BAC CASA DE ACOGIDA LILITH">
                            BAC CASA DE ACOGIDA LILITH
                        </option>
                                            <option value="BAC CAVANCHA SECTOR CASINO">
                            BAC CAVANCHA SECTOR CASINO
                        </option>
                                            <option value="BAC CCN">
                            BAC CCN
                        </option>
                                            <option value="BAC Centro de Diálisis Alto Hospicio">
                            BAC Centro de Diálisis Alto Hospicio
                        </option>
                                            <option value="BAC Centro RX Tamarugal">
                            BAC Centro RX Tamarugal
                        </option>
                                            <option value="Bac CGU hector Reyno">
                            Bac CGU hector reyno
                        </option>
                                            <option value="BAC Chanavayita">
                            BAC Chanavayita
                        </option>
                                            <option value="BAC CIP-CRC">
                            BAC CIP-CRC
                        </option>
                                            <option value="BAC Cobra">
                            BAC Cobra
                        </option>
                                            <option value="BAC Colegio Alturas">
                            BAC Colegio Alturas
                        </option>
                                            <option value="BAC colegio Centenario">
                            BAC colegio Centenario
                        </option>
                                            <option value="BAC colegio diocesano obispo labbe">
                            BAC colegio diocesano obispo labbe
                        </option>
                                            <option value="BAC Colegio Domingo Savio">
                            BAC Colegio Domingo Savio
                        </option>
                                            <option value="BAC Colegio Domingo Savio 2">
                            BAC Colegio Domingo Savio 2
                        </option>
                                            <option value="BAC COLEGIO DOMINGO SAVIO 3">
                            BAC COLEGIO DOMINGO SAVIO 3
                        </option>
                                            <option value="BAC COLEGIO HISPANO BRITANICO">
                            BAC COLEGIO HISPANO BRITANICO
                        </option>
                                            <option value="Bac colegio Huantajaya">
                            Bac colegio Huantajaya
                        </option>
                                            <option value="BAC COLEGIO KRONOS">
                            BAC COLEGIO KRONOS
                        </option>
                                            <option value="BAC COLEGIO LOS CÓNDORES 1">
                            BAC COLEGIO LOS CÓNDORES 1
                        </option>
                                            <option value="BAC COLEGIO MACAYA">
                            BAC COLEGIO MACAYA
                        </option>
                                            <option value="BAC COLEGIO MARISTA 1">
                            BAC COLEGIO MARISTA 1
                        </option>
                                            <option value="BAC COLEGIO MARISTA 2">
                            BAC COLEGIO MARISTA 2
                        </option>
                                            <option value="BAC COLEGIO NIRVARA">
                            BAC COLEGIO NIRVARA
                        </option>
                                            <option value="BAC Colegio San Antonio de Matilla">
                            BAC Colegio San Antonio de Matilla
                        </option>
                                            <option value="BAC COLEGIO SINAI">
                            BAC COLEGIO SINAI
                        </option>
                                            <option value="BAC COLEGIO WILLIAM TAYLOR">
                            BAC COLEGIO WILLIAM TAYLOR
                        </option>
                                            <option value="BAC Comedor Social">
                            BAC Comedor Social
                        </option>
                                            <option value="BAC comisaria de carabineros de alto hospicio">
                            BAC comisaria de carabineros de alto hospicio
                        </option>
                                            <option value="BAC Comité Buen vivir sin fronteras">
                            BAC Comité Buen vivir sin fronteras
                        </option>
                                            <option value="BAC compañia de bomberos Germania">
                            BAC compañia de bomberos Germania
                        </option>
                                            <option value="BAC Complejo Deportivo">
                            BAC Complejo Deportivo
                        </option>
                                            <option value="BAC Comunitario Pica">
                            BAC Comunitario Pica
                        </option>
                                            <option value="BAC Condominio 4 Reinas">
                            BAC Condominio 4 Reinas
                        </option>
                                            <option value="BAC Condominio Alborada">
                            BAC Condominio Alborada
                        </option>
                                            <option value="BAC Condominio Bahía Norte">
                            BAC Condominio Bahía Norte
                        </option>
                                            <option value="BAC CONDOMINIO BICENTENARIO">
                            BAC CONDOMINIO BICENTENARIO
                        </option>
                                            <option value="BAC CONDOMINIO BICENTENARIO 2">
                            BAC CONDOMINIO BICENTENARIO 2
                        </option>
                                            <option value="BAC Condominio Cariquima">
                            BAC condominio Cariquima
                        </option>
                                            <option value="BAC CONDOMINIO DOÑA ÁNGELA 1">
                            BAC CONDOMINIO DOÑA ÁNGELA 1
                        </option>
                                            <option value="BAC CONDOMINIO DOÑA OLGA">
                            BAC CONDOMINIO DOÑA OLGA
                        </option>
                                            <option value="BAC CONDOMINIO HUANTAJAYA">
                            BAC CONDOMINIO HUANTAJAYA
                        </option>
                                            <option value="BAC Condominio Mar del Pacífico">
                            BAC Condominio Mar del Pacífico
                        </option>
                                            <option value="BAC Condominio Monte Sol">
                            BAC Condominio Monte Sol
                        </option>
                                            <option value="BAC Condominio Montesol Et. B">
                            BAC Condominio Montesol Et. B
                        </option>
                                            <option value="BAC Condominio Montesol Etapa 3">
                            BAC Condominio Montesol Etapa 3
                        </option>
                                            <option value="BAC CONDOMINIO NUEVO HORIZONTE">
                            BAC CONDOMINIO NUEVO HORIZONTE
                        </option>
                                            <option value="BAC CONDOMINIO NUEVO HORIZONTE 2">
                            BAC CONDOMINIO NUEVO HORIZONTE 2
                        </option>
                                            <option value="BAC CONDOMINIO NUEVO HORIZONTE 3">
                            BAC CONDOMINIO NUEVO HORIZONTE 3
                        </option>
                                            <option value="BAC CONDOMINIO NUEVO HORIZONTE 4">
                            BAC CONDOMINIO NUEVO HORIZONTE 4
                        </option>
                                            <option value="BAC CONDOMINIO OASIS DEL ALTO MOLLE">
                            BAC CONDOMINIO OASIS DEL ALTO MOLLE
                        </option>
                                            <option value="BAC Condominio Oriente">
                            BAC Condominio Oriente
                        </option>
                                            <option value="BAC Condominio Pablo Neruda">
                            BAC Condominio Pablo Neruda
                        </option>
                                            <option value="BAC condominio pampa y mar alto hospicio">
                            BAC condominio pampa y mar alto hospicio
                        </option>
                                            <option value="BAC CONDOMINIO PORTAL NORTE 1">
                            BAC CONDOMINIO PORTAL NORTE 1
                        </option>
                                            <option value="BAC CONDOMINIO PORTAL SUR 1">
                            BAC CONDOMINIO PORTAL SUR 1
                        </option>
                                            <option value="BAC CONDOMINIO PORTAL SUR 2">
                            BAC CONDOMINIO PORTAL SUR 2
                        </option>
                                            <option value="BAC CONDOMINIO POZO DEL CARMEN 1">
                            BAC CONDOMINIO POZO DEL CARMEN 1
                        </option>
                                            <option value="BAC CONDOMINIO REINA DEL TAMARUGAL">
                            BAC CONDOMINIO REINA DEL TAMARUGAL
                        </option>
                                            <option value="BAC Condominio San Lorenzo IQQ">
                            BAC Condominio San Lorenzo IQQ
                        </option>
                                            <option value="BAC CONDOMINIO SANTA MARÍA">
                            BAC CONDOMINIO SANTA MARÍA
                        </option>
                                            <option value="BAC CONDOMINIO SANTA PAULA 1">
                            BAC CONDOMINIO SANTA PAULA 1
                        </option>
                                            <option value="BAC CONDOMINIO VIGIAS DEL MAR">
                            BAC CONDOMINIO VIGIAS DEL MAR
                        </option>
                                            <option value="BAC CONDOMINIO VISTA ALEGRE">
                            BAC CONDOMINIO VISTA ALEGRE
                        </option>
                                            <option value="BAC Condominio Vista del Dragon">
                            BAC Condominio Vista del Dragon
                        </option>
                                            <option value="BAC Condominio Vistamar">
                            BAC Condominio Vistamar
                        </option>
                                            <option value="BAC conservador bienes raices y archivero judicial">
                            BAC conservador bienes raices y archivero judicial
                        </option>
                                            <option value="BAC Constructora Mella">
                            BAC Constructora Mella
                        </option>
                                            <option value="BAC CONSTRUCTORA PEDRO MELLA">
                            BAC CONSTRUCTORA PEDRO MELLA
                        </option>
                                            <option value="BAC CONSTRUCTORA PEDRO MELLA 2">
                            BAC CONSTRUCTORA PEDRO MELLA 2
                        </option>
                                            <option value="BAC CONSTRUCTORA PEDRO MELLA 3">
                            BAC CONSTRUCTORA PEDRO MELLA 3
                        </option>
                                            <option value="BAC CONSTRUCTORA RÍO ELQUI">
                            BAC CONSTRUCTORA RÍO ELQUI
                        </option>
                                            <option value="BAC constructora Tarapaca">
                            BAC constructora Tarapaca
                        </option>
                                            <option value="BAC Construmarc Iquique">
                            BAC Construmarc Iquique
                        </option>
                                            <option value="BAC CONTACTO ESTRECHO DELTA">
                            BAC CONTACTO ESTRECHO DELTA
                        </option>
                                            <option value="BAC Contratistas Aguas del Altiplano">
                            BAC Contratistas Aguas del Altiplano
                        </option>
                                            <option value="BAC Corfo">
                            BAC Corfo
                        </option>
                                            <option value="BAC Corpesca">
                            BAC Corpesca
                        </option>
                                            <option value="BAC corporacion Fco Forgioni">
                            BAC corporacion Fco Forgioni
                        </option>
                                            <option value="BAC Corporación Maria Ayuda">
                            BAC Corporación Maria Ayuda
                        </option>
                                            <option value="BAC Cosam RESIDENCIA 2">
                            BAC Cosam RESIDENCIA 2
                        </option>
                                            <option value="BAC Cosam Residencia 3">
                            BAC Cosam Residencia 3
                        </option>
                                            <option value="BAC Cosam Residencia Protegida 1">
                            BAC Cosam Residencia Protegida 1
                        </option>
                                            <option value="BAC CTS Centro día Unap">
                            BAC CTS Centro día Unap
                        </option>
                                            <option value="BAC CTS Hospedería Hogar de Cristo">
                            BAC CTS Hospedería Hogar de Cristo
                        </option>
                                            <option value="BAC CTS Residencia">
                            BAC CTS Residencia
                        </option>
                                            <option value="BAC DGAC">
                            BAC DGAC
                        </option>
                                            <option value="BAC Dialisis Alto Hospicio">
                            BAC Dialisis Alto Hospicio
                        </option>
                                            <option value="BAC Diálisis Iquique">
                            BAC Diálisis Iquique
                        </option>
                                            <option value="BAC Diálisis La Tirana">
                            BAC Diálisis La Tirana
                        </option>
                                            <option value="BAC Diálisis Paul Harris">
                            BAC Diálisis Paul Harris
                        </option>
                                            <option value="BAC DIRECION REGIONAL ADUANA">
                            BAC DIRECION REGIONAL ADUANA
                        </option>
                                            <option value="BAC DISAL">
                            BAC DISAL
                        </option>
                                            <option value="BAc distribuidora libreria nene">
                            BAc distribuidora libreria nene
                        </option>
                                            <option value="BAC distribuidora libreria nene">
                            BAC distribuidora libreria nene
                        </option>
                                            <option value="BAC EDIFICIO CASA BLANCA">
                            BAC EDIFICIO CASA BLANCA
                        </option>
                                            <option value="BAC el Boro">
                            BAC el Boro
                        </option>
                                            <option value="BAC ELEAM LOS AÑOS DORADOS">
                            BAC ELAM Años dorados
                        </option>
                                            <option value="BAC ELEAM BELLO AMANECER">
                            Bac ELAM Bello Amanecer
                        </option>
                                            <option value="BAC Eleam Aguilas Blancas">
                            BAC Eleam Aguilas Blancas
                        </option>
                                            <option value="BAC Eleam Bello Horizonte">
                            BAC Eleam Bello Horizonte
                        </option>
                                            <option value="BAC ELEAM NURSE HOME">
                            BAC ELEAM NURSE HOME
                        </option>
                                            <option value="BAC ELEAM RENACER">
                            BAC ELEAM RENACER
                        </option>
                                            <option value="BAC ELEAM HOGAR SAN AGUSTIN">
                            BAC Eleam San agustin
                        </option>
                                            <option value="BAC ELEAM SAN VICENTE DE PAUL">
                            BAC ELEAM SN. VICENTE
                        </option>
                                            <option value="BAC EMBONOR">
                            BAC EMBONOR
                        </option>
                                            <option value="BAC EMPRESA ACL">
                            BAC EMPRESA ACL
                        </option>
                                            <option value="BAC EMPRESA ACL / OBRA">
                            BAC EMPRESA ACL / OBRA
                        </option>
                                            <option value="BAC EMPRESA ACL / OBRA 2">
                            BAC EMPRESA ACL / OBRA 2
                        </option>
                                            <option value="BAC EMPRESA ACL 2">
                            BAC EMPRESA ACL 2
                        </option>
                                            <option value="BAC EMPRESA CAMANCHACA">
                            BAC EMPRESA CAMANCHACA
                        </option>
                                            <option value="BAC EMPRESA CONSTRUCTORA JAVIER VAZQUEZ">
                            BAC EMPRESA CONSTRUCTORA JAVIER VAZQUEZ
                        </option>
                                            <option value="BAC empresa RVC">
                            BAC empresa RVC
                        </option>
                                            <option value="BAC empresa SACYR">
                            BAC empresa SACYR
                        </option>
                                            <option value="BAC empresa SAGIR">
                            BAC empresa SAGIR
                        </option>
                                            <option value="BAC CLUB SOCIAL Y CULTURAL EMPRESARIOS EL MORRO">
                            BAC EMPRESARIOS EL MORRO
                        </option>
                                            <option value="BAC ESCUELA ALGARROBOS">
                            BAC ESCUELA ALGARROBOS
                        </option>
                                            <option value="BAC Escuela de Caballería">
                            BAC Escuela de Caballería
                        </option>
                                            <option value="BAC Escuela de Lenguaje Ramon Henriquez">
                            BAC Escuela de Lenguaje Ramon Henriquez
                        </option>
                                            <option value="Bac Escuela España alrededores">
                            Bac Escuela España Alrededores
                        </option>
                                            <option value="BAC ESCUELA MONSERRAT">
                            BAC ESCUELA MONSERRAT
                        </option>
                                            <option value="BAC escuela North College">
                            BAC escuela North College
                        </option>
                                            <option value="Bac Escuela Patricio Lynch Alrededores">
                            Bac Escuela Patricio Lynch y alrededores
                        </option>
                                            <option value="Bac Escuela Thilda Portillo Alrededores">
                            Bac Escuela Thilda Portillo Alrededores
                        </option>
                                            <option value="BAC ESTACIONAMIENTO RESTAURANT MANGOS">
                            BAC ESTACIONAMIENTO RESTAURANT MANGOS
                        </option>
                                            <option value="BAC Estadio Tierra de Campeones">
                            BAC Estadio Tierra de Campeones
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 10">
                            BAC EXPLANADA GIMNASIO TECHADO 10
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 11">
                            BAC EXPLANADA GIMNASIO TECHADO 11
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 12">
                            BAC EXPLANADA GIMNASIO TECHADO 12
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 13">
                            BAC EXPLANADA GIMNASIO TECHADO 13
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 14">
                            BAC EXPLANADA GIMNASIO TECHADO 14
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 15">
                            BAC EXPLANADA GIMNASIO TECHADO 15
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 16">
                            BAC EXPLANADA GIMNASIO TECHADO 16
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 17">
                            BAC EXPLANADA GIMNASIO TECHADO 17
                        </option>
                                            <option value="BAC Explanada Gimnasio Techado 2">
                            BAC Explanada Gimnasio Techado 2
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 3">
                            BAC EXPLANADA GIMNASIO TECHADO 3
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 4">
                            BAC EXPLANADA GIMNASIO TECHADO 4
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 5">
                            BAC EXPLANADA GIMNASIO TECHADO 5
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 6">
                            BAC EXPLANADA GIMNASIO TECHADO 6
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 7">
                            BAC EXPLANADA GIMNASIO TECHADO 7
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 8">
                            BAC EXPLANADA GIMNASIO TECHADO 8
                        </option>
                                            <option value="BAC EXPLANADA GIMNASIO TECHADO 9">
                            BAC EXPLANADA GIMNASIO TECHADO 9
                        </option>
                                            <option value="BAC FACH">
                            BAC FACH
                        </option>
                                            <option value="Bac Feria Agro 2 La Pampa">
                            Bac Feria Agro 2 La Pampa
                        </option>
                                            <option value="BAC FERIA ITINERANTE">
                            BAC FERIA ITINERANTE
                        </option>
                                            <option value="BAC FERIA QUEBRADILLA">
                            BAC FERIA QUEBRADILLA
                        </option>
                                            <option value="BAC FERIA QUEBRADILLA 2">
                            BAC FERIA QUEBRADILLA 2
                        </option>
                                            <option value="BAC FERIA QUEBRADILLA 3">
                            BAC FERIA QUEBRADILLA 3
                        </option>
                                            <option value="BAC FERIA QUEBRADILLA 4">
                            BAC FERIA QUEBRADILLA 4
                        </option>
                                            <option value="BAC FERIA QUEBRADILLA 5">
                            BAC FERIA QUEBRADILLA 5
                        </option>
                                            <option value="BAC FERIA QUEBRADILLA 6">
                            BAC FERIA QUEBRADILLA 6
                        </option>
                                            <option value="BAC FERIA QUEBRADILLA 7">
                            BAC FERIA QUEBRADILLA 7
                        </option>
                                            <option value="BAC FERIA QUEBRADILLA 8">
                            BAC FERIA QUEBRADILLA 8
                        </option>
                                            <option value="BAC FERIA QUEBRADILLA 9">
                            BAC FERIA QUEBRADILLA 9
                        </option>
                                            <option value="BAC Feria tamarugal">
                            BAC Feria Tamarugal
                        </option>
                                            <option value="BAC Feria Tamarugal">
                            BAC Feria Tamarugal
                        </option>
                                            <option value="BAC FERRETERIA LONZA">
                            BAC FERRETERIA LONZA
                        </option>
                                            <option value="BAC FIJO ESTADIO MUNICIPAL">
                            BAC FIJO ESTADIO MUNICIPAL
                        </option>
                                            <option value="BAC FOMENTO PRODUCTIVO">
                            BAC FOMENTO PRODUCTIVO
                        </option>
                                            <option value="BAC Fonasa">
                            BAC Fonasa
                        </option>
                                            <option value="BAC FRONTIS SUPERMERCADO JUMBO">
                            BAC FRONTIS SUPERMERCADO JUMBO
                        </option>
                                            <option value="BAC FUERZA AEREA SEREMI">
                            BAC FUERZA AEREA SEREMI
                        </option>
                                            <option value="BAC FUNCIONARIO BORO">
                            BAC FUNCIONARIO BORO
                        </option>
                                            <option value="BAC FUNCIONARIO CCR">
                            BAC FUNCIONARIO CCR
                        </option>
                                            <option value="BAC FUNCIONARIO DEPSA">
                            BAC FUNCIONARIO DEPSA
                        </option>
                                            <option value="BAC FUNCIONARIO GENDARMERIA CENTRO PENITENCIARIO A.H">
                            BAC FUNCIONARIO GENDARMERIA CENTRO PENITENCIARIO A.H
                        </option>
                                            <option value="BAC FUNCIONARIO PPM">
                            BAC FUNCIONARIO PPM
                        </option>
                                            <option value="BAC FUNCIONARIO REGISTRO CIVIL">
                            BAC FUNCIONARIO REGISTRO CIVIL
                        </option>
                                            <option value="BAC FUNCIONARIO SALUD - SIMÓN BOLIVAR">
                            BAC FUNCIONARIO SALUD - SIMÓN BOLIVAR
                        </option>
                                            <option value="BAC FUNCIONARIO SAPU PPM">
                            BAC FUNCIONARIO SAPU PPM
                        </option>
                                            <option value="BAC FUNCIONARIO TORTUGA">
                            BAC FUNCIONARIO TORTUGA
                        </option>
                                            <option value="BAC FUNCIONARIO YAM">
                            BAC FUNCIONARIO YAM
                        </option>
                                            <option value="Bac Funcionarios Aguirre">
                            Bac Funcionarios Aguirre
                        </option>
                                            <option value="BAC FUNCIONARIOS ESTADIO MUNICIPAL">
                            BAC FUNCIONARIOS ESTADIO MUNICIPAL
                        </option>
                                            <option value="Bac Funcionarios Guzman">
                            Bac Funcionarios Guzman
                        </option>
                                            <option value="Bac Funcionarios Hector Reyno">
                            Bac Funcionarios Hector Reyno
                        </option>
                                            <option value="BAC Funcionarios HETG">
                            BAC Funcionarios HETG
                        </option>
                                            <option value="BAC Funcionarios SAMU">
                            BAC Funcionarios SAMU
                        </option>
                                            <option value="Bac Funcionarios Seremi">
                            Bac Funcionarios Seremi
                        </option>
                                            <option value="BAC Funcionarios SSI">
                            BAC Funcionarios SSI
                        </option>
                                            <option value="Bac Funcionarios Sur">
                            Bac Funcionarios Sur
                        </option>
                                            <option value="BAC Funcionarios Vacunatorio UNAP">
                            BAC Funcionarios Vacunatorio UNAP
                        </option>
                                            <option value="BAC Funcionarios Videla">
                            BAC Funcionarios Videla
                        </option>
                                            <option value="BAC Funcionarios Zofri">
                            BAC Funcionarios Zofri
                        </option>
                                            <option value="Bac Gibraltar group">
                            Bac Gibraltar Group
                        </option>
                                            <option value="BAC Gobernación Marítima">
                            BAC Gobernación Marítima
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - ELEAM HUERTO DE PAZ">
                            BAC GRUPO DE RIESGO - ELEAM HUERTO DE PAZ
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - GESTANTES BORO">
                            BAC GRUPO DE RIESGO - GESTANTES BORO
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - GESTANTES PPM">
                            BAC GRUPO DE RIESGO - GESTANTES PPM
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - GESTANTES TORTUGA">
                            BAC GRUPO DE RIESGO - GESTANTES TORTUGA
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - GESTANTES YAM">
                            BAC GRUPO DE RIESGO - GESTANTES YAM
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - OXÍGENO BORO">
                            BAC GRUPO DE RIESGO - OXÍGENO BORO
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - OXÍGENO PPM">
                            BAC GRUPO DE RIESGO - OXÍGENO PPM
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - OXÍGENO TORTUGA">
                            BAC GRUPO DE RIESGO - OXÍGENO TORTUGA
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - OXÍGENO YAM">
                            BAC GRUPO DE RIESGO - OXÍGENO YAM
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - PADI Y CUIDADOR BORO">
                            BAC GRUPO DE RIESGO - PADI Y CUIDADOR BORO
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - PADI Y CUIDADOR PPM">
                            BAC GRUPO DE RIESGO - PADI Y CUIDADOR PPM
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - PADI Y CUIDADOR TORTUGA">
                            BAC GRUPO DE RIESGO - PADI Y CUIDADOR TORTUGA
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - PADI Y CUIDADOR YAM">
                            BAC GRUPO DE RIESGO - PADI Y CUIDADOR YAM
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - PERSONA EN SD BORO">
                            BAC GRUPO DE RIESGO - PERSONA EN SD BORO
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - PERSONA EN SD PPM">
                            BAC GRUPO DE RIESGO - PERSONA EN SD PPM
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - PERSONA EN SD TORTUGA">
                            BAC GRUPO DE RIESGO - PERSONA EN SD TORTUGA
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - PERSONA EN SD YAM">
                            BAC GRUPO DE RIESGO - PERSONA EN SD YAM
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - TBC Y QUIMIO BORO">
                            BAC GRUPO DE RIESGO - TBC Y QUIMIO BORO
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - TBC Y QUIMIO PPM">
                            BAC GRUPO DE RIESGO - TBC Y QUIMIO PPM
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - TBC Y QUIMIO TORTUGA">
                            BAC GRUPO DE RIESGO - TBC Y QUIMIO TORTUGA
                        </option>
                                            <option value="BAC GRUPO DE RIESGO - TBC Y QUIMIO YAM">
                            BAC GRUPO DE RIESGO - TBC Y QUIMIO YAM
                        </option>
                                            <option value="Bac Guzmán y Larrain">
                            Bac Guzmán y Larrain
                        </option>
                                            <option value="BAC Hogar protegido 2 COSAM">
                            BAC Hogar protegido 2 COSAM
                        </option>
                                            <option value="BAC HOGAR PROTEGIDO N°2">
                            BAC HOGAR PROTEGIDO N°2
                        </option>
                                            <option value="BAC Cosam Hogar Protegido 1">
                            BAC Hogar Protegido N1
                        </option>
                                            <option value="BAC Hospederia Hogar de Cristo">
                            BAC Hospederia Hogar de Cristo
                        </option>
                                            <option value="Bac Hospital nuevo">
                            Bac Hospital nuevo
                        </option>
                                            <option value="BAC I Brigada Aerea FACH">
                            BAC I Brigada Aerea FACH
                        </option>
                                            <option value="BAC Inspeccion del Trabajo">
                            BAC IDT
                        </option>
                                            <option value="BAC iglesia sagrado corazon">
                            BAC iglesia sagrado corazon
                        </option>
                                            <option value="BAC IMI Funcionarios">
                            BAC IMI Funcionarios
                        </option>
                                            <option value="BAC Imillitay">
                            BAC Imillitay
                        </option>
                                            <option value="BAC Imp-Exp We Go ltda">
                            BAC Imp-Exp we go ltda
                        </option>
                                            <option value="BAC Incomex">
                            BAC Incomex
                        </option>
                                            <option value="BAC IND">
                            BAC IND
                        </option>
                                            <option value="BAC ING Y CONST - STA MAGDALENA">
                            BAC ING Y CONST - STA MAGDALENA
                        </option>
                                            <option value="BAC INNOVA TRAINING">
                            BAC INNOVA TRAINING
                        </option>
                                            <option value="BAC Intendencia">
                            BAC Intendencia
                        </option>
                                            <option value="BAC Internos SSI">
                            BAC internos SSI
                        </option>
                                            <option value="BAC IPS">
                            BAC IPS
                        </option>
                                            <option value="BAC Isagu">
                            BAC Isagu
                        </option>
                                            <option value="BAC IST Funcionarios">
                            BAC IST Funcionarios
                        </option>
                                            <option value="BAC ITI">
                            BAC ITI
                        </option>
                                            <option value="BAC Jardin Infantil Amtiri">
                            BAC Jardin Infantil Amtiri
                        </option>
                                            <option value="BAC Jeria Hnos">
                            BAC Jeria Hnos
                        </option>
                                            <option value="BAC JJVV San Jorge">
                            BAC JJBAC JJVV San Jorge
                        </option>
                                            <option value="BAC JJVV la puntilla">
                            BAC JJV la puntilla
                        </option>
                                            <option value="BAC JJVV  Padre Hurtado">
                            BAC JJVV  Padre Hurtado
                        </option>
                                            <option value="BAC JJVV  Puchuldiza">
                            BAC JJVV  Puchuldiza
                        </option>
                                            <option value="BAC JJVV 16 diciembre">
                            BAC JJVV 16 diciembre
                        </option>
                                            <option value="BAC JJVV 18 de septiembre">
                            BAC JJVV 18 de septiembre
                        </option>
                                            <option value="BAC JJVV 21 de Mayo">
                            BAC JJVV 21 de Mayo
                        </option>
                                            <option value="BAC JJVV 29 de enero">
                            BAC JJVV 29 de enero
                        </option>
                                            <option value="BAC JJVV alianza">
                            BAC JJVV alianza
                        </option>
                                            <option value="BAC JJVV Altos del Pacifico">
                            BAC JJVV Altos del Pacifico
                        </option>
                                            <option value="BAC JJVV América">
                            BAC JJVV América
                        </option>
                                            <option value="BAC JJVV AMPLIACION NUEVA VICTORIA">
                            BAC JJVV AMPLIACION NUEVA VICTORIA
                        </option>
                                            <option value="BAC JJVV ARTURO PRAT">
                            BAC JJVV ARTURO PRAT
                        </option>
                                            <option value="BAC JJVV ave fenix">
                            BAC JJVV ave fenix
                        </option>
                                            <option value="BAC JJVV Barros Arana">
                            BAC JJVV Barros Arana
                        </option>
                                            <option value="BAC JJVV Cariquima">
                            BAC JJVV Cariquima
                        </option>
                                            <option value="BAC JJVV Carol Urzua">
                            BAC JJVV Carol Urzua
                        </option>
                                            <option value="BAC JJVV CASAS DEL ALTO">
                            BAC JJVV CASAS DEL ALTO
                        </option>
                                            <option value="BAC JJVV CASAS DEL ALTO 2">
                            BAC JJVV CASAS DEL ALTO 2
                        </option>
                                            <option value="BAC JJVV Caupolican">
                            BAC JJVV Caupolican
                        </option>
                                            <option value="BAC JJVV Cavancha Oriente">
                            BAC JJVV Cavancha Oriente
                        </option>
                                            <option value="Bac jjvv central">
                            Bac jjvv central
                        </option>
                                            <option value="BAC JJVV Cerro Colorado">
                            BAC JJVV Cerro Colorado
                        </option>
                                            <option value="BAC JJVV Cerro Dragon">
                            BAC JJVV Cerro Dragon
                        </option>
                                            <option value="BAC JJVV Cerro La cruz">
                            BAC JJVV Cerro La cruz
                        </option>
                                            <option value="BAC JJVV Cerro Tarapaca">
                            BAC JJVV Cerro Tarapaca
                        </option>
                                            <option value="Bac Jjvv coliseo">
                            Bac jjvv coliseo
                        </option>
                                            <option value="BAC JJVV condominio la tirana">
                            BAC JJVV condominio la tirana
                        </option>
                                            <option value="BAC JJVV Dagoberto Godoy">
                            BAC JJVV Dagoberto Godoy
                        </option>
                                            <option value="BAC JJVV Dolores">
                            BAC JJVV Dolores
                        </option>
                                            <option value="BAC JJVV Domanasan">
                            BAC JJVV Domanasan
                        </option>
                                            <option value="BAC JJVV Dunas 2">
                            BAC JJVV Dunas 2
                        </option>
                                            <option value="BAC JJVV Dunas I y II">
                            BAC JJVV Dunas I y II
                        </option>
                                            <option value="BAC JJVV ELENA CAFFARENA">
                            BAC JJVV ELENA CAFFARENA
                        </option>
                                            <option value="BAC JJVV EN VILLA FREI">
                            BAC JJVV EN VILLA FREI
                        </option>
                                            <option value="BAC JJVV Ferronor">
                            BAC JJVV Ferronor
                        </option>
                                            <option value="BAC JJVV FUERZA JOVEN 1">
                            BAC JJVV FUERZA JOVEN 1
                        </option>
                                            <option value="BAC JJVV Gendecora">
                            BAC JJVV Gendecora
                        </option>
                                            <option value="BAC JJVV Gomez Carreño">
                            BAC JJVV Gomez Carreño
                        </option>
                                            <option value="BAC JJVV Granaderos">
                            BAC JJVV Granaderos
                        </option>
                                            <option value="BAC JJVV Grumete Bolados">
                            BAC JJVV Grumete Bolados
                        </option>
                                            <option value="BAC JJVV grumete bolados">
                            BAC JJVV grumete bolados
                        </option>
                                            <option value="BAC JJVV Huantajaya 1">
                            BAC JJVV Huantajaya 1
                        </option>
                                            <option value="BAC JJVV Huantajaya 2">
                            BAC JJVV Huantajaya 2
                        </option>
                                            <option value="BAC JJVV Huantajaya 3">
                            BAC JJVV Huantajaya 3
                        </option>
                                            <option value="BAC JJVV JAIME GUZMÁN 1">
                            BAC JJVV JAIME GUZMÁN 1
                        </option>
                                            <option value="BAC JJVV JARDINES DEL DESIERTO">
                            BAC JJVV JARDINES DEL DESIERTO
                        </option>
                                            <option value="BAC JJVV Jorge INOSTROZA">
                            BAC JJVV Jorge INOSTROZA
                        </option>
                                            <option value="BAC JJVV José Miguel Carrera">
                            BAC JJVV José Miguel Carrera
                        </option>
                                            <option value="BAC JJVV La Huayca">
                            BAC JJVV La Huayca
                        </option>
                                            <option value="BAC JJVV La Pampa">
                            BAC JJVV La Pampa
                        </option>
                                            <option value="BAC JJVV LA TORTUGA">
                            BAC JJVV LA TORTUGA
                        </option>
                                            <option value="BAC JJVV Las Magnolias">
                            BAC JJVV Las Magnolias
                        </option>
                                            <option value="BAC JJVV Los Alelies">
                            BAC JJVV Los Alelies
                        </option>
                                            <option value="BAC JJVV Los Alelíes">
                            BAC JJVV Los Alelíes
                        </option>
                                            <option value="BAC JJVV LOS ÁNGELES 1">
                            BAC JJVV LOS ÁNGELES 1
                        </option>
                                            <option value="BAC JJVV Los Heroes">
                            BAC JJVV Los Heroes
                        </option>
                                            <option value="BAC JJVV Los Jazmines">
                            BAC JJVV Los Jazmines
                        </option>
                                            <option value="BAC JJVV Los Puquios 1">
                            BAC JJVV Los Puquios 1
                        </option>
                                            <option value="BAC JJVV Los Puquios 2 y 3">
                            BAC JJVV Los Puquios 2 y 3
                        </option>
                                            <option value="BAC JJVV Los Volcanes">
                            BAC JJVV Los Volcanes
                        </option>
                                            <option value="BAC JJVV LOS VOLCANES 2">
                            BAC JJVV LOS VOLCANES 2
                        </option>
                                            <option value="BAC JJVV Magisterio">
                            BAC JJVV Magisterio
                        </option>
                                            <option value="BAC JJVV NUEVA ESPERANZA">
                            BAC JJVV NUEVA ESPERANZA
                        </option>
                                            <option value="BAC JJVV NUEVA TORTUGA">
                            BAC JJVV NUEVA TORTUGA
                        </option>
                                            <option value="BAC JJVV Nueva victoria">
                            BAC JJVV Nueva Victoria
                        </option>
                                            <option value="BAC JJVV Nuevo Chile">
                            BAC JJVV Nuevo Chile
                        </option>
                                            <option value="BAC JJVV O´HIGGINS">
                            BAC JJVV O´HIGGINS
                        </option>
                                            <option value="BAC JJVV Pampa del Tamarugal">
                            BAC JJVV Pampa del Tamarugal
                        </option>
                                            <option value="BAC JJVV PAMPA MAR 3">
                            BAC JJVV PAMPA MAR 3
                        </option>
                                            <option value="BAC JJVV PIONEROS DEL DESIERTO">
                            BAC JJVV PIONEROS DEL DESIERTO
                        </option>
                                            <option value="BAC JJVV Plan Costero">
                            BAC JJVV Plan Costero
                        </option>
                                            <option value="BAC JJVV Playa Brava">
                            BAC JJVV Playa Brava
                        </option>
                                            <option value="BAC JJVV primeras Piedras">
                            BAC JJVV primeras Piedras
                        </option>
                                            <option value="BAC JJVV Puchuldiza">
                            BAC JJVV puchuldiza
                        </option>
                                            <option value="BAC JJVV RAÚL RETTIG">
                            BAC JJVV RAÚL RETTIG
                        </option>
                                            <option value="BAC JJVV Reina Mar">
                            BAC JJVV Reina Mar
                        </option>
                                            <option value="BAC JJVV Remodelación Cavancha">
                            BAC JJVV Remodelación Cavancha
                        </option>
                                            <option value="BAC JJVV Remodelación El Morro">
                            BAC JJVV Remodelación El Morro
                        </option>
                                            <option value="BAC JJVV Remodelación El Morro">
                            BAC JJVV Remodelación El Morro
                        </option>
                                            <option value="BAC JJVV Resbaladero">
                            BAC JJVV Resbaladero
                        </option>
                                            <option value="Bac JJVV Ruben Godoy">
                            Bac JJVV Ruben Godoy
                        </option>
                                            <option value="BAC JJVV San Lorenzo">
                            BAC JJVV San Lorenzo
                        </option>
                                            <option value="BAC JJVV SAN LORENZO DE TARAPACÁ 1">
                            BAC JJVV SAN LORENZO DE TARAPACÁ 1
                        </option>
                                            <option value="BAC JJVV Santa Catalina">
                            BAC JJVV Santa Catalina
                        </option>
                                            <option value="BAC JJVV Santa Laura">
                            BAC JJVV Santa Laura
                        </option>
                                            <option value="BAC JJVV SANTA ROSA">
                            BAC JJVV SANTA ROSA
                        </option>
                                            <option value="BAC JJVV SANTA ROSA 2">
                            BAC JJVV SANTA ROSA 2
                        </option>
                                            <option value="BAC JJVV santa teresa">
                            BAC JJVV santa teresa
                        </option>
                                            <option value="BAC JJVV SANTA TERESA DE LOS ANDES">
                            BAC JJVV SANTA TERESA DE LOS ANDES
                        </option>
                                            <option value="BAC JJVV Sargento aldea">
                            BAC JJVV Sargento aldea
                        </option>
                                            <option value="BAC JJVV Simon Bolivar">
                            BAC JJVV Simon Bolivar
                        </option>
                                            <option value="Bac JJVV sol del norte">
                            BAC JJVV sol del norte
                        </option>
                                            <option value="BAC jjvv sol naciente">
                            BAC jjvv sol naciente
                        </option>
                                            <option value="BAC JJVV STGO HUMBERSTONE 1">
                            BAC JJVV STGO HUMBERSTONE 1
                        </option>
                                            <option value="BAC JJVV Stgo Polanco">
                            BAC JJVV Stgo Polanco
                        </option>
                                            <option value="BAC JJVV Tamarugal">
                            BAC JJVV Tamarugal
                        </option>
                                            <option value="BAC JJVV Tamarugal 2">
                            BAC JJVV Tamarugal 2
                        </option>
                                            <option value="BAC JJVV TARAPACA">
                            BAC JJVV TARAPACA
                        </option>
                                            <option value="BAC JJVV TERCERA ESPERANZA">
                            BAC JJVV TERCERA ESPERANZA
                        </option>
                                            <option value="BAC JJVV Union hace la fuerza">
                            BAC JJVV Union hace la fuerza
                        </option>
                                            <option value="BAC JJVV union y fuerza">
                            BAC JJVV union y fuerza
                        </option>
                                            <option value="BAC JJVV Valle Verde">
                            BAC JJVV Valle Verde
                        </option>
                                            <option value="BAC JJVV Vialidad">
                            BAC JJVV Vialidad
                        </option>
                                            <option value="BAC JJVV Vida Nueva">
                            BAC JJVV Vida Nueva
                        </option>
                                            <option value="BAC JJVV VILLA LAS AMÉRICAS 1">
                            BAC JJVV VILLA LAS AMÉRICAS 1
                        </option>
                                            <option value="BAC JJVV Villa Quitasoles">
                            BAC JJVV Villa Quitasoles
                        </option>
                                            <option value="BAC JJVV vilma alvarez">
                            BAC JJVV vilma alvarez
                        </option>
                                            <option value="BAC JJVV VISTA AL MAR 1">
                            BAC JJVV VISTA AL MAR 1
                        </option>
                                            <option value="BAC JJVV Vista Hermosa">
                            BAC JJVV Vista Hermosa
                        </option>
                                            <option value="BAC JJVV VISTA MANSA 1">
                            BAC JJVV VISTA MANSA 1
                        </option>
                                            <option value="BAC JUMBO">
                            BAC JUMBO
                        </option>
                                            <option value="BAC La Gran Feria">
                            BAC La Gran Feria
                        </option>
                                            <option value="BAC la tirana">
                            BAC la tirana
                        </option>
                                            <option value="BAC LABORAL CENTRO PENITENCIARIO A.H">
                            BAC LABORAL CENTRO PENITENCIARIO A.H
                        </option>
                                            <option value="BAC Las Chacarillas">
                            BAC Las Chacarillas
                        </option>
                                            <option value="BAC Leandro Sembler">
                            BAC Leandro Sembler
                        </option>
                                            <option value="BAC LIDER SUR">
                            BAC LIDER SUR
                        </option>
                                            <option value="Bac Linea 18">
                            Bac Linea 18
                        </option>
                                            <option value="Bac Linea 6">
                            Bac Linea 6
                        </option>
                                            <option value="BAC Los Claveles">
                            BAC Los Claveles
                        </option>
                                            <option value="BAC MAHO 10">
                            BAC MAHO 10
                        </option>
                                            <option value="BAC MAHO 11">
                            BAC MAHO 11
                        </option>
                                            <option value="BAC MAHO 12">
                            BAC MAHO 12
                        </option>
                                            <option value="BAC MAHO 13">
                            BAC MAHO 13
                        </option>
                                            <option value="BAC MAHO 14">
                            BAC MAHO 14
                        </option>
                                            <option value="BAC MAHO 15">
                            BAC MAHO 15
                        </option>
                                            <option value="BAC MAHO 16">
                            BAC MAHO 16
                        </option>
                                            <option value="BAC MAHO 17">
                            BAC MAHO 17
                        </option>
                                            <option value="BAC MAHO 18">
                            BAC MAHO 18
                        </option>
                                            <option value="BAC MAHO 19">
                            BAC MAHO 19
                        </option>
                                            <option value="BAC MAHO 20">
                            BAC MAHO 20
                        </option>
                                            <option value="BAC MAHO 21">
                            BAC MAHO 21
                        </option>
                                            <option value="BAC MAHO 3">
                            BAC MAHO 3
                        </option>
                                            <option value="BAC MAHO 4">
                            BAC MAHO 4
                        </option>
                                            <option value="BAC MAHO 5">
                            BAC MAHO 5
                        </option>
                                            <option value="BAC MAHO 6">
                            BAC MAHO 6
                        </option>
                                            <option value="BAC MAHO 7">
                            BAC MAHO 7
                        </option>
                                            <option value="BAC MAHO 8">
                            BAC MAHO 8
                        </option>
                                            <option value="BAC MAHO 9">
                            BAC MAHO 9
                        </option>
                                            <option value="BAC MAHO SOBRE RUEDAS">
                            BAC MAHO SOBRE RUEDAS
                        </option>
                                            <option value="BAC MALL PLAZA">
                            BAC MALL PLAZA
                        </option>
                                            <option value="BAC Mall Zofri">
                            BAC Mall Zofri
                        </option>
                                            <option value="BAC Maria Ayuda">
                            BAC Maria Ayuda
                        </option>
                                            <option value="BAC Medicen">
                            BAC Medicen
                        </option>
                                            <option value="BAC Medicen 2">
                            BAC Medicen 2
                        </option>
                                            <option value="BAC MIDESO">
                            BAC MIDESO
                        </option>
                                            <option value="BAC Migrantes Huara SEREMI">
                            BAC Migrantes Huara SEREMI
                        </option>
                                            <option value="BAC MIGRANTES HUARA SERVICIO DE SALUD">
                            BAC MIGRANTES HUARA SERVICIO DE SALUD
                        </option>
                                            <option value="Bac modulos 31-32-33-34 centro penitenciario a.h">
                            Bac modulos 31-32-33-34 centro penitenciario a.h
                        </option>
                                            <option value="Bac modulos 41-42 centro penitenciario a.h">
                            Bac modulos 41-42 centro penitenciario a.h
                        </option>
                                            <option value="Bac modulos 47-48-49-50 centro penitenciario a.h">
                            Bac modulos 47-48-49-50 centro penitenciario a.h
                        </option>
                                            <option value="BAC Montesol 1">
                            BAC Montesol 1
                        </option>
                                            <option value="BAC Montesol Etapa 2A">
                            BAC Montesol Etapa 2A
                        </option>
                                            <option value="BAC Montesol Etapa C">
                            BAC Montesol Etapa C
                        </option>
                                            <option value="BAC MOP 1">
                            BAC MOP 1
                        </option>
                                            <option value="BAC MOP 2">
                            BAC MOP 2
                        </option>
                                            <option value="BAC MYGROUP">
                            BAC MYGROUP
                        </option>
                                            <option value="BAC N° 1 CARCEL">
                            BAC N° 1 CARCEL
                        </option>
                                            <option value="BAC N° 1 CENTRO PENITENCIARIO">
                            BAC N° 1 CENTRO PENITENCIARIO
                        </option>
                                            <option value="BAC N° 1 COMITE  VIVIENDO ALTO MOLLE">
                            BAC N° 1 COMITE  VIVIENDO ALTO MOLLE
                        </option>
                                            <option value="BAC N° 1 COMITE VIVIENDA ALEJANDRA GUZMAN">
                            BAC N° 1 COMITE VIVIENDA ALEJANDRA GUZMAN
                        </option>
                                            <option value="BAC N° 1 SERVICIO DE IMPUESTOS INTERNOS">
                            BAC N° 1 SERVICIO DE IMPUESTOS INTERNOS
                        </option>
                                            <option value="BAC N°1 CENTRO PENITENCIARIO">
                            BAC N°1 CENTRO PENITENCIARIO
                        </option>
                                            <option value="BAC N°1 COMITÉ CANADELA">
                            BAC N°1 COMITÉ CANADELA
                        </option>
                                            <option value="BAC N°1 CONDOMINIO DOÑA ANGELA II">
                            BAC N°1 CONDOMINIO DOÑA ANGELA II
                        </option>
                                            <option value="BAC N°1 CONDOMINIO DOÑA ANGELA III">
                            BAC N°1 CONDOMINIO DOÑA ANGELA III
                        </option>
                                            <option value="BAC N°1 CONDOMINIO LAS PARINAS  1">
                            BAC N°1 CONDOMINIO LAS PARINAS  1
                        </option>
                                            <option value="BAC N°1 ESTADIO">
                            BAC N°1 ESTADIO
                        </option>
                                            <option value="BAC N°1 EXPLANADA MUNICIPALIDAD">
                            BAC N°1 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°1 JJVV ALTOS DEL SUR 3">
                            BAC N°1 JJVV ALTOS DEL SUR 3
                        </option>
                                            <option value="BAC N°1 JJVV COMITE BUEN VIVIR, RENACER">
                            BAC N°1 JJVV COMITE BUEN VIVIR, RENACER
                        </option>
                                            <option value="BAC N°1 JJVV PABLO NERUDA">
                            BAC N°1 JJVV PABLO NERUDA
                        </option>
                                            <option value="BAC N°1 PLAZA CCR">
                            BAC N°1 PLAZA CCR
                        </option>
                                            <option value="BAC N°1 PRIMERA COMPAÑIA DE BOMBEROS">
                            BAC N°1 PRIMERA COMPAÑIA DE BOMBEROS
                        </option>
                                            <option value="BAC N°1 SUPERMERCADO UNIMARC">
                            BAC N°1 SUPERMERCADO UNIMARC
                        </option>
                                            <option value="BAC N°1 TOMA 318">
                            BAC N°1 TOMA 318
                        </option>
                                            <option value="BAC N°1 TOMA MUJERES EMPODERADAS POR UN FUTURO MEJOR">
                            BAC N°1 TOMA MUJERES EMPODERADAS POR UN FUTURO MEJOR
                        </option>
                                            <option value="BAC N°10 ESTADIO">
                            BAC N°10 ESTADIO
                        </option>
                                            <option value="BAC N°10 EXPLANADA MUNICIPALIDAD">
                            BAC N°10 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°10 FERIA QUEBRADILLA">
                            BAC N°10 FERIA QUEBRADILLA
                        </option>
                                            <option value="BAC N°10 PLACA BANCARIA">
                            BAC N°10 PLACA BANCARIA
                        </option>
                                            <option value="BAC N°11 ESTADIO">
                            BAC N°11 ESTADIO
                        </option>
                                            <option value="BAC N°11 EXPLANADA MUNICIPALIDAD">
                            BAC N°11 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°11 FERIA QUEBRADILLA">
                            BAC N°11 FERIA QUEBRADILLA
                        </option>
                                            <option value="BAC N°11 PLACA BANCARIA">
                            BAC N°11 PLACA BANCARIA
                        </option>
                                            <option value="BAC N°12 ESTADIO">
                            BAC N°12 ESTADIO
                        </option>
                                            <option value="BAC N°12 EXPLANADA MUNICIPALIDAD">
                            BAC N°12 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°12 FERIA QUEBRADILLA">
                            BAC N°12 FERIA QUEBRADILLA
                        </option>
                                            <option value="BAC N°12 PLACA BANCARIA">
                            BAC N°12 PLACA BANCARIA
                        </option>
                                            <option value="BAC N°12 PLAZA DE ARMAS">
                            BAC N°12 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°13 ESTADIO">
                            BAC N°13 ESTADIO
                        </option>
                                            <option value="BAC N°13 PLACA BANCARIA">
                            BAC N°13 PLACA BANCARIA
                        </option>
                                            <option value="BAC N°13 PLACA BANCARIA">
                            BAC N°13 PLACA BANCARIA
                        </option>
                                            <option value="BAC N°13 PLAZA DE ARMAS">
                            BAC N°13 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°14 ESTADIO">
                            BAC N°14 ESTADIO
                        </option>
                                            <option value="BAC N°14 PLACA BANCARIA">
                            BAC N°14 PLACA BANCARIA
                        </option>
                                            <option value="BAC N°14 PLAZA DE ARMAS">
                            BAC N°14 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°15 ESTADIO">
                            BAC N°15 ESTADIO
                        </option>
                                            <option value="BAC N°15 PLAZA DE ARMAS">
                            BAC N°15 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°16 ESTADIO">
                            BAC N°16 ESTADIO
                        </option>
                                            <option value="BAC N°16 PLAZA DE ARMAS">
                            BAC N°16 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°17 ESTADIO">
                            BAC N°17 ESTADIO
                        </option>
                                            <option value="BAC N°17 PLAZA DE ARMAS">
                            BAC N°17 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°18 PLAZA DE ARMAS">
                            BAC N°18 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°19 PLAZA DE ARMAS">
                            BAC N°19 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°2 AGRO HOSPICIO">
                            BAC N°2 AGRO HOSPICIO
                        </option>
                                            <option value="BAC N°2 BOMBEROS">
                            BAC N°2 BOMBEROS
                        </option>
                                            <option value="BAC N°2 CONDOMINIO HUANTAJAYA">
                            BAC N°2 CONDOMINIO HUANTAJAYA
                        </option>
                                            <option value="BAC N°2 CONDOMINIO VISTA ALEGRE">
                            BAC N°2 CONDOMINIO VISTA ALEGRE
                        </option>
                                            <option value="BAC N°2 ESTADIO">
                            BAC N°2 ESTADIO
                        </option>
                                            <option value="BAC N°2 EXPLANADA MUNICIPALIDAD">
                            BAC N°2 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°2 JJVV CERRO TARAPACÁ">
                            BAC N°2 JJVV CERRO TARAPACÁ
                        </option>
                                            <option value="BAC N°2 JJVV FUERZA JOVEN">
                            BAC N°2 JJVV FUERZA JOVEN
                        </option>
                                            <option value="BAC N°2 PLAZA CCR">
                            BAC N°2 PLAZA CCR
                        </option>
                                            <option value="BAC N°20 EXPLANADA GIMNASIO TECHADO">
                            BAC N°20 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°20 PLAZA DE ARMAS">
                            BAC N°20 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°21 EXPLANADA GIMNASIO TECHADO">
                            BAC N°21 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°21 PLAZA DE ARMAS">
                            BAC N°21 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°22 EXPLANADA GIMNASIO TECHADO">
                            BAC N°22 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°22 MAHO">
                            BAC N°22 MAHO
                        </option>
                                            <option value="BAC N°22 PLAZA DE ARMAS">
                            BAC N°22 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°23 EXPLANADA GIMNASIO TECHADO">
                            BAC N°23 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°23 MAHO">
                            BAC N°23 MAHO
                        </option>
                                            <option value="BAC N°23 PLAZA DE ARMAS">
                            BAC N°23 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°24 EXPLANADA GIMNASIO TECHADO">
                            BAC N°24 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°24 PLAZA DE ARMAS">
                            BAC N°24 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°24 PLAZA DE ARMAS">
                            BAC N°24 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°25 EXPLANADA GIMNASIO TECHADO">
                            BAC N°25 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°25 PLAZA DE ARMAS">
                            BAC N°25 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°26 EXPLANADA GIMNASIO TECHADO">
                            BAC N°26 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°26 MAHO">
                            BAC N°26 MAHO
                        </option>
                                            <option value="BAC N°26 PLAZA DE ARMAS">
                            BAC N°26 PLAZA DE ARMAS
                        </option>
                                            <option value="BAC N°27 EXPLANADA GIMNASIO TECHADO">
                            BAC N°27 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°27 MAHO">
                            BAC N°27 MAHO
                        </option>
                                            <option value="BAC N°28 EXPLANADA GIMNASIO TECHADO">
                            BAC N°28 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°28 MAHO">
                            BAC N°28 MAHO
                        </option>
                                            <option value="BAC N°29 EXPLANADA GIMNASIO TECHADO">
                            BAC N°29 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°29 MAHO">
                            BAC N°29 MAHO
                        </option>
                                            <option value="BAC N°3 AGRO HOSPICIO">
                            BAC N°3 AGRO HOSPICIO
                        </option>
                                            <option value="BAC N°3 CONDOMINIO HUANTAJAYA">
                            BAC N°3 CONDOMINIO HUANTAJAYA
                        </option>
                                            <option value="BAC N°3 ESTADIO">
                            BAC N°3 ESTADIO
                        </option>
                                            <option value="BAC N°3 EXPLANADA MUNICIPALIDAD">
                            BAC N°3 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°3 JJVV SANTA ROSA">
                            BAC N°3 JJVV SANTA ROSA
                        </option>
                                            <option value="BAC N°3 PLAZA CCR">
                            BAC N°3 PLAZA CCR
                        </option>
                                            <option value="BAC N°30 EXPLANADA GIMNASIO TECHADO">
                            BAC N°30 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°30 MAHO">
                            BAC N°30 MAHO
                        </option>
                                            <option value="BAC N°31 EXPLANADA GIMNASIO TECHADO">
                            BAC N°31 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°31 MAHO">
                            BAC N°31 MAHO
                        </option>
                                            <option value="BAC N°32 EXPLANADA GIMNASIO TECHADO">
                            BAC N°32 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°32 MAHO">
                            BAC N°32 MAHO
                        </option>
                                            <option value="BAC N°33 EXPLANADA GIMNASIO TECHADO">
                            BAC N°33 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°33 MAHO">
                            BAC N°33 MAHO
                        </option>
                                            <option value="BAC N°34 EXPLANADA GIMNASIO TECHADO">
                            BAC N°34 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°34 MAHO">
                            BAC N°34 MAHO
                        </option>
                                            <option value="BAC N°35 EXPLANADA GIMNASIO TECHADO">
                            BAC N°35 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°35 MAHO">
                            BAC N°35 MAHO
                        </option>
                                            <option value="BAC N°36 EXPLANADA GIMNASIO TECHADO">
                            BAC N°36 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°36 MAHO">
                            BAC N°36 MAHO
                        </option>
                                            <option value="BAC N°37 EXPLANADA GIMNASIO TECHADO">
                            BAC N°37 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°37 MAHO">
                            BAC N°37 MAHO
                        </option>
                                            <option value="BAC N°38 EXPLANADA GIMNASIO TECHADO">
                            BAC N°38 EXPLANADA GIMNASIO TECHADO
                        </option>
                                            <option value="BAC N°38 MAHO">
                            BAC N°38 MAHO
                        </option>
                                            <option value="BAC N°39 MAHO">
                            BAC N°39 MAHO
                        </option>
                                            <option value="BAC N°4 ESTADIO">
                            BAC N°4 ESTADIO
                        </option>
                                            <option value="BAC N°4 EXPLANADA MUNICIPALIDAD">
                            BAC N°4 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°4 PLAZA CCR">
                            BAC N°4 PLAZA CCR
                        </option>
                                            <option value="BAC N°40 MAHO">
                            BAC N°40 MAHO
                        </option>
                                            <option value="BAC N°41 MAHO">
                            BAC N°41 MAHO
                        </option>
                                            <option value="BAC N°42 MAHO">
                            BAC N°42 MAHO
                        </option>
                                            <option value="BAC N°43 MAHO">
                            BAC N°43 MAHO
                        </option>
                                            <option value="BAC N°44 MAHO">
                            BAC N°44 MAHO
                        </option>
                                            <option value="BAC N°45 MAHO">
                            BAC N°45 MAHO
                        </option>
                                            <option value="BAC N°46 MAHO">
                            BAC N°46 MAHO
                        </option>
                                            <option value="BAC N°47 MAHO">
                            BAC N°47 MAHO
                        </option>
                                            <option value="BAC N°5 ESTADIO">
                            BAC N°5 ESTADIO
                        </option>
                                            <option value="BAC N°5 EXPLANADA MUNICIPALIDAD">
                            BAC N°5 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°6 ESTADIO">
                            BAC N°6 ESTADIO
                        </option>
                                            <option value="BAC N°6 EXPLANADA MUNICIPALIDAD">
                            BAC N°6 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°7 ESTADIO">
                            BAC N°7 ESTADIO
                        </option>
                                            <option value="BAC N°7 EXPLANADA MUNICIPALIDAD">
                            BAC N°7 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°8 ESTADIO">
                            BAC N°8 ESTADIO
                        </option>
                                            <option value="BAC N°8 EXPLANADA MUNICIPALIDAD">
                            BAC N°8 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°8 PLACA BANCARIA">
                            BAC N°8 PLACA BANCARIA
                        </option>
                                            <option value="BAC N°9 ESTADIO">
                            BAC N°9 ESTADIO
                        </option>
                                            <option value="BAC N°9 EXPLANADA MUNICIPALIDAD">
                            BAC N°9 EXPLANADA MUNICIPALIDAD
                        </option>
                                            <option value="BAC N°9 PLACA BANCARIA">
                            BAC N°9 PLACA BANCARIA
                        </option>
                                            <option value="BAC Nido Amigo">
                            BAC Nido Amigo
                        </option>
                                            <option value="Bac Notaria Araya">
                            Bac Notaria Araya
                        </option>
                                            <option value="BAC Notaria Vila">
                            BAC Notaria Vila
                        </option>
                                            <option value="BAC Obras San Luis">
                            BAC Obras San Luis
                        </option>
                                            <option value="BAC ONEMI">
                            BAC ONEMI
                        </option>
                                            <option value="BAC PAP barrio boliviano">
                            BAC PAP barrio boliviano
                        </option>
                                            <option value="Bac patio 11 centro penitenciario a.h">
                            Bac patio 11 centro penitenciario a.h
                        </option>
                                            <option value="Bac patio 12 centro penitenciario a.h">
                            Bac patio 12 centro penitenciario a.h
                        </option>
                                            <option value="BAC PDI">
                            BAC PDI
                        </option>
                                            <option value="BAC PDI 2">
                            BAC PDI 2
                        </option>
                                            <option value="BAC PISCINA GODOY">
                            BAC PISCINA GODOY
                        </option>
                                            <option value="BAC PLACA BANCARIA 1">
                            BAC PLACA BANCARIA 1
                        </option>
                                            <option value="BAC Placa Bancaria 2">
                            BAC Placa Bancaria 2
                        </option>
                                            <option value="BAC PLACA BANCARIA 3">
                            BAC PLACA BANCARIA 3
                        </option>
                                            <option value="BAC PLACA BANCARIA 4">
                            BAC PLACA BANCARIA 4
                        </option>
                                            <option value="BAC PLACA BANCARIA 5">
                            BAC PLACA BANCARIA 5
                        </option>
                                            <option value="BAC PLACA BANCARIA 6">
                            BAC PLACA BANCARIA 6
                        </option>
                                            <option value="BAC PLACA BANCARIA 7">
                            BAC PLACA BANCARIA 7
                        </option>
                                            <option value="BAC Plan Costero">
                            BAC Plan Costero
                        </option>
                                            <option value="BAC PLAYA BRAVA">
                            BAC PLAYA BRAVA
                        </option>
                                            <option value="BAC PLAYA CAVANCHA EDIFICIO ATALAYA">
                            BAC PLAYA CAVANCHA EDIFICIO ATALAYA
                        </option>
                                            <option value="BAC PLAZA ARICA">
                            BAC PLAZA ARICA
                        </option>
                                            <option value="Bac plaza bancaria">
                            Bac plaza bancaria
                        </option>
                                            <option value="BAC PLAZA DE ARMAS">
                            BAC PLAZA DE ARMAS
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 10">
                            BAC PLAZA DE ARMAS 10
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 11">
                            BAC PLAZA DE ARMAS 11
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 2">
                            BAC PLAZA DE ARMAS 2
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 3">
                            BAC PLAZA DE ARMAS 3
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 4">
                            BAC PLAZA DE ARMAS 4
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 5">
                            BAC PLAZA DE ARMAS 5
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 6">
                            BAC PLAZA DE ARMAS 6
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 7">
                            BAC PLAZA DE ARMAS 7
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 8">
                            BAC PLAZA DE ARMAS 8
                        </option>
                                            <option value="BAC PLAZA DE ARMAS 9">
                            BAC PLAZA DE ARMAS 9
                        </option>
                                            <option value="BAC Plaza Elias Laferte">
                            BAC Plaza Elias Laferte
                        </option>
                                            <option value="BAC plaza hospital">
                            BAC plaza hospital
                        </option>
                                            <option value="BAC PLAZA LAS AMERICAS">
                            BAC PLAZA LAS AMERICAS
                        </option>
                                            <option value="BAC plaza los alamos">
                            BAC plaza los alamos
                        </option>
                                            <option value="Bac plaza los cóndores">
                            BAC plaza los condores
                        </option>
                                            <option value="BAC Plaza Los Heroes">
                            BAC Plaza Los Heroes
                        </option>
                                            <option value="BAC Plaza Prat">
                            BAC Plaza Prat
                        </option>
                                            <option value="BAC Polideportivo Alto Hospicio">
                            BAC Polideportivo Alto Hospicio
                        </option>
                                            <option value="BAC Politécnico">
                            BAC Politécnico
                        </option>
                                            <option value="BAC Pozo Almonte">
                            BAC Pozo Almonte
                        </option>
                                            <option value="BAC Pozo Almonte Administración">
                            BAC Pozo Almonte Administración
                        </option>
                                            <option value="BAC Pozo Almonte Aguatero">
                            BAC Pozo Almonte Aguatero
                        </option>
                                            <option value="BAC Pozo Almonte Alcaldía">
                            BAC Pozo Almonte Alcaldía
                        </option>
                                            <option value="BAC Pozo Almonte Bechtel">
                            BAC Pozo Almonte Bechtel
                        </option>
                                            <option value="BAC Pozo Almonte Canal">
                            BAC Pozo Almonte Canal
                        </option>
                                            <option value="BAC Pozo Almonte Constructora Ebenezer">
                            BAC Pozo Almonte Constructora Ebenezer
                        </option>
                                            <option value="BAC Pozo Almonte Cosayach">
                            BAC Pozo Almonte Cosayach
                        </option>
                                            <option value="BAC Pozo Almonte Depto de Educacion">
                            BAC Pozo Almonte Depto de Educacion
                        </option>
                                            <option value="BAC Pozo Almonte Depto de salud">
                            BAC Pozo Almonte Depto de salud
                        </option>
                                            <option value="BAC Pozo Almonte Dideco">
                            BAC Pozo Almonte Dideco
                        </option>
                                            <option value="BAC Pozo Almonte DIMAO">
                            BAC Pozo Almonte DIMAO
                        </option>
                                            <option value="BAC Pozo Almonte DTTP">
                            BAC Pozo Almonte DTTP
                        </option>
                                            <option value="BAC Pozo Almonte Edificio Consistorial">
                            BAC Pozo Almonte Edificio Consistorial
                        </option>
                                            <option value="BAC Pozo Almonte Emergencia y Vigilancia">
                            BAC Pozo Almonte Emergencia y Vigilancia
                        </option>
                                            <option value="BAC Pozo Almonte Empresa Astrosol">
                            BAC Pozo Almonte Empresa Astrosol
                        </option>
                                            <option value="BAC Pozo Almonte Fomento">
                            BAC Pozo Almonte Fomento
                        </option>
                                            <option value="BAC Pozo Almonte Funcionarios CORMUDESPA">
                            BAC Pozo Almonte Funcionarios CORMUDESPA
                        </option>
                                            <option value="BAC Pozo Almonte Funcionarios de Salud">
                            BAC Pozo Almonte Funcionarios de Salud
                        </option>
                                            <option value="BAC Pozo Almonte I.M.P.A Territoriales">
                            BAC Pozo Almonte I.M.P.A Territoriales
                        </option>
                                            <option value="BAC Pozo Almonte Migrantes">
                            BAC Pozo Almonte Migrantes Huara
                        </option>
                                            <option value="BAC Pozo Almonte Municipalidad">
                            BAC Pozo Almonte Municipalidad
                        </option>
                                            <option value="BAC Pozo Almonte Radiadores Gomez">
                            BAC Pozo Almonte Radiadores Gomez
                        </option>
                                            <option value="BAC Pozo Almonte Secplac">
                            BAC Pozo Almonte Secplac
                        </option>
                                            <option value="BAC Pozo Almonte Secretaría Municipal">
                            BAC Pozo Almonte Secretaría Municipal
                        </option>
                                            <option value="BAC Pozo Almonte Sede 18 de Septiembre">
                            BAC Pozo Almonte Sede 18 de Septiembre
                        </option>
                                            <option value="BAC Pozo Almonte Sede Los Algarrobos">
                            BAC Pozo Almonte Sede Los Algarrobos
                        </option>
                                            <option value="BAC Pozo Almonte Sede Los Tamarugos">
                            BAC Pozo Almonte Sede Los Tamarugos
                        </option>
                                            <option value="BAC Pozo Almonte Sede Sol Naciente">
                            BAC Pozo Almonte Sede Sol Naciente
                        </option>
                                            <option value="BAC Pozo Almonte Tenencia">
                            BAC Pozo Almonte Tenencia
                        </option>
                                            <option value="BAC Pozo Almonte Valnico ltda">
                            BAC Pozo Almonte Valnico ltda
                        </option>
                                            <option value="BAC Pozo Almonte Villa Mapuche">
                            BAC Pozo Almonte Villa Mapuche
                        </option>
                                            <option value="BAC PULLMAN GARCÍA">
                            BAC PULLMAN GARCÍA
                        </option>
                                            <option value="BAC PULLMAN GARCÍA 2">
                            BAC PULLMAN GARCÍA 2
                        </option>
                                            <option value="BAC QUEBRADILLA">
                            BAC QUEBRADILLA
                        </option>
                                            <option value="BAC Quinova">
                            BAC Quinova
                        </option>
                                            <option value="BAC Radio taxi Shaloom">
                            BAC Radio taxi Shaloom
                        </option>
                                            <option value="Bac Redes Nitto">
                            BAC Redes Nitto
                        </option>
                                            <option value="BAC Regimiento Baquedano">
                            BAC Regimiento Baquedano
                        </option>
                                            <option value="BAC REGISTRO CIVIL">
                            BAC REGISTRO CIVIL
                        </option>
                                            <option value="BAC Registro Civil Alto Hospicio">
                            BAC Registro Civil Alto Hospicio
                        </option>
                                            <option value="BAC Remodelación Oscar Bonilla">
                            BAC Remodelación Oscar Bonilla
                        </option>
                                            <option value="BAC Resbaladero">
                            BAC Resbaladero
                        </option>
                                            <option value="BAC RTC">
                            BAC RTC
                        </option>
                                            <option value="BAC SAG">
                            BAC SAG
                        </option>
                                            <option value="Bac sagrado corazón">
                            Bac sagrado corazón
                        </option>
                                            <option value="BAC San Marcos">
                            BAC San Marcos
                        </option>
                                            <option value="BAC Santa Cecilia">
                            BAC Santa Cecilia
                        </option>
                                            <option value="BAC Secreduc">
                            BAC Secreduc
                        </option>
                                            <option value="BAC sector La Pampa">
                            BAC sector La Pampa
                        </option>
                                            <option value="BAC Sector Mirador">
                            BAC Sector Mirador
                        </option>
                                            <option value="BAC Sename">
                            BAC Sename
                        </option>
                                            <option value="bac sernac">
                            bac sernac
                        </option>
                                            <option value="BAC SERVICIO MEDICO LEGAL">
                            BAC SERVICIO MEDICO LEGAL
                        </option>
                                            <option value="BAC Servicios Ingeniería FiberCom">
                            BAC Servicios Ingeniería FiberCom
                        </option>
                                            <option value="BAC SIGLO 21">
                            BAC SIGLO 21
                        </option>
                                            <option value="Bac Simelec">
                            Bac Simelec
                        </option>
                                            <option value="BAC Simelec Alto Hospicio">
                            BAC Simelec Alto Hospicio
                        </option>
                                            <option value="BAC Sind. Cargadores 3 Zofri">
                            BAC Sind. Cargadores 3 Zofri
                        </option>
                                            <option value="BAC SITRAN">
                            BAC SITRAN
                        </option>
                                            <option value="BAC  Sn MARCOS">
                            BAC Sn MARCOS
                        </option>
                                            <option value="BAC SODIMAC">
                            BAC SODIMAC
                        </option>
                                            <option value="BAC SUPERMERCADO LIDER">
                            BAC SUPERMERCADO LIDER
                        </option>
                                            <option value="BAC TENIENTE MERINO">
                            BAC TENIENTE MERINO
                        </option>
                                            <option value="Bac terapeutico centro penitenciario a.h">
                            Bac terapeutico centro penitenciario a.h
                        </option>
                                            <option value="Bac Territorial Estratégico">
                            Bac Territorial Estratégico
                        </option>
                                            <option value="BAC Toma Boro 1">
                            BAC Toma Boro 1
                        </option>
                                            <option value="BAC Toma Boro 2">
                            BAC Toma Boro 2
                        </option>
                                            <option value="BAC toma dios es nuestra esperanza">
                            BAC toma dios es nuestra esperanza
                        </option>
                                            <option value="BAC Toma Hospital Hospicio">
                            BAC Toma Hospital Hospicio
                        </option>
                                            <option value="BAC toma por una vida digna">
                            BAC Toma por una vida digna
                        </option>
                                            <option value="BAC Toma Vivienda Digna">
                            BAC Toma Vivienda Digna
                        </option>
                                            <option value="BAC trabajadores barrio boliviano">
                            BAC trabajadores barrio boliviano
                        </option>
                                            <option value="BAC Transportes Vargas">
                            BAC Trans. Vargas
                        </option>
                                            <option value="BAC Transporte Línea 1">
                            BAC Transporte Línea 1
                        </option>
                                            <option value="BAC Transporte Línea 3">
                            BAC Transporte Línea 3
                        </option>
                                            <option value="BAC Transporte Línea 4">
                            BAC Transporte Línea 4
                        </option>
                                            <option value="BAC transportes Hualpen">
                            BAC transportes Hualpen
                        </option>
                                            <option value="BAC UCEN">
                            BAC UCEN
                        </option>
                                            <option value="BAC UNAP ALBERGUE DIA">
                            BAC UNAP ALBERGUE DIA
                        </option>
                                            <option value="BAC UNIMARC">
                            BAC UNIMARC
                        </option>
                                            <option value="BAC Unimarc Manuel Rodriguez">
                            BAC Unimarc Manuel Rodriguez
                        </option>
                                            <option value="BAC UNIÓN Y FUERZA">
                            BAC UNIÓN Y FUERZA
                        </option>
                                            <option value="BAC URAVIT">
                            BAC URAVIT
                        </option>
                                            <option value="BAC UTA">
                            BAC UTA
                        </option>
                                            <option value="BAC V comisaria de Carabineros Iquique">
                            BAC V comisaria de Carabineros Iquique
                        </option>
                                            <option value="BAC VI División Ejercito">
                            BAC VI División Ejercito
                        </option>
                                            <option value="BAC viajeros">
                            BAC viajeros
                        </option>
                                            <option value="BAC VIAJEROS INGRESO AEROPUERTOS">
                            BAC VIAJEROS INGRESO AEROPUERTOS
                        </option>
                                            <option value="BAC Vila's Motor">
                            BAC Vila's Motor
                        </option>
                                            <option value="BAC VILAS MOTOR (TARDE)">
                            BAC VILAS MOTOR (TARDE)
                        </option>
                                            <option value="BAC Villa Olímpica">
                            BAC Villa Olímpica
                        </option>
                                            <option value="BAC VTR SEREMI">
                            BAC VTR SEREMI
                        </option>
                                            <option value="BAC ZOFRI SEREMI">
                            BAC ZOFRI SREMI
                        </option>
                                            <option value="BAV JJVV caupolican">
                            BAV JJVV caupolican
                        </option>
                                            <option value="BOMBEROS Iqq">
                            BOMBEROS Iqq
                        </option>
                                            <option value="Bomberos Santa Rosa">
                            Bomberos Santa Rosa
                        </option>
                                            <option value="BOTTAI HNOS.">
                            BOTTAI HNOS.
                        </option>
                                            <option value="Búsqueda Activa MAHO">
                            Búsqueda Activa MAHO
                        </option>
                                            <option value="CIP-CRC">
                            CIP-CRC
                        </option>
                                            <option value="CMDIC">
                            CMDIC
                        </option>
                                            <option value="Colectiveros barrio boliviano">
                            Colectiveros barrio boliviano
                        </option>
                                            <option value="Colegio Marista">
                            Colegio Marista
                        </option>
                                            <option value="Compradores barrio boliviano">
                            Compradores barrio boliviano
                        </option>
                                            <option value="ELEAM HUERTO DE PAZ">
                            ELAM Huerto de Paz
                        </option>
                                            <option value="FERIA 10 ORIENTE">
                            FERIA 10 ORIENTE
                        </option>
                                            <option value="FERIA ITINERANTE">
                            FERIA ITINERANTE
                        </option>
                                            <option value="Feria Norte Sur">
                            Feria Norte Sur
                        </option>
                                            <option value="Gendarmería">
                            Gendarmería
                        </option>
                                            <option value="BAC Hospital día adulto COSAM">
                            Hospital día adulto COSAM
                        </option>
                                            <option value="Medico Quirurgico">
                            hospitalizado
                        </option>
                                            <option value="BAC Huantajaya 1">
                            Huantajaya 1
                        </option>
                                            <option value="Instituto de Previsión Social">
                            IPS
                        </option>
                                            <option value="JJVV 18 Septiembre">
                            JJVV 18 Septiembre
                        </option>
                                            <option value="BAC JJVV Chacaritas">
                            JJVV BAC Chacaritas
                        </option>
                                            <option value="JJVV Camanchaca">
                            JJVV Camanchaca
                        </option>
                                            <option value="JJVV Castro Ramos">
                            JJVV Castro Ramos
                        </option>
                                            <option value="JJVV El Morro">
                            JJVV El Morro
                        </option>
                                            <option value="JJVV Las Magnolias">
                            JJVV Las Magnolias
                        </option>
                                            <option value="JJVV Pueblo Nuevo">
                            JJVV Pueblo Nuevo
                        </option>
                                            <option value="JJVV Teniente Ibañez">
                            JJVV Teniente Ibañez
                        </option>
                                            <option value="Municipalidad Alto Hospicio">
                            MAHO
                        </option>
                                            <option value="Mercado Centenario">
                            Mercado
                        </option>
                                            <option value="Operativo Huara">
                            Operativo Huara
                        </option>
                                            <option value="Operativo Matilla">
                            Operativo Matilla
                        </option>
                                            <option value="Operativo Pica">
                            Operativo Pica
                        </option>
                                            <option value="Parcela Valdebenito">
                            Parcela Valdebenito
                        </option>
                                            <option value="POBLACIÓN ONCOLOGICA">
                            POBLACIÓN ONCOLOGICA
                        </option>
                                            <option value="Pozo Almonte DAF">
                            Pozo Almonte DAF
                        </option>
                                            <option value="Pozo Almonte DOM">
                            Pozo Almonte DOM
                        </option>
                                            <option value="BAC Pozo Almonte Empresa Emyc">
                            Pozo Almonte Empresa Emyc
                        </option>
                                            <option value="Registro Civil">
                            Registro Civil
                        </option>
                                            <option value="Residencia Sanitaria">
                            Residencia Sanitaria
                        </option>
                                            <option value="Residentes permanentes barrio boliviano">
                            Residentes permanentes barrio boliviano
                        </option>
                                            <option value="Salud del trabajador">
                            Salud del Trabajador
                        </option>
                                            <option value="SAMU">
                            SAMU
                        </option>
                                            <option value="SENAME, Unidad de Salud CIP CRC">
                            SENAME, Unidad de Salud CIP CRC
                        </option>
                                            <option value="Servicio de Salud Tarapacá  UHCIP MP">
                            Servicio de Salud Tarapacá  UHCIP MP
                        </option>
                                            <option value="BAC SII funcionarios">
                            SII funcionarios
                        </option>
                                            <option value="BAC Taxibuses A. Prat">
                            Taxi buses A. Prat
                        </option>
                                            <option value="TOMA DE MUESTRA BLUE LAB">
                            TOMA De MUESTRA BLUE LAB
                        </option>
                                            <option value="Toma de Muestra Domiciliaria">
                            Toma de Muestra Domiciliaria
                        </option>
                                            <option value="Urgencia">
                            Urgencia
                        </option>
                                            <option value="Viajeros barrio boliviano">
                            Viajeros barrio boliviano
                        </option>
                                    </select>
            </fieldset>

        </div>

        <hr>

                    <div class="form-row">

                <!-- <fieldset class="form-group col-6 col-md-3 alert-warning">
                    <label for="for_result_ifd_at">Fecha Resultado IFD</label>
                    <input type="datetime-local" class="form-control" id="for_result_ifd_at" name="result_ifd_at" value="" max="2021-09-01T23:59:59" disabled="disabled">
                </fieldset>

                <fieldset class="form-group col-6 col-md-2 alert-warning">
                    <label for="for_result_ifd">Resultado IFD</label>
                    <select name="result_ifd" id="for_result_ifd" class="form-control">
                        <option disabled="disabled"></option>
                        <option value="Negativo" disabled="disabled">
                            Negativo
                        </option>
                        <option value="Adenovirus" disabled="disabled">
                            Adenovirus
                        </option>
                        <option value="Influenza A" disabled="disabled">
                            Influenza A
                        </option>
                        <option value="Influenza B" disabled="disabled">
                            Influenza B
                        </option>
                        <option value="Metapneumovirus" disabled="disabled">
                            Metapneumovirus
                        </option>
                        <option value="Parainfluenza 1" disabled="disabled">
                            Parainfluenza 1
                        </option>
                        <option value="Parainfluenza 2" disabled="disabled">
                            Parainfluenza 2
                        </option>
                        <option value="Parainfluenza 3" disabled="disabled">
                            Parainfluenza 3
                        </option>
                        <option value="VRS" disabled="disabled">
                            VRS
                        </option>
                        <option value="No solicitado">
                            No solicitado
                        </option>
                    </select>
                </fieldset>


                <fieldset class="form-group col-6 col-md-2 alert-warning">
                    <label for="for_subtype">Subtipo</label>
                    <select name="subtype" id="for_subtype" class="form-control" disabled="disabled">
                        <option value=""></option>
                        <option value="H1N1">H1N1</option>
                        <option value="H3N2">H3N2</option>
                        <option value="INF B">INF B</option>
                    </select>
                </fieldset> -->

            </div>

            <div class="form-row">

                <fieldset class="form-group col-8 col-md-3 alert-danger">
                    <label for="for_pcr_sars_cov_2_at">Fecha Resultado Chagas</label>
                    <input type="datetime-local" class="form-control" id="for_pcr_sars_cov_2_at" name="pcr_sars_cov_2_at" value="" min="2021-08-04T01:53" max="2021-09-01T23:59:59">
                </fieldset>

                <fieldset class="form-group col-4 col-md-3 alert-danger">
                    <label for="for_pcr_sars_cov_2">Estado</label>
                    <select name="pcr_sars_cov_2" id="for_pcr_sars_cov_2" class="form-control">
                        <option value="pending" selected="">
                            Pendiente
                        </option>
                        <option value="negative">
                            Negativo
                        </option>
                        <option value="positive">
                            Positivo
                        </option>
                        <option value="rejected">
                            Rechazado
                        </option>
                        <option value="undetermined">
                            Indeterminado
                        </option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-12 col-md-6">
                    <label for="for_file">Archivo</label>
                    <div class="custom-file">
                        <input type="file" name="forfile" class="custom-file-input" id="forfile" lang="es" accept="application/pdf">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                    </div>
                                    </fieldset>
            </div>

                        <!-- <div class="form-row">
                <fieldset class="form-group col-6 col-md-1">
                    <label for="for_ct"> C. T.</label>
                    <input type="number" class="form-control" name="ct" step=".1" max="45" id="for_ct" value="">
                </fieldset>

                <fieldset class="form-group col-6 col-md-3">
                <label for="for_candit">Candidato a Secuenciación</label>
                <select name="candidate_for_sq" id="for_candidate_for_sq" class="form-control">
                    <option value=""></option>
                    <option value="1">Si</option>
                    <option value="0">No</option>                    
                </select>
            </fieldset>
            </div> -->
            
                <hr>

        <!-- <div class="form-row align-items-end">

            <fieldset class="form-group col-6 col-md-2">
                <label for="for_functionary">Funcionario de Salud</label>
                <select name="functionary" id="for_functionary" class="form-control">
                    <option value=""></option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-6 col-md-1">
                <label for="for_symptoms">Sintomas</label>
                <select name="symptoms" id="for_symptoms" class="form-control">
                    <option value=""></option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-8 col-md-3">
                <label for="for_symptoms_at">Fecha Inicio de Sintomas</label>
                <input type="datetime-local" class="form-control" id="for_symptoms_at" name="symptoms_at" value="" max="2021-09-01T23:59:59">
            </fieldset>

            <fieldset class="form-group col-4 col-md-1">
                <label for="for_gestation">Gestante *</label>
                <select name="gestation" id="for_gestation" class="form-control" required="">
                    <option value=""></option>
                    <option value="0" selected="">No</option>
                    <option value="1">Si</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-6 col-md-1">
                <label for="for_gestation_week">Semanas de gestación</label>
                <input type="number" class="form-control" name="gestation_week" id="for_gestation_week" value="">
            </fieldset>

            <fieldset class="form-group col-6 col-md-2">
                <label for="for_close_contact">Contacto estrecho</label>
                <select name="close_contact" id="for_close_contact" class="form-control">
                    <option value=""></option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-4 col-md-2">
                <label for="for_case_type">Tipo de caso</label>
                <select name="case_type" id="for_case_type" class="form-control">
                    <option value=""></option>
                    <option value="Atención médica" selected="">Atención médica</option>
                    <option value="Busqueda activa">Busqueda activa</option>
                </select>
            </fieldset>

            
        </div> -->
        <div class="form-row">
            <fieldset class="form-group col-6 col-md-4">
                <label for="for_status">Estado</label>
                <p>
                    <strong>Ambulatorio</strong>
                    <a href="https://i.saludiquique.cl/monitor/patients/7295/edit"> Cambiar </a>
                </p>
            </fieldset>

        </div>

        <div class="form-row">

            <fieldset class="form-group col-12 col-md-6">
                <label for="for_observation">Observación</label>
                <input type="text" class="form-control" name="observation" id="for_observation" value="">
            </fieldset>


            <!-- <fieldset class="form-group col-6 col-md-2">
                <label for="for_paho_flu">PAHO FLU</label>
                <input type="number" class="form-control" name="paho_flu" id="for_paho_flu" value="">
            </fieldset>

            <fieldset class="form-group col-6 col-md-2">
                <label for="for_run_medic">Run Médico Solicitante *</label>
                <input type="text" class="form-control" name="run_medic" id="for_run_medic" value="">
            </fieldset>

            <fieldset class="form-group col-6 col-md-2">
                <label for="for_epivigila" title="Si es BAC: rutUsuario-folioBAC, 
si no, solo nro. epivigila">Epivigila *</label>
                <input type="text" class="form-control" id="for_epivigila" name="epivigila" maxlength="255" value="16560583" title="Si es BAC: rutUsuario-folioBAC, 
si no, solo nro. epivigila">
            </fieldset> -->

        </div>

        <hr>


        <h4>Entrega de resultados a paciente</h4>

        <div class="form-row">

            <fieldset class="form-group col-6 col-md-4">
                <label for="for_notification_at">Fecha de notificación</label>
                <input type="date" class="form-control" name="notification_at" id="for_notification_at" value="">
            </fieldset>

            <fieldset class="form-group col-6 col-md-4">
                <label for="for_discharged_at">Fecha de alta</label>
                <input type="date" class="form-control" name="discharged_at" id="for_discharged_at" value="">
            </fieldset>

            <fieldset class="form-group col-12 col-md-4">
                <label for="for_notification_mechanism">Mecanismo de Notificación</label>
                <select name="notification_mechanism" id="for_notification_mechanism" class="form-control">
                    <option></option>
                    <option value="Pendiente">
                        Pendiente
                    </option>
                    <option value="Llamada telefónica">
                        Llamada telefónica
                    </option>
                    <option value="Correo electrónico">
                        Correo electrónico
                    </option>
                    <option value="Visita domiciliaria">
                        Visita domiciliaria
                    </option>
                    <option value="Centro de salud">
                        Centro de salud
                    </option>
                    <option value="Carta certificada">
                        Carta certificada
                    </option>
                </select>
            </fieldset>
        </div>


        <input type="hidden" name="referer" value="https://i.saludiquique.cl/monitor/lab/suspect_cases/index/1?&amp;text=&amp;pendientes=on">

        <button type="submit" class="btn btn-primary">Guardar</button>

        <a class="btn btn-outline-secondary" href="https://i.saludiquique.cl/monitor/lab/suspect_cases/index">
            Cancelar
        </a>
    </form>
    
    <form method="POST" class="form-horizontal" action="https://i.saludiquique.cl/monitor/lab/suspect_cases/519034">
        <input type="hidden" name="_token" value="ePpUXDtmXbqBgRArshkX8lA1jKEhi3aNac3ClRvp">
        <input type="hidden" name="_method" value="DELETE">
    </form>
    
    <form method="POST" id="derive_form" action="https://i.saludiquique.cl/monitor/lab/suspect_cases/derive">
        <input type="hidden" name="_token" value="ePpUXDtmXbqBgRArshkX8lA1jKEhi3aNac3ClRvp">
        <input type="hidden" name="_method" value="POST">
    </form>
    
    <h4 class="mt-4">Otros Exámenes realizados</h4>

    <table class="table table-sm table-responsive-xl table-bordered small mb-4 mt-4">
        <thead>
        <tr>
            <th>Id</th>
            <th>Establecimiento</th>
            <th>Fecha muestra</th>
            <th>Fecha resultado</th>
            <th>Resultado</th>
            <th>Epivigila</th>
            <th>Observacion</th>
        </tr>
        </thead>
        <tbody>
                    <tr>
                <td>
                    <a href="https://i.saludiquique.cl/monitor/lab/suspect_cases/8146/edit">
                        8146
                    </a>
                </td>
                <td>CESFAM Cirujano Videla</td>
                <td>2020-05-20 00:00:00</td>
                <td>2020-05-21 06:30:06</td>
                <td>Positivo</td>
                <td>413046</td>
                <td></td>
            </tr>
                    <tr>
                <td>
                    <a href="https://i.saludiquique.cl/monitor/lab/suspect_cases/258172/edit">
                        258172
                    </a>
                </td>
                <td>CESFAM Cirujano Aguirre</td>
                <td>2021-03-11 14:48:09</td>
                <td>2021-03-12 02:33:00</td>
                <td>Negativo</td>
                <td>9223356</td>
                <td></td>
            </tr>
                    <tr>
                <td>
                    <a href="https://i.saludiquique.cl/monitor/lab/suspect_cases/437516/edit">
                        437516
                    </a>
                </td>
                <td>SAPU Cirujano Aguirre</td>
                <td>2021-07-06 19:24:23</td>
                <td>2021-07-07 13:06:00</td>
                <td>Negativo</td>
                <td>14658872</td>
                <td>SIN OBS</td>
            </tr>
                    <tr>
                <td>
                    <a href="https://i.saludiquique.cl/monitor/lab/suspect_cases/491351/edit">
                        491351
                    </a>
                </td>
                <td>Hospital Ernesto Torres Galdames</td>
                <td>2021-08-13 03:16:02</td>
                <td>2021-08-13 11:24:00</td>
                <td>Negativo</td>
                <td>15961183</td>
                <td>TAMIZAJE DOLOR ABDOMINAL</td>
            </tr>
                    <tr>
                <td>
                    <a href="https://i.saludiquique.cl/monitor/lab/suspect_cases/511427/edit">
                        511427
                    </a>
                </td>
                <td>Hospital Ernesto Torres Galdames</td>
                <td>2021-08-26 12:03:30</td>
                <td>2021-08-27 00:12:00</td>
                <td>Negativo</td>
                <td>16391485</td>
                <td></td>
            </tr>
                </tbody>
    </table>

    

@endsection

@section('custom_js')

@endsection