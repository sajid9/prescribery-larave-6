@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div v-if="success" class="alert alert-success" role="alert">
                           @{{ successMsg }}
                    </div>

                    <div v-if="error" class="alert alert-error" role="alert">
                            @{{ errorMsg }}
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">username</th>
                            <th scope="col">email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="( user , index) in users" v-bind:key="index">
                                <th scope="row">@{{user.id}}</th>
                                <td>@{{user.name}}</td>
                                <td>@{{user.email}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- <user-component></user-component> done this same thing with the laravel default vue component path resources/js/app.js -->

@endsection

@section('script')

<script type="text/javascript">

    var app = new Vue({
        el: '#app',
        data:{
            users: [],
            error:false,
            errorMsg:null,
            success:false,
            successMsg:"Users Loaded"
        },
        created (){
            this.getUsers();
        },
        methods: {
            async getUsers(){

                await axios
                    .get('/dashboard/getUsers')
                    .then((response) => {
                            this.users = response.data.users;
                            this.success = true;
                        }).catch(error => {
                            this.error = true;
                            this.errorMsg = error.data.message;
                        });
            }
        }
    })
</script>

@endsection
