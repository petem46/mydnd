<template>
<div class="col-6">
<!-- <div v-if="message" class="alert-success">{{ message }}</div>
<div v-if="! loaded"><i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...</div> -->
<div>
    <!-- <div v-if="loaded"> -->
    <!-- <div class="row justify-content-center"> -->
        <div class="card mb-5" id="playerCard">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                    <h6>{{pcgender}} {{pcrace}} </h6>
                    <h1 class="display-6">
                        <input type="text" v-model="pcname" @change="update" class="w-100">
                    </h1>
                    </div>
                    <div class="col-2 text-center">
                        <h6>AC</h6>
                        <h1><input type="text" v-model="pcac" @change="update" class="w-100 text-center"></h1>
                    </div>
                    <div class="col-2 text-center">
                        <h6>HP</h6>
                        <h1><input type="text" v-model="pclivehp" @change="update" class="w-100 text-center"></h1>
                    </div>
                    <div class="col-2 text-center">
                        <h6>MAX HP</h6>
                        <h1><input type="text" v-model="pchp" @change="update" class="w-100 text-center text-muted"></h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2"><button class="btn btn-outline-primary btn-sm btn-block" id="Str" name="upStr" @click="pcstr++; update();">+</button></div>
                    <div class="col-2"><button class="btn btn-outline-primary btn-sm btn-block" id="Dex" name="upDex" @click="pcdex++; update();">+</button></div>
                    <div class="col-2"><button class="btn btn-outline-primary btn-sm btn-block" id="Con" name="upCon" @click="pccon++; update();">+</button></div>
                    <div class="col-2"><button class="btn btn-outline-primary btn-sm btn-block" id="Wis" name="upWis" @click="pcwis++; update();">+</button></div>
                    <div class="col-2"><button class="btn btn-outline-primary btn-sm btn-block" id="Int" name="upInt" @click="pcint++; update();">+</button></div>
                    <div class="col-2"><button class="btn btn-outline-primary btn-sm btn-block" id="Cha" name="upCha" @click="pccha++; update();">+</button></div>
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
                    <div class="col-2"><button class="btn btn-outline-danger btn-sm btn-block" id="Str" name="downStr" @click="pcstr--; update();">-</button></div>
                    <div class="col-2"><button class="btn btn-outline-danger btn-sm btn-block" id="Dex" name="downDex" @click="pcdex--; update();">-</button></div>
                    <div class="col-2"><button class="btn btn-outline-danger btn-sm btn-block" id="Con" name="downCon" @click="pccon--; update();">-</button></div>
                    <div class="col-2"><button class="btn btn-outline-danger btn-sm btn-block" id="Wis" name="downWis" @click="pcwis--; update();">-</button></div>
                    <div class="col-2"><button class="btn btn-outline-danger btn-sm btn-block" id="Int" name="downInt" @click="pcint--; update();">-</button></div>
                    <div class="col-2"><button class="btn btn-outline-danger btn-sm btn-block" id="Cha" name="downCha" @click="pccha--; update();">-</button></div>
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
        props: ['id', 'name','race', 'gender','str', 'dex', 'con', 'wis', 'int', 'cha', 'livehp', 'hp', 'ac'],
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
                pclivehp: this.livehp,
                pchp: this.hp,
                pcac: this.ac,
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
                    this.pccha,
                    this.pclivehp,
                    this.pchp,
                    this.pcac,
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
