<template>
      <div class="about-more-autor">
        <ul class="nav nav-tabs">
            <li @click.prevent="changeTab(0)" :class="tab == 0 ? 'active': '' ">
                <a href="#about-autor" data-toggle="tab">live events</a>
            </li>
        
            <li @click.prevent="changeTab(1)" :class="tab == 1 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab">past events</a>
            </li>
            <li @click.prevent="changeTab(2)" :class="tab == 2 ? 'active': '' ">
                <a href="#more-autor" data-toggle="tab">upcoming events</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class=" margin-top" v-show="tab == 0">
                <div class="article-box" v-if="liveEventCollection.length">
                    <div class="news-post article-post" v-for="main in liveEventCollection" :key="main.id">
                        <div class="row event-header">
                            <div class="col-sm-4">
                                <div class="post-gallery" style="background: rgb(231, 231, 231);">
                                    <img alt="" v-if="main.image" :src="main.image">
                                    <div v-else class="default-img" :style="{ backgroundImage: 'url(' + defaultImg + ')' }"></div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="post-content">
                                    <h2>{{main.poker_tour.title}}</h2>
                                    <h2>{{main.title}}</h2>
                                    <ul class="post-tags">
                                        <li class="finished bold"><i class="finished fa-solid fa-circle-dot"></i>LIVE COVERAGE</li>
                                        <li><i class="fa fa-clock-o"></i>{{main.date_start}} - {{main.date_end}}</li>                                   
                                        <!-- <li><i class="fa fa-map-marker"></i>Location City, Country 1602</li>                                                                   -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row event-body" v-for="event in main.events" :key="event.id">
                            <div class="col-sm-6 post-content">
                                <p><router-link :to="`/live-report/${event.id}`" class="text-primary">{{event.title}}</router-link></p>
                            </div>
                            <div class="col-sm-6 post-content">
                                <p class="text-right"><i class="fa fa-clock-o"></i> {{event.date_start}} - {{event.date_end}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <h1>No live event...</h1>
                </div>
            </div>

            <div class=" margin-top" v-show="tab == 1">
                <div class="article-box" v-if="pastEventCollection.length">
                    <div class="news-post article-post" v-for="main in pastEventCollection" :key="main.id">
                        <div class="row event-header">
                            <div class="col-sm-4">
                                <div class="post-gallery" style="background: rgb(231, 231, 231);">
                                    <img alt="" v-if="main.image" :src="main.image">
                                    <div v-else class="default-img" :style="{ backgroundImage: 'url(' + defaultImg + ')' }"></div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="post-content">
                                    <h2>{{main.poker_tour.title}}</h2>
                                    <h2>{{main.title}}</h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{main.date_start}} - {{main.date_end}}</li>                                   
                                        <!-- <li><i class="fa fa-map-marker"></i>Location City, Country 1602</li>                                    -->
                                        <li></li>                                   
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row event-body" v-for="event in main.events" :key="event.id">
                            <div class="col-sm-6 post-content">
                                <p><router-link :to="`/live-report/${event.id}`" class="text-primary">{{event.title}}</router-link></p>
                            </div>
                            <div class="col-sm-6 post-content">
                                <p class="text-right"><i class="fa fa-clock-o"></i> Ended: {{event.date_end}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <h1>No past event...</h1>
                </div>
            </div>

            <div class=" margin-top" v-show="tab == 2">
                <div class="article-box" v-if="upcomingEventCollection.length">
                    <div class="news-post article-post" v-for="main in upcomingEventCollection" :key="main.id">
                        <div class="row event-header">
                            <div class="col-sm-4">
                                <div class="post-gallery" style="background: rgb(231, 231, 231);">
                                    <img alt="" v-if="main.image" :src="main.image">
                                    <div v-else class="default-img" :style="{ backgroundImage: 'url(' + defaultImg + ')' }"></div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="post-content">
                                    <h2>{{main.poker_tour.title}}</h2>
                                    <h2>{{main.title}}</h2>
                                    <ul class="post-tags">
                                        <li><i class="fa fa-clock-o"></i>{{main.date_start}} - {{main.date_end}}</li>                              
                                        <!-- <li><i class="fa fa-map-marker"></i>Location City, Country 1602</li>                                                                      -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="row event-body" v-for="event in main.events" :key="event.id">
                            <div class="col-sm-6 post-content">
                                <p><router-link :to="`/live-report/${event.id}`" class="text-primary">{{event.title}}</router-link></p>
                            </div>
                            <div class="col-sm-6 post-content">
                                <p class="text-right"><i class="fa fa-clock-o"></i> Start at: {{event.date_start}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <h1>No upcoming event...</h1>
                </div>
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

const liveEventCollection = ref([]);
const pastEventCollection = ref([]);
const upcomingEventCollection = ref([]);

</script>



<style scoped>
.default-img {
    aspect-ratio: 3 / 2;
    width: 100%;
    height: auto;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
}

.margin-top {
    margin-top: 20px;
}

.event-body {
    margin: 20px 1px;
    border: 1px solid #b5b5b5;
}

.event-header {
    color: white;
    padding-top: 20px;
    background-color: #2d3436;
    margin: 0px 1px;
}

.event-header .col-sm-4 {
    padding-right: 0;
}

.article-post {
    border-bottom: 1px solid #d3d3d3;
}

.article-post .post-content {
    padding: 5px 10px;
}

.article-post .post-content h2 {
    color: white;
}

.article-post .post-content p {
    font-size: 14px;
}
.single-post-box .post-gallery img {
    margin-bottom: unset;
}

.article-post .post-header {
    display: flex;
    align-items: center;
}


.sidebar .tab-posts-widget ul.nav-tabs {
    display: flex;
    align-items: center;
    overflow-x: auto;
}

.sidebar .tab-posts-widget ul.nav-tabs li {
    padding-left: 1px;
}

.post-gallery .mainEventImage {
    width: 170px;
    height: auto;
}
.post-gallery {
    float: none;
}

.post-gallery .mainEventImage {
    width: 100%;
    height: 100%;
    width: 230px;
    min-width: 150px;
    min-height: auto;
}

.sidebar {
    padding-bottom: unset;
}

.subevent{
    margin: 0px 15px 15px 15px;
    border: 1px solid #d8d8d8;
}

.subevent.live-now {
    border: 1px solid #2ecc71 !important;
}

.post-header {
    background: #2D3436;
    padding: 15px 0px;
    margin: 0px 15px 15px 15px;
}

.post-header h2 {
    color: white;
    display: flex;
    flex-direction: row;
    align-items: center;
}

.post-content {
    color: white;
    margin-bottom: unset;
}

.event-status {
    font-weight: 800;
    font-style: normal;
}

.live {
    color: #f44336;
}   

.finished {
    color: #2ecc71;
}

.post-tags {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.sidebar {
    padding-top: unset;
}
</style>