<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with(['user', 'votes'])->paginate(6);
        return view('welcome', compact('feedbacks'));    
    }
}
