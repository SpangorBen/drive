@extends('../layouts/layout')

@section('title')
    Client
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
                <div class=" mx-auto max-w-[28rem] bg-white shadow-md rounded-md p-6">
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
                    <form class=" w-[100%]" action="{{ route('route.search') }}" method="POST">
                        @csrf

                        <div class="flex justify-around">

                            <div class="mb-4">
                                <label for="pickup_city" class="block text-sm font-medium text-gray-700">Pickup City</label>
                                <select name="pickup_city" id="pickup_city" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="mb-4">
                            <label for="destination_city" class="block text-sm font-medium text-gray-700">Destination City</label>
                            <select name="destination_city" id="destination_city" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                        <div class="mt-6 flex justify-around">
                            <button type="submit" class="w-[50%] py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Search Route
                            </button>
                        </div>
                    </form>
                </div>

                <div class="container mx-auto my-8">
                    <h2 class="text-2xl font-bold mb-4">Available Routes</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @isset($searchedRoutes)
                            @foreach ($searchedRoutes as $route)
                                <div class="border bg-white border-gray-300 rounded-md p-4">
                                    <h3 class="text-lg font-semibold">{{ $route->pickupCity->name }} to {{ $route->destinationCity->name }}</h3>
                                    <p class="text-gray-600">{{ $route->date }}</p>
                                    <p class="mt-2">Distance: {{ $route->distance }} km</p>
                                    <p class="mt-2">Time: {{ $route->time }} hr</p>
                                    <div class="mt-4 border-t pt-4">
                                        <h4 class="text-lg font-semibold">Driver Details</h4>
                                        <p class="mt-2">Name: {{ $route->user->name }}</p>
                                        <p class="mt-2">Vehicle Type: {{ $route->user->type }}</p>
                                    </div>

                                    @if ($route->reserved)
                                            <p class="text-blue-500">Alerady reserved</p>
                                            {{-- @if (Auth::user()->id) --}}
                                            <form action="{{ route('reservation.destroy', $route->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 ml-2">Delete</button>
                                            </form>
                                                
                                            {{-- @endif --}}
                                        @else
                                        <form action="{{ route('reservation.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="route_id" value="{{ $route->id }}">
                                            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Book Now</button>
                                        </form>
                                    @endif
                                    {{-- <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Book Now</button> --}}
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                
            </div>
            
        </div>
    </article>
</div>

@endsection
