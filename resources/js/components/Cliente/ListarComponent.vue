<template>
	<div class="card">
        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Lista de clientes</h4>
        </div>
	<div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Documento</th>
                            <th>Cargo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for = "(cliente,index) in clientes" :key="index"> <!-- Recorremos nuestro array -->
                            
                                <td>{{cliente.id}}</td>
                                <td>{{cliente.persona.nombre}}</td>
                                <td>{{cliente.persona.apellido}}</td>
                                <td>{{cliente.persona.documento}}</td>
                                <td>{{cliente.tipocliente.nombre}}</td>
                                <td>
                                    <button v-can="'listar-cliente'" class="btn btn-primary btn-sm" @click = "ver(cliente)"><i class="far fa-eye"></i></button>

                                    <button v-can="'editar-cliente'" class="btn btn-success btn-sm" @click = "cargar(cliente)"><i class="fas fa-pencil-alt"></i></button>


                                    <button v-can="'eliminar-cliente'" class="btn btn-danger btn-sm" @click="eliminar(cliente,index)"><i class="far fa-trash-alt"></i></button>
                                </td>
                            <!--En la primera columna mostramos el nombre-->
                        </tr>
                    </tbody>
                </table>
        </div>

        
    </div>
</template>


<script>
export default {
    mounted(){
        console.log("se monto el componente agregar cliente");
    },
    data(){
        return{
           
            horario:{
                id:'',
                nombre:'',
                ingreso:'',
                salida:'',
            },
            tipoclientes:[],
            tipoDocumentos:[],

            clientes:[],
            personas:[],
            genero:[
                {id:1,text:'Hombre'},
                {id:2,text:'Mujer'}
            ],

            
            cliente:{
                persona:{
                    tipo_doc:'',
                    documento:'',
                    nombre:'',
                    apellido:'',
                    fecha_nac:'',
                    sexo:'',
                    telefono:'',
                    direccion:'',
                    altura:'',
                    
                    user:{
                        nickname:'',
                        email:'',
                        password:'',
                        password_confirmation:'',
                    },
                },

                tipoCliente:{
                	id:'',
                	nombre:'',
                },
            },
        }
        
        
    },

   

created(){
    axios.get('/TipoCliente')
    .then(res=>{
        this.tipoclientes = res.data;

    }),
    

    axios.get('/TipoDocumento')
    .then(res=>{
        this.tipoDocumentos = res.data;
    }),


    axios.get('/Cliente/index').then(res=>{
        this.clientes = res.data;
        console.log(this.clientes);
       
        //this.empleados.persona=this.buscar2(this.empleado.per_id);
    })
},


methods:{

    
    ver(cliente){
        location.href = '/Cliente/' + cliente.id
    },

    cargar(cliente){
        location.href = '/Cliente/actualizar/' + cliente.id
    },

    eliminar(cliente,index){
                const confirmacion = confirm(`Confirma Eliminar cliente: ${cliente.id}`);
                    if(confirmacion){
                            axios.delete('/Cliente/' + cliente.id)
                            .then(()=>{
                                    this.clientes.splice(index,1);
                            });
                        }
        },
},
}
</script>