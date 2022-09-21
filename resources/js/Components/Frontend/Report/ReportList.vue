<template>


<div class="about-more-autor">
        <ul class="nav nav-tabs">
            <li @click.prevent="changeTab(0)" :class="tab == 0 ? 'active': '' ">
                <a href="#about-autor" data-toggle="tab">
                    <span class="hide-on-mobile">LIVE UPDATES</span>
                    <span class="show-on-mobile">UPDATES</span>
                </a>
            </li>
            <li @click.prevent="changeTab(1)" :class="tab == 1 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab">
                    <span class="hide-on-mobile">CHIP COUNTS</span>
                    <span class="show-on-mobile">CHIPS</span>
                </a>
            </li>
            <li @click.prevent="changeTab(2)" :class="tab == 2 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab">GALLERY</a>
            </li>
             <li @click.prevent="changeTab(3)" :class="tab == 3 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab">PAYOUT</a>
            </li>
            <li @click.prevent="changeTab(4)" :class="tab == 4 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab">#WHATSAPP</a>
            </li>
        </ul>
        <div class="tab-content">

            <div v-show="tab == 0"  id="liveReport">
               <!-- <div v-for="round in list?.data.levels ? [] : []" :key="round"> -->
               <div v-for="round in []" :key="round">
                    <div class="single-post-box round">
                        <div class="day-divider">
                            <span>{{round.level}}</span><br />
                            <!-- <span>Day 1 ended.</span> -->
                        </div>
                    </div>

                    <div class="each-post" v-for="report in round.liveReports" :key="report.id">
                        <div class="title-post">
                        
                            <h1><router-link class="default-text-color" :to="`/live-report/report/${report.id}`">{{report.title}}</router-link></h1>
                            <div style="display:flex; justify-content: space-between;">
                                <div>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{formatDate(report.created_at)}} ( {{formatTime(report.created_at)}} )</li>
                                        <li><i class="fa fa-user"></i>by <a href="#">{{report.article_author.first_name}} {{report.article_author.last_name}}</a>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <ul class="post-tags share-post-links">
                                        <li class="text-secondary"><i class="fa fa-share-alt text-secondary"></i><span>Share
                                                Post</span>
                                        </li>
                                        <li><a href="#" class="facebook"><i
                                                    class="fa fa-facebook text-secondary"></i></a>
                                        </li>
                                        <li><a href="#" class="twitter"><i
                                                    class="fa fa-twitter text-secondary"></i></a>
                                        </li>
                                        <li><a href="#" class="whatsapp"><i
                                                    class="fa fa-whatsapp text-secondary"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div :class="report.image?.length  ? 'post-content-min-height' : ''"  class="post-content ">
                           <div class="post-gallery float-img" v-if="report.image"
                                style="float: left; margin: 0px 15px 5px 0px;">
                                <div style="position: relative;">
                                    <img :src="report.image" alt="" style="margin-bottom: unset;" :style="[report.image_theme ? { 'filter': 'brightness(0.8)' } : {}]">
                                    <div id="imageFrame" :style="{ 'background-image': 'url(' + getFrame(report.image_theme) + ')' }"></div>
                                </div>
                                <span class="image-caption">{{report.image_caption}}</span>
                            </div>
                            <p v-html="report.content"></p>
                        </div>

                        <div class="margin-top margin-bottom" v-if="report.live_report_players.length">
                            <CustomeTable>
                                <template v-slot:table-body>
                                    <tr v-for="stack in report.live_report_players" :key="stack.id">
                                        <td>
                                            <img class="hide-on-mobile" v-if="stack.player.avatar" :src="stack.player.avatar" />
                                            <img class="hide-on-mobile" v-else :src="defaultAvatar" />
                                            <span style="white-space: nowrap;">{{stack.player.name}}</span>
                                        </td>
                                        <td class="text-center hide-on-mobile" v-if="stack.player.country.iso_3166_2"><CountryFlag :title="stack.player.country.name" :iso="stack.player.country.iso_3166_2" /></td>
                                        <td class="text-center hide-on-mobile" v-else >?</td>
                                        <td class="text-right">{{stack.current_chips === 0 ? 'BUSTED':stack.current_chips.toLocaleString()}}</td>
                                        <td class="text-right hide-on-mobile">
                                            {{stack.current_chips === 0 ? '':stack.current_chips.toLocaleString()}}
                                            <span v-if="stack.current_chips !== 0" style="margin-left: 10px;"><i class="fa-sharp fa-solid fa-caret-up text-green"></i></span>
                                            <!-- <span v-else-if="stack.previous === stack.current_chips" style="margin-left: 10px;"><i class="fa-sharp fa-solid fa-caret-up text-green"></i></span> -->
                                            <!-- <span v-else style="margin-left: 10px;" ><i class="fa-sharp fa-solid fa-caret-down text-red"></i></span> -->
                                        </td>
                                    </tr>
                                </template>
                            </CustomeTable>
                        </div>

                        <div class="post-tags-box" v-if="report.live_report_players.length">
                            <ul class="tags-box">
                                <li><i class="fa fa-tags"></i><span>Tags:</span><a href="#" v-for="player in report.live_report_players" :key="player.id">{{player.name}}</a></li>
                            </ul>
                        </div>
                    </div>
               </div>
            </div>

            <div v-show="tab == 1">
                <!-- <div class="margin-top" v-if="list.data.chip_stacks.length"> -->
                <div class="margin-top" v-if="0">
                    <CustomeTable>
                        <template v-slot:table-head>
                            <tr class="text-primary">
                                <th class="text-center">Rank</th>
                                <th>Player</th>
                                <th class="text-center hide-on-tablet">Country</th>
                                <th class="text-right">Chips</th>
                                <th class="text-right hide-on-mobile">Progress</th>
                            </tr>
                        </template>
                        <template v-slot:table-body>
                            <tr v-for="stack in list.data.chip_stacks" :key="stack.id">
                                <td class="text-center">{{stack.rank}}</td>
                                <td>
                                    <img class="hide-on-tablet" v-if="stack.player.avatar" :src="stack.player.avatar" />
                                    <img class="hide-on-tablet" v-else :src="defaultAvatar" />
                                    <span style="white-space: nowrap;">{{stack.player.name}}</span>
                                </td>
                              
                                <!-- {{ player }} -->
                                <td class="text-center hide-on-tablet" v-if="stack.player.country.iso_3166_2"><CountryFlag :iso="stack.player.country.iso_3166_2" /></td>
                                <td class="text-center hide-on-tablet" v-else >?</td>
                                <td class="text-right">{{stack.current_chips.toLocaleString()}}</td>
                                <td class="text-right hide-on-mobile">
                                    {{stack.changes.toLocaleString()}}

                                    <span v-if="stack.symbol === 'up'" style="margin-left: 10px;"><i class="fa-sharp fa-solid fa-caret-up text-green"></i></span>
                                    <!-- <span v-else-if="stack.previous === stack.current_chips" style="margin-left: 10px;"><i class="fa-sharp fa-solid fa-caret-up text-green"></i></span> -->
                                    <span v-else style="margin-left: 10px;" ><i class="fa-sharp fa-solid fa-caret-down text-red"></i></span>
                                </td>
                            </tr>
                        </template>
                    </CustomeTable>
                </div>
            </div>

            <div v-show="tab == 2">
                <div class="margin-top">                        
                    <vue-picture-swipe :items="items" style="position: relative; padding-bottom: 100%; display: flex; flex-wrap: wrap; gap: 10px;"></vue-picture-swipe>
                </div>
            </div>

            <div v-show="tab == 3">
                <!-- <div class="margin-top" v-if="list.data.payout.length"> -->
                <div class="margin-top" v-if="0">
                    <CustomeTable>
                        <template v-slot:table-head>
                            <tr class="text-primary">
                                <th class="text-center">Rank</th>
                                <th>Player</th>
                                <th class="text-center hide-on-mobile">Country</th>
                                <th class="text-right">Prize (USD)</th>
                            </tr>
                        </template>
                        <template v-slot:table-body>
                            <tr v-for="payout in list.data.payout" :key="payout.id">
                                <td class="text-center">{{payout.rank}}</td>
                                <td>
                                    <img class="hide-on-mobile" v-if="payout.player.avatar" :src="payout.player.avatar" />
                                    <img class="hide-on-mobile" v-else :src="defaultAvatar" />
                                    <span style="white-space: nowrap;">{{payout.player.name}}</span>
                                </td>
                                <td class="text-center hide-on-mobile" v-if="payout.player.country.iso_3166_2"><CountryFlag :iso="payout.player.country.iso_3166_2" /></td>
                                <td class="text-center hide-on-mobile" v-else >?</td>
                                <td class="text-right">$ {{Number(payout.prize).toLocaleString()}}</td>
                            </tr>
                        </template>
                    </CustomeTable>
                </div>
            </div>

            <div v-show="tab == 4">
            </div>
        </div>
    </div>

