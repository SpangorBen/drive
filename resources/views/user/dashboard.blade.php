@extends('../layouts/layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div id="app">
        <aside class="app-aside">
            <h2><img src="" alt="logo"></h2>
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
                <h1>Hello {{ Auth::user()->name }}</h1>
                <div class="header-right">
                    <form action="" method="GET" class="search-bar">
                        <input type="text" name="search" id="search"
                            placeholder="Find You Route">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </form>
                </div>
            </div>
            <div class="article-main">
                <h2>All Drivers</h2>
                <div class="cards">
                    {{-- @foreach ($jobs as $job)
                        <div class="plan">
                            <div class="inner">
                                <span class="pricing">
                                    <span>
                                        {{ $job->contract }}
                                    </span>
                                </span>
                                <div class="content">
                                    <p class="sub-title">{{ $job->company->name }}</p>
                                    <h4 class="title">{{ $job->title }}</h4>
                                    <p class="info">{{ $job->description }}</p>

                                </div>
                                <ul class="features">
                                    <li>
                                        <span class="icon">
                                            <svg height="24" width="24" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path fill="currentColor"
                                                    d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span>{{ $job->location }}</span>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <svg height="24" width="24" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path fill="currentColor"
                                                    d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span>{{ $job->visits }} <strong>Applications</strong></span>
                                    </li>
                                    <li>
                                        <span class="icon">
                                            <svg height="24" width="24" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path fill="currentColor"
                                                    d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z">
                                                </path>
                                            </svg>
                                        </span>
                                        <span>{{ implode(' - ', json_decode($job->skills)) }}</span>
                                    </li>
                                </ul>
                                <div class="action">
                                    @if ($job->applicants->contains(Auth::user()->applicant))
                                        <span class="button">Applied</span>
                                    @else
                                        <a class="button" href="{{ route('applyJob', $job->id) }}">
                                            Apply To Job
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                </div>
            </div>
        </article>
    </div>
@endsection
