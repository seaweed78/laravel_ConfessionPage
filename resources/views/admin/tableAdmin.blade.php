@extends('layouts.adminLayout')
@section('admin-content')

<div class="row">
    <div class="col-md-12 p-4">
        <div class="overview-wrap">
            <h2 class="title-1">Tables</h2>
        </div>
    </div>

    <div class="col-md-12 p-4">
        <div class="row">
            <!-- TABLES -->
            <div class="col-lg-12">
                <!-- ADMIN TABLE -->
                <h2 class="title-1 m-b-25 text-center">ADMIN TABLE</h2>
                <div class="table-responsive table--no-card">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td style="text-align: center;">#</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$admins->appends(['users' => $users->currentPage(), 'allPosts' => $allPosts->currentPage()])->links()}}
                </div>
            </div>
        </div>
    </div>

    @endsection