<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use App\Models\Vote;
use Illuminate\Http\Request;
use Response;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('create-feedback');
    }

    public function store(StoreFeedbackRequest $request)
    {
        Feedback::create($request->getData());
        return redirect()->route('home');
    }

    public function comment(Feedback $feedback)
    {
        return view('comment-feedback', compact('feedback'));
    }

    public function saveComment(Request $request, Feedback $feedback)
    {
        $feedback->comment($request->content);
        return redirect()->route('home');
    }

    public function vote(Request $request)
    {
        $vote = Vote::firstOrCreate([
            'user_id' =>  auth()->id(),
            'feedback_id' => $request->feedback_id
        ]);
        return Response::json([
            'success' => true,
            'data' => $vote
        ]);
    }
}
