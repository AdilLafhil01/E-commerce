@extends('layouts.base')

@section('title', 'Categories')
@section('navbar', 'List Categorie')

@section('content')
<div class="d-flex justify-content-end align-items-center" >


    <a href="{{ route('categories.create') }}" class="btn btn-success">Create</a>
</div>



    <table class="table table-striped">
        <thead>
            <tr>
                <th >#ID</th>
                <th >Name</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($categories) && count($categories) > 0)
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->id }}</td> <!-- Assuming $categorie has an 'id' property -->
                        <td>{{ $categorie->name }}</td>
                       <td>
                            <div class="btn-group gap-2">
                                <a href="{{ route('categories.show',$categorie) }}" class="btn btn-info btn-sm ms-2" style="width: 10%"> <i class="bi bi-eye"></i></a>

                                <a href="{{ route('categories.edit',$categorie) }}" class="btn btn-success btn-sm ms-2" style="width: 10%">
                                    <i class="bi bi-pen"></i></a>
                                <form action="{{ route('categories.destroy',$categorie) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ms-2" style="background-color: red ">
                                        <i class="bi bi-trash"></i>
                                    </button>                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" align="center"><h2>No Categories</h2></td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
