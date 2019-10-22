<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar un empleado</div>

                    <div class="card-body">
                        
                            <div class="form-group">
                                <input v-model="saludo" v-on:keyup.enter="hola" class="form-control" type="text" >
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                saludo:'',
            }
            
        },
        methods: {
            hola(){
                console.log(this.saludo)
            }
        },
    }
</script>