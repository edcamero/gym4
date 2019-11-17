<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header">Calendario</div>
                    <div class="card-body">
                              <label for=""></label>
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
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        
        data(){
            return{
                actual:'',
                now:'',
                last:'',
                primerDiaSemana:'',
            }
        },
        created(){
            console.log("hola")
            this.fechaActual();
        },
        methods: {
            hola(){
                console.log(this.saludo)
            },
            fechaActual(){
                this.actual=new Date();
                var year=this.actual.getFullYear();
                var month=this.actual.getMonth();
               
                var dia=this.actual.getDay();
                this.now=new Date(year,month+1,1);
                this.last=new Date(year,month,0);

                 this.primerDiaSemana=this.primerDia(this.now.getDay());

                console.log(this.primerDiaSemana);
            },

            primerDia(dia){
                if(dia==0){
                    return 7;
                }else{
                    return dia;
                }
            }
        },
    }
</script>