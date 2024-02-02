<template>
  <div class="row p-2">
    <div v-for="val in advertisements" :key="val.id" class="col-md-3 p-2">
      <div class="card">
        <div class="advertise-card" @click="$emit('advertiseDetail', val.id)">
          <span class="urgent" v-if="val.urgent"
            ><BoltIcon class="hero-icon" style="margin-bottom: 2px"></BoltIcon>
            Urgent</span
          >
          <img :src="val.thumb_nail" class="card-img-top advertise-image" />
          <span class="icon"> </span>
          <span class="price"
            ><CurrencyDollarIcon
              class="hero-icon"
              style="margin-bottom: 2px"
            ></CurrencyDollarIcon>
            {{ val.price }}</span
          >
        </div>
        <div class="card-body">
          <h5 class="card-title main-ads-title">{{ val.title }}</h5>
          <p class="card-text">{{ val.description.substring(0, 30) }} ...</p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item main-ads-date-place p-0">
              <span class="d-block"
                ><ClockIcon class="hero-icon-small pb-1"></ClockIcon>
                {{ val.created_at }}</span
              >
              <span class="d-block mt-1"
                ><MapPinIcon class="hero-icon-small pb-1"></MapPinIcon>
                {{ val.city }}, {{ val.province }}</span
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="row p-2">
    <div class="col-md-3 p-2">
      <div class="card">
        <div class="advertise-card">
          <span class="urgent"
            ><BoltIcon class="hero-icon" style="margin-bottom: 2px"></BoltIcon>
            Urgent</span
          >
          <img
            :src="'/images/car.jpg'"
            class="card-img-top advertise-image"
            alt="..."
          />
          <span class="icon">
            <EyeIcon class="hero-icon"></EyeIcon>
          </span>
          <span class="price"
            ><CurrencyDollarIcon
              class="hero-icon"
              style="margin-bottom: 2px"
            ></CurrencyDollarIcon>
            5000</span
          >
        </div>
        <div class="card-body">
          <h5 class="card-title main-ads-title">Ford Escape Titanimum</h5>
          <p class="card-text">
            Some quick example text to build on the card title the ...
          </p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item main-ads-date-place p-0">
              <span class="d-block"
                ><ClockIcon class="hero-icon-small pb-1"></ClockIcon> Dec 12,
                2023</span
              >
              <span class="d-block mt-1"
                ><MapPinIcon class="hero-icon-small pb-1"></MapPinIcon> Regina,
                Saskatchewan</span
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 p-2">
      <div class="card">
        <div class="advertise-card">
          <img
            :src="'/images/chair.jpg'"
            class="card-img-top advertise-image"
            alt="..."
          />
          <span class="price"
            ><CurrencyDollarIcon
              class="hero-icon"
              style="margin-bottom: 2px"
            ></CurrencyDollarIcon>
            50</span
          >
        </div>
        <div class="card-body">
          <h5 class="card-title main-ads-title">Nice Comfort Chair</h5>
          <p class="card-text">
            Some quick example text to build on the card title the ...
          </p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item main-ads-date-place p-0">
              <span class="d-block"
                ><ClockIcon class="hero-icon-small pb-1"></ClockIcon> Dec 12,
                2023</span
              >
              <span class="d-block mt-1"
                ><MapPinIcon class="hero-icon-small pb-1"></MapPinIcon> Regina,
                Saskatchewan</span
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 p-2">
      <div class="card">
        <div class="advertise-card">
          <img
            :src="'/images/tv.jpg'"
            class="card-img-top advertise-image"
            alt="..."
          />
          <span class="price"
            ><CurrencyDollarIcon
              class="hero-icon"
              style="margin-bottom: 2px"
            ></CurrencyDollarIcon>
            450</span
          >
        </div>
        <div class="card-body">
          <h5 class="card-title main-ads-title">42" Sony TV</h5>
          <p class="card-text">
            Some quick example text to build on the card title the ...
          </p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item main-ads-date-place p-0">
              <span class="d-block"
                ><ClockIcon class="hero-icon-small pb-1"></ClockIcon> Dec 12,
                2023</span
              >
              <span class="d-block mt-1"
                ><MapPinIcon class="hero-icon-small pb-1"></MapPinIcon> Regina,
                Saskatchewan</span
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 p-2">
      <div class="card">
        <div class="advertise-card">
          <img
            :src="'/images/chair.jpg'"
            class="card-img-top advertise-image"
            alt="..."
          />
          <span class="price"
            ><CurrencyDollarIcon
              class="hero-icon"
              style="margin-bottom: 2px"
            ></CurrencyDollarIcon>
            15</span
          >
        </div>
        <div class="card-body">
          <h5 class="card-title main-ads-title">Mens Warm Shirt</h5>
          <p class="card-text">
            Some quick example text to build on the card title the ...
          </p>
          <ul class="list-group list-group-flush">
            <li class="list-group-item main-ads-date-place p-0">
              <span class="d-block"
                ><ClockIcon class="hero-icon-small pb-1"></ClockIcon> Dec 12,
                2023</span
              >
              <span class="d-block mt-1"
                ><MapPinIcon class="hero-icon-small pb-1"></MapPinIcon> Regina,
                Saskatchewan</span
              >
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div> -->
</template>

<script>
import { ClockIcon, MapPinIcon, EyeIcon } from "@heroicons/vue/24/solid";
import { CurrencyDollarIcon, BoltIcon } from "@heroicons/vue/24/outline";
export default {
  components: {
    ClockIcon,
    MapPinIcon,
    CurrencyDollarIcon,
    BoltIcon,
    EyeIcon,
  },
  props: {
    advertisements: Object,
  },
};
</script>

<style>
</style>