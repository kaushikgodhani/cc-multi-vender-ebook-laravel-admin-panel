<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria\Users\DriversCriteria;
use App\DataTables\DriverDataTable;

class VendorContoller extends Controller
{
    //
    // public function index(DriverDataTable $driverDataTable)
    // {
    //     return $driverDataTable->render('drivers.index');
    // }
    public function campaign(FaqDataTable $faqDataTable)
    {
        return view('campaign.campaign');
    }
}
