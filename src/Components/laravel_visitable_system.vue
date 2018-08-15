<template>
   <span class="show_visitable">
       <i class="far fa-eye color_blue"></i><span class="ml-1">{{visits}}</span>
   </span>
</template>

<script>
    import axios from '../../../../../public/vendor/laravel_gallery_system/packages/axios/index.js'
    export default {
        name: "laravel_visitable_system",
        props:['model','item'],
        data: function () {
            return {

            }
        },
        mounted() {

        },
        computed: {
            visits:function () {
                if(this.item.visits)
                {
                    return this.item.visits
                }
                else
                {
                    return 0
                }
            }
        },
        methods: {
            visitItem:function (item_id) {
                axios.post("/LVS/visitItem", {id: this.item_id, model: this.model}).then(response => {
                    this.$nextTick(() => {

                    })
                })
            }
        }
    }
</script>

<style scoped>
.show_visitable{
    border-right: 1px solid #d9d9d966 ;
    padding-right: 4px;
}
</style>