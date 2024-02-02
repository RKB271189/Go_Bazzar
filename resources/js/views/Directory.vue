<template>
  <Layout>
    <template v-slot:menu-content>
      <SubSideNav />
    </template>
    <template v-slot:page-content>
      <Title :heading="'Discover more good finds'">Real Estate</Title>
      <DirectoryCard />
    </template>
  </Layout>
</template>
  
  <script>
import Layout from "../components/user/Layout.vue";
import SubSideNav from "../components/user/partials/Sub-SideNav.vue";
import DirectoryCard from "../components/DirectoryCard.vue";
import Title from "../components/user/partials/Title.vue";
export default {
  components: {
    Layout,
    Title,
    SubSideNav,
    DirectoryCard,
  },
};
</script>
  
  <style>
</style>