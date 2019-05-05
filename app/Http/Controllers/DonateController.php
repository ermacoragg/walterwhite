<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donation;

class DonateController extends Controller
{
    public function index(){
        return view('donate');
    }
    
    public function add(){
                
        $donationPost = $_POST['donation'];
        
        $donationPost = json_decode($donationPost);
        
        $donation = new Donation();
        
        $donation->firstName = $donationPost->firstName;
        $donation->lastName = $donationPost->lastName;
        $donation->email = $donationPost->email;
        $donation->comment = $donationPost->comment;
        $donation->amount = $donationPost->amount;
        
        if($donation->save()) {
            return "true";
        }
        
        return "false";
    }
    
}
