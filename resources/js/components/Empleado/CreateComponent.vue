<template>
    <div class="card-body">
        <div>
                      


                       

                        
                
            <div class="form-group row">
            <!-- /.Div para el documento -->
                <div class="col-md-6">
                    <select class="form-control" v-model="tipo_doc.id" >
                        <option disabled value="">Selecione un tipo de documento</option>
                        <option v-for="item in tipoDocumentos" v-bind:key = "item.id" >{{ item.nombre }}</option>
                    </select>
                </div>
                
                <div class="col">
                    <input type="text" v-model="empleado.persona.documento" class="form-control "   required  
                        placeholder="Documento" v-on:keyup.enter="buscar">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        
                </div>   
                
            
            </div>
                
                    
                   
                

              <!-- /.Row para documento y edad -->

            <div class="row form-group">
                <div class="col-md-6">
                    <input id="firstname" type="text" class="form-control " placeholder="Nombres" v-model="empleado.persona.nombre"   autofocus>

                    
                </div>

                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control " placeholder="Apellidos" v-model="empleado.persona.apellido"  required autofocus>

                                
                </div>

                

            </div>
                    
                



            <!-- /.Row para sexo y altura-->  

                <div class="row form-group">

                    <div class="col ">
                    <input type="date" v-model="empleado.persona.fecha_nac" class="form-control " autocomplete="off"
                         placeholder="Fecha de Nacimiento">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                
                </div>

                    <div class="col ">
                        <SELECT v-model="empleado.persona.sexo" class="form-control " autocomplete="off" >
                            <option selected disabled value="" >Sexo:</option>
                            <option v-for="item in ['Hombre','Mujer']" v-bind:key = "item" >{{ item }}</option>
                            
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
                     

                    <div class="col ">
                        <input type="text" v-model="empleado.persona.telefono"  class="form-control " autocomplete="off" 
                            placeholder="Telefono">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        
                    </div>

                    <div class="col ">
                        <input type="text" v-model="empleado.persona.direccion" class="form-control " autocomplete="off" 
                            placeholder="Direccion">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        
                    </div>

                </div>

                 <!-- /.Div para el nickname -->


                 <div class="form-group row">
                             <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control " v-model="empleado.nickname" placeholder="Nombre de usuario" required  autofocus>

                                
                            </div>
                            <!-- /.fin de div para el nickname -->


                            <!-- /.inicio de correo electronico -->
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " v-model="empleado.email"  required  placeholder="E-mail">

                                
                            </div>
                        </div>
                        
                <div class="form-group row  ">

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " v-model="empleado.password" required autocomplete="new-password" placeholder="Contraseña">

                                
                            </div>

                            
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="empleado.password_confirmation" placeholder="Confirmar contraseña" required >
                            </div>


                </div>
            
                

                
               

                
            
            
                


                
                            <!-- /.col -->
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <select class="form-control" v-model="tipo_emple.id" >
                                        <option disabled value="">Selecione un tipo de empleado</option>
                                        <option v-for="item in tipoEmpleados" v-bind:key = "item.id" >{{ item.nombre }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 text-center">
                                    <button  v-on:click="ver" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                            </div>

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
            tipo_emple:{id:'',
                         nombre:''},
            tipo_doc:{
                id:'',
                nombre:'',
            },
            empleado:{
                persona:{documento:'',
                nombre:'',
                apellido:'',
                fecha_nac:'',
                sexo:'',
                telefono:'',
                direccion:'',
                altura:'',},
                user:{
                nickaname:'',
                email:'',
                password:'',
                password_confirmation:'',
                },
                
                    
                
                


            },
            empleados:[],

        }
        
    },
    created(){
    axios.get('/TipoEmpleado')
    .then(res=>{
        this.tipoEmpleados=res.data;
    
    }),
    axios.get('/TipoDocumento')
    .then(res=>{
        this.tipoDocumentos=res.data;
    })
},
    methods: {
        buscar(){
            //console.log(this.empleado.persona.documento);
            //console.log('hola');
             axios.get('/Persona/'+this.empleado.persona.documento).
            then(res=>{
                let person=res.data[0];
                this.empleado.persona=person;
                console.log(person)
               // console.log(res.data);
                //console.log(res.data['0']['nombre'])
            }

            )
        },

        crear(){
            const params={
                documento:this.empleado.persona.documento,
                nombre:this.empleado.personoa.nombre,
                apellido:this.empleado.persona.apellido,
                fecha_nac:this.empleado.persona.fecha_nac,
                sexo:this.empleado.persona.sexo,
                telefono:this.empleado.persona.telefono,
                direccion:this.empleado.persona.direccion,
                altura:this.empleado.persona.altura,
                foto:this.empleado.persona.foto,
                nickname:this.empleado.user.nickname,
                email:this.empleado.user.email,
                password:this.empleado.user.password,
                password_confirmation:this.empleado.user.password_confirmation,
                tip_emp_id:this.tipo_emple.id
                };
            axios.post('/Empleado/',params).then(
                res=>{
                    console.log('se agrego un nuevo empleado')
                }
            )
        },

        ver(){
            console.log('entro al evento');
        }
    },
}
</script>