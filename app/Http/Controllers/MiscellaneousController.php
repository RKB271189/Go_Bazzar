<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Mail\Miscellaneous;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MiscellaneousController extends Controller
{
    public function sendEmail(MailRequest $request)
    {
        try {
            $params = $request->except('_token', '_method');
            $tag = $params['tag'];
            unset($params['tag']);
            if ($tag === 'my-portfolio') {
                Mail::mailer('portfolio')->to('rahul.baraiya05@gmail.com')->send(new Miscellaneous($tag, $params));
                Mail::mailer('portfolio')->to($params['email'])->send(new Miscellaneous('thanking', $params));
            } else {
            }
            return response()->json(['message' => 'Message sent successfully'], 200);
        } catch (Exception $ex) {
            Log::channel('user_activity_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
