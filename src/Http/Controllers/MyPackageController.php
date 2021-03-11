<?php

namespace :uc:vendor\:uc:package\Http\Controllers;

// use App\Patient;
use :uc:vendor\:uc:package\Http\Models\:uc:package;
use :uc:vendor\:uc:package\Http\Requests\:uc:packageRequest;
use :uc:vendor\:uc:package\Http\Repositories\:uc:packageRepository;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class :uc:packageController extends Controller
{
    protected $:sc:packageVar ;
    public function __construct(:uc:package $:sc:package)
    {
        $this->:sc:packageVar = $:sc:package;
        
    }
    public function index(){

    }
}
