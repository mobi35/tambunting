<template>
   <div class="about-more-autor">
        <ul class="nav nav-tabs">
            <li @click.prevent="changeTab(0)" :class="tab == 0 ? 'active': '' ">
                <a href="#about-autor" data-toggle="tab">LIVE UPDATES</a>
            </li>
           
            <li @click.prevent="changeTab(1)" :class="tab == 1 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab">CHIP COUNTS</a>
            </li>
            <li @click.prevent="changeTab(2)" :class="tab == 2 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab">GALLERY</a>
            </li>
             <li @click.prevent="changeTab(3)" :class="tab == 3 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab">PAYOUT</a>
            </li>
            <li @click.prevent="changeTab(4)" :class="tab == 4 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab"># WHATSAPP</a>
            </li>
        </ul>
        <div class="tab-content">
            <!-- <div v-show="tab == 0"  id="liveReport"> -->
        
               <!-- <div v-for="round in list.data.levels" :key="round"> -->
                    <div class="single-post-box round">
                        <div class="day-divider">
                            <!-- <span>{{round.level}}</span><br /> -->
                            <!-- <span>Day 1 ended.</span> -->
                        </div>
                    </div>

                    <!-- <div class="each-post" v-for="report in round.liveReports" :key="report.id"> -->
                        <div class="title-post">
                        
                            <!-- <h1><router-link class="default-text-color" :to="`/live-report/report/${report.id}`">{{report.title}}</router-link></h1> -->
                            <div style="display:flex; justify-content: space-between;">
                                <div>
                                    <ul class="post-tags">
                                        <!-- <li><i class="fa fa-clock-o"></i>{{}}</li> -->
                                        <!-- <li><i class="fa fa-user"></i>by <a href="#">{{report.article_author.first_name}} {{report.article_author.last_name}}</a>
                                        </li> -->
                                    </ul>
                                </div>

                                <div>
                                    <ul class="post-tags share-post-links ">
                                        <li><i class="fa fa-share-alt"></i><span>Share
                                                Post</span>
                                        </li>
                                        <li><a href="#" class="facebook"><i
                                                    class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#" class="twitter"><i
                                                    class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class="whatsapp"><i
                                                    class="fa fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        <!-- </div> -->
                        
                        <!-- <div :class="report.image?.length  ? 'post-content-min-height' : ''"  class="post-content "> -->
                           <!-- <div class="post-gallery float-img" v-if="report.image" -->
                                <!-- style="float: left; margin: 0px 15px 5px 0px;"> -->
                                <!-- <img :src="report.image" alt=""> -->
                                <!-- <span class="image-caption">{{report.image_caption}}</span> -->
                            <!-- </div> -->
                            <!-- <p v-html="report.content"></p> -->
                        <!-- </div> -->
                            <div class="margin-top">
                    <CustomeTable >
                        <template v-slot:table-head>
                            <tr class="text-primary">
                                <th>Player</th>
                                <th class="text-center">Country</th>
                                <th class="text-right">Prize</th>
                            </tr>
                        </template>
                        <template v-slot:table-body>
                            <!-- <tr v-for="stack in report.live_report_players" :key="stack.id"> -->
                                <!-- <td class="text-right">{{stack.player.name}}</td> -->
                                <!-- <td class="text-center hide-on-mobile"><CountryFlag :iso="stack.player.country.iso_3166_2" /></td> -->
                                <!-- <td class="text-right">{{stack.current_chips}}</td> -->
                            <!-- </tr> -->
                        </template>
                    </CustomeTable>
                        </div>


                             <div class="post-tags-box">
                            <ul class="tags-box">
                                <li><i class="fa fa-tags"></i><span>Tags:</span></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Politics</a></li>
                                <li><a href="#">Sport</a></li>
                            </ul>
                        </div>
                    </div>
               <!-- </div> -->
            <!-- </div> -->

            <!-- <div v-show="tab == 1"> -->
                <div class="margin-top">
                    <CustomeTable>
                        <template v-slot:table-head>
                            <tr class="text-primary">
                                <th class="text-center">Player</th>
                                <th>player</th>
                                <th class="text-center hide-on-mobile">country</th>
                            </tr>
                        </template>
                        <template v-slot:table-body>
                            <!-- <tr v-for="stack in list.data.chip_stacks" :key="stack.id"> -->
                                <!-- <td class="text-right">{{stack.player.name}}</td> -->
                                <!-- {{ player }} -->
                                <!-- <td class="text-center hide-on-mobile"><CountryFlag :iso="stack.player.country.iso_3166_2" /></td> -->
                                <!-- <td class="text-right">{{stack.current_chips}}</td> -->
                            <!-- </tr> -->
                        </template>
                    </CustomeTable>
                </div>
            <!-- </div> -->

            <!-- <div v-show="tab == 2"> -->
                <div class="margin-top">                        
                    <!-- <vue-picture-swipe :items="items" style="position: relative; padding-bottom: 100%;"></vue-picture-swipe> -->
                    <!-- <masonry-wall :items="items" :column-width="50" :gap="10">
                        <template #default="{ item }">
                            <div style="width: auto; height: auto;">
                                <img width="150" :src="item.src">
                            </div>
                        </template>
                    </masonry-wall> -->
                </div>
            <!-- </div> -->

            <!-- <div v-show="tab == 3"> -->
                <div class="margin-top">
                    <!-- <CustomeTable>
                        <template v-slot:table-head>
                            <tr class="text-primary">
                                <th>Player</th>
                                <th class="text-center">Country</th>
                                <th class="text-right">Prize</th>
                            </tr>
                        </template>
                        <template v-slot:table-body>
                            <tr v-for="payout in list.data.payout" :key="payout.id">
                                <td>{{payout.player.name}}</td>
                                <td class="text-center hide-on-mobile"><CountryFlag :iso="payout.player.country.iso_3166_2" /></td>
                                <td class="text-right">{{payout.prize}}</td>
                            </tr>
                        </template>
                    </CustomeTable> -->
                </div>
            <!-- </div> -->

                <!-- <div v-show="tab == 4">
                <h1> other report 2 </h1>other report 4
            </div> -->
        </div>
    </div>
</template>

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
.each-post {
    border-top: 1px solid #d3d3d3;
    border-bottom: 1px solid #d3d3d3;
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


/* ul.post-tags li .twitter, 
ul.post-tags li .facebook, 
ul.post-tags li .whatsapp {
   font-size: 18px;
} */

@media(min-width:768px) {
    .post-content-min-height {
        min-height: 200px;
    }
}

@media(min-width:992px) {
    .post-content-min-height {
        min-height: 250px;  
    }
}

@media(min-width:1200px) {
    .post-content-min-height {
        min-height: 300px;
    }
}

</style>