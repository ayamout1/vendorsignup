
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TYS Global Partners')</title>

    <!-- Livewire Styles -->
    @livewireStyles
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="select2/select2.min.css">
<!--===============================================================================================-->
<script src="//unpkg.com/alpinejs" defer></script>

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
<!--===============================================================================================-->
<style>
.hidden {
  display: none;
}
.button {
  background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
}
.button-remove {
  background-color: #e70000; /* Red */
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
}
.contactadditional{

    padding: 0.5rem 0.75rem;
                            font-size: 1rem;
                            line-height: 1.25;
                            color: #495057;
                            background-color: #fff;
                            background-image: none;
                            background-clip: padding-box;
                            border: 1px solid rgba(0, 0, 0, 0.15);
                            border-radius: 0.25rem;
                            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
}
</style>
</head>
<body>

    <div class="limiter">
        <div class="container-login100" style="background-color:#0B1E2C;">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" style="width:80%;">



                @yield('content')
            </div>
        </div>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts
    <!-- Additional JS can be added here -->
</body>
</html>
