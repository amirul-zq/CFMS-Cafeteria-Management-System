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
            <form action="{{url('/updateChefInfo', $data->id)}}" method="post" enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label for="name">Chef Name</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="name" id="name"
                        value={{$data->name}} required>
                </div>

                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="speciality" id="speciality"
                        {{$data->speciality}} required>
                </div>

                <div class="form-group">
                    <label for="signatureDishes">Signature Dishes</label>
                    <input style="color: whitesmoke" type="text" class="form-control" name="signatureDishes"
                        id="signatureDishes" {{$data->signatureDishes}}>
                </div>

                <div class="form-group">
                    <label for="image">Old Image</label>
                    <img src="/chef_image/{{ $data->image }}" width="100">
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