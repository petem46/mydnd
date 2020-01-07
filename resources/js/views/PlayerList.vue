<template>
<div>
    <h1>List</h1>
    <div v-if="message" class="alert-success">{{ message }}</div>
    <div v-if="! loaded"><i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...</div>
    <div v-if="loaded">
        <div class="row justify-content-center">
            <player-component
                v-for="pc in pcs"
                v-bind="pc"
                :key="pc.id"
                @update="update"
            ></player-component>
        </div>
        <paginate
            :page-count="pageCount"
            :click-handler="fetch"
            :prev-text="'Prev'"
            :next-text="'Next'"
            :container-class="'pagination'">
        </paginate>
    </div>
</div>
</template>

<script>

    // function Player({ id, name, race}) {
    //     this.id = id;
    //     this.name = name;
    //     this.gender = gender;
    // }

    import axios from 'axios';
    // import Players from './components/PlayerComponent';
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
                        this.loaded = true;
                        this.updated = false;
                    });
            },
            update(
                    id,
                    name,
                    gender,
                    str,
                    dex,
                    con,
                    wis,
                    int,
                    cha,
                    livehp,
                    hp,
                    ac,
                ) {
                axios.put(`/api/pcs/${id}`, {
                    name,
                    // race,
                    gender,
                    str,
                    dex,
                    con,
                    wis,
                    int,
                    cha,
                    livehp,
                    hp,
                    ac,
                })
                .then(() => {
                    console.log(name + ' stats have been updated');
                    this.updated = true;
                });
            },
        },
    }
</script>
