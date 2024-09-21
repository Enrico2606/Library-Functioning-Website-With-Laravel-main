<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .navMarg{
            margin-left: 85%;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">Super Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            
            </button>
            <div class="nav List collapse navbar-collapse navMarg" id="navbarNavAltMarkup">
                <div class="navbar-nav" style="float: right;">
                    <a class="nav-link" href="/login">Log In</a>
                    <a class="nav-link" href="/register">Register</a>
                </div>
            </div>
                    
        </div>
        </nav>
    </div> 
</head>
<body>
    @yield('content')
</body>
</html>