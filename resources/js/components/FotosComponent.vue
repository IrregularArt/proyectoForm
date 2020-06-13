
<template>
    <div id="app">
      <vue-avatar
        :width=400
        :height=400
        ref="vueavatar"
        @vue-avatar-editor:image-ready="onImageReady"
        image=""
      >
      </vue-avatar>
      <br>
      <vue-avatar-scale
        ref="vueavatarscale"
        @vue-avatar-editor-scale:change-scale="onChangeScale"
        :width=250
        :min=1
        :max=3
        :step=0.02
      >
      </vue-avatar-scale>
      <br>
      <img src="" id="img-1">
      <button class="btn btn-success" v-on:click="saveClicked">Así está bien!</button>
    </div>
</template>

<script>
import Vue from 'vue'
import VueAvatar from '../vue-avatar/components/VueAvatar.vue'
import VueAvatarScale from '../vue-avatar/components/VueAvatarScale.vue'

export default {
    components: {
    VueAvatar,
    VueAvatarScale
  },
    data() {
        return {mensaje: 'hola vue!',
        imagen: null,
        usuarios: null
        }
    },
        mounted() {
            console.log('Component mounted.');
            this.cargarFoto()
        },
        methods: {
            //comprobar si existe input para llamar la foto del local
            cargarFoto(){
                if(document.getElementById('cc')){
                    var imagenTraida = "localesImg/"+document.getElementById('cc').value;
                    console.log(imagenTraida);
                    console.log("////////////////////////////////////////");
                    var vueava = this.$refs.vueavatar;
                    console.log(vueava);
                    this.$refs.vueavatar.loadImage(imagenTraida);
                }
            },
            //------------------
            onChangeScale (scale) {
                this.$refs.vueavatar.changeScale(scale)
            },
            saveClicked(){
                var img = this.$refs.vueavatar.getImageScaled()
                // use img
                var imagenFinal = img.toDataURL();
                console.log(imagenFinal);
                document.getElementById('imagenLocal').value = imagenFinal;
            },
            onImageReady(scale){
            this.$refs.vueavatarscale.setScale(scale)
            },


            //---------------------------
            cambiarMensaje() {
                //this.mensaje = "cambio el mensaje el dia : "+new Date().toLocaleString()
                axios.get('obtenerUsuarios')
                .then(response => (
                    this.usuarios = response.data
                ))
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            }
        },afterMount(){
             this.cargarFoto()
        }
    }
 
</script>
<style  scoped>
#crop-container{
    width : 300px;
    height : 300px;
}
</style>