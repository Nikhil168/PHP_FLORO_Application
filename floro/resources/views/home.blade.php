@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
     <div class="row">
      <div class="col-md-12">
         <div class="card">
              
                  <div class="card-header">
                        <div>
                            <span class="float-sm-left h5">
                                User Management
                          </span>
                            <a class="btn btn-primary float-sm-right" style="margin-left: 550px;" href="/users/create" >
                                Create User Account
                            </a>
                          
                            <a href="{{route('export_excel.excel')}}"
class="btn btn-primary float-sm-right" style="margin-left: 160px;">Export</a>
                        </div>
                    </div>

                  <div class="card-body">
                     <div>
                        <table class="table">
                           <thead class="table-head">
                              <tr class="">
                                 <td class="align-middle border-0"
                                    colspan="7">
                                    <div class="row">
                                       <div class="rows-number-selector col-sm-12 col-lg-4 pb-2">
                                       </div>
                                       <div class="spacer spacer col-sm-2">
                                       </div>
                                       <div class="search-bar col-sm-12 col-lg-6">
                                          <form role="form" method="GET" action="/search">
                                             {{-- <input type="hidden" name="rowsNumber" value="10">
                                             <input type="hidden" name="sortBy" value="email">
                                             <input type="hidden" name="sortDir" value="desc"> --}}
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                   <span class="input-group-text">
                                                   <span class="">
                                                   <i class="fas fa-fw fa-search"></i>
                                                   </span>
                                                   </span>
                                                </div>
                                                <input class="form-control"
                                                   type="text"
                                                   name="search"
                                                   value=""
                                                   placeholder="Search by User Name"
                                                   aria-label="Search by User Name">
                                                <div class="input-group-append">
                                                   <span class="input-group-text p-0">
                                                   <button type="submit"
                                                      class="btn btn-link text-success"
                                                      title="Search by User Name">
                                                   <i class="fas fa-fw fa-check"></i>
                                                   </button>
                                                   </span>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                           </thead>
                     </div>
                       {{-- <p>  {{auth()->user()->user_name}}=>{{auth()->user()->last_sign_in_at}}<p> --}}
                     <form method="POST" action="/home">
                     <table class="table table-striped ">
                     <thead>
                     <tr>
                     <th scope="col">UserName</th>
                     <th scope="col">Email</th>
                     <th scope="col">FirstName</th>
                     <th scope="col">LastName</th>
                     <th scope="col">CreatedAt</th>
                     <th scope="col">LastLoginAt</th>
                     <th scope="col">Actions</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($users as $user)
                     <tr>
                     <td>{{$user->user_name}}</td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->first_name}}</td>
                     <td>{{$user->last_name}}</td>
                     <td>{{$user->created_at}}</td>
                     <td>{{auth()->user()->last_sign_in_at}}</td>
                     <td>
                     <a href="/users/{{$user->id}}/edit" class="btn btn-primary">Edit</a>
                     <a href="/users/{{$user->id}}" class="btn btn-danger">Delete</a>
                     </td>
                     </form>
                     </tr>
                     @endforeach
                     </tbody>
                     </table>
                     </table>
                  </div>
                  <div class="container mx-2">
                     {{$users->links()}}
                  </div>
               </div>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection