<template>
    <div>
        <h5 class="text-center">Agregar Tipo Cliente</h5>
             <form @submit.prevent="agregar">
                    <div class="row">
                            <div class="col-5">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="tipocliente.nombre">
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="Descuento" class="form-control mb-2" v-model="tipocliente.descuento">
                            </div>

                            <div class="col-2">
                                 <button  class="btn btn-primary mr-2" type="submit">Agregar</button>
                            </div>
                    </div>
                    
                   
             </form>
             <div class="container">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Descuento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(tipocliente,index) in tipoClientes" :key="index"> <!-- Recorremos nuestro array -->
                            <td >{{tipocliente.id}}</td> 
                            <td >{{tipocliente.nombre}}</td> <!--En la primera columna mostramos el nombre-->
                            <td v-text="tipocliente.descuento"></td> <!--En la segunda mostramos el apellido-->
                            </tr>
                        </tbody>
                    </table>
             </div>
    </div>
</template>


<script>
export default {
    data(){
        return {
            tipoClientes:[],
            tipocliente:{
                nombre:'',
                descuento:''
            }
        }
    },
created(){
    axios.get('/TipoCliente')
    .then(res=>{
        this.tipoClientes=res.data;
    })
},
    methods: {
        agregar(){
           // console.log(this.tipocliente.nombre,this.tipocliente.descuento);
            const params={nombre:this.tipocliente.nombre,descuento:this.tipocliente.descuento}
            this.tipocliente.nombre='';
            this.tipocliente.descuento='';
            axios.post('/TipoCliente',params)
                .then(res=>{
                    this.tipoClientes.push(res.data)
                });
        }
        
    },
}
</script>