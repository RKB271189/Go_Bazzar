<template>
  <Layout>
    <template v-slot:page-content>
      <Title :heading="'Discover more good finds'"></Title>
      <ServiceCard></ServiceCard>
    </template>
  </Layout>
</template>
  
  <script>
import Layout from "../components/user/Layout.vue";
import ServiceCard from "../components/ServiceCard.vue";
import Title from "../components/user/partials/Title.vue";
export default {
  components: {
    Layout,
    Title,
    ServiceCard,
  },
};
</script>
  
  <style>
</style>