<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Quiz;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index(Request $request)
    {
        $quizId = $request->query('quiz_id');

        $query = Attempt::query()
            ->where('status', 'completed')
            ->with('user')
            ->selectRaw('user_id,
                MAX(score) as best_score,
                COUNT(*) as attempts_count,
                AVG(score) as avg_score')
            ->groupBy('user_id')
            ->orderByDesc('best_score');

        if ($quizId) {
            $query->where('quiz_id', $quizId);
        }

        $leaderboard = $query->get();
        $quizzes     = Quiz::orderBy('title')->get();

        return view('leaderboard.index', compact('leaderboard', 'quizzes'));
    }
}
