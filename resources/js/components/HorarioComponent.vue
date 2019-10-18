<template>
    <div  class="card">
        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Horario</h4>
        </div>
        
        <div class="card-body" v-can="'guardar-tipo-cliente'">
            <form @submit.prevent="editar(horario)" v-if="editarActivo" >
                    <div class="row">
                            <div class="col-5">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="horario.nombre">
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="ingreso" class="form-control mb-2" v-model="horario.ingreso">
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="salida" class="form-control mb-2" v-model="horario.salida">
                            </div>

                            <div class="col-2">
                                 <button  class="btn btn-success mr-2" type="submit">Editarrrrrr</button>
                            </div>
                    </div>
                    
                   
             </form>


             <form @submit.prevent="agregar" v-else>
                    <div class="row">
                            <div class="col-4">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="horario.nombre">
                            </div>

                           
                            <div class=" col-3 form-group">
                                
                                  <select id="hora" v-model="item" class="form-control" placeholder="hora de entrada">
                                 <option v-for="item in horas" v-bind:key = "item" >{{ item }}</option>
                           </select>
                            </div>

                            <div class="col-3 form-group">
                                
                                  <select id="hora_salida" v-model="item" class="form-control" aria-placeholder="hola" placeholder=" hora salida">
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
                            <th v-can="'editar-tipo-cliente'||'eliminar-tipo-cliente'" >Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(horario,index) in horarios" :key="index"> <!-- Recorremos nuestro array -->
                            <td >{{horario.id}}</td> 
                            <td >{{horario.nombre}}</td> <!--En la primera columna mostramos el nombre-->
                            <td v-text="horario.ingreso"></td> <!--En la segunda mostramos el apellido-->
                            <td v-text="horario.salida"></td>
                            <td v-can="'editar-tipo-cliente'||'eliminar-tipo-cliente'"> 
                                <button v-can="'editar-tipo-cliente'" class="btn btn-success btn-sm" @click="editarForm(tipocliente,index)">Editar</button>
                                <button v-can="'eliminar-tipo-cliente'" class="btn btn-danger btn-sm" @click="eliminar(tipocliente,index)">Eliminar</button>
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
                ingreso:'',
                salida:'',
                },
            horas:['0:00','1:00','2:00','3:00','4:00','5:00','6:00','7:00','8:00','9:00',
                    '10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00',
                     '19:00','20:00','21:00','22:00','23:00'],
             editarActivo:false,
             item:'1'
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

            if(this.horario.nombre.trim() === '' || this.horario.ingreso.trim() === ''|| this.horario.salida.trim()){
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


        editarForm(horario){
            this.editarActivo=true;
            this.horario.nombre=horario.nombre;
            this.horario.ingreso=horario.ingreso;
            this.horario.salida=horario.salida;
            this.horario.id=horario.id;

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