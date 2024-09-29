<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <!-- link-icons -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <script src="{{ asset('assets/js/main.js') }}"></script>
</head>
<body>
    @yield('sidebar')
    <!-- Header -->
    <header>
        <div class="fixed-head">
            <div class="logo-container">
                <span class="logo-title">Women Care</span>
            </div>
            <ul>
                <li class="form-flex">
                    <form action="" name="search-form">
                        <input class="search-bar" type="text" placeholder="Search...">
                    </form>
                    <span class="las la-search"></span>
                </li>
                <li class="list-bell">
                    <a href="#"><span class="las la-bell"></span></a>
                </li>
                <li>
                    @if(auth()->user() && auth()->user()->photo)
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile Picture" style="width: 70px; height: 70px; border-radius: 50%;">
                    @endif
                </li>
            </ul>
        </div>
    </header>
  @yield('content')
</body>
</html>
