<template>
  <div>
    <div class="google-map" id="mapaG" ref="googleMap"></div>
    <template v-if="Boolean(this.google) && Boolean(this.map)">
      <slot
        :google="google"
        :map="map"
      />
    </template>
  </div>
</template>
<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'
export default {
  props: {
   mapConfig: {
       
        center: { lat: 0, lng: 0 }
    },
    apiKey: "AIzaSyDzAsYHjm1Eo0VNlA7kV73eR6S19MVCpus",
  },

  data() {
    return {
      google: null,
      map: null,
      
    }
  },

  async mounted() {
    const googleMapApi = await GoogleMapsApiLoader({
      apiKey: this.apiKey
    })
    this.google = googleMapApi
    this.initializeMap()
  },

  methods: {
    initializeMap() {
      const mapContainer = this.$refs.googleMap
      this.map = new this.google.maps.Map(
        mapContainer, this.mapConfig
      )
    }
  }
}
</script>
<style scoped>
#mapaG{
    width: 400px;
    height: 370px;
}
</style>