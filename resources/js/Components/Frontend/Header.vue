<template>
        <header class="clearfix">
            <!-- Bootstrap navbar -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <!-- Logo & advertisement -->
                <div class="logo-advertisement">
                    <div class="container">
                        <div
                            style="display: flex; justify-content: space-between; align-items: flex-start; padding: 3rem 0;">
                            <a class="pull-left"  href="/">
                                <img :src="logo" alt="" style="width: 150px" /></a>
                            <button @click="toggleBtn" type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="advertisement" style="align-self: center; padding: 0">
                                <div class="desktop-advert">
                                    <h4 style="color: white">“BRINGING THE ACTION TO YOUR DOORSTEP”</h4>
                                </div>
                            </div>
                            <div class="advertisement" style="padding: 0; font-size: 12px">
                                <div class="desktop-advert" style="color: white">
                                    <i class="fa fa-search" style="margin-right: 0.5rem"></i>
                                    <span style="
                                      display: inline-block;
                                      margin-right: 0.5rem;
                                      font-size: 12px;
                                      color: white;
                                    ">|</span>
                                    <span style="display: inline-block; font-size: 12px; color: white">ENG<i
                                            class="fa fa-angle-down"
                                            style="margin-left: 1rem; font-size: 12px; color: #666"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Logo & advertisement -->
                <!-- navbar list container -->
                <div class="nav-list-container navbar navbar-default" >
                    <div class="container">
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div ref="toggleMenu" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left custome-nav">

                                <li class="drop"><a class="home" href="#">News & Info</a>
<!-- 
                                    <ul class="dropdown">
                                        <li><a href="#">Live poker rooms</a></li>
                                        <li><a href="#">online poker rooms</a></li>
                                        <li><a href="#">poker tours</a></li>
                                        <li><a href="#">podcasts</a></li>
                                        <li><a href="#">videos</a></li>
                                        <li><a href="#">promotions</a></li>
                                        <li><a href="#">contact</a></li>
                                    </ul> -->
                                </li>


                                <!-- <li><Link :href="route('live-report')" >Live-reporting</Link> </li>

                                <li><Link :href="route('tournament')" >Event Calendar</Link> </li> -->

                <li><a href="#">Live reporting</a> </li>
                <li><a href="#">Event Calendar</a> </li>



                                <li><a class="tech" href="#">rankings & leaderboards</a></li>

                                <li><a class="fashion" href="#">packages</a></li>

                                <li><a class="video" href="#">store</a></li>

                                <li class="drop"><a class="features" href="#">contact</a></li>
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                </div>
                <!-- End navbar list container -->
            </nav>
            <!-- End Bootstrap navbar -->
        </header>
</template>

<script setup>
import { ref } from 'vue'

import { Link } from '@inertiajs/inertia-vue3';
import logo from '/public/lop_logo_small.png'


const toggleMenu = ref(null);

function toggleBtn() {
    toggleMenu.value.classList.toggle("collapse");
}
</script>

<style scoped>
.router-link-active {
    background-color: #f44336;
    color: white;
}
.router-link-active:hover, .router-link-exact-active:hover {
    background-color: #f44336 !important;
    color: white !important;
}
</style>