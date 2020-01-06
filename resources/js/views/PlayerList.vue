<template>
<div>
    <h1>List</h1>
    <div v-if="message" class="alert-success">{{ message }}</div>
    <div v-if="! loaded"><i class="fas fa-spinner fa-spin fa-3x"></i>&nbsp;&nbsp; Loading...</div>
    <div v-if="loaded">
    <div class="container1">
        <div class="row justify-content-center">
            <player-component v-for="pc in pcs" v-bind="pc" :key="pc.id"></player-component>
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
</div>
</template>

<script>
    import axios from 'axios';
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
                    });
            },
            update(val) {
                // this.$emit('update', this.id, val.target.pc.race.value);
                console.log('update');
            },
        },
        // props: ['id','name', 'str'],
    }
</script>
