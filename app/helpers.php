<?php

use App\Models\Some\ExternalIncomingSic;
use \Carbon\Carbon;

function active($route_name) {
    echo request()->routeIs($route_name) ? 'active' : '';
}

function fdatetime($string) {
    return Carbon::createFromFormat('Y-m-d\TH:i:sP', $string)->format('d-m-Y H:i');
}

//Funciones para WS SOAP Rayen
function BuscarSic($request){
    $externalIncomingSic = ExternalIncomingSic::query()
    ->where('pciNumSicGes', $request['pcsNumSicGes'])
    ->where('pcsCodEstab', $request['pcsCodEstab'])
    ->first();

    if($externalIncomingSic){
        return array(
            'VLmensaje' => 'Se encontro SIC numSicGes: ' . $externalIncomingSic->pciNumSicGes . ' codEstab: ' . $externalIncomingSic->pcsCodEstab,
        );
    }
    else {
        return array(
            'VLmensaje' => 'No se encontro SIC con numSicGes: ' . $request['pcsNumSicGes'] . ' codEstab:' . $request['pcsCodEstab'],
        );
    }
}

function GuardarSic($request){
    $externalIncomingSic = new ExternalIncomingSic();

    $externalIncomingSic->sic_number = $request['pciNumSic'];
    $externalIncomingSic->sic_number_ges = $request['pciNumSicGes'];
    $externalIncomingSic->request_date = $request['pcdFechaSolic'];
    $externalIncomingSic->request_time = $request['pcsHoraSolic'];
    $externalIncomingSic->entry_date = $request['pcsFechaDigitacion'];
    $externalIncomingSic->entry_time = $request['pcsHoraDigitacion'];
    $externalIncomingSic->health_service_code = $request['pcsCodSSalud'];
    $externalIncomingSic->establishment_code = $request['pcsCodEstab'];
    $externalIncomingSic->specialty_code = $request['pcsCodEspec'];
    $externalIncomingSic->patient_name = $request['pcsNombrePac'];
    $externalIncomingSic->patient_fathers_family = $request['pcsApellidoPat'];
    $externalIncomingSic->patient_mothers_family = $request['pcsApellidoMat'];
    $externalIncomingSic->patient_document_type = $request['pciTipoDocumento'];
    $externalIncomingSic->patient_rut = $request['pciRutPac'];
    $externalIncomingSic->patient_dv = $request['pcsDigVerPac'];
    $externalIncomingSic->patient_document_number = $request['pcsNumDocumento'];
    $externalIncomingSic->patient_sex_indicator = $request['pcsIndSexoPac'];
    $externalIncomingSic->patient_birthday = $request['pcdFechNacPac'];
    $externalIncomingSic->patient_address = $request['pcsDomicilioPac'];
    $externalIncomingSic->patient_street_type = $request['pcsTipoVia'];
    $externalIncomingSic->patient_street_name = $request['pcsNombreVia'];
    $externalIncomingSic->patient_commune_code = $request['pcsCodComunaPac'];
    $externalIncomingSic->patient_phone_1 = $request['pciTelefono1'];
    $externalIncomingSic->patient_phone_2 = $request['pciTelefono2'];
    $externalIncomingSic->derivation_establishment_code = $request['pcsCodEstabDer'];
    $externalIncomingSic->derivation_specialty_code = $request['pcsCodEspecDer'];
    $externalIncomingSic->motive_indicator = $request['pciIndMotivo'];
    $externalIncomingSic->motive_consultation_detail = $request['pcsDetMotivoConsulta'];
    $externalIncomingSic->diagnosis_hypothesis = $request['pcsNomHipDiag'];
    $externalIncomingSic->diagnosis_code = $request['pcsCodDiag'];
    $externalIncomingSic->auge_indicator = $request['pcsIndAuge'];
    $externalIncomingSic->auge_problem = $request['pcsNomProblemAuge'];
    $externalIncomingSic->auge_subproblem = $request['pcsSubProblemAuge'];
    $externalIncomingSic->diagnosis_basis = $request['pcsNomFundDiag'];
    $externalIncomingSic->exam_name = $request['pcsNomExamen'];
    $externalIncomingSic->professional_rut = $request['pciCodRutProf'];
    $externalIncomingSic->professional_dv = $request['pcsDvRutProf'];
    $externalIncomingSic->professional_name = $request['pcsNombreProf'];
    $externalIncomingSic->professional_fathers_family = $request['pcsApePatProf'];
    $externalIncomingSic->professional_mothers_family = $request['pcsApeMatProf'];
    $externalIncomingSic->professional_job_title = $request['pcsTituloProf'];
    $externalIncomingSic->urgency_indicator = $request['pcsIndUrgencia'];
    $externalIncomingSic->titular_rut = $request['pciRutTitular'];
    $externalIncomingSic->titular_dv = $request['pcsDigVerTit'];
    $externalIncomingSic->titular_name = $request['pcsNombreTit'];
    $externalIncomingSic->titular_fathers_name = $request['pcsApePatTit'];
    $externalIncomingSic->titular_mothers_name = $request['pcsApeMatTit'];
    $externalIncomingSic->pension_system = $request['pcsSistemaPrevisional'];
    $externalIncomingSic->pension_system_categorization = $request['pcsIndPrevis'];
    $externalIncomingSic->pension_system_expiration = $request['pcdVencPrev'];
    $externalIncomingSic->fonasa_number = $request['pciNumFonasa'];
    $externalIncomingSic->certifying_institution_rut = $request['pciRutIns'];
    $externalIncomingSic->prais = $request['pciPrais'];
    $externalIncomingSic->patient_social_name = $request['pcsNombreSocial'];
    $externalIncomingSic->tutor_name = $request['pcsNombreTutor'];
    $externalIncomingSic->patient_email = $request['pcsEmail'];
    $externalIncomingSic->patient_nationality = $request['pcsNacionalidad'];
    $externalIncomingSic->patient_ethnicity = $request['pcsEtnia'];
    $externalIncomingSic->patient_marital_status = $request['pcsEstadoCivil'];
    $externalIncomingSic->save();

    return array(
        'indEstado' => 1,
        'codValor' => 'Ingresado correctamente',
        'descripcion' => 'Descripcion de prueba'
    );
}

function generateAge($year, $month) { // TODO: Eliminar a futuro
    $age = null;
    $valueYear = $year ? $year : 0;
    $valueMonth = $month ? (int)$month : 0;

    if($valueMonth >= 1 && $valueMonth <= 9 )
    {
        $valueMonth = "0" . (string)$valueMonth;
    }

    if($year != null or $month != null)
    {
        $age = (float)($valueYear . '.' . $valueMonth);
    }

    return $age;
}

function translateSex($sex) {
    switch ($sex) {
        case 'MALE':
            $translate = 'MASCULINO';
            break;
        case 'FEMALE':
            $translate = 'FEMENINO';
            break;
        case 'UNKNOWN':
            $translate = 'DESCONOCIDO';
            break;
        case 'OTHER':
            $translate = 'OTROS';
            break;
        default:
            $translate = 'NO INFORMADO';
            break;
    }
    return $translate;
}
