<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">

    @include("admin.admin_css")
</head>

<body>
    <div class="container-scroller">

        @include("admin.navbar")

        <div style="margin-top: 60px; margin-left: 150px;">
            <form action="{{url('/update')}}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="title" id="title"
                        value={{$data->title}} required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input style="color: whitesmoke" type="number" class="form-control" name="price" id="price"
                        {{$data->price}} required>
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Description</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="description"
                        id="description" {{$data->description}} required>
                </div>

                <div class="form-group">
                    <label for="image">Old Image</label>
                    <img src="/food_image/{{ $data->image }}" width="100">
                </div>

                <div class="form-group">
                    <label for="image">New Image</label>
                    <input type="file" class="form-control" name="image" id="image" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>


            </form>
        </div>

    </div>

    @include("admin.admin_script")

</body>

</html>
