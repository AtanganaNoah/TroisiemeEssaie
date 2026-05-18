{{-- resources/views/attempts/result.blade.php --}}
@extends('layouts.app')
@section('title', 'Résultats')

@section('content')
<div class="fade-in max-w-3xl mx-auto">

    {{-- Score card --}}
    <div class="card p-8 mb-6 text-center">
        <h1 class="text-2xl font-bold mb-1">{{ $attempt->quiz->title }}</h1>
        <p class="text-sm mb-1" style="color:var(--muted)">Résultats de votre tentative</p>

        {{-- ✅ IDENTITÉ DE L'ÉTUDIANT --}}
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl mb-5"
             style="background:#EEF2FF; border:1px solid #C7D2FE;">
            <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold"
                  style="background:var(--primary); color:white">
                {{ strtoupper(substr($attempt->user->name, 0, 1)) }}
            </span>
            <div class="text-left">
                <p class="text-sm font-semibold" style="color:var(--primary)">{{ $attempt->user->name }}</p>
                <p class="text-xs" style="color:var(--muted)">{{ $attempt->user->email }}</p>
            </div>
        </div>

        <div class="w-32 h-32 rounded-full mx-auto flex items-center justify-center mb-4"
             style="background: {{ $attempt->percentage() >= 50 ? '#D1FAE5' : '#FEE2E2' }};
                    border: 4px solid {{ $attempt->percentage() >= 50 ? 'var(--success)' : 'var(--danger)' }}">
            <span class="text-3xl font-bold mono"
                  style="color: {{ $attempt->percentage() >= 50 ? 'var(--success)' : 'var(--danger)' }}">
                {{ $attempt->percentage() }}%
            </span>
        </div>

        <p class="font-semibold mono text-lg">{{ $attempt->score }} / {{ $attempt->max_score }} points</p>

        @if ($attempt->durationInSeconds())
            <p class="text-sm mt-1" style="color:var(--muted)">
                ⏱ Durée : {{ gmdate('i\m s\s', $attempt->durationInSeconds()) }}
            </p>
        @endif

        <div class="flex justify-center gap-3 mt-6">
            <a href="{{ route('quizzes.show', $attempt->quiz) }}" class="btn-primary">Refaire le quiz</a>
            <a href="{{ route('dashboard') }}"
               class="px-4 py-2 rounded-xl text-sm font-medium border transition-colors hover:bg-gray-50"
               style="border-color:var(--border); color:var(--muted)">← Dashboard</a>
            {{-- ✅ Lien vers le classement --}}
            <a href="{{ route('leaderboard.index') }}"
               class="px-4 py-2 rounded-xl text-sm font-medium border transition-colors hover:bg-indigo-50"
               style="border-color:#C7D2FE; color:var(--primary)">🏆 Classement</a>
        </div>
    </div>

    {{-- Détail des réponses (inchangé) --}}
    @if($attempt->responses->count() > 0)
        <h2 class="font-semibold text-lg mb-4">Détail des réponses</h2>
        <div class="space-y-3">
            @foreach ($attempt->responses as $index => $response)
                <div class="card p-5 border-l-4"
                     style="border-left-color: {{ $response->is_correct ? 'var(--success)' : 'var(--danger)' }}">
                    <div class="flex items-start gap-3">
                        <span class="w-6 h-6 rounded-full flex items-center justify-center text-xs font-bold shrink-0 mt-0.5"
                              style="background: {{ $response->is_correct ? 'var(--success)' : 'var(--danger)' }}; color:white">
                            {{ $response->is_correct ? '✓' : '✗' }}
                        </span>
                        <div class="flex-1">
                            <p class="font-medium text-sm">{{ $response->question->text }}</p>
                            <p class="text-sm mt-2">
                                Ta réponse :
                                <span class="font-semibold"
                                      style="color: {{ $response->is_correct ? 'var(--success)' : 'var(--danger)' }}">
                                    {{ $response->option->text }}
                                </span>
                            </p>
                            @if (!$response->is_correct)
                                <p class="text-sm mt-1">
                                    Bonne réponse :
                                    <span class="font-semibold" style="color:var(--success)">
                                        {{ $response->question->correctOption()?->text }}
                                    </span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection