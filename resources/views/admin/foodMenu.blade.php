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

        <div style="position: relative; top: 60px; right: -150px;">
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
                    <label for="description">Description</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="description"
                        id="description" placeholder="Write description" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>


            </form>
        </div>

    </div>

    @include("admin.admin_script");

</body>

</html>
