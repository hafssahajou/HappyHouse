<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>AutoKaw</title>
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap">
    <link rel="stylesheet" href="css/plugins.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <header class="p-4 bg-gray-800 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('utilisateur.index') }}" class="text-lg font-bold">EventBooking</a>

            <nav class="flex space-x-4 items-center">
                <form  method="post">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                        Log out
                    </button>
                </form>
            </nav>
        </div>
    </header>
    <div class="container mx-auto flex flex-wrap">
        <aside class="w-full md:w-1/4 p-4 bg-gray-100">
            <h2 class="text-lg font-bold mb-4">Filters</h2>
            <form method="GET">
                <div class="mb-4">
                    <h3 class="text-sm font-bold text-gray-700 mb-2">Category</h3>
                    @foreach ($categories as $category)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                id="category-{{ $category->id }}" class="text-blue-500 focus:ring focus:border-blue-300">
                            <label for="category-{{ $category->id }}" class="text-sm ml-2">{{ $category->title }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-bold text-gray-700" for="title">Search by Title</label>
                    <input id="title" name="title" type="text" class="mt-1 p-2 border rounded-md w-full"
                        placeholder="Enter title">

                    <button type="submit"
                        class="w-full mt-2 p-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:border-blue-300">
                        Filter
                    </button>
                    <a href="{{ route('utilisateur.index') }}" type="reset"
                        class="text-center w-full mt-2 p-2 bg-gray-500 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring focus:border-blue-300">
                        Reset
                    </a>
                </div>
            </form>
        </aside>

        <div class="w-full md:w-3/4 p-8">
            <h1 class="text-4xl font-bold mb-8">ALL EVENTS</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($annonces as $annonce)
                    <div class="bg-white p-4 rounded-md shadow-md transition-transform transform hover:scale-105 mb-8">
                        <h2 class="text-xl font-bold mb-2">{{ $annonce->title }}</h2>
                        <p class="text-gray-600 mb-4">{{ $annonce->description }}</p>
                        <img src="{{ asset($annonce->image) }}" alt="Event Image"
                            class="w-full h-48 object-cover mb-4 rounded-md">

                        <div class="flex justify-between items-center mb-2">
                            <span class="bg-blue-500 text-white p-1 rounded-md">{{ $annonce->availablecars }} cars
                                available</span>
                            <!-- <span class="bg-green-500 text-white p-1 rounded-md">{{ $event->location }}</span> -->
                            <span class="bg-purple-500 text-white p-1 rounded-md">{{ $annonce->category->title }}</span>
                        </div>

                        <!-- <p class="text-gray-500 mb-2">
                            <span class="mr-1">Date:</span>
                            <span class="text-blue-600">{{ $event->date }}</span>
                        </p> -->

                        <div class="mb-2">
                            <span class="bg-gray-500 text-white p-1 rounded-md">Reservation Type:
                                {{ $annonce->ReservationType }}</span>
                        </div>
                    
                        @if ( $annonce->availablecars === 0 )
                       
                            <button type="submit"
                                class="w-full bg-red-500 text-white p-2 rounded-md hover:bg-red-700 focus:outline-none focus:ring focus:border-yellow-300">No disponible
                            </button>
                    
                            
                        @else
                            <form action="{{ route('annonce.reserve', $annonce) }}" method="post">
                            @csrf
                            <button type="submit"
                                class="w-full bg-yellow-500 text-white p-2 rounded-md hover:bg-yellow-700 focus:outline-none focus:ring focus:border-yellow-300">
                                Reserve
                            </button>
                        </form>
                        @endif
                        

                        @php
                            $userReservations = auth()->user()->reservations;
                            $annonceReservation = $userReservations
                                ? $userReservations->where('annonce_id', $event->id)->first()
                                : null;
                        @endphp

                        @if ($annonceReservation && $annonceReservation->ticket)
                            <a href="{{ route('annonces.ticket', $annonceReservation->id) }}"
                                class="text-blue-500 hover:text-blue-700">
                                View Ticket
                            </a>
                        @elseif ($annonceReservation)
                            @if ($annonceReservation->user_id === Auth::user()->id && !($annonceReservation->status === '0'))
                                <form action="{{ route('annonces.ticket', Auth::user()->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="text-blue-500 hover:text-blue-700">
                                        Get Ticket (Not Processed Yet)
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>


            <div class="mt-4">
                {{ $paginatedEvents->links() }}
            </div>
        </div>
    </div>
@endsection
