<template>
    <div class="card">
        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Registrar Empleado</h4>
        </div>
        <br>
       

       <div class="card-body">
            <div class="form-group row">
            <!-- /.Div para el tipo de documento -->
                <div class="col-md-6">
                    <select class="form-control" v-model="empleado.persona.tipo_doc">
                        <option disabled value="">Selecione un tipo de documento</option>
                        <option v-for="item in tipoDocumentos" v-bind:key="item.id" v-bind:value="item.id">{{ item.nombre }}</option>
                    </select>
                </div>
                
                <!-- /.Div para digitar y buscar el numero del documento -->
                <div class="col">
                    <input type="text" v-model="empleado.persona.documento" class="form-control "   required  
                        placeholder="Documento" v-on:keyup.enter = "buscar">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>   
            </div>
                
                     
            <!-- /.Row para nombre y apellido -->
            <div class="row form-group">
                <div class="col-md-6">
                    <input id="firstname" type="text" class="form-control " placeholder="Nombres" v-model="empleado.persona.nombre"  autofocus>
                </div>

                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control " placeholder="Apellidos" v-model="empleado.persona.apellido"  required autofocus>            
                </div>
            </div>
                    
                
            <!-- /.Row para sexo y altura-->  
                <div class="row form-group">
                    <div class="col">
                        <input type="date" v-model="empleado.persona.fecha_nac" class="form-control" autocomplete="off"
                         placeholder="Fecha de Nacimiento">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>          
                </div>

                    <div class="col">
                        <SELECT v-model="empleado.persona.sexo" class="form-control " autocomplete="off">
                            <option selected disabled>Sexo:</option>
                            <option v-for = "item in genero" v-bind:key="item.text">{{ item.text }}</option>
                        </SELECT>
                    </div>

                   <div class="col ">
                        <input type="text" v-model="empleado.persona.altura" class="form-control"  autocomplete="off" 
                            placeholder="Altura">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                               
                    </div>
                </div>


                <!-- /.Row para telefono y direcion  -->  
                <div class="row form-group">
                    <div class="col">
                        <input type="text" v-model="empleado.persona.telefono"  class="form-control " autocomplete="off" 
                            placeholder="Telefono">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="col">
                        <input type="text" v-model="empleado.persona.direccion" class="form-control " autocomplete="off" 
                            placeholder="Direccion">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                </div>


                 <!-- /.Div para el nickname -->
                 <div class="form-group row">

                    <div class="col-md-6">
                        <input id="nickname" type="text" class="form-control " v-model="empleado.persona.user.nickname" placeholder="Nombre de usuario" required  autofocus>        
                    </div>
                            <!-- /.fin de div para el nickname -->

                            <!-- /.inicio de correo electronico -->
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control " v-model="empleado.persona.user.email"  required  placeholder="E-mail">          
                    </div>
                </div>
                        
                <div class="form-group row  ">

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control " v-model="empleado.persona.user.password" required autocomplete="new-password" placeholder="Contraseña">      
                    </div>
  
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" v-model="empleado.persona.user.password_confirmation" placeholder="Confirmar contraseña" required >
                    </div>

                </div>

                            <!-- /.col -->
                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <select class="form-control" v-model="empleado.persona.tipo_emple">
                            <option disabled value="">Selecione un tipo de empleado</option>

                            <option v-for="item in tipoEmpleados" v-bind:key="item.id" v-bind:value="item.id">{{ item.nombre }}</option>
                        </select>
                    </div>


                    <div class="col-md-6 text-center">
                        <button  v-on:click="crear()" class="btn btn-primary">Registrar
                        </button>
                    </div>

                </div>
        </div>


        <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>id tip emp</th>
                            <th>id persona</th>
                            <th v-can="'editar-empleado'||'eliminar-empleado'">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for = "(empleado,index) in empleados" :key="index"> <!-- Recorremos nuestro array -->
                            
                            
                                <td>{{empleado.id}}</td>
                            
                            <!--En la primera columna mostramos el nombre-->
                           
                            <td v-can="'editar-empleado'||'eliminar-empleado'">
                                <button v-can="'editar-empleado'" class="btn btn-success btn-sm" @click = "editarForm(empleado,index)">Editar</button>
                                <button v-can="'eliminar-empleado'" class="btn btn-danger btn-sm" @click= "eliminar(empleado,index)">Eliminar</button>
                            </td>
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
            tipoEmpleados:[],
            tipoDocumentos:[],

            empleados:[],
            personas:[],
            genero:[
                {id:1,text:'Hombre'},
                {id:2,text:'Mujer'}
            ],

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
                    tipo_emple:'',
                    user:{
                        nickname:'',
                        email:'',
                        password:'',
                        password_confirmation:'',
                    },  

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
                    tipo_emple:'',
                    user:{
                        nickname:'',
                        email:'',
                        password:'',
                        password_confirmation:'',
                    },
                },
            },
        },
    

