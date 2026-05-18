<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizMaster | Quiz & QCM</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }

        .hero-gradient{
            background: linear-gradient(135deg,#4f46e5 0%,#7c3aed 100%);
        }

        .glass{
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .card-hover{
            transition: 0.3s ease;
        }

        .card-hover:hover{
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0,0,0,0.15);
        }

        .floating{
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float{
            0%,100%{
                transform: translateY(0px);
            }
            50%{
                transform: translateY(-12px);
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

<!-- ================= NAVBAR ================= -->

<header class="fixed top-0 left-0 w-full bg-white/80 backdrop-blur-md z-50 shadow-sm">

    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        <!-- Logo -->
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                Q
            </div>

            <h1 class="text-2xl font-bold text-indigo-700">
                QuizMaster
            </h1>

        </div>

        <!-- Menu -->
        <nav class="hidden md:flex gap-8 text-sm font-medium">

            <a href="#features" class="hover:text-indigo-600 transition">
                Fonctionnalités
            </a>

            <a href="#stats" class="hover:text-indigo-600 transition">
                Statistiques
            </a>

            <a href="#contact" class="hover:text-indigo-600 transition">
                Contact
            </a>

        </nav>

        <!-- Buttons -->
        <div class="flex items-center gap-4">

            <a href="{{ route('login') }}"
               class="px-5 py-2 border border-indigo-600 text-indigo-600 rounded-xl hover:bg-indigo-50 transition">
                Connexion
            </a>

            <a href="{{ route('register') }}"
               class="px-5 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition">
                Inscription
            </a>

        </div>

    </div>

</header>

<!-- ================= HERO ================= -->

<section class="hero-gradient min-h-screen flex items-center text-white overflow-hidden relative">

    <div class="absolute top-10 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-pink-400/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center pt-28">

        <!-- LEFT -->
        <div>

            <span class="inline-block px-4 py-2 bg-white/20 rounded-full text-sm mb-6">
                🚀 Plateforme moderne de Quiz & QCM
            </span>

            <h2 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
                Apprenez.
                <span class="text-yellow-300">Testez.</span>
                Progressez.
            </h2>

            <p class="text-lg text-indigo-100 leading-relaxed mb-8 max-w-xl">
                Une plateforme intelligente et interactive
                pour créer, gérer et réussir des quiz et QCM.
            </p>

            <div class="flex flex-wrap gap-4">

                <a href="{{ route('register') }}"
                   class="px-8 py-4 bg-white text-indigo-700 rounded-2xl font-semibold hover:bg-gray-100 transition">
                    Commencer maintenant
                </a>

                <a href="#features"
                   class="px-8 py-4 glass rounded-2xl font-semibold hover:bg-white/20 transition">
                    Découvrir
                </a>

            </div>

            <!-- Stats -->
            <div class="mt-12 flex flex-wrap gap-10">

                <div>
                    <h3 class="text-3xl font-bold">10K+</h3>
                    <p class="text-indigo-100">Quiz réalisés</p>
                </div>

                <div>
                    <h3 class="text-3xl font-bold">98%</h3>
                    <p class="text-indigo-100">Satisfaction</p>
                </div>

                <div>
                    <h3 class="text-3xl font-bold">24/7</h3>
                    <p class="text-indigo-100">Disponible</p>
                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="flex justify-center">

            <div class="glass rounded-3xl p-8 w-full max-w-md floating">

                <div class="bg-white rounded-2xl p-6 text-gray-800">

                    <div class="flex justify-between items-center mb-6">

                        <h3 class="font-bold text-xl">
                            Quiz du Jour
                        </h3>

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                            En ligne
                        </span>

                    </div>

                    <div class="space-y-4">

                        <div class="bg-indigo-50 p-4 rounded-xl border border-indigo-100">

                            <p class="font-medium mb-3">
                                Quel framework PHP utilisez-vous ?
                            </p>

                            <div class="space-y-2">

                                <div class="bg-white p-3 rounded-lg border hover:border-indigo-400 cursor-pointer transition">
                                    Laravel
                                </div>

                                <div class="bg-white p-3 rounded-lg border hover:border-indigo-400 cursor-pointer transition">
                                    Symfony
                                </div>

                                <div class="bg-white p-3 rounded-lg border hover:border-indigo-400 cursor-pointer transition">
                                    CodeIgniter
                                </div>

                            </div>

                        </div>

                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Progression</span>
                            <span class="font-semibold text-indigo-600">80%</span>
                        </div>

                        <div class="w-full h-3 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-indigo-600 rounded-full w-[80%]"></div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= FEATURES ================= -->

<section id="features" class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <h2 class="text-4xl font-bold mb-4">
                Fonctionnalités principales
            </h2>

            <p class="text-gray-600 max-w-2xl mx-auto">
                Une expérience moderne pour les étudiants et enseignants.
            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 card-hover">

                <div class="text-4xl mb-6">📚</div>

                <h3 class="text-2xl font-semibold mb-4">
                    Création de Quiz
                </h3>

                <p class="text-gray-600">
                    Créez des QCM interactifs facilement.
                </p>

            </div>

            <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 card-hover">

                <div class="text-4xl mb-6">⚡</div>

                <h3 class="text-2xl font-semibold mb-4">
                    Résultats instantanés
                </h3>

                <p class="text-gray-600">
                    Scores et statistiques en temps réel.
                </p>

            </div>

            <div class="bg-gray-50 rounded-3xl p-8 border border-gray-100 card-hover">

                <div class="text-4xl mb-6">🏆</div>

                <h3 class="text-2xl font-semibold mb-4">
                    Classements
                </h3>

                <p class="text-gray-600">
                    Motivez vos utilisateurs avec des rankings.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- ================= STATS ================= -->

<section id="stats" class="py-24 bg-indigo-600 text-white">

    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-4 gap-10 text-center">

        <div>
            <h3 class="text-5xl font-bold">15K+</h3>
            <p class="text-indigo-100">Utilisateurs</p>
        </div>

        <div>
            <h3 class="text-5xl font-bold">50K+</h3>
            <p class="text-indigo-100">Questions</p>
        </div>

        <div>
            <h3 class="text-5xl font-bold">120+</h3>
            <p class="text-indigo-100">Catégories</p>
        </div>

        <div>
            <h3 class="text-5xl font-bold">99%</h3>
            <p class="text-indigo-100">Disponibilité</p>
        </div>

    </div>

</section>

<!-- ================= FOOTER ================= -->

<footer id="contact" class="bg-gray-900 text-gray-300 py-12">

    <div class="max-w-7xl mx-auto px-6 text-center">

        <h3 class="text-2xl font-bold text-white mb-4">
            QuizMaster
        </h3>

        <p class="text-gray-400 mb-6">
            Plateforme moderne de Quiz et QCM sous Laravel.
        </p>

        <div class="flex justify-center gap-4">

            <a href="{{ route('login') }}"
               class="hover:text-white">
                Connexion
            </a>

            <a href="{{ route('register') }}"
               class="hover:text-white">
                Inscription
            </a>

        </div>

        <div class="border-t border-gray-800 mt-8 pt-6 text-sm text-gray-500">
            © {{ date('Y') }} QuizMaster - Tous droits réservés.
        </div>

    </div>

</footer>

</body>
</html>