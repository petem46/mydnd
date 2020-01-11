<template>
    <div>
        <router-view></router-view>
    </div>
</template>
<script>
    export default {
        mounted() {
            Echo.channel('player-tracker')
            .listen('PlayerUpdated', (e) => {
                console.log('omgggg realtime bro....')
            });
        }
    }
</script>
