<template>
    <div  class="card">
        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Horario</h4>
        </div>
        
        <div class="card-body" v-can="'guardar-horario'">
            <form @submit.prevent="editar(horario)" v-if="editarActivo" >
                    <div class="row">
                            <div class="col-4">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="horario.nombre">
                            </div>
                            
                            <div class="col-4  form-group">
                                <select class=" form-control" v-model="horario.ingreso" >
                                <option v-for="item in horas" v-bind:key = "item" >{{ item }}</option>
                                </select>
                            </div>

                            <div class="col-4 form-gruop">
                                <select class="form-control" v-model="horario.salida" >
                                <option v-for="item in horas" v-bind:key = "item" >{{ item }}</option>
                                </select>
                            </div>

                            <div class="col-2">
                                 <button  class="btn btn-success mr-2" type="submit">Editar</button>
                            </div>
                    </div>
                    
                   
             </form>


             <form @submit.prevent="agregar" v-else>
                    <div class="row">
                            <div class="col-4">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="horario.nombre">
                            </div>

                            <div class="col-4  form-group">
                                <select class=" form-control" v-model="horario.ingreso" >
                                <option v-for="item in horas" v-bind:key = "item" >{{ item }}</option>
                                </select>
                            </div>

                            <div class="col-4 form-gruop">
                                <select class="form-control" v-model="horario.salida" >
                                <option v-for="item in horas" v-bind:key = "item" >{{ item }}</option>
                                </select>
                            </div>

                            <div class="col-2">
                                 <button  class="btn btn-primary mr-2" type="submit">Agregarrrrr</button>
                            </div>
                    </div>
                    
                   
             </form>
        </div>
             

        
        <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Ingreso</th>
                            <th>Salida</th>
                            <th v-can="'editar-horario'||'eliminar-horario'" >Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(horario,index) in horarios" :key="index"> <!-- Recorremos nuestro array -->
                            <td >{{horario.id}}</td> 
                            <td >{{horario.nombre}}</td> <!--En la primera columna mostramos el nombre-->
                            <td v-text="horario.ingreso"></td> <!--En la segunda mostramos el apellido-->
                            <td v-text="horario.salida"></td>
                            <td v-can="'editar-horario'||'eliminar-horario'"> 
                                <button v-can="'editar-horario'" class="btn btn-success btn-sm" @click="editarForm(horario,index)">Editar</button>
                                <button v-can="'eliminar-horario'" class="btn btn-danger btn-sm" @click="eliminar(horario,index)">Eliminar</button>
                            </td>
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
            horarios:[],
            horario:{
                nombre:'',
                ingreso:'Seleccione',
                salida:'Seleccione',
                },
            selected:'Sel',
            horas:['Seleccione','00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00',
                    '10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00',
                     '19:00','20:00','21:00','22:00','23:00'],
             editarActivo:false,
            
            };
                      
                
        },
   
        created(){
            axios.get('/Horario')
            .then(res=>{
                this.horarios = res.data;
            })
        },
    methods: {
        agregar(){

            if(this.horario.nombre.trim() === '' || this.horario.ingreso.trim() === ''|| this.horario.salida.trim()===''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }
           // console.log(this.tipocliente.nombre,this.tipocliente.descuento);
            const params={nombre:this.horario.nombre,ingreso:this.horario.ingreso,
            salida:this.horario.salida}
            this.horario.nombre='';
            this.horario.ingreso='';
            this.horario.salida='';

            axios.post('/Horario',params)
                .then(res=>{
                    this.horarios.push(res.data)
                });
        },
        eliminar(horario,index){
            
            const confirmacion = confirm(`Confirma Eliminar Tipo Cliente: ${horario.nombre}`);
                if(confirmacion){
                        axios.delete('/Horario/'+horario.id)
                        .then(()=>{
                                this.horarios.splice(index,1);
                        });
                    }
        },


        editarForm(a){
            this.editarActivo=true;
            this.horario.nombre=a.nombre;
            this.horario.ingreso=a.ingreso.substring(0,5);
            this.horario.salida=a.salida.substring(0,5);
            this.horario.id=a.id;
            console.log(a);
        },


        editar(tc){
            const params={
                nombre:tc.nombre,
                ingreso:tc.ingreso,
                salida:tc.salida
            }
            console.log(tc);
                axios.put('/Horario/'+tc.id,tc)
                .then(res=>{
                     const index=this.horarios.findIndex(buscar=>buscar.id==tc.id);
                     console.log(res.data.status);
                     this.horarios[index].nombre=tc.nombre;
                     this.horarios[index].ingreso=tc.ingreso;
                     this.horarios[index].salida=tc.salida;

                     this.horario.nombre='';
                     this.horario.ingreso='';
                     this.horario.salida='';
                     this.editarActivo=false;
                })
        }
    },
}
</script>