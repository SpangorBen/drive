@extends('../layouts/layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div id="app" class="bg-gradient-to-r from-purple-700 to-blue-600">
        <aside class="app-aside">
            <h2><img src="{{asset('storage/pics/' . Auth::user()->picture)}}" alt="{{Auth::user()->picture}}"></h2>
            <nav>
                <a href="" title="All Jobs" class="active"><i
                        class="bi bi-grid-1x2-fill"></i></a>
                <a href="" title="All Companies"><i class="bi bi-buildings"></i></a>
                <a href="#" title="Profile"><i class="bi bi-person-fill"></i></a>
                <a href="" title="My CV"><i class="bi bi-file-earmark"></i></a>
                <a href="#" title="Switch Account"><i class="bi bi-arrow-repeat"></i></a>
            </nav>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </aside>
        <article class="app-art">
            <div class="article-header">
                <h1 class="text-xl text-black">Hello {{ Auth::user()->name }}</h1>
            </div>
            <div class="article-main">
                <h2>Welcome To Your Dashboard</h2>
                <div class="container mx-auto py-8">
                    <h1 class="text-3xl font-semibold mb-4">Route Selection</h1>
                    <div class="mx-auto max-w-xl bg-white shadow-md rounded-md p-6">
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <strong class="font-bold">Validation Error:</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="w-full" action="{{ route('driver.routes.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div class="mb-4">
                                    <label for="pickup_city" class="block text-sm font-medium text-gray-700">Pickup City</label>
                                    <select name="pickup_city" id="pickup_city" class="mt-1 block w-full sm:w-auto border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="destination_city" class="block text-sm font-medium text-gray-700">Destination City</label>
                                    <select name="destination_city" id="destination_city" class="mt-1 block w-full sm:w-auto border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                                    <input type="date" id="date" name="date" class="mt-1 block w-full sm:w-auto border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                            <div class="mt-6">
                                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Select Route
                                </button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                
                
                <div class="cards">
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="p-4 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-gray-800">Your Routes</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 p-4">
                            @foreach($routes as $route)
                            <div class="bg-gray-100 border rounded-lg overflow-hidden shadow-md">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Route {{ $loop->iteration }}</h3>
                                    <div class="flex items-center justify-between mb-2">
                                        <p class="text-sm text-gray-600">Date: {{ $route->date }}</p>
                                        <div>
                                            <p class="text-sm text-gray-600">Distance: {{ $route->distance }} km</p>
                                            <p class="text-sm text-gray-600">Time: {{ $route->time }} hr</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <p class="text-sm text-gray-600">Pickup City:</p>
                                        <p class="ml-2 text-sm text-gray-800">{{ $route->pickupCity->name }}</p>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <p class="text-sm text-gray-600">Destination City:</p>
                                        <p class="ml-2 text-sm text-gray-800">{{ $route->destinationCity->name }}</p>
                                    </div>
                                    <div class="flex justify-end">
                                        <form action="{{ route('driver.routes.destroy', $route->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 ml-2">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </article>
    </div>
@endsection
