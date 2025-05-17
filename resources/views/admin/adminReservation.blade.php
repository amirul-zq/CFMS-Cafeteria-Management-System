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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Number of Guest</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Message</th>
                </tr>

                @foreach ($data as $reserver)
                    <tr>
                        <th>{{$reserver->name}}</th>
                        <th>{{$reserver->email}}</th>
                        <th>{{$reserver->phone}}</th>
                        <th>{{$reserver->guest}}</th>
                        <th>{{$reserver->date}}</th>
                        <th>{{$reserver->time}}</th>
                        <th>{{$reserver->message}}</th>
                    </tr>

                @endforeach

            </table>


        </div>

        @include("admin.admin_script")

</body>

</html>
