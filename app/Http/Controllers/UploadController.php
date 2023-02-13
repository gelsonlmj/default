<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use App\Services\UploadService;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    /**
     * @var UploadService
     */
    var $uploadService;

    /**
     * @var ClientService
     */
    var $clientService;
 
    public function __construct()
    {
        $this->uploadService = new UploadService();
        $this->clientService = new ClientService();
    }
 
    public function index()
    {
        return view('upload/index', ['clients' => $this->clientService->getIdAndName()]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'client_id' => 'required'
        ]);

        if (!$request->has('file')) {
            return 'Arquivo não enviado';
        }
        $this->uploadService->save($request->client_id, file($request->file));

        return redirect()->route('upload')
                ->with('success','Importação agendada com sucesso');
    }
}
