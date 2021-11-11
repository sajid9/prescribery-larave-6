@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div v-if="success" class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>


                    <div v-if="error" class="alert alert-error" role="alert">
                            @{{ errorMsg }}
                    </div>

                    <div id="app">
                        <div v-for="user in users">
                            @{{user.name}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    new Vue({
        el: '#app',
        data () {
            return {
                users: []
            }
        },
        created(){
            this.getUsers();
        },
        methods: {
            async getUsers(){

                await axios
                .get('{{url("dashboard/getUsers")}}')
                .then((response) => {
                        this.users = response.data.data;
                    }).catch(error => {
                        this.error = true;
                        this.errorMsg = error.data.message;
                    });
            }
        }
    })

</script>
@endsection
