<template>
    <span class="show_visitable-rtl">
       <div class="lvs-icon fa-lvs-eye1 color_blue lgs_float_left margin_right_4"></div>
       <span class="ml-1">{{visits}}</span>
   </span>
</template>

<script>
    import axios from './lib/axios/index.js'
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
    @import  './lib/icon/style.css';
    .show_visitable{
    border-right: 1px solid #d9d9d966 ;
    padding-right: 4px;
}
.m_r_3{
    margin-right: 3%;
}
.ltr .m_r_3{
    margin-left: 3%;
}

</style>