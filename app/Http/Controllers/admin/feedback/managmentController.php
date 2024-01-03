<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return response()->json($feedbacks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'approved' => 'boolean',
        ]);

        $feedback = new Feedback();
        $feedback->content = $request->input('content');
        $feedback->approved = $request->input('approved', false);
        $feedback->save();

        return response()->json($feedback, 201);
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return response()->json($feedback);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
            'approved' => 'boolean',
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->content = $request->input('content');
        $feedback->approved = $request->input('approved', false);
        $feedback->save();

        return response()->json($feedback);
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return response()->json(['message' => 'Feedback deleted successfully']);
    }
}
