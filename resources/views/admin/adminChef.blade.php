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
            <form action="{{url('/uploadChefInfo')}}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="name" id="name"
                        placeholder="Enter Chef's Name" required>
                </div>

                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="speciality" id="speciality"
                        placeholder="Enter Speciality" required>
                </div>

                <div class="form-group">
                    <label for="signatureDishes">Signature Dishes</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="signatureDishes"
                        id="signatureDishes" placeholder="Enter Signature Dishes">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>


            </form>

            <div class="table-container" style="overflow-x: auto; margin-top: 40px;">

                <table class="table table-bordered table-dark">
                    <tr align="center">
                        <th scope="col">Chef Name</th>
                        <th scope="col">Speciality</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action</th>
                    </tr>

                    @foreach ($data as $chefs)
                        <tr align="center">
                            <td>{{$chefs->name}}</td>
                            <td>{{$chefs->speciality}}</td>
                            <td>
                                @if($chefs->image)
                                    <img src="/chef_image/{{$chefs->image}}" width="100">
                                @else
                                    <span style="color:red;">No Image</span>
                                @endif
                            </td>
                            <td><a href="{{url('/deleteChef', $chefs->id)}}">Delete</td>
                            <td><a href="{{url('/updateChef', $chefs->id)}}">Update</td>

                        </tr>
                    @endforeach


                </table>
            </div>
        </div>

    </div>

    @include("admin.admin_script")

</body>

</html>