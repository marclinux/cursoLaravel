<template>

  <div id="leafletmap" style="height: 600px; width: 100%">
    <l-map ref="miMapa"
      v-if="showMap"
      :zoom="zoom"
      :center="center"
      :options="mapOptions"
      style="height: 80%"
      @update:center="centerUpdate"
      @update:zoom="zoomUpdate"
    >
      <l-tile-layer
        :url="url"
        :attribution="attribution"
      />
  </l-map>
  </div>
</template>

<script>
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from "vue2-leaflet";

export default {
  name: "Mapa",
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
    LTooltip
  },
  data() {
    return {
      zoom: 13,
      center: latLng(16.75, -93.1167),
      url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
      attribution:
        '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      currentZoom: 11.5,
      currentCenter: latLng(47.41322, -1.219482),
      showParagraph: false,
      mapOptions: {
        zoomSnap: 0.5
      },
      showMap: true,
      sites: [],
      markers: [],
      map: null,
      markerOption: {
        clickable: true,
        draggable: false
      },
    };
  },
  created () {
      this.getSitios(0);
    },
  watch : {
      sites : function() {
        this.eliminaMarcadores();
        this.sites.forEach( (site)=>{
          var marker = new L.Marker(site.coords, this.markerOption);
          marker.addTo(this.map);
          marker.bindPopup(`
              <h6 class="display-6">${site.name}</h6>        `)
          this.markers.push(marker);
        }); 
      }
  },
  mounted() {
    this.map = this.$refs.miMapa.mapObject;
  },
  methods: {
    zoomUpdate(zoom) {
      this.currentZoom = zoom;
    },
    centerUpdate(center) {
      this.currentCenter = center;
    },
    showLongText() {
      this.showParagraph = !this.showParagraph;
    },
    innerClick() {
      alert("Click!");
    },
    getSitios(idTipo) {
      console.log('/api/sites/' + idTipo);
      this.sites = [];
      axios
        .get('/api/sites/' + idTipo)
        .then(response => {
          this.sites = response.data.data
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        })
        .finally(() => this.loading = false)
    },
    eliminaMarcadores() {
      this.markers.forEach((element) => {
        this.map.removeLayer(element);
      });
      this.markers = [];
    }
  }
};
</script>
