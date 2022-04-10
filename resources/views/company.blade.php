<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img class="myImg" style="width: 200px; height: 100px;" alt="" src="{{$company->url_logo}}" /></td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->website}}</td>
                        <td>
                            <a href="{{asset('companies/edit/'.$company->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                            <a href="{{asset('companies/delete/'.$company->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this ?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
            {{ $companies->links() }}
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
