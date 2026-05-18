<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Quiz;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();

        return view('dashboard', [

            // Nombre de quiz créés
            'quizzesCount' => $user->quizzes()->count(),

            // Nombre de questions créées
            'questionsCount' => $user->questions()->count(),

            // Tentatives uniquement pour les étudiants
            'attemptsCount' => $user->role === 'student'
                ? $user->attempts()->count()
                : 0,

            // Derniers quiz publiés
            'latestQuizzes' => Quiz::where('is_published', true)
                                    ->latest()
                                    ->take(5)
                                    ->get(),
        ]);
    }
}