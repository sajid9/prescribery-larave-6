<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users List</div>

                    <div class="card-body">
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
                                    <th scope="row">{{user.id}}</th>
                                    <td>{{user.name}}</td>
                                    <td>{{user.email}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
            users: [],
            error:false,
            errorMsg:null,
            success:false,
            successMsg:"Users Loaded"
        }
        },
        created (){
            this.getUsers();
        },
        methods: {
            getUsers(){

                let self = this ;
                axios
                .get('/dashboard/getUsers')
                .then((response) => {
                        self.users = response.data.users;
                        self.success = true;
                    }).catch(error => {
                        self.error = true;
                        self.errorMsg = error.data.message;
                    });
            }
        }
    }
</script>
