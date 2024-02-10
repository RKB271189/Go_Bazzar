<template>
  <div v-for="val in services" :key="val.id" class="col-md-6 p-2">
    <div class="card">
      <div class="card-body pb-0">
        <div class="row align-items-center">
          <div class="col-md-4">
            <div class="text-center border-end">
              <img
                :src="val.service_picture"
                class="img-fluid service-image-pic rounded-circle"
                alt=""
              />
              <h6 class="text-primary font-size-20 mt-3 mb-2">
                {{ val.name }}
              </h6>
            </div>
          </div>
          <div class="col-md-8">
            <div class="ms-2">
              <div>
                <h4 class="card-title mb-2">{{ val.title }}</h4>
                <p class="mb-0 text-muted">
                  {{ val.description }}
                </p>
              </div>
              <div class="row my-4">
                <div class="col-md-12">
                  <div>
                    <p class="text-muted mb-2 fw-medium">
                      <EnvelopeOpenIcon
                        class="hero-icon pb-1"
                      ></EnvelopeOpenIcon>
                      {{ val.service_email }}
                    </p>
                    <p class="text-muted fw-medium mb-0">
                      <PhoneIcon class="hero-icon pb-1"></PhoneIcon>
                      {{
                        val.service_no === null
                          ? "Not Available"
                          : val.service_no
                      }}
                    </p>
                    <p class="text-muted fw-medium mb-0">
                      {{ val.address }} {{ val.province }} - {{ val.city }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="col-md-6 p-2">
    <div class="card">
      <div class="card-body pb-0">
        <div class="row align-items-center">
          <div class="col-md-4">
            <div class="text-center border-end">
              <img
                src="https://bootdey.com/img/Content/avatar/avatar1.png"
                class="img-fluid service-image-pic rounded-circle"
                alt=""
              />
              <h6 class="text-primary font-size-20 mt-3 mb-2">Jansh Wells</h6>
            </div>
          </div>
          <div class="col-md-8">
            <div class="ms-2">
              <div>
                <h4 class="card-title mb-2">Biography</h4>
                <p class="mb-0 text-muted">
                  Hi I'm Jansh,has been the industry's standard dummy text To an
                  English person alteration text.
                </p>
              </div>
              <div class="row my-4">
                <div class="col-md-12">
                  <div>
                    <p class="text-muted mb-2 fw-medium">
                      <EnvelopeOpenIcon
                        class="hero-icon pb-1"
                      ></EnvelopeOpenIcon>
                      Janshwells@probic.com
                    </p>
                    <p class="text-muted fw-medium mb-0">
                      <PhoneIcon class="hero-icon pb-1"></PhoneIcon>
                      418-955-4703
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 p-2">
    <div class="card">
      <div class="card-body pb-0">
        <div class="row align-items-center">
          <div class="col-md-4">
            <div class="text-center border-end">
              <img
                src="https://bootdey.com/img/Content/avatar/avatar1.png"
                class="img-fluid service-image-pic rounded-circle"
                alt=""
              />
              <h6 class="text-primary font-size-20 mt-3 mb-2">Jansh Wells</h6>
            </div>
          </div>
          <div class="col-md-8">
            <div class="ms-2">
              <div>
                <h4 class="card-title mb-2">Biography</h4>
                <p class="mb-0 text-muted">
                  Hi I'm Jansh,has been the industry's standard dummy text To an
                  English person alteration text.
                </p>
              </div>
              <div class="row my-4">
                <div class="col-md-12">
                  <div>
                    <p class="text-muted mb-2 fw-medium">
                      <EnvelopeOpenIcon
                        class="hero-icon pb-1"
                      ></EnvelopeOpenIcon>
                      Janshwells@probic.com
                    </p>
                    <p class="text-muted fw-medium mb-0">
                      <PhoneIcon class="hero-icon pb-1"></PhoneIcon>
                      418-955-4703
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</template>

<script>
import { EnvelopeOpenIcon, PhoneIcon } from "@heroicons/vue/24/outline";
export default {
  components: {
    EnvelopeOpenIcon,
    PhoneIcon,
  },
  props: {
    services: Object,
  },
};
</script>

<style>
</style>