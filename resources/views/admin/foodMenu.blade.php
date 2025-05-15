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
            <form action="{{url('/uploadItems')}}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="title" id="title"
                        placeholder="Enter title" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input style="color: whitesmoke" type="number" class="form-control" name="price" id="price"
                        placeholder="Enter price" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="description"
                        id="description" placeholder="Write description" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>


            </form>

            <div class="table-container" style="overflow-x: auto; margin-top: 40px;">
                <p style="color: white;">Total food items: {{ count($data) }}</p>

                <table class="table table-bordered table-dark">
                    <tr align="center">
                        <th scope="col">Food Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>

                    @foreach ($data as $food)
                        <tr align="center">
                            <td>{{$food->title}}</td>
                            <td>{{$food->price}}</td>
                            <td style="max-width: 400px; white-space: normal; word-break: break-word;">
                                {{$food->description}}
                            </td>
                            <td>
                                @if($food->image)
                                    <img src="/food_image/{{ $food->image }}" width="100">
                                @else
                                    <span style="color:red;">No Image</span>
                                @endif
                            </td>
                            <td><a href="{{url('/deleteMenu', $food->id)}}">Delete</td>

                        </tr>

                    @endforeach

                </table>
            </div>

        </div>

    </div>

    @include("admin.admin_script")

</body>

</html>