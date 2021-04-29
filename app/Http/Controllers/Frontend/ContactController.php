<?php

namespace App\Http\Controllers\Frontend;
use App\Models\SiteInfo;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(Request $request)
    { 
        if ($request->isMethod('post')) {
            $contact = new Contact;
            $this->validate($request, [
                'name' => 'required|string|min:3',
                'subject' => 'required|string|min:5',
                'email' => 'required|email:rfc,dns',
                'message' => 'required|string|min:10|max:300'
            ]);

            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            $contact->save();
            return redirect(route('contact'))->with('flash_success','
            	<script>
				Toast.fire({
				  icon: `success`,
				  title: `Your message has been sent. Thank you!`
				})
				</script>
				');
        }
        $site_info = SiteInfo::firstOrFail();
        return view("public.contact")->with(compact('site_info'));
    }
}
