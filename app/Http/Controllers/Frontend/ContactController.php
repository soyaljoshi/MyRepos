<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Http\Requests;
use App\Models\Setting;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\Menu;
use App\Mailers\AppMailer;


class ContactController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // $page = Page::contact();
        // $contacts = Contact::all()->groupBy('type');
        // $contactTypes = Contact::types();
        // $settings = Setting::lists('value', 'slug');
 $menu = Menu::select('name','url')->orderBy('order')->get();
        return view('frontend.contact.index',compact('menu'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(AppMailer $mailer, Request $request)
    {     
        $mailer->sendFeedback($request);//for Sending mail
        //$this->dispatch(new SendFeedbackMail($mailer,$user,$request));
        
       return redirect()->back()->withSuccess('Thank you for your feedback!');
    }
}