created(){
    axios.get('/TipoEmpleado')
    .then(res=>{
        this.tipoEmpleados = res.data;
    }),

    axios.get('/TipoDocumento')
    .then(res=>{
        this.tipoDocumentos = res.data;
    }),

    axios.get('/Empleado').then(res=>{
        this.empleados = res.data;
        console.log(this.empleados);

       for(var i=0;i<this.empleados.length;i++){
           console.log(this.empleados[i].per_id);
           console.log(this.buscar2(this.empleados[i].per_id));
           //this.empleado.persona=this.buscar2(this.empleados[i].per_id);
           //console.log(this.empleado.persona);
           //console.log(this.buscar2(this.empleados[i]));
           //console.log(this.empleados[i].persona);
       }
       
        //this.empleados.persona=this.buscar2(this.empleado.per_id);
        
    })

    

    
},

methods: {

        buscar(){
        //console.log(this.empleado.persona.documento);
        //console.log('hola');
            axios.get('/Persona/'+this.empleado.persona.documento).
            then(res=>{
            let person = res.data[0];
            this.empleado.persona = person;
           // console.log(person)
                   // console.log(res.data);
                    //console.log(res.data['0']['nombre'])
            })
        },

        buscar2(id_persona){
        //console.log(this.empleado.persona.documento);
        //console.log('hola');
            var persona;
            //console.log('hola '+id_persona)
            axios.get('/Persona/buscar/'+id_persona).
            then(res=>{
            persona = res.data;
            console.log(res.data);
            return persona;
                    //console.log(res.data['0']['nombre'])
            })
            //console.log(persona)
            return persona;
        },

        crear(){
            const params = {
                tipo_doc:this.empleado.persona.tipo_doc,
                documento:this.empleado.persona.documento,
                nombre:this.empleado.persona.nombre,
                apellido:this.empleado.persona.apellido,
                fecha_nac:this.empleado.persona.fecha_nac,
                sexo:this.empleado.persona.sexo,
                telefono:this.empleado.persona.telefono,
                direccion:this.empleado.persona.direccion,
                altura:this.empleado.persona.altura,
                nickname:this.empleado.persona.user.nickname,
                email:this.empleado.persona.user.email,
                password:this.empleado.persona.user.password,
                password_confirmation:this.empleado.persona.user.password_confirmation,
                tip_emp_id:this.empleado.persona.tipo_emple,
            };
            //console.log(params),

            axios.post('/Empleado',params).then(res=>{
                        console.log(res.data)
            });
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


        editarForm(empleado){
            this.editarActivo=true;
            this.empleado.tip_emp_id = empleado.tipo_emple;
        },


        editar(empleado){
            const params={
                tipo_doc:empleado.persona.tipo_doc,
                documento:empleado.persona.documento,
                nombre:empleado.persona.nombre,
                apellido:empleado.persona.apellido,
                fecha_nac:empleado.persona.fecha_nac,
                sexo:empleado.persona.sexo,
                telefono:empleado.persona.telefono,
                direccion:empleado.persona.direccion,
                altura:empleado.persona.altura,
                nickname:empleado.persona.user.nickname,
                email:empleado.persona.user.email,
                tip_emp_id:empleado.persona.tipo_emple,
            }

            console.log(empleado);
                axios.put('/Empleado/'+empleado.id,empleado)
                .then(res=>{
                     const index = this.Empleados.findIndex(buscar=>buscar.id == empleado.id);
                     console.log(res.data.status);

                     this.empleados[index].persona.tipo_doc = empleado.persona.tipo_doc;
                     this.empleados[index].persona.documento  = empleado.persona.documento;
                     this.empleados[index].persona.nombre  = empleado.persona.nombre;
                     this.empleados[index].persona.apellido  = empleado.persona.apellido;
                     this.empleados[index].persona.fecha_nac  = empleado.persona.fecha_nac;
                     this.empleados[index].persona.sexo  = empleado.persona.sexo;
                     this.empleados[index].persona.telefono  = empleado.persona.telefono;
                     this.empleados[index].persona.direccion  = empleado.persona.direccion;
                     this.empleados[index].persona.altura  = empleado.persona.altura;
                     this.empleados[index].persona.user.nickname  = empleado.persona.user.nickname;
                     this.empleados[index].persona.user.email  = empleado.persona.user.email;
                     this.empleados[index].persona.tipo_emple  = empleado.persona.tipo_emple;

                     this.empleado.persona.tipo_doc            = '';
                     this.empleado.persona.documento          = '';
                     this.empleado.persona.nombre          = '';
                     this.empleado.persona.apellido        = '';
                     this.empleado.persona.fecha_nac          = '';
                     this.empleado.persona.sexo         = '';
                     this.empleado.persona.telefono         = '';
                     this.empleado.persona.direccion          = '';
                     this.empleado.persona.altura          = '';
                     this.empleado.persona.user.nickname          = '';
                     this.empleado.persona.user.email         = '';
                     this.empleado.persona.tipo_emple         = '';

                     this.editarActivo = false;
                })
        },

        ver(){
                console.log('entro al evento');
        }

    },
}

}