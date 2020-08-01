@extends('layouts.app')

@section('title', '| Account')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-user"></i><span id="nickname">{{ Auth::user()->name }}</span></div>
                <div class="card-body">
                  <div class="row">
                    <table class="table col-12 col-md-6">
                      <thead>
                        <th colspan="2">General data:</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>ID</td>
                          <td>{{Auth::user()->id}}</td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                          <td>First name</td>
                          <td>{{Auth::user()->first_name}}</td>
                        </tr>
                        <tr>
                          <td>Last name</td>
                          <td>{{Auth::user()->last_name}}</td>
                        </tr>
                        <tr>
                          <td>Phone</td>
                          <td>{{Auth::user()->phone}}</td>
                        </tr>
                        <tr>
                          <td colspan="2"><a href="/password/reset" class="nav-link p-0">Reset password</a></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table col-12 col-md-6">
                      <thead>
                        <th colspan="2">Address data:</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Street</td>
                          <td>{{Auth::user()->street}}</td>
                        </tr>
                        <tr>
                          <td>Number</td>
                          <td>{{Auth::user()->home_number}}</td>
                        </tr>
                        <tr>
                          <td>City</td>
                          <td>{{Auth::user()->city}}</td>
                        </tr>
                        <tr>
                          <td>Zip code</td>
                          <td>{{Auth::user()->zipcode}}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="mt-5" style="width: 300px;">
                    @if(Auth::user()->hasRole('admin'))
                      <a href="/admin" class="btn btn-default d-block"><i class="fa fa-server"></i>Admin panel</a>
                      <a href="/products/add" class="btn btn-default d-block"><i class="fa fa-plus"></i>Add product</a>
                    @endif
                    <a class="btn btn-default d-block" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i>Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div id="root" class="mt-5"></div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
