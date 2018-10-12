<template>
    <div class="box">
        <notification-success v-if="notif"></notification-success>
        <div class="box-body">
            <form class="form-horizontal" @submit.prevent="savebuilding">
                <div class="form-group">
                    <label for="inputBuilding" class="control-label col-md-2">Name Of Building</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="inputBuilding" v-model="buildings.name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCategories" class="control-label col-md-2">Locations</label>
                    <div class="col-md-10">
                        <select id="inputCategories" class="form-control" v-model="buildings.locations" required>
                            <option value="" disabled selected>--select--</option>
                            <option v-for="location in dropLocation" 
                                :value="location.id" 
                                :key="location.id">
                                {{ location.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCategories" class="control-label col-md-2">Categories</label>
                    <div class="col-md-10">
                        <select id="inputCategories" class="form-control" v-model="buildings.categories" required>
                            <option value="" disabled selected>--select--</option>
                            <option 
                                v-for="category in dropCategories"
                                :key="category.id"
                                :value="category.id">
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        <textarea v-model="buildings.alamat" class="form-control" cols="30" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputMaps" class="control-label col-sm-2">Maps</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="enter a location" class="form-control" id="input-autocomplete">
                        <div id="myMap">    
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Lat</label>
                                    <input type="text" v-model="buildings.lat" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">lng</label>
                                    <input type="text" v-model="buildings.lng" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-10">
                        <div style="display: flex;"  v-if="buildings.images.length > 0" v-for="(images, index) in buildings.images" :key="index" class="col-sm-3">
                            <img  :src="images" alt="" width="100px" height="70px">
                            <span class="pull-right" style="cursor:pointer;" @click="removeImages(index)">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <input type="file" multiple="multiple" name="photos" @change="uploadImages"
                        accept="image/*" required>
                    </div>
                </div>
                <pre>{{ buildings }}</pre>
                <div class="form-group">
               <label class="control-label col-sm-2">Tariff</label>
               <div class="col-sm-10">
                    <div class="form-horizontal" v-for="(tariff, index) in tariffs" :key="tariff.id">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Vehicle Types</label>
                            <div class="col-sm-10">
                                <select v-model="tariff.vehicle_id" @change="getTariff($event.target.value, index)">
                                    <option value="" disabled>--select--</option>
                                    <option 
                                            v-for="types in vehicle_types"
                                            v-bind:key="types.id"
                                            :value="types.id">
                                            {{ types.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Classes</label>
                            <div class="col-sm-10">
                                <select v-model="tariff.classes_id" @change="getTariff($event.target.value, index)">
                                    <option value="" disabled> --select-- </option>
                                    <option
                                            v-for="clas in classes_types"
                                            v-bind:key="clas.id" 
                                            :value="clas.id">
                                            {{ clas.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2">Tariff</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control" v-model="tariff.nominal">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="button" class="btn btn-flat" @click="deleteTariff(index)"><i class="fa fa-times"></i>Delete</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-flat" @click="addTariff"><i class="fa fa-plus" ></i>Add Tariff</button>
                    <pre>{{ tariffs }}</pre>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Areas</label>
                    <div class="col-sm-10">
                       <!-- <form-area v-for="(area, index) in areas" :key="area.id"></form-area>
                        -->
                         <div class="form-horizontal" v-for="(area, index) in areas" :key="area.id">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label" >Name Of Area</label>
                                <div class="col-sm-10">
                                        <input type="text" class="form-control" v-model="area.name">
                                </div>
                            </div>
                            <div class="form-group" v-for="(count, index1) in area.count" :key="count.id">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <div class="form-group">
                                        <label for="" class="col-sm-2 control-label">Vehicle Types</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-4">
                                                <select v-model="count.vehicle" class="form-control">
                                                        <option value="" disabled>--select--</option>
                                                        <option 
                                                            v-for="vehicle in vehicle_types"
                                                            :key="vehicle.id"
                                                            :value="vehicle.id">
                                                            {{ vehicle.name }}
                                                        </option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" placeholder="jumlah" v-model="count.jumlah" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="button" class="btn btn-flat" @click="addVehicle(index)"><i class="fa fa-plus"></i> Add Vehicle</button>
                                    <button type="button" class="btn btn-flat" @click="deleteItem(index)"><i class="fa fa-times"></i>Delete</button>
                                </div>
                            </div>
                        
                        </div>
                       <button type="button" class="btn btn-flat" @click="addArea"><i class="fa fa-plus"></i>Add Area</button>
                    </div>
                    <pre>{{ areas }}</pre>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Save</button>
                        <router-link :to="{ name: 'indexBuilding'}" class="btn btn-warning"><i class="fa fa-times"></i>Back</router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import { upload } from '../../Utils/imagesConfig';
    import { EventBus } from '../../../event-bus/event-bus'


    export default {
        name: 'createBuilding',
        data: function(){
            return {
                buildings: {
                    name: '',
                    categories: '',
                    locations:'',
                    alamat:'',
                    lat: '',
                    lng: '',
                    images:[]
                },
                activeTariffForm: false,
                activeVehicleForm: false,
                activeAreaForm: false,
                notif: false,


                dropLocation: [],
                dropCategories: [],
                //tariiffs
                tariffs:[
                    {
                        id_tariff: '',
                        vehicle_id:'',
                        classes_id:'',
                        nominal:''
                    }
                ],
                vehicle_types: [],
                classes_types: [],


                //areas
                areas:[
                    {
                        name:'',
                        count: []
                    }
                ],
                map:'',
                lat: '',
                lng: '',
                tariffForm: []

                //buildings

                
            }
        },
        mounted(){
            EventBus.$on('save', (data) => {
                const obj = data.data[0];
                this.tariffForm.push(obj);
                this.activeTariffForm = data.bool;
            });

            EventBus.$on('cancel', (data) => {
                this.activeTariffForm = data;
            });

           
        },
        methods: {
            removeImages: function(index){
                this.buildings.images.splic(index, 1);
            },
            addArea: function(index){
                this.areas.push({
                    name:'',
                    count: []
                })
            },
            addVehicle: function(index){
                this.areas[index].count.push({
                    vehicle: '',
                    jumlah:''
                })
            },
            deleteItem: function(index){
                this.areas.splice(index, 1);
            },
            deleteTariff: function(index){
                this.tariffForm.splice(index, 1);
            },
            addTariff: function(){
                this.tariffs.push({
                    id_tariff: '',
                    vehicle_id:'',
                    classes_id:'',
                    nominal:''
                })
            },
            addBuilding: function(){
                axios.post('/api/v1/building', this.buildings)
                    .then(res => {
                        alert('berhasil')
                    //     this.notif = true
                    //     this.buildings.name = ''
                    //     this.buildings.categories =  ''
                    //     this.buildings.locations = ''
                    //     this.buildings.alamat = ''
                    //     this.buildings.lat =  ''
                    //     this.buildings.lng =  ''
                    //     this.buildings.images = []

                    //     this.tariffs = [
                    //         {
                    //             id_tariff: '',
                    //             vehicle_id:'',
                    //             classes_id:'',
                    //             nominal:''
                    //         }
                    //     ]

                    //     this.areas = [
                    //         {
                    //             name:'',
                    //             count: []
                    //         }
                    //     ],
                        

                    // setTimeout(() => {
                    //     this.notif = false

                    // })
                })
            },
            initialize(){
               //Google maps API initialisation
                const element = document.getElementById("myMap");
                const input = document.getElementById("input-autocomplete")

                const map = new google.maps.Map(element, {
                    center: new google.maps.LatLng( -6.181935, 106.8031835),
                    zoom: 15,
                    mapTypeId: "OSM",
                    mapTypeControl: false,
                    streetViewControl: false
                });

                //Define OSM map type pointing at the OpenStreetMap tile server
                map.mapTypes.set("OSM", new google.maps.ImageMapType({
                    getTileUrl: function(coord, zoom) {
                        return "https://tile.openstreetmap.org/" + zoom + "/" + coord.x + "/" + coord.y + ".png";
                    },
                    tileSize: new google.maps.Size(256, 256),
                    name: "OpenStreetMap",
                    maxZoom: 18
                }));
                const position = {lat: -6.181935,lng: 106.8031835}
                const marker = new google.maps.Marker({position: position, map:map})

                const autocomplete = new google.maps.places.Autocomplete(input)

                map.addListener('click', function(e){
                   console.log(e.latLng);
                })
            },
            getDataCategories: function(){
                axios.get('/api/v1/categories')
                    .then( response => {
                        console.log(response.data.data.data);
                        this.dropCategories = response.data.data.data;
                    })
            },
            uploadImages(e){
                let file = e.target.files;
                let readers = [];
                for(let i = 0; i < file.length; i++){
                    readers[i] = new FileReader()
                    readers[i].onload = (x) => {
                        this.buildings.images.push(x.target.result)
                    }
                    readers[i].readAsDataURL(file[i])
                }
            },
            getDataLocations: function(){
                axios.get('/api/v1/location')
                    .then(response => {
                        console.log(response.data.data.data)
                        this.dropLocation = response.data.data.data;
                    })
            },
            getDataVehicleTypes: function(){
                axios.get('/api/v1/vehicletypes')
                        .then(res => {
                            const vehi = res.data.data.data;
                            this.vehicle_types = vehi;
                        })
            },
            getDataClassesTypes: function(){
                axios.get('/api/v1/classes')
                        .then(res => {
                            const clas = res.data.data.data;
                            this.classes_types = clas;
                        })
            },
            getTariff: function(e,index){
                if(this.tariffs[index].vehicle_id && this.tariffs[index].classes_id !== ''){
                        axios.post('/api/v1/getTariff', this.tariffs[index])
                            .then( async res => {
                                console.log(res.data.data)
                                const nominal = res.data.data[0].nominal;
                                let id = res.data.data[0].id;
                                const data = res.data.data;
                                this.tariffs[index].id_tariff = id;
                                this.tariffs[index].nominal = nominal;
                            })
                }
                return;
            },
            savebuilding: function(){
                Object.assign(this.buildings, {areas: this.areas}, {tariffs: this.tariffs})
                const tempData = new Object();
                Object.assign(tempData, this.buildings);
                axios.post('/api/v1/building', tempData)
                    .then(response => {
                        if(response.data.status === 'success'){
                            this.notif = true
                            this.buildings = {
                                name: '',
                                categories: '',
                                locations:'',
                                alamat:'',
                                lat: '',
                                lng: '',
                                images:[]
                            },
                            delete this.buildings.areas
                            delete this.buildings.tariffs

                            this.tariffs = [
                                {
                                    id_tariff: '',
                                    vehicle_id:'',
                                    classes_id:'',
                                    nominal:''
                                }
                            ]

                            this.areas = [
                                {
                                    name:'',
                                    count: []
                                }
                            ],
                            

                        setTimeout(() => {
                            this.notif = false
                        }, 2000)
                        }
                    })
            }
        },
        async activated(){
            await this.getDataCategories()
            await this.getDataLocations()
            await this.initialize();
            // await  this.getDataLocations();
            await this.getDataVehicleTypes();
           await this.getDataClassesTypes();
        }
    }
</script>

<style scoped>
    #myMap {
        width: 800px;
        height: 400px;
    }
     .backgroundred {
        background-color: #db5e5e
    }
     .span-margin {
          margin: 0 10px;
     }
</style>