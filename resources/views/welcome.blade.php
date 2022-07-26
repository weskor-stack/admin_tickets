<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Automatyco</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="{{ asset('css/site.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/menu2.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <input type="checkbox" id="active">
    <label for="active" class="menu-btn"><span></span></label>
    <label for="active" class="close"></label>
    <div class="wrapper">
      <ul>
        <li><a href="{{ route('tickets.index') }}">Ticket</a></li>
        <li><a href="#">Order</a></li>
        <li><a href="#">Report</a></li>
        <li><a href="{{ route('employees.index') }}">Employee</a></li>
      </ul>
    </div>
    <div class="content">
        <div class="title">
            <img src="{{ asset('images/logoAutomatyco3.png') }}">
        </div>
    </div>   
</body>
</html>