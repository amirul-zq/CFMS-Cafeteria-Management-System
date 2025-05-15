<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include("admin.admin_css")
</head>

<body>

    <div class="container-scroller">

        @include("admin.navbar")
        <div style="margin-top: 60px; margin-left: 150px;">
            <table class="table table-dark table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

                @foreach ($data as $user)
                    <tr>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>

                        @if($user->user_type == "admin")
                            <th><a>Not Allowed</a></th>
                        @else
                            <th><a href={{url('/deleteUser', $user->id)}}>Delete</a></th>
                        @endif
                    </tr>
                @endforeach

            </table>
        </div>

    </div>


    @include("admin.admin_script")

</body>

</html>