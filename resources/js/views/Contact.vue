<template>
  <Loader v-if="loading"></Loader>
  <Toast :showToast="showToast" :message="message" :hasError="hasError"></Toast>
  <Layout>
    <template v-slot:page-content>
      <div class="container-fluid">
        <section class="mb-4">
          <h2 class="h1-responsive font-weight-bold text-center my-4">
            Contact us
          </h2>
          <p class="text-center w-responsive mx-auto mb-5">
            Do you have any questions? Please do not hesitate to contact us
            directly. Our team will come back to you within a matter of hours to
            help you.
          </p>
          <div class="row">
            <!-- <div class="col-md-9 mb-md-0 mb-5">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input
                      type="text"
                      id="name"
                      name="name"
                      class="form-control"
                    />
                    <label for="name">Your name</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input
                      type="text"
                      id="email"
                      name="email"
                      class="form-control"
                    />
                    <label for="email" class="">Your email</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <input
                      type="text"
                      id="subject"
                      name="subject"
                      class="form-control"
                    />
                    <label for="subject" class="">Subject</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <textarea
                      type="text"
                      id="message"
                      name="message"
                      rows="2"
                      class="form-control"
                    ></textarea>
                    <label for="message">Your message</label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="text-center text-md-left">
                  <a class="btn btn-primary btn-lg float-end">Send</a>
                </div>
              </div>
            </div> -->
            <div class="col-md-4 text-center">
              <ul class="list-unstyled mb-0">
                <li>
                  <MapPinIcon class="mt-4 hero-icon"></MapPinIcon>
                  <p>2830 Gordon Road, Regina, SK</p>
                </li>
              </ul>
            </div>
            <div class="col-md-4 text-center">
              <ul class="list-unstyled mb-0">
                <li>
                  <PhoneIcon class="mt-4 hero-icon"></PhoneIcon>
                  <p>+ 306 510 7099</p>
                </li>
              </ul>
            </div>
            <div class="col-md-4 text-center">
              <ul class="list-unstyled mb-0">
                <li>
                  <EnvelopeIcon class="mt-4 hero-icon"></EnvelopeIcon>
                  <p>info@gobazzar.com</p>
                </li>
              </ul>              
            </div>
          </div>
        </section>
      </div>
    </template>
  </Layout>
</template>

<script>
import Layout from "../components/user/Layout.vue";
import { MapPinIcon, PhoneIcon, EnvelopeIcon } from "@heroicons/vue/24/outline";
import Loader from "../components/Loader.vue";
import Toast from "../components/Toast.vue";
import useAPIRequest from "../services/api-request";
export default {
  components: {
    Layout,
    Loader,
    Toast,
    MapPinIcon,
    PhoneIcon,
    EnvelopeIcon,
  },
  setup() {
    const { hasError, message, loading, showToast, handleAPIRequest } =
      useAPIRequest();
    return {
      loading,
      showToast,
      message,
      hasError,
    };
  },
};
</script>

<style>
</style>