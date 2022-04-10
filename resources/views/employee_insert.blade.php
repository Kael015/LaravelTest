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
                    <form method="POST" action="/employees/store" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ old('nama') }}">
                            @if ($errors->has('nama'))<span class="text-danger">{{ $errors->first('nama') }}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <select class="form-control" id="company" name="company">
                            </select>
                        </div>
        
                        <input type="submit" value="Save" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#company').select2({
            placeholder: 'Company',
            // width: '350px',
            allowClear: true,
            ajax: {
                url:"{{ asset('/employees/company-list') }}",
                dataType: 'json',
                data: function(params) {
                    console.log(params);
                    return {
                        term: params.term || '',
                        page: params.page || 1
                    }
                },
                cache: true
            }
        });
    </script>
</x-app-layout>
