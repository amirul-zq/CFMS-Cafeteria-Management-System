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
        <div>
            <h1>Orders</h1>
        </div>

        <div class="container-scroller">
            <form action="{{url('/search')}}" method="get" style="margin-left: 30px">
                <input type="text" name="search" style="margin-top: 10px; color: blue">
                <button type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;">Search</button>
            </form>
        </div>


        <div class="table-container" style="overflow-x: auto; margin-top: 150px;">
            <div style="margin-right: 500px;">
                <table class="table table-dark table-bordered">
                    <tr align="center">
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>

                    @foreach ($data as $data)
                        <tr align="center" style="background-color: black">
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->address}}</td>
                            <td>{{$data->foodNmae}}</td>
                            <td>{{$data->price}}BDT</td>
                            <td>{{$data->quantity}}</td>
                            <td>{{$data->quantity * $data->price}}BDT</td>
                        </tr>

                    @endforeach
                </table>
            </div>
        </div>

        @include("admin.admin_script")

</body>

</html>
