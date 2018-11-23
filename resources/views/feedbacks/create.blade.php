@extends('layouts.header')

@section('content')

    <div class="container">
        <h1>Create Feedback</h1>

        <form method="POST" class="form" action="/feedbacks">
            <label for="InputName" class="mr-sm-2">User name:</label>
            <input name="user_name" type="text" class="form-control mb-2 mr-sm-2" id="InputName" required>

            <label for="InputEmail" class="mr-sm-2">Email:</label>
            <input name="email" type="email" class="form-control mb-2 mr-sm-2" id="InputEmail" required>

            <label for="InputHomePage" class="mr-sm-2">Home page:</label>
            <input name="home_page" type="url" class="form-control mb-2 mr-sm-2" id="InputHomePage">

            <label for="InputText" class="mr-sm-2">Text:</label>
            <input name="text" type="text" class="form-control mb-2 mr-sm-2" id="InputText" required>

            <input name="user_agent" type="hidden" value="<? echo $_SERVER["HTTP_USER_AGENT"];?>" class="form-control mb-2 mr-sm-2" required>
            <input name="ip_address" type="hidden" value="<? echo $_SERVER['REMOTE_ADDR'];?>" class="form-control mb-2 mr-sm-2" required>

            <p><button type="submit" class="btn btn-primary mb-2">Create</button></p>

            {{ method_field('POST') }}
            {{ csrf_field() }}
        </form>

    </div>



@endsection