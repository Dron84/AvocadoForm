<template>
    <div class="container">
        <h1>Добавить данные</h1>
        <div class="row">
            <inputs class="col-12 col-sm-6 col-md-4 col-lg-3" label="AdQub offer ID" v-model="forms.AdQub_offer_ID"/>
            <inputs class="col-12 col-sm-6 col-md-4 col-lg-3" label="DATE" v-model="forms.DATE"/>
            <inputs class="col-12 col-sm-6 col-md-4 col-lg-3" label="Created by" v-model="forms.Created_by"/>
            <inputs class="col-12 col-sm-6 col-md-4 col-lg-3" label="Advertiser (Aff network)" v-model="forms.Advertiser_Aff_network"/>
            <inputs class="col-12 col-sm-6 col-md-4 col-lg-3" label="ADQUB ADV NAME" v-model="forms.ADQUB_ADV_NAME"/>
            <inputs class="col-12 col-sm-6 col-md-4 col-lg-3" label="ORIGINAL Offer name" v-model="forms.ORIGINAL_Offer_name"/>

            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="AdQub offer name" v-model="forms.AdQub_offer_name"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Volume offer name (FILLS AUTO FROM OFFER PREVIEW)" v-model="forms.Volume_offer_name"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Vertical" v-model="forms.Vertical"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Offer URL {clickid} {var1}" v-model="forms.Offer_URL"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="GEO full" v-model="forms.GEO_full"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ORIGINAL payout(PO)$" v-model="forms.ORIGINAL_payout"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Conversion type" v-model="forms.Conversion_type"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="GEO" v-model="forms.GEO"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ORIGINAL PO -30%" v-model="forms.ORIGINAL_30"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ORIGINAL PO -25%" v-model="forms.ORIGINAL_25"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ORIGINAL PO -20%" v-model="forms.ORIGINAL_20"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ORIGINAL PO -CUSTOM %" v-model="forms.ORIGINAL_CUSTOM"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="NEW payout" v-model="forms.NEW_payout"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="PO change date" v-model="forms.PO_change_date"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="NEW PO -30%" v-model="forms.NEW_PO_30"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="NEW PO -25%" v-model="forms.NEW_PO_25"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="NEW PO -20%" v-model="forms.NEW_PO_20"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="CUSTOM %" v-model="forms.NEW_CUSTOM"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="NEW PO -CUSTOM %" v-model="forms.NEW_PO_CUSTOM"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="FINAL ACTUAL PO (CAMPAIGNS)" v-model="forms.FINAL_ACTUAL_PO"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="OS" v-model="forms.OS"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="OS Version" v-model="forms.OS_Version"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Green prelanding preview" v-model="forms.Green_prelanding_preview"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Green landing preview/direct link" v-model="forms.Green_landing_preview"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Red preland" v-model="forms.Red_preland"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Red direct link" v-model="forms.Red_direct_link"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Daily Cap" v-model="forms.Daily_Cap"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Total Cap" v-model="forms.Total_Cap"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="PROFITABILITY" v-model="forms.PROFITABILITY"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Device" v-model="forms.Device"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Connection type" v-model="forms.Connection_type"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Carrier" v-model="forms.Carrier"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Browser" v-model="forms.Browser"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Traffic category" v-model="forms.Traffic_category"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Ad Format" v-model="forms.Ad_Format"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Any other additional targeting" v-model="forms.Any_other_additional_targeting"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Status" v-model="forms.Status"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Browser language" v-model="forms.Browser_language"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Browser version" v-model="forms.Browser_version"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="KPI" v-model="forms.KPI"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="Creatives" v-model="forms.Creatives"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="WL" v-model="forms.WL"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="BL" v-model="forms.BL"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="IP targeting" v-model="forms.IP_targeting"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="NOTES" v-model="forms.NOTES"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="GALAKSION" v-model="forms.GALAKSION"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ADMAVEN" v-model="forms.ADMAVEN"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="PROPELLER" v-model="forms.PROPELLER"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ADSTERRA" v-model="forms.ADSTERRA"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="CLICKADU" v-model="forms.CLICKADU"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ADCASH" v-model="forms.ADCASH"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ZETADS" v-model="forms.ZETADS"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ADVERTISER" v-model="forms.ADVERTISER"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="HILLTOP" v-model="forms.HILLTOP"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="ANDRES" v-model="forms.ANDRES"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="MEDIAO" v-model="forms.MEDIAO"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="MOBUSI" v-model="forms.MOBUSI"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="KIMIA" v-model="forms.KIMIA"/>
            <inputs  class="col-12 col-sm-6 col-md-4 col-lg-3" label="UNGADS" v-model="forms.UNGADS"/>

        </div>
        <div class="centrize row">
            <button type="submit" class="btn btn-primary" @click="submitForm">Сохранить</button>
        </div>
        <div class="centrize">
            <p class="msg" v-if="msg!==''">{{msg}}</p>
        </div>
    </div>