</template>

<script setup>
import { ref } from "@vue/reactivity";


    const tab = ref(0);

    const changeTab = (currentTab) => {
        tab.value = currentTab
    }

</script>


<!-- 
<script setup>
import CustomeTable from '../CustomeTable.vue'
import { computed, ref, onMounted, watch } from "@vue/runtime-core"
import VuePictureSwipe from 'vue3-picture-swipe'
import axios from 'axios'
import CountryFlag from 'vue3-country-flag-icon'
import 'vue3-country-flag-icon/dist/CountryFlag.css' // import stylesheet

    const tab = ref(0);

    const changeTab = (currentTab) => {
        tab.value = currentTab
    }
    const props = defineProps({
        list : Object
    })

    const items = ref([]);

    onMounted(() => {
        items.value = [];
        props.list.data.gallery.forEach(element => {
            items.value.push({
                thumbnail: element.thumbnail,
                src: element.main,
                w: 600,
                h: 400,
            });
        });
    console.log(props.list)
    })

    watch(() => props.list.data, (first) => {
        items.value = [];
        first.gallery.forEach(element => {
            items.value.push({
                thumbnail: element.thumbnail,
                src: element.main,
                w: 600,
                h: 400,
            });
        });
        tab.value = 0
    });

</script> -->


<style scoped>
.text-secondary {
    color: #2d3436;
}

.text-green {
    color: #2ecc71;
}

.text-red {
    color: #e74c3c;
}

.single-post-box .post-tags-box ul.tags-box li a {
    margin: 0px 10px 10px 0px;
}

#imageFrame {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.each-post {
    border-top: 1px solid #d3d3d3;
    border-bottom: 1px solid #d3d3d3;
}

.margin-bottom{
    margin-bottom: 20px;
}

.margin-top {
    margin-top: 20px;
}

ul.post-tags li .facebook {
    background-color: unset;
    margin-right: unset;
}

ul.post-tags li .twitter {
    background-color: unset;
}

.twitter i {
    margin-right: 1px;
}

.facebook i {
    margin-right: 1px;
}

.whatsapp {
    background-color: unset;

    margin-right: unset;
    margin-left: unset;
}

.single-post-box .post-tags-box { 
    padding: unset  ;
}

@media(min-width:768px) {
    .post-content-min-height {
        min-height: 200px;
    }

     .show-on-mobile {
        display: none;
    }
}


@media(min-width:992px) {
    .post-content-min-height {
        min-height: 270px;  
    }
}

@media(min-width:1200px) {
    .post-content-min-height {
        min-height: 340px;
    }
}

</style>
