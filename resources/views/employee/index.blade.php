<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/3.0.3/css/bootstrap-combined.min.css">
</head>
<body>
    <p>Hi, This is {{ session()->get('uname') }}</p>
    <p></p>
    <a href="{{route('logout')}}">logout</a>
    {{-- {{print_r($user)}} --}}
    {{-- <td><input type="text" name="fname" value="{{$user->role}}" required></td> --}}
    <div class="navbar">
        <div class="navbar-inner">
            {{-- <a id="logo" href="/">Single Malt</a> --}}
            <ul class="nav">
            
                <li><a href="/about">About</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/contact">Contact</a></li>

                {{-- <li class="selected"><a href="{{route('admin.list1')}}">Customers</a></li>
                <li class="selected"><a href="{{route('admin.list2')}}">House Owners</a></li>
                <li class="selected"><a href="{{route('admin.list3')}}">Available Houses</a></li>
                <li class="selected"><a href="{{route('admin.list4')}}">Rented Houses</a></li>
                <li class="selected"><a href="{{route('admin.add')}}">Create New Manager Account</a> </li>
                <li class="selected"><a href="{{route('admin.edit')}}">Edit Profile</a></li>
                <li class="selected"><a href="{{route('logout')}}"> Logout</a> </li>
            </ul> --}}


            <a href="/create">add new product</a> 
            <a href="/invoice">Invoice PDF</a> |
            <br>
            <a href="/livesearch">Customer Search</a> 
	{{-- <a href="/create">add New Product</a> |
	<a href="{{route('home.employeelist')}}">View employee List</a> |
	<a href="{{route('home.productlist')}}">View product List</a> |
	<a href="/logout">logout</a><br> --}}
        </div>
    </div>
</body>
</html>

