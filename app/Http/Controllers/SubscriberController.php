<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Mail\SubscriptionConfirmation;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    //         public function subscribe(Request $request)
//     {
// 
//         //         // validating the request
// //         $validator = Validator::make($request->all(), [
// //             'email' => 'required|email|unique:subscribers,email',
// //         ], [
// //             'email.required' => 'The email field is required.',
// //             'email.email' => 'Please provide a valid email address.',
// //             'email.unique' => 'This email is already subscribed.',
// //         ]);
// // 
// //         // checking for validation errors
// //         if ($validator->fails()) {
// //             return response()->json([
// //                 'status' => false,
// //                 'errors' => $validator->errors()
// //             ], 422);
// //         }
// // 
// //         try {
// //             // storing the subscriber
// //             $subscriber = Subscriber::create([
// //                 'email' => $request->input('email'),
// //             ]);
// // 
// //             // sending confirmation email
// //             Mail::to($subscriber->email)->send(new SubscriptionConfirmation());
// // 
// // 
// //             return response()->json([
// //                 'status' => true,
// //                 'message' => 'Subscription successful. Please check your email.'
// //             ], 200);
// //         } catch (\Exception $e) {
// //             return response()->json([
// //                 'status' => false,
// //                 'message' => 'An error occurred during subscription.'
// //             ], 500);
// //         }
//     }



    //using formRequest
    public function subscribe(SubscribeRequest $request)
    {
        try {
            $subscriber = Subscriber::create($request->validated());

            Mail::to($subscriber->email)->send(new SubscriptionConfirmation());

            return response()->json([
                'status' => true,
                'message' => 'Subscription successful. Please check your email.'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred during subscription.'
            ], 500);
        }
    }
}
