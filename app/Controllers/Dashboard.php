<?php
namespace App\Controllers;

use App\Models\BiodataModel; // Import the BiodataModel
use App\Models\SurveiModel;  // Import the SurveiModel
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $biodataModel;   // Define biodata model
    protected $surveiModel;    // Define survei model

    public function __construct()
    {
        $this->biodataModel = new BiodataModel(); // Initialize biodata model
        $this->surveiModel = new SurveiModel();   // Initialize survei model
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        // Get counts for biodata and surveys
        $data['biodatacount'] = $this->biodataModel->countAll(); // Replace with actual method
        $data['survei'] = $this->surveiModel->countAll(); // Replace with actual method

        // Return the view with the prepared data
        return view('dashboard/index', $data);
    }
}
