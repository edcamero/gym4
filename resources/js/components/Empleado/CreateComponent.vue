< template >
    < div  class = " tarjeta " >
        < div  class = " card-header " >
                < h4  class = " text-center mb-2 card-title " > Registrador Empleado </ h4 >
        </ div >
        < Br >
       

       < div  class = " card-body " >
            < div  class = " form-group row " >
            <! - /.Div para el tipo de documento ->
                < div  class = " col-md-6 " >
                    < select  class = " form-control "  v-model = " empleado . persona . tipo_doc " >
                        < option  disabled  value = " " > Seleccionar un tipo de documento </ option >
                        < opción  v-for = " elemento en tipoDocumentos "  v-bind : key = " item . id "  v-bind : value = " item . id " > {{ item . nombre }} </ opción >
                    </ select >
                </ div >
                
                <! - /.Div para digitar y buscar el numero del documento ->
                < div  class = " col " >
                    < input  type = " text "  v-model = " empleado . persona . documento "  class = " form-control "    requerido  
                        marcador de posición = " Documento "  v-on : keyup . enter = " buscar " >
                    < span  class = " glyphicon glyphicon-user form-control-feedback " > </ span >
                </ div >   
            </ div >
                
                     
            <! - /.Row para nombre y apellido ->
            < div  class = " row form-group " >
                < div  class = " col-md-6 " >
                    < input  id = " firstname "  type = " text "  class = " form-control "  placeholder = " Nombres "  v-model = " empleado . persona . nombre "   autofocus >
                </ div >

                < div  class = " col-md-6 " >
                    < input  id = " lastname "  type = " text "  class = " form-control "  placeholder = " Apellidos "  v-model = " empleado . persona . apellidos "   requiere  enfoque automático >            
                </ div >
            </ div >
                    
                
            <! - /.Row para sexo y altura ->  
                < div  class = " row form-group " >
                    < div  class = " col " >
                        < input  type = " date "  v-model = " empleado . persona . fecha_nac "  class = " form-control "  autocomplete = " off "
                         placeholder = " Fecha de Nacimiento " >
                    < span  class = " glyphicon glyphicon-user form-control-feedback " > </ span >          
                </ div >

                    < div  class = " col " >
                        < SELECT  v-model = " empleado . Persona . Sexo "  class = " form-control "  autocomplete = " off " >
                            < opción  seleccionada  deshabilitada > Sexo: </ opción >
                            < opción  v-for = " item in genero "  v-bind : key = " item . text " > {{ item . texto }} </ opción >
                        </ SELECCIONAR >
                    </ div >

                   < div  class = " col " >
                        < input  type = " text "  v-model = " empleado . persona . altura "  class = " form-control "   autocomplete = " off " 
                            placeholder = " Altura " >
                            < span  class = " glyphicon glyphicon-user form-control-feedback " > </ span >
                               
                    </ div >
                </ div >


                <! - /.Row para telefono y direcion   ->  
                < div  class = " row form-group " >
                    < div  class = " col " >
                        < input  type = " text "  v-model = " empleado . persona . telefono "   class = " form-control "  autocomplete = " off " 
                            placeholder = " Telefono " >
                        < span  class = " glyphicon glyphicon-user form-control-feedback " > </ span >
                    </ div >

                    < div  class = " col " >
                        < input  type = " text "  v-model = " empleado . persona . direccion "  class = " form-control "  autocomplete = " off " 
                            placeholder = " Direccion " >
                        < span  class = " glyphicon glyphicon-user form-control-feedback " > </ span >
                    </ div >

                </ div >


                 <! - /.Div para el apodo ->
                 < div  class = " form-group row " >

                    < div  class = " col-md-6 " >
                        < input  id = " nickname "  type = " text "  class = " form-control "  v-model = " empleado . persona . user . nickname "  placeholder = " Nombre de usuario "  requiere   enfoque automático >        
                    </ div >
                            <! - /.fin de div para el apodo ->

                            <! - /.inicio de correo electrónico ->
                    < div  class = " col-md-6 " >
                        < input  id = " email "  type = " email "  class = " form-control "  v-model = " empleado . persona . user . email "   required   placeholder = " E-mail " >          
                    </ div >
                </ div >
                        
                < div  class = " form-group row   " >

                    < div  class = " col-md-6 " >
                        < input  id = " password "  type = " password "  class = " form-control "  v-model = " empleado . persona . user . password "  required  autocomplete = " new-password "  placeholder = " Contraseña " >      
                    </ div >
  

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

                            
                            
                                < td > {{ empleado . id }} </ td >
                                < td > {{ empleado . persona . nombre }} </ td >
                            <! - En la primera columna mostramos el nombre ->
                           
                            < td  v-can = " ' editar-empleado ' || ' eliminar-empleado ' " >
                                < button  v-can = " ' editar-empleado ' "  class = " btn btn-success btn-sm " @ click = " editarForm (empleado, index) " > Editar </ button >
                                < button  v-can = " ' eliminar-empleado ' "  class = " btn btn-danger btn-sm " @ click = " eliminar (empleado, index) " > Eliminar </ button >
                            </ td >
                        </ tr >
                    </ tbody >
                </ table >
        </ div >





    </ div >
