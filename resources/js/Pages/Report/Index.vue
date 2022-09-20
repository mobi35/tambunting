
<template>
<Head>
  <title>This is a dynamic inertia</title>
  <meta property="og:image" name="test" /> 
  <meta property="og:image" name="test" /> 
</Head>

      <FrontLayout title="kurik">
  <div class="block-content" >
      <!-- <div class="block-content" v-if="list.data"> -->
        <!-- <div class="title-section hide-underline">
            <h1 class="text-primary"><span>{{list.data.poker_tournament}}</span></h1>
            <div style="display:flex; justify-content: space-between;">
                <h1><span>{{list.data.title}}</span></h1>

                <p><span>Days: 1</span></p>
            </div>
        </div> -->
        <div class="single-post-box">

          <ReportList> </ReportList>

        </div>
    </div>


      </FrontLayout>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';

import FrontLayout from '@/Layouts/FrontLayout.vue';
import ReportList from '../../Components/Frontend/Report/ReportList.vue';

</script>

<style>

</style>