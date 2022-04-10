<style>
    .padding-top-bottom{
        padding: 2rem 0px;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container padding-top-bottom">
                    <form method="POST" action="/companies/update" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="hidden" class="form-control" name="id" id="id" value="{{$companies->id}}">
                            <input type="text" class="form-control" name="nama" id="nama" value="{{$companies->name}}">
                            @if ($errors->has('nama'))<span class="text-danger">{{ $errors->first('nama') }}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{$companies->email}}">
                            @if ($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" id="website" value="{{$companies->website}}">
                            @if ($errors->has('website'))<span class="text-danger">{{ $errors->first('website') }}</span>@endif
                        </div>
        
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <img style="width: 50%; height: 50%;" src="{{ asset($companies->url_logo) }}" alt=""
								id="placeholder_updatepicture" /><br>
                            <input type="hidden" class="form-control" name="url_logo" id="url_logo" value="{{$companies->url_logo}}">
                            <input type="file" class="form-control-file" name="logo" id="logo">
                            @if ($errors->has('logo'))<span class="text-danger">{{ $errors->first('logo') }}</span>@endif
                        </div>
        
                        <input type="submit" value="Save" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#logo").change(function() {
            readUrlAdd(this);
        });
        function readUrlAdd(input) {
            if (input.files && input.files[0]) {
                            // var ratio52 = document.getElementById('ratio5-2');
                            var image2 = document.getElementById('placeholder_updatepicture2');

                var readerPictureAdd = new FileReader();
                
                readerPictureAdd.onload = function(e) {
                    $('#placeholder_updatepicture').attr('src', e.target.result);
                                    image2.style.display = 'none';
                                    // ratio52.removeChild(image2)

                }
                readerPictureAdd.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>
