<template>
	<div class="card">
        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Lista de Empleados</h4>
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
                        <tr v-for = "(empleado,index) in empleados" :key="index"> <!-- Recorremos nuestro array -->
                            
                                <td>{{empleado.id}}</td>
                                <td>{{empleado.persona.nombre}}</td>
                                <td>{{empleado.persona.apellido}}</td>
                                <td>{{empleado.persona.documento}}</td>
                                <td>{{empleado.tipo_empleado.nombre}}</td>
                                <td>
                                    <button v-can="'listar-empleado'" class="btn btn-primary btn-sm" @click = "ver(empleado)"><i class="far fa-eye"></i></button>

                                    <button v-can="'editar-empleado'" class="btn btn-success btn-sm" @click = "cargar(empleado)"><i class="fas fa-pencil-alt"></i></button>

                                    <button v-can="'editar-empleado'" class="btn btn-success btn-sm" @click = "verHorario(empleado)"><i class="far fa-calendar-alt"></i></button>

                                    <button v-can="'eliminar-empleado'" class="btn btn-danger btn-sm" @click = "eliminar(empleado,index)"><i class="far fa-trash-alt"></i></button>
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
        console.log("se monto el componente agregar empleado");
    },
    data(){
        return{
            horarios:[],
            horario:{
                id:'',
                nombre:'',
                ingreso:'',
                salida:'',
            },
            tipoEmpleados:[],
            tipoDocumentos:[],

            empleados:[],
            personas:[],
            genero:[
                {id:1,text:'Hombre'},
                {id:2,text:'Mujer'}
            ],

            

            empleado:{
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

                tipoEmpleado:{
                	id:'',
                	nombre:'',
                },
            },
        }
        
        
    },

   

created(){
    axios.get('/TipoEmpleado')
    .then(res=>{
        this.tipoEmpleados = res.data;

    }),
    axios.get('/Horario')
    .then(res=>{
        this.horarios = res.data;
        console.log(res.data[0]);

    }),

    axios.get('/TipoDocumento')
    .then(res=>{
        this.tipoDocumentos = res.data;
    }),


    axios.get('/Empleado/index').then(res=>{
        this.empleados = res.data;
        console.log(this.empleados);
       
        //this.empleados.persona=this.buscar2(this.empleado.per_id);
    })
},
methods:{

    
    ver(empleado){
        location.href = '/Empleado/' + empleado.id
    },

    cargar(empleado){
        location.href = '/Empleado/actualizar/' + empleado.id
    },

    eliminar(empleado,index){
                const confirmacion = confirm(`Confirma Eliminar empleado: ${empleado.id}`);
                    if(confirmacion){
                            axios.delete('/Empleado/'+empleado.id)
                            .then(()=>{
                                    this.empleados.splice(index,1);
                            });
                        }
        },
    verHorario(empleado){
    
        
        location.href= '/Empleado/horario/'+empleado.id;


    },
},
}
</script>
