<template>
  <Layout>
    <template v-slot:page-content>
      <Title :heading="'Discover more good finds'" />
      <AdvertiseCard />
      <Title :heading="'Our Market Place'" />
      <Thumbnail />
    </template>
  </Layout>
</template>

<script>
import Layout from "../components/user/Layout.vue";
import AdvertiseCard from "../components/AdvertiseCard.vue";
import Title from "../components/user/partials/Title.vue";
import Thumbnail from "../components/user/partials/Thumbnail.vue";
export default {
  components: {
    Layout,
    AdvertiseCard,
    Title,
    Thumbnail,
  },
};
</script>

<style>
</style>