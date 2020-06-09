<template>
    <div class="home">
        <h1>Просмотр всех данных</h1>
        <div class="table-responsive full-height">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>AdQub_offer_ID</th>
                    <th>DATE</th>
                    <th>Created_by</th>
                    <th>Advertiser_Aff_network</th>
                    <th>ADQUB_ADV_NAME</th>
                    <th>ORIGINAL_Offer_name</th>
                    <th>AdQub_offer_name</th>
                    <th>Volume_offer_name</th>
                    <th>Vertical</th>
                    <th>Offer_URL</th>
                    <th>GEO_full</th>
                    <th>ORIGINAL_payout</th>
                    <th>Conversion_type</th>
                    <th>GEO</th>
                    <th>ORIGINAL_30</th>
                    <th>ORIGINAL_25</th>
                    <th>ORIGINAL_20</th>
                    <th>ORIGINAL_CUSTOM</th>
                    <th>NEW_payout</th>
                    <th>PO_change_date</th>
                    <th>NEW_PO_30</th>
                    <th>NEW_PO_25</th>
                    <th>NEW_PO_20</th>
                    <th>NEW_CUSTOM</th>
                    <th>NEW_PO_CUSTOM</th>
                    <th>FINAL_ACTUAL_PO</th>
                    <th>OS</th>
                    <th>OS_Version</th>
                    <th>Green_prelanding_preview</th>
                    <th>Green_landing_preview</th>
                    <th>Red_preland</th>
                    <th>Red_direct_link</th>
                    <th>Daily_Cap</th>
                    <th>Total_Cap</th>
                    <th>PROFITABILITY</th>
                    <th>Device</th>
                    <th>Connection_type</th>
                    <th>Carrier</th>
                    <th>Browser</th>
                    <th>Traffic_category</th>
                    <th>Ad_Format</th>
                    <th>Any_other_additional_targeting</th>
                    <th>Status</th>
                    <th>Browser_language</th>
                    <th>Browser_version</th>
                    <th>KPI</th>
                    <th>Creatives</th>
                    <th>WL</th>
                    <th>BL</th>
                    <th>IP_targeting</th>
                    <th>NOTES</th>
                    <th>GALAKSION</th>
                    <th>ADMAVEN</th>
                    <th>PROPELLER</th>
                    <th>ADSTERRA</th>
                    <th>CLICKADU</th>
                    <th>ADCASH</th>
                    <th>ZETADS</th>
                    <th>ADVERTISER</th>
                    <th>HILLTOP</th>
                    <th>ANDRES</th>
                    <th>MEDIAO</th>
                    <th>MOBUSI</th>
                    <th>KIMIA</th>
                    <th>UNGADS</th>
                    <th>User_Id</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(row,index) of db" :key="index">
                    <td v-for="(item,id) of row" :key="id">{{item}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Look',
        methods:{
            async getData(){
                const {data} = await this.$axios.get('maindata')
                this.$store.commit('SET_DB',data)
            }
        },
        computed:{
          db(){return this.$store.getters.maindata}
        },
        mounted(){
            this.getData()
        }
    }
</script>
<style lang="sass">
</style>
