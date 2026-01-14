<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class SirhExampleExport implements FromArray
{
    public function array(): array
    {
        return [
            [
                'rut_programable','dv','nombre','id_deis','ausentismo_sino','motivo_maternales_psgs_comisiones_de_estudio',
                'titulo_profesional_desempeno','especialidad_sis','correlativo_contrato','ley','sistema_de_turno_sino',
                'hrs_semanales_contratadas','horas_efectivas_al_centro','tiempo_de_colacion_semanal_min','tiempo_de_permiso_gremial_semanal_min',
                'tiempo_de_lactancia_semanal_min','observaciones_debe_identificar_liberado_de_guardia_lgperiodo_asistencial_obligatoriopaobecario_beca',
                'feriados_legales','dias_descanso_compensatorio_ley_urgencia','dias_de_permisos_administrativos','descanso_reparatorio_covid',
                'dias_de_congreso_o_capacitacion','fecha_inicio_contrato_ddmmaaaa','fecha_termino_contrato_ddmmaaaa','fecha_alejamiento_ddmmaaaa'
            ],
            [
                '12345678', // rut_programable
                '9', // dv
                'PEREZ GONZALEZ JUAN CARLOS', // nombre
                '102100', // id_deis
                'No', // ausentismo_sino
                'Licencia médica', // motivo_maternales_psgs_comisiones_de_estudio
                'Médico Cirujano', // titulo_profesional_desempeno
                'Medicina Interna', // especialidad_sis
                '1', // correlativo_contrato
                '19664', // ley
                'No', // sistema_de_turno_sino
                '44', // hrs_semanales_contratadas
                '44', // horas_efectivas_al_centro
                '180', // tiempo_de_colacion_semanal_min
                '0', // tiempo_de_permiso_gremial_semanal_min
                '0', // tiempo_de_lactancia_semanal_min
                'Sin observaciones', // observaciones_debe_identificar_liberado_de_guardia_lgperiodo_asistencial_obligatoriopaobecario_beca
                '15', // feriados_legales
                '2', // dias_descanso_compensatorio_ley_urgencia
                '5', // dias_de_permisos_administrativos
                '0', // descanso_reparatorio_covid
                '3', // dias_de_congreso_o_capacitacion
                // '44927', // fecha_inicio_contrato_ddmmaaaa (Excel serial, 01/01/2026)
                // '45291', // fecha_termino_contrato_ddmmaaaa (Excel serial, 31/12/2026)
                '46023', // (Excel serial) 01/01/2026
                '46387', // (Excel serial) 31/12/2026
                '' // fecha_alejamiento_ddmmaaaa (opcional)
            ],
            [
                '87654321', // rut_programable
                'K', // dv
                'SOTO RAMIREZ MARIA ELENA', // nombre
                '102100', // id_deis
                'Si', // ausentismo_sino
                'Maternidad', // motivo_maternales_psgs_comisiones_de_estudio
                'Matrona', // titulo_profesional_desempeno
                'Obstetricia', // especialidad_sis
                '2', // correlativo_contrato
                '18834', // ley
                'Si', // sistema_de_turno_sino
                '44', // hrs_semanales_contratadas
                '44', // horas_efectivas_al_centro
                '120', // tiempo_de_colacion_semanal_min
                '30', // tiempo_de_permiso_gremial_semanal_min
                '0', // tiempo_de_lactancia_semanal_min
                'Permiso maternal', // observaciones_debe_identificar_liberado_de_guardia_lgperiodo_asistencial_obligatoriopaobecario_beca
                '20', // feriados_legales
                '1', // dias_descanso_compensatorio_ley_urgencia
                '2', // dias_de_permisos_administrativos
                '0', // descanso_reparatorio_covid
                '2', // dias_de_congreso_o_capacitacion
                '46023', // (Excel serial) 01/01/2026
                '46387', // (Excel serial) 31/12/2026
                '' // fecha_alejamiento_ddmmaaaa (opcional)
            ],
            [
                '11223344', // rut_programable
                '5', // dv
                'ROJAS PEREZ LUIS ALFONSO', // nombre
                '102100', // id_deis
                'No', // ausentismo_sino
                'Ninguno', // motivo_maternales_psgs_comisiones_de_estudio
                'Enfermero', // titulo_profesional_desempeno
                'Enfermería', // especialidad_sis
                '3', // correlativo_contrato
                '15076', // ley
                'No', // sistema_de_turno_sino
                '22', // hrs_semanales_contratadas
                '22', // horas_efectivas_al_centro
                '150', // tiempo_de_colacion_semanal_min
                '0', // tiempo_de_permiso_gremial_semanal_min
                '0', // tiempo_de_lactancia_semanal_min
                'Sin observaciones', // observaciones_debe_identificar_liberado_de_guardia_lgperiodo_asistencial_obligatoriopaobecario_beca
                '10', // feriados_legales
                '0', // dias_descanso_compensatorio_ley_urgencia
                '3', // dias_de_permisos_administrativos
                '0', // descanso_reparatorio_covid
                '1', // dias_de_congreso_o_capacitacion
                '46023', // (Excel serial) 01/01/2026
                '46387', // (Excel serial) 31/12/2026
                '' // fecha_alejamiento_ddmmaaaa (opcional)
            ],
            [
                '22334455', // rut_programable
                '7', // dv
                'GARCIA LOPEZ ANA ISABEL', // nombre
                '102100', // id_deis
                'No', // ausentismo_sino
                'Ninguno', // motivo_maternales_psgs_comisiones_de_estudio
                'Kinesiólogo', // titulo_profesional_desempeno
                'Kinesiología', // especialidad_sis
                '4', // correlativo_contrato
                '19664', // ley
                'No', // sistema_de_turno_sino
                '22', // hrs_semanales_contratadas
                '22', // horas_efectivas_al_centro
                '100', // tiempo_de_colacion_semanal_min
                '0', // tiempo_de_permiso_gremial_semanal_min
                '0', // tiempo_de_lactancia_semanal_min
                'Sin observaciones', // observaciones_debe_identificar_liberado_de_guardia_lgperiodo_asistencial_obligatoriopaobecario_beca
                '12', // feriados_legales
                '2', // dias_descanso_compensatorio_ley_urgencia
                '4', // dias_de_permisos_administrativos
                '0', // descanso_reparatorio_covid
                '2', // dias_de_congreso_o_capacitacion
                '46023', // (Excel serial) 01/01/2026
                '46387', // (Excel serial) 31/12/2026
                '' // fecha_alejamiento_ddmmaaaa (opcional)
            ],
            [
                '33445566', // rut_programable
                '8', // dv
                'FERNANDEZ DIAZ CARLOS EDUARDO', // nombre
                '102100', // id_deis
                'No', // ausentismo_sino
                'Ninguno', // motivo_maternales_psgs_comisiones_de_estudio
                'Tecnólogo Médico', // titulo_profesional_desempeno
                'Laboratorio Clínico', // especialidad_sis
                '5', // correlativo_contrato
                'Honorarios', // ley
                'No', // sistema_de_turno_sino
                '44', // hrs_semanales_contratadas
                '44', // horas_efectivas_al_centro
                '180', // tiempo_de_colacion_semanal_min
                '0', // tiempo_de_permiso_gremial_semanal_min
                '0', // tiempo_de_lactancia_semanal_min
                'Sin observaciones', // observaciones_debe_identificar_liberado_de_guardia_lgperiodo_asistencial_obligatoriopaobecario_beca
                '15', // feriados_legales
                '2', // dias_descanso_compensatorio_ley_urgencia
                '5', // dias_de_permisos_administrativos
                '0', // descanso_reparatorio_covid
                '3', // dias_de_congreso_o_capacitacion
                '46023', // (Excel serial) 01/01/2026
                '46387', // (Excel serial) 31/12/2026
                '' // fecha_alejamiento_ddmmaaaa (opcional)
            ]
        ];
    }
}
