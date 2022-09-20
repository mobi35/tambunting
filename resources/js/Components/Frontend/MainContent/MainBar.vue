<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

import { useArticleStore } from '@/stores/article.js'
import { onMounted } from '@vue/runtime-core';

const articleStore = useArticleStore()



const adrian = async (id) => {
     articleStore.getArticleBySlug(id)
   
}

defineProps({
    articleList: {
        type: Object,
        default: {},
    },
});

</script>

<template>

    <div class="article-box block-content" v-if="1">
        <div class="title-section">
            <h1><span>Live reporting </span></h1>
        </div>
        <div class="row">
            <!-- <div class="col-lg-6 unset-padding-right" v-for="(report, index) in liveReporting.slice(0, 2)" :key="index"> -->
            <div class="col-lg-6 unset-padding-right" v-for="(report, index) in [1,2,3,4,5]" :key="index">
                <div class="image-post-slider">
                    <div class="news-post image-post2">
                        <div class="post-gallery">
                            <!-- <img v-if="report.image" style="position: relative; filter: brightness(50%);"
                                :src="report.image" alt="">
                            <img v-else style="background: #b9b9b9;" :src="defaultImg">
                            <h4 style="position: absolute; left: 10px; bottom: 10px; color: white;">{{report.title}}</h4>
                                <span v-if="report.status === 'live'"
                                    style="position: absolute; top: 20px; right: 20px; background-color: white; font-weight: bolder; padding: 8px 16px;">LIVE
                                    NOW</span>
                                <span v-else
                                    style="position: absolute; top: 20px; right: 20px; background-color: white; font-weight: bolder; padding: 8px 16px;">UPCOMING</span> -->

                                    <Link class="play-btn"> <i style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 50px; color: #f44336; z-index: 2;"
                                        class="fa fa-play-circle" aria-hidden="true"></i> </Link>

                                 <!-- <router-link to="/live-report" class="play-btn">
                                    <i style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 50px; color: #f44336; z-index: 2;"
                                        class="fa fa-play-circle" aria-hidden="true"></i>
                                </router-link> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <!-- <div class="article-box block-content" v-if="articleStore.list.data" style="margin-top: 30px;"> -->
    <div class="article-box block-content" v-if="1" style="margin-top: 30px;">
        <div class="title-section">
            <h1><span>Latest News</span></h1>
        </div>


        <!-- <div class="news-post article-post" v-for="(news) in articleList.list.data" :key="news.id"> -->
        <div class="news-post article-post" v-for="(news) in articleList.data" :key="news.id">
            <div class="row">
                <div class="col-sm-5">
                    <div class="post-gallery">
                        <Link  class="default-text-color" @click.prevent="adrian(news.slug)"  @mouseover="adrian(news.slug)"  :href="'/article/show/'+ news.slug " >
                        <img alt="" v-if="news.image.length" :src="news.image">
                        <div v-else :style="{ backgroundImage: 'url(' + defaultImg + ')' }" style="aspect-ratio: 3/2; background-position: center; background-size: contain; background-repeat: no-repeat;"></div>
                        </Link>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="post-content">

                        <h2 >
                        <Link href="/article/show" class="default-text-color">{{ news.title }}</Link>
                        </h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>{{news.date}}</li>
                        </ul>
                        <p>{{news.description}}</p>
                        <Link href="/" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</Link>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="article-box block-content">
        <div class="title-section">
            <h1><span class="">Video</span></h1>
        </div>
        
        <div class="row">
            <div class="col-md-4 news-post article-post" style="margin-bottom: 0">
                <div class="news-post standard-post2 default-size">
                    <div class="post-gallery" style="background: transparent">
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/FXBvnhIxhNQ" title="APT Philippines 2022 Main Event Highlights" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="aspect-ratio: 16 / 9"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4  news-post article-post" style="margin-bottom: 0">
                <div class="news-post standard-post2 default-size">
                    <div class="post-gallery" style="background: transparent">
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/KIIPA6-aIuk" title="WPT Philippines - Over Php20,000,000!" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="aspect-ratio: 16 / 9"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-4  news-post article-post" style="margin-bottom: 0">
                <div class="news-post standard-post2 default-size">
                    <div class="post-gallery" style="background: transparent">
                        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/bNZd_JIKNKE" title="WPT Prime Vietnam - Day 1 highlights" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="aspect-ratio: 16 / 9"></iframe>
                    </div>
                        <!-- <a href="www.youtube.com" target="_blank">
                            <img style="position: relative;" src="/assets/images/video-img2.jpg" alt="">

                            <div class="play-btn">
                                <i style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 50px; color: #f44336; z-index: 2;"
                                    class="fa fa-play-circle" aria-hidden="true"></i>
                            </div>
                        </a> -->
                    
                    <!-- <div class="post-title">
                        <h2>Pellentesque odio nisi, euismod
                            in, pharetra a, ultricies in, diam.</h2>
                        <ul class="post-tags">
                            <li><i class="fa fa-clock-o"></i>27 may 2013</li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    
</template>