</template>

<script>
    import inputs from '@/components/inputs'

    export default {
        name: 'Add',
        components: {inputs},
        data: () => ({
            forms: {
                AdQub_offer_ID: '',
                DATE: '',
                Created_by: '',
                Advertiser_Aff_network: '',
                ADQUB_ADV_NAME: '',
                ORIGINAL_Offer_name: '',
                AdQub_offer_name: '',
                Volume_offer_name: '',
                Vertical: '',
                Offer_URL: '',
                GEO_full: '',
                ORIGINAL_payout: '',
                Conversion_type: '',
                GEO: '',
                ORIGINAL_30: '',
                ORIGINAL_25: '',
                ORIGINAL_20: '',
                ORIGINAL_CUSTOM: '',
                NEW_payout: '',
                PO_change_date: '',
                NEW_PO_30: '',
                NEW_PO_25: '',
                NEW_PO_20: '',
                NEW_CUSTOM: '',
                NEW_PO_CUSTOM: '',
                FINAL_ACTUAL_PO: '',
                OS: '',
                OS_Version: '',
                Green_prelanding_preview: '',
                Green_landing_preview: '',
                Red_preland: '',
                Red_direct_link: '',
                Daily_Cap: '',
                Total_Cap: '',
                PROFITABILITY: '',
                Device: '',
                Connection_type: '',
                Carrier: '',
                Browser: '',
                Traffic_category: '',
                Ad_Format: '',
                Any_other_additional_targeting: '',
                Status: '',
                Browser_language: '',
                Browser_version: '',
                KPI: '',
                Creatives: '',
                WL: '',
                BL: '',
                IP_targeting: '',
                NOTES: '',
                GALAKSION: '',
                ADMAVEN: '',
                PROPELLER: '',
                ADSTERRA: '',
                CLICKADU: '',
                ADCASH: '',
                ZETADS: '',
                ADVERTISER: '',
                HILLTOP: '',
                ANDRES: '',
                MEDIAO: '',
                MOBUSI: '',
                KIMIA: '',
                UNGADS: ''
            },
            msg: ""
        }),
        methods: {
            submitForm() {
                if (this.checkForm) {
                    const fd = new FormData();
                    for (const key in this.forms) {
                        fd.append(key, this.forms[key]);
                    }
                    fd.append('user_id', this.user_id)
                    this.$axios.post('maindata', fd).then(res => {
                        this.msg = res.data.message
                        setTimeout(() => {
                            this.msg = ''
                        }, 3000)
                    })
                } else {
                    this.msg = 'Заполните поля'
                    setTimeout(() => {
                        this.msg = ''
                    }, 3000)
                }
            }
        },
        computed: {
            user_id() {
                return this.$store.getters.user_id
            },
            checkForm() {
                if (this.forms.AdQub_offer_ID !== '') {
                    return true
                } else {
                    return false
                }
            },

        }
    }
</script>
<style lang="sass">
    .container
        padding: 40px 0
        .form-row
            margin: 5px 0
        .centrize
            display: flex
            justify-content: center
            align-items: center
        .row
            margin: 20px 0
        .msg
            color: red
</style>