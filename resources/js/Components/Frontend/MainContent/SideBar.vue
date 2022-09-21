<script setup>

</script>

<template>
    <div class="sidebar">
        <div class="widget social-widget">
            <div class="title-section">
                <h1><span>Stay Connected</span></h1>
            </div>

            <div class="single-post-box">
                <div class="share-post-box" style="padding: 0">
                    <ul class="share-box share-box-button" style="">
                        <li style="width: 100%">
                            <a class="facebook"
                                href="https://www.facebook.com/profile.php?id=100083369017397"
                                style="width: 100%"><i
                                    class="fa fa-facebook"></i><span>Facebook</span></a>
                        </li>
                        <li style="width: 100%">
                            <a class="facebook" href="https://www.instagram.com/lifeofpoker_com/"
                                target="_blank"
                                style="width: 100% ;background: linear-gradient(45deg,#f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);"><i
                                    class="fa-brands fa-instagram"></i><span>Instagram</span></a>
                        </li>
                        <li style="width: 100%">
                            <a class="twitter" href="https://twitter.com/Life_of_Poker"
                                style="width: 100%"><i
                                    class="fa fa-twitter"></i><span>Twitter</span></a>
                        </li>
                        <li style="width: 100%">
                            <a class="twitter" href="https://twitter.com/Life_of_Poker"
                                style="width: 100%; background-color: #e74c3c;"><i
                                    class="fa-brands fa-youtube"></i><span>Youtube</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="widget features-slide-widget" v-if="0">
        <!-- <div class="widget features-slide-widget" v-if="eventStore.list"> -->
            <div class="title-section">
                <h1><span>Events</span></h1>
            </div>
            <ul class="list-posts">
                <!-- <li v-for="(event, index) in eventStore.list.data" :key="event.id">
                    <div v-if="index <= 4">
                        <img v-if="event.image" :src="event.image">
                        <img v-else :src="defaultImg" style="aspect-ratio: 3/3; background: #e7e7e7;" />
                        <div class="post-content">
                            <h2><router-link :to="`/live-report/${event.id}`">{{event.title}}</router-link></h2>
                            <ul class="post-tags">
                                <li><i class="fa fa-clock-o"></i>{{event.date_start}}</li>
                            </ul>
                        </div>
                    </div>
                </li> -->
            </ul>
        </div>
        
        <div class="widget social-widget">
            <div class="title-section">
                <h1><span>Twitter</span></h1>
            </div>

            <div class="single-post-box">
                <div class="news-post article-post">
                    <blockquote class="twitter-tweet"><p lang="en" dir="ltr">A successful week for the Life of Poker team. Congratulating Thijs Hilberts with his 3-way deal in the Main Event. <a href="https://twitter.com/hashtag/lifeofpoker?src=hash&amp;ref_src=twsrc%5Etfw">#lifeofpoker</a> <a href="https://twitter.com/hashtag/poker?src=hash&amp;ref_src=twsrc%5Etfw">#poker</a> <a href="https://twitter.com/hashtag/appt?src=hash&amp;ref_src=twsrc%5Etfw">#appt</a> <a href="https://twitter.com/hashtag/okada?src=hash&amp;ref_src=twsrc%5Etfw">#okada</a> <a href="https://t.co/YAW6Lm67qj">pic.twitter.com/YAW6Lm67qj</a></p>&mdash; LifeofPoker (@Life_of_Poker) <a href="https://twitter.com/Life_of_Poker/status/1558285149208358912?ref_src=twsrc%5Etfw">August 13, 2022</a></blockquote>
                </div>
            </div>
        </div>
    </div>
</template>