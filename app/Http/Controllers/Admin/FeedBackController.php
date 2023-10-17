<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FeedBackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with('user')->get();

        return view('backend.feedbacks.index', compact('feedbacks'));
    }

    public function destroy(Feedback $feedback)
    {
        if(!$feedback) return Redirect::route('admin.feedbacks')->with('error', 'Opps Something went wrong!!');
        
        $feedback->delete();
        return Redirect::route('admin.feedbacks')->with('success', 'Data Deleted Successfully');
    }
}
