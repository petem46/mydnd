<template>
    <div class="container1">
        <div class="row justify-content-center">
            <div class="col-6" v-for="pc in pcs">

                <div class="card mb-5" >
                    <div class="card-header">
                        <h1 class="display-6">{{ pc.name }}</h1>
                        <h6>{{ pc.race }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                                  <select @change="upStr">
        <option
          v-for="str in [ 'red', 'green' ]"
          :value="str"
          :key="str"
          :selected="str === str ? 'selected' : ''"
        >{{ str  }}</option>
      </select>
                            <div class="col-2" :value="str" :key="str"><button @click="upStr" class="btn btn-sm btn-success">+</button> <br>Str: {{ pc.str }}</div>
                            <div class="col-2">Dex: {{ pc.dex }}</div>
                            <div class="col-2">Con: {{ pc.con }}</div>
                            <div class="col-2">Wis: {{ pc.wis }}</div>
                            <div class="col-2">Int: {{ pc.int }}</div>
                            <div class="col-2">Cha: {{ pc.cha }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <paginate
            :page-count="pageCount"
            :click-handler="fetch"
            :prev-text="'Prev'"
            :next-text="'Next'"
            :container-class="'pagination'">
        </paginate>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                message: null,
                loaded: false,
                pcs: [],
                pageCount: 1,
                endpoint: 'api/pcs?page='
            };
        },
        created() {
            this.fetch();
        },
        mounted() {
            console.log('Party ready.')
        },
        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.pcs = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },
            upStr(val) {
                console.log('update', this.id, val.target.value);
            },
        },
        props: ['id','name', 'str'],
    }
</script>
