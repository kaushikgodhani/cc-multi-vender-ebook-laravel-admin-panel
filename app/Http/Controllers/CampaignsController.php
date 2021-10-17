<?php

namespace App\Http\Controllers;


use App\DataTables\CampaignsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Repositories\FaqRepository;
use App\Repositories\CustomFieldRepository;
use App\Repositories\FaqCategoryRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class CampaignsController extends Controller
{

        public function index(CampaignsDataTable $CampaignsDataTable)
        {
            return $CampaignsDataTable->render('Campaigns.Campaigns');
        }
    
}
