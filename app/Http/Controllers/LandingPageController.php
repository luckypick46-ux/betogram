<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use App\Security_questions;
use App\cms_email_templates;
use App\Countries;
use App\Website_page_setting;
use App\Faq_detail;
use App\Country_codes;
use App\Helpers\CountryList;
use Mail;
use Session;

class LandingPageController extends Controller
{
    public function index()
	{
        if(Session::get('user_id') != '')
        {
            return redirect(url('home'));
        }
        
        // Try to get countries, fallback to fallback country list
        try {
            $get_country = Countries::get();
        } catch (\Exception $e) {
            $get_country = CountryList::all();
        }
        
        // Try to get security questions, fallback to empty array
        try {
            $records = Security_questions::where('status', 1)->get();
        } catch (\Exception $e) {
            $records = collect([]);
        }
        
        return view('login', compact('get_country','records'));
	}
    
    public function PreRegistration()
    {
        // Try to get security questions, fallback to empty array
        try {
            $records = Security_questions::where('status', 1)->get();
        } catch (\Exception $e) {
            $records = collect([]);
        }
        try {
            $get_country = Countries::get();
        } catch (\Exception $e) {
            $get_country = CountryList::all();
        }
        return view('registration_modal')->with('records',$records)->with('get_country',$get_country);
    }
    
    public function check_username(Request $request)
    {
         $username = $request->input('userName');
         if($username !='')
         {
            try {
                $records = Users::where('user_name',$username)->get()->toArray();
                if(count($records) > 0){
                    echo 'has';
                }else{
                    echo 'no';
                }
            } catch (\Exception $e) {
                echo 'no';
            }
         }
    }
    
    public function GetCountryCode(Request $request)
    {
        $country_id = $request->input('countryId');
        
        // Try to get country codes, fallback to fallback country list
        try {
            $countryCodeDetails = Country_codes::all();
        } catch (\Exception $e) {
            $countryCodeDetails = CountryList::all();
        }
        
        return view('selectedCountryCode',compact('countryCodeDetails','country_id'));
    }
    
    public function check_email(Request $request)
    {
         $email = $request->input('emailid');
         if($email !='')
         {
            try {
                $records = Users::where('email',$email)->get()->toArray();
                if(count($records) > 0){
                    echo 'has';
                }else{
                    echo 'no';
                }
            } catch (\Exception $e) {
                echo 'no';
            }
         }
    }
    
    public function check_phoneNumber(Request $request)
    {
         $phoneNumber = $request->input('phoneNumber');
         if($phoneNumber !='')
         {
            try {
                $records = Users::where('contact_no',$phoneNumber)->get()->toArray();
                if(count($records) > 0){
                    echo 'has';
                }else{
                    echo 'no';
                }
            } catch (\Exception $e) {
                echo 'no';
            }
         }
    }
    
    public function service()
    {
        try {
            $records = Website_page_setting::where('cms_page_title', 'Service')->get();
        } catch (\Exception $e) {
            $records = [];
        }
        return view('service')->with('records',$records);
    }
    
    public function about_us()
    {
        try {
            $records = Website_page_setting::where('cms_page_title', 'About')->get();
        } catch (\Exception $e) {
            $records = [];
        }
        return view('about_us')->with('records',$records);
    }
    
    public function contact()
    {
        try {
            $records = Website_page_setting::where('cms_page_title', 'Contact')->get();
        } catch (\Exception $e) {
            $records = [];
        }
        return view('contact')->with('records',$records);
    }
    
    public function faq()
    {
        try {
            $records = Faq_detail::where('status', '1')->get()->toArray();
        } catch (\Exception $e) {
            $records = [];
        }
        return view('faq')->with('records',$records);
    }
}
?>
