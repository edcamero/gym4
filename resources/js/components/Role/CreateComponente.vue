<template>
    <div class="card">

        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Agregar Empleado</h4>
        </div>
       <div class="card-body">
            <div class="form-group row">
            <!-- /.Div para el tipo de documento -->
                
                <div class="col-md-4">
                    <label ><strong>Nombre del role:</strong></label>
                </div>

                <div class="col-md-8 form-group" >
                    <input type="text" v-model="a" class="form-control "   required  
                            placeholder="Role">
                </div>
                

                
                

                <v-hr style="color: #0056b2;" />

                <div class="col-md-12 form-group">
                    <label ><strong>Permisos especiales:</strong></label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked" value = "">
                    <label for="checkbox">{{ "Acceso total" }}</label>
                </div>



                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "Ningun Acceso" }}</label>
                </div>

                <div class="col-md-12 form-group">
                    <label ><strong>Lista de permisos:</strong></label>
                </div>

                <div class="col">
                        <SELECT v-model="e" class="form-control " autocomplete="off">
                            <option v-for = "item in descripciones" v-bind:key="item.text" data-toggle="modal" data-target="#Permisos+'item.id'">>{{ item.text }}</option>
                        </SELECT>
                </div>







                <div class="modal" id="permisos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Horario del Empleado</h5>
                       
                       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            
                        </div>
                        <table class="table table-sm">
                           <thead>
                               <tr>                                  
                                   <th>Domingo</th>
                                   <th>Lunes </th>
                                   <th>Martes </th>
                                   <th>Miercoles</th>
                                   <th>Jueves</th>
                                   <th>Viernes</th>
                                   <th>Sabado </th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td ></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                               </tr>
                               
                           </tbody>
                       </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                </div>
                </div>










                

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "ver empleados" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "agregar empleados" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "eliminar empleados" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "modificar empleados" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "ver roles" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "agregar roles" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "eliminar roles" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "modificar roles" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "ver tipos de empleados" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "agregar tipos de empleados" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "eliminar tipos de empleados" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "modificar tipos de empleados" }}</label>
                </div>
                
                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "ver tipos de clientes" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "agregar tipos de clientes" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "eliminar tipos de clientes" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "modificar tipos de clientes" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "ver horarios" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "agregar horarios" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "eliminar horarios" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "modificar horarios" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "ver clientes" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "agregar clientes" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "eliminar clientes" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "modificar clientes" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "ver tipos de documetos" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "agregar tipos de documetos" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked">
                    <label for="checkbox">{{ "eliminar tipos de documetos" }}</label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" v-model="checked" value="">
                    <label for="checkbox">{{ "modificar tipos de documetos" }}</label>
                </div>
         </div>

                <!-- /.Div para digitar y buscar el numero del documento -->
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
            permisos:[],
            descripciones:[
                {id:0,text:'Seleccione'},
                {id:1,text:'Permisos de cliente'},
                {id:2,text:'Permisos de empleado'},
                {id:3,text:'Permisos de tipo de clienetes'},
                {id:4,text:'Permisos de tipo de empleados'},
                {id:5,text:'Permisos de los roles'},
                {id:6,text:'Permisos de horarios'},
                {id:7,text:'Permisos de tipos de documentos'},
            ],
        }
        
        
    },

   

created(){
    axios.get('/TipoEmpleado')
    .then(res=>{
        this.tipoEmpleados = res.data;

    }),

    axios.get('/TipoDocumento')
    .then(res=>{
        this.tipoDocumentos = res.data;
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


</script>


}