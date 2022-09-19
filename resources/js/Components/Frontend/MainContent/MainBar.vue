<script setup>

</script>

<template>
    <div class="article-box block-content" >
        <div class="title-section">
            <h1><span>Live reporting </span></h1>
        </div>
        <div class="row">
            <div class="col-lg-6 unset-padding-right" >
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
                                    style="position: absolute; top: 20px; right: 20px; background-color: white; font-weight: bolder; padding: 8px 16px;">UPCOMING</span>
                                 <router-link to="/live-report" class="play-btn">
                                    <i style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 50px; color: #f44336; z-index: 2;"
                                        class="fa fa-play-circle" aria-hidden="true"></i>
                                </router-link> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
        <div class="article-box" >
            <div class="title-section">
                <h1><span>Latest News</span></h1>
            </div>

            <!-- <div class="news-post article-post" v-for="(news) in articleStore.list.data" :key="news.id">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="post-gallery">
                            <router-link  class="default-text-color" :to="`/article/${news.slug}`" >
                            <img alt="" v-if="news.image" :src="news.image">
                            <div v-else :style="{ backgroundImage: 'url(' + defaultImg + ')' }" style=" aspect-ratio: 3/2; background-position: center; background-size: contain; background-repeat: no-repeat;"></div>
                            </router-link>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="post-content">

                            <h2 ><router-link  class="default-text-color" :to="`/article/${news.slug}`" >{{ news.title }}</router-link></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>{{news.date}}</li>
                            </ul>
                            <p>{{news.description}}</p>
                            <router-link :to="`/article/${news.slug}`" class="read-more-button"><i class="fa fa-arrow-circle-right"></i>Read More</router-link>
                        </div>
                    </div>
                </div>
            </div> -->

        <div class="grid-box">
            <div class="title-section">
                <h1><span class="">Video</span></h1>
            </div>
            <div class="row">
                <div class="col-sm-4 news-post article-post">
                    <div class="news-post standard-post2 default-size">
                        <div class="post-gallery">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/FXBvnhIxhNQ" title="APT Philippines 2022 Main Event Highlights" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4  news-post article-post">
                    <div class="news-post standard-post2 default-size">
                        <div class="post-gallery">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/KIIPA6-aIuk" title="WPT Philippines - Over Php20,000,000!" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4  news-post article-post">
                    <div class="news-post standard-post2 default-size">
                        <div class="post-gallery">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/bNZd_JIKNKE" title="WPT Prime Vietnam - Day 1 highlights" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!-- <a href="www.youtube.com" target="_blank">
                                <img style="position: relative;" src="/assets/images/video-img2.jpg" alt="">

                                <div class="play-btn">
                                    <i style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 50px; color: #f44336; z-index: 2;"
                                        class="fa fa-play-circle" aria-hidden="true"></i>
                                </div>
                            </a> -->
                        </div>
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
    </div>
</template>