</ template >


< guión >
exportación  predeterminada {
    montado () {
        consola . log ( " se monto el componente agregar empleado " );
    },
    datos () {
        volver {
            tipoEmpleados : [],
            tipoDocumentos : [],
            empleados : [],
            personas : [],
            genero : [
                {id : 1 , texto : ' Hombre ' },
                {id : 2 , texto : ' Mujer ' }
            ],
<<<<<<< HEAD
            
            empleado : {
                persona : {
                    tipo_doc : ' ' ,
                    documento : ' ' ,
                    nombre : ' ' ,
                    apellido : ' ' ,
                    fecha_nac : ' ' ,
                    sexo : ' ' ,
                    telefono : ' ' ,
                    direccion : ' ' ,
                    altura : ' ' ,
                    tipo_emple : ' ' ,
                    usuario : {
                        apodo : ' ' ,
                        correo electrónico : ' ' ,
                        contraseña : ' ' ,
                        contraseña_confirmación : ' ' ,
                    },
                },
            },
        }
        
        
    },
    creado () {
    axios . get ( ' / TipoEmpleado ' )
    . entonces ( res => {
        esta . tipoEmpleados  =  res . datos ;
=======

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
>>>>>>> parent of 028dda2... aaaa
    }),
    axios . get ( ' / TipoDocumento ' )
    . entonces ( res => {
        esta . tipoDocumentos  =  res . datos ;
    }),
<<<<<<< HEAD
    axios . get ( ' / Empleado ' ). entonces ( res => {
        esta . empleados  =  res . datos ;
        consola . log ( esto . empleados )
       
        // this.empleados.persona = this.buscar2 (this.empleado.per_id);
=======

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
>>>>>>> parent of 028dda2... aaaa
        
    })

    
<<<<<<< HEAD
    
},
métodos : {
        buscar () {
        // console.log (this.empleado.persona.documento);
        // console.log ('hola');
            axios . get ( ' / Persona / ' + this . empleado . persona . documento ).
            entonces ( res => {
            dejar persona =  res . datos [ 0 ];
            esta . empleado . persona  = persona;
           // console.log (persona)
                   // console.log (res.data);
                    // console.log (res.data ['0'] ['nombre'])
            })
        },
        buscar2 ( id_persona ) {
            var persona;
            // console.log ('hola' + id_persona)
            axios . get ( ' / Persona / buscar / ' + id_persona).
            entonces ( res => {
            persona =  res . datos ;
            consola . registro ( datos res . );
            volver persona;
                    // console.log (res.data ['0'] ['nombre'])
            })
            // console.log (persona)
            volver persona;
=======

    
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
>>>>>>> parent of 028dda2... aaaa
        },
        crear () {
            const  params  = {
                tipo_doc : esto . empleado . persona . tipo_doc ,
                documento : esto . empleado . persona . Documento ,
                nombre : esto . empleado . persona . nombre ,
                apellido : esto . empleado . persona . apellido ,
                fecha_nac : esto . empleado . persona . fecha_nac ,
                sexo : esto . empleado . persona . sexo ,
                telefono : esto . empleado . persona . telefono ,
                direccion : esto . empleado . persona . direccion ,
                altura : esto . empleado . persona . altura ,
                apodo : esto . empleado . persona . de usuario . apodo ,
                correo electrónico : esto . empleado . persona . de usuario . de correo electrónico ,
                contraseña : esto . empleado . persona . de usuario . contraseña ,
                contraseña_confirmación : esto . empleado . persona . de usuario . contraseña_confirmación ,
                tip_emp_id : esto . empleado . persona . tipo_emple ,
            };
            // console.log (params),
            axios . post ( ' / Empleado ' , params). entonces ( res => {
                        consola . log ( datos res . )
            });
        },
        eliminar ( empleado , index ) {
                const  confirmacion  =  confirm ( ` Confirma Eliminar empleado: $ { empleado . id } ` );
                    if (confirmacion) {
                            axios . eliminar ( ' / Empleado / ' + empleado . id )
                            . entonces (() => {
                                    esta . empleados . empalme (índice, 1 );
                            });
                        }
        },
        editarForm ( empleado ) {
            esta . editarActivo = verdadero ;
            esta . empleado . tip_emp_id  =  empleado . tipo_emple ;
        },
        editar ( empleado ) {
            const  params = {
                tipo_doc : empleado . persona . tipo_doc ,
                documento : empleado . persona . Documento ,
                nombre : empleado . persona . nombre ,
                apellido : empleado . persona . apellido ,
                fecha_nac : empleado . persona . fecha_nac ,
                sexo : empleado . persona . sexo ,
                telefono : empleado . persona . telefono ,
                direccion : empleado . persona . direccion ,
                altura : empleado . persona . altura ,
                apodo : empleado . persona . de usuario . apodo ,
                correo electrónico : empleado . persona . de usuario . de correo electrónico ,
                tip_emp_id : empleado . persona . tipo_emple ,
            }
            consola . log (empleado);
                axios . put ( ' / Empleado / ' + empleado . id , empleado)
                . entonces ( res => {
                      índice  const =  esto . Empleados . findIndex ( buscar => buscar . id  ==  empleado . id );
                     consola . registro ( res . datos . estado );
                     esta . empleados [índice]. persona . tipo_doc  =  empleado . persona . tipo_doc ;
                     esta . empleados [índice]. persona . documento   =  empleado . persona . documento ;
                     esta . empleados [índice]. persona . nombre   =  empleado . persona . nombre ;
                     esta . empleados [índice]. persona . apellido   =  empleado . persona . apellido ;
                     esta . empleados [índice]. persona . fecha_nac   =  empleado . persona . fecha_nac ;
                     esta . empleados [índice]. persona . sexo   =  empleado . persona . sexo ;
                     esta . empleados [índice]. persona . telefono   =  empleado . persona . telefono ;
                     esta . empleados [índice]. persona . direccion   =  empleado . persona . direccion ;
                     esta . empleados [índice]. persona . altura   =  empleado . persona . altura ;
                     esta . empleados [índice]. persona . de usuario . apodo   =  empleado . persona . de usuario . apodo ;
                     esta . empleados [índice]. persona . de usuario . correo electrónico   =  empleado . persona . de usuario . correo electrónico ;
                     esta . empleados [índice]. persona . tipo_emple   =  empleado . persona . tipo_emple ;
                     esta . empleado . persona . tipo_doc             =  ' ' ;
                     esta . empleado . persona . documento           =  ' ' ;
                     esta . empleado . persona . nombre           =  ' ' ;
                     esta . empleado . persona . apellido         =  ' ' ;
                     esta . empleado . persona . fecha_nac           =  ' ' ;
                     esta . empleado . persona . sexo          =  ' ' ;
                     esta . empleado . persona . telefono          =  ' ' ;
                     esta . empleado . persona . direccion           =  ' ' ;
                     esta . empleado . persona . altura           =  ' ' ;
                     esta . empleado . persona . de usuario . apodo           =  ' ' ;
                     esta . empleado . persona . de usuario . correo electrónico          =  ' ' ;
                     esta . empleado . persona . tipo_emple          =  ' ' ;
                     esta . editarActivo  =  falso ;
                })
        },
        ver () {
                consola . log ( ' entrada al evento ' );
        }
    },
}
<<<<<<< HEAD
</ script >
=======

}
>>>>>>> parent of 028dda2... aaaa
