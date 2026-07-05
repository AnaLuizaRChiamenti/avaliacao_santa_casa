<?php

namespace App\Http\Controllers;

class ModuleController extends Controller
{
    public function setoresHospitalares()
    {
        return view('modules.setores-hospitalares');
    }

    public function especialidadesMedicas()
    {
        return view('modules.especialidades-medicas');
    }

    public function equipamentos()
    {
        return view('modules.equipamentos');
    }

    public function unidadesAssistenciais()
    {
        return view('modules.unidades-assistenciais');
    }
}
