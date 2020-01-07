<template>
<div class="col-6">
<!-- <div v-if="message" class="alert-success">{{ message }}</div>
<div v-if="! loaded"><i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...</div> -->
<div>
    <!-- <div v-if="loaded"> -->
    <!-- <div class="row justify-content-center"> -->
        <div class="card mb-5" >
            <div class="card-header">
                <h1 class="display-6">
                    <input type="text" v-model="pcname" @change="update">
                </h1>
                <h6>{{pcrace}} </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2"><button class="btn btn-success btn-sm btn-block" id="Str" name="upStr" @click="pcstr++; update();">+</button></div>
                    <div class="col-2"><button class="btn btn-success btn-sm btn-block" id="Dex" name="upDex">+</button></div>
                    <div class="col-2"><button class="btn btn-success btn-sm btn-block" id="Con" name="upCon">+</button></div>
                    <div class="col-2"><button class="btn btn-success btn-sm btn-block" id="Wis" name="upWis">+</button></div>
                    <div class="col-2"><button class="btn btn-success btn-sm btn-block" id="Int" name="upInt">+</button></div>
                    <div class="col-2"><button class="btn btn-success btn-sm btn-block" id="Cha" name="upCha">+</button></div>
                </div>
                <div class="row text-center">
                    <div class="col-2">Str: {{ pcstr }}</div>
                    <div class="col-2">Dex: {{ pcdex }}</div>
                    <div class="col-2">Con: {{ pccon }}</div>
                    <div class="col-2">Wis: {{ pcwis }}</div>
                    <div class="col-2">Int: {{ pcint }}</div>
                    <div class="col-2">Cha: {{ pccha }}</div>
                </div>
                <div class="row">
                    <div class="col-2"><button class="btn btn-danger btn-sm btn-block" id="Str" name="downStr">-</button></div>
                    <div class="col-2"><button class="btn btn-danger btn-sm btn-block" id="Dex" name="downDex">-</button></div>
                    <div class="col-2"><button class="btn btn-danger btn-sm btn-block" id="Con" name="downCon">-</button></div>
                    <div class="col-2"><button class="btn btn-danger btn-sm btn-block" id="Wis" name="downWis">-</button></div>
                    <div class="col-2"><button class="btn btn-danger btn-sm btn-block" id="Int" name="downInt">-</button></div>
                    <div class="col-2"><button class="btn btn-danger btn-sm btn-block" id="Cha" name="downCha">-</button></div>
                </div>
            </div>
        </div>
    <!-- </div> -->
    <!-- </div> -->
</div>
</div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: ['id', 'name','race', 'gender','str', 'dex', 'con', 'wis', 'int', 'cha'],
        data() {
            return {
                pcname: this.name,
                pcrace: this.race,
                pcgender: this.gender,
                pcstr: this.str,
                pcdex: this.dex,
                pccon: this.con,
                pcwis: this.wis,
                pcint: this.int,
                pccha: this.cha,
            };
        },
        mounted() {
            console.log('Party ready.')
        },
        methods: {
            update(val) {
                this.$emit('update',
                    this.id,
                    this.pcname,
                    // this.pcrace,
                    this.pcgender,
                    this.pcstr,
                    this.pcdex,
                    this.pccon,
                    this.pcwis,
                    this.pcint,
                    this.pccha
                );
            },
            upStr() {
                this.pcstr = this.pcstr + 1;
                console.log(this.pcstr);
                // update();
            }
        },
    }
</script>
