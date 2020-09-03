<template>
<div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Agregar un producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div id="contenerdorCropper"><instagram-cropper 
                            :src="cropper"
                            ref="icrop"
                            
                            :quality="2"
                            :placeholder-font-size="14"
                            placeholder-color="#000000" 
                            placeholder="Choose or Drag'n'Drop an image"
                            ></instagram-cropper></div>
                            
                        </div>
                        <div class="row justify-content-center">
                                <button v-on:click="seleccionarImagen" class="btn btn-warning"><i class="fas fa-upload"></i>seleccionar imagen</button>
                        </div>
                        <div class="row">
                            <div class="form-group m-5">
                                <label for="nombreprod">Nombre del producto:</label>
                                <input type="text" id="nombreprod" v-model="product_name" class="form-control">
                            </div>
                            <div class="form-group m-5">
                                <label for="descripprod">Descripcion del producto:</label>
                                <textarea v-model="product_description" id="descripprod" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <label for="Tags">Etiquetas de su producto:</label>
                            <input type="text" id="tags" data-role="tagsinput" class="form-control" name="tags" value="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" v-if="editando" class="btn btn-primary" v-on:click="crearNuevoProducto">Crear el producto</button>
                        <button type="button" v-else class="btn btn-success" v-on:click="actualizarProducto">Guardar cambios</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!------------------------------------------------------------------->

        <div class="row justify-content-end">  
            <button class="btn btn-primary" v-on:click="abrirModal">nuevo</button>
        </div>
</div>
    
</template>

<script>
import Swal from "sweetalert2";
import InstagramCropper from '../instagram-cropper/InstagramCropper.vue'
import data from '../instagram-cropper/core/data';
export default {
    components:{
        InstagramCropper
    },
    mounted(){
        console.log("modal listo");
        
        },
    data(){
        return {cropper: '',
                product_name: "",
                product_description: "",
                id_local: $("#idLocal").val(),
                product_image: "",
                correcto: "",
                editando: true,
                product_id: ""
        }
        },
    methods:{
        seleccionarImagen(event){
            this.$refs.icrop.refresh();
            this.$refs.icrop.chooseFile();
           // var verif = this.$refs.icrop.hasImage();
          
                //this.cropper = 'img/SubirImg.png';
            this.cropper = this.$refs.icrop.getChosenFile();
            
            this.product_image = this.$refs.icrop.generateDataUrl(); 
        },
        abrirModal(){
            this.editando = true;
            this.limpiarCampos();
            $('#myModal').modal('show')
        },
        crearNuevoProducto(){
            this.product_image = this.$refs.icrop.generateDataUrl(); 
            axios.post('/guardarProducto', {
                product_image: this.product_image,
                product_name: this.product_name,
                product_description: this.product_description,
                id_local: this.id_local,
                tags: $("#tags").val()
            })
            .then(response => {
                
                Swal.fire({
                            icon: "success",
                            title:
                                "El producto ha sido ingresado.",
                            showConfirmButton: true,
                            timer: 1500
                        });
                $('#myModal').modal('hide');  
                this.$emit('nuevo');     
                console.log(response);
            })
            .catch(function (error) {
              
                console.log(error);
            });

           
        },
        abrirEditar(producto){
            console.log("----------------------------");
            console.log(producto);
            console.log("----------------------------");
            this.editando = false;
            this.limpiarCampos();
            $("#myModal").modal("show");
            this.cropper = 'productosImg/'+producto.product_image;
            this.product_name = producto.product_name;
            this.product_description = producto.product_description;
            this.product_id = producto.id;
            producto.tags.forEach(tag => {
                $('#tags').tagsinput('add', tag);
            });
        },
        actualizarProducto(){
            this.product_image = this.$refs.icrop.generateDataUrl(); 
            axios.post('/actualizarProducto', {
                product_image: this.product_image,
                product_name: this.product_name,
                product_description: this.product_description,
                id_local: this.id_local,
                tags: $("#tags").val(),
                product_id: this.product_id
            })
            .then(response => {
                
                // Swal.fire({
                //     icon: "success",
                //     title:
                //         "El producto ha sido actualizado.",
                //     showConfirmButton: true,
                //     timer: 1500
                // });
                Swal.fire({
                    title: 'El producto ha sido actualizado',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'listo!',
                    allowOutsideClick: false,
                    }).then((result) => {
                    if (result.value) {
                        window.location.reload();
                    }
                })
                //$('#myModal').modal('hide');  
               // this.$emit('actualizar');
               
               // console.log(response);
            })
            .catch(function (error) {
              
                console.log("error al actualizar");
            });
        },
        limpiarCampos(){
            this.product_name = "";
            this.product_description = "";
            $("#tags").tagsinput('removeAll');
            this.cropper = "",
            this.product_image = '';
        }
        
    }
}
</script>

<style scoped>
    .modal-body{
        min-height: 400px;
        }
    #agregarImagen{
        height: 50px;
    }
    #contenerdorCropper{
        background-color: black;
        width: 220px;
        height: 220px;
        padding: 10px;
        border-radius: 10px;
    }
</style>