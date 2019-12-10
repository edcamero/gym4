<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header"> <h2> Horario de  {{this.empleado.persona.nombre}} {{this.empleado.persona.apellido}}</h2></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <label  ><strong> {{this.mes}} {{this.year}}  </strong> </label>
                                 
                            </div>
                            <div class="col-2">
                                <button v-on:click="siguienteMes" class="btn btn-success btn-sm"> <i class="fas fa-arrow-circle-right"></i></button>
                            </div>
                            
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
                                 
                                   <tr v-for="(semana,index) in this.vectorMes" :key="index" > 
                                   <td  v-for="dia in semana" :key="dia.id"   >
                                       <div v-if="dia.data==diaActual" :class="{'bg-info':true}">{{dia.data}}</div>
                                       <div data-toggle="modal" :data-target="'#seleccion'+dia.data" v-else >{{dia.data}}
                                           <div v-for="(turno,index) in dia.turnos" :key="index">{{turno.nombre}}</div>
                                       </div>
                                      
                                      
                                       <!-- Modal -->
            <div class="modal fade" :id="'seleccion'+dia.data" tabindex="-1" role="dialog" :aria-labelledby="'seleccion'+dia.data" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Horarios Registrados en el dia {{dia.data}}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                    </div>
                </div>
            </div>
                                    </td>
                                   
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
            return{
                turnos:[],
                turno:{},
                actual:'',
                mes:'',
                year:'',
                month:'',
                now:'',
                last:'',
                primerDiaSemana:'',
                diaActual:'',
                vectorMes:[],
                semana:[],
                dia:{
                    numero:'',
                    turnos:[],


                },horariosDias:[],
                 empleado:{
                     id:'',
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
            
            axios.get(window.location).then(res=>{
                    
                    this.empleado = res.data;
                    this.verHorario(this.empleado.id);
                    
                
                })
        },
        mounted(){
            //console.log("hola numero "+this.empleado);
             console.log("hola"+this.empleado.persona.nombre)
        },
        methods: {
            seleccion(mensaje) {
                alert(mensaje);
            },
            verHorario(id){
                axios.get('/Empleado/mishorarios/'+id).then(res=>{
                        this.horariosDias=res.data;
                        console.log(this.horariosDias);
                        this.fechaActual();
                    })
            },
            
            fechaActual(){
                this.actual=new Date();
                this.year=this.actual.getFullYear();
                this.month=this.actual.getMonth();
                this.Calendario(this.year,this.month)
            },

            siguienteMes(){
                this.month++;
                if(this.month>11){
                    this.month=0;
                    this.year++;
                }
                this.Calendario(this.year,this.month);
            },
            Calendario(year,month){
               
                
                this.GetMes(month);
                var dia=0;
                this.diaActual=this.actual.getDate();
                
                this.now=new Date(this.year,month,1);
                this.last=new Date(this.year,month+1,0);

                 this.primerDiaSemana=this.now.getDay();
                var ultimoDiaMes=this.last.getDate();
                var last_cell=this.primerDiaSemana+ultimoDiaMes
               
                var dia=1;
                this.vectorMes=new Array(6);
                for(let i=0;i<6;i++){

                    this.vectorMes[i]=new Array(7);
                    var id=1;
                    for (let j = 0; j < 7; j++) {
                        this.ValidarDia("2019-12-11")
                        if(j==this.primerDiaSemana&&i==0&&dia==1){
                           this.vectorMes[i][j] = {id:id++,data:dia,turnos:this.ValidarDia(this.year+"-"+this.month+"-"+dia)
                           };
                          dia++
                           
                             
                        }else{


                            if(dia>1&&dia<=ultimoDiaMes){
                                this.vectorMes[i][j] = {id:id++,data:dia,turnos:this.ValidarDia(this.year+"-"+this.month+"-"+dia)};
                                dia++;
                                

                            }else{
                                this.vectorMes[i][j] = {id:id++,data:'',turnos:this.ValidarDia(this.year+"-"+this.month+"-"+dia)};
                            }
                        }
                        
                        
                        
                                
                        

                        


                    }
                }

	
            },

            ValidarDia(dia){
                var turnos=new Array();
              
                
                this.horariosDias
                .forEach(function (turno) {
                    
                    if(turno.pivot.dia==dia){
                        turnos.push({nombre:turno.nombre});
                        
                    }
                   
                    });
                    return turnos;
            },
            GetMes(m){
                var meses=Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                this.mes=meses[m];
            }
        },
    }
</script>