<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form action="/employees/import" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" name="file" class="form-control" placeholder="Import Employee" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                </div>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Company</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->company}}</td>
                        <td>
                            <a href="{{asset('employees/edit/'.$employee->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> 
                            <a href="{{asset('employees/delete/'.$employee->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this ?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination">
            {{ $employees->links() }}